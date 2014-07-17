<?php

/**
 * This is the model class for table "{{group}}".
 *
 * The followings are the available columns in table '{{group}}':
 * @property integer $groupid
 * @property string $name
 * @property integer $creditsfrom
 * @property integer $creditsto
 * @property integer $maxcredits
 * @property integer $maxgolds
 * @property integer $allowread
 * @property integer $allowthread
 * @property integer $allowpost
 * @property integer $allowreply
 * @property integer $allowattach
 * @property integer $allowdown
 * @property integer $allowtop
 * @property integer $allowdigest
 * @property integer $allowupdate
 * @property integer $allowdelete
 */
class Group extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Group the static model class
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
		return '{{group}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('groupid', 'required'),
			array('groupid, creditsfrom, creditsto, allowread, allowpost, allowreply, allowattach, allowdown, allowtop, allowdigest, allowupdate, allowdelete', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>20),
			array('version_nums', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('groupid, name,version_nums, creditsfrom, creditsto, allowread, allowpost, allowreply, allowattach, allowdown, allowtop, allowdigest, allowupdate, allowdelete', 'safe', 'on'=>'search'),
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
			'groupid' => '组ID',
			'name' => '组名',
			'creditsfrom' => '积分下限',
			'creditsto' => '积分上限',
			'allowread' => '可读权限',
			'allowpost' => '主题权限',
			'allowreply' => '回复权限',
			'allowattach' => '附件权限',
			'allowdown' => '下载权限',
			'allowtop' => '置顶权限',
			'allowdigest' => '推荐权限',
			'allowupdate' => '更新权限',
			'allowdelete' => '删除权限',
			'version_nums' => '允许授权域名数',
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

		$criteria->compare('groupid',$this->groupid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('creditsfrom',$this->creditsfrom);
		$criteria->compare('creditsto',$this->creditsto);
		$criteria->compare('allowread',$this->allowread);
		$criteria->compare('allowpost',$this->allowpost);
		$criteria->compare('allowreply',$this->allowreply);
		$criteria->compare('allowattach',$this->allowattach);
		$criteria->compare('allowdown',$this->allowdown);
		$criteria->compare('allowtop',$this->allowtop);
		$criteria->compare('allowdigest',$this->allowdigest);
		$criteria->compare('allowupdate',$this->allowupdate);
		$criteria->compare('allowdelete',$this->allowdelete);		
		$criteria->compare('version_nums',$this->version_nums,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}