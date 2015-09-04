<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 14.08.15
 * Time: 09:55
 */

namespace wpFlow\Shortcodes;

use wpFlow\Core\Bootstrap;
use wpFlow\Core\Package\Package as BasePackage;
use wpFlow\Shortcodes\TemplateEngine\TemplateParser;

class Package extends BasePackage
{
    protected $bootsptrap;
    protected $templateParser;

    public function boot(Bootstrap $bootstrap){
        $this->bootsptrap = $bootstrap;

    }

    public function run(){


    }
}