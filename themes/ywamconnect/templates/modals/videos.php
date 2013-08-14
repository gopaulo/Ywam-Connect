<?php $current_user = wp_get_current_user(); ?>


 <!-- View Modal -->
  <div class="modal fade" id="viewvideomodal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <div id="videoframe"></div>
          <input type="hidden" id="videourl"> 
          <p class="profilep" id="base"> Ywam Base: Kona </p>
          <p class="profilep" id="from">  From: http://www.youtube.com/watch?v=hRfiGjcCN3o</p>
          <p class="profilep" id="description">  Description: Aliquam aliquet, est a ullamcorper condimentum, 
          tellus nulla fringilla elit, a iaculis nulla turpis sed wisi.
           Fusce volutpat. Etiam sodales ante id nunc. Proin ornare </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <!-- ADD Modal -->
  <div class="modal fade" id="addvideomodal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Video</h4>
        </div>
        <div class="modal-body">
         <form id="addvideoform">
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                      <label for="headingvideo">Heading:</label>
                      <input type="text" class="form-control" data-original="Add Video" name="headingvideo" id="headingvideo" placeholder="Heading">
                   </div>
           
                    <div class="form-group">
                      <label for="videolink">Video Link:</label>
                      <input type="text" class="form-control" name="videolink" id="videolink" placeholder="">
                   </div>
                    <label >Category</label>
                       <div class="form-group">
                        <select class="form-control" name="category">
                        <?php 
                         $terms = get_terms('video_category');
                         foreach ($terms as $term): 
                        ?>
                          <option value="<?=$term->term_id;?>" data-slug="<?=$term->slug;?>"><?=$term->name;?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                </div>
                <div class="col-lg-4">
                      <span class="help-block" style="margin-top:95px;">Example: http://www.youtube.com/watch?v=WZWv1ckUmwM or http://vimeo.com/30414460</span>
                </div>
                <div class="col-lg-4">
                   <div class="previewevent" style="margin-bottom:10px;">
                     <img src="<?php bloginfo('template_url');?>/images/default_video.jpg" style="width:100%;">
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
                </div>
                <div class="col-lg-4">
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
          <button type="button" class="btn btn-info" id="addvideobtn">Add Video</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->