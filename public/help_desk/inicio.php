<?php
  session_start();
  if(!(isset($_SESSION['authenticated'])) || $_SESSION['authenticated'] != true) {
    $_SESSION['error'] = 'login_required';
    header('Location: index.php');
  }
?>