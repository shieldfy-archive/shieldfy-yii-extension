<?php
namespace Shieldfy\Extensions\Yii;

use yii\base\BootstrapInterface;
use yii\base\Application;
use Shieldfy\Guard;

/**
 * https://www.yiiframework.com/doc/guide/2.0/en/structure-extensions#creating-extensions
 */
class BootstrapLoader implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->on(Application::EVENT_BEFORE_REQUEST, function () use($app) {
            if (php_sapi_name() === "cli") {
                return;
            }
            // get Shieldfy Params
            $params = \Yii::$app->params;
            $paramsShieldfyExists = array_key_exists('Shieldfy', $params);
            // init Shieldfy Guard
            $shieldfy = \Shieldfy\Guard::init([
                'endpoint'      => 'https://api.shieldfy.com/v1',
                'app_key'       => $paramsShieldfyExists ? $params['Shieldfy']['appKey'] : '',
                'app_secret'    => $paramsShieldfyExists ? $params['Shieldfy']['appSecret'] : ''
            ]);

            \Yii::$container->set('shieldfy',$shieldfy);
        });
    }
}
