<?php

/**
 * This is the model class for table "{{zhanzhang_tongji}}".
 *
 * The followings are the available columns in table '{{zhanzhang_tongji}}':
 * @property string $id
 * @property string $domain
 * @property string $version
 * @property string $dateline
 */
class ZhanzhangTongji extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ZhanzhangTongji the static model class
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
		return '{{zhanzhang_tongji}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('domain, version, dateline,count', 'required'),
			array('domain', 'length', 'max'=>255),
			array('version', 'length', 'max'=>50),
			array('dateline', 'length', 'max'=>11),
			array('count', 'length', 'max'=>6),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, domain, version, dateline', 'safe', 'on'=>'search'),
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
			'domain' => 'Domain',
			'version' => 'Version',
			'dateline' => 'Dateline',
			'count' => 'Count',
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
		$criteria->compare('domain',$this->domain,true);
		$criteria->compare('version',$this->version,true);
		$criteria->compare('dateline',$this->dateline,true);
		$criteria->compare('count',$this->count,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}