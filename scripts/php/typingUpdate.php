<?php
  include_once('../../includes/functions/func.chat.php');
  if (isset($_GET['username']) && !empty($_GET['username'])) {
    $username = $_GET['username'];
    if (typingUpdate($username)) {
      echo typingStatus();
    }
    else{
      echo "No";
    }
  }else{
    echo "";
  }
?>
