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
    public $appKey;
    public $appSecret;

    public function bootstrap($app)
    {
        $app->on(Application::EVENT_BEFORE_REQUEST, function () use($app) {
            if (php_sapi_name() === "cli") {
                return;
            }
            $shieldfy = \Shieldfy\Guard::init([
                'endpoint'      => 'https://api.shieldfy.com/v1',
                'app_key'       => $this->appKey,
                'app_secret'    => $this->appSecret
            ]);

            \Yii::$container->set('shieldfy',$shieldfy);
        });
    }
}
