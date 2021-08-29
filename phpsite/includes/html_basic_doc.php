<?php

require_once "html_empty_doc.php";

class HtmlBasisDoc extends HtmlEmptyDoc
{    
    public function __construct($title, $author, $stylesheet, $nav, $footer)
    {
        parent::__construct($title, $author, $stylesheet);
        $this->nav = $nav;
        $this->footer = $footer;
    }    
    
    protected function showNav() 
    {
        echo '<ul class="menu">';
        foreach($this->nav as $menuItem) 
        {
            echo '<li><a href="index.php?page='.$menuItem.'">'.$menuItem.'</a></li>';
        }
        echo '</ul>';
    }
    
        protected function showFooterContent() 
    { 
        if($this->footer)
        {
            echo $this->footer;
        }
    }
    
}