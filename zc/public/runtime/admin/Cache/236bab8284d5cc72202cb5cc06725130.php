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
<form name="edit" action="__APP__" method="post" enctype="multipart/form-data">
<table class="form conf_tab" cellpadding=0 cellspacing=0 >
	<tr>
		<td colspan=2 class="topTd"></td>
	</tr>
	<tr>
		<td class="item_title">名称:</td>
		<td class="item_input"><input type="text" class="textbox require" value="<?php echo ($vo["name"]); ?>" name="name" /></td>
	</tr>
	<tr>
		<td class="item_title">发起人ID:</td>
		<td class="item_input"><input type="text" class="textbox" name="user_id" value="<?php echo ($vo["user_id"]); ?>" style="width:30px;" /> <span class='tip_span'>不填写表示管理员发起</span></td>
	</tr>
	<tr>
		<td class="item_title">图片:</td>
		<td class="item_input">
			<div style='width:120px; height:40px; margin-left:10px; display:inline-block;  float:left;' class='none_border'><script type='text/javascript'>var eid = 'image';KE.show({id : eid,items : ['upload_image'],skinType: 'tinymce',allowFileManager : true,resizeMode : 0});</script><div style='font-size:0px;'><textarea id='image' name='image' style='width:120px; height:25px;' ><?php echo ($vo["image"]); ?></textarea> </div></div><input type='text' id='focus_image' style='font-size:0px; border:0px; padding:0px; margin:0px; line-height:0px; width:0px; height:0px;' /></div><img src='<?php if($vo["image"] == ''): ?>./admin/Tpl/default/Common/images/no_pic.gif<?php else: ?><?php echo ($vo["image"]); ?><?php endif; ?>' <?php if($vo["image"] != ''): ?>onclick='openimg("image")'<?php endif; ?> style='display:inline-block; float:left; cursor:pointer; margin-left:10px; border:#ccc solid 1px; width:35px; height:35px;' id='img_image' /><img src='/zc/admin/Tpl/default/Common/images/del.gif' style='<?php if($vo["image"] == ''): ?>display:none;<?php else: ?>display:inline-block;<?php endif; ?> margin-left:10px; float:left; border:#ccc solid 1px; width:35px; height:35px; cursor:pointer;' id='img_del_image' onclick='delimg("image")' title='删除' />
		</td>
	</tr>
	<tr>
		<td class="item_title">视频地址:</td>
		<td class="item_input"><input type="text" class="textbox" name="vedio" value="<?php echo ($vo["vedio"]); ?>" /></td>
	</tr>
	<tr>
		<td class="item_title">关注人数:</td>
		<td class="item_input"><input type="text" class="textbox" name="focus_edit" value="<?php echo ($vo["focus_edit"]); ?>" /></td>
	</tr>
	<tr>
		<td class="item_title">点赞人数:</td>
		<td class="item_input"><input type="text" class="textbox" name="dolike_edit" value="<?php echo ($vo["dolike_edit"]); ?>" /></td>
	</tr>
	<tr>
		<td class="item_title">是否分享:</td>
		<td class="item_input">
			<input type="radio" class="textbox" name="share" value="0" <?php if($vo['share'] == 0): ?>checked<?php endif; ?> />是
			<input type="radio" class="textbox" name="share" value="1" style="margin-left:20px" <?php if($vo['share'] == 1): ?>checked<?php endif; ?> />否
		</td>
	</tr>
	<tr>
		<td class="item_title">参考上线天数:</td>
		<td class="item_input"><input type="text" class="textbox" name="deal_days" value="<?php echo ($vo["deal_days"]); ?>" /></td>
	</tr>
	<tr>
		<td class="item_title">开始时间:</td>
		<td class="item_input">
			<input type="text" class="textbox require" name="begin_time" id="begin_time" value="<?php echo ($vo["begin_time"]); ?>" onfocus="this.blur(); return showCalendar('begin_time', '%Y-%m-%d %H:%M:%S', false, false, 'btn_begin_time');" />
			<input type="button" class="button" id="btn_begin_time" value="<?php echo L("SELECT_TIME");?>" onclick="return showCalendar('begin_time', '%Y-%m-%d %H:%M:%S', false, false, 'btn_begin_time');" />	
			<input type="button" class="button" value="<?php echo L("CLEAR_TIME");?>" onclick="$('#begin_time').val('');" />	

		</td>
	</tr>
	<tr>
		<td class="item_title">结束时间:</td>
		<td class="item_input">
			<input type="text" class="textbox require" name="end_time" id="end_time" value="<?php echo ($vo["end_time"]); ?>" onfocus="this.blur(); return showCalendar('end_time', '%Y-%m-%d %H:%M:%S', false, false, 'btn_end_time');" />
			<input type="button" class="button" id="btn_end_time" value="<?php echo L("SELECT_TIME");?>" onclick="return showCalendar('end_time', '%Y-%m-%d %H:%M:%S', false, false, 'btn_end_time');" />	
			<input type="button" class="button" value="<?php echo L("CLEAR_TIME");?>" onclick="$('#end_time').val('');" />

		</td>
	</tr>
	
	<tr>
		<td class="item_title">上架:</td>
		<td class="item_input">
			<lable><?php echo L("IS_EFFECT_1");?><input type="radio" name="is_effect" value="1" <?php if($vo['is_effect'] == 1): ?>checked="checked"<?php endif; ?> /></lable>
			<lable><?php echo L("IS_EFFECT_0");?><input type="radio" name="is_effect" value="0" <?php if($vo['is_effect'] == 0): ?>checked="checked"<?php endif; ?> /></lable>
		</td>
	</tr>
	<tr>
		<td class="item_title">推荐:</td>
		<td class="item_input">
			<lable>是<input type="radio" name="is_recommend" value="1" <?php if($vo['is_recommend'] == 1): ?>checked="checked"<?php endif; ?> /></lable>
			<lable>否<input type="radio" name="is_recommend" value="0" <?php if($vo['is_recommend'] == 0): ?>checked="checked"<?php endif; ?> /></lable>
		</td>
	</tr>
	
	<tr>
		<td class="item_title">目标金额:</td>
		<td class="item_input"><input type="text" class="textbox" name="limit_price"  value="<?php echo ($vo["limit_price"]); ?>"/></td>
	</tr>
	<tr>
		<td class="item_title">购买单价:</td>
		<td class="item_input"><input type="text" class="textbox" value="<?php echo ($vo["price"]); ?>" name="price" /></td>
	</tr>
	
	<tr>
		<td class="item_title">简介:</td>
		<td class="item_input">
			<textarea name="brief" class="textarea"><?php echo ($vo["brief"]); ?></textarea>
		</td>
	</tr>
	
	<tr>
		<td class="item_title">详情</td>
		<td class="item_input">
			 <script id="container" name="description" type="text/plain" style="width:90%;height:500px;"><?php echo (htmlspecialchars_decode($vo["description"])); ?></script>
			 <script type="text/javascript" src="__ROOT__/admin/public/ueditor/ueditor.config.js"></script>
			<!-- 编辑器源码文件 -->
			<script type="text/javascript" src="__ROOT__/admin/public/ueditor/ueditor.all.js"></script>
			<!-- 实例化编辑器 -->
			<script type="text/javascript">
   				 var ue = UE.getEditor('container');
			</script>
		</td>
	</tr>
	<tr>
		<td class="item_title">投资回报</td>
		<td class="item_input">
			 <script id="shouyi" name="shouyi" type="text/plain" style="width:90%;height:300px;"><?php echo (htmlspecialchars_decode($vo["shouyi"])); ?></script>
			<!-- 实例化编辑器 -->
			<script type="text/javascript">
   				 var ue_shouyi = UE.getEditor('shouyi');
			</script>
		</td>
	</tr>
	<tr>
		<td class="item_title">标签:</td>
		<td class="item_input"><input type="text" class="textbox" name="tags" style="width:500px;" value="<?php echo ($vo["tags"]); ?>" /> <span class='tip_span'>用空格分隔</span></td>
	</tr>
	
	<tr>
		<td class="item_title">分类:</td>
		<td class="item_input">
			<select name="cate_id" class="require">
				<option value="0">请选择</option>
				<?php if(is_array($cate_list)): foreach($cate_list as $key=>$cate_item): ?><option value="<?php echo ($cate_item["id"]); ?>" <?php if($vo['cate_id'] == $cate_item['id']): ?>selected="selected"<?php endif; ?> ><?php echo ($cate_item["name"]); ?></option><?php endforeach; endif; ?>
			</select>
		</td>
	</tr>
	
	<tr>
		<td class="item_title">所属地区:</td>
		<td class="item_input">
			<select name="province">				
			<option value="" rel="0">请选择省份</option>
			<?php if(is_array($region_lv2)): foreach($region_lv2 as $key=>$region): ?><option value="<?php echo ($region["name"]); ?>" rel="<?php echo ($region["id"]); ?>" <?php if($region['selected']): ?>selected="selected"<?php endif; ?>><?php echo ($region["name"]); ?></option><?php endforeach; endif; ?>
			</select>
			
			<select name="city">				
			<option value="" rel="0">请选择城市</option>
			<?php if(is_array($region_lv3)): foreach($region_lv3 as $key=>$region): ?><option value="<?php echo ($region["name"]); ?>" rel="<?php echo ($region["id"]); ?>" <?php if($region['selected']): ?>selected="selected"<?php endif; ?>><?php echo ($region["name"]); ?></option><?php endforeach; endif; ?>
			</select>
		</td>
	</tr>
	
	<tr>
		<td class="item_title">排序:</td>
		<td class="item_input"><input type="text" class="textbox" name="sort" value="<?php echo ($vo["sort"]); ?>" /></td>
	</tr>
	
	<tr>
		<td class="item_title">常见问题: [<a href="javascript:void(0);" onclick="add_faq();">增加</a>]</td>
		<td class="item_input" id="faq">
			<?php if(is_array($faq_list)): foreach($faq_list as $key=>$faq_item): ?><div style="padding:3px;">
				问题 <input type="text" class="textbox" name="question[]" value="<?php echo ($faq_item["question"]); ?>" />
				答案 <input type="text" class="textbox" name="answer[]" value="<?php echo ($faq_item["answer"]); ?>" />
				<a href="javascript:void(0);" onclick="del_faq(this);">删除</a>
				</div><?php endforeach; endif; ?>
		</td>
	</tr>
	<!-- 
	<tr>
		<td class="item_title">SEO标题:</td>
		<td class="item_input">
			<textarea name="seo_title" class="textarea"><?php echo ($vo["seo_title"]); ?></textarea>
		</td>
	</tr>
	
	<tr>
		<td class="item_title">SEO关键词:</td>
		<td class="item_input">
			<textarea name="seo_keyword" class="textarea"><?php echo ($vo["seo_keyword"]); ?></textarea>
		</td>
	</tr>
	
	<tr>
		<td class="item_title">SEO描述:</td>
		<td class="item_input">
			<textarea name="seo_description" class="textarea"><?php echo ($vo["seo_description"]); ?></textarea>
		</td>
	</tr>
	 -->
	<tr>
		<td colspan=2 class="bottomTd"></td>
	</tr>
