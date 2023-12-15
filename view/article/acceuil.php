<?php require_once ("view/inc/header.php"); ?>

<div id="outer" class="container d-flex align-items-center justify-content-center">
<div id="inner">
<?php if(isset($_SESSION['auth'])){ ?>
<h1>Bienvenue <?php echo($_SESSION['auth']->username);?></h1>

<?php } ?>
</div>
</div>
