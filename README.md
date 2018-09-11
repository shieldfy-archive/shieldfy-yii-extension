# Shieldfy Yii2 Extension
## Require shieldfy Yii extension
From your console navigate to your application folder and enter the command below:
```
composer require shieldfy/shieldfy-yii-extension
```
for more information about composer click [here](https://getcomposer.org/doc/01-basic-usage.md)

## Add Shieldfy Component
```php
'bootstrap' => ['shieldfy'],
'components' => [
    ...
    'shieldfy' => [
          'class' => 'Shieldfy\Extensions\Yii\BootstrapLoader',
          'appKey' => '<APP_KEY>',
          'appSecret' => '<APP_SECRET>',
    ],
    ...
]
```

## Add Shieldfy DB listener
### If you use Yii2 Basic. add shieldfy attachPDO to this file `config/db.php`
```php
return [
    .....

    'on afterOpen' => function($event) {
            (\Yii::$container->get('shieldfy'))?\Yii::$container->get('shieldfy')->attachPDO($event->sender->pdo):null;
    }
]
```
### If you use Yii2 Basic. add shieldfy attachPDO to this file `common/config/main-local.php`
```php
return [
    'components' => [
        'db' => [
            ...
            'on afterOpen' => function($event) {
                (\Yii::$container->get('shieldfy'))?\Yii::$container->get('shieldfy')->attachPDO($event->sender->pdo):null;
        	},
        ],
        'mailer' => [
        .....
    ],
];
```