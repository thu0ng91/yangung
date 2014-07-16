<?php

class CV {
	
	const OPEN = 1;
	const CLOSE = 2;
	
	public static $STATUS_LIST = array (CV::OPEN => '开启', CV::CLOSE => '关闭' );
	
	public static function statusStr($status) {
		$str = '关闭';
		if ($status == self::OPEN) {
			$str = '开启';
		}
		return $str;
	}
	public static function fullflagStr($status) {
		$str = '全本';
		if ($status == self::OPEN) {
			$str = '连载';
		}
		return $str;
	}
	public static function shareStr($status) {
		$str = '审核中';
		if ($status == self::OPEN) {
			$str = '已上架';
		}
		return $str;
	}
	public static function emailStatusStr($status) {
		$str = '未认证';
		if ($status == self::OPEN) {
			$str = '已认证';
		}
		return $str;
	}
	public static function targetStatusStr($target) {
		$str = '新窗口';
		if ($target == self::OPEN) {
			$str = '本窗口';
		}
		return $str;
	}
	public static function istopStr($istop) {
		$str = '未置顶';
		if ($istop == self::OPEN) {
			$str = '已置顶';
		}
		return $str;
	}
	public static function friendTypeStr($type) {
		$str = '图片友链';
		if ($type == self::OPEN) {
			$str = '文字友链';
		}
		return $str;
	}
	public static function YacmsCurl($url) {
		$user_agent = "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; CIBA)";
		$referer = $url;
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		if (defined ( 'CURLOPT_IPRESOLVE' ) && defined ( 'CURL_IPRESOLVE_V4' )) {
			curl_setopt ( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
		}
		curl_setopt ( $ch, CURLOPT_USERAGENT, $user_agent );
		curl_setopt ( $ch, CURLOPT_REFERER, $referer );
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		$result = curl_exec ( $ch );
		$info = curl_getInfo ( $ch );
		if ($info ['http_code'] == 200) {
			return $result;
		} else {
			return false;
		}
	}
	public static function getIP() {
		global $ip;
		if (getenv ( "HTTP_CLIENT_IP" ))
			$ip = getenv ( "HTTP_CLIENT_IP" );
		else if (getenv ( "HTTP_X_FORWARDED_FOR" ))
			$ip = getenv ( "HTTP_X_FORWARDED_FOR" );
		else if (getenv ( "REMOTE_ADDR" ))
			$ip = getenv ( "REMOTE_ADDR" );
		else
			$ip = "Unknow";
		return $ip;
	}
	public static function getFilePath($uid) {
		$supPath = intval ( floor ( $uid / 1000 ) );
		return '/' . $supPath . '/' . intval ( $uid ) . '/';
	}
	public static function dmkdir($dir, $mode = 0777, $makeindex = TRUE) {
		if (! is_dir ( $dir )) {
			self::dmkdir ( dirname ( $dir ), $mode, $makeindex );
			@mkdir ( $dir, $mode );
			if (! empty ( $makeindex )) {
				@touch ( $dir . '/index.html' );
				@chmod ( $dir . '/index.html', 0777 );
			}
		}
		return rtrim ( $dir, '/' ) . '/';
	}
	//整理正文
	public static function checkContent($content) {
		if (! empty ( $content )) {
			$content = str_replace ( "/upload/../../..", '', $content ); //清除本地上次图片编辑器路径
			$content = str_replace ( "/themes/ueditor/php/../../..", '', $content ); //清除获取远程图片编辑器路径
			$content = html_entity_decode ( str_replace ( "<p><br/></p>", '', $content ) );
			return $content;
		}
	}
	/*
     * 提示跳转窗口
    * $msg 提示信息内容
    * $url 跳转地址
    * $status 状态，默认为0，显示感叹号小图标；为1时显示勾号
    * $returntime 页面跳转时间，默认为2秒
    * author:caozhong
    */
	public static function showmsg($msg, $url, $status = '', $returntime = '') {
		if (empty ( $returntime ))
			$rtime = '2';
		else
			$rtime = $returntime;
		echo '<!doctype html><html><meta charset="utf-8"><body style="text-align:center;">';
		echo '<div style="width:930px;height:300px;margin:100px auto 0;font:12px/1.5 \'Microsoft Yahei\',Tahoma,\'Simsun\'">';
		echo '<meta http-equiv="refresh" content="' . $rtime . ';url=' . $url . '">';
		echo '<div style="border:2px #0da6c5 solid;margin-top:20px;"><div style="height:50px;width:5px;background:#15a3d5;float:left;margin-top:20px;"></div>
      <div style="font-size:35px;color:#50bdda;float:left;margin-left:10px;margin-top:15px;">提示信息</div>
      <div style="clear:both;"></div>
      <div style="height:50px;width:350px;margin:0 auto;font-size:22px;color: #48BCD3;text-align:left;">
        <font style="margin-left:10px;float:left;margin-top:20px;">' . $msg . '</font>
      </div><div style="clear:both;"></div>';
		echo '<div style="height:90px;font-size:12px;"><a href="' . $url . '" style="color:#48bcd3;margin-left:-41px;">如果您的浏览器没有跳转，请点击这里……</a></div>';
		echo '</div></div></body></html>';
		exit ();
	}
	/**
	 * 字符串截取
	 * @param unknown $str
	 * @param unknown $start
	 * @param unknown $len
	 * @return string
	 */
	public static function yacmsSubstr($str, $length, $start = 0, $charset = "utf-8", $suffix = true) {
		if (function_exists ( "mb_substr" )) {
			if (mb_strlen ( $str, $charset ) <= $length)
				return $str;
			$slice = mb_substr ( $str, $start, $length, $charset );
		} else {
			$re ['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
			$re ['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
			$re ['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
			$re ['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
			preg_match_all ( $re [$charset], $str, $match );
			if (count ( $match [0] ) <= $length)
				return $str;
			$slice = join ( "", array_slice ( $match [0], $start, $length ) );
		}
		
		if ($suffix)
			return $slice . "…";
		return $slice;
	}
	//时间转换函数(把时间显示人性化)
	public static function formatTime($time) {
		$rtime = date ( "m-d", $time );
		$htime = date ( "H:i", $time );
		$time = time () - $time;
		if ($time < 60) {
			$str = '刚刚';
		} elseif ($time < 60 * 60) {
			$min = floor ( $time / 60 );
			$str = $min . '分钟前';
		} elseif ($time < 60 * 60 * 24) {
			$h = floor ( $time / (60 * 60) );
			$str = $h . '小时前 ';
		} elseif ($time < 60 * 60 * 24 * 3) {
			$d = floor ( $time / (60 * 60 * 24) );
			if ($d == 1) {
				$str = '昨天 ';
			} else {
				$str = '前天 ';
			}
		} else {
			$str = $rtime;
		}
		return $str;
	}
	public static function getUserActionType($type){
		$str = '';
		switch ($type){//1推荐2下载3阅读4分享5收藏
			case 1:
				$str = '推荐';break;
			case 2:
				$str = '下载';break;
			case 3:
				$str = '阅读';break;
			case 4:
				$str = '分享';break;
			case 5:
				$str = '收藏';break;
			case 6:
				$str = '注册';break;
			case 7:
				$str = '登录';
		}
		return $str;
	}
}
