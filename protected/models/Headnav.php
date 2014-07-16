<?php

/**
 * This is the model class for table "{{headnav}}".
 *
 * The followings are the available columns in table '{{headnav}}':
 * @property string $id
 * @property string $name
 * @property string $url
 * @property integer $status
 * @property integer $target
 */
class Headnav extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Headnav the static model class
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
		return '{{headnav}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, url, status, target', 'required'),
			array('status, target, sequence', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('sequence', 'length', 'max'=>6),
			array('url', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, url, status, target, sequence', 'safe', 'on'=>'search'),
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
			'name' => '菜单名',
			'url' => '链接',
			'status' => '状态',
			'target' => '打开方式',
			'sequence' => '排序',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('target',$this->target);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}