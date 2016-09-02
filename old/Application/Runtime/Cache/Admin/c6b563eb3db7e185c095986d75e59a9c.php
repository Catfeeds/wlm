<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo C('WEB_NAME');?>-<?php echo ($page_name); ?></title>
<link rel="stylesheet" type="text/css" href="/old/Public/Admin/css/common.css"/>
<link rel="stylesheet" type="text/css" href="/old/Public/Admin/css/main.css"/>
<script type="text/javascript" src="/old/Public/Admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/old/Public/Admin/layer/layer.min.js"></script>
<script type="text/javascript" src="/old/Public/Admin/js/news.js"></script>
<script type="text/javascript" src="/old/Public/Admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/old/Public/Admin/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/old/Public/Admin/js/uploadPreview.min.js"></script>
<script>
window.onload = function () { 
	new uploadPreview({ UpBtn: "pic", DivShow: "imgdiv", ImgShow: "imgShow" });
}
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
	            <i class="icon-font"></i>
	            <a href="<?php echo C('ADMIN_URL');?>">首页</a>
	            <span class="crumb-step">&gt;</span>
	            <a class="crumb-name" href="<?php echo U('News/index');?>"><?php echo ($page_name); ?></a>
	            <span class="crumb-step">&gt;</span>
	            <span>修改资讯</span>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="<?php echo U('News/modify');?>" method="post" id="myform" name="myform" onsubmit="return add_check()"  enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
	                        <tr>
	                            <th width="120"><i class="require-red">*</i>资讯标题：</th>
	                            <td>
	                                <input class="common-text" name="title" id="title" size="50" value="<?php echo ($vo["title"]); ?>" type="text">
	                            </td>
	                        </tr>
	                        <tr>
                                <th><i class="require-red"></i>展示图片：</th>
                                <td>
									<div id="imgdiv"><img id="imgShow" width="100" height="100" /></div>
                                    <input class="common-text required" name="pic" id="pic" size="50" value="" type="file">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>资讯来源：</th>
                                <td>
                                    <input class="common-text required" name="come" id="come" size="50" value="<?php echo ($vo["url"]); ?>" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>详细地址：</th>
                                <td>
                                    <input class="common-text required" name="from_url" id="from_url" size="50" value="<?php echo ($vo["from_url"]); ?>" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>公司名称：</th>
                                <td>
                                    <input class="common-text required" name="company" id="company" size="50" value="<?php echo ($vo["company"]); ?>" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red"></i>虚拟点击量：</th>
                                <td>
                                    <input class="common-text required" name="num_edit" id="num_edit" size="50" value="<?php echo ($vo["num_edit"]); ?>" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red"></i>活动内容：</th>
                                <td>
                                    <script id="editor" type="text/plain" style="width:1024px;height:500px;"><?php echo (htmlspecialchars_decode($vo['content'])); ?></script>
                                </td>
                            </tr> 
                            <!-- <tr>
                                <th><i class="require-red"></i>所属领域：</th>
                                <td>
                                <?php if(is_array($dlist)): foreach($dlist as $k=>$v): ?><input type="checkbox" name="domain[]" value="<?php echo ($v["id"]); ?>" <?php if(in_array($v[id],$vo[domain])): ?>checked<?php endif; ?> >&nbsp;<?php echo ($v["dname"]); ?>&nbsp;&nbsp;<?php if($k%6 == 5): ?><br /><?php endif; endforeach; endif; ?>
                                </td>
                            </tr>-->
                            <!-- <tr>
                                <th><i class="require-red"></i>所属类型：</th>
                                <td>
                                    <select name="news_type_id">
                                    	<?php if(is_array($nlist)): foreach($nlist as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if($vo[news_type_id] == $v[id]): ?>selected<?php endif; ?> ><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
                                    </select>
                                </td>
                            </tr>   -->                         
                            <tr>
                                <th></th>
                                <td>
                                	<input type="hidden" value="<?php echo ($vo["id"]); ?>" name="id" />
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
<script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
</script>
</body>
</html>