<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 21.08.15
 * Time: 10:50
 */

namespace wpFlow\Shortcodes;


class BaseShortcode extends AbstractShortcode
{

    /**
     * The Shortcode Function! Always return and not echo what should be outputed.
     * @param $att
     * @param null $content
     * @return mixed
     */
    function shortCodeMagic($att, $content = NULL)
    {

    }
}