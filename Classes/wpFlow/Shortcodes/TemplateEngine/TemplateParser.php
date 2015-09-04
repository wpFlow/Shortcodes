<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 14.08.15
 * Time: 14:34
 */

namespace wpFlow\Shortcodes\TemplateEngine;


use wpFlow\Bricks\Exceptions\TemplateParserException;
use wpFlow\Core\Utilities\Files;

class TemplateParser
{
    protected $templatePathAndFilename;

    protected $template;

    protected $content;

    protected $atts;

    public function setTemplatePathAndFilename( $templatePathAndFilename ) {
        $this->templatePathAndFilename = $templatePathAndFilename;
    }

    public function view($atts, $content){
        $this->atts = $atts;
        $this->content = $content;
        $this->get();
        $this->parse();

        if ( !empty( $atts ) ) $this->parseAtts();

        return $this->template;
    }

    protected function get() {

        if(file_exists($this->templatePathAndFilename)){
            $this->template = Files::getFileContents($this->templatePathAndFilename);

        } else throw new TemplateParserException('No Template was found!');

    }

    protected function parse() {
        $this->template = str_replace('<content>', $this->content, $this->template );

    }

    protected function parseAtts() {
        foreach($this->atts as $placeholder => $value){
            $this->template= str_replace(['<atts:' . $placeholder . '>','{{' . $placeholder . '}}'], $value, $this->template );
        }

    }
}