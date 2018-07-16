# shieldfy yii extension
## Require shieldfy Yii extension
From your console navigate to your application folder and enter the command below:
```
composer require shieldfy/shieldfy-yii-extension
```
for more information about composer click [here](https://getcomposer.org/doc/01-basic-usage.md)

## Add Shieldfy DB listener
Add shieldfy attachPDO to this file config/db.php:
```
return [
    .....

    'on afterOpen' => function($event) {
            (\Yii::$container->get('shieldfy'))?\Yii::$container->get('shieldfy')->attachPDO($event->sender->pdo):null;
    }
]
```

## Add Shieldfy Key & Secret
Add shieldfy key, secret to this file config/params.php:
```
return [
    .....             
    'Shieldfy' => [
        'appKey' => 'jsd155068s',
        'appSecret' => '137f2998c8dfb157b5c97ed75bbeae52d284ad3a46b7c9cac332460710fb5618',
    ]
]

```