<?php

class SeminaireController extends AbstractController {

    public function httpSeminaire() {
        // Check if an action for Seminaire has been set
        if (isset($_GET['actionSeminaire'])) {
            // Create an instance of the model
            $seminaireModel = new SemiModel();
            // Retrieve the action from the GET request
            $action = $_GET['actionSeminaire'];

            // Handle different actions based on the actionSeminaire parameter
            switch ($action) {
                case "list":
                    // Fetch all seminaires using the model
                    $seminaires = $seminaireModel->lireSemis();
                    // Render the view with seminaires data and security token
                    $this->render("seminaire/list", [
                        "seminaires" => $seminaires,
                        "token" => $this->getToken()
                    ]);
                    break;

                case "details":
                    // Fetch a single seminaire details if id is provided
                    if (isset($_GET['id'])) {
                        $seminaire = $seminaireModel->lireSemi(intval($_GET['id']));
                        $this->render("seminaire/details", [
                            "seminaire" => $seminaire,
                            "token" => $this->getToken()
                        ]);
                    } else {
                        // If no id is provided, redirect or handle error appropriately
                        header("location: ?actionSeminaire=list");
                        exit;
                    }
                    break;

                case "delete":
                    // Perform deletion if id is provided and confirm deletion request
                    if (isset($_GET['id']) && isset($_POST['confirm']) && $_POST['confirm'] == "yes") {
                        $seminaireModel->delete(intval($_GET['id']));
                        header("location: ?actionSeminaire=list");
                        exit;
                    } else {
                        // Show confirmation page or handle error
                        $this->render("seminaire/confirm_delete", [
                            "id" => $_GET['id'],
                            "token" => $this->getToken()
                        ]);
                    }
                    break;

                case "edit":
                    // Edit an existing seminaire if id is provided
                    if (isset($_GET['id'])) {
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            // Assuming we have a method to handle post data and update the seminar
                            $seminaireModel->update($this->collectPostData($_GET['id']));
                            header("location: ?actionSeminaire=details&id=" . $_GET['id']);
                            exit;
                        } else {
                            // Render the edit form with existing seminar data
                            $seminaire = $seminaireModel->lireSemi(intval($_GET['id']));
                            $this->render("seminaire/edit", [
                                "seminaire" => $seminaire,
                                "token" => $this->getToken()
                            ]);
                        }
                    } else {
                        header("location: ?actionSeminaire=list");
                        exit;
                    }
                    break;

                // Add additional cases for other actions such as "add"
            }
        }
    }

    // Helper method to collect post data for updates (not implemented here, just a placeholder)
    private function collectPostData($id) {
        // Retrieve and sanitize input data
        return [
            'id' => $id,
            'titre' => $_POST['titre'] ?? '',
            'resume' => $_POST['resume'] ?? '',
            'lieu' => $_POST['lieu'] ?? '',
            'date' => $_POST['dateIntervention'] ?? ''
        ];
    }
}
