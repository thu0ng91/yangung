<?php

/**
 * This is the model class for table "{{setting}}".
 *
 * The followings are the available columns in table '{{setting}}':
 * @property integer $id
 * @property string $skey
 * @property string $svalue
 */
class Setting extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Setting the static model class
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
		return '{{setting}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('identifier, skey, svalue', 'required'),
			array('skey, identifier', 'length', 'max'=>255),
			array('skey','checkExists'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, skey, identifier, svalue', 'safe', 'on'=>'search'),
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
			'identifier' => '配置说明',
			'skey' => '配置名',
			'svalue' => '配置值',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('identifier',$this->identifier,true);
		$criteria->compare('skey',$this->skey,true);
		$criteria->compare('svalue',$this->svalue,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getFormatContent($content) {
		$content_array = json_decode($content,true) ? json_decode($content,true) : $content;
		$temp = '';
        $count = count($content_array);
        if(is_array($content_array)) {
	        foreach($content_array as $key => $val) {
			     $temp .= $key.':'.$val."\n";
			}
        } else {
        	$temp = $content_array;
        }
		return rtrim($temp,"\n");
	}
	public function checkExists() {
		if(isset($this->id)) { 
			$model = self::model()->findByPk($this->id,array('select' => 'skey'));
			if($model->skey == $this->skey) {
				return true;
			}
		}
		if(self::model()->exists('skey=\''.$this->skey.'\'')) {
			$this->addError('skey','此标识对应的配置项已存在');
		}
	}
	protected function beforeSave(){		
		$this->setBeforeSaveContent();
		return parent::beforeSave();
	}
	
	public function afterFind() {
		if(isset($this->svalue) && !empty($this->svalue)) {
			//$this->svalue = $this->getFormatContent($this->svalue);	
		}
	}
	public function setBeforeSaveContent() {
		$content = explode("\n",trim($this->svalue));

		if(is_array($content) && count($content) > 1) {
		  $temp = array();		  
			foreach($content as $val) {
				$colon_position = strpos($val,':');
				if($colon_position === false) {
					throw new CException('您输入的配置信息格式有误！');
				}
				$val_key = substr($val,0,$colon_position);
				$val_value = substr($val,$colon_position + 1);
				$temp[$val_key] = $val_value;
			}
            $temp = json_encode($temp);
            $this->svalue = $temp;
		} else {
            $this->svalue = $content[0];
		}
		
		$this->skey = strtolower($this->skey);
	}

	public function getConf($skey) {
		$model = self::model()->findByAttributes(array('skey' => $skey),array('select' => 'svalue','limit' => 1));
		if($model === null) {
			return false;
		}
		return json_decode($model->svalue,true);
	}
}