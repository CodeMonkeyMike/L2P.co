<div class="panel">
  <h2>Playstation 3</h2>
<!--   <div class="row">
    <div class="six columns">
      <h4>Most Popular</h4>
    </div>
    <div class="six columns">
      <h4>Recent</h4>
    </div>
  </div> -->

 
</div>
<div class="panel">
  <dl id="game-guide-tabs" class="tabs">
    <dd id="mainTabButton" class="active"><a href="#main">Game List</a></dd>
  </dl>

  <ul id="game-guide-content" class="tabs-content">
    <li class="active" id="mainTab">
      <!-- <p># a b c d e f g h i j k l m n o p q r s t u v w x y z</p> -->
      <ul>
        <?php foreach ($games as $game): ?>
          <li><a href="#" id="<?php echo $game['game_id']; ?>" class="game-select"><?php echo $game['game_name']; ?></a></li>
        <?php endforeach; ?>
      </ul>
    </li>
  </ul>
</div>