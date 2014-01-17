<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title><?php echo $template['title']; ?></title>
  
  <!-- Included CSS Files -->
  <link rel="stylesheet" href="/public/stylesheets/foundation.min.css">
  <link rel="stylesheet" href="/public/stylesheets/app.css">
  <link rel="stylesheet" href="/public/stylesheets/responsive-tables.css">
  <script src="/public/javascripts/modernizr.foundation.js"></script>

  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>
<body>

  <?php echo $template['partials']['navbar']; ?>
  
  <?php $flash_message = $this->session->flashdata("flashmessage"); ?>
  <?php if($flash_message): ?>
    <div class="alert-box <?php echo $flash_message['type']; ?>">
      <?php echo $flash_message['message']; ?>
    </div>
  <?php endif; ?>

  <div class="row">
    <div class="eleven columns centered container">
      <div class="row">
        <?php echo $template['body']; ?>
      </div>
    </div>
  </div>

  <?php echo $template['partials']['footer']; ?>

  <!-- Included JS Files -->
  <script src="/public/javascripts/foundation.min.js"></script>
  <!-- Initialize JS Plugins -->
  <script src="/public/javascripts/responsive-tables.js"></script>
  <script src="/public/javascripts/app.js"></script>
  <script src="/public/javascripts/navbar.js"></script>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  
  <!-- JS Files By Page -->
  <?php
    if(isset($js_files)) {
      foreach($js_files as $js_file) {
        echo "<script src='/public/javascripts/" . $js_file . "'></script>";
      }
    }
  ?>
</body>
</html>