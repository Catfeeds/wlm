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

<?php function get_integrate_install($install)
	{
		return l("IS_INSTALL_".intval($install));
	} ?>
<script type="text/javascript">
	function uninstall(class_name)
	{
		if(confirm("<?php echo L("CONFIRM_DELETE");?>"))
		{
			location.href = ROOT + "?m=Integrate&a=uninstall&class_name="+class_name;
		}
	}
</script>
<div class="main">
<div class="main_title"><?php echo ($main_title); ?></div>
<div class="blank5"></div>

<table cellspacing="0" cellpadding="0" class="dataTable" id="dataTable">
	<tbody>
		<tr>
			<td class="topTd" colspan="4">&nbsp; </td>
			</tr>
			<tr class="row">
				<th><?php echo L("INTEGRATE_NAME");?></th>
				<th><?php echo L("INTEGRATE_CLASS_NAME");?></th>
				<th><?php echo L("IS_INSTALL");?></th>
				<th><?php echo L("TAG_LANG_OPERATE");?></th>
				</tr>
				<?php if(is_array($integrate_list)): foreach($integrate_list as $key=>$integrate_item): ?><tr class="row">
					<td><?php echo ($integrate_item["name"]); ?></td>
					<td><?php echo ($integrate_item["class_name"]); ?></td>
					<td><?php echo (get_integrate_install($integrate_item["installed"])); ?></td>
					<td>
						<?php if($integrate_item['installed'] == 0): ?><a href="<?php echo u("Integrate/install",array("class_name"=>$integrate_item['class_name']));?>"><?php echo L("INSTALL");?></a>
						<?php else: ?>
						<a href="javascript:uninstall('<?php echo ($integrate_item["class_name"]); ?>');" ><?php echo L("UNINSTALL");?></a><?php endif; ?>
					</td>
				</tr><?php endforeach; endif; ?>
				<tr><td class="bottomTd" colspan="4"> &nbsp;</td></tr>
			</tbody>
		</table>


</div>
</body>
</html>