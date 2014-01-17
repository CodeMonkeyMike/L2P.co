$(function() {

  //Special effects like input highlighting on click
  $('.error').hide();
  $('input.text-input').css({backgroundColor:"#FFFFFF"});
  $('input.text-input').focus(function(){
    $(this).css({backgroundColor:"#FFDDAA"});
  });
  $('input.text-input').blur(function(){
    $(this).css({backgroundColor:"#FFFFFF"});
  });


  //Form validation and AJAX post for signup
  $("#signup_submit").click(function() {
    // validate and process form
    // first hide any error messages
    $('.error').hide();
    
    var signup_username = $("input#signup_username").val();
    if (signup_username === "" || signup_username.lenght < 4 || signup_username.lenght > 30) {
      $("label#username_error").show();
      $("input#signup_username").focus();
      return false;
    }
    var email = $("input#email").val();
    if (email === "" || signup_username.lenght < 6) {
      $("label#email_error").show();
      $("input#email").focus();
      return false;
    }
    var signup_password = $("input#signup_password").val();
    if (signup_password === "" || signup_username.lenght < 8 || signup_username.lenght > 30) {
      $("label#password_error").show();
      $("input#signup_password").focus();
      return false;
    }
    var verify_password = $("input#verify_password").val();
    if (verify_password !== signup_password) {
      $("label#vp_error").show();
      $("input#verify_password").focus();
      return false;
    }
    
    var dataString = 'user_name=' + signup_username + '&email=' + email + '&password=' + signup_password;
    
    $.ajax({
      type: "POST",
      url: "/account/signup",
      data: dataString,
      success: function(data) {
        $('#signup').trigger('reveal:close');
        alert('Check email to confirm registration');
      }
    });
    return false;
  });

  //Form validation and AJAX post for login
  $("#login_submit").click(function() {
    // validate and process form
    // first hide any error messages
    $('.error').hide();
    
    var username = $("input#username").val();
    if (username === "") {
      $("label#username_error").show();
      $("input#username").focus();
      return false;
    }
    var password = $("input#password").val();
    if (password === "") {
      $("label#password_error").show();
      $("input#password").focus();
      return false;
    }
    
    var dataString = 'user_name=' + username + '&password=' + password;
    
    $.ajax({
      type: "POST",
      dataType: 'json',
      url: "/account/login",
      data: dataString,
      success: function(data,status) {
        if(!data){
        }else{
          newRow = "<ul id='user_navbar' class='right'>"+
            "<li class='divider'></li>"+
            "<li class='has-dropdown'>"+
              "<a class='active' href='#'>"+data['user_name']+"</a>"+
              "<ul class='dropdown'>"+
                "<li><label>"+data['user_name']+"</label></li>"+
                "<li><a href='#'>My Guides</a></li>"+
                "<li><a href='#'>Profile</a></li>"+
                "<li><a id='user_logout' href='#'>Log Out</a></li>"+
              "</ul>"+
            "</li>"+
          "</ul>";
          $('#navbar_right').append(newRow);
          $('#login_signup').hide();
          $('#login').trigger('reveal:close');
        }
      }
     });
    return false;
  });
});
$(document).ready(function() {
  $("input#name").select().focus();
});

//Ajax post to logout the user
$(document).on("click", '#user_logout', function (event) {
  event.preventDefault();

  $.ajax({
    type: "GET",
    url: "/account/logout",
    success: function(data,status) {
      newRow = "<ul id='login_signup' class='right'>"+
          "<li><a href='#' data-reveal-id='login'>Login</a></li>"+
          "<li><a href='#' data-reveal-id='signup'>Sign up</a></li>"+
        "</ul>";
      $('#navbar_right').append(newRow);
      $('#user_navbar').hide();
    }
  });
});