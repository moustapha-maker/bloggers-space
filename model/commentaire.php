<?php
require_once('App.php');


class ModelCommentaire{
private $id_commentaire;
private $id_user;
private $id_article;
private $commentaire;
 
public function __construct($id_commentaire=null, $id_user=null, $commentaire=null ,$id_article=null ){
if (!is_null($id_article) && !is_null($id_user) && !is_null($commentaire)  ) {
// Si aucun des paramètre n'est nul, c'est forcement qu'on les a fournis
$this->id_commentaire = $id_commentaire;
$this->id_user = $id_user;
$this->commentaire = $commentaire;
$this->id_article = $id_article;
 
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
    $sql = "SELECT * FROM commentaire where id=?";
    $params = array($id);
    $resultat = $db->execute_query($sql,$params);
    if(!$resultat) {
    echo "Lecture impossible";
    }
    else{
    return $resultat->fetch(PDO::FETCH_OBJ);
    }
    }
     
     public function save($id=null){
      $db = App::getDB();
       try{
       if($id==null){ //insertion d’un nouveau commentaire
       $sql = "INSERT INTO commentaire( id_user,id_article, commentaire ) VALUES ( ?,?,?)";
       $params = array($this->id_user,$this->id_article, $this->commentaire );
       $resultat = $db->execute_query($sql, $params);
       }
       else{//MAJ d’un commentaire existant
       $sql = "UPDATE commentaire SET  
       id_user=:id_user,
       commentaire=:commentaire,
       id_article=:id_article
       WHERE id=:id";
       
       $params = array(
       'id'=>$this->id ,
       'id_user'=>$this->id_user,
       'commentaire'=>$this->commentaire,
       'id_article'=>$this->id_article,
       'id'=>$id);
       
       $resultat = $db->execute_query($sql,$params);
       }
       }catch(PDOException $e ){
        
       $message=$e->getMessage();
       var_dump($message);
       
       return false;
       }
       return true;
     }
     public static function getAllOnArticle($id_article=null){
      $db =App::getDB();
       $sql = "SELECT com.id,id_article, u.username ,com.commentaire
       FROM commentaire com
        JOIN user u
       ON u.id=com.id_user WHERE com.id_article =:articleid ";
      
       $params = array('articleid'=>$id_article);
       $resultat = $db->execute_query($sql,$params);
       if(!$resultat) {
       $erreur=$conn->errorInfo();
       echo "Lecture impossible, id", $conn->errorid(),$erreur[2];
       }
       else{
       return $resultat->fetchAll(PDO::FETCH_ASSOC);
       }
       }
        
     }
     ?>