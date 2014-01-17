$(document).ready(function () {
  $(".game-select").click(function(event) {
    event.preventDefault();
console.log("test");
    var gameName = $(this).text();
    var game_id = $(this).attr("id");
    var dataString = 'game_id=' + game_id;

    $.ajax({
    type: "POST",
    dataType: 'json',
    url: "/guide/ajax_get_guides",
    data: dataString,
    success: function(data,status) {
      if(!data){
      }else{
        $("#mainTab").removeClass("active");
        $("#mainTabButton").removeClass("active");

        newTab = "<dd class='active game-tab'><a href='#"+ gameName +"'>"+ gameName +" </a></dd>";
        $('#game-guide-tabs').append(newTab);
        console.log(data[0]);
        newContent = "<li class='active game-tab' id='"+ gameName +"Tab'><ul>";
        for (var key in data){
          var obj = data[key];
          newContent += "<li><a href='/guide/"+obj["guide_id"]+"/"+encodeURIComponent(obj["guide_name"])+"' id='"+obj["guide_id"]+"'>"+obj["guide_name"]+"</a><li>";
        }
        newContent += "</ul></li>";
        $('#game-guide-content').append(newContent);
      }
    }
   });
  });
});
$(document).on("click", '#mainTabButton', function (event) {
  event.preventDefault();

  $("#mainTab").addClass("active");
  $("#mainTabButton").addClass("active");
  $(".game-tab").remove();
});
$(document).on("click", '#mainTabButton', function (event) {
  event.preventDefault();

  $("#mainTab").addClass("active");
  $("#mainTabButton").addClass("active");
  $(".game-tab").remove();
});