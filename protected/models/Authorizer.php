<?php

/**
 * This is the model class for table "{{authorizer}}".
 *
 * The followings are the available columns in table '{{authorizer}}':
 * @property string $id
 * @property string $username
 * @property string $uid
 * @property string $url
 * @property string $version
 * @property integer $type
 * @property string $dateline
 */
class Authorizer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Authorizer the static model class
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
		return '{{authorizer}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, uid, url, version, type, dateline', 'required'),
			array('type', 'numerical', 'integerOnly'=>true),
			array('username, version', 'length', 'max'=>25),
			array('uid', 'length', 'max'=>8),
			array('url,sqm', 'length', 'max'=>255),
			array('dateline', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, uid, url, version, type, dateline,sqm', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'uid' => 'Uid',
			'url' => 'Url',
			'version' => 'Version',
			'type' => 'Type',
			'dateline' => 'Dateline',
			'sqm' => 'Sqm',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('uid',$this->uid,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('version',$this->version,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('dateline',$this->dateline,true);
		$criteria->compare('sqm',$this->sqm,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getVersion($version){
		$r = Version::model()->findByAttributes(array('version_number'=>$version));
		if(null != $r){
			return $r->title;
		}else{
			return '未知版本';
		}
		switch ($version){
			case 1:
				$vname = '免费版';break;
			case 2:
				$vname = '基础版';break;
			case 3:
				$vname = '标准版';break;
			case 4:
				$vname = '高级版';break;
			case 5:
				$vname = '豪华版';break;
			default:
				$vname = '免费版';
		}
		return $vname;
	}
}