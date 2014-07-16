<?php

/**
 * This is the model class for table "{{novel_log}}".
 *
 * The followings are the available columns in table '{{novel_log}}':
 * @property string $id
 * @property string $uid
 * @property string $nid
 * @property integer $type
 * @property string $dateline
 */
class NovelLog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return NovelLog the static model class
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
		return '{{novel_log}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, nid, type, dateline', 'required'),
			array('type', 'numerical', 'integerOnly'=>true),
			array('id, uid, nid', 'length', 'max'=>8),
			array('dateline', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid, nid, type, dateline', 'safe', 'on'=>'search'),
		);
	}
	public function beforeSave(){
		if ($this->isNewRecord){
			$this->dateline = time();
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
			'user'=>array(self::BELONGS_TO,'User','uid'),
			'share'=>array(self::BELONGS_TO,'Share','nid'),
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
			'nid' => 'Nid',
			'type' => 'Type',
			'dateline' => 'Dateline',
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
		$criteria->compare('nid',$this->nid,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('dateline',$this->dateline,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function insertLog($uid,$nid,$type,$dateline = FALSE){
		if($dateline != FALSE){
			$novellog = NovelLog::model()->findByAttributes(array('uid'=>$uid,'nid'=>$nid,'type'=>$type));
			if(null != $novellog){
				$novellog->dateline = $dateline;
				$novellog->save();
			}
			return;
		}
		$model = new NovelLog();
		$model->uid = $uid;
		$model->nid = $nid;
		$model->type = $type;
		$model->dateline = time();
		
		$model->save();
	}
}