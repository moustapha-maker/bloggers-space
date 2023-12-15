

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
       
        <title>Blog Home </title>
        <!-- 
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
-->

    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link active" href="index.php?controller=article&action=getAll">Liste Article</Article></a></li>
                        <li class="nav-item"><a class="nav-link active" href="index.php?controller=article&action=Add">Ajouter Article</Article></a></li>
                        <li class="nav-item">

    <?php if(isset($_SESSION['auth'])){?>
<?php echo $_SESSION['auth']->username ?> 
    <?php }  
    else{ ?>
     Login
<?php }?>
</li>
                        <li class="nav-item"><?php if(isset($_SESSION['auth']))
          {?>
            <a class="nav-link" href="index.php?controller=Acceuil&action=logout">deconnecte</a>
          <?php } ?></li>
                    </ul>
                </div>
            </div>
        </nav>
