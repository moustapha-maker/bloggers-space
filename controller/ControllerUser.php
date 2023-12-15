<?php   
require_once ('model/user.php');
 // chargement du modèle
require_once ('ControllerArticle.php');
class ControllerUser{
public static function getAll() {
$articles = ModelUser::getAll();
$controller = "user";
require ('view/user/list.php'); //redirige vers la vue
}

public static function loginForm() {
   
   require_once  ('view/user/loginForm.php'); //redirige vers la vue
   }

   public static function authentificate() {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $resultat =ModelUser::authentificate($username,$password);
      if($resultat) { 
       
         $row =$resultat->fetch(PDO::FETCH_OBJ);
        // print($row[0]);
          if($row!=NULL){
            $_SESSION['auth']=$row;
            
            header('Location:index.php?controller=Article&action=getAll'); 
          }
          else {
            $_SESSION['flash']['danger']= "User not found";
            require_once ('view/user/loginForm.php');
            }
        

         }
         else{
            $_SESSION['flash']['danger']= "Accesse denied";
            require_once ('view/user/loginForm.php');
         }
      }

     
}