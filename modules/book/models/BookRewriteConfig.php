<?php
/**
 * 小说重写配置
 * Class BookRewriteConfig
 */
class BookRewriteConfig extends CFormModel
{
    private $idPatternRule = '/(\{(id|bookid|pinyin|dir)\}){1}/i';

    private $shortTitlePatternRule = '/(\{(pinyin|id)\}){1}/i';

//	public $UrlSuffix;

//    public $RewriteRules;

    public $BookCategoryRule;

    public $BookInfoRule;

    public $BookIndexRule;

    public $BookChapterDetailRule;

    public $BookSearchRule;

    public $BookLastupdateRule;

    public $BookRankRule;

    // 小说目录页目录级及拼音化支持
    public $BookIndexRuleIsUseVarDir = 0 ;
    public $BookIndexRuleIsUseVarPinyin = 0;

    // 小说章节页目录级及拼音化支持
    public $BookChapterDetailRuleVarDir = 0;
    public $BookChapterDetailRuleVarPinyin = 0;


	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
//            array('UrlSuffix', 'in', 'range' => array_keys(Yii::app()->params['urlSuffix'])),
            array('BookCategoryRule', 'match', 'pattern' => $this->shortTitlePatternRule),
            array('BookInfoRule', 'match', 'pattern' => $this->idPatternRule),
            array('BookIndexRule', 'match', 'pattern' => $this->idPatternRule),
            array('BookChapterDetailRule', 'match', 'pattern' => $this->idPatternRule),
            array('BookSearchRule', 'length', 'max'=> 255),
            array('BookLastupdateRule', 'length', 'max'=> 255),
            array('BookRankRule', 'length', 'max'=> 255),
            array('BookIndexRuleIsUseVarDir', 'in', 'range' => array(0, 1)),
            array('BookIndexRuleIsUseVarPinyin', 'in', 'range' => array(0, 1)),
            array('BookChapterDetailRuleVarDir', 'in', 'range' => array(0, 1)),
            array('BookChapterDetailRuleVarPinyin', 'in', 'range' => array(0, 1)),
//            array('NewsListRule', 'match', 'pattern' => $this->idPatternRule),
//            array('NewsDetailRule', 'match', 'pattern' => $this->idPatternRule),
//			array('UrlSuffix,RewriteRules', 'required'),
//			array('SiteAdminEmail', 'email'),
//			array('UrlSuffix', ''),
//            array('RewriteRule', 'length', 'max'=> 255),
//            array('SiteKeywords,SiteIntro,SiteCopyright,SiteAttachmentPath', 'length', 'max'=> 255),
//			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
//			'UrlSuffix' => '网址后缀',
			'BookCategoryRule' => '小说分类页',
			'BookInfoRule' => '小说信息页',
			'BookIndexRule' => '小说目录页',
			'BookChapterDetailRule' => '小说章节页',
			'BookSearchRule' => '小说搜索页',
			'BookLastupdateRule' => '小说更新页',
			'BookRankRule' => '小说排行页',
			'BookIndexRuleIsUseVarDir' => '启用{dir}变量',
			'BookIndexRuleIsUseVarPinyin' => '启用{pinyin}变量',
			'BookChapterDetailRuleVarDir' => '启用{dir}变量',
			'BookChapterDetailRuleVarPinyin' => '启用{pinyin}变量',
//			'NewsListRule' => '新闻列表',
//			'NewsDetailRule' => '新闻内容',
//			'SiteIntro' => '站点简介',
//			'SiteAdminEmail' => '管理员邮箱',
//			'SiteCopyright' => '站点版权信息',
//			'SiteAttachmentPath' => '站点附件地址',
		);
	}

    public function getIdPatternRule()
    {
        return $this->idPatternRule;
    }

    public function getShortTitleRule()
    {
        return $this->shortTitlePatternRule;
    }
}
