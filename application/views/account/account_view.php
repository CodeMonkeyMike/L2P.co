<!--  User information  -->
<div class="four columns">
  <div class="panel">
    <img class="thumbnail" src="<?php echo $guide_author['profile_icon'] ?>"></img>
    <h3><?php echo $guide_author['author_name'] ?></h3>
    <li>Member Since: <?php echo $guide_author['join_date'] ?></li>
    <li>Guides: <?php echo number_format($guide_author['guide_amount']) ?></li>
  </div>
</div>
<!--  Recent guides or blog posts  -->
<div class="eight columns">
  <div class="panel">
    <h2>Account Feed</h2>
    <?php foreach($account_feed as $account_story): ?>
      <div class="thumbnail"><img src="<?php echo $account_story['image']; ?>"></img></div>
      <p><?php echo $account_story['content']; ?></p>
      <hr>
    <?php endforeach; ?>
  </div>
</div>
