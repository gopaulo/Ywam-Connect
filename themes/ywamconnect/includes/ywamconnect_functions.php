<?php
 
 function get_category_for_base($base,$category) {

	$query = "select ter.name, ter.slug, count(p.ID) as total from wp_posts as p
			inner join  wp_postmeta as pm on pm.post_id = p.ID
			inner join  wp_term_relationships as tr on tr.object_id = p.ID
			inner join wp_term_taxonomy as tt on tt.term_taxonomy_id = tr.term_taxonomy_id 
			inner join wp_terms as ter on ter.term_id = tt.term_id
			where pm.meta_key ='base' and pm.meta_value =".$base." 
			and tt.taxonomy = '".$category."' group by ter.term_id";
	return execute($query);
}

 function set_thumb_by_url( $url, $title = null, $postid )
    {
        /* Following assets will already be loaded if in admin */
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/media.php';
        require_once ABSPATH . 'wp-admin/includes/image.php';

        $temp = download_url( $url );

        if ( ! is_wp_error( $temp ) && $info = @ getimagesize( $temp ) ) {
            if ( ! strlen( $title ) )
                $title = null;

            if ( ! $ext = image_type_to_extension( $info[2] ) )
                $ext = '.jpg';

            $data = array(
                'name'     => md5( $url ) . $ext,
                'tmp_name' => $temp,
            );

            $id = media_handle_sideload( $data, $postid, $title );
            if ( ! is_wp_error( $id ) )
                return update_post_meta( $postid, '_thumbnail_id', $id );
        }

        if ( ! is_wp_error( $temp ) )
            @ unlink( $temp );
    }


function loadObject($type,$id){
	if($type == 'video'){
		$pods = pods('video',$id);
			//post_title
		//post_content
		//videolink
		//base
		//basename
		$output = array(
			'ID'=>$id,
			'post_title'=> $pods->display('post_title'),
			'post_content'=>$pods->field('post_content'),
			 'video_link'=>$pods->display('video_link'),
 			 'base'=>$pods->display('base'),
			 'basename'=>$pods->field('base.post_name')
		);
		return $output;

		}
	
	return false;
}


function oEmbedYC($url,$width,$height=false){
	global $wp_embed;
	if(!$height) $height=0.6*$width;
	$return = $wp_embed->run_shortcode('[embed width="'.$width.'" height="'.$height.'"]'.$url.'[/embed]');
	
	$output = array('url'=>$return);
	return $output;
}
// file_get_contents(locate_template("template-file-name.php"));

function get_template_part_withvars($slug = null, $name = null, array $params = array()) {
    global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite, $wpdb, $wp_version, $wp, $id, $comment, $user_ID;

    do_action("get_template_part_{$slug}", $slug, $name);
    $templates = array();
    if (isset($name))
        $templates[] = "{$slug}-{$name}.php";

    $templates[] = "{$slug}.php";

    $_template_file = locate_template($templates, false, false);

    if (is_array($wp_query->query_vars)) {
        extract($wp_query->query_vars, EXTR_SKIP);
    }
    extract($params, EXTR_SKIP);

    require($_template_file);
}

 
 function add_to_user($type, $uid,$bid) {
 	// attending, courses, ministries, bases, friends
 	$user = pods('user',$uid);
 	$user->add_to($type,$bid);
 }

 function remove_from_user($type,$uid,$bid) {
 	$user = pods('user',$uid);
 	$user->remove_from($type,$bid);	
 }

function is_following($type,$uid,$bid) {
   $query = "select count(umeta_id) as total from wp_usermeta as um
		where um.meta_key='".$type."'
		and um.meta_value=".$bid."
		and um.user_id=".$uid;
	$res = execute($query);

	if($res[0]->total >0) return true;
	else return false;
}
 
function is_friend($uid,$friend){
	$query= "select count(um.user_id) as total from wp_usermeta as um
		inner join wp_usermeta as ul on ul.meta_value = um.user_id
		where um.meta_key='friends'
		and um.meta_value=".$uid."
		and ul.meta_key='friends'
		and ul.meta_value=".$friend;
	$res = execute($query);

	if($res[0]->total >0) return true;
	else return false;
}
function get_followers($bid) {
	$query = "select distinct(um.user_id), u.display_name from wp_usermeta as um
		inner join wp_users as u on um.user_id = u.ID
		inner join wp_usermeta as ul on ul.user_id = um.user_id
		where um.meta_key='bases'
		and um.meta_value=".$bid;

  return execute($query); 
}
function get_list_for_base($base,$type,$category=false,$categoryvalue=false) {

	  $query = "select  p.ID, p.post_title, p.post_name, u.ID as uid, u.display_name as author, p.post_date from wp_posts as p
				inner join  wp_postmeta as pm on pm.post_id = p.ID";
				if($category) { 

				$query.=" inner join  wp_term_relationships as tr on tr.object_id = p.ID
				inner join wp_term_taxonomy as tt on tt.term_taxonomy_id = tr.term_taxonomy_id 
				inner join wp_terms as ter on ter.term_id = tt.term_id";
			}
				$query.=" inner join wp_users as u on u.ID = p.post_author					
				where pm.meta_key ='base' and pm.meta_value =".$base."
				and p.post_type='".$type."'";
				if($category) { 
					$query.=" and tt.taxonomy = '".$category."' 
					and tt.term_id = ".$categoryvalue;
				}
 				
	return execute($query);
}

function get_event_categories_for_base($base){
	return get_category_for_base($base,'event_category');
}
function get_video_categories_for_base($base){
	return get_category_for_base($base,'video_category');
}

function execute($query) {
	global $wpdb;
	$output =  $wpdb->get_results($query);
	return $output;
}
?>