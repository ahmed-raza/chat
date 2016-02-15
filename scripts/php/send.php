<?php
  include_once('../../includes/functions/func.chat.php');
  if (isset($_GET['message']) && !empty($_GET['message'])) {
    $message = $_GET['message'];
    if (send($message)) {
      echo "Sent.";
    }else{
      echo "Error. Failed to open chat file.";
    }
  }else{
    echo "Empty message field.";
  }
?>
