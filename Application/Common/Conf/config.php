<?php
return array(
	//'配置项'=>'配置值'
		'MODULE_DENY_LIST'     =>  array('Commounal','Runtime','Common'), // 禁止访问的模块列表
		
		'SESSION_AUTO_START' => true,//是否开启session
		'PAGE_NUM'=>'20', //定义分页数量
		'SHOW_PAGE_TRACE' =>false, //显示页面Trace信息
		
		'TOKEN_ON'		=>	true, // 是否开启令牌验证
		'TOKEN_NAME'	=>	'__hash__', // 令牌验证的表单隐藏字段名称
		'TOKEN_TYPE'	=>	'md5', //令牌哈希验证规则 默认为MD5
		'TOKEN_RESET'	=>	true,  //令牌验证出错后是否重置令牌 默认为trues
		
		//数据库配置
		'DB_TYPE'   => 'mysql', // 数据库类型
		'DB_HOST'   => '119.10.34.36', // 服务器地址
		'DB_NAME'   => 'my1006252', // 数据库名
		'DB_USER'   => 'my1006252', // 用户名
		'DB_PWD'    => 'z5r9c4D8', // 密码
		'DB_PORT'   => '3306', // 端口
		'DB_PREFIX' => 'wlm_', // 数据库表前缀
		'DB_CHARSET'=> 'utf8', // 字符集
		
		//URL设置
		'URL_CASE_INSENSITIVE'  =>  true,// 默认false 表示URL区分大小写 true则表示不区分大小写
		'URL_MODEL'             =>  3,
		'URL_PATHINFO_DEPR'     =>  '/',
		'URL_PATHINFO_FETCH'    =>  'ORIG_PATH_INFO,REDIRECT_PATH_INFO,REDIRECT_URL', // 用于兼容判断PATH_INFO 参数的SERVER替代变量列表
		'URL_REQUEST_URI'       =>  'REQUEST_URI', // 获取当前页面地址的系统变量 默认为REQUEST_URI
		'URL_HTML_SUFFIX'       =>  'html',  // URL伪静态后缀设置
		
		'FILE_UPLOAD_TYPE'      =>  'Local',    // 文件上传方式
		'DATA_CRYPT_TYPE'       =>  'Think',    // 数据加密方式
);