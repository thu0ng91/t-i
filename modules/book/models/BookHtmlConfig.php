<?php
/**
 * 小说静态化配置
 * Class BookRewriteConfig
 */
class BookHtmlConfig extends CFormModel
{

//	public $UrlSuffix;

//    public $RewriteRules;

    public $BookDetailIndexIsMakeHtml;
    public $BookChapterIsMakeHtml;



	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
        return array(
            array('BookDetailIndexIsMakeHtml', 'in', 'range' => array(-1, 0, 1)),
            array('BookChapterIsMakeHtml', 'in', 'range' => array(-1, 0, 1)),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'BookDetailIndexIsMakeHtml' => '小说目录页是否开启静态',
			'BookChapterIsMakeHtml' => '小说阅读页死否开启静态',

		);
	}
}
