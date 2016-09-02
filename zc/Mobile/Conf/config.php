<?php
return array(
	//'配置项'=>'配置值'
		'DB_TYPE'   => 'mysql', // 数据库类型
		'DB_HOST'=>'my1006252.xincache1.cn',
		'DB_NAME'=>'my1006252',
		'DB_USER'=>'my1006252',
		'DB_PWD'=>'z5r9c4D8',
		'DB_PORT'=>'3306',
		'DB_PREFIX'=>'fanwe_',
		'DB_CHARSET'=> 'utf8', // 字符集
		
		'TMPL_PARSE_STRING' => array(
				'__PUBLIC__' 	=>	__ROOT__ . '/Mobile/Tpl/Style',
				'__CSS__'		=>	__ROOT__ . '/Mobile/Tpl/Style/css',
				'__JS__'		=>	__ROOT__ . '/Mobile/Tpl/Style/js',	
				'__IMG__'		=>	__ROOT__ . '/Mobile/Tpl/Style/images',
				'__LAYER__'		=>	__ROOT__ . '/Mobile/Tpl/Style/layer',
				'__AIMG__'		=>	'http://weilaimen.org'
		),
		
		'URL_MODEL'          => '0', //URL模式
		
		C('msgURL','http://114.215.130.61:8082/SendMT/SendMessage'),
		C('msgUsername','weilaimen'),
		C('msgPassword','123456'),
		C('msgSubid',''),
);
?>