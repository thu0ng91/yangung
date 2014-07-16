<?php
class MemberController extends CController{
	public function checkUser(){
		if(!Yii::app()->user->id){
			CV::showmsg('请先登录',Yii::app()->createUrl('site/login'));
			Yii::app()->end();
		}
	}
	public function actionUserinfo(){
		$userData = User::model()->findByPk(Yii::app()->user->id);
		if(null == $userData){
			$this->redirect(Yii::app()->createUrl('site/login'));
		}
		$this->pageTitle = '会员中心';
		$this->render('userinfo',array('user'=>$userData));
	}
	public function actionEdit(){
		$this->checkUser();
		$model = User::model()->findByPk(Yii::app()->user->id);
		if(isset($_POST['User'])){
				foreach ($_POST['User'] as $key=>$value){
					if($key == 'email'){
						$user['email'] = CHtml::encode($value);
					}
				}
				if($user['email'] == $model->email){
					CV::showmsg('邮件地址相同', Yii::app()->createUrl('member/edit'));
				}
				$model->attributes = $user;
				if($model->save()){
					$this->redirect(array('userinfo'));
				}
		}
		$this->pageTitle = '修改资料';
		$this->render('edit',array('model'=>$model));
	}
	public function actionPassword(){
		if(isset($_POST['User'])){
			$model = User::model()->findByPk(Yii::app()->user->id);
			if(md5(md5($_POST['User']['password']).$model->salt) != $model->password){
				CV::showmsg('原始密码错误，请输入正确的密码', Yii::app()->createUrl('member/password'));
			}
			if(empty($_POST['User']['newpw']) || $_POST['User']['newpw'] != $_POST['User']['newpw2']){
				CV::showmsg('新密码不完整', Yii::app()->createUrl('member/password'));
			}
			if(strlen($_POST['User']['newpw']) < 6){
				CV::showmsg('密码长度不小于6位', Yii::app()->createUrl('member/password'));
			}
			$user['password'] = md5(md5($_POST['User']['newpw']).$model->salt);
			$model->attributes = $user;
			if($model->save()){
				CV::showmsg('恭喜，新密码已经设置成功！', Yii::app()->createUrl('member/userinfo'));
			}
		}
		$this->checkUser();
		$this->pageTitle = '修改密码';
		$this->render('password');
	}
	public function actionAvatar(){
		
		$model = User::model()->findByPk(Yii::app()->user->id);
		if(isset($_POST['User'])){
			
			$model->attributes=$_POST['User'];
			if(isset($_FILES['User']['name']['avatar']) && !empty($_FILES['User']['name']['avatar'])){
				$file = CUploadedFile::getInstance($model,'avatar');
				$filename = $file->getName();//获取文件名
				$filesize = $file->getSize();//获取文件大小
				$filetype = $file->getType();//获取文件类型
				$filename1 = iconv("utf-8", "gb2312", $filename);//这里是处理中文的问题，非中文不需要
				$uploadPath = "./upload/user/avatar".CV::getFilePath($model->uid);
				$uploadfile = $uploadPath.$filename1;
				CV::dmkdir($uploadPath);
				$file->saveAs($uploadfile,true);//上传操作
				$nowtime = time();
				rename($uploadfile,$uploadPath.$nowtime.'.jpg');
				$model->avatar = $nowtime;
			}
			if($model->validate() && $model->save()){
				CV::showmsg('恭喜，新头像已经设置成功！', Yii::app()->createUrl('member/userinfo'));
			}
		}
		
		$this->checkUser();
		$this->pageTitle = '修改头像';
		$this->render('avatar',array('model'=>$model));
	}
	public function actionResetpw(){
		$this->checkUser();
		$model = new User();
		if(isset($_POST['User'])){
			$message = '找回密码邮件，请点击<a href="http://www.yacms.com">http://www.yacms.com</a>';
			$str = Yii::app()->params['sitename'].'找回密码';
			$mail = new Mail();
			var_dump($mail->SendMail($message, $message, $_POST['User']['email']));exit;
			$mail->SendMail($message, $message, $_POST['User']['email']);
			
			CV::showmsg('找回密码邮件已经发送！', Yii::app()->createUrl('site/login'));
		}
		$this->pageTitle = '找回密码';
		$this->render('resetpw',array('model'=>$model));
	}
	public function actionReg(){
		
		$model = new User();
		if(isset($_POST['User'])){
			if(empty($_POST['User']['password']) || $_POST['User']['password'] != $_POST['User']['password2']){
				CV::showmsg('密码为空或者两次密码不一致', Yii::app()->createUrl('member/reg'));
			}
			if(strlen($_POST['User']['password']) < 6){
				CV::showmsg('密码长度不得小于6位', Yii::app()->createUrl('member/reg'));
			}
			//ucenter 
		//$ucenter = new UCenter();
		//验证用户名是否存在
        $flag = Yii::app()->user->uc->findByName($_POST['User']['username']);
        if($flag!=null){
            echo "<script type='text/javascript'>alert('用户名已经存在');history.back();</script>";
            //$errMsg='用户名已经存在';
            exit;
         }

                    //验证邮箱是否存在
//                    $flag = uc_user_checkemail($email);
//                    if($flag == -4)
//                    {
//                        echo "<script type='text/javascript'>alert('Email 格式有误');history.back();</script>";
//                        //$errMsg='Email 格式有误';
//                        exit;
//                    }elseif($flag==-5){
//                        echo "<script type='text/javascript'>alert('Email 不允许注册');history.back();</script>";
//                        //$errMsg='Email 不允许注册';
//                        exit;
//                    }elseif($flag==-6){
//                        echo "<script type='text/javascript'>alert('该 Email 已经被注册');history.back();</script>";
//                        //$errMsg='该 Email 已经被注册';
//                        exit;
//                    }
        //$uid = $ucenter->userRegister($_POST['User']['username'], $_POST['User']['password'], $_POST['User']['email']);//注册用户至ucenter
        $data = array(
        	'username'=>addslashes($_POST['User']['username']),
        	'password'=>addslashes($_POST['User']['password']),
        	'email'=>addslashes($_POST['User']['email']),
        );
        Yii::app()->user->uc->add($data);
        CV::showmsg('恭喜，注册成功！请及时验证您的邮箱！', Yii::app()->createUrl('member/userinfo'));
        exit;
        
			$_POST['User']['salt'] = rand(100000,999999);
			$_POST['User']['password'] = md5(md5($_POST['User']['password']).$_POST['User']['salt']);
			$model->attributes = $_POST['User'];
			$model->groupid = Yii::app()->params['firstgroup'];
			if($model->validate() && $model->save()){
				NovelLog::model()->insertLog(Yii::app()->user->id,0,6);
				CV::showmsg('恭喜，注册成功！请及时验证您的邮箱！', Yii::app()->createUrl('member/userinfo'));
			}
		}
		$this->pageTitle = '用户注册';
		$this->render('reg',array('model'=>$model));
	}
	public function actionShare(){
		$this->checkUser();

		$id = Yii::app()->request->getParam('id',null);
		if(null == $id){
			$model = new Share();
		}else{
			$model = Share::model()->findByPk($id);
		}
		$todaytime = strtotime(date('Y-m-d',time()));
		$sql = 'select count(*) as count from {{share}} where postid='.Yii::app()->user->id.' and dateline>'.$todaytime;
		$todayShare = Share::model()->countBySql($sql);
		if($todayShare >= Yii::app()->params['maxshare']){
			CV::showmsg('每人每天最多分享'.Yii::app()->params['maxshare'].'次','/');
		}
		if(isset($_POST['Share'])){
			if(isset($_FILES['Share']['name']['cover']) && !empty($_FILES['Share']['name']['cover'])){
				$file = CUploadedFile::getInstance($model,'cover');
				$filename = $file->getName();//获取文件名
				$filesize = $file->getSize();//获取文件大小
				$filetype = $file->getType();//获取文件类型
				$filename1 = iconv("utf-8", "gb2312", $filename);//这里是处理中文的问题，非中文不需要
				$uploadPath = "./upload/novel/cover/".CV::getFilePath(Yii::app()->user->id);
				$uploadfile = $uploadPath.$filename1;
				CV::dmkdir($uploadPath);
				$file->saveAs($uploadfile,true);//上传操作
				$nowtime = time();
				rename($uploadfile,$uploadPath.$nowtime.'.jpg');
				$_POST['Share']['cover'] = $nowtime;
			}else{
				unset($_POST['Share']['cover']);
			}
			if(isset($_FILES['Share']['name']['attachment']) && !empty($_FILES['Share']['name']['attachment'])){
				$file = CUploadedFile::getInstance($model,'attachment');
				$filename = $file->getName();//获取文件名
				$filesize = $file->getSize();//获取文件大小
				$filetype = $file->getType();//获取文件类型
				$filename1 = iconv("utf-8", "gb2312", $filename);//这里是处理中文的问题，非中文不需要
				$uploadPath = "./upload/novel/txt/".CV::getFilePath(Yii::app()->user->id);
				$uploadfile = $uploadPath.$filename1;
				CV::dmkdir($uploadPath);
				$file->saveAs($uploadfile,true);//上传操作
				$nowtime = time();
				rename($uploadfile,$uploadPath.$nowtime.'.txt');
				$_POST['Share']['attachment'] = $nowtime;
			}else{
				unset($_POST['Share']['attachment']);
			}
			$model->attributes=$_POST['Share'];
			if($id == null){
				if(null != Share::model()->findByAttributes(array('title'=>$model->title))){
					CV::showmsg('该电子书已经存在',Yii::app()->createUrl('member/share'));
				}
			}
			$model->postid = Yii::app()->user->id;
			$model->poster = Yii::app()->user->name;
			if(null == $id){
				$model->status = Yii::app()->params['share_default_status'];
			}
			if($model->validate() && $model->save()){
				if(null != $id){
					$message = '修改成功';
				}else{
					$userinfo = User::model()->findByPk(Yii::app()->user->id);
					$userinfo->golds += Yii::app()->params['share_golds'];
					$userinfo->save();
					NovelLog::model()->insertLog(Yii::app()->user->id,$model->id,4);
					$message = '恭喜，分享成功，获得'.Yii::app()->params['share_golds'].'积分';
				}
				CV::showmsg($message, Yii::app()->createUrl('member/myshare'));
			}
		}
		$sortResult = NovelSort::model()->findAll();

		$sort = array();
		foreach ($sortResult as $value){
			$sort[$value->id] = $value->name;
		}
		$this->pagetitle = '授权中心';
		$this->render('share',array('model'=>$model,'sort'=>$sort));
	}
	public function actionMyShare(){
		$this->checkUser();
		$criteria = new CDbCriteria;
		$criteria->order='id DESC';
		$criteria->addCondition('postid='.Yii::app()->user->id);
		$count=Share::model()->count($criteria);
		$pager = new CPagination($count);
		$pager->pageSize=20;
		$pager->applyLimit($criteria);
		$shareData=Share::model()->findAll($criteria);
		
		$this->pagetitle = '我的分享';
		$this->render('myshare',array('shareData'=>$shareData,'pages'=>$pager));
	}
	public function actionBookcase(){
		$this->checkUser();
		$this->pageTitle = '我的书包';
		$data = Bookcase::model()->findAllByAttributes(array('uid'=>Yii::app()->user->id));
		$this->render('bookcase',array('data'=>$data));
	}
}