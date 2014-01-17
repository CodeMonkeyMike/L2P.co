<h1>Create Guide</h1>
<form id="create_form" action="/guide/create_guide" method="POST"><!--  Form Start  -->
<!--  Auto Game finder  -->
<div class="nine columns">
  <div id="step_one" class="panel">
    <h3>Step 1: Pick A Game to Make A Guide For</h3>
    <div id="finder_content">
      <label for="game_name">Enter Game Name</label>
      <input id="game_name" class="text-input" type="text" placeholder="Game Name Goes Here" />
      <a id="get_games" class="button radius">Find Games!</a>
      <table id="game_list">
        <!--  create_guide.js creates table rows and inserts them here when Find Games button is pushed -->
      </table>
    </div>
  </div>
</div>
<div class="three columns">
  <div class="panel">
    <h4>Tips</h4>
    <li>Have an introduction to your guide</li>
    <li>Talk about strategy</li>
    <li>Mention counter strategy</li>
  </div>
</div>
<!--  Create Guide Content  -->
<div class="nine columns pull-three">
  <div class="panel">
    <h3>Step 2: Create Your Guide Content</h3>
    <label for="guide_name">Guide Name</label>
    <input id="guide_name" class="text-input" name="guide_name" type="text" placeholder="Guide Name Goes Here" />
    <hr />
    <!--  Section Creation  -->
    <div id="section_panel">
      <label for="content_title1">Section Title</label>
      <input class="tinymce-editor" id="content_title1" name="content_title1" type="text" placeholder="Section Title Goes Here" />
      <label>Section Content</label>
      <textarea class="text-area" name="content1">This is were the content of your guide goes.</textarea>
    </div>
    <a id="add_section" class="small button radius">Add Section</a>
  </div>
  <h3>Step 3: Hit the Green Button!</h3>
  <button id="submit_button" class="success button radius">Create Guide</button><!--  Submit  -->
</div>
</form><!--  End of Form  -->
