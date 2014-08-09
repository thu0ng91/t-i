<?php
/**
 * 小说信息模块，小说章节列表模块
 * Class DetailController
 */
class DetailController extends FWModuleFrontController
{
    /**
     * 过滤器
     * 添加透明缓存
     * @return array
     */
    public function filters() {
        $ret = array();
        if ($this->siteConfig && $this->siteConfig->SiteIsUsedCache && $this->module->cacheConfig && ($this->module->cacheConfig->BookIsCache == 1)) {

        }

        return $ret;
    }

    /**
     * 小说目录页
     * @throws CHttpException
     */
    public function actionIndex()
    {
        $id = intval($_GET['id']);

        $notice = Notice::model()->find("id=:id and status=:status", array(
            ':id' => $id,
            ':status' => 1,
        ));

        if (!$notice) {
            throw new CHttpException(404);
        }

        $this->assign("notice", $notice);
    	
        $this->render('index');
    }
}