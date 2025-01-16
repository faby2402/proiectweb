<?php
session_start();
session_destroy();
header('Location: index.php');  // Redirecționează la pagina de start
exit();
?>
