<?php

// class is nog zonder foute/goede submit. Errors mogen niet in een echo, moet uiteindelijk een array returnen
class ValidateInput
{
    public function validate($page)
    {    
        require_once "database_functions.php";
        $Db = new DatabaseFunctions;
        $formFields = $Db->getFormFields($page);
        $errorMessages = [];
        
        if($formFields)
        {
            foreach($formFields as $field => $value) 
            {      
                $input = $_POST["$field"];
                
                // check op empty
                if($input === "")
                {
                    $errorMessages[$field] = '<div class="error">Vul je '.$field.' in</div>';
                }
               
                // check op correcte name
                if($field === "name" && $input !== "" && (!preg_match("/^[a-zA-Z\s]*$/", $input)))
                {
                    $errorMessages[$field] = '<div class="error">Vul een correcte naam in</div>';                   
                }
                
                // check op correcte email
                if($field === "email" && $input !== "" && (!preg_match("/^[^@\s]+@[^@\s\.]+\.[^@\.\s]+$/", $input)))
                {
                    $errorMessages[$field] = '<div class="error">Vul een correct emailadres in</div>';  
                }
                
                //check op correcte pass
                if($field === "pass" && $input !== "" && (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $input)))
                {
                    $errorMessages[$field] = '<div class="error">Het wachtwoord moet bestaan uit 8 characters, waarvan minimaal 1 hoofdletter, 1 kleine letter, 1 cijfer en 1 speciaal character </div>';
                } 
            }
            
            // check op match pass en passcheck
            if(array_key_exists("pass", $formFields) && array_key_exists("passCheck", $formFields))
            {
                if(($_POST["pass"]) !== $_POST["passCheck"])
                {
                    $errorMessages[$field] = '<div class="error">Wachtwoorden matchen niet</div>';
                }
            }
        }    
        return $errorMessages;
    }
}