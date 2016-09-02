<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo C('WEB_NAME');?></title>
<link rel="stylesheet" type="text/css" href="/old/Public/Admin/css/common.css"/>
<link rel="stylesheet" type="text/css" href="/old/Public/Admin/css/main.css"/>
</head>
<body>
<!-- Head -->
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="admin.php" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="<?php echo C('ADMIN_URL');?>">首页</a></li>
                <li><a href="<?php echo C('WEB_URL');?>" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="<?php echo U('Admin/index');?>">管理员</a></li>
                <li><a href="<?php echo U('Admin/pwd');?>">修改密码</a></li>
                <li><a href="<?php echo U('Login/out');?>">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Head -->
<div class="container clearfix">
    <!-- sidebar -->
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('Nav/index');?>"><i class="icon-font">&#xe008;</i>导航管理</a></li>
                        <li><a href="<?php echo U('Category/index');?>"><i class="icon-font">&#xe008;</i>栏目管理</a></li>
                        <li><a href="<?php echo U('Member/index');?>"><i class="icon-font">&#xe005;</i>会员管理</a></li>
                        <li><a href="<?php echo U('Company/index');?>"><i class="icon-font">&#xe006;</i>机构管理</a></li>
                        <li><a href="<?php echo U('Invest/index');?>"><i class="icon-font">&#xe004;</i>投资数据</a></li>
                        <li><a href="<?php echo U('Anli/index');?>"><i class="icon-font">&#xe012;</i>案例管理</a></li>
                        <!-- <li><a href="<?php echo U('Comment/index');?>"><i class="icon-font">&#xe012;</i>评论管理</a></li> -->
                        <li><a href="<?php echo U('Point/index');?>"><i class="icon-font">&#xe012;</i>观点管理</a>
                        <li><a href="<?php echo U('News/index');?>"><i class="icon-font">&#xe052;</i>资讯管理</a></li>
                        <li><a href="<?php echo U('Active/index');?>"><i class="icon-font">&#xe006;</i>活动管理</a></li>
                        <li><a href="<?php echo U('Article/index');?>"><i class="icon-font">&#xe005;</i>文章管理</a></li>
                        <li><a href="<?php echo U('Province/index');?>"><i class="icon-font">&#xe004;</i>地图设置</a></li>                        
                        <li><a href="<?php echo U('Public/adv');?>"><i class="icon-font">&#xe005;</i>广告管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('System/index');?>"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                        <li><a href="<?php echo U('System/bg');?>"><i class="icon-font">&#xe005;</i>首页背景图</a></li>
                        <li><a href="<?php echo U('System/log');?>"><i class="icon-font">&#xe046;</i>登陆日志</a></li>
                        <li><a href="<?php echo U('System/closeip');?>"><i class="icon-font">&#xe045;</i>封ip</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font">&#xe06b;</i><span><?php echo C('WEB_ADV');?></span></div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>快捷操作</h1>
            </div>
            <div class="result-content">
                <div class="short-wrap">
                    <a href="<?php echo U('Member/add');?>"><i class="icon-font">&#xe001;</i>新增会员</a>
                    <a href="<?php echo U('Company/add');?>"><i class="icon-font">&#xe005;</i>新增机构</a>
                    <a href="<?php echo U('News/add');?>"><i class="icon-font">&#xe048;</i>新增新闻</a>
                    <a href="<?php echo U('Active/add');?>"><i class="icon-font">&#xe041;</i>新增活动</a>
                </div>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>系统基本信息</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">操作系统</label><span class="res-info"><?php echo ($info['操作系统']); ?></span>
                    </li>
                    <li>
                        <label class="res-lab">运行环境</label><span class="res-info"><?php echo ($info['运行环境']); ?></span>
                    </li>
                    <li>
                        <label class="res-lab">PHP运行方式</label><span class="res-info"><?php echo ($info['PHP运行方式']); ?></span>
                    </li>
                    <li>
                        <label class="res-lab">ThinkPHP版本</label><span class="res-info"><?php echo ($info['ThinkPHP版本']); ?></span>
                    </li>
                    <li>
                        <label class="res-lab">上传附件限制</label><span class="res-info"><?php echo ($info['上传附件限制']); ?></span>
                    </li>
                    <li>
                        <label class="res-lab">执行时间限制</label><span class="res-info"><?php echo ($info['执行时间限制']); ?></span>
                    </li>
                    <li>
                        <label class="res-lab">服务器时间</label><span class="res-info"><?php echo ($info['服务器时间']); ?></span>
                    </li>
                    <li>
                        <label class="res-lab">北京时间</label><span class="res-info"><?php echo ($info['北京时间']); ?></span>
                    </li>
                    <li>
                        <label class="res-lab">服务器域名/IP</label><span class="res-info"><?php echo ($info['服务器域名/IP']); ?></span>
                    </li>
                    <li>
                        <label class="res-lab">剩余空间</label><span class="res-info"><?php echo ($info['剩余空间']); ?></span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>技术支持</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">来源：</label>
                        <span class="res-info">
                        <a href="" target="_blank"><?php echo C('WEB_AUTH');?></a>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>