<?php

namespace wokster\menu;

class Menu extends \yii\base\Module
{
    public $controllerNamespace = 'wokster\menu\controllers';
    public $defaultRoute = 'menu';

    public function init()
    {
        parent::init();
    }
}
