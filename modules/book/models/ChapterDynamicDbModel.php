<?php
/**
 * Class ChapterDynamicDbModel
 */

class ChapterDynamicDbModel extends CActiveRecord {

    private $_bookId = 0;

    private static $_chatperDb = array();


    public static function customNew($bookId)
    {
        $clsName = get_called_class();
        $m = new $clsName();
        $m->setChapterBookId($bookId);

        return $m;
    }

    public static function customModel($bookId)
    {
        $m = parent::model(get_called_class());
        $m->setChapterBookId($bookId);
        return $m;
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