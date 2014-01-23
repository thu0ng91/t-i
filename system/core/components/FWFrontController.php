<?php
/**
 * Class FWFrontController
 */
class FWFrontController extends CController
{
	public $optionInfo;
	public $viewSeo;

    public $pageTitle = "";

    public $pageKeywords = "";

    public $pageDescription = "";

    protected $supportSEOVarList = array(
        '分类名' => "",
        '站点名' => "",
        '小说名' => "",
        '章节名' => "",
        '分类关键字' => "",
        '小说关键字' => "",
        '站点关键字' => "",
        '小说作者' => "",
        '分类描述' => "",
        '小说简介' => "",
        '站点简介' => "",
    );

    /**
     * @var SystemBaseConfig
     */
    protected $siteConfig = null;

	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/main';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	public function init(){
        if (!H::checkIsInstall()) return;
        $m = Yii::app()->settings->get("SystemBaseConfig");
        if ($m) {
            $this->siteConfig = $m;

            $this->setSEOVar("站点名", $this->siteConfig->SiteName);
            $this->setSEOVar("站点关键字", $this->siteConfig->SiteKeywords);
            $this->setSEOVar("站点简介", $this->siteConfig->SiteIntro);
        }

	}

    public function renderFile($viewFile,$data=null,$return=false)
    {
        $this->initTplVar();
        return parent::renderFile($viewFile, $data, $return);
    }


    /**
     * 初始化模板相关变量
     */
    protected function initTplVar()
    {
        // 初始化共用模板变量
        $this->assign("FW_SITE_URL", Yii::app()->baseUrl);
        $this->assign("FW_THEME_URL", Yii::app()->theme->baseUrl);

        $this->assign("Yii", Yii::app());
        $this->assign("siteinfo", $this->siteConfig);

        // 设定默认页面关键字
        $smarty = $this->getSmarty();
        if (!$smarty->getTemplateVars("title")) {
            $this->assign("title", $this->siteConfig->SiteName);
        }
        if (!$smarty->getTemplateVars("keywords")) {
            $this->assign("keywords", $this->siteConfig->SiteKeywords);
        }
        if (!$smarty->getTemplateVars("description")) {
            $this->assign("description", $this->siteConfig->SiteIntro);
        }
    }

    /**
     * 根据页面配置页面关键SEO信息
     * @param $page
     */
    protected function setAllSEOInfo($page)
    {
        $this->setSEOInfo("标题", $page);
        $this->setSEOInfo("关键字", $page);
        $this->setSEOInfo("描述", $page);
    }

    /**
     * 设置一个控制器seo信息
     * @param $type 标题|关键字|描述
     * @param $page 分类页|小说页|章节页
     * @see config/main.php
     */
    protected function setSEOInfo($type, $page)
    {
        if (!isset($this->module["front"]['seo'][$type])) return;
        if (!isset($this->module["front"]['seo'][$type][$page])) return;

        $s = $this->module["front"]['seo'][$type][$page];
        foreach ($this->supportSEOVarList as $k => $v) {
            $s = str_replace('{' . $k . '}', $v, $s);
        }

        switch ($type) {
            case "标题":
                $this->assign("title", $s);
                break;
            case "关键字":
                $this->assign("keywords", $s);
                break;
            case "描述":
                $this->assign("description", $s);
                break;
        }
        return;
    }

    /**
     * 设置SEO关键字
     * @param $name
     * @param $value
     * @return boolean
     */
    protected function setSEOVar($name, $value)
    {
        if (!isset($this->supportSEOVarList[$name])) return false;
        $this->supportSEOVarList[$name] = $value;

        return true;
    }

    /**
     * 返回某个SEO关键字值
     * @param $name
     * @return string
     */
    protected function getSEOVar($name)
    {
        if (!isset($this->supportSEOVarList[$name])) return "";
        return $this->supportSEOVarList[$name];
    }

    protected function assign($name, $value)
    {
        $smarty = $this->getSmarty();
        $smarty->assign($name, $value);
    }

    protected function getSmarty()
    {
        $render = Yii::app()->viewRenderer;

        return $render->smarty;
    }
}