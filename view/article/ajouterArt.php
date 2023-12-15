<?php require_once ("view/inc/header.php"); ?>
<div class="card mx-auto" style="max-width: 30rem;">
  <div class="card-header bg-success text-white">
    Ajout Article
  </div>
  <div class="card-body">
    <form action="index.php?controller=Article&action=addProcess" method="POST"  >

      <div class="form-group">
        <label for="">Titre:</label>
        <input type="text" class="form-control" name="titre" >
      </div>
      
      <div class="form-group">
        <label for="">Date:</label>
        <input type="date" class="form-control" name="date_de_creation" >
      </div>
      <div class="form-group">
        <label for="">Description Courte:</label>
        <input type="text" class="form-control" name="description_courte" >
      </div>
      <div class="form-group">
        <label for="">Description detaillée:</label>
        <textarea class="form-control" name="description_detaillee" ></textarea>
      </div>
      <!-- Ajout champ d'upload ! -->
      <div class="form-group">
        <label for="" class="form-label">Image</label>
        <input type="file"  name="image" >
      </div>
      <!-- Fin ajout du champ -->
      <input type="submit" class="btn btn-primary" value="Enregistrer ">
    </form>       
  </div>
</div>



<?php