</table>

<div class="blank5"></div>
	<table class="form" cellpadding=0 cellspacing=0 style="display:none">
		<tr>
			<td colspan=2 class="topTd"></td>
		</tr>
		<tr>
			<td class="item_title"></td>
			<td class="item_input">
			<!--隐藏元素-->
			<input type="hidden" name="<?php echo conf("VAR_MODULE");?>" value="Deal" />
			<input type="hidden" name="<?php echo conf("VAR_ACTION");?>" value="update" />
			<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" />
			<!--隐藏元素-->
			<input type="submit" class="button" id="sub" value="<?php echo L("EDIT");?>" />
			<input type="reset" class="button" id="res" value="<?php echo L("RESET");?>" />
			</td>
		</tr>
		<tr>
			<td colspan=2 class="bottomTd"></td>
		</tr>
	</table>
</form>
<form method="post" id="index_form" target="index_iframe" action="<?php echo U('Deal/index_image');?>" enctype="multipart/form-data">
	<table class="form conf_tab" cellpadding=0 cellspacing=0 >
		<tr>
			<td class="item_title">首页展示图片(267*396):</td>
				<td class="item_input">
				<input type="file" name="index_show" onchange="$('#index_sub').click()"/>
				<img id="index_img" style="width:50px; height:100px;" src="<?php echo ($vo["index_img"]); ?>"/>
				<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" />
				<input type="submit" style="display:none" id="index_sub" value="提交"/>
			</td>
		</tr>
		<tr>
			<td class="item_title">数据展示:</td>
				<td class="item_input">
				<a href="<?php echo U('Deal/msgadd',array('id'=>$vo['id']));?>" _target="_blank">添加</a>
				<a href="<?php echo U('Deal/msglist',array('id'=>$vo['id']));?>" _target="_blank">查看</a>
			</td>
		</tr>
		
	</table>
</form>
<script type="text/javascript">
	function uploadIndex(result,url){
		if(result == '0'){
			$('#index_img').attr('src',url);
		}
		else{
			alert('上传失败');
		}
	}
</script>
<iframe name="index_iframe" style="display:none"></iframe>
<div class="blank5"></div>
	<table class="form" cellpadding=0 cellspacing=0>
		<tr>
			<td colspan=2 class="topTd"></td>
		</tr>
		<tr>
			<td class="item_title"></td>
			<td class="item_input">
			<!--隐藏元素-->
			<input type="hidden" name="<?php echo conf("VAR_MODULE");?>" value="Deal" />
			<input type="hidden" name="<?php echo conf("VAR_ACTION");?>" value="update" />
			<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" />
			<!--隐藏元素-->
			<input type="button" class="button" value="<?php echo L("EDIT");?>" onclick="$('#sub').click()" />
			<input type="reset" class="button" value="<?php echo L("RESET");?>" onclick="$('#res').click()" />
			</td>
		</tr>
		<tr>
			<td colspan=2 class="bottomTd"></td>
		</tr>
	</table> 		
</div>

</body>
</html>