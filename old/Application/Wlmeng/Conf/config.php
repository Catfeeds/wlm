<?php
return array(
	//'配置项'=>'配置值'
		'TMPL_PARSE_STRING' => array(
				'__IJS__'     =>	__ROOT__ . '/Public/Index/js',
				'__ICSS__'	  =>	__ROOT__.'/Public/Index/css',
				'__IIMG__'	  =>	__ROOT__.'/Public/Index/images',
				
				'__JS__'	  =>	__ROOT__ . '/Public/style/js',
				'__CSS__'	  =>	__ROOT__ . '/Public/style/css',
				'__IMG__'	  =>	__ROOT__ . '/Public/style/images',
				
				'__MJS__'	  =>	__ROOT__.'/Public/js',
				
				'__LAYER__'   =>    __ROOT__.'/Public/layer',
		),
		
		C('LOGIN_KEY','wlmautologin'),
);