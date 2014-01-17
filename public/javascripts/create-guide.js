$(document).ready(function () {
  var i = 2;
  initMCE();
  //Adds another guide section
  $('#add_section').click(function (e) {
    e.preventDefault();
    newRow = "<hr />";
    newRow += "<label for='content_title" + i + "'>Section Title</label>";
    newRow += "<input class='tinymce-editor' id='content_title" + i + "' name='content_title" + i + "' type='text' placeholder='Section Title Goes Here' />";
    newRow += "<label>Section Content</label>";
    newRow += "<textarea class='text-area' name='content" + i + "'>This is were the content of your guide goes.</textarea>";
    $("#section_panel").append(newRow);
    initMCE();
    i++;
  });
});

//Outputs a list of games from the api using the users input for the user to select
$(document).on("click", '#get_games', function (event) {
  game_name = $("#game_name").val();
  $("#game_list").empty();
  $.ajax({
    type: 'GET',
    url: 'http://api.giantbomb.com/search/?api_key=75034fa08ba920254d5ab147fdd85614a83b8f5b&resources=game&query=' + encodeURIComponent(game_name) + '&field_list=original_release_date,id,name&format=jsonp&json_callback=?',
    dataType: 'jsonp',
    success: function (data) {
      newRow = "<tbody id='game_results'><tr><th>Date Released</th><th>Game Name</th></tr>";
      $("#game_list").append(newRow);
      for (var key in data.results) {
        var obj = data.results[key];
        newRow = "<tr>";
        newRow += "<td><a id='"+ obj.id +"' class='game_select' >"+ obj.name +"</a></td>";
        if (obj.original_release_date === null) {
          newRow += "<td>Unkown</td>";
        } else {
          newRow += "<td>"+ jQuery.trim(obj.original_release_date).substring(0, 10) +"</td>";
        }
        newRow += "</tr></tbody>";
        $("#game_list").append(newRow);
      }
    }
  });
});

//Selects game from the list of games that came from the api, then finds what systems it is for
$(document).on("click", '.game_select', function (event) {
  event.preventDefault();

  $("#finder_content").hide();
  $("#step_one").append("<h4 id='selected_game' class='success-text'>DONE! "+ $(this).text() +"</h4>"+
                        "<input name='game_id' type='hidden' value='"+ $(this).attr("id") +"'>"+
                        "<input name='game_name' type='hidden' value='"+ $(this).text() +"'>"+
                        "<div id='system_select'></div>");

  $.ajax({
    type: 'GET',
    url: 'http://api.giantbomb.com/game/'+ encodeURIComponent($(this).attr("id")) +'/?field_list=platforms&format=jsonp&api_key=75034fa08ba920254d5ab147fdd85614a83b8f5b&json_callback=?',
    dataType: 'jsonp',
    success: function (data) {
      $("#system_select").append("<h3>Now choose the system that this guide is intended for</h3><ul>");
        for (var key in data.results.platforms) {
          var obj = data.results.platforms[key];
          $("#system_select").append("<li><a id='"+ obj.id +"' class='system_select' >"+ obj.name +"</a></li>");
        }
      $("#system_select").append("</ul>");
    }
  });
});

//Selects a console from the list of consoles for that game
$(document).on("click", '.system_select', function (event) {
  event.preventDefault();

  $("#system_select").hide();
  $("#step_one").append("<h4 id='selected_game' class='success-text'>DONE! "+ $(this).text() +"</h4>"+
                        "<a href='#' class='cancel_input'>(Undo)</a>"+
                        "<input name='system_id' type='hidden' value='"+ $(this).attr("id") +"'>"+
                        "<input name='system_name' type='hidden' value='"+ $(this).text() +"'>");
});

//Will undo the users game select and display the game select input again
$(document).on("click", '.cancel_input', function (event) {
  event.preventDefault();

  $("#step_one").empty();

  newSearch = "<h3>Step 1: Pick A Game to Make A Guide For</h3>"+
    "<div id='finder_content'>"+
      "<label for='game_name'>Enter Game Name</label>"+
      "<input id='game_name' class='text-input' type='text' placeholder='Game Name Goes Here' />"+
      "<a id='get_games' class='button radius'>Find Games!</a>"+
      "<table id='game_list'>"+
      "</table>"+
    "</div>";

  $("#step_one").append(newSearch);
});