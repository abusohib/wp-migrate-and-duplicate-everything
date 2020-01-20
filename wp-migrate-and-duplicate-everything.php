<?php
/*
  Plugin Name: WP Migrate and Duplicate Everything
  Description: This plugins will help you to duplicate or clone your wordpress post and pages . 
  Version: 1.0
  Author: Kauniaweb
  Author URI: https://www.kauniaweb.com
  Contributors: Rashidul islam , Piash , Prokash , Moon 
  Text Domain: esig
  Domain Path:       /languages
  License/Terms and Conditions: https://www.approveme.com/terms-conditions/
  License/Terms of Use: https://www.approveme.com/terms-of-use/
  Privacy Policy: https://www.approveme.com/privacy-policy/
 */

 
  add_filter('page_row_actions', 'wpde_page_link', 10, 2);
  add_filter('post_row_actions', 'wpde_page_link', 10, 2);
  // add_filter('kauniaweb_moon', 'run_moon', 10, 1);
   
   //add_action('moon_test', 'moon_action', 10);
   
   function moon_action(){
       
       echo "testing action";
   }
   
function run_moon($args){
       
      $args[] ="three";
      print_r($args);
      echo get_post_meta(27,'_wp_attached_file',true);
       //exit;
}
  
  add_action('admin_action_wpde_create_draft', 'wpde_create_draft');
  
  function wpde_page_link($actions, $post){
	  
	    $actions['wpde']= '<a href="admin.php?action=wpde_create_my_draft&id='. $post->ID .'">Duplicate this</a>';
		return $actions;
  }
  
  
  function wpde_create_draft(){
	  
	   $id = isset($_GET['id'])?$_GET['id'] : false ; 
	   
	   $post = get_post($id);
	  
	   
	   
	   $args = array(
                     'comment_status' => $post->comment_status,
                     'ping_status' => $post->ping_status,
                     'post_author' => $new_post_author,
                     'post_content' => (isset($opt['duplicate_post_editor']) && $opt['duplicate_post_editor'] == 'gutenberg') ? wp_slash($post->post_content) : $post->post_content,
                     'post_excerpt' => $post->post_excerpt,
                     //'post_name' => $post->post_name,
                     'post_parent' => $post->post_parent,
                     'post_password' => $post->post_password,
                     'post_status' => $post_status,
                     'post_title' => $post->post_title.$suffix,
                     'post_type' => $post->post_type,
                     'to_ping' => $post->to_ping,
                     'menu_order' => $post->menu_order,
                 );
	   $new_post_id = wp_insert_post($args);
	   
	     $args['ID'] = $new_post_id;
		 $args['post_title'] ="rupom" ;
				
		$new_post_id = wp_insert_post($args);
	   
	   $returnpage = '?post_type='.$post->post_type;
	   
	   wp_redirect(admin_url('edit.php'.$returnpage));
	   exit;
  }
  
  
  
  
  
  add_action("admin_menu","my_menu_name");
  
  
  function my_menu_name(){
     
      add_menu_page("My settings Page","My Setting Page",'manage_options',"wpmde","wpmde_options_page");
      
      add_submenu_page("wpmde","My sub page","My sub page", 'manage_options',"wpdme_sub","wpmde_submenu_function");
     
  }

  
  function wpmde_options_page(){
      
   
       include "views/my-settings-view.php";
  }
  
  function wpmde_submenu_function(){
      include "my-sub-page.php";
      
  }