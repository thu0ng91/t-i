{/* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="{$FW_THEME_URL}/css/styles.css" />

    <title>{$title}</title>

    {Yii::app()->bootstrap->register()}
</head>

<body>

<div class="container" id="page">

    {$content}

    <div class="clear"></div>

    <div id="footer">
        Copyright &copy; {date('Y')} by {$siteinfo->SiteName} <br/>
    </div><!-- footer -->

</div><!-- page -->

</body>
</html>
