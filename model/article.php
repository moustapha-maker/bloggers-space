<?php
require_once('App.php');


class ModelArticle{
private $titre;
private $date_de_creation;
private $description_courte;
private $description_detaillee;
private $image;
private $id_user;
private $vue;
public function __construct($titre=null, $date_de_creation=null, $description_courte=null, $description_detaillee=null,
 $image=null,$id_user=null){
if (!is_null($titre) && !is_null($date_de_creation) && !is_null($description_courte) &&
 !is_null($description_detaillee) && !is_null($image)) {
// Si aucun des paramètre n'est nul, c'est forcement qu'on les a fournis
$this->titre = $titre;
$this->date_de_creation = $date_de_creation;
$this->description_courte = $description_courte;
$this->image = $image;
$this->description_detaillee = $description_detaillee;
$this->id_user = $id_user;
$this->$vue=0;
}
}
public function __get($attr){
if (!isset($this->attr))
return "erreur";
else return ($this->attr);
}
public function __set($attr,$value) {
$this->attr = $value;
}

public static function getbyid($id){
    $db = App::getDB();
    $sql = "SELECT * FROM article where id=?";
    $params = array($id);
    $resultat = $db->execute_query($sql,$params);
    if(!$resultat) {
    echo "Lecture impossible";
    }
    else{
    return $resultat->fetch(PDO::FETCH_OBJ);
    }
    }
    
    public static function addView($id=null){
      $db = App::getDB();
      $sql = "UPDATE article SET vue=vue+1
              WHERE id=:id";
       
       $params = array( 'id'=>$id);
       
       $resultat = $db->execute_query($sql,$params);
    }

     public function save($id=null){
      $db = App::getDB();
       try{
       if($id==null){ //insertion d’un nouveau article
       $sql = "INSERT INTO article(titre, date_de_creation, description_courte, description_detaillee,image ,id_user) VALUES (?,?,?,?,?,?)";
       $params = array($this->titre,$this->date_de_creation, $this->description_courte, $this->description_detaillee,$this->image,$this->id_user);
       $resultat = $db->execute_query($sql, $params);
       }
       else{//MAJ d’un article existant
       $sql = "UPDATE article SET titre=:titre,
       date_de_creation=:date_de_creation,
       description_courte=:description_courte,
       description_detaillee=:description_detaillee,
       image=:image,
       id_user=:id_user,
       WHERE id=:id";
       
       $params = array('titre'=>$this->titre,
       
       'date_de_creation'=>$this->date_de_creation,
       'description_courte'=>$this->description_courte,
       'description_detaillee'=>$this->description_detaillee,
       'image'=>$image,
       'id_user'=>$id_user,
       'id'=>$id);
       
       $resultat = $db->execute_query($sql,$params);
       }
       }catch(PDOException $e ){
        
       $message=$e->getMessage();
        
       return false;
       }
       
    
       return true;
     }
    public static function getAll(){
      $db =App::getDB();
       $sql = "SELECT article.id, article.titre, article.date_de_creation, description_courte, description_detaillee ,vue  ,image,user.username
       
       FROM article
       LEFT JOIN user
       ON article.id_user = user.id";
       $resultat = $db->execute_query($sql);
       if(!$resultat) {
       $erreur=$conn->errorInfo();
       echo "Lecture impossible, id", $conn->errorid(),$erreur[2];
       }
       else{
       return $resultat->fetchAll(PDO::FETCH_ASSOC);
       }
       }

    public static function delete($id){
      $db =App::getDB();
        try{
        $sql = "DELETE FROM article where id=?";
        $params = array($id);
        $resultat = $db->execute_query($sql,$params);
        }
        catch(PDOException $e ){
        return false;
        }
        return true;
        }  
        
     }
     ?>