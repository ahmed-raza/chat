<?php
  function send($message){
    if (!empty($message)) {
      $handle = fopen('../../chat_files/chat.txt', 'a');
      if ($handle) {
        fwrite($handle, $message. ";".time() ."\n");
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
    $fileName = '../../chat_files/chat.txt';
    $handle = fopen($fileName, 'r') or die("Unable to open file!");
    if ($handle) {
      $filesize = filesize($fileName);
      if ($filesize != 0) {
        $message = explode("\n", fread($handle, filesize($fileName)));
        foreach ($message as $value) {
          if (!empty($value)) {
            $values = explode(';', $value);
            $time = date('h:i:s a', $values[1]);
            echo gethostname().": ".$values[0]."<span class='time'>".$time."</span><br>";
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

?>
