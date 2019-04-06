<?php
   // Page template
?>

<div id="info">
   <h1 id="title"><?php echo get_current_page_title(); ?></h1>
   <div id="description" class="description">r&ouml;tor mandala <?php echo get_current_page_id(); ?> of <?php echo get_last_page_id(); ?></div>
   <div id="fullsize" class="description"><a href="<?php echo get_current_full_version_url(); ?>">see full size</a></div>
</div>

<?php


   // Link to prev page
   if( !is_first_page() ) {
      echo get_prev_page_link();
   }

   // Get content
   echo get_current_page_content();

   // Link to next page
   if( !is_last_page() ) {
      echo get_next_page_link();
   }
?>
