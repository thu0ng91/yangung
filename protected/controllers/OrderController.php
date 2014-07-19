<?php
class OrderController extends CController{
	public function actionAlipay(){
        $uid = Yii::app()->user->id;
        $this->alipayRequest($total, $order_id, $uid);
    }
 
    public function alipayRequest($total,$order_id,$uid){
        $alipay = Yii::app()->alipay;
        $request->out_trade_no = $order_id;
        $request->subject = "订单号：" . $order_id;
        $request->body = "订单金额" . $total . "元";
        $request->total_fee = $total;
        $form = $alipay->buildForm($request);
        echo $form;
        exit();
    }
 
    public function actionNotifyalipay(){
        $user_id = Yii::app()->user->id;
        $alipay = Yii::app()->alipay;
        $verify_result = $alipay->verifyNotify();
        if($verify_result) {
            $doc = new DOMDocument();
            $doc->loadXML($notify_data);
 
            if( ! empty($doc->getElementsByTagName( "notify" )->item(0)->nodeValue) ) {
                //商户订单号
                $out_trade_no = $doc->getElementsByTagName( "out_trade_no" )->item(0)->nodeValue;
                //支付宝交易号
                $trade_no = $doc->getElementsByTagName( "trade_no" )->item(0)->nodeValue;
                //交易状态
                $trade_status = $doc->getElementsByTagName( "trade_status" )->item(0)->nodeValue;
 
                if($_POST['trade_status'] == 'TRADE_FINISHED' || $_POST['trade_status'] == 'TRADE_SUCCESS') { 
                    //判断该订单是否已处理
                    //处理业务逻辑
                    echo 'success';
                }else{
                    $alipay->log_result('用户'.$user_id.'订单号:'.$out_trade_no.' 支付宝交易号：'.$trade_no.' 交易状态：'.$trade_status);
                    echo 'fail';
                }
            }
        }
 
    }
 
    /**
     * 付款成功页
     * @return [type] [description]
     */
    public function actionBackalipay() {
        $user_id = Yii::app()->user->id;
        $alipay = Yii::app()->alipay;
        $verify_result = $alipay->verifyReturn();
        if($verify_result) {
            //商户订单号
            $out_trade_no = $_GET['out_trade_no'];
            //支付宝交易号
            $trade_no = $_GET['trade_no'];
            //交易状态
            $result = $_GET['result'];
            //判断该订单是否已处理
            //处理业务逻辑
        }else {
            $alipay->log_result('用户'.$user_id.'订单号:'.$out_trade_no.' 支付宝交易号：'.$trade_no.' 交易状态：'.$result);
            $msg = '交易失败';
        }
        $this->render('backalipay',array(
            'msg'=>$msg,
            'order_id'=>$out_trade_no,
        ));
    }
}