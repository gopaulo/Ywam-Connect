<?php $current_user = wp_get_current_user(); ?>

<!-- Delete Ministry -->
  <div class="modal fade delete" id="deleteministrymodal" tabindex='-1'>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Delete Ministry</h4>
        </div>
        <div class="modal-body">
           Are you sure you want to delete <span id="ministrynamedelete"> </span>? 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="nodeleteministry">No</button>
          <button type="button" class="btn btn-primary" id="deleteministrybtn">Yes, Delete this Ministry</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <!-- Add Modal -->
  <div class="modal fade" id="addministrymodal" tabindex='-1'>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Ministry</h4>
        </div>
        <div class="modal-body">
          <form id="addministryform">
      <div class="row">
        <div class="col-lg-4">
          <div class="form-group">
              <label for="headingministry">Heading:</label>
              <input type="text" class="form-control" data-original="Add Ministry" name="heading" id="headingministry" placeholder="Heading">
           </div>
           <div class="form-group">
              <label for="email">Email :</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="">
           </div>
            <div class="form-group">
              <label for="website">Website:</label>
              <input type="text" class="form-control" name="website" id="website" placeholder="">
           </div>
           
        </div>
        <div class="col-lg-4">
          <div class="row">
                <label style="display:block" >Starting Date</label>
                  <div class="col-lg-4">
                   <div class="form-group">
                 <select class="form-control" name="start_month">
                 <?php
                  
                     for ($i = 1; $i <= 12; $i++) : 
                     $mon = date("F", mktime(0, 0, 0, $i+1, 0, 0, 0));
                     ?>
                    <option value="<?=$i;?>"><?= $mon;?></option>
                  <?php endfor; ?>
                  </select>
                  </div>
                </div>
                <div class="col-lg-4">
                  <select class="form-control" name="start_day">
                  <?php for ($i = 1; $i <= 31; $i++) : ?>
                    <option value="<?= $i;?>"><?= $i;?></option>
                  <?php endfor; ?>
                  </select>
                </div>
                <div class="col-lg-4">
                  <select class="form-control" name="start_year">
                    <?php
                    $year = date("Y"); 
                    for($i=0;$i<=60;$i++): ?>
                    <option value="<?=$year - $i;?>"><?= $year - $i;?></option>
                  <?php endfor; ?>
                  </select>
                </div>
                </div>
                <div class="form-group">
              <label for="phone">Phone:</label>
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="">
           </div>
           <div class="form-group">
              <label for="facebook">Facebook:</label>
              <input type="text" class="form-control" name="facebook" id="facebook" placeholder="">
           </div>
        </div>
        <div class="col-lg-4">
           <img class="previewevent" src="<?php bloginfo('template_url');?>/images/default_ministry.jpg" style="margin-bottom:10px;">
           <div class="form-group">
              <label for="twitter">Twitter:</label>
              <input type="tel" class="form-control" name="twitter" id="twitter" placeholder="">
           </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <label for="description">Description:</label>
          <textarea class="form-control" rows="4" id="description" name="description" style="margin-bottom:10px;"></textarea>
        </div>
      </div>
      <div class="row">
         <div class="col-lg-4">
          <div class="form-group">
          <label for="description">Image/Banner:</label>
                 <div class="input-group">
                  <input type="text" class="form-control triggerfileministry" name="image"  data-trigger="bannerministry">
                  <input type="file" name="file" style="display:none" id="bannerministry">
                  <span class="input-group-btn">
                    <button class="btn btn-default triggerfileministry" type="button"  data-trigger="bannerministry"><i class="icon-camera"></i></button>
                  </span>
                </div><!-- /input-group -->
           </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
              <label for="videolink">Video Link:</label>
              <input type="text" class="form-control" name="videolink" id="videolink" >
           </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
              <label for="postedby">Posted by:</label>
              <input type="hidden" name="uid" value="<?= $current_user->ID;?>">
               <input type="hidden" name="bid" value="<?= $_GET['bid'];?>">
              <input type="text" class="form-control" name="postedby" id="postedby" value="<?=$current_user->display_name;?>" disabled>
           </div>
        </div>
        </div>
  </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-info" id="addministrybtn">Add Ministry</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

 <!-- View Ministry Modal -->
   <div class="modal fade" id="viewministrymodal" tabindex='-1'>

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
             <a href="#" class="btn btn-danger btn-small"  id="deleteministry" data-id="0"> <i class="icon-trash"> </i> Delete Ministry </a>
        <a href="#" class="btn btn-warning  btn-small" id="editministry" data-id="0"><i class="icon-edit"> </i> Edit Ministry </a>
      
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">@Event Name</h4>
        </div>
          <div class="modal-body">
              <div class="col-lg-8">
                    <div id="imageministry"> </div>
                    <p class="profilep"> <span class="profilelabel"> Started: </span><span id="date">  </span></p>  
                    <p class="profilep"> <span class="profilelabel"> Email: </span> <span id="email">  </span> </p>
                    <p class="profilep"> <span class="profilelabel"> Website: </span> <span id="website">  </span> </p>
                    <p class="profilep"> <span class="profilelabel"> Phone: </span> <span id="phone">  </span> </p>
                    <p class="profilep"> <span class="profilelabel"> Posted By: </span> <span id="postedby">  </span> </p>
                    <p class="profilep" id="description"> </p>
              </div>
              <div class="col-lg-4">
                    <h4> People Following this ministry <small> (<span id="number">100</span>)</small></h4>
                    <ul id="peopleFollowing">

                    </ul>
                    <h4 id="videotitle"> Ministry Video </h4>
                    <div id="ministryVideo">
                    </div>
              </div>
        </div>
        <div class="modal-footer">
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

 <!-- Edit Modal -->
  <div class="modal fade" id="editministrymodal" tabindex='-1'>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit Ministry</h4>
        </div>
        <div class="modal-body">
          <form id="editministryform">
      <div class="row">
        <div class="col-lg-4">
          <div class="form-group">
              <label for="headingministry">Heading:</label>
              <input type="text" class="form-control" data-original="Add Ministry" name="heading" id="headingministry" placeholder="Heading">
           </div>
           <div class="form-group">
              <label for="email">Email :</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="">
           </div>
            <div class="form-group">
              <label for="website">Website:</label>
              <input type="text" class="form-control" name="website" id="website" placeholder="">
           </div>
           
        </div>
        <div class="col-lg-4">
          <div class="row">
                <label style="display:block" >Starting Date</label>
                  <div class="col-lg-4">
                   <div class="form-group">
                 <select class="form-control" name="start_month" id="start_month">
                 <?php
                  
                     for ($i = 1; $i <= 12; $i++) : 
                     $mon = date("F", mktime(0, 0, 0, $i+1, 0, 0, 0));
                     ?>
                    <option value="<?=$i;?>"><?= $mon;?></option>
                  <?php endfor; ?>
                  </select>
                  </div>
                </div>
                <div class="col-lg-4">
                  <select class="form-control" name="start_day" id="start_day">
                  <?php for ($i = 1; $i <= 31; $i++) : ?>
                    <option value="<?= $i;?>"><?= $i;?></option>
                  <?php endfor; ?>
                  </select>
                </div>
                <div class="col-lg-4">
                  <select class="form-control" name="start_year" id="start_year">
                    <?php
                    $year = date("Y"); 
                    for($i=0;$i<=60;$i++): ?>
                    <option value="<?=$year - $i;?>"><?= $year - $i;?></option>
                  <?php endfor; ?>
                  </select>
                </div>
                </div>
                <div class="form-group">
              <label for="phone">Phone:</label>
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="">
           </div>
           <div class="form-group">
              <label for="facebook">Facebook:</label>
              <input type="text" class="form-control" name="facebook" id="facebook" placeholder="">
           </div>
        </div>
        <div class="col-lg-4">
           <img class="previewevent" src="<?php bloginfo('template_url');?>/images/default_ministry.jpg" style="margin-bottom:10px;">
           <div class="form-group">
              <label for="twitter">Twitter:</label>
              <input type="tel" class="form-control" name="twitter" id="twitter" placeholder="">
           </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <label for="description">Description:</label>
          <textarea class="form-control" rows="4" id="description" name="description" style="margin-bottom:10px;"></textarea>
        </div>
      </div>
      <div class="row">
         <div class="col-lg-4">
          <div class="form-group">
          <label for="description">Image/Banner:</label>
                 <div class="input-group">
                  <input type="text" class="form-control triggerfileministry" name="image" id="image"  data-trigger="bannerministry">
                  <input type="file" name="file" style="display:none" id="bannerministry">
                  <span class="input-group-btn">
                    <button class="btn btn-default triggerfileministry" type="button"  data-trigger="bannerministry"><i class="icon-camera"></i></button>
                  </span>
                </div><!-- /input-group -->
           </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
              <label for="videolink">Video Link:</label>
              <input type="text" class="form-control" name="videolink" id="videolink" >
           </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
              <label for="postedby">Posted by:</label>
              <input type="hidden" name="uid" id="uid" value="<?= $current_user->ID;?>">
               <input type="hidden" name="bid" id="bid" value="<?= $_GET['bid'];?>">
               <input type="hidden" name="id" id="id" value="">
              <input type="text" class="form-control" name="postedby" id="postedby" value="<?=$current_user->display_name;?>" disabled>
           </div>
        </div>
        </div>
  </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-info" id="editministrybtn">Save Changes </button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
