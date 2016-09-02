<?php
return array(
	//'配置项'=>'配置值'
	
	/* 数据库配置 */
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'=>'my1006252.xincache1.cn',
	'DB_NAME'=>'my1006252',
	'DB_USER'=>'my1006252',
	'DB_PWD'=>'z5r9c4D8',
	'DB_PORT'=>'3306',
	'DB_PREFIX'=>'fanwe_',
	'DB_CHARSET'=> 'utf8', // 字符集
	
	/* 模板相关配置 */
	'TMPL_PARSE_STRING' => array(
		'__PUBLIC__' => __ROOT__ . '/zc/Zc/Tpl/Style',
		'__MOBILE__'		=>	'http://weilaimen.org/zcw/mobile.php',
		//'__MOBILE__'		=>	'http://www.baidu.com'
	),
		
	/*页面跳转配置*/
	'TMPL_ACTION_ERROR' => 'Public/jump', // 默认错误跳转对应的模板文件
	'TMPL_ACTION_SUCCESS' =>  'Public/jump', // 默认成功跳转对应的模板文件
	#'TMPL_EXCEPTION_FILE'   =>  MODULE_PATH.'Tpl/Public/exception.html',// 异常页面的模板文件
	
	'IMG_URL' => '',
		
	'URL_MODEL'          => '0', //URL模式
		C('msgURL','http://114.215.130.61:8082/SendMT/SendMessage'),
		C('msgUsername','weilaimen'),
		C('msgPassword','123456'),
		C('msgSubid',''),);
?>