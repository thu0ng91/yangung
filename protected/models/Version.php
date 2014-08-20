<?php

/**
 * This is the model class for table "{{version}}".
 *
 * The followings are the available columns in table '{{version}}':
 * @property string $id
 * @property string $title
 * @property string $version_number
 * @property string $price
 * @property string $posttime
 */
class Version extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Version the static model class
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
		return '{{version}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, version_number, price, posttime', 'required'),
			array('title, version_number', 'length', 'max'=>25),
			array('price', 'length', 'max'=>6),
			array('posttime', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, version_number, price, posttime,updatelog', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'version_number' => 'Version Number',
			'price' => 'Price',
			'posttime' => 'Posttime',
			'updatelog' => 'updatelog',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('version_number',$this->version_number,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('posttime',$this->posttime,true);
		$criteria->compare('updatelog',$this->updatelog,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}