<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
   	<meta charset="utf-8" />
<link rel="shortcut  icon" type="image/x-icon" href="/Public/Home/images/logo2.png" media="screen"  />
    <title>未来门台管理系统</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />    
    
    <link href="/Public/Admin/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/Public/Admin/css/bootstrap-responsive.min.css" rel="stylesheet" />
    
    <link href="/Public/Admin/css/font-awesome.css" rel="stylesheet" />
    
    <link href="/Public/Admin/css/adminia.css" rel="stylesheet" /> 
    <link href="/Public/Admin/css/adminia-responsive.css" rel="stylesheet" /> 
    
    <link href="/Public/Admin/css/pages/dashboard.css" rel="stylesheet" /> 
    

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="/Public/html5.js"></script>
    <![endif]-->
	
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  
  <script src="/Public/Admin/js/jquery-1.7.2.min.js"></script>
  <script src="/Public/Admin/js/bootstrap.js"></script>
  <script src="/Public/layer/layer.js"></script>

  <script src="/Public/Admin/js/hrfd.js"></script>
   	<link href="/Public/Admin/css/pages/plans.css" rel="stylesheet" /> 
   	
  </head>

<body>

<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 				
			</a>
			
			<a class="brand" href="<?php echo U('Index/index');?>">未来门后台管理系统</a>
			
			 <!-- /nav-collapse -->
			
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->	

<div id="content">
	
	<div class="container">
		
		<div class="row">
			
			<div class="span3">
				
				<div class="account-container">
				
					<div class="account-details">
					
						<span class="account-name">管理员</span>
						
						<span class="account-role">Admin</span>
						
						
					
					</div> <!-- /account-details -->
				
				</div> <!-- /account-container -->
				
				<hr />
				
				<ul id="main-nav" class="nav nav-tabs nav-stacked">
					
					<li class="active">
						<a href="<?php echo U('Img/imglist');?>">
							<i class="icon-home"></i>
							图片轮播
						</a>
					</li>
					<!-- 
					<li>
						<a href="<?php echo U('Company/company');?>">
							<i class="icon-pushpin"></i>
							公司简介
						</a>
					</li>
					 -->
					<li>
						<a href="<?php echo U('News/newslist');?>">
							<i class="icon-th-large"></i>
							新闻管理
						</a>
					</li>
					
					<li>
						<a href="<?php echo U('Nav/navlist');?>">
							<i class="icon-signal"></i>
							导航管理(包括公司简介)
						</a>
					</li>
					
					<li>
						<a href="<?php echo U('Pic/picList');?>">
							<i class="icon-user"></i>
							合作企业							
						</a>
					</li>
					
					<li>
						<a href="./login.html">
							<i class="icon-book"></i>
							视频管理
						</a>
					</li>

					<li>
						<a href="<?php echo U('Pic/moidfyBigPage');?>">
							<i class="icon-picture"></i>
							前台大图修改
						</a>
					</li>

					<li>
						<a href="<?php echo U('Password/modifyPage');?>">
							<i class="icon-lock"></i>
							密码修改
						</a>
					</li>
					
				</ul>	
				
				<hr />
				
				
				
				<br />
		
			</div> <!-- /span3 -->
			
			
			
			<div class="span9">
				
				<h1 class="page-title">
					<i class="icon-home"></i>
					文章			
				</h1>
				<div class="widget widget-table">
										
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3>新增文章</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div class="tabbable" style="margin-top:30px">
							<div class="tab-content">
								<div class="tab-pane active">
									<form action="<?php echo U('Nav/save');?>" method="post" enctype="multipart/form-data" id="edit-profile" class="form-horizontal">
										<fieldset>
											<div class="control-group">
												<label class="control-label" for="title">标题</label>
												<div class="controls">
													<input id="title" style="width:300px" class="input-medium" type="text" value="<?php echo ($show["title"]); ?>" name="title">
													<input name="id" value="<?php echo ($show["id"]); ?>" type="hidden">
													<input name="type" value="<?php echo ($show["type"]); ?>" type="hidden">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="title">时间</label>
												<div class="controls">
													<input id="title" style="width:300px" class="input-medium" type="text" value="<?php echo ($show["time"]); ?>" name="time">
													时间格式请严格按照  2015-08-03 11:23:00
												</div>
											</div>
											<div class="control-group" style="padding-left:50px;padding-right:50px">
												内容
												<script id="container" name="content" type="text/plain"><?php echo (htmlspecialchars_decode($show["content"])); ?></script>
    											<!-- 配置文件 -->
    											<script type="text/javascript" src="/Public/ueditor/ueditor.config.js"></script>
    											<!-- 编辑器源码文件 -->
    											<script type="text/javascript" src="/Public/ueditor/ueditor.all.js"></script>
    											<!-- 实例化编辑器 -->
    											<script type="text/javascript">
       	 											var ue = UE.getEditor('container');
    											</script>
											</div>
											<div class="form-actions">
												<button class="btn btn-primary" type="submit">提交</button>
											</div>
										</fieldset>
									</form>
								</div>
							</div>
						</div>
					</div>
				
				<div style="display:none">
					<form id="flash_img" action="<?php echo U('Pic/uploadImg');?>"  method="post"  target="hidden_frame" enctype="multipart/form-data">
						<input type="file" id="flash_pic" name="pic" onchange="$('#flash_sub').click()"/>
						<input type="submit" value="提交" id="flash_sub">
					</form>
					<iframe style="display:" name='hidden_frame' id="hidden_frame"></iframe>
				</div>
			</div> <!-- /span9 -->
			
			
		</div> <!-- /row -->
		
	</div> <!-- /container -->
	
</div> <!-- /content -->
					
	
<div id="footer">
	
	<div class="container">				
		<hr />
		<p>&copy; 2012 Go Ideate.</p>
	</div> <!-- /container -->
	
</div> <!-- /footer -->


    

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/Public/Admin/js/jquery-1.7.2.min.js"></script>
<script src="/Public/Admin/js/excanvas.min.js"></script>
<script src="/Public/Admin/js/jquery.flot.js"></script>
<script src="/Public/Admin/js/jquery.flot.pie.js"></script>
<script src="/Public/Admin/js/jquery.flot.orderBars.js"></script>
<script src="/Public/Admin/js/jquery.flot.resize.js"></script>


<script src="/Public/Admin/js/bootstrap.js"></script>
<script src="/Public/Admin/js/charts/bar.js"></script>

  </body>
</html>