<?php

/**
 * This is the model class for table "{{ucenter_members}}".
 *
 * The followings are the available columns in table '{{ucenter_members}}':
 * @property integer $uid
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $myid
 * @property string $myidkey
 * @property string $regip
 * @property string $regdate
 * @property integer $lastloginip
 * @property string $lastlogintime
 * @property string $salt
 * @property string $secques
 */
class UcenterMembers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UcenterMembers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return CDbConnection database connection
	 */
	public function getDbConnection()
	{
		return Yii::app()->ucdb;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{ucenter_members}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('salt', 'required'),
			array('lastloginip', 'numerical', 'integerOnly'=>true),
			array('username, regip', 'length', 'max'=>15),
			array('password, email', 'length', 'max'=>32),
			array('myid', 'length', 'max'=>30),
			array('myidkey', 'length', 'max'=>16),
			array('regdate, lastlogintime', 'length', 'max'=>10),
			array('salt', 'length', 'max'=>6),
			array('secques', 'length', 'max'=>8),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('uid, username, password, email, myid, myidkey, regip, regdate, lastloginip, lastlogintime, salt, secques', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uid' => 'Uid',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'myid' => 'Myid',
			'myidkey' => 'Myidkey',
			'regip' => 'Regip',
			'regdate' => 'Regdate',
			'lastloginip' => 'Lastloginip',
			'lastlogintime' => 'Lastlogintime',
			'salt' => 'Salt',
			'secques' => 'Secques',
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

		$criteria->compare('uid',$this->uid);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('myid',$this->myid,true);
		$criteria->compare('myidkey',$this->myidkey,true);
		$criteria->compare('regip',$this->regip,true);
		$criteria->compare('regdate',$this->regdate,true);
		$criteria->compare('lastloginip',$this->lastloginip);
		$criteria->compare('lastlogintime',$this->lastlogintime,true);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('secques',$this->secques,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}