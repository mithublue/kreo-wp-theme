<!-- Footer
================================================== -->
<?php global $kreo_options; ?>
<footer>

    <div class="row">

        <div class="twelve columns content group">

            <ul class="social-links">
                <?php if ( $url = $kreo_options->getOption( 'facebook_link' ) ) : ?>
                    <li><a href="<?php echo $url; ?>"><i class="fa fa-facebook-square"></i></a></li>
                <?php endif; ?>
                <?php if ( $url = $kreo_options->getOption( 'gplus_link' ) ) : ?>
                    <li><a href="<?php echo $url; ?>"><i class="fa fa-google-plus-square"></i></a></li>
                <?php endif; ?>
                <?php if ( $url = $kreo_options->getOption( 'linkedin_link' ) ) : ?>
                    <li><a href="<?php echo $url; ?>"><i class="fa fa-linkedin-square"></i></a></li>
                <?php endif; ?>
                <?php if ( $url = $kreo_options->getOption( 'twitter_link' ) ) : ?>
                    <li><a href="<?php echo $url; ?>"><i class="fa fa-twitter-square"></i></a></li>
                <?php endif; ?>
                <?php if ( $url = $kreo_options->getOption( 'github_link' ) ) : ?>
                    <li><a href="<?php echo $url; ?>"><i class="fa fa-github-square"></i></a></li>
                <?php endif; ?>
            </ul>

            <hr />

            <div class="info">
                <?php echo $kreo_options->getOption('kreo_footer_text');?>
            </div>
        </div>
        <ul class="copyright">
            <li><?php echo $kreo_options->getOption('copyright_text'); ?></li>
            <li>Design by <a href="http://www.styleshout.com/">Styleshout.</a>.</li>
        </ul>
        <?php if ( is_front_page() ) : ?>
        <div id="go-top">
            <a class="smoothscroll" title="Back to Top" href="#hero">Back to Top<i class="fa fa-angle-up"></i></a>
        </div>
        <?php endif; ?>

    </div> <!-- end row -->

</footer> <!-- end footer -->

<div id="preloader">
    <div id="loader"></div>
</div>

<!-- Java Script
================================================== -->
<script src="<?php echo get_template_directory_uri();?>/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jquery.flexslider-min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jquery.waypoints.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jquery.validate.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jquery.fittext.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jquery.placeholder.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/main.js"></script>
<?php wp_footer(); ?>
</body>

</html>