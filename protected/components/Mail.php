<?php
class Mail{
	public $mail;
	public function __construct(){
		Yii::import('application.extensions.phpmailer.JPhpMailer');
		$this->mail = new JPhpMailer();
		$this->mail->IsSMTP();
		$this->mail->SMTPAuth = TRUE;
		//$mailer->SMTPSecure = "ssl";
		//$mailer->Host = "smtp.gmail.com";
		//$mailer->Port = 465;
		$this->mail->CharSet = 'UTF-8';
		$this->mail->Host = Yii::app()->params['email_smtp']['host'];
		$this->mail->Port = Yii::app()->params['email_smtp']['port'];
		$this->mail->Username = Yii::app()->params['email_smtp']['username'];  // Change this to your gmail adress
		$this->mail->Password = Yii::app()->params['email_smtp']['password'];  // Change this to your gmail password
		$this->mail->FromName = Yii::app()->params['email_smtp']['username']; // This is the from name in the email, you can put anything you like here
		$this->mail->From = Yii::app()->params['sitename'];
	}
	public function SendMail($str,$subject,$tomail){
		$this->mail->Body = $str;
		$this->mail->Subject = "=?utf-8?B?" . base64_encode($subject) . "?=";
		$this->mail->AddAddress($tomail);
		
		if($this->mail->Send()){
			return true;
		}else{
			return false;
		}
	}
}