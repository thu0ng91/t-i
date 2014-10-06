<?php
class StaticController extends FWModuleAdminController{
	public function actionIndex(){
		$this->render('index');
	}
	public function actionUpdate(){
		$beginId = Yii::app()->request->getParam('beginid',null);
        $endId = Yii::app()->request->getParam('endid',0);
		$type = Yii::app()->request->getParam('type',array());
		$bookId = Yii::app()->request->getParam('bookid',0);


        $data = array(
            'msg' => '',
            'nextId' => 0,
        );
        if ($beginId <= 0) {
            $data['msg'] = '请填写生成开始的书号';
            $this->jsonOuputAndEnd(false, $data);
        }

        if ($bookId <= 0) $bookId = $beginId;
        if ($endId <= 0) $endId = $beginId;


        $data = array(
            'msg' => '',
            'nextId' => 0,
        );

        if ($bookId > $endId) { // 生成完成
            $data['nextId'] = $endId;
            $data['msg'] = '生成完成！';
            $this->jsonOuputAndEnd(false, $data);
        }

        $book  = Book::model()->findByPk($bookId);
        if (!$book) {
            $data['msg'] = '生成失败！书号：' . $bookId . " 不存在";
            $this->jsonOuputAndEnd(false, $data);
        }

//        $url = H::getAbsoluteUrl('/');
//        $data['msg'] = $url;
//
//        $this->jsonOuputAndEnd(false, $data);

        set_time_limit(0);
        // 生成
        $r = $this->makeHtml($book, $type);

        if ($r) {
            $data['msg'] = '生成成功！书号：' . $bookId . ", 书名：《" . $book->title . " 》";
        } else {
            $data['msg'] = '生成失败！书号：' . $bookId . ", 书名：《" . $book->title . " 》";
        }

        $nextBook = Book::model()->select('id')->find('id>:bookid order by id asc', array(':bookid' => $bookId));
        if ($nextBook) {
            $data['nextId'] = $nextBook->id;
        } else {
            $data['nextId'] = 0;
        }

        $this->jsonOuputAndEnd(true, $data);

	}

    /**
     * 生成静态
     * @param object $book
     * @param array $type
     * @return boolean
     */
    private function makeHtml(&$book, $type) {

        $prefix = H::getAbsoluteUrl("/");

        $prefix  = str_replace("admin.php", 'index.php', $prefix);

        $m = Yii::app()->settings->get("BookRewriteConfig", "book");

        if (!in_array('1', $type) && !in_array('2', $type)) { // 不需要生成
            return false;
        }

        if (in_array('1', $type)) { // 生成目录页
            $suffix =  trim($m->BookIndexRule);

            if ($suffix == "")  return false;

            $suffix = str_ireplace('{dir}', floor($book->id / 1000), $suffix);
            $suffix = str_ireplace('{id}', $book->id, $suffix);
            $suffix = str_ireplace('{pinyin}', $book->pinyin, $suffix);

            $suffix = trim($suffix, '/');

            $url = $prefix . "/" . $suffix . ".html";

            $r = $this->remoteCall($url);

            if (!$r) return $r;
        }

        if (in_array('2', $type)) { // 生成章节页

            $criteria = new CDbCriteria();
            $criteria->compare("bookid", $book->id);
            $criteria->compare("chaptertype", 0);
            $criteria->order = "chapterorder asc";

            try {
                $chapterList = Chapter::customModel($book->id)->findAll($criteria);
            } catch (Exception $e) {
                return false;
            }

            foreach ($chapterList as $v) {
                $suffix = trim($m->BookChapterDetailRule);

                $suffix = str_ireplace('{dir}', floor($book->id / 1000), $suffix);
                $suffix = str_ireplace('{bookid}', $book->id, $suffix);
                $suffix = str_ireplace('{pinyin}', $book->pinyin, $suffix);
                $suffix = str_ireplace('{id}', $v->id, $suffix);

                $suffix = trim($suffix, '/');

                $url = $prefix . "/" . $suffix . ".html";

                $r = $this->remoteCall($url);

                if (!$r) return false;
            }
        }

        return true;
	}

    private function remoteCall($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_exec($ch);

        $r = false;

        if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == '200') {
            $r = true;
        }

        curl_close($ch);

        return $r;

    }

}