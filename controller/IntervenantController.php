<?php
class IntervenantController extends AbstractController {

    public function httpIntervenant() {
        if (isset($_GET['actionIntervenant'])) {
            $intervenantModel = new InterModel();
            $action = $_GET['actionIntervenant'];

            switch ($action) {
                case "list":
                    $intervenants = $intervenantModel->lireInters();
                    $this->render("intervenant/list", ["intervenants" => $intervenants, "token" => $this->getToken()]);
                    break;
                case "details":
                    if (isset($_GET['id'])) {
                        $intervenant = $intervenantModel->lireInt(intval($_GET['id']));
                        $this->render("intervenant/details", ["intervenant" => $intervenant, "token" => $this->getToken()]);
                    } else {
                        header("location: ?actionIntervenant=list");
                        exit;
                    }
                    break;
                case "delete":
                    if (isset($_GET['id']) && isset($_POST['confirm']) && $_POST['confirm'] == "yes") {
                        $intervenantModel->delete(intval($_GET['id']));
                        header("location: ?actionIntervenant=list");
                        exit;
                    } else {
                        $this->render("intervenant/confirm_delete", ["id" => $_GET['id'], "token" => $this->getToken()]);
                    }
                    break;
            }
        }
    }
}
