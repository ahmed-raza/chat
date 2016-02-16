<?php
  function send($username, $message){
    $fileName = '../../files/chat/chat.txt';
    if (!empty($username) && !empty($message)) {
      $handle = fopen($fileName, 'a');
      if ($handle) {
        fwrite($handle, $username." : ".$message. ";".time() ."\n");
        fclose($handle);
        return true;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }

  function read(){
    $fileName = '../../files/chat/chat.txt';
    $handle = fopen($fileName, 'r') or die("Unable to open file!");
    if ($handle) {
      $filesize = filesize($fileName);
      if ($filesize != 0) {
        $message = explode("\n", fread($handle, filesize($fileName)));
        foreach ($message as $value) {
          if (!empty($value)) {
            $values = explode(';', $value);
            date_default_timezone_set("Asia/Karachi");
            $time = date('h:i:s a', $values[1]);
            echo $values[0]."<span class='time'>".$time."</span><br>";
          }
        }
      }else{
        echo "Please enter a message.";
      }
      fclose($handle);
    }else{
      return false;
    }
  }

  function typingStatus(){
    $fileName = '../../files/status/typing.txt';
    $handle = fopen($fileName, 'r') or die("Unable to open file!");
    if ($handle) {
      $filesize = filesize($fileName);
      if ($filesize != 0) {
        $message = explode("\n", fread($handle, filesize($fileName)));
        foreach ($message as $value) {
          if (!empty($value)) {
            echo $value;
          }
        }
      } else {
        echo "No one is typing yet.";
      }
      fclose($handle);
    } else {
      return false;
    }
  }

  function typingUpdate($username){
    if ($username != 'null') {
      $fileName = '../../files/status/typing.txt';
      $handle = fopen($fileName, 'w') or die("Unable to open file!");
      if ($handle) {
        fwrite($handle, $username." is typing..");
        fclose($handle);
        return true;
      }
    }else{
      $fileName = '../../files/status/typing.txt';
      $handle = fopen($fileName, 'w') or die("Unable to open file!");
      if ($handle) {
        fwrite($handle, "");
        fclose($handle);
        return true;
      }
    }
  }

?>
