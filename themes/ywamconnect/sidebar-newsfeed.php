<?php   
$limit = 400;
wp_enqueue_script(
		'news-feed-post',
		get_stylesheet_directory_uri() . '/js/newsfeed.js',
		array( 'jquery' )
	);
?>

<!-- Delete Feed -->
  <div class="modal fade delete" id="deletefeedmodal" tabindex='-1'>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Delete Feed</h4>
        </div>
        <div class="modal-body">
           Are you sure you want to delete this post </span>? 
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          <button type="button" class="btn btn-primary" id="deletefeedbtn" data-id="">Yes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


<form id="newsfeed_post">
<div class="row"> 
<h4 class="newsfeedh4"> News Feed</h4>

<textarea id="postfeed" name="postfeed" onKeyDown="limitText(this.form.postfeed,this.form.countdown,<?= $limit; ?> );" 
onKeyUp="limitText(this.form.postfeed,this.form.countdown,<?= $limit; ?> );"> </textarea>
<font size="1"> <input readonly type="text" name="countdown" size="3" value="<?= $limit; ?>" tabindex="-1" style="border:0px;margin-top:2px;padding:0px;"> characters left.</font>
	<div class="col-lg-2 well"><a href="#" tabindex="-1"><i class="icon-camera"> </i></a></div>
	<div class="col-lg-2 well"><a href="#" tabindex="-1"><i class="icon-map-marker"></i></a></div>
	<div class="col-lg-7"><a href="#" class="pull-right btn btn-info" id="postfeedyc" > Post</a></div>
</div>
</form>
<hr/>
<?php
// Here lies all the logic behind what should or shouldn't appear on the feed list
//LOAD VARIABLES
$bid = false;
$mid = false;
$cid = false;
$user = wp_get_current_user();
$uid = $user->ID;

// BID
if(isset($_GET['bid'])) { 
  $bid = $_GET['bid'];
} else if(isset($_GET['base'])) { 
  $base = $_GET['base'];
  $bid = $base->ID;
}


// ****  Scenarios
$feed_list  = loadFeeds(5,'',$uid,$bid,$mid,$cid);
 ?>
<ul id="newsfeed_list"> 
<?php foreach($feed_list as $singlefeed): ?>
  <?php include(locate_template('/templates/feed/single-feed.php')); ?> 
<?php endforeach; ?>
</ul>