<?php
   // Header
   $first_page_id = 1;
   $last_page_id = 7;

   $site_title = "R&ouml;tor";
   $site_url = "/";
   $index_page_path = ""; // index.php
   $default_page_id = 1;
   $page_id_parameter = "p";
   $page_file_name = "page-%d.php"; //sprintf

   $text_prev_page = "&lt;";
   $text_next_page = "&gt;";

   require_once( "data.php" ); // get data

   // Site
   function get_site_url() {
      global $site_url;
      return $site_url;
   }

   function get_site_title() {
      global $site_title;
      return $site_title;
   }

   // Index page
   function get_index_page_path() {
      global $index_page_path;
      return $index_page_path;
   }

   function get_index_page_url() {
      return get_site_url() . get_index_page_path();
   }

   function get_first_page_id() {
      global $first_page_id;
      return $first_page_id;
   }

   function get_last_page_id() {
      global $last_page_id;
      return $last_page_id;
   }

   // Pages
   function get_page_path( $page_id ) {
      global $page_id_parameter;
      return get_index_page_path()."?".$page_id_parameter."=".$page_id;
   }

   function get_page_file_path( $page_id ) {
      global $page_file_name;
      return sprintf($page_file_name, $page_id );
   }

   function get_page_url( $page_id ) {
      return get_site_url().get_page_path( $page_id );
   }

   function get_page_title( $page_id ) {
      global $data;
      return $data[$page_id]['title'];
   }

   function get_full_version_url( $page_id ) {
     global $data;
     return "graphics/".$data[$page_id]['name'].".svg";
   }

   function get_page_content( $page_id ) {
      global $data;
      return "<img src=\"graphics/".$data[$page_id]['name'].".png\" />";
   }

   function get_default_page_id() {
      global $default_page_id;
      return $default_page_id;
   }

   function get_default_page_path() {
      return get_page_path( get_default_page_id() );
   }

   function get_default_page_file_path() {
      return get_page_file_path( get_default_page_id() );
   }

   function get_default_page_url() {
      return get_page_url( get_default_page_id() );
   }

   function get_current_page_id() {
      global $_GET;
      global $page_id_parameter;
      $page_id = intval( $_GET[ $page_id_parameter ] );
      if( $page_id == 0 ) {
         return get_default_page_id();
      }
      // else
      return $page_id;
   }

   function get_current_page_path() {
      return get_page_path( get_current_page_id() );
   }

   function get_current_page_file_path() {
      return get_page_file_path( get_current_page_id() );
   }

   function get_current_page_url() {
      return get_page_url( get_current_page_id() );
   }

   function get_current_page_title() {
      return get_page_title( get_current_page_id() );
   }

   function get_current_full_version_url() {
     return get_full_version_url( get_current_page_id() );
   }

   function get_current_page_content() {
      return get_page_content( get_current_page_id() );
   }

   // Function get_prev_page
   function get_prev_page_id() {
      $current = get_current_page_id();
      return max( $current - 1, get_first_page_id() );
   }

   function get_prev_page_url() {
      return get_page_url( get_prev_page_id() );
   }

   function get_prev_page_link() {
      global $text_prev_page;
      return "<a class=\"prev-page\" href=\"".get_prev_page_url()."\">".$text_prev_page."</a>";
   }

   function get_next_page_id() {
      $current = get_current_page_id();
      return min( $current + 1, get_last_page_id() );
   }

   function get_next_page_url() {
      return get_page_url( get_next_page_id() );
   }

   function get_next_page_link() {
      global $text_next_page;
      return "<a class=\"next-page\" href=\"".get_next_page_url()."\">".$text_next_page."</a>";
   }

   function is_first_page() {
      return ( get_current_page_id() == get_prev_page_id() );
   }

   function is_last_page() {
      return ( get_current_page_id() == get_next_page_id() );
   }

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fi" xml:lang="fi">
<head>
	<title><?php echo get_site_title(); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="vector mandalas" />
	<meta name="keywords" content="mandala, vector graphic, circle, vortex" />

	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />

	<link rel="apple-touch-icon" href="apple-touch-icon.png" />

	<link rel="shortcut icon" href="favicon.png" type="image/x-icon" />
</head>
<body>

<div id="container">

<div id="header">
</div><!-- #header -->

<div id="content">
