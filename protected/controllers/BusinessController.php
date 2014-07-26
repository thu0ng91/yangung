<?php
class BusinessController extends CController{

	public function beforeAction(){
		if(!Yii::app()->user->id){
			CV::showmsg('请先登录',Yii::app()->createUrl('site/login'));
			Yii::app()->end();
		}
		return true;
	}
	public function actionCenter(){
		$your = Authorizer::model()->findAllByAttributes(array('uid'=>Yii::app()->user->id));
		
		$this->render('index',array('your'=>$your));
	}
	public function actionAdd(){
		$version = Version::model()->findAll();
		$id = Yii::app()->request->getParam('id',null);
		$model = null;
		if(null != $id){
			$model = Authorizer::model()->findByPk($id);
			if(null == $model){
				CV::showmsg('未知错误，请联系管理员',Yii::app()->createUrl('business/center'));
			}
		}
		if(Yii::app()->request->isPostRequest){
			$url = Yii::app()->request->getParam('url',null);
			$reset = Yii::app()->request->getParam('reset',null);
			if(null != $reset){
				$model = Authorizer::model()->findByAttributes(array('url'=>$url,'uid'=>Yii::app()->user->id));
				if(null == $model){
					CV::showmsg('未知错误，请联系管理员',Yii::app()->createUrl('business/center'));
				}
				$model->version = addslashes($_POST['version']);
				$versionsys = Version::model()->findByAttributes(array('version_number'=>$model->version));
				if($versionsys->price != 0){
					$buy = BuyLog::model()->findByAttributes(array('username'=>Yii::app()->user->name,'version_number'=>$model->version));
					if(null == $buy){
						CV::showmsg('您未购买该版本授权',Yii::app()->createUrl('business/add'));
					}					
					$endtime = $buy->endtime;
				}else{
					$endtime = time()+86400*365;
				}
				$model->sqm = $this->create_sqm($url,$model->version,$endtime);
				if($model->save()){
					CV::showmsg('增加新域名授权成功',Yii::app()->createUrl('business/center'));
				}
			}
			if(null == $url){
				CV::showmsg('域名不能为空',Yii::app()->createUrl('business/add'));
			}
			if (!preg_match('/^([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i',$url)) {
			    CV::showmsg('域名格式错误',Yii::app()->createUrl('business/add'));
			}
			$result = Authorizer::model()->findByAttributes(array('url'=>$url));
			if(null != $result){
				CV::showmsg('该域名已经授权',Yii::app()->createUrl('business/add'));
			}
			
			$model = new Authorizer();
			$model->username = Yii::app()->user->name;
			$model->uid = Yii::app()->user->id;
			$model->url = $url;
			$model->version = addslashes($_POST['version']);
			$versionsys = Version::model()->findByAttributes(array('version_number'=>$model->version));
			$nums = Authorizer::model()->countByAttributes(array('uid'=>Yii::app()->user->id,'type'=>2));
			$userinfo = User2::model()->findByAttributes(array('username'=>Yii::app()->user->name),array('select'=>'groupid'));
			$usergroup = Group::model()->findByPk($userinfo->groupid);

			if($versionsys->price != 0 && $nums >= $usergroup->version_nums){
				CV::showmsg('域名授权已经达到上限，请联系管理员',Yii::app()->createUrl('business/add'));
			}
			if($versionsys->price == 0){
				$model->type = 1;
			}else{
				$model->type = 2;
			}

			$model->dateline = time();
			
			if($model->type == 2){
				$buy = BuyLog::model()->findByAttributes(array('username'=>Yii::app()->user->name,'version_number'=>$model->version));
				if(null == $buy){
					CV::showmsg('您未购买该版本授权',Yii::app()->createUrl('business/add'));
				}					
				$endtime = $buy->endtime;
			}else{
				$endtime = time()+86400*365;
			}
			$model->sqm = $this->create_sqm($url,$model->version,$endtime);
			if($model->save()){
				CV::showmsg('增加新域名授权成功',Yii::app()->createUrl('business/center'));
			}
			CV::showmsg('域名授权未成功，请联系官方',Yii::app()->createUrl('business/center'));
		}
		$this->render('add',array('version'=>$version,'model'=>$model));
	}
	public function actionDownload(){
		$shouquan = Authorizer::model()->findAllByAttributes(array('uid'=>Yii::app()->user->id));
		$data = array();
		foreach($shouquan as $v){
			$version = Version::model()->findByAttributes(array('version_number'=>$v->version));
			$data[] = $version;
		}
		$this->render('download',array('data'=>$data));
	}
	public function actionDodownload(){
		$uid = Yii::app()->request->getParam('uid',null);
		$time = Yii::app()->request->getParam('time',null);
		$version = Yii::app()->request->getParam('version',null);
		$result = Authorizer::model()->findByAttributes(array('uid'=>$uid));
		if(null == $result){
			CV::showmsg('非法下载',Yii::app()->createUrl('site/index'));
		}
		$fileUrl = Yii::app()->baseUrl.'/downs/'.$result->version.'.zip';
		echo $fileUrl;exit;
		$fileName = '云阅小说系统'.$result->version.'.zip';
		/*$data = file_get_contents($fileUrl);
		header("Content-type: application/octet-stream");
		header("Accept-Ranges: bytes");
		header("Accept-Length: ".filesize($fileUrl));
		header("Content-Disposition: attachment; filename=" . $fileName);
		echo $data;
		*/
		/////

		if   (!file_exists($fileUrl))   {   //检查文件是否存在  
		  echo   "文件找不到";  
		  exit;    
		}else{  
			$file = fopen($fileUrl,"r"); // 打开文件
			// 输入文件标签
			Header("Content-type: application/octet-stream");
			Header("Accept-Ranges: bytes");
			Header("Accept-Length: ".filesize($fileUrl));
			Header("Content-Disposition: attachment; filename=" . $fileName);
			// 输出文件内容
			echo fread($file,filesize($fileUrl));
			fclose($file);
		}
	}
	public function actionComment(){
		echo 'comment';
	}
	public function create_sqm($domain,$version,$endtime) {
		$sep = "|";
		
		$pubKey = $domain . $sep . $version . $sep . $endtime;
		$privKey = 'yun yue novel systme';
		$des = new STD3Des($pubKey, $privKey);
		
		$v = array(
		'domain' => $domain,
		'version' => $version,
		'username' => Yii::app()->user->name,
		);
		
		$v = serialize($v);
		$hash = $des->encrypt($v);

	    return $hash;
	}
}