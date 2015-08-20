<?php
    session_destroy();
    if(!isset($_SESSION['ACusername'])){
      header("Location: /home.html", true);
      $_SESSION['ACusername'] = null;
      die();
    }
?>