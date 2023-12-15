<?php
require_once('App.php');


class ModelUser{
private $id;
private $username;
private $password;
 
public function __construct($id=null, $username=null,$password=null ){
if (!is_null($id) && !is_null($username) ) {
// Si aucun des paramètre n'est nul, c'est forcement qu'on les a fournis
$this->id = $id;
$this->username = $username;
$this->password = $password;
 
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
    $sql = "SELECT * FROM user  where id=?";
    $params = array($id);
    $resultat = $db->execute_query($sql,$params);
    if(!$resultat) {
    echo "Lecture impossible";
    }
    else{
    return $resultat->fetch(PDO::FETCH_OBJ);
    }
    }
    
    
    public static function authentificate($username , $password){
      $db = App::getDB();
     
      $sql = "SELECT * FROM user  where username=? and password=?";
      $params = array($username , $password);
      $resultat = $db->execute_query($sql,$params);
       return $resultat;
      
      
    }

     public function save($db,$id=null){
     
       try{
       if($id==null){ //insertion d’un nouveau user 
       $sql = "INSERT INTO user ( username, password) VALUES (?,?)";
       $params = array($this->username, $this->password );
       $resultat = $db->execute_query($sql, $params);
       }
       else{//MAJ d’un user  existant
       $sql = "UPDATE user  SET 
       username=:username,
       password=:password,
       WHERE id=:id";
       
       $params = array( 
       'username'=>$this->username,
       'password'=>$this->password, 
       'id'=>$id);
       
       $resultat = $db->execute_query($sql,$params);
       }
       }catch(PDOException $e ){
       if ($e->getid() == 2300){
       $message=$e->getMessage();
       }
       return false;
       }
       return true;
     }
     public static function getAll(){
      $db =App::getDB();
       $sql = "SELECT user.id,  user.username, user.password  
       FROM user " ;
       $resultat = $db->execute_query($sql);
       if(!$resultat) {
       $erreur=$conn->errorInfo();
       echo "Lecture impossible, id", $conn->errorid(),$erreur[2];
       }
       else{
       return $resultat->fetchAll(PDO::FETCH_OBJ);
       }
       }
        
     }
     ?>