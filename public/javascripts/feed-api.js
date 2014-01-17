google.load("feeds", "1");

// Our callback function, for when a feed is loaded.
function feedLoaded(result) {
  if (!result.error) {
    // Grab the container we will put the results into
    var container = document.getElementById("content");
    container.innerHTML = '';

    // Loop through the feeds, putting the titles onto the page.
    // Check out the result object for a list of properties returned in each entry.
    // http://code.google.com/apis/ajaxfeeds/documentation/reference.html#JSON
    for (var i = 0; i < result.feed.entries.length; i++) {
      var entry = result.feed.entries[i];
      var div = document.createElement("div");
      div.appendChild(document.createTextNode(entry.title));
      container.appendChild(div);
    }
  }
}

function OnLoad() {
  // Create a feed control
  var feedControl = new google.feeds.FeedControl();

  // Add two feeds.
  feedControl.addFeed("http://feeds.ign.com/ign/games-all?format=xml", "IGN");
  feedControl.addFeed("http://www.gamesradar.com/rss/blog/", "Games Radar");
  feedControl.addFeed("http://www.gamespot.com/rss/game_updates.php?type=3", "GameSpot");

  // Draw it.
  feedControl.setLinkTarget(google.feeds.LINK_TARGET_BLANK);
  feedControl.draw(document.getElementById("content"));
}

google.setOnLoadCallback(OnLoad);