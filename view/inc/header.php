<?php 

require_once('view/inc/navbar.php');

?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<?php if(isset($_SESSION['flash'])):?>
<div class="form-outline mb-4">
  <div class="card shadow-2-strong" style="border-raduis: 1rem;">
  <div class="card-body p-5">

<?php foreach($_SESSION['flash'] as $type => $message):?>
<div class="alert alert-<?=$type;?>" >
 <?= $message;?>
</div>
<?php endforeach; ?>
<?php unset($_SESSION['flash']) ?>

</div>
</div>
</div>
<?php endif;?>
 
 