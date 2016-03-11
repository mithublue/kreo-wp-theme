<?php

class kreo_theme_panel {

    function __construct() {
        add_action( 'tf_create_options', array( $this, 'create_theme_panel' ) );
        add_action( 'tf_save_admin_kreo-theme-option', array( $this, 'save_opt_data' ), 10, 3 );
    }


    /**
     * Create theme panel page
     */
    function create_theme_panel() {

        $kreo_theme_option = TitanFramework::getInstance( 'kreo-theme-option' );


        $kreopanel = $kreo_theme_option->createContainer( array(
            'type' => 'admin-page',
            'name' => 'Kreo',
        ) );

        $general = $kreopanel->createTab( array(
            'name' => 'General',
        ) );
        $general->createOption( array(
            'name' => 'Upload Favicon',
            'id' => 'site_favicon',
            'type' => 'upload',
            'desc' => 'Upload favicon for site',
            'livepreview' => true,
            'size' => array(40,40)
        ) );
        $general->createOption( array(
            'name' => 'Upload Logo',
            'id' => 'site_logo',
            'type' => 'upload',
            'desc' => 'Upload logo for site'
        ) );
        $general->createOption( array(
            'name' => 'Text Logo',
            'id' => 'site_logo_text',
            'type' => 'text',
            'desc' => 'Use this field, if you want to use text logo instead.'
        ) );
        $general->createOption( array(
            'name' => 'Site Moto',
            'id' => 'site_moto',
            'type' => 'text',
            'desc' => 'Your site moto'
        ) );
        $general->createOption( array(
            'type' => 'save',
        ) );

        $social_tab = $kreopanel->createTab( array(
            'name' => 'Social Links',
        ) );

        $social_tab->createOption( array(
            'name' => 'Facebook',
            'id' => 'facebook_link',
            'type' => 'text',
            'desc' => 'Your facebook page url'
        ) );
        $social_tab->createOption( array(
            'name' => 'Google Plus',
            'id' => 'gplus_link',
            'type' => 'text',
            'desc' => 'Your google plus profile url'
        ) );
        $social_tab->createOption( array(
            'name' => 'Linkedin',
            'id' => 'linkedin_link',
            'type' => 'text',
            'desc' => 'Your linkedin profile url'
        ) );
        $social_tab->createOption( array(
            'name' => 'Twitter',
            'id' => 'twitter_link',
            'type' => 'text',
            'desc' => 'Your twitter profile url'
        ) );
        $social_tab->createOption( array(
            'name' => 'Github',
            'id' => 'github_link',
            'type' => 'text',
            'desc' => 'Your facebook profile url'
        ) );
        $social_tab->createOption( array(
            'type' => 'save',
        ) );

        //project tab
        $project_tab = $kreopanel->createTab( array(
            'name' => 'Projects',
        ) );
        $project_tab->createOption( array(
            'name' => 'Show in Frontpage',
            'id' => 'kreo_project_front_display',
            'type' => 'checkbox',
            'desc' => 'Check to show this section in frontpage',
            'default' => true,
        ) );
        $project_tab->createOption( array(
            'name' => 'Project Page',
            'id' => 'project_page',
            'type' => 'select-pages',
            'desc' => 'Select the page that should appear as project page'
        ) );
        $project_tab->createOption( array(
            'name' => 'Number of Project',
            'id' => 'num_projects',
            'type' => 'number',
            'desc' => 'How many projects to display',
            'default' => '10',
            'max' => '100',
        ) );
        $project_tab->createOption( array(
            'name' => 'Display Thumbnail',
            'id' => 'display_project_thumbnail',
            'type' => 'checkbox',
            'desc' => 'Display Thumbnail',
            'default' => true,
        ) );
        $project_tab->createOption( array(
            'name' => 'Display Type',
            'id' => 'project_display_type',
            'type' => 'select',
            'desc' => 'How the project items to be displayed',
            'options' => array(
                'ASC' => 'Ascending',
                'DESC' => 'Descending',
                'selected' => 'Selected projects',
            ),
            'default' => 'DESC',
        ) );
        $project_tab->createOption( array(
            'type' => 'save',
        ) );

        //services
        $service_tab = $kreopanel->createTab( array(
            'name' => 'Services Page',
        ) );
        $service_tab->createOption( array(
            'name' => 'Show in Frontpage',
            'id' => 'kreo_service_front_display',
            'type' => 'checkbox',
            'desc' => 'Check to show this section in frontpage',
            'default' => true,
        ) );
        $service_tab->createOption( array(
            'name' => 'Service Page',
            'id' => 'service_page',
            'type' => 'select-pages'
        ) );
        $service_tab->createOption( array(
            'name' => 'Number of Service',
            'id' => 'num_services',
            'type' => 'number',
            'desc' => 'Number of Services to Show in Frontpage',
            'default' => '6'
        ) );
        $project_tab->createOption( array(
            'name' => 'Display Thumbnail',
            'id' => 'display_service_thumbnail',
            'type' => 'checkbox',
            'desc' => 'Display Thumbnail',
            'default' => true,
        ) );
        $service_tab->createOption( array(
            'name' => 'Display Type',
            'id' => 'service_display_type',
            'type' => 'select',
            'desc' => 'How the Service posts should be displayed',
            'options' => array(
                'ASC' => 'Ascending',
                'DESC' => 'Descending',
                'selected' => 'Selected projects',
            ),
            'default' => 'DESC',
        ) );
        $service_tab->createOption( array(
            'type' => 'save',
        ) );

        //about
        $about_tab = $kreopanel->createTab( array(
            'name' => 'About Page',
        ) );
        $about_tab->createOption( array(
            'name' => 'Show in Frontpage',
            'id' => 'kreo_about_front_display',
            'type' => 'checkbox',
            'desc' => 'Check to show this section in frontpage',
            'default' => true,
        ) );
        $about_tab->createOption( array(
            'name' => 'About Page',
            'id' => 'about_page',
            'type' => 'select-pages'
        ) );
        $about_tab->createOption( array(
            'type' => 'save',
        ) );

        //member tab
        $member_tab = $kreopanel->createTab( array(
            'name' => 'Members',
        ) );
        $member_tab->createOption( array(
            'name' => 'Show in Frontpage',
            'id' => 'kreo_member_front_display',
            'type' => 'checkbox',
            'desc' => 'Check to show this section in frontpage',
            'default' => true,
        ) );
        $member_tab->createOption( array(
            'name' => 'Number of Member',
            'id' => 'num_members',
            'type' => 'number',
            'desc' => 'How many member to display',
            'default' => '4',
        ) );
        $member_tab->createOption( array(
            'name' => 'Display Thumbnail',
            'id' => 'display_member_thumbnail',
            'type' => 'checkbox',
            'desc' => 'Display Thumbnail',
            'default' => true,
        ) );
        $member_tab->createOption( array(
            'name' => 'Display Designation',
            'id' => 'display_member_designation',
            'type' => 'checkbox',
            'desc' => 'Display Member Designation',
            'default' => true,
        ) );
        $member_tab->createOption( array(
            'name' => 'Display Type',
            'id' => 'member_display_type',
            'type' => 'select',
            'desc' => 'How the members should be displayed',
            'options' => array(
                'ASC' => 'Ascending',
                'DESC' => 'Descending',
                'selected' => 'Selected projects',
            ),
            'default' => 'DESC',
        ) );
        $member_tab->createOption( array(
            'type' => 'save',
        ) );

        //testimonial tab
        $testi_tab = $kreopanel->createTab( array(
            'name' => 'Testimonials',
        ) );
        $testi_tab->createOption( array(
            'name' => 'Show in Frontpage',
            'id' => 'kreo_testi_front_display',
            'type' => 'checkbox',
            'desc' => 'Check to show this section in frontpage',
            'default' => true,
        ) );
        $testi_tab->createOption( array(
            'name' => 'Number of Testimonial',
            'id' => 'num_testis',
            'type' => 'number',
            'desc' => 'How many testimonial to display',
            'default' => '4',
        ) );
        $testi_tab->createOption( array(
            'name' => 'Display Type',
            'id' => 'testi_display_type',
            'type' => 'select',
            'desc' => 'How the members should be displayed',
            'options' => array(
                'ASC' => 'Ascending',
                'DESC' => 'Descending',
                'selected' => 'Selected projects',
            ),
            'default' => 'DESC',
        ) );
        $testi_tab->createOption( array(
            'type' => 'save',
        ) );

        //contact tab
        $contact_tab = $kreopanel->createTab( array(
            'name' => 'Contact',
        ) );
        $contact_tab->createOption( array(
            'name' => 'Show in Frontpage',
            'id' => 'kreo_contact_front_display',
            'type' => 'checkbox',
            'desc' => 'Check to show this section in frontpage',
            'default' => true,
        ) );
        $contact_tab->createOption( array(
            'name' => 'Textual Content',
            'id' => 'contact_title',
            'type' => 'text',
            'desc' => 'Title for this section',
            'default' => 'Get In Touch With Us'
        ) );
        $contact_tab->createOption( array(
            'name' => 'Textual Content',
            'id' => 'contact_textual_content',
            'type' => 'textarea',
            'desc' => 'You may provie textual cotent here. E.g : Physical adddress, description etc',
            'default' => '<p class="lead">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.

                <h3 class="address">Come Visit</h3>

                <p>
                    1600 Amphitheatre Parkway<br>
                    Mountain View, CA<br>
                    94043 US
                </p>

                <h3>Contact Numbers:</h3>
                <p>Phone: (000) 555 1212<br>
                    Mobile: (000) 555 0100<br>
                    Fax: (000) 555 0101
                </p>
'
        ) );
        $contact_tab->createOption( array(
            'type' => 'save',
        ) );

        //footer tab
        $footer_tab = $kreopanel->createTab( array(
            'name' => 'Footer',
        ) );
        $footer_tab->createOption(array(
            'name' => 'Footer Text',
            'id' => 'kreo_footer_text',
            'type' => 'textarea',
            'desc' => 'Text to display in footer',
            'default' => '<p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
        Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem
                    nibh id elit.
                </p>'
        ));
        $footer_tab->createOption(array(
            'name' => 'Copyright Text',
            'id' => 'copyright_text',
            'type' => 'textarea',
            'desc' => 'Text to display in footer',
            'default' => '© Copyright 2015 Cybercraft'
        ));
        $footer_tab->createOption( array(
            'type' => 'save',
        ) );

        //slider
        $slider = $kreopanel->createTab( array(
            'name' => 'Slider',
        ) );
        $slider->createOption( array(
            'name' => 'Show in Frontpage',
            'id' => 'kreo_slider_front_display',
            'type' => 'checkbox',
            'desc' => 'Check to show this section in frontpage',
            'default' => true,
        ) );
        $slider->createOption( array(
            'name' => 'Slider Background Image',
            'id' => 'slider_bg_image',
            'type' => 'upload',
            'default' => get_template_directory_uri().'/images/hero-bg.jpg',
            'desc' => 'Upload Slider background image'
        ) );
        $slider->createOption( array(
            'type' => 'save',
        ) );

        //navigation bar
        $navigation = $kreopanel->createTab( array(
            'name' => 'Navigation',
        ) );

        $locations = get_nav_menu_locations();
        $items = isset( $locations['primary'] ) ? wp_get_nav_menu_items( $locations['primary'] ): array();

      /*  foreach( $items as $key => $item ) {
            $navigation->createOption( array(
                'name' => $item->title,
                'id' => str_replace( ' ','-', $item->title ).'-'.$key,
                'type' => 'select',
                'options' => array(
                    'hero' => 'Slideshow',
                    'portfolio' => 'Projects',
                    'services' => 'Services',
                    'about' => 'About',
                    'testimonials' => 'Testimonials',
                    'contact' => 'Contact'
                ),
            ) );
        }*/

        $navigation->createOption( array(
            'type' => 'custom',
            'custom' => $this->custom_test(),
        ) );

        $navigation->createOption( array(
            'type' => 'save',
        ) );


    }


