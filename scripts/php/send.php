<?php
  include_once('../../includes/functions/func.chat.php');
  if (isset($_GET['username']) && !empty($_GET['username'])) {
    $username = $_GET['username'];
    if (isset($_GET['message']) && !empty($_GET['message'])) {
      $message = $_GET['message'];
      if (send($username, $message)) {
        echo json_encode(['status'=>'success','message'=>'Message sent.']);
      }else{
        echo json_encode(['status'=>'error','message'=>'Message sending failed.']);
      }
    }else{
      echo json_encode(['status'=>'error','message'=>'Message field is empty.']);
    }
  }else{
    echo json_encode(['status'=>'error','message'=>'Username field is empty.']);
  }
?>
