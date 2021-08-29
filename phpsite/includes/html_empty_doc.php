<?php 

class HtmlEmptyDoc
{
    protected $title;
    protected $author;
    protected $stylesheet;

//////////
//public//
//////////
    
    public function __construct($title, $author, $stylesheet)
   {
       $this->title = $title;
       $this->author = $author;
       $this->stylesheet = $stylesheet;
   }

    public function show()
    {
        $this->beginDoc();
        $this->beginHead();
        $this->showHeadContent();
        $this->endHead();
        $this->beginBody();
        $this->beginNav();
        $this->showNav();
        $this->endNav();
        $this->showBodyContent();
        $this->endBody();
        $this->beginFooter();
        $this->showFooterContent();
        $this->endFooter();
        $this->endDoc();
    }    

/////////////
//protected//
/////////////
    private function beginDoc() 
    { 
        echo '<!DOCTYPE html>'.PHP_EOL.'<html>'.PHP_EOL; 
    }

    protected function showHeadContent() 
    { 
       if ($this->title) 
       {
           echo '<title>'.$this->title.'</title>'.PHP_EOL;
       }
       if ($this->author) 
       {
           echo '<meta name="author" content="'.$this->author.'" />'.PHP_EOL;
       }
       if ($this->stylesheet) 
       {
           echo '<link href="'.$this->stylesheet.'" rel="stylesheet">';
       }
    }    
    
    // protected om later nog CSS classes toe te kunnen voegen
    protected function beginBody() 
    { 
        echo '<body>'.PHP_EOL; 
    }
    
    protected function beginNav() 
    { 
        echo '<ul>'.PHP_EOL; 
    }
    
    protected function beginFooter()
    {
        echo '<footer>'.PHP_EOL;
    }
    
///////////
//private//
///////////
    private function beginHead() 
    { 
        echo '<head>'.PHP_EOL; 
    }

    private function endHead()
    { 
        echo '</head>'.PHP_EOL; 
    }
    
    private function endNav() 
    { 
        echo '</ul>'.PHP_EOL; 
    }

    private function endBody() 
    { 
        echo '</body>'.PHP_EOL; 
    }
    
    private function endFooter()
    {
        echo '</footer>'.PHP_EOL;
    }

    private function endDoc() 
    { 
        echo '</html>'.PHP_EOL; 
    }
}

