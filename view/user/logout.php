<?php
 
unset($_SESSION['auth']);
$_SESSION['flash']['success'] = "Vous etes maintenat deconnecte";
require ('view/user/loginForm.php');
header('Location:index.php?controller=User&action=loginForm'); 

?>