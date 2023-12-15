<?php
require_once ('model/commentaire.php'); // chargement du modèle
class ControllerCommentaire{
public static function getAll($id=null) {
$commentaires = ModelCommentaire::getAllOnArticle($id);
$controller = "commentaire";
require ('view/commentaire/list.php'); //redirige vers la vue
}

public static function Add() {
   
   require ('view/commenatire/form.php'); //redirige vers la vue
   }

}