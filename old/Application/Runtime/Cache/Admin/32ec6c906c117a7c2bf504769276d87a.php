<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo C('WEB_NAME');?></title>
<link rel="stylesheet" type="text/css" href="/old/Public/Admin/css/admin_login.css"/>
<script type="text/javascript" src="/old/Public/Admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/old/Public/Admin/layer/layer.min.js"></script>
<script type="text/javascript" src="/old/Public/Admin/js/login.js"></script>
</head>
<body>
<div class="admin_login_wrap">
    <h1><?php echo C('WEB_NAME');?>后台管理</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="<?php echo U('Login/check');?>" method="post" onsubmit="return check();">
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="username" value="admin" id="username" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="pwd" value="admin" id="password" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="提交" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <p class="admin_copyright"><a tabindex="5" href="index.php" target="_blank">返回首页</a> &copy; 2015 Powered by <a href="" target="_blank">maxwei,E-mail:827400818@qq.com</a></p>
</div>
</body>
</html>