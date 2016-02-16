$(document).ready(function(){
  $('#message').keyup(function(e){
    if (($(this).val().length == 0 || $('#username').val().length == 0) && (e.keyCode == 8 || e.keyCode == 13)) {
      $.ajax({
        url: 'scripts/php/typingUpdate.php',
        data: { username: 'null' },
        success: function(data){
          $('#typing').text(data);
          console.log(data);
        }
      });
    }else{
      var username = $('#username').val();
      $.ajax({
        url: 'scripts/php/typingUpdate.php',
        data: { username: username },
        success: function(data){
          $('#typing').text(data);
          console.log(data);
        }
      });
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
  $(setInterval(function(){
    $('#typing').load('scripts/php/typing.php');
  }, 1500));
});
