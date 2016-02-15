$(document).ready(function(){
  $('#chatform').submit(function(){
    var username = $('#username').val();
    var message = $('#message').val();
    $.ajax({
      url: 'scripts/php/send.php',
      dataType: "json",
      data: { username: username, message: message },
      success: function(data){
        if (data.status == 'error') {
          $('#feedback').text(data.message);
        };
        if (data.status == 'success') {
          $('#feedback').text(data.message);
          $('#username').attr('disabled', true);
          $('#message').val("");
        };
      }
    });
    return false;
  });
  $(setInterval(function(){
    $('.chat-wrapper').load('scripts/php/read.php');
  }, 1000));
});
