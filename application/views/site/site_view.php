<!-- Most Popular game and its guides -->
<div class="six columns">
  <div id="tabs-navigation" class="panel">
    <dl class="nice vertical tabs">
      <?php foreach($top_list as $top_game): ?>
        <dd><a href="#<?php echo $top_game['game_id'] ?>"><?php echo $top_game['game_name']; ?></a><dd>
      <?php endforeach; ?>
    </dl>
  </div>
</div>
<div class="six columns">
  <?php foreach($top_list as $top_game): ?>
    <div id="<?php echo $top_game['game_id'] ?>" class="panel tab_content">
      <h2>Top five guides</h2>
      <ol>
        <?php foreach($top_game[0] as $top_guide): ?>
          <li><a href="guide/<?php echo $top_guide['guide_id']; ?>/<?php echo url_title($top_guide['guide_name']); ?>"><?php echo $top_guide['guide_name']; ?></a></li>
        <?php endforeach; ?>
      <ol/>
    </div>
  <?php endforeach; ?>
</div>
<!-- News and Blog Left Piece -->
<div class="eight columns">
  <div class="panel">
    <h2>Latest Video Game News</h2>
    <div id="content">Loading...</div>
  </div>
</div>
<!-- Stats and Twitter Feed Right Piece -->
<div class="four columns">
  <div class="panel">
    <h1 class="centering">The #Master Feed</h1>
    <h3 class="centering">@CodeMonkeyMZ</h3>
    <ul>
      <?php foreach($twitter_feed as $tweet): ?>
        <?php echo $tweet; ?>
      <?php endforeach; ?>
    <ul/>
  </div>
</div>