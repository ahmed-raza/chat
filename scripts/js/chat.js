$(document).ready(function(){
  $('#message').keyup(function(e){
    if (($(this).val().length == 0) && (e.keyCode == 8 || e.keyCode == 13)) {
      $("#typing").text('');
    }else{
      $("#typing").text($('#username').val() + ' is typing..');
    }
  });
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
          $('.chat-wrapper').animate({ scrollTop: $('.chat-wrapper').height() }, 1000);
        };
      }
    });
    return false;
  });
  $(setInterval(function(){
    $('.chat-wrapper').load('scripts/php/read.php');
  }, 1000));
});
