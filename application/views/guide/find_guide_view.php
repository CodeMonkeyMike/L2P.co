<div class="eight columns">
  <div class="panel">
    <h2>Search Results For "Starcraft 2"...</h2>
    <h5>Total Results 1,543</h5>
    <dl class="tabs">
      <dd class="active"><a href="#simple1">Games</a></dd>
      <dd><a href="#simple2">Guides</a></dd>
      <dd><a href="#simple3">Blogs</a></dd>
      <dd><a href="#simple4">News</a></dd>
    </dl>
    <ul class="tabs-content">
      <li class="active" id="simple1Tab">
        <?php foreach($guide_list as $guide): ?>
          <div class="thumbnail"><img src="<?php echo $guide['image']; ?>"></img></div>
          <p><?php echo $guide['guide_name']; ?></p>
          <hr>
        <?php endforeach; ?>
      </li>
      <li id="simple2Tab">This is simple tab 2's content. Now you see it!</li>
      <li id="simple3Tab">This is simple tab 3's content. It's, you know...okay.</li>
      <li id="simple4Tab">This is simple tab 3's content. It's, you know...okay.</li>
    </ul>
  </div>
</div>
<div class="four columns">
  <div class="panel">
    <h3>Social Panel</h3>
  </div>
</div>