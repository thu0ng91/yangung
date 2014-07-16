<?php

/**
 * This is the model class for table "{{article}}".
 *
 * The followings are the available columns in table '{{article}}':
 * @property string $id
 * @property string $title
 * @property string $content
 * @property string $views
 * @property integer $votes
 * @property string $author
 * @property string $author_id
 * @property integer $status
 * @property integer $category_id
 * @property string $dateline
 */
class Article extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Article the static model class
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
		return '{{article}}';
	}
	public function beforeSave(){
        if ($this->isNewRecord){
            $this->dateline = time();
        }    
        return parent::beforeSave();
    }
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content, views, votes, author, author_id, status, category_id', 'required'),
			array('votes, status, category_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('views, author_id', 'length', 'max'=>8),
			array('author', 'length', 'max'=>50),
			array('istop', 'length', 'max'=>1),
			array('index_image', 'length', 'max'=>255),
			array('dateline', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, content, views, votes, author, author_id, status, category_id, dateline, istop', 'safe', 'on'=>'search'),
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
			'title' => '标题',
			'content' => '内容',
			'index_image' => '封面',
			'views' => '点击数',
			'votes' => '推荐数',
			'author' => '作者',
			'author_id' => '作者ID',
			'status' => '状态',
			'category_id' => '分类',
			'istop' => '置顶',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('index_image',$this->index_image,true);
		$criteria->compare('views',$this->views,true);
		$criteria->compare('votes',$this->votes);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('author_id',$this->author_id,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('istop',$this->istop,true);
		$criteria->compare('dateline',$this->dateline,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getArticleUrl(){
		return CHtml::link($this->title,'/article/'.$this->id.'.html');
	}
	public function getArticleCategory(){
		$category = ArticleCategory::model()->findByPk($this->category_id);
		if(null != $category){
			return $category->category_name;
		}
		return '无分类';
	}
	public function getArticleList($category_id, $limit){
		$data = self::model()->findAllByAttributes(array('status'=>1,'category_id'=>$category_id), array('limit'=>$limit,'select'=>'id, title, dateline,istop','order'=>'id desc'));
		return $data;
	}
}