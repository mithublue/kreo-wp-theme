<?php global $kreo_options; ?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <!--<title><?php /*wp_title( '|', true, 'right' ); */?></title>-->
    <title><?php is_front_page() ? bloginfo('name') : wp_title('') ; ?> | <?php  bloginfo('description') ; ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- favicons
     ================================================== -->
    <link rel="shortcut icon" href="<?php echo wp_get_attachment_url( $kreo_options->getOption( 'site_favicon' ) )? wp_get_attachment_url( $kreo_options->getOption( 'site_favicon' ) ) : get_template_directory_uri().'/favicon.png';?>" >
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- header
   ================================================== -->
<header id="main-header" class="<?php echo is_user_logged_in()?'menutopfix' : ''; ?>">

    <div class="row">

        <div class="logo"><h1>
            <?php if ( $site_logo = $kreo_options->getOption('site_logo') ) { ?>
                <img src="<?php echo  $site_logo; ?>" alt="Kreo"/>
            <?php }elseif ( $site_logo = $kreo_options->getOption('site_logo_text') ) { ?>
                <a href="<?php echo home_url('/');?>"><?php echo $site_logo; ?></a>
            <?php }else { ?>
                <a href="<?php echo home_url('/');?>"><?php echo get_bloginfo( 'name' ); ?></a>
            <?php }; ?></h1>
        </div>

        <nav id="nav-wrap">

            <a class="mobile-btn" href="#nav-wrap" title="Show navigation">
                <span class="menu-icon">Menu</span>
            </a>
            <a class="mobile-btn" href="#" title="Hide navigation">
                <span class="menu-icon">Menu</span>
            </a>
            <?php wp_nav_menu(
                array(
                    'menu_class' => 'nav main_nav ',
                    'menu_id'    => 'nav',
                    'theme_location' => 'primary'
                )
            ); ?>
        </nav> <!-- end #nav-wrap -->
        <ul class="header-social">
            <?php if ( $url = $kreo_options->getOption( 'facebook_link' ) ) : ?>
                <li><a href="<?php echo $url; ?>"><i class="fa fa-facebook"></i></a></li>
            <?php endif; ?>
            <?php if ( $url = $kreo_options->getOption( 'gplus_link' ) ) : ?>
                <li><a href="<?php echo $url; ?>"><i class="fa fa-google-plus"></i></a></li>
            <?php endif; ?>
            <?php if ( $url = $kreo_options->getOption( 'linkedin_link' ) ) : ?>
                <li><a href="<?php echo $url; ?>"><i class="fa fa-linkedin"></i></a></li>
            <?php endif; ?>
            <?php if ( $url = $kreo_options->getOption( 'twitter_link' ) ) : ?>
                <li><a href="<?php echo $url; ?>"><i class="fa fa-twitter"></i></a></li>
            <?php endif; ?>
            <?php if ( $url = $kreo_options->getOption( 'github_link' ) ) : ?>
                <li><a href="<?php echo $url; ?>"><i class="fa fa-github"></i></a></li>
            <?php endif; ?>
        </ul>
    </div>

</header> <!-- end header -->
