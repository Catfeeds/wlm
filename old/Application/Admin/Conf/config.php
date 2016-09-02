<?php
return array(
	//'配置项'=>'配置值'
	'URL_MODEL' => 0, //URL模式普通
	'SESSION_AUTO_START' => true, //是否开启session	
	'DEFAULT_FILTER' => 'htmlspecialchars',// 系统默认的变量过滤机制
	
	/* 模板相关配置 */
	'TMPL_PARSE_STRING' => array(
		'__PUBLIC__' => __ROOT__ . '/Public/' . MODULE_NAME,
	),
	
	/*页面跳转配置*/
	'TMPL_ACTION_ERROR' => MODULE_PATH.'View/Public/jump.html', // 默认错误跳转对应的模板文件
	'TMPL_ACTION_SUCCESS' =>  MODULE_PATH.'View/Public/jump.html', // 默认成功跳转对应的模板文件
	#'TMPL_EXCEPTION_FILE'   =>  MODULE_PATH.'View/Public/exception.html',// 异常页面的模板文件
	
	'USER_AUTH_KEY'   => 'u_id',//用户认证识别号
	
	'PAGE_NUM' => 10,//分页数量
	
	'WEB_NAME' => '企业信息管理系统',
	'WEB_ADV' => '欢迎使用企业信息管理系统程序，建站的首选工具。',
	'WEB_AUTH' => 'Powered by maxwei,E-mail:827400818@qq.com',
	'ADMIN_URL' => 'admin.php',
	'WEB_URL' => 'index.php',
);