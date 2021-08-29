<?php

require_once "html_text.php";

class HtmlForm extends HtmlText
{    
      public function __construct($title, $author, $stylesheet, $nav, $footer, $content, $formFields=[], $formInfo)
    {
       parent::__construct($title, $author, $stylesheet, $nav, $footer, $content);
       $this->formFields = $formFields;
       $this->formInfo = $formInfo;
    }    
    
    protected function showBodyContent() 
    { 
        parent::showBodyContent(); 
        
        if($this->formFields)
        {   
            $this->startForm();
            $this->showForm();
            $this->endForm();
        }      
    }
    
    protected function startForm()
    {
        if($this->formInfo)
        {
            echo '<form action="'.$this->formInfo["action"].'" method="'.$this->formInfo["method"].'">';
        } 
    }
  
    protected function showForm()
    {
        if($this->formFields)
        {
            foreach($this->formFields as $field => $value) 
            {            
                if($this->formFields["$field"]["type"] === "textarea")
                {
                    echo '<label for="'.$field.'">'.$this->formFields["$field"]["label"].'</label> <br>';
                    echo '<textarea name="'.$field.'" placeholder="'.$this->formFields["$field"]["placeholder"].'">'.(isset($_POST["$field"])? $_POST["$field"] : ("")).'</textarea><br>';
                }
                else
                {
                    echo '<label for="'.$field.'">'.$this->formFields["$field"]["label"].'</label> <br>';
                    echo '<input type="'.$this->formFields["$field"]["type"].'" name="'.$field.'" placeholder="'.$this->formFields["$field"]["placeholder"].'" value="'.(isset($_POST["$field"])? $_POST["$field"] : ("")).'"> <br>';
                }
            }
        }
    }
    
    function endForm()
    {
        if($this->formInfo)
        {
            echo '<input type="hidden" name="page" value="'.$this->formInfo["page"].'"> <br>';
            echo '<input type="submit" name="submit" value="'.$this->formInfo["submit"].'"> <br>';
            echo '</form>';        
        } 
         
    }  
    
}