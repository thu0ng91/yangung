<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'YACMS',

	// preloading 'log' component
	'preload'=>array('log'),
	'language'=>'zh_cn',
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',		
		'application.components.behaviors.*',
		'ext.ucenter.interface.UC_IUser',
        'ext.ucenter.class.*',
        'ext.ucenter.UCenter',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'user',
	),
	'behaviors'=>array(
    	'application.components.behaviors.BeforeRequestBehavior'
	),
	// application components
	'components'=>array(

		'user'=>array(
			'class'=>'application.components.WebUser',
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			//'urlFormat'=>'path',
			//'showScriptName' => true, 'urlSuffix'=>'/',
			'rules'=>array(
//				//用户中心
//				'userinfo'=>array('member/userinfo'),
//				//用户中心
//				'reg'=>array('member/reg'),
//				//用户登录
//				'login'=>array('site/login'),
//				//用户退�?
//				'logout'=>array('site/logout'),
//				//我要分享
//				'share'=>array('member/share'),
//				//用户分享
//				'myshare'=>array('member/myshare'),
//				//用户书架
//				'bookcase'=>array('member/bookcase'),
//				//电子书列�?
//				'novellist/<sort:\d+>'=>array('novel/list'),
//				//电子书详情页
//				'novelinfo/<id:\d+>'=>array('novel/info'),
//				//电子书推荐http://yii.cn/index.php/download/index/id/7/
//				'novelvote/<id:\d+>'=>array('novel/vote'),
//				//加入书包
//				'bookcase/<id:\d+>'=>array('novel/bookcase'),
//				//下载电子�?
//				'download/<id:\d+>'=>array('download/index'),
//				//搜索电子�?
//				'search'=>array('novel/search'),
				//'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				//'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				//'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		// uncomment the following to use a MySQL database
		'mailer' => array(
				'class' => 'application.extensions.mailer.EMailer',
		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=app',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'gr5stdv',
			'tablePrefix'=>'yacms_',
			'charset' => 'utf8',
		),
		'ucdb'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=ultrax',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'gr5stdv',
			'class'=> 'CDbConnection',
			'tablePrefix'=>'pre_',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),

				array(
					'class'=>'CWebLogRoute',
                    'levels'=>'trace, info, error, warning',
                    'categories'=>'cool.*,system.db.*', //这个最好设�?
				),				*/
			),
		),
        'format'=>array(
            'datetimeFormat'=>'Y-m-d H:i:s',
            'dateFormat'=>'Y-m-d',
        ),
	),
    
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
