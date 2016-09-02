<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="__TMPL__Common/style/style.css" />
<script type="text/javascript">
 	var VAR_MODULE = "<?php echo conf("VAR_MODULE");?>";
	var VAR_ACTION = "<?php echo conf("VAR_ACTION");?>";
	var MODULE_NAME	=	'<?php echo MODULE_NAME; ?>';
	var ACTION_NAME	=	'<?php echo ACTION_NAME; ?>';
	var ROOT = '__APP__';
	var ROOT_PATH = '<?php echo APP_ROOT; ?>';
	var CURRENT_URL = '<?php echo trim($_SERVER['REQUEST_URI']);?>';
	var INPUT_KEY_PLEASE = "<?php echo L("INPUT_KEY_PLEASE");?>";
	var TMPL = '__TMPL__';
	var APP_ROOT = '<?php echo APP_ROOT; ?>';
</script>
<script type="text/javascript" src="__TMPL__Common/js/jquery.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/jquery.timer.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/script.js"></script>
<script type="text/javascript" src="__ROOT__/public/runtime/admin/lang.js"></script>
<script type='text/javascript'  src='__ROOT__/admin/public/kindeditor/kindeditor.js'></script>
</head>
<body>
<div id="info"></div>

<script type="text/javascript" src="__ROOT__/system/region.js"></script>	
<script type="text/javascript" src="__TMPL__Common/js/deal_edit.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/calendar/calendar.php?lang=zh-cn" ></script>
<link rel="stylesheet" type="text/css" href="__TMPL__Common/js/calendar/calendar.css" />
<script type="text/javascript" src="__TMPL__Common/js/calendar/calendar.js"></script>
<div class="main">
<div class="main_title">添加新闻&nbsp;<a href="<?php echo u("Article/index");?>" class="back_list">返还列表</a></div>
<div class="blank5"></div>
<form name="insert" action="<?php echo U('Article/insert');?>" method="post" enctype="multipart/form-data">
<table class="form conf_tab" cellpadding=0 cellspacing=0 >
	<tr>
		<td colspan=2 class="topTd"></td>
	</tr>
	<tr>
		<td class="item_title">新闻标题:</td>
		<td class="item_input"><input type="text" class="textbox" value="<?php echo ($vo["name"]); ?>" name="title" /></td>
	</tr>
	<tr>
		<td class="item_title">作者:</td>
		<td class="item_input"><input type="text" class="textbox" name="author" value="佚名" style="width:30px;" /></td>
	</tr>
	<tr>
		<td class="item_title">点击量:</td>
		<td class="item_input"><input type="text" class="textbox" name="hits" value="132" style="width:30px;" /></td>
	</tr>
	<tr>
		<td class="item_title">图片:</td>
		<td class="item_input">
			<div style='width:120px; height:40px; margin-left:10px; display:inline-block;  float:left;' class='none_border'><script type='text/javascript'>var eid = 'image';KE.show({id : eid,items : ['upload_image'],skinType: 'tinymce',allowFileManager : true,resizeMode : 0});</script><div style='font-size:0px;'><textarea id='image' name='image' style='width:120px; height:25px;' ></textarea> </div><input type='text' id='focus_image' style='font-size:0px; border:0px; padding:0px; margin:0px; line-height:0px; width:0px; height:0px;' /></div><img src='./admin/Tpl/default/Common/images/no_pic.gif'  style='display:inline-block; float:left; cursor:pointer; margin-left:10px; border:#ccc solid 1px; width:35px; height:35px;' id='img_image' /><img src='/zc/admin/Tpl/default/Common/images/del.gif' style='display:none; margin-left:10px; float:left; border:#ccc solid 1px; width:35px; height:35px; cursor:pointer;' id='img_del_image' onclick='delimg("image")' title='删除' />
		</td>
	</tr>
	<tr>
		<td class="item_title">添加时间:</td>
		<td class="item_input">
			<input type="text" class="textbox" name="addtime" id="begin_time" value="" onfocus="this.blur(); return showCalendar('begin_time', '%Y-%m-%d %H:%M:%S', false, false, 'btn_begin_time');" />
			<input type="button" class="button" id="btn_begin_time" value="选择时间" onclick="return showCalendar('begin_time', '%Y-%m-%d %H:%M:%S', false, false, 'btn_begin_time');" />	
			<input type="button" class="button" value="清空时间" onclick="$('#begin_time').val('');" />	

		</td>
	</tr>	
		
	<tr>
		<td class="item_title" style="height:200px">描述:</td>
		<td class="item_input">
			<textarea name="intro" style="width:600px;"></textarea>
		</td>
	</tr>
	
	<tr>
		<td class="item_title">详情:</td>
		<td class="item_input">
			<script id="container" name="content" type="text/plain">
        	<?php echo ($vo["content"]); ?>
    		</script>
    		<!-- 配置文件 -->
    		<script type="text/javascript" src="__ROOT__/admin/public/ueditor/ueditor.config.js"></script>
    		<!-- 编辑器源码文件 -->
    		<script type="text/javascript" src="__ROOT__/admin/public/ueditor/ueditor.all.js"></script>
    		<!-- 实例化编辑器 -->
    		<script type="text/javascript">
	    	    //var ue = UE.getEditor('container');
	    	    var ue = UE.getEditor('container', {initialFrameWidth:900});
		    </script>
		</td>
	</tr>
	
	<tr>
		<td class="item_title">发布:</td>
		<td class="item_input">
			<lable>是<input type="radio" name="enable" value="1" checked="checked"  /></lable>
			<lable>否<input type="radio" name="enable" value="0"  /></lable>
		</td>
	</tr>
	
	<tr>
		<td class="item_title">推荐:</td>
		<td class="item_input">
			<lable>是<input type="radio" name="rec" value="1" /></lable>
			<lable>否<input type="radio" name="rec" value="0" checked="checked" /></lable>
		</td>
	</tr>
	
	<tr>
		<td colspan=2 class="bottomTd"></td>
	</tr>
</table>

<div class="blank5"></div>
	<table class="form" cellpadding=0 cellspacing=0>
		<tr>
			<td colspan=2 class="topTd"></td>
		</tr>
		<tr>
			<td class="item_title"></td>
			<td class="item_input">
			<input type="submit" class="button" value="添加" />
			<input type="reset" class="button" value="清空" />
			</td>
		</tr>
		<tr>
			<td colspan=2 class="bottomTd"></td>
		</tr>
	</table> 		 
</form>
</div>
</body>
</html>