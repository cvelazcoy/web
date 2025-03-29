<?php
 // démarrage d'une session
session_start(); 
// supprimer les variables de session 
session_unset();
// detruire la session
session_destroy();
header("Location: login-form-5.html");
exit;
 ?>
