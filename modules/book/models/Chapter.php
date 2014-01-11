<?php

/**
 * This is the model class for table "volume".
 *
 * The followings are the available columns in table 'volume':
 * @property string $id
 * @property integer $bookid
 * @property string $title
 * @property integer $chaptercount
 * @property integer $wordcount
 * @property integer $createtime
 * @property integer $updatetime
 * @property integer $sort
 */
class Chapter extends CActiveRecord
{
    public $content = null;
//    public $wordcount = 0;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Volume the static model class
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
		return 'chapter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('bookid,title,volumeid', 'required'),
			array('bookid,volumeid,createtime,chapterorder,contenttype,wordcount', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('content', 'length', 'max'=>50000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, bookid, title,volumeid, createtime, sort', 'safe', 'on'=>'search'),
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
            'book' => array(CActiveRecord::BELONGS_TO, 'Book', 'bookid'),
            'volume' => array(CActiveRecord::BELONGS_TO, 'Volume', 'volumeid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'bookid' => '所属小说',
			'volumeid' => '所属分卷',
			'chapterorder' => '章节序号',
			'contenttype' => '内容类型',
			'title' => '标题',
			'content' => '内容',
			'wordcount' => '字数',
//			'chaptercount' => '分卷章节数',
			'createtime' => '发布时间',
			'sort' => '排序号',
		);
	}

    /**
     * 填充 content 字段
     */
    public function afterFind()
    {
        $this->content = $this->getContentFromFile();

        if (!empty($this->content)) {
            $this->wordcount = H::getWordCount($this->content);
        }

//        return parent::afterFind();
    }


    /**
     * @return bool
     */
    public function beforeSave()
    {
        if (parent::beforeSave()) {
            $book = Book::model()->findByPk($this->bookid);
            if (!$book) return false;

            if ($this->isNewRecord) {
                // 追加发布时间
                $this->createtime = time();
                if (empty($this->chapterorder)) {
                    $chapter =  Chapter::model()->findBySql('select max(chapterorder) as chapterorder from chapter where bookid=:bookid', array(
                        ':bookid' => $this->bookid,
                    ));
                    if (!$chapter) return false;

                    $this->chapterorder = $chapter->chapterorder + 1;
                }
                $this->wordcount = H::getWordCount($this->content);
                return true;
            }
            // 不是第一次插入处理
            // 先从总字数减去原来的字数，然后通过afterSave 方法再增加相应的字数
            $book->updateCounters(array(
                'wordcount' => -1 * $this->wordcount,
                'id=:id',
                array(
                    ':id' => $book->id,
                )
            ));
            // 减去分卷字数
            Volume::model()->updateCounters(array(
                'wordcount' => -1 * $this->wordcount,
                'id=:id',
                array(
                    ':id' => $this->volumeid,
                )
            ));

            // 重设字数
            $this->wordcount = H::getWordCount($this->content);

            return true;
        } else return false;
    }

    public function afterSave()
    {
        if ($this->isNewRecord) {
            $book = Book::model()->findByPk($this->bookid);
            if (!$book) return;

            // 调整小说章节数和总字数
            $book->updateCounters(
                array(
                    'chaptercount' => 1,
                    'wordcount' => H::getWordCount($this->content),
                ),
                'id=:id',
                array(
                    ':id' => $this->bookid,
                )
            );

            // 更新小说最后章节信息
            $book->lastchaptertitle =  $this->title;
            $book->lastchaptertime =  $this->createtime;
            $book->lastchapterid =  $this->id;
            $book->update(array(
                'lastchaptertitle',
                'lastchaptertime',
                'lastchapterid'
            ));

            // 增加分卷章节数和总字数
            Volume::model()->updateCounters(
                array(
                    'chaptercount' => 1,
                    'wordcount' => H::getWordCount($this->content),
                ),
                'id=:id',
                array(
                    ':id' => $this->volumeid,
                )
            );
        }

        // 保存章节内容文件
        $this->saveContentToFile();
    }


    public function beforeDelete()
    {
        if (!parent::beforeDelete()) return false;

        $txtLen = -1 * $this->wordcount;
//        if (null == $this->content) {
//            $this->content = $this->getContentFromFile();
//            $txtLen = H::getWordCount($this->content);
//        }
        // 修改小说章节数
//        $book = new Book();
        Book::model()->updateCounters(
            array(
                'chaptercount' => -1,
                'wordcount' => $txtLen,
            ),
            'id=:id',
            array(
                ':id' => $this->bookid,
            )
        );
        // 修改分卷章节数
        Volume::model()->updateCounters(
            array(
                'chaptercount' => -1,
                'wordcount' => $txtLen,
            ),
            'id=:id',
            array(
                ':id' => $this->volumeid,
            )
        );

        // 删除内容文件
        $this->deleteContentFile();

        return true;
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
		$criteria->compare('bookid',$this->bookid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('chaptercount',$this->chaptercount);
//		$criteria->compare('wordcount',$this->wordcount);
		$criteria->compare('createtime',$this->createtime);
//		$criteria->compare('updatetime',$this->updatetime);
		$criteria->compare('sort',$this->sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * 删除小说章节内容文件
     * @return bool
     */
    protected function deleteContentFile()
    {
        $p = $this->getArticleDataPath();

        if (file_exists($p)) return @unlink($p);

        return false;
    }

    /**
     * 保存小说章节内容
     * @return bool|int
     */
    protected function saveContentToFile()
    {
        if (null != $this->content) {
            $p = $this->getArticleDataPath();

            if (null == p) return false;

            if (!$this->makeArticleDataDir($p)) return false;

            return @file_put_contents($p, $this->content);
        }

        return false;
    }

    /**
     * 从文件中读到小说章节内容
     * @return null|string
     */
    protected function getContentFromFile()
    {
        $p = $this->getArticleDataPath();
        if (!file_exists($p)) return null;

        return @file_get_contents($p);
    }

    /**
     * 获得小说章节内容路径
     * @return null|string
     */
    protected function getArticleDataPath()
    {
        $dir = FW_ROOT_PATH . DS . FW_TXT_DIR;
        if (null != $this->bookid && $this->bookid > 0) {
            $dir .= DS . ($this->bookid % 500) . DS . $this->bookid;

            return $dir . DIRECTORY_SEPARATOR . $this->id . ".txt";
        }

        return null;
    }

    /**
     * 创建小说章节内容目录
     * @param $path
     * @return bool
     */
    protected function makeArticleDataDir($path)
    {
        $dir = dirname($path);
        if (!is_dir($dir)) {
            return @mkdir($dir, 0777, true);
        }

        return true;
    }
}