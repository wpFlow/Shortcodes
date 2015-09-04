<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 13.08.15
 * Time: 16:44
 */

namespace wpFlow\Shortcodes;


use wpFlow\Shortcodes\TemplateEngine\TemplateParser;

abstract class AbstractShortcode

{
    /** An Instance of the Reflection Class
     * @var \ReflectionClass
     */
    protected $reflectionClass;

    /**
     * The unique [Tag] for each Shortcode.
     * @var string
     */
    protected $tag;

    /**
     * The Mighty Constructor.
     */
    public function __construct( ){
        $this->reflectionClass = new \ReflectionClass( $this );
    }

    /**
     * The Shortcode Function! Always return and not echo what should be outputed.
     * @param $att
     * @param null $content
     * @return mixed
     */
    abstract function shortCodeMagic( $att, $content = NULL );


    /**
     * Register the Shortcode to use it in the Wordpress Environment.
     * @throws ShortcodeException
     */
    public function register(){

        $className = $this->reflectionClass->getName();

        if($this->tag) {
            add_shortcode($this->tag, array($className, 'shortCodeMagic'));
        } else throw new ShortcodeException('No Tag was specified!');


    }

    /**
     * Return the Tag name in this Method!
     * @return string
     */
    public function setTag( $tag ){
        $this->tag = strtolower( $tag );
    }
}