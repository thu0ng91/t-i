<?php
/**
 * 小说修复相关
 */
class FixController extends FWModuleAdminController{

	public function actionIndex(){
		$this->render('index');
	}


	public function actionLastchapter()
	{
		$this->render('lastchapter');
	}


	public function actionFixlastchapter(){

		$bookIdList = Yii::app()->request->getParam('bookIdList','');


        $data = array(
            'msg' => '',
//            'nextId' => 0,
        );
        if (empty($bookIdList)) {
            $data['msg'] = '请填写问题书籍的编号';
            $this->jsonOuputAndEnd(false, $data);
        }


//        $data = array(
//            'msg' => '',
////            'nextId' => 0,
//        );



        $criteria = new CDbCriteria();
        $criteria->select = 'id';
        $criteria->addInCondition('id', explode(',', $bookIdList));
        $bookList  = Book::model()->findAll($criteria);

        if (empty($bookList)) {
            $data['msg'] = '修复失败！需要修复的问题小说不存在';
            $this->jsonOuputAndEnd(false, $data);
        }

//        $url = H::getAbsoluteUrl('/');
//        $data['msg'] = $url;
//
//        $this->jsonOuputAndEnd(false, $data);

        set_time_limit(0);
        // 修复

        foreach ($bookList as $book) {
//            Book::model()->find('order by chapterorder desc')
//            Book::model()->update();
            $chapter = Chapter::customModel($book->id)->find('chaptertype=0 order by chapterorder desc');

            if ($chapter) {
                $book->lastchapterid = $chapter->id;
                $book->lastchaptertitle = $chapter->title;
                $book->lastchaptertime = $chapter->createtime;

                $book->update(array(
                    'lastchapterid',
                    'lastchaptertitle',
                    'lastchaptertime',
                ));
            }
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