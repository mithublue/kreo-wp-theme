<?php get_header(); ?>
<?php global $kreo_meta, $kreo_options; ?>
    <!-- homepage hero
    ================================================== -->
    <section id="hero" style="position: relative;" class="kreo_partial">
        <div style="position:absolute;  overflow: hidden; height: 100%; width: 100%"><img style="width: 100%" src="<?php echo wp_get_attachment_url( $kreo_options->getOption( 'slider_bg_image'  ) ); ?>" alt=""/></div>
        <?php
        $args = array(
            'posts_per_page' => $kreo_options->getOption( 'num_sliders' ),
            'post_type' => 'kreo_slider'
        );

        $sliders = new WP_Query( $args );
        ?>
        <div class="hero-content">

            <div class="twelve columns hero-container">
                <?php if ( $kreo_options->getOption( 'kreo_slider_front_display' ) ): ?>
                    <!-- hero-slider start-->
                    <div id="hero-slider" class="flexslider">

                        <ul class="slides">

                            <?php
                            // The Loop
                            if ( $sliders->have_posts() ) :
                                while ( $sliders->have_posts() ) : $sliders->the_post();
                                    ?>
                                    <!-- slide -->
                                    <li style="overflow: hidden;">
                                        <div class="flex-caption">
                                            <div style="position: absolute;">
                                                <?php echo '<img src="'. wp_get_attachment_url( $kreo_meta->getOption( 'slider_image', get_the_ID() ) ) .'" alt="" />'; ?>
                                            </div>
                                            <h1 class=""><?php the_title(); ?></h1>

                                            <h3 class=""><?php echo $kreo_meta->getOption( 'slider_secondary_title', get_the_ID() ); ?></h3>
                                            <div class="slider_content"><?php the_content(); ?></div>
                                        </div>
                                    </li>
                                <?php
                                endwhile;
                            else:
                                ?>
                                <li><?php _e( 'No slide to display !', 'kreo' ); ?></li>
                                <?php
                            endif;
                            // Reset Post Data
                            wp_reset_postdata();
                            ?>

                        </ul>

                    </div> <!-- end hero-slider -->
                <?php endif; ?>


            </div> <!-- end twelve columns-->

        </div> <!-- end row -->

        <div id="more">
            <a class="smoothscroll" href="#services">More About Us<i class="fa fa-angle-down"></i></a>
        </div>

    </section> <!-- end homepage hero -->


    <!-- portfolio
    ================================================== -->
<?php if ( $kreo_options->getOption( 'kreo_project_front_display' ) ) :?>
    <section id="portfolio" class="kreo_partial">
        <?php
        $args = array(
            'posts_per_page' => $kreo_options->getOption( 'num_projects' ),
            'post_type' => 'kreo_project'
        );

        $project_display_type = $kreo_options->getOption( 'project_display_type' );
        $display_project_thumbnail = $kreo_options->getOption( 'display_project_thumbnail' );
        if ( $project_display_type == 'selected' ) {
            $args['meta_query'] = array(                  //(array) - Custom field parameters (available with Version 3.1).
                array(
                    'key' => 'kreo-meta_kreo_project_item_front_display',                  //(string) - Custom field key.
                    'value' => 1,
                    //'type' => 'CHAR',
                    'compare' => '=',
                )
            );
        } else {
            $args['order'] = $project_display_type;
        }

        $project_page = $kreo_options->getOption( 'project_page' );
        ?>
        <?php if( !empty( $project_page ) && is_numeric( $project_page )  ): ?>
            <div class="row section-head">

                <div class="twelve columns">

                    <h1><?php echo get_the_title( $project_page )?get_the_title( $project_page ):'Our Latest Projects.'; ?></h1>

                    <hr />

                    <div class="content">
                        <?php echo get_the_content( $project_page ); ?>
                    </div>

                </div>

            </div> <!-- end section-head -->
        <?php endif; ?>

        <div class="row items">

            <!-- portfolio-wrapper -->
            <div id="portfolio-wrapper" class="bgrid-fourth s-bgrid-third tab-bgrid-half">

                <?php
                $projects = new WP_Query( $args );
                // The Loop
                if ( $projects->have_posts() ) :
                    $postnumber = 0;
                    $projects_data = array();
                    while ( $projects->have_posts() ) : $projects->the_post();
                        ?>
                        <div class="bgrid folio-item">
                            <div class="item-wrap">
                                <a href="#modal-<?php echo ++$postnumber; ?>">
                                    <?php $projects_data[$postnumber]['thumbnail'] = get_the_post_thumbnail(); ?>

                                    <?php if ( $display_project_thumbnail ) :?>
                                        <?php echo $projects_data[$postnumber]['thumbnail']; ?>
                                    <?php endif; ?>

                                    <div class="overlay"></div>
                                    <div class="portfolio-item-meta">
                                        <h5><?php echo $projects_data[$postnumber]['title'] = get_the_title(); ?></h5>
                                        <div class="content">
                                            <?php
                                            $projects_data[$postnumber]['excerpt'] = get_the_excerpt();
                                            $projects_data[$postnumber]['content'] = get_the_content();
                                            $projects_data[$postnumber]['project_cat'] = get_the_term_list( get_the_ID(), 'project_category' );
                                            $projects_data[$postnumber]['permalnk'] = get_the_permalink();
                                            ?>
                                            <?php echo $projects_data[$postnumber]['excerpt']; ?>
                                        </div>
                                    </div>
                                    <div class="link-icon"><i class="fa fa-plus"></i></div>
                                </a>
                            </div>
                        </div> <!-- item end -->
                    <?php
                    endwhile;
                else : ?>
                    <div class="text-center"><?php _e( 'No Project Found !', 'kreo' );?></div>
                <?php endif;
                // Reset Post Data
                wp_reset_postdata();
                ?>
            </div> <!-- end portfolio-wrapper -->


            <!-- modal popup
              ========================================================= -->
            <?php
            if ( isset( $projects_data ) && is_array( $projects_data )  ):
                foreach( $projects_data as $number => $project ) {
                    ?>
                    <div id="modal-<?php echo $number; ?>" class="popup-modal mfp-hide">

                        <div class="media">
                            <?php echo $project['thumbnail']; ?>
                        </div>

                        <div class="description-box">
                            <h4><?php echo $project['title']; ?></h4>
                            <div class="content">
                                <?php echo $project['content']; ?>
                            </div>
                            <span class="categories"><?php print_r($project['project_cat']); ?></span>
                        </div>

                        <div class="link-box group">
                            <a href="<?php echo $project['permalnk']; ?>">Details</a>
                            <a href="#" class="popup-modal-dismiss">Close</a>
                        </div>

                    </div><!-- modal-x end -->
                <?php
                }
            endif;
            ?>
        </div>  <!-- end row -->

    </section> <!-- end portfolio -->
<?php endif; ?>

<?php if ( $kreo_options->getOption( 'kreo_service_front_display' ) ) :?>
    <!-- Services Section
    ================================================== -->
    <section id="services" class="kreo_partial">
        <?php
        $service_page = $kreo_options->getOption('service_page');
        if ( isset( $service_page ) && is_numeric( $service_page ) ) :
            $service_post = get_post( $service_page );
            ?>
            <div class="row section-head">
                <div class="twelve columns">
                    <h1><?php echo $service_post->post_title ;?></h1>
                    <hr />
                    <div class="content">
                        <?php echo $service_post->post_content; ?>
                    </div>
                </div>
            </div> <!-- end section-head -->
        <?php endif; ?>

        <?php
        //get the service item
        $args = array(
            'posts_per_page' => $kreo_options->getOption( 'num_services' ),
            'post_type' => 'kreo_service'
        );

        $service_display_type = $kreo_options->getOption( 'service_display_type' );
        $display_service_thumbnail = $kreo_options->getOption( 'display_service_thumbnail' );

        if ( $service_display_type == 'selected' ) {
            $args['meta_query'] = array(
                array(
                    'key' => 'kreo-meta_kreo_service_item_front_display',
                    'value' => 1,
                    //'type' => 'CHAR',
                    'compare' => '=',
                )
            );
        } else {
            $args['order'] = $service_display_type;
        }

        $servicecs = new WP_Query( $args );
        ?>
        <div class="row mobile-no-padding">
            <div class="service-list bgrid-third s-bgrid-half tab-bgrid-whole group">
                <?php
                // The Loop
                if ( $servicecs->have_posts() ) :
                    while ( $servicecs->have_posts() ) : $servicecs->the_post();
                        ?>
                        <div class="bgrid">
                            <h3><?php the_title(); ?></h3>
                            <div class="service-content">
                                <div class="content">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div> <!-- end bgrid -->
                    <?php
                    endwhile;
                else :
                    _e( 'No Service to Display', 'kreo' );
                endif;

                // Reset Post Data
                wp_reset_postdata();
                ?>
            </div> <!-- end service-list -->
        </div> <!-- end row -->
    </section> <!-- end services -->
<?php endif; ?>

    <!-- About Section
    ================================================== -->

<?php if ( $kreo_options->getOption( 'kreo_about_front_display' ) ) : ?>
        <section id="about" class="kreo_partial">
            <?php $about_page = $kreo_options->getOption('about_page');
            if ( isset( $about_page ) && is_numeric( $about_page ) ) :
                $about_post = get_post( $about_page );
                ?>
                <div class="row section-head">

                    <div class="twelve columns">

                        <h1><?php echo $about_post->post_title; ?></h1>
                        <hr />
                        <div class="content">
                            <?php echo $about_post->post_content; ?>
                        </div>
                    </div> <!-- end section-head -->
                </div>
            <?php endif; ?>

            <?php if ( $kreo_options->getOption( 'kreo_member_front_display' ) ) : ?>

                <?php
                $args = array(
                    'posts_per_page' => $kreo_options->getOption( 'num_members' ),
                    'post_type' => 'kreo_member'
                );

                $member_display_type = $kreo_options->getOption( 'member_display_type' );
                $display_member_thumbnail = $kreo_options->getOption( 'display_member_thumbnail' );

                if ( $member_display_type == 'selected' ) {
                    $args['meta_query'] = array(
                        array(
                            'key' => 'kreo-meta_kreo_member_item_front_display',
                            'value' => 1,
                            'compare' => '=',
                        )
                    );
                } else {
                    $args['order'] = $member_display_type;
                }

                $members = new WP_Query( $args );
                ?>
        <?php if ( $members->have_posts() ) : ?>
                <div class="row team section-head">

                    <div class="twelve columns">

                        <h1>Meet Our Team.</h1>

                        <hr />

                    </div>

                </div> <!-- end section-head -->
                <div class="row">

                    <div id="team-wrapper" class="bgrid-fourth s-bgrid-third tab-bgrid-half mob-bgrid-whole group">

                        <?php
                        // The Loop
                            while ( $members->have_posts() ) : $members->the_post();
                                // Do Stuff
                                ?>
                                <div class="bgrid member">
                                    <div class="member-pic">
                                        <?php if ( $kreo_options->getOption( 'display_member_thumbnail' ) ): ?>
                                            <?php the_post_thumbnail(); ?>
                                        <?php endif; ?>
                                        <div class="mask"></div>
                                    </div>
                                    <div class="member-name">
                                        <h3><?php the_title(); ?></h3>
                                        <?php if ( $kreo_options->getOption( 'display_member_designation' ) ): ?>
                                            <span><?php $kreo_meta->getOption( 'member_designation', get_the_ID() ); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="content">
                                        <?php the_content(); ?>
                                    </div>

                                    <?php if ( $kreo_options->getOption( 'display_member_social' ) ): ?>
                                        <ul class="member-social">
                                            <?php if ( $link = $kreo_meta->getOption( 'member_facebook', get_the_ID() ) ) : ?>
                                                <li><a href="<?php echo $link; ?>"><i class="fa fa-facebook"></i></a></li>
                                            <?php endif; ?>
                                            <?php if ( $link = $kreo_meta->getOption( 'member_twitter', get_the_ID() ) ) : ?>
                                                <li><a href="<?php echo $link; ?>"><i class="fa fa-twitter"></i></a></li>
                                            <?php endif; ?>
                                            <?php if ( $link = $kreo_meta->getOption( 'member_gplus', get_the_ID() ) ) : ?>
                                                <li><a href="<?php echo $link; ?>"><i class="fa fa-google-plus"></i></a></li>
                                            <?php endif; ?>
                                            <?php if ( $link = $kreo_meta->getOption( 'member_linkedin', get_the_ID() ) ) : ?>
                                                <li><a href="<?php echo $link; ?>"><i class="fa fa-linkedin"></i></a></li>
                                            <?php endif; ?>
                                            <?php if ( $link = $kreo_meta->getOption( 'member_skype', get_the_ID() ) ) : ?>
                                                <li><a href="<?php echo $link; ?>"><i class="fa fa-skype"></i></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div> <!-- end member -->
                            <?php
                            endwhile;
                        // Reset Post Data
                        wp_reset_postdata();
                        ?>

                    </div> <!-- end team-wrapper -->

                </div> <!-- end row -->
                    <?php else : ?>
                    <div class="row">
                        <div id="team-wrapper" class="bgrid-fourth s-bgrid-third tab-bgrid-half mob-bgrid-whole group">
                            <?php _e( 'No Team Member Found !', 'kreo' ); ?>
                        </div>
                    </div>
            <?php endif; ?>
            <?php endif; ?>

        </section> <!-- end about -->
<?php endif; ?>


<?php if ( $kreo_options->getOption( 'kreo_testi_front_display' ) ) : ?>

    <?php
    $args = array(
        'posts_per_page' => $kreo_options->getOption( 'num_testis' ),
        'post_type' => 'kreo_testimonial'
    );

    $testi_display_type = $kreo_options->getOption( 'testi_display_type' );

    if ( $testi_display_type == 'selected' ) {
        $args['meta_query'] = array(
            array(
                'key' => 'kreo-meta_kreo_testi_item_front_display',
                'value' => 1,
                'compare' => '=',
            )
        );
    } else {
        $args['order'] = $testi_display_type;
    }

    $testimonials = new WP_Query( $args );
    ?>
    <!-- Testimonials Section
    ================================================== -->
    <section id="testimonials" class="kreo_partial">

        <div class="row content flex-container">

            <div id="testimonial-slider" class="flexslider">

                <ul class="slides">
                    <?php

                    // The Loop
                    if ( $testimonials->have_posts() ) :
                        while ( $testimonials->have_posts() ) : $testimonials->the_post();
                            ?>
                            <li>
                                <?php the_content(); ?>
                                <div class="testimonial-author">
                                    <img src="<?php echo wp_get_attachment_url(  $kreo_meta->getOption( 'testi_author_image', get_the_ID() ) )?>" alt=""/>
                                    <div class="author-info">
                                        <?php echo $kreo_meta->getOption('testi_author_name',get_the_ID()); ?>
                                        <span class="position"><?php echo $kreo_meta->getOption( 'testi_author_designation', get_the_ID() ); ?></span>
                                    </div>
                                </div>
                            </li> <!-- end slide -->
                        <?php
                        endwhile;
                    else :
                        ?>
                        <li><?php _e( 'No Testimonial Found !' , 'kreo' );?></li>
                        <?php
                    endif;
                    // Reset Post Data
                    wp_reset_postdata();
                    ?>
                </ul> <!-- end slides -->

            </div> <!-- end flexslider -->

        </div> <!-- end row -->

    </section> <!-- end testimonials section -->
<?php endif; ?>


<?php if ( $kreo_options->getOption( 'kreo_contact_front_display' ) ) : ?>
    <!-- contact
        ================================================== -->
    <section id="contact" class="kreo_partial">

        <div class="row section-head">

            <div class="twelve columns">

                <h1><?php echo $kreo_options->getOption( 'contact_title' ); ?></h1>

                <hr />

            </div>

        </div> <!-- end section-head -->

        <div class="row">

            <div id="contact-form" class="six columns tab-whole left">

                <!-- form -->
                <form name="contactForm" id="contactForm" method="post" action=""  >
                    <fieldset>

                        <div class="group">
                            <input name="contactName" type="text" id="contactName" placeholder="Name" value="" minLength="2" required />
                        </div>
                        <div>
                            <input name="contactEmail" type="email" id="contactEmail" placeholder="Email" value="" required />
                        </div>
                        <div>
                            <input name="contactSubject" type="text" id="contactSubject" placeholder="Subject"  value="" />
                        </div>
                        <div>
                            <textarea name="contactMessage"  id="contactMessage" placeholder="message" rows="10" cols="50" required ></textarea>
                        </div>
                        <div>
                            <button class="submitform">Submit</button>
                            <div id="submit-loader">
                                <div class="text-loader">Sending...</div>
                                <div class="s-loader">
                                    <div class="bounce1"></div>
                                    <div class="bounce2"></div>
                                    <div class="bounce3"></div>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                </form> <!-- Form End -->

                <!-- contact-warning -->
                <div id="message-warning"></div>
                <!-- contact-success -->
                <div id="message-success">
                    <i class="icon-ok"></i>Your message was sent, thank you!<br />
                </div>

            </div>

            <div class="six columns tab-whole right">
                <?php echo $kreo_options->getOption( 'contact_textual_content' ); ?>
            </div>

        </div> <!-- end row -->

    </section>  <!-- end contact -->
<?php endif; ?>

<?php get_footer();