<?php

class User2 extends CActiveRecord
{
	public $password2;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return "{{user2}}";
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('regip, groupid', 'numerical', 'integerOnly'=>true),
			array('regdate, avatar, golds', 'length', 'max'=>11),
			array('username', 'length', 'max'=>16),
			array('password', 'length', 'max'=>32),
			array('emailstatus', 'length', 'max'=>1),
			array('salt', 'length', 'max'=>8),
			array('email', 'length', 'max'=>40),
			array('username', 'unique', 'message'=>'该用户已经存在'),
			//array('email', 'unique', 'message'=>'该邮箱已经存在'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('uid, regip, regdate, username, password, salt, email, groupid, avatar, golds', 'safe', 'on'=>'search'),
		);
	}
	public function checkUsername(){
		$data = User2::model()->findByAttributes(array('username'=>$this->username));
		if(null != $data){
			$this->addError('username','此用户名已经存在');
		}
	}
	public function beforeSave(){
		if ($this->isNewRecord){
			$this->regdate = time();
			$this->regip = CV::getIP();
			$this->emailstatus = 2;
		}
		return parent::beforeSave();
	}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'group'=>array(self::BELONGS_TO,'Group','groupid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uid' => 'Uid',
			'regip' => '注册IP',
			'regdate' => '注册日期',
			'username' => '用户名',
			'password' => '密码',
			'salt' => 'Salt',
			'email' => '邮件',
			'groupid' => '用户组',
			'avatar' => '头像',
			'golds' => '积分',
			'emailstatus' => '邮件认证',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('uid',$this->uid,true);
		$criteria->compare('regip',$this->regip);
		$criteria->compare('regdate',$this->regdate,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('groupid',$this->groupid);
		$criteria->compare('avatar',$this->avatar,true);
		$criteria->compare('golds',$this->golds,true);
		$criteria->compare('emailstatus',$this->emailstatus,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort' => array(
					'defaultOrder' => 'uid desc',
			),
			'pagination' => array('pageSize' => 25),
		));
	}
	public function getUserInfo(){
		if(Yii::app()->user->id == null){
			return false;
		}else{
			$user = User2::model()->findByPk(Yii::app()->user->id);
			return $user;
		}
	}
    public function getGroupName(){
        $data = Group::model()->findByPk($this->groupid);
        if(null != $data){
            return $data->name;
        }
    }
    public function getUserAvatar(){
    	$data = self::model()->findByPk($this->uid);
    	if(null != $data){
    		return '/upload/user/avatar'.CV::getFilePath($this->uid).$this->avatar.'.jpg';
    	}else{
    		return false;
    	}
    }
    public function getUserAvatarByUid($uid){
    	$data = self::model()->findByPk($uid);
    	if(null != $data){
    		return '/upload/user/avatar'.CV::getFilePath($uid).$data->avatar.'.jpg';
    	}else{
    		return false;
    	}
    }
}