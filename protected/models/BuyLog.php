<?php

/**
 * This is the model class for table "{{buy_log}}".
 *
 * The followings are the available columns in table '{{buy_log}}':
 * @property string $id
 * @property string $uid
 * @property string $username
 * @property string $version_number
 * @property string $price
 * @property string $buytime
 * @property string $endtime
 */
class BuyLog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BuyLog the static model class
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
		return '{{buy_log}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, username, version_number, price, buytime, endtime', 'required'),
			array('uid', 'length', 'max'=>8),
			array('username', 'length', 'max'=>25),
			array('version_number', 'length', 'max'=>10),
			array('price', 'length', 'max'=>6),
			array('buytime, endtime', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid, username, version_number, price, buytime, endtime', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'uid' => 'Uid',
			'username' => 'Username',
			'version_number' => 'Version Number',
			'price' => 'Price',
			'buytime' => 'Buytime',
			'endtime' => 'Endtime',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('uid',$this->uid,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('version_number',$this->version_number,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('buytime',$this->buytime,true);
		$criteria->compare('endtime',$this->endtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}