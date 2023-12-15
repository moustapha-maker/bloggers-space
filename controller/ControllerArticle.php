<?php  
require_once ('model/article.php');
require_once ('model/commentaire.php');  // chargement du modèle
class ControllerArticle{
public static function getAll() {
$articles = ModelArticle::getAll();
$controller = "Article";
require_once ('view/article/list.php'); //redirige vers la vue
}

public static function Add() {
   
   require ('view/article/ajouterArt.php'); //redirige vers la vue
   }

public static function addProcess() {
     $titre = $_POST['titre'];   
     $date_de_creation = $_POST['date_de_creation']; 
     $description_courte = $_POST['description_courte']; 
     $description_detaillee = $_POST['description_detaillee']; 
     $image = $_POST['image']; 
     $id_user = $_SESSION['auth']->id; 
     $article= new ModelArticle($titre, $date_de_creation, $description_courte, $description_detaillee,$image ,$id_user);

      $result=$article->save();
      if($result){
         ControllerArticle::getAll();
      }else{
         ControllerArticle::Add();
      }
      
      }

public static function update() {
   $titre = $_POST['titre'];   
   $date_de_creation   = $_POST['date_de_creation']; 
   $description_courte = $_POST['description_courte']; 
   $description_detaillee = $_POST['description_detaillee']; 
   $image   = $_POST['image']; 
   $id_user = $_POST['id_user']; 
   $id = $_POST['id']; 
   $article= new ModelArticle($titre, $date_de_creation, $description_courte, $description_detaillee,$image);

   $article->save($id);

    require ('view/article/list.php'); //redirige vers la vue

}

public static function delete()  {
   $id= $_POST['id'];
   $status = ModelArticle::delete(id);
   if (!$status){
      $message='Articlenotfound';
      require ('view/article/list.php');//redirige vers la vue
      }
      else{
      ControllerArticle::getAll();
      }
  
}

public static function Getmore() {
   
   require ('view/article/Articledet.php'); //redirige vers la vue
   }


public static function getbyId($id=null)  {
   if($id==null)
     $id= $_GET['id'];
   
   $result = ModelArticle::AddView($id);
   $articles = ModelArticle::getbyid($id);
   $commentaires = ModelCommentaire::getAllOnArticle($id);
   $controller = "Article";
   require ('view/article/Articledet.php'); //redirige vers la vue
        
      }
 
      public static function  addComment(){
         $idArticle= $_POST['idArticle'];
         $value= $_POST['newComment'];
         $id_user = $_POST['id_user']; 
        
         $commentaire= new ModelCommentaire(null,$id_user,$value,$idArticle );
         $result =$commentaire->save();
         
            ControllerArticle::getbyid($idArticle);
          
         
       
      }

       
      public static function  addComment2(){
         $idArticle= $_GET['idArticle'];
         $value= $_GET['newComment'];
         $id_user = $_GET['id_user']; 
        
         $commentaire= new ModelCommentaire(null,$id_user,$value,$idArticle );
         $result =$commentaire->save();
         $commentaires = ModelCommentaire::getAllOnArticle($idArticle);
          //  ControllerArticle::getbyid($idArticle);
          
        ?>      <section class="mb-5"> 
                        <?php foreach($commentaires as $comment) {  ?>
                           <div class="input-group input-group-sm mb-3">
  
                           <div class="input-group-prepend">
                                 <span class="input-group-text" id="inputGroup-sizing-sm"> <?php echo $comment['username']?></span>
                              </div>
                              <span  aria-label="Small"  >  <?php echo $comment['commentaire']?></span>
                              </div>
                         
                       
                        <?php
       
      }}
}