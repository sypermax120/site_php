<?php

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'noteshop',
    'language'=>'ru',
    'defaultController'=>'product',

	'preload'=>array('log'),

	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.components.ShoppingCart.*',
	),

	'modules'=>array(
	),


	'components'=>array(

        'shoppingCart'=>array(
            'class'=>'application.components.ShoppingCart.EShoppingCart',
        ),

		'user'=>array(

			'allowAutoLogin'=>true,
		),


		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
);
