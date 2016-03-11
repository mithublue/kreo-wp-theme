<?php get_header(); ?>
<?php global $kreo_meta, $kreo_options; ?>

<section id="single" style="">
        <div class="row section-head">
            <?php if( have_posts() ) : ?>
    <?php while( have_posts() ) : ?>
                    <?php the_post(); ?>
                <div class="twelve columns">

                    <h1><?php the_title(); ?></h1>

                    <hr />

                    <div class="content">
                        <?php the_content(); ?>
                    </div>

                </div>
        <?php endwhile; ?>
            <?php endif; ?>

    </div> <!-- end section-head -->
</section> <!-- end portfolio -->
<?php get_footer();