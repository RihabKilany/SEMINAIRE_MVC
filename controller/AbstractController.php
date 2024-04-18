<?php 

abstract class AbstractController {    
    // Private variable to hold the security token
    private $token;

    // Constructor that initializes the token upon creating an instance of a controller that extends this abstract class
    public function __construct(){
        // Generates a hashed token using BCRYPT algorithm. Note: There's an extra semicolon that can be removed.
        $this->token = password_hash("monToken", PASSWORD_BCRYPT);
    }

    // Getter method to return the security token
    public function getToken() {
        return $this->token;
    }

    // Method to verify if a given form token is valid against the stored token
    public function isValid($tokenForm){
        // Uses password_verify to check if the provided tokenForm matches the hashed "monToken"
        return password_verify("monToken", $tokenForm);
    }

    // Method to render a view file with optional data passed to it
    public function render($view, $data = []){
        // Start output buffering to capture output
        ob_start();

        // Extracts variables from the data array to make them available in the scope of the view
        extract($data);

        // Constructs the path to the view file
        $page = "views/" . $view . ".php";

        // Security measure to prevent directory traversal attacks
        $page = str_replace("../", "protect", $page);
        // Prevents injections or unwanted execution by replacing certain characters
        $page = str_replace(";", "protect", $page);
        $page = str_replace("%", "protect", $page);

        // Checks if the view file exists before including it
        if (!file_exists($page)) {
            throw new Exception("Cette page n'existe pas");
        }

        // Includes the view file, which outputs its content to the output buffer
        include $page;

        // Captures the content from the output buffer and cleans it
        $content = ob_get_clean();

        // Includes the template file, presumably using $content within it
        include "views/template.php";
    }    
}
