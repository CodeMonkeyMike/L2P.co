<!-- Game Name and Quick Stats -->
<div class="twelve columns">
  <div class="panel">
    <h1><?php echo $system_name; ?></h1>
  </div>
</div>
<!-- Guide Content -->
<div class="eight columns">
  <div class="panel">
    <h4>GUIDE NAVIGATION LIST</h4>
    <div class="guidenav">
      <?php foreach($guide_content as $guide_section): ?>
        <li><a href="#<?php echo $guide_section['unique_id']; ?>"><?php echo $guide_section['content_title']; ?></a></li>
      <?php endforeach; ?>
    </div>
    <?php foreach($guide_content as $guide_section): ?>
      <a name="<?php echo $guide_section['unique_id']; ?>"><?php echo $guide_section['content_title']; ?></a>
      <p><?php echo $guide_section['content']; ?></p>
    <?php endforeach; ?>
  </div>
</div>
<div class="four columns">
  <!--  Guide Author  -->
  <div class="panel">
    <img class="thumbnail" src="<?php echo $guide_author['profile_icon'] ?>"></img>
    <h3><?php echo $guide_author['user_name']; ?></h3>
    <li>Member Since: <?php echo $guide_author['join_date']; ?></li>
    <!-- <li>Guides: <?php echo number_format($guide_author['guide_amount']); ?></li> -->
  </div>
  <!--  Similar Guides Panel  -->
  <div class="panel">
    <h3>Similar Guides</h3>
    <?php foreach($similar_guides as $similar_guide): ?>
      <img class="thumbnail" src="<?php echo $similar_guide['image'] ?>"></img>
      <p><?php echo $similar_guide['guide_name']; ?></p>
      <hr>
    <?php endforeach; ?>
  </div>
</div>