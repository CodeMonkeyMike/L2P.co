$(function() {

  $('input.text-input').css({backgroundColor:"#FFFFFF"});
  $('input.text-input').focus(function(){
    $(this).css({backgroundColor:"#FFDDAA"});
  });
  $('input.text-input').blur(function(){
    $(this).css({backgroundColor:"#FFFFFF"});
  });

  $('#submit_button').click(function (e){
    e.preventDefault();

  var guide_name = $("input#guide_name").val();
    if (guide_name === "" || guide_name.lenght < 4 || guide_name.lenght > 100) {
      $("input#guide_name").focus();
      return false;
    }

    tinymce.editors['content1'].save();
    console.log((tinymce.editors.length));
    for (var i = 1; i <= (tinymce.editors.length/2); i++) {
      console.log('you got in the for loop '+i);
      // you need to do what is needed here
      // example: write the content back to the form foreach editor instance
      tinymce.editors['content'+ i].save();
    }
    $('#create_form').submit();
  });
});