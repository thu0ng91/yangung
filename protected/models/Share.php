<?php

/**
 * This is the model class for table "{{share}}".
 *
 * The followings are the available columns in table '{{share}}':
 * @property string $id
 * @property integer $sortid
 * @property string $title
 * @property string $cover
 * @property string $author
 * @property string $summary
 * @property integer $fullflag
 * @property string $postid
 * @property string $poster
 * @property string $attachment
 * @property integer $status
 * @property string $dateline
 */
class Share extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Share the static model class
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
		return '{{share}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sortid, title, cover, author, summary, fullflag, postid, poster, attachment, status', 'required'),
			array('sortid, fullflag, status', 'numerical', 'integerOnly'=>true),
			array('title, cover, author, attachment', 'length', 'max'=>100),
			array('summary', 'length', 'max'=>255),
			array('postid,views,votes,price', 'length', 'max'=>8),
			array('poster', 'length', 'max'=>50),
			array('dateline', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, sortid, title, cover, author, summary, fullflag, postid, poster, attachment, status, dateline', 'safe', 'on'=>'search'),
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
			'novelSort' => array(self::BELONGS_TO,'NovelSort','sortid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'sortid' => '分类',
			'title' => '小说标题',
			'cover' => '小说封面',
			'author' => '原作者',
			'summary' => '简介',
			'fullflag' => '是否全本',
			'postid' => '发布者ID',
			'poster' => '发布者',
			'views' => '推荐数',
			'votes' => '点击数',
			'price' => '下载积分',
			'attachment' => 'TXT附件',
			'status' => '状态',
			'dateline' => '时间',
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
		$criteria->compare('sortid',$this->sortid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('cover',$this->cover,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('fullflag',$this->fullflag);
		$criteria->compare('postid',$this->postid,true);
		$criteria->compare('poster',$this->poster,true);
		$criteria->compare('attachment',$this->attachment,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('dateline',$this->dateline,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort' => array(
				'defaultOrder' => 'dateline desc, id asc',
			),
		    'pagination' => array('pageSize' => 20),
		));
	}
	public function getShareCover(){
		$path = CV::getFilePath($this->postid);
		return CHtml::image('/upload/novel/cover'.$path.$this->cover.'.jpg',$this->title,array('width'=>'88'));
	}
}