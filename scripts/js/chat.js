$(document).ready(function(){
  $('#chatform').submit(function(){
    var message = $('#message').val();
    $.ajax({
      url: 'scripts/php/send.php',
      data: { message: message },
      success: function(data){
        $('#feedback').text(data);
        $('#message').val("");
      }
    });
    return false;
  });
  $(setInterval(function(){
    $('.chat-wrapper').load('scripts/php/read.php');
  }, 1000));
});