    public function custom_test() {
        ob_start();
        $locations = get_nav_menu_locations();
        $items = isset( $locations['primary'] ) ? wp_get_nav_menu_items( $locations['primary'] ): array();

        $options = array(
            'hero' => 'Slideshow',
            'portfolio' => 'Projects',
            'services' => 'Services',
            'about' => 'About',
            'testimonials' => 'Testimonials',
            'contact' => 'Contact'
        );

        echo '<div>';
        foreach( $items as $key => $item ) {
        ?>
            <div>
                <span style="display: inline-block; width: 20%; margin-bottom: 20px"><?php echo $item->title; ?></span>
                <span style="display: inline-block; margin-bottom: 20px">
                    <select name="kreo-nav-option[<?php echo $item->title; ?>]">
                        <?php foreach( $options as $k => $option ):?>
                            <option value="<?php echo $k; ?>"> <?php echo $option; ?></option>
                        <?php endforeach;?>
                    </select>
                </span>
            </div>
        <?php
        echo '</div>';
        }
        return ob_get_clean();
    }


    /**
     * Saving option data
     */
    function save_opt_data( $container, $activeTab, $options ){
        if ( isset( $_POST['kreo-nav-option'] ) ) {
            set_transient( 'kreo_nav_option', $_POST['kreo-nav-option'] );
        }
    }
}

new kreo_theme_panel();