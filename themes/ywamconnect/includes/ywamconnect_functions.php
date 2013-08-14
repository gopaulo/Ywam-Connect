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


function get_followers($bid) {
	 $base = pods('base',$bid);
	 return $base->field('followers');
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