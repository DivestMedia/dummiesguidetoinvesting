<?php

get_header();
get_template_part("_template/content", locate_template('_template/content-single-'.get_post_type().'.php')!='' ? 'single-'.get_post_type() : 'single' );
get_footer();
