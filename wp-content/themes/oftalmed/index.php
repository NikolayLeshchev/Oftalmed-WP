<?php
get_header();

while ( have_posts() ) : the_post(); ?>
    <main class="page">
		<div data-fls-index="" class="index">
            <?php the_content(); ?>
        </div>
    </main>    
<?php endwhile;

get_footer();