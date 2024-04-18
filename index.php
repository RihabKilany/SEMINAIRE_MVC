<?php
// Start the session for any needed session management (if necessary for other features like settings)
session_start();

// Autoloader for class file inclusions dynamically
spl_autoload_register(function($class) {
    $page = $class . '.php';
    // Search for class files in the typical directories
    if (file_exists("classes/" . $page)) {
        require_once "classes/" . $page;
    } elseif (file_exists("controller/" . $page)) {
        require_once "controller/" . $page;
    } elseif (file_exists("model/" . $page)) {
        require_once "model/" . $page;
    }
});

// Initialize controllers for managing seminars and intervenants

$semCtl = new SeminaireController();       // Controller for managing seminars
$intervCtl = new IntervenantController(); // Controller for managing intervenants (participants)

// Main control flow
try {
    // Process HTTP requests related to seminars and intervenants
    $semCtl->httpSeminaire();               // Method to handle HTTP requests for seminars
    $intervCtl->httpIntervenant();        // Method to handle HTTP requests for intervenants

} catch (Exception $e) {
    // Handle exceptions by rendering an error page
    $homeCtl->render("404/404", ["erreur" => $e->getMessage()]);
}
