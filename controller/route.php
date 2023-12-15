<?php

class Routeur{
    public static function routerRequete() {

       
        
    if (isset($_GET["controller"]) && !empty($_GET["controller"])){
    $controller = 'Controller'.$_GET['controller'];
    // On recupère l'action passée dans l'URL
    if (isset($_GET["action"]) && !empty($_GET["action"])){
    $action = $_GET['action'];
    }
    else{
    $action= "getAll";//action par défaut
    }
    }
    else if (isset($_POST["action"]) && isset($_POST["controller"])){
    $action = $_POST['action'];
    $controller = 'Controller'.$_POST['controller'];
    }
    else{
    $controller="ControllerAcceuil";
    $action="acceuil";
    }
    if($controller=='ControllerUser' && $action=='loginForm'){
        require($controller.'.php');
        $controller::$action();
    }
       
    elseif($controller=='ControllerUser' && $action=='authentificate'){
        require($controller.'.php');
        $controller::$action();
    }
    elseif(!isset($_SESSION['auth'])){
        $_SESSION['flash']['danger']= "Vous avez pas le droit d'acces";
          require_once("view/user/loginForm.php");
       //  header("Location:index.php?controller=User&action=loginForm"); 
      } 
        else{
            require($controller.'.php');
            $controller::$action(); 
        }
    // Appel de la méthode statique $action du Controller
    
}
}
    



?>