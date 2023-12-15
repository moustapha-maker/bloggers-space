<?php require_once ("view/inc/header.php"); ?>
 

        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                    <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
                </div>
            </div>
        </header>
        <!-- Page content-->

                       
<center><div class="row justify-content-center">

                    <?php foreach($articles as $article) {  ?>
        <div class="col-md-6 col-lg-4">
            <div class="card-content">
                <div class="card-img">
                <?php echo "<img class='card-img-top' alt='Card image cap' src='view/inc/".$article['image']."'>";?>
                    
                </div>
                <div class="card-desc text-center">
                    <h3><?php echo $article['titre']?></h3>
                    <p class="card-text"><?php echo $article['description_courte']?></p>
                    <div class="small text-muted">Published by : <?php echo $article['username']?>  at <?php echo $article['date_de_creation']?></div>
                    <div class="small text-muted">Views :<?php echo $article['vue']?></div>
                    <a href="index.php?controller=Article&action=getbyId&id=<?=$article['id']?>" class="btn-card">Read</a>
                  
                </div>
            </div>
        </div>
<?php } ?>
</div>
<center>
                    
                   
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>