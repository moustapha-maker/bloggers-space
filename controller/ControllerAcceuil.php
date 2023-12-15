<?php
require_once ('model/user.php'); // chargement du modèle
class ControllerAcceuil{
public static function loggedOnly(){
//A compléter
}
public static function acceuil() {
self::loggedOnly();
$controller='Acceuil';
require ('view/article/acceuil.php'); //redirige vers la vue
}
public static function loginProcess(){
session_start();
$controller='Acceuil';
//A compléter
require ('view/article/acceuil.php'); //redirige vers la vue
exit();

}
public static function logout(){

unset($_SESSION['auth']);
$_SESSION['flash']['success'] = "Vous etes maintenat deconnecte";
require ('view/user/loginForm.php');
 
}
}
?>