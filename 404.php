<?php get_header(); ?>
<?php global $kreo_meta, $kreo_options; ?>
    <!-- portfolio
    ================================================== -->
<?php if ( $kreo_options->getOption( 'kreo_project_front_display' ) ) :?>
    <section id="portfolio" class="kreo_partial">
            <div class="row section-head">

                <div class="twelve columns">

                    <h1><?php _e( 'Whoops !', 'kreo'); ?></h1>

                    <hr />

                    <div class="content">
                        <?php _e( 'This is somewhat embarrasing !', 'kreo' ); ?>
                    </div>

                </div>

            </div> <!-- end section-head -->



    </section> <!-- end portfolio -->
<?php endif; ?>

<?php get_footer();