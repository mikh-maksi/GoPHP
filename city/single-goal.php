<?php
the_meta();
// Get a specific piece of information
echo get_post_meta( $post->ID, 'Description', TRUE );

?>