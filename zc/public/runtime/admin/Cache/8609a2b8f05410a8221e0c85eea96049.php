<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新闻列表</title>
<style type="text/css">
body {
    color: #404040;
    font-family: "verdana,Arial";
    font-size: 12px;
}
.main_title {
    background: none repeat scroll 0 0 #8ba9c0;
    border: 1px solid #ccc;
    color: #fff;
    font-size: 14px;
    font-weight: bolder;
    padding: 5px 15px;
}
.blank5 {
    clear: both;
    height: 5px;
    overflow: hidden;
    visibility: visible;
}
.dataTable {
    background: none repeat scroll 0 0 #fff;
    border-left: 1px solid #ccc;
    border-top: 1px solid #ccc;
    width: 100%;
}
.dataTable th {
    background: none repeat scroll 0 0 #edf3f7;
    border-bottom: 1px solid #ccc;
    border-right: 1px solid #ccc;
    height: 25px;
    line-height: 25px;
    text-align: center;
}
.dataTable td.topTd, .dataTable td.bottomTd {
    background: url("../images/bgline.gif") repeat-x scroll 0 0 rgba(0, 0, 0, 0);
    font-size: 0;
    height: 5px;
    line-height: 0;
    padding: 0;
}
.dataTable td {
    border-bottom: 1px solid #ccc;
    border-right: 1px solid #ccc;
    padding: 5px;
}
.button {
    background: none repeat scroll 0 0 #4e6a81;
    border-color: #dddddd #000000 #000000 #dddddd;
    border-style: solid;
    border-width: 2px;
    color: #ffffff;
    cursor: pointer;
    letter-spacing: 0.1em;
    overflow: visible;
    padding: 3px 15px;
    text-decoration: none;
    width: auto;
}
.search_row {
    background: none repeat scroll 0 0 #8ba9c0;
    border: 1px solid #ccc;
    color: #fff;
    font-size: 14px;
    font-weight: bolder;
    padding: 5px 15px;
}
</style>
<script type="text/javascript" src="__TMPL__Common/js/jquery.js"></script>
<script>
function delOne(id){
	var id = id;
	var url = "<?php echo U('Article/del');?>";
	var url = url + 'id='+id;
	if(confirm('您确定要删除吗?\n\n数据删除后不可恢复，请谨慎操作!!!')){
    	window.location.href=url;
    }else{
        e.preventDefault();//有了这句话，将不再跳转
    }
}
function add(){
	var url = "<?php echo U('Article/add');?>";
	window.location.href=url;
}
function edit(id){
	var url = "<?php echo U('Article/edit');?>";
	var url = url + 'id='+id;
	window.location.href=url;
}
</script>
</head>

<body>
<div class="main">
	<div class="main_title">新闻列表</div>
	<div class="blank5"></div>
	<div class="button_row">
		<input type="button" onclick="add();" value="新增" class="button" />
		<input type="button" onclick="foreverdel();" value="删除" class="button" />
	</div>
	<div class="blank5"></div>
	<div class="search_row">
		<form method="post" action="<?php echo U('Article/search');?>" name="search">	
			新闻标题：<input type="text" style="width:100px;" value="<?php echo ($remember['keyword']); ?>" name="keyword" class="textbox" />
			<input type="submit" value="搜索" class="button" />
		</form>
	</div>
	<div class="blank5"></div>
	<table cellspacing="0" cellpadding="0" class="dataTable" id="dataTable">
		<tbody>
			<tr>
				<td class="topTd" colspan="9">&nbsp; </td>
			</tr>
			<tr class="row">
				<th width="8"><input type="checkbox" onclick="CheckAll('dataTable')" id="check" /></th>
				<th width="50px">编号</th>
				<th>新闻标题</th>
				<th>关键字</th>
				<th>点击量</th>
				<th>审核</th>	
				<th>推荐</th>			
				<th>时间</th>				
				<th>操作</th>
			</tr>
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr class="row">
				<td><input type="checkbox" value="<?php echo ($vo["id"]); ?>" class="key" name="key" /></td>
				<td>&nbsp;<?php echo ($vo["id"]); ?></td>
				<td>&nbsp;<?php echo ($vo["title"]); ?></td>
				<td>&nbsp;<?php echo ($vo["keywords"]); ?></td>
				<td>&nbsp;<?php echo ($vo["hits"]); ?></td>
				<td>&nbsp;<?php if($vo["enable"] == 1): ?><font color="green">已审核</font><?php else: ?><font color="red">未审核</font><?php endif; ?></td>
				<td>&nbsp;<?php if($vo["rec"] == 1): ?>推荐<?php else: ?>&nbsp;<?php endif; ?></td>
				<td>&nbsp;<?php echo (date("Y-m-d H:i:s",$vo["addtime"])); ?></td>				
				<td><a href="JavaScript:void(0);" onclick="edit(<?php echo ($vo["id"]); ?>)">编辑</a>&nbsp;<a href="javascript:void(0);" onclick="delOne(<?php echo ($vo["id"]); ?>)">删除</a>&nbsp;</td>
			</tr><?php endforeach; endif; ?>
			<tr>
				<td class="bottomTd" colspan="9"> &nbsp;</td>
			</tr>
		</tbody>
	</table>
	<div style="float:right;padding:10px 20px;">
	<?php echo ($page); ?>
	</div>
</div>
</body>
</html>