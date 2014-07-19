<?php
class Alipay {
    private $format = "xml";
	private $_input_charset = "utf-8";
    private $sign_type = "MD5";
    private $v = "2.0";
    public $partner;
    public $key;
    public $merchant_url;
    public $notify_url;
    public $call_back_url;
    public $seller_email;
    public $alipay_config;
 
 
	public function init()
    {
        require_once("alipay.config.php");
        require_once("lib/alipay_notify.class.php");
        require_once("lib/alipay_core.function.php");
        require_once("lib/alipay_md5.function.php");
        require_once("lib/alipay_submit.class.php");
        $this->alipay_config = $alipay_config;
        $this->alipay_config['key'] = $this->key;
        $this->alipay_config['partner'] = $this->partner;
    }
 
	public function buildForm($request)
    {
        //����Ҫ����Ĳ������飬����Ķ�
        $req_id = date('Ymdhis');
        $req_data = '<direct_trade_create_req><notify_url>' . $this->notify_url . '</notify_url><call_back_url>' . $this->call_back_url . '</call_back_url><seller_account_name>' . $this->seller_email . '</seller_account_name><out_trade_no>' . $request->out_trade_no . '</out_trade_no><subject>' . $request->subject . '</subject><total_fee>' . $request->total_fee . '</total_fee><merchant_url>' . $this->merchant_url . '</merchant_url></direct_trade_create_req>';
		$para_token = array(
				"service" => "alipay.wap.trade.create.direct",
				"partner" => trim($this->partner),
                "key" => $this->key,
                'sec_id'  => $this->sign_type,
				"format"  => $this->format,
                "v" => $this->v,
                "req_id"    => $req_id,
                "req_data"  => $req_data,
                "_input_charset"    => trim(strtolower($this->_input_charset))
		);
 
        //��������
        $alipaySubmit = new AlipaySubmit($this->alipay_config);
        $html_text = $alipaySubmit->buildRequestHttp($para_token);
 
        //URLDECODE���ص���Ϣ
        $html_text = urldecode($html_text);
 
        //����Զ��ģ���ύ�󷵻ص���Ϣ
        $para_html_text = $alipaySubmit->parseResponse($html_text);
 
        //��ȡrequest_token
        $request_token = $para_html_text['request_token'];
 
        /**************************������Ȩ��token���ý��׽ӿ�alipay.wap.auth.authAndExecute**************************/
 
        //ҵ����ϸ
        $req_data = '<auth_and_execute_req><request_token>' . $request_token . '</request_token></auth_and_execute_req>';
        //����
 
        //����Ҫ����Ĳ������飬����Ķ�
        $parameter = array(
                "service" => "alipay.wap.auth.authAndExecute",
                "partner" => trim($this->partner),
                'sec_id'  => $this->sign_type,
                "format"  => $this->format,
                "v" => $this->v,
                "req_id"    => $req_id,
                "req_data"  => $req_data,
                "_input_charset"    => trim(strtolower($this->_input_charset))
        );
 
		//��������
		$alipaySubmit = new AlipaySubmit($this->alipay_config);
		return $alipaySubmit->buildRequestForm($parameter,"get", "ȷ��");
    }
 
    public function verifyNotify(){
        $alipayNotify = new AlipayNotify($this->alipay_config);
        return $alipayNotify->verifyNotify();        
    }
 
    public function verifyReturn(){
        $alipayNotify = new AlipayNotify($this->alipay_config);
        return $alipayNotify->verifyReturn();
    }
 
    public function  log_result($word) {
        $file = Yii::getPathOfAlias('ext').DIRECTORY_SEPARATOR.'alipay'. DIRECTORY_SEPARATOR .'log_alipay.txt';
        $fp = fopen($file,"a");    
        flock($fp, LOCK_EX) ;
        fwrite($fp,$word."��ִ�����ڣ�".strftime("%Y%m%d%H%I%S",time())."\t\n");
        flock($fp, LOCK_UN); 
        fclose($fp);
    }
}