<?php
class InterModel extends AbstractModel{

//pour ajouter un nouveau intervenant
public function create($inter){
    $query = "INSERT INTO intervenant VALUES (NULL, :nom, :prenom, :affectation, :url_page_web)";

    $this->executerReq($query, [
        "nom" => $inter->getNom(),
        "prenom" => $inter->getPrenom(),
        "affectation" => $inter->getAffectation(),
        "url_page_web" =>$inter->getUrlPageWeb()
    ]);


}

//pour recuperer tous les intervenants dans un tableau

public function lireInters(){
    $stmt = $this->getAll("intervenant");

    $tab = [];

    while($res = $stmt->fetch()){
        extract($res);
        $tab[] = new Intervenant($id, $nom, $prenom, $affectation, $url_page_web);
    }

    return $tab;

}

//pour recuperer un intervenant par son id afin de le modifier
public function lireInt(int $id){
    $stmt = $this->getOne("intervenant", $id);
    extract($stmt->fetch());

    return new Intervenant($id, $nom, $prenom, $affectation, $url_page_web);
}


public function delete(int $id){
    $stmt = $this->executerReq("DELETE FROM intervenant WHERE id = :id", ["id" => $id]);

}

public function update($inter){
    $query = "UPDATE intervenant SET nom = :nom WHERE id = :id";
    
    $this->executerReq($query, [
        "nom" => $inter->getNom(),
        "prenom" => $inter->getPrenom(),
        "affectation" => $inter->getAffectation(),
        "url_page_web" =>$inter->getUrlPageWeb()

    ]);

}



    
}




