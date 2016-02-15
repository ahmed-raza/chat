<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Chat</title>
  <link rel="stylesheet" href="assets/css/styles.css">
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="scripts/js/chat.js"></script>
</head>
<body>
  <fieldset>
    <div class="chat-wrapper"></div>
    <div id="typing"></div>
    <hr>
    <form method="POST" id="chatform">
    <table>
      <tr>
        <td>Username:</td>
        <td><input type="text" id="username"></td>
      </tr>
      <tr>
        <td>Message:</td>
        <td><input type="text" id="message"></td>
      </tr>
      <tr>
        <td><input type="submit" value="Enter"></td>
      </tr>
    </table>
    </form>
  </fieldset>
  <div id="feedback"></div>
</body>
</html>
