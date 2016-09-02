<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo C('WEB_NAME');?>-<?php echo ($page_name); ?></title>
<link rel="stylesheet" type="text/css" href="/old/Public/Admin/css/common.css"/>
<link rel="stylesheet" type="text/css" href="/old/Public/Admin/css/main.css"/>
<link rel="stylesheet" type="text/css" href="/old/Public/Admin/css/page.css"/>
<script type="text/javascript" src="/old/Public/Admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/old/Public/Admin/layer/layer.min.js"></script>
<script type="text/javascript" src="/old/Public/Admin/js/company.js"></script>
<script type="text/javascript">
var url = "<?php echo U('Company/info');?>";
</script>
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
            <div class="crumb-list">
            <i class="icon-font"></i>
            <a href="<?php echo C('ADMIN_URL');?>">首页</a>
            <span class="crumb-step">&gt;</span>
            <span class="crumb-name"><?php echo ($page_name); ?></span></div>
        </div>
        
        <div class="result-wrap">
            <div class="result-title">
            	<form name="search" action="<?php echo U('Active/search');?>" method="post">
                <div class="result-list">  
                	<a href="<?php echo U('Active/add');?>"><i class="icon-font"></i>添加活动</a>                 
                    <a id="updateOrd" href="<?php echo U('Active/index');?>"><i class="icon-font"></i>刷新页面</a>
                    	机构名称：<input class="myinput" type="text" name="pubname">
                    	活动标题：<input class="myinput" type="text" name="title">
			   </select>
                    	<input class="mybutton" type="submit" value="查找">
                </div>
                </form>
            </div>
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <!-- <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th> -->
                        <th>发布者</th>
                        <th>活动标题</th>
                        <th>活动时间</th>
                        <th>活动地点</th>
                        <th>活动人数</th>
                        <th>费用</th>                        
                        <th>前台显示</th>
                        <th>是否推荐</th>
                        <th>实际点击量</th>
                        <th>虚拟点击量</th>
                        <th>操作</th>
                    </tr>
                    <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                        <!-- <td class="tc"><input name="id[]" value="<?php echo ($vo["id"]); ?>" type="checkbox"></td> -->
                        <td><?php echo ($vo["pubname"]); ?></td>
                        <td><a href="javascript:void(0);"><?php echo ($vo["title"]); ?></a></td>
                        <td><?php echo ($vo["atime"]); ?></td>
                        <td><?php echo ($vo["address"]); ?></td>
                        <td><?php echo ($vo["pnum"]); ?></td>
                        <td><?php echo ($vo["money"]); ?></td>                        
                        <td><?php echo (is_show($vo["isshow"])); ?></td>
                        <td><?php echo (is_rec($vo["rec"])); ?></td>
                        <td><?php echo ($vo["num_true"]); ?></td>
                        <td><?php echo ($vo["num_edit"]); ?></td>
                        <td>	
                        	<a class="link-update" href="<?php echo U('Active/edit',array('id'=>$vo[id]));?>">修改</a>                               
                           	<a class="link-update" href="<?php echo U('Active/lock',array('id'=>$vo[id],'isshow'=>$vo[isshow]));?>"><?php echo (nav_action($vo["isshow"])); ?></a>
                           	<a class="link-update del" href="<?php echo U('Active/del',array('id'=>$vo[id]));?>">删除</a>
                        </td>
                    </tr><?php endforeach; endif; ?>
                    <tr>
                    	<td colspan="11" align="right"><?php echo ($page); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>