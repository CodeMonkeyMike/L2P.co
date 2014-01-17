 function initMCE() {
  tinyMCE.init({
    // General options
    mode : "textareas",
    theme : "advanced",
    //plugins : "style,table,advimage,advlink,emotions,iespell,preview,media,contextmenu,paste,directionality,noneditable,advlist",
    plugins : "table,preview",

    // Theme options
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,fontselect,fontsizeselect",
    theme_advanced_buttons2 : "bullist,numlist,|,image,|,preview,|,forecolor,backcolor,|,hr",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : false,

    // Example content CSS (should be your site CSS)
    content_css : "/public/stylesheets/app.css",

    // Drop lists for link/image/media/template dialogs
    template_external_list_url : "lists/template_list.js",
    external_link_list_url : "lists/link_list.js",
    external_image_list_url : "lists/image_list.js",
    media_external_list_url : "lists/media_list.js",
  });
}