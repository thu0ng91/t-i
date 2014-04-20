<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>{$title}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {*<meta name="author" content="Joychao <joy@joychao.cc>">*}
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link class="bootstrap library" rel="stylesheet" type="text/css" href="{$FW_THEME_URL}/css/bootstrap.min.css">
<script class="bootstrap library" src="{$FW_THEME_URL}/js/jquery-1.4.3.min.js" type="text/javascript"></script>
<script class="bootstrap library" src="{$FW_THEME_URL}/js/bootstrap.min.js" type="text/javascript"></script>
<style type="text/css">
    {literal}
    *{margin:0;padding: 0;font-size:14px}
    /*body{background: #444 url(http://sandbox.runjs.cn/uploads/rs/418/nkls38xx/carbon_fibre_big.png)}*/
    .loginBox{width:420px;height:auto;padding:0 20px;border:1px solid #fff; color:#000; margin-top:40px; border-radius:8px;background: white;box-shadow:0 0 15px #222; background: -moz-linear-gradient(top, #fff, #efefef 8%);background: -webkit-gradient(linear, 0 0, 0 100%, from(#f6f6f6), to(#f4f4f4));font:11px/1.5em 'Microsoft YaHei' ;position: absolute;left:50%;top:50%;margin-left:-210px;margin-top:-115px;}
    .loginBox h2{height:45px;font-size:20px;font-weight:normal;}
    .loginBox .left{border-right:1px solid #ccc;height:100%;padding-right: 20px; }
    {/literal}
</style>
</head>
<body>
<div class="container">
    <section class="loginBox row-fluid">
        <section class="span7 left">
            <h2>会员注册</h2>
            <form action="{novel_link url="member/do/register"}" method="post">
            <p>账　　号：<input type="text" name="RegisterForm[username]" value="" /></p>
            <p>密　　码：<input type="password" name="RegisterForm[password]" /></p>
            <p>确认密码：<input type="password" name="RegisterForm[repassword]" /></p>
            <p>电子邮箱：<input type="text" name="RegisterForm[email]" /></p>
            <section class="row-fluid">
                {*<section class="span8 lh30"><label><input type="checkbox" name="rememberme" />下次自动登录</label></section>*}
                <section class="span1"><input type="submit" value=" 注册 " class="btn btn-primary"></section>
            </section>
            <section class="row-fluid">
                {if Yii::app()->user->hasFlash('actionInfo')}
                <p class="text-error">{Yii::app()->user->getFlash('actionInfo')}</p>
                {/if}
             </section>
            </form>
        </section>
        <section class="span5 right">
            <h2>会员特权</h2>
            <section>
                <p>1.可享受阅读付费章节</p>
                <p>2.可随心记录已读章节</p>
                <p>3.可将喜爱的书籍放入书架</p>
                <p></p>
                {*<p><input type="button" value=" 注册 " class="btn register"></p>*}
            </section>
        </section>
    </section><!-- /loginBox -->
</div> <!-- /container -->
</body>
</html>
<script>
    var registerUrl = '{novel_link url="member/do/register"}';
    {literal}
    $(document).ready(function () {
        $(".register").bind("click", function () {
            window.location.href  = registerUrl;
        });
    });
    {/literal}
</script>