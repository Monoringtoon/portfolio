<?php

require_once "html_basic_doc.php";

class HtmlText extends HtmlBasisDoc
{    
      public function __construct($title, $author, $stylesheet, $nav, $footer, $content)
    {
        parent::__construct($title, $author, $stylesheet, $nav, $footer, $content);
        $this->content = $content; 
    }    
    
    protected function showBodyContent() 
    { 
        if($this->content)
        {
            echo $this->content;
        }        
    }
      
}