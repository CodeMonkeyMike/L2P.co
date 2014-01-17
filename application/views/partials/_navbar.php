<?php $user_login = $this->session->userdata('user_data'); ?>
<div class="fixed">
  <nav class="top-bar top">
    <ul>
      <li class="name"><h1><a href="/">L2P.co</a></h1></li>
      <li class="toggle-topbar"><a href="#"></a></li>
    </ul>
    <section id="navbar_right">
      <?php if($user_login): ?>
        <ul id='user_navbar' class='right'>
          <li class='divider'></li>
          <li class='has-dropdown'>
            <a class='active' href='#'><?php echo $user_login['user_name'] ?></a>
            <ul class='dropdown'>
              <li><label><?php echo $user_login['user_name'] ?></label></li>
              <li><a href='#'>My Guides</a></li>
              <li><a href='#'>Profile</a></li>
              <li><a id='user_logout' href='#'>Log Out</a></li>
            </ul>
          </li>
        </ul>
      <?php else: ?>
        <ul id="login_signup" class="right">
          <li><a href="#" data-reveal-id="login">Login</a></li>
          <li><a href="#" data-reveal-id="signup">Sign up</a></li>
        </ul>
      <?php endif; ?>
    </section>
  </nav>
</div>

<ul class="nav-bar bottom hide-for-small">
  <li><p> </p></li>
  <li><a href="/guide/game_by_system/20/Xbox-360">Xbox 360</a></li>
  <li><a href="/guide/game_by_system/35/Playstation-3">Playstation 3</a></li>
  <li><a href="/guide/game_by_system/106/Wii">Wii</a></li>
  <li><a href="/guide/game_by_system/94/PC">PC</a></li>
  <li><a href="/guide/game_by_system/18/Handheld">Handheld</a></li>
  <li><a href="/guide/game_by_system/43/Retro">Retro Console</a></li>
</ul>
<ul class="nav-bar nav-vertical show-for-small">
  <li class="hide-for-small"><p> </p></li>
  <li><a href="#">Xbox 360</a></li>
  <li><a href="#">Playstation 3</a></li>
  <li><a href="#">Wii</a></li>
  <li><a href="#">PC</a></li>
  <li><a href="#">Handheld</a></li>
  <li><a href="#">Retro Console</a></li>
</ul>

<div id="login" class="reveal-modal">
  <?php $this->load->view('/partials/_login'); ?>
</div>
<div id="signup" class="reveal-modal">
  <?php $this->load->view('/partials/_signup'); ?>
</div>