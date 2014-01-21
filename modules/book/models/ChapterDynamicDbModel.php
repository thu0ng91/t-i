<?php
/**
 * Class ChapterDynamicDbModel
 */

class ChapterDynamicDbModel extends CActiveRecord {

    private $_bookId = 0;

    private static $_chatperDb = array();

    private static $_models = array();

    private $_md = null;

    public function __construct($scenario='insert')
    {
        if($scenario===null) // internally used by populateRecord() and model()
        return;

        $this->setScenario($scenario);
        $this->setIsNewRecord(true);
//        $this->_attributes=$this->getMetaData()->attributeDefaults;

        $this->init();

        $this->attachBehaviors($this->behaviors());
        $this->afterConstruct();
    }

    public static function customNew($bookId, $scenario = 'insert')
    {
        $clsName = get_called_class();
        $m = new $clsName($scenario);
        $m->setChapterBookId($bookId);
        $m->_md=new CActiveRecordMetaData($m);

        return $m;
    }

    public static function customModel($bookId)
    {
//        $m = parent::model(get_called_class());
//        $m->setChapterBookId($bookId);

        $className = get_called_class();
        if(isset(self::$_models[$className]))
            return self::$_models[$className];
        else
        {
            $model=self::$_models[$className]= self::customNew($bookId, null);
//            $model->setChapterBookId($bookId);
//            $model->_md=new CActiveRecordMetaData($model);
            $model->attachBehaviors($model->behaviors());
            return $model;
        }
    }

    public function getMetaData()
    {
        if($this->_md!==null)
            return $this->_md;
        else
            return $this->_md=self::model(get_class($this))->_md;
    }

    protected function instantiate($attributes)
    {
        if ($this->_bookId > 0) return self::customNew($this->_bookId, null);
        else return parent::instantiate($attributes);
    }

    public function getDbConnection()
    {
        if ($this->_bookId == 0) return parent::getDbConnection();

        if (isset(self::$_chatperDb[$this->_bookId])) {
            return self::$_chatperDb[$this->_bookId];
        }

        $p = FW_TXT_DIR . DS . ($this->_bookId % 500) . DS . $this->_bookId . DS . "chapter.db";
        $connStr = "sqlite:" . $p;
        self::$_chatperDb[$this->_bookId] = new CDbConnection($connStr);

        return self::$_chatperDb[$this->_bookId];
    }

    public function setChapterBookId($bookId)
    {
        $this->_bookId = $bookId;
    }
}