<?php

class DatabaseFunctions
{
    // nav
    public function getNavItems()
    {
        return array("home", "about", "contact", "register", "login");
    } 

    // footer
    public function getFooter()
    {
        return '&copy; 2021 Monique de Clerck';
    } 
    
    // content
    public function getContent($page)
    {
        switch ($page)
        {
            case "home":
                $content = '<div class="content">
                                <h1>
                                    Welkom <br>
                                </h1>
                                <p>
                                    Welkom op deze website. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates soluta quia iure suscipit dolor! Assumenda veritatis vero quasi rem vitae nulla vel id cupiditate sapiente similique cumque pariatur sed veniam ad beatae odit obcaecati laboriosam a quas magni, in ex soluta iusto ea! Eaque mollitia eos dolores nulla nobis architecto ea excepturi in vitae perspiciatis, recusandae officia, tenetur iure velit! Perferendis quisquam, provident assumenda sunt quibusdam voluptatem asperiores vel obcaecati. Minima veniam illo incidunt, voluptate nisi distinctio praesentium magni dicta unde, perspiciatis suscipit vero libero facere adipisci quos delectus excepturi accusamus, labore iste quaerat quis architecto tenetur. Amet, praesentium eveniet!
                                </p>
                            </div>';
                break;
            case "about":
                $content = '<div class="content">
                                <h1>Voorstellen</h1>
                                <img src="images/monique.jpg" alt="Monique de Clerck" title="Monique de Clerck" width="100px">
                                <p>
                                    Ik ben Monique de Clerck en ik ben 29 jaar. Ik heb pedagogiek gestudeerd, maar wegens het niet kunnen werken op mijn niveau, begon ik mij te vervelen. Mentaal werd ik niet genoeg meer uitgedaagd, waardoor ik nieuwe dingen ben gaan proberen. Eén daarvan was programmeren. 
                                </p>
                                <br>
                                <p>
                                    Verder heb ik heel veel verschillende interesses, waarvan ik een aantal hieronder zal gaan opsommen:
                                </p>
                                <ul id="hobby">
                                    <li>
                                        Haken
                                    </li>
                                    <li>
                                        Programmeren
                                    </li>
                                    <li>
                                        Tekenen
                                    </li>
                                    <li>
                                        Fotograferen
                                    </li>
                                    <li>
                                        Schrijven
                                    </li>
                                    <li>
                                        Kindergebarentaal (NmG)
                                    </li>
                                    <li>
                                        Diamond painting
                                    </li>
                                </ul>
                            </div>';
                break;
            case "contact":
                $content = '<div class="content">
                                <h1>Contact formulier</h1>
                            </div>';
                break;
            case "register":
                $content = '<div class="content">
                                <h1>Register</h1>
                            </div>';
                break;
            case "login":
                $content = '<div class="content">
                                <h1>Login</h1>
                            </div>';
                break;
        }
        return $content;
    }
    
    // formFields
    public function getFormFields($page)
    {
        switch ($page)
        {
            case "contact":
                return $formFields = array(
                    "name" => array(
                        "label" => "Name",
                        "type" => "text", 		
                        "placeholder" => "Type your name"
                    ),		
                    "email" => array(
                        "label" => "Email",
                        "type" => "email",
                        "placeholder" => "Type your email"
                    ),		
                    "text" => array(
                        "label" => "Message",
                        "type" => "textarea",
                        "placeholder" => "Type your message"
                    )
                );
                break;
            case "register":
                return $formFields = array(
                    "name" => array(
                        "label" => "Name",
                        "type" => "text", 		
                        "placeholder" => "Type your name"
                    ),		
                    "email" => array(
                        "label" => "Email",
                        "type" => "email",
                        "placeholder" => "Type your email"
                    ),		
                    "pass" => array(
                        "label" => "Password",
                        "type" => "password",
                        "placeholder" => "Type your password"
                    ),
                    "passCheck" => array(
                        "label" => "Password Again",
                        "type" => "password",
                        "placeholder" => "Type your password again"
                    )
                );
                break;
            case "login":
                return $formFields = array(
                    "name" => array(
                        "label" => "Name",
                        "type" => "text", 		
                        "placeholder" => "Type your name"
                    ),
                    "pass" => array(
                        "label" => "Password",
                        "type" => "password",
                        "placeholder" => "Type your password"
                    )
                );
                break;
        }
    }
    
    // formInfo
    public function getFormInfo($page)
    {
        switch ($page)
        {
            case "contact":
                return $formInfo = array(
                    "method" => "POST",
                    "action" => "index.php?page=contact",
                    "submit" => "Submit",
                    "page" => "contact"
                );
                break;
            case "register":
                return $formInfo = array(
                    "method" => "POST",
                    "action" => "index.php?page=register",
                    "submit" => "Register",
                    "page" => "register"
                );
                break;
            case "login":
                return $formInfo = array(
                    "method" => "POST",
                    "action" => "index.php?page=login",
                    "submit" => "Login",
                    "page" => "login"
                );
                break;
        }
    }
}


