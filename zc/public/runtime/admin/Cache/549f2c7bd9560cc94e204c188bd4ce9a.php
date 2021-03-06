<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo conf("APP_NAME");?><?php echo l("ADMIN_PLATFORM");?></title>
<script type="text/javascript" src="__ROOT__/public/runtime/admin/lang.js"></script>
<script type="text/javascript">
	var version = '<?php echo app_conf("DB_VERSION");?>';
</script>
<link rel="stylesheet" type="text/css" href="__TMPL__Common/style/style.css" />
<link rel="stylesheet" type="text/css" href="__TMPL__Common/style/main.css" />
<script type="text/javascript" src="__TMPL__Common/js/jquery.js"></script>
</head>

<body>
	<div class="main">
	<div class="main_title">未来门微股权交易中心<?php echo l("ADMIN_PLATFORM");?> <?php echo L("HOME");?>	</div>
	<div class="blank5"></div>
	<table class="form" cellpadding=0 cellspacing=0>
		<tr>
			<td colspan=2 class="topTd"></td>
		</tr>
		<tr>
			<td class="item_title" style="width:200px;">
				<?php echo L("CURRENT_VERSION");?>
			</td>
			<td class="item_input">
				<?php echo L("APP_VERSION");?>:<?php echo conf("DB_VERSION");?> <span id="version_tip"></span>
			</td>
		</tr>
		
		<tr>
			<td class="item_title" style="width:200px;">
				<?php echo L("TIME_INFORMATION");?>
			</td>
			<td class="item_input">
				<?php echo L("CURRENT_TIME");?>：<?php echo to_date(get_gmtime()); ?>
			</td>
		</tr>
		
		<tr>
			<td colspan=2 class="bottomTd"></td>
		</tr>
	</table>	
	</div>
</body>
</html>