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
<div class="main_title"><?php echo L("EDIT");?> <a href="<?php echo u("Deal/online_index");?>" class="back_list"><?php echo L("BACK_LIST");?></a></div>
<div class="blank5"></div>
<!-- <form name="edit" action="__APP__" method="post" enctype="multipart/form-data"> -->
<table class="form conf_tab" cellpadding=0 cellspacing=0 >
	<tr>
		<td colspan=2 class="topTd"></td>
	</tr>
	<tr>
		<td class="item_title" colspan="2" style="text-align:center">第一组图片:</td>
	</tr>
	<tr>
		<td class="item_title"></td>
		<td class="item_input">位置一</td>
	</tr>
	
	<tr>
		<td class="item_title">图片1:</td>
		<td class="item_input">
			<form method="post" action="<?php echo U('IndexShow/pic');?>" enctype="multipart/form-data" target="pic1_2_iframe">
			<input type="file" name="img1" onchange="$('#sub1_2').click()">
			<img src="<?php echo ($index[0]['pic2']); ?>" id="img1_2" style="width:40px; height:52px;"/>
			<p>建议尺寸:400px*520px</p>
			<input type="hidden" name="group" value="<?php echo ($index[0]['group']); ?>"/>
			<input type="hidden" name="seat" value="<?php echo ($index[0]['seat']); ?>"/>
			<input type="hidden" name="id" value="<?php echo ($index[0]['id']); ?>"/>
			<input type="hidden" name="img" value="img2"/>
			<input type="hidden" name="pic" value="pic2"/>
			<input type="submit" id="sub1_2" value="提交" style="display:none">
			</form>
			<iframe  name="pic1_2_iframe" id="pic1_2_iframe" style="display:none"></iframe>
		</td>
	</tr>
	<tr>
		<td class="item_title">标题:</td>
		<td class="item_input">
			<form method="post" action="<?php echo U('IndexShow/text');?>" enctype="multipart/form-data" target="1_iframe">
			<input type="text" name="title" value="<?php echo ($index[0]['title']); ?>" onchange="$('#sub1_3').click()">
			<input type="hidden" name="group" value="<?php echo ($index[0]['group']); ?>"/>
			<input type="hidden" name="seat" value="<?php echo ($index[0]['seat']); ?>"/>
			<input type="hidden" name="id" value="<?php echo ($index[0]['id']); ?>"/>
			<input type="submit" id="sub1_3" value="提交" style="display:none">
			</form>
			<iframe  name="1_iframe" id="1_iframe" style="display:none"></iframe>
		</td>
	</tr>
	<tr>
		<td class="item_title">连接:</td>
		<td class="item_input">
			<form method="post" action="<?php echo U('IndexShow/url');?>" enctype="multipart/form-data" target="2_iframe">
			<input type="text" name="title" style="width:300px;" value="<?php echo ($index[0]['url']); ?>" onchange="$('#sub1_4').click()">
			<input type="hidden" name="group" value="<?php echo ($index[0]['group']); ?>"/>
			<input type="hidden" name="seat" value="<?php echo ($index[0]['seat']); ?>"/>
			<input type="hidden" name="id" value="<?php echo ($index[0]['id']); ?>"/>
			<input type="submit" id="sub1_4" value="提交" style="display:none">
			</form>
			<iframe  name="2_iframe" id="2_iframe" style="display:none"></iframe>
		</td>
	</tr>
	<tr>
		<td class="item_title"></td>
		<td class="item_input">位置二</td>
	</tr>
	<tr>
		<td class="item_title">图片1:</td>
		<td class="item_input">
			<form method="post" action="<?php echo U('IndexShow/pic');?>" enctype="multipart/form-data" target="pic2_1_iframe">
				<input type="file" name="img" onchange="$('#sub2_1').click()">
				<img src="<?php echo ($index[1]['pic1']); ?>" id="img2_1" style="width:40px; height:28px;"/>
				<p>建议尺寸:400px*280px</p>
				<input type="hidden" name="group" value="<?php echo ($index[1]['group']); ?>"/>
				<input type="hidden" name="seat" value="<?php echo ($index[1]['seat']); ?>"/>
				<input type="hidden" name="id" value="<?php echo ($index[1]['id']); ?>"/>
				<input type="hidden" name="img" value="img2_1"/>
				<input type="hidden" name="pic" value="pic1"/>
				<input type="submit" id="sub2_1" value="提交" style="display:none">
			</form>
			<iframe  name="pic2_1_iframe" id="pic2_1_iframe" style="display:none"></iframe>
		</td>
	</tr>
	<tr>
		<td class="item_title">图片2:</td>
		<td class="item_input">
			<form method="post" action="<?php echo U('IndexShow/pic');?>" enctype="multipart/form-data" target="pic2_2_iframe">
				<input type="file" name="img" onchange="$('#sub2_2').click()">
				<img src="<?php echo ($index[1]['pic2']); ?>" id="img2_2" style="width:40px; height:28px;"/>
				<p>建议尺寸:400px*280px</p>
				<input type="hidden" name="group" value="<?php echo ($index[1]['group']); ?>"/>
				<input type="hidden" name="seat" value="<?php echo ($index[1]['seat']); ?>"/>
				<input type="hidden" name="id" value="<?php echo ($index[1]['id']); ?>"/>
				<input type="hidden" name="img" value="img2_2"/>
				<input type="hidden" name="pic" value="pic2"/>
				<input type="submit" id="sub2_2" value="提交" style="display:none">
			</form>
			<iframe  name="pic2_2_iframe" id="pic2_2_iframe" style="display:none"></iframe>
		</td>
	</tr>
	<tr>
		<td class="item_title">标题:</td>
		<td class="item_input">
			<form method="post" action="<?php echo U('IndexShow/text');?>" enctype="multipart/form-data" target="2_5_iframe">
			<input type="text" name="title" value="<?php echo ($index[1]['title']); ?>" onchange="$('#sub2_5').click()">
			<input type="hidden" name="group" value="<?php echo ($index[1]['group']); ?>"/>
			<input type="hidden" name="seat" value="<?php echo ($index[1]['seat']); ?>"/>
			<input type="hidden" name="id" value="<?php echo ($index[1]['id']); ?>"/>
			<input type="submit" id="sub2_5" value="提交" style="display:none">
			</form>
			<iframe  name="2_5_iframe" id="2_5_iframe" style="display:none"></iframe>
		</td>
	</tr>
	<tr>
		<td class="item_title">连接:</td>
		<td class="item_input">
			<form method="post" action="<?php echo U('IndexShow/url');?>" enctype="multipart/form-data" target="2_4_iframe">
			<input type="text" name="title" style="width:300px;" value="<?php echo ($index[1]['url']); ?>" onchange="$('#sub2_4').click()">
			<input type="hidden" name="group" value="<?php echo ($index[1]['group']); ?>"/>
			<input type="hidden" name="seat" value="<?php echo ($index[1]['seat']); ?>"/>
			<input type="hidden" name="id" value="<?php echo ($index[1]['id']); ?>"/>
			<input type="submit" id="sub2_4" value="提交" style="display:none">
			</form>
			<iframe  name="2_4_iframe" id="2_4_iframe" style="display:none"></iframe>
		</td>
	</tr>
	<tr>
		<td class="item_title"></td>
		<td class="item_input">位置三</td>
	</tr>
	<tr>
		<td class="item_title">图片1:</td>
		<td class="item_input">
			<form method="post" action="<?php echo U('IndexShow/pic');?>" enctype="multipart/form-data" target="pic3_1_iframe">
			<input type="file" name="img1" onchange="$('#sub3_1').click()">
			<img src="<?php echo ($index[2]['pic1']); ?>" id="img3_1" style="width:40px; height:52px;"  />
			<p>建议尺寸:400px*520px</p>
			<input type="hidden" name="group" value="<?php echo ($index[2]['group']); ?>"/>
			<input type="hidden" name="seat" value="<?php echo ($index[2]['seat']); ?>"/>
			<input type="hidden" name="id" value="<?php echo ($index[2]['id']); ?>"/>
			<input type="hidden" name="img" value="img3_1"/>
			<input type="hidden" name="pic" value="pic1"/>
			<input type="submit" id="sub3_1" value="提交" style="display:none">
			</form>
			<iframe  name="pic3_1_iframe" id="pic3_1_iframe" style="display:none"></iframe>
		</td>
	</tr>
	<tr>
		<td class="item_title">连接:</td>
		<td class="item_input">
			<form method="post" action="<?php echo U('IndexShow/url');?>" enctype="multipart/form-data" target="3_4_iframe">
			<input type="text" name="title" style="width:300px;" value="<?php echo ($index[2]['url']); ?>" onchange="$('#sub3_4').click()">
			<input type="hidden" name="group" value="<?php echo ($index[2]['group']); ?>"/>
			<input type="hidden" name="seat" value="<?php echo ($index[2]['seat']); ?>"/>
			<input type="hidden" name="id" value="<?php echo ($index[2]['id']); ?>"/>
			<input type="submit" id="sub3_4" value="提交" style="display:none">
			</form>
			<iframe  name="3_4_iframe" id="3_4_iframe" style="display:none"></iframe>
		</td>
	</tr>
	<tr>
		<td class="item_title" colspan="2" style="text-align:center">第二组图片:</td>
	</tr>
	<tr>
		<td class="item_title"></td>
		<td class="item_input">位置一</td>
	</tr>
	<tr>
		<td class="item_title">图片2:</td>
		<td class="item_input">
			<form method="post" action="<?php echo U('IndexShow/pic');?>" enctype="multipart/form-data" target="pic4_2_iframe">
			<input type="file" name="img1" onchange="$('#sub4_2').click()">
			<img src="<?php echo ($index[3]['pic2']); ?>" id="img3_2" style="width:40px; height:52px;"/>
			<p>建议尺寸:400px*520px</p>
			<input type="hidden" name="group" value="<?php echo ($index[3]['group']); ?>"/>
			<input type="hidden" name="seat" value="<?php echo ($index[3]['seat']); ?>"/>
			<input type="hidden" name="id" value="<?php echo ($index[3]['id']); ?>"/>
			<input type="hidden" name="img" value="img4_2"/>
			<input type="hidden" name="pic" value="pic2"/>
			<input type="submit" id="sub4_2" value="提交" style="display:none">
			</form>
			<iframe  name="pic4_2_iframe" id="pic4_2_iframe" style="display:none"></iframe>
		</td>
	</tr>
	<tr>
		<td class="item_title">标题:</td>
		<td class="item_input">
			<form method="post" action="<?php echo U('IndexShow/text');?>" enctype="multipart/form-data" target="4_3_iframe">
			<input type="text" name="title" value="<?php echo ($index[3]['title']); ?>" onchange="$('#sub4_3').click()">
			<input type="hidden" name="group" value="<?php echo ($index[3]['group']); ?>"/>
			<input type="hidden" name="seat" value="<?php echo ($index[3]['seat']); ?>"/>
			<input type="hidden" name="id" value="<?php echo ($index[3]['id']); ?>"/>
			<input type="submit" id="sub4_3" value="提交" style="display:none">
			</form>
			<iframe  name="4_3_iframe" id="4_3_iframe" style="display:none"></iframe>
		</td>
	</tr>
	<tr>
		<td class="item_title">连接:</td>
		<td class="item_input">
			<form method="post" action="<?php echo U('IndexShow/url');?>" enctype="multipart/form-data" target="4_4_iframe">
			<input type="text" name="title" style="width:300px;" value="<?php echo ($index[3]['url']); ?>" onchange="$('#sub4_4').click()">
			<input type="hidden" name="group" value="<?php echo ($index[3]['group']); ?>"/>
			<input type="hidden" name="seat" value="<?php echo ($index[3]['seat']); ?>"/>
			<input type="hidden" name="id" value="<?php echo ($index[3]['id']); ?>"/>
			<input type="submit" id="sub4_4" value="提交" style="display:none">
			</form>
			<iframe  name="4_4_iframe" id="4_4_iframe" style="display:none"></iframe>
		</td>
	</tr>
	<tr>
		<td class="item_title"></td>
		<td class="item_input">位置二</td>
	</tr>
	<tr>
		<td class="item_title">图片1:</td>
		<td class="item_input">
			<form method="post" action="<?php echo U('IndexShow/pic');?>" enctype="multipart/form-data" target="pic5_1_iframe">
				<input type="file" name="img" onchange="$('#sub5_1').click()">
				<img src="<?php echo ($index[4]['pic1']); ?>" id="img5_1" style="width:40px; height:28px;"/>
				<p>建议尺寸:400px*280px</p>
				<input type="hidden" name="group" value="<?php echo ($index[4]['group']); ?>"/>
				<input type="hidden" name="seat" value="<?php echo ($index[4]['seat']); ?>"/>
				<input type="hidden" name="id" value="<?php echo ($index[4]['id']); ?>"/>
				<input type="hidden" name="img" value="img5_1"/>
				<input type="hidden" name="pic" value="pic1"/>
				<input type="submit" id="sub5_1" value="提交" style="display:none">
			</form>
			<iframe  name="pic5_1_iframe" id="pic5_1_iframe" style="display:none"></iframe>
		</td>
	</tr>
	
	<tr>
		<td class="item_title">连接:</td>
		<td class="item_input">
			<form method="post" action="<?php echo U('IndexShow/url');?>" enctype="multipart/form-data" target="5_3_iframe">
			<input type="text" name="title" style="width:300px;" value="<?php echo ($index[4]['url']); ?>" onchange="$('#sub5_3').click()">
			<input type="hidden" name="group" value="<?php echo ($index[4]['group']); ?>"/>
			<input type="hidden" name="seat" value="<?php echo ($index[4]['seat']); ?>"/>
			<input type="hidden" name="id" value="<?php echo ($index[4]['id']); ?>"/>
			<input type="submit" id="sub5_3" value="提交" style="display:none">
			</form>
			<iframe  name="5_3_iframe" id="5_3_iframe" style="display:none"></iframe>
		</td>
	</tr>
	<tr>
		<td class="item_title">标题:</td>
		<td class="item_input">
			<form method="post" action="<?php echo U('IndexShow/text');?>" enctype="multipart/form-data" target="5_4_iframe">
			<input type="text" name="title" value="<?php echo ($index[4]['title']); ?>" onchange="$('#sub5_4').click()">
			<input type="hidden" name="group" value="<?php echo ($index[4]['group']); ?>"/>
			<input type="hidden" name="seat" value="<?php echo ($index[4]['seat']); ?>"/>
			<input type="hidden" name="id" value="<?php echo ($index[4]['id']); ?>"/>
			<input type="submit" id="sub5_4" value="提交" style="display:none">
			</form>
			<iframe  name="5_4_iframe" id="5_4_iframe" style="display:none"></iframe>
		</td>
	</tr>
	<tr>
		<td class="item_title"></td>
		<td class="item_input">位置三</td>
	</tr>
	<tr>
		<td class="item_title">图片1:</td>
		<td class="item_input">
			<form method="post" action="<?php echo U('IndexShow/pic');?>" enctype="multipart/form-data" target="pic6_2_iframe">
			<input type="file" name="img1" onchange="$('#sub6_2').click()">
			<img src="<?php echo ($index[5]['pic1']); ?>" id="img6_2" style="width:40px; height:52px;"  />
			<p>建议尺寸:400px*520px</p>
			<input type="hidden" name="group" value="<?php echo ($index[5]['group']); ?>"/>
			<input type="hidden" name="seat" value="<?php echo ($index[5]['seat']); ?>"/>
			<input type="hidden" name="id" value="<?php echo ($index[5]['id']); ?>"/>
			<input type="hidden" name="img" value="img6_2"/>
			<input type="hidden" name="pic" value="pic1"/>
			<input type="submit" id="sub6_2" value="提交" style="display:none">
			</form>
			<iframe  name="pic6_2_iframe" id="pic6_2_iframe" style="display:none"></iframe>
		</td>
	</tr>
	<tr>
		<td class="item_title">连接:</td>
		<td class="item_input">
			<form method="post" action="<?php echo U('IndexShow/url');?>" enctype="multipart/form-data" target="6_1_iframe">
			<input type="text" name="title" style="width:300px;" value="<?php echo ($index[5]['url']); ?>" onchange="$('#sub6_1').click()">
			<input type="hidden" name="group" value="<?php echo ($index[5]['group']); ?>"/>
			<input type="hidden" name="seat" value="<?php echo ($index[5]['seat']); ?>"/>
			<input type="hidden" name="id" value="<?php echo ($index[5]['id']); ?>"/>
			<input type="submit" id="sub6_1" value="提交" style="display:none">
			</form>
			<iframe  name="6_1_iframe" id="6_1_iframe" style="display:none"></iframe>
		</td>
	</tr>
</table>
<script type="text/javascript">
	function uploadIndex(result,url,id){
		if(result == '0'){
			$('#'+id).attr('src',url);
		}
		else{
			alert('上传失败');
		}
	}
</script>

</body>
</html>