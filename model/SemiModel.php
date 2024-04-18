<?php
class SemiModel extends AbstractModel{

//pour ajouter un nouveau  seminaire
public function create($seminaire){
    $query = "INSERT INTO seminaire VALUES (NULL, :inter, :titre, :resume, :lieu, :date, now())";

    $this->executerReq($query, [
        "inter" => $seminaire->getIdIntervenant(),
        "titre" => $seminaire->getTitre(),
        "resume" => $seminaire->getResume(),
        "lieu" =>  $seminaire->getLieu(),
        "date" => $seminaire->getDate()
    ]);

}

//pour recuperer tous les seminaires dans un tableau

public function lireSemis(){
    $stmt = $this->getAll("seminaire");

    $tab = [];

    while($res = $stmt->fetch()){
        extract($res);
        $tab[] = new Seminaire($id, $id_intervenant, $titre, $resume, $lieu, $date, $dateMise_a_jour);
    }

    return $tab;

}

//pour recuperer un seminaire par son id afin de le modifier
public function lireSemi(int $id){
    $stmt = $this->getOne("seminaire", $id);
    extract($stmt->fetch());

    return new Seminaire($id, $id_intervenant, $titre, $resume, $lieu, $date, $dateMise_a_jour);
}


public function delete(int $id){
    $stmt = $this->executerReq("DELETE FROM seminaire WHERE id = :id", ["id" => $id]);

}

public function update($seminaire){
    $query = "UPDATE seminaire SET titre = :titre WHERE id = :id";
    
    $this->executerReq($query, [
        "inter" => $seminaire->getIdIntervenant(),
        "titre" => $seminaire->getTitre(),
        "resume" => $seminaire->getResume(),
        "lieu" =>  $seminaire->getLieu(),
        "date" => $seminaire->getDate()

    ]);

}



    
}




