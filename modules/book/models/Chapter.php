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
class Chapter extends ChapterDynamicDbModel
{
    private $_bookId = 0;

    private static $_chatperDb = array();

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
            array('bookid,title', 'required'),
			array('bookid,volumeid,createtime,chapterorder,contenttype,chaptertype,wordcount', 'numerical', 'integerOnly'=>true),
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
//            'book' => array(CActiveRecord::BELONGS_TO, 'Book', 'bookid'),
//            'volume' => array(CActiveRecord::BELONGS_TO, 'Volume', 'volumeid'),
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
			'chaptertype' => '章节类型',
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
                    $chapter =  $this->findBySql('select max(chapterorder) as chapterorder from chapter where bookid=:bookid', array(
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
                'id=:id and chaptertype=0',
                array(
                    ':id' => $book->id,
                )
            ));

            // 重设字数
            $this->wordcount = H::getWordCount($this->content);

            return true;
        } else return false;
    }

    public function afterSave()
    {
        $book = Book::model()->findByPk($this->bookid);
        if (!$book) return;

        if ($this->isNewRecord) {
            if ($this->chaptertype == 0) {
                // 调整小说章节数
                $book->updateCounters(
                    array(
                        'chaptercount' => 1,
    //                    'wordcount' => H::getWordCount($this->content),
                    ),
                    'id=:id',
                    array(
                        ':id' => $this->bookid,
                    )
                );
            } else {
                // 调整小说分卷数
                $book->updateCounters(
                    array(
                        'volumecount' => 1,
                        //                    'wordcount' => H::getWordCount($this->content),
                    ),
                    'id=:id',
                    array(
                        ':id' => $this->bookid,
                    )
                );
            }

            if ($this->chaptertype == 0) {
                // 更新小说最后章节信息
                $book->lastchaptertitle =  $this->title;
                $book->lastchaptertime =  $this->createtime;
                $book->lastchapterid =  $this->id;
                $book->update(array(
                    'lastchaptertitle',
                    'lastchaptertime',
                    'lastchapterid'
                ));
            }

//            // 增加分卷章节数
//            Volume::model()->updateCounters(
//                array(
//                    'chaptercount' => 1,
////                    'wordcount' => H::getWordCount($this->content),
//                ),
//                'id=:id',
//                array(
//                    ':id' => $this->volumeid,
//                )
//            );
        }

        if ($this->chaptertype == 0) {
            // 增加小说总字数
            $book->updateCounters(array(
                'wordcount' => H::getWordCount($this->content),
                'id=:id',
                array(
                    ':id' => $book->id,
                )
            ));
        }
//        // 增加分卷字数
//        Volume::model()->updateCounters(array(
//            'wordcount' => H::getWordCount($this->content),
//            'id=:id',
//            array(
//                ':id' => $this->volumeid,
//            )
//        ));

        // 保存章节内容文件
        $this->saveContentToFile();
    }


    public function beforeDelete()
    {
        if (!parent::beforeDelete()) return false;

        if ($this->chaptertype == 0) {
            $txtLen = -1 * $this->wordcount;
            Book::model()->updateCounters(
                array(
                    'chaptercount' => -1,
                    'wordcount' => $txtLen,
                ),
                'id=:id and chaptercount>=1',
                array(
                    ':id' => $this->bookid,
                )
            );
            // 删除内容文件
            $this->deleteContentFile();
        } else {
            Book::model()->updateCounters(
                array(
                    'volumecount' => -1,
//                    'wordcount' => $txtLen,
                ),
                'id=:id and volumecount>=1',
                array(
                    ':id' => $this->bookid,
                )
            );
        }

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

            $r = @file_put_contents($p, $this->content);

            // 保存小说章节到一个txt文件 方便下载
            if ($this->isNewRecord) {
                $title = "\r\n" . $this->title ."\r\n";
                $p = $this->getArticleDataDir() . DS . "all.txt";
                @file_put_contents($p, $title . $this->content, FILE_APPEND);
            }

            return $r;
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
        $dir = $this->getArticleDataDir();
        if (null == $dir) return null;
        return $dir . DS . $this->id . ".txt";

    }

    /**
     * 获取小说章节保存路径
     * @return string
     */
    public function getArticleDataDir()
    {
        if (null != $this->bookid && $this->bookid > 0) {
//            $dir .= DS . ($this->bookid % 500) . DS . $this->bookid;
            return Book::getBookDataDir($this->bookid);
        } else return null;
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