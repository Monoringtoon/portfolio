<?php

class Controller
{
    private $request;
    private $response;

    public function handleRequest()
    {
        $this->getPage();
        $this->validatePage();
        $this->showPage();
    }

    private function getPage()
    {
        $arr = array("home", "about", "contact", "register", "login");

        if($_SERVER['REQUEST_METHOD'] === "GET")
        {
            if (isset($_GET["page"]) && (in_array($_GET["page"], $arr, TRUE)))
            {
                $this->request = 
                    [
                    "isGet" => true, 
                    "page" => $_GET["page"]
                    ];  
            }
            else
            {
                $this->request = 
                    [
                    "isGet" => true,
                    "page" => "home"
                    ];  
            }
        }
        else
        {
            if (isset($_POST["page"]))
            {
                $this->request =
                    [
                    "isGet" => false, 
                    "page" => $_POST["page"]
                    ];  
            }
        }
    }
        
    private function validatePage()
    {
        require_once "validate_input.php";
        
        $page = $this->request['page'];
        $this->response = $this->request;
        
        $validateInput = new ValidateInput;

        // GET uitzonderingen
        if ($this->request["isGet"])
        {
            switch ($page)
            {
                case "logout" : 
                $this->response["page"] = "login";
                break;
            }
        }
        
        // POST uitzonderingen
        else
        {
            
            // error messages mogen niet hier echo
            $errorMessages = $validateInput->validate($page);
            if(empty($errorMessages))
            {
                $submit = true;
            }
            else 
            {
                foreach($errorMessages as $errorMessage) 
                {
                    $submit = false;
                    echo $errorMessage;
                    // $this->response["$errorMessage"] = $errorMessage;
                }
            }
                
            switch ($page)
            {
                case "contact":
                    if($submit)
                    {
                        $this->response["page"] = "home";
                    }
                    break;
                case "register" : 
                    if($submit)
                    {
                        $this->response["page"] = "login";
                    }
                    break;
                case "login" : 
                    if($submit)
                    {
                        $this->response["page"] = "home";
                    }
                    break;
                default : 
                    // later nog een not found pagina/bericht
                    $this->response["page"] = "home";
            }
        }
    }


    private function showPage()
    {
        require_once "html_text.php";
        require_once "html_form.php";
        require_once "database_functions.php";
        
        $page = $this->response['page'];
        
        // $errorMessages = $this->response['errorMessage'];
        
        $Db = new DatabaseFunctions;
        $nav = $Db->getNavItems();
        $footer = $Db->getFooter();
        $content = $Db->getContent($page);
        $formFields = $Db->getFormFields($page);
        $formInfo = $Db->getFormInfo($page);
        
        // toevoegen $errorMessages
        switch ($page)
        {
            case "home" :
                $page = new HtmlText('Home', 'Monique de Clerck', './stylesheet/style.css', $nav, $footer, $content);
                break;
            case "about" : 
                $page = new HtmlText('About', 'Monique de Clerck', './stylesheet/style.css', $nav, $footer, $content);
                break;
            case "contact" : 
                $page = new HtmlForm('Contact', 'Monique de Clerck', './stylesheet/style.css', $nav, $footer, $content, $formFields, $formInfo);
                break;
            case "register" : 
                $page = new HtmlForm('Register', 'Monique de Clerck', './stylesheet/style.css', $nav, $footer, $content, $formFields, $formInfo);
                break;
            case "login" : 
                $page = new HtmlForm('Login', 'Monique de Clerck', './stylesheet/style.css', $nav, $footer, $content, $formFields, $formInfo);
                break;
            default:
                $page = new HtmlText('Home', 'Monique de Clerck', './stylesheet/style.css', $nav, $footer, $content);
        }
        $page->show();
    }  
}

