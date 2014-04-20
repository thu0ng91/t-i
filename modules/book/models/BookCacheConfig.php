<?php
/**
 * 小说缓存配置
 * Class BookRewriteConfig
 */
class BookCacheConfig extends CFormModel
{
//    private $idPatternRule = '/(\{(id|bookid)\}){1}/i';
//
//    private $shortTitlePatternRule = '/(\{(pinyin|id)\}){1}/i';

//	public $UrlSuffix;

//    public $RewriteRules;

    /**
     * 是否开启缓存
     * @var
     */
    public $BookIsCache;
    /**
     * 分类页缓存时间
     * @var
     */
    public $BookCategoryCacheTime;

    /**
     * 目录页缓存时间
     * @var
     */
    public $BookDetailCacheTime;

    /**
     * 章节页缓存时间
     * @var
     */
    public $BookChapterCacheTime;

    /**
     * 排行页缓存时间
     * @var
     */
    public $BookRankCacheTime;

    /**
     * 最近更新页缓存时间
     * @var
     */
    public $BookLastupdateCacheTime;



	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
            array('BookIsCache', 'in', 'range' => array(-1, 0, 1)),
            array('BookCategoryCacheTime', 'numerical', 'integerOnly'=>true),
            array('BookDetailCacheTime', 'numerical', 'integerOnly'=>true),
            array('BookChapterCacheTime', 'numerical', 'integerOnly'=>true),
            array('BookRankCacheTime', 'numerical', 'integerOnly'=>true),
            array('BookLastupdateCacheTime', 'numerical', 'integerOnly'=>true),
//            array('NewsListRule', 'match', pattern => $this->idPatternRule),
//            array('NewsDetailRule', 'match', pattern => $this->idPatternRule),
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
			'BookIsCache' => '是否开启小说模块缓存',
			'BookCategoryCacheTime' => '分类页缓存时间',
			'BookDetailCacheTime' => '目录页缓存时间',
			'BookChapterCacheTime' => '小说章节页缓存时间',
			'BookRankCacheTime' => '小说排行页缓存时间',
			'BookLastupdateCacheTime' => '小说最近更新页缓存时间',
//			'NewsListRule' => '新闻列表',
//			'NewsDetailRule' => '新闻内容',
//			'SiteIntro' => '站点简介',
//			'SiteAdminEmail' => '管理员邮箱',
//			'SiteCopyright' => '站点版权信息',
//			'SiteAttachmentPath' => '站点附件地址',
		);
	}

}
