<?php require_once ("view/inc/header.php"); ?>
<script src="xhr.js" type="text/javascript"></script>
<script type="text/javascript">
 
function addNewComment(idarticle ,id_user) {
     var xhr= getXMLHttpRequest();
     var comment = document.getElementById("commentaire").value;
     document.getElementById("commentaire").value = "";
     console.log(comment+ "ooof");
     xhr.open("GET", "index.php?controller=Article&action=addComment2&idArticle="+idarticle+"&id_user="+id_user+"&newComment="+comment, true);//xhr.open("GET", "hello.php", true);
     xhr.send();
     xhr.onreadystatechange=function() {
if(xhr.readyState == 4 && xhr.status == 200)
{
     console.log(xhr.responseText)
    response= xhr.responseText;
    document.getElementById('resultat').innerHTML = "";
    document.getElementById('resultat').innerHTML=response;
    
}}}
</script>
  <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                        
                        <header class="mb-4">
                            
                            <h1><?php echo $articles->titre?></h1>
                            
                           <h5> <div class="small text-muted"><?php echo $articles->date_de_creation?></div></h5>
                        </header>
                      
                        <figure class="mb-4"><?php echo "<img width='100%' src='view/inc/".$articles->image."'>";?></figure>
                        
                        <section class="mb-5">
                        <p class="card-text"><?php echo $articles->description_detaillee?></p>
                        </section>
                    
              </div>
              <div class="col-lg-4">
                        
                        <header class="mb-4">
                            
                            <h3>Liste De Commentaire</h3>
                            
                            <h5>Add New Commentaire</h5>
                            
                         
                           <div class="col-sm-10">
                                    <input type="text" name="newComment"   id="commentaire" >
                                    
                                    <button   value="add" onClick="addNewComment(<?=$articles->id ?>,<?=$_SESSION['auth']->id ?>)">add</button>
                                </div>

                        </header>
                        
                        
                        <div id="resultat">
                        <section class="mb-5"> 
                        <?php foreach($commentaires as $comment) {  ?>
                            <div class="input-group input-group-sm mb-3">
  
                                <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm"> <?php echo $comment['username']?></span>
                                    </div>
                                    <span  aria-label="Small"  >  <?php echo $comment['commentaire']?></span> 
                                    </div>
                        <?php }?>
                        </section>
                        </div>
              </div>

</div>
</div>
                   
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>