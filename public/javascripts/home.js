$(document).ready(function() {

  //Default Action

  $(".tab_content").hide(); //Hide all content
  $("dl.tabs dd:first").addClass("active").show(); //Activate first tab
  $(".tab_content:first").show(); //Show first tab content

  //On Click Event
  $("dl.tabs dd").click(function(event) {
    event.preventDefault();
    $("dl.tabs dd").removeClass("active"); //Remove any "active" class
    $(this).addClass("active"); //Add "active" class to selected tab
    $(".tab_content").hide(); //Hide all tab content
    var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
    $(activeTab).fadeIn(); //Fade in the active content
    return false;
  });
});