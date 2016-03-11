<?php

class kreo_meta_opt {

    function __construct() {
        add_action( 'tf_create_options', array( $this, 'create_meta_box' ) );
    }

    function create_meta_box() {
        $kreo_meta = TitanFramework::getInstance( 'kreo-meta' );

        //project meta
        $project_meta = $kreo_meta->createMetaBox( array(
            'name' => 'Advanced Options',
            'post_type' => array( 'kreo_project' )
        ) );

        $project_meta->createOption( array(
            'name' => 'Show in Frontpage',
            'id' => 'kreo_project_item_front_display',
            'type' => 'checkbox',
            'desc' => 'Check to show this project in frontpage',
            'default' => false,
        ) );

        //service meta
        $service_meta = $kreo_meta->createMetaBox( array(
            'name' => 'Advanced Options',
            'post_type' => array( 'kreo_service' )
        ) );
        $service_meta->createOption( array(
            'name' => 'Show in Frontpage',
            'id' => 'kreo_service_item_front_display',
            'type' => 'checkbox',
            'desc' => 'Check to show this service item in frontpage',
            'default' => false,
        ) );

        //member meta
        $member_meta = $kreo_meta->createMetaBox( array(
            'name' => 'Advanced Options',
            'post_type' => array( 'kreo_member' )
        ) );
        $member_meta->createOption( array(
            'name' => 'Show in Frontpage',
            'id' => 'kreo_member_item_front_display',
            'type' => 'checkbox',
            'desc' => 'Check to show this member in frontpage',
            'default' => false,
        ) );
        $member_meta->createOption( array(
            'name' => 'Designation',
            'id' => 'member_designation',
            'type' => 'text',
            'desc' => 'Member Designation'
        ) );
        $member_social = $kreo_meta->createMetaBox( array(
            'name' => 'Social Links',
            'post_type' => array( 'kreo_member' )
        ) );

        $member_social->createOption( array(
            'name' => 'Facebook',
            'id' => 'member_facebook',
            'type' => 'text',
            'desc' => 'Facebook profile'
        ) );
        $member_social->createOption( array(
            'name' => 'Twitter',
            'id' => 'member_twitter',
            'type' => 'text',
            'desc' => 'Twitter profile'
        ) );
        $member_social->createOption( array(
            'name' => 'Google Plus',
            'id' => 'member_gplus',
            'type' => 'text',
            'desc' => 'Google plus profile'
        ) );
        $member_social->createOption( array(
            'name' => 'Linkedin',
            'id' => 'member_linkedin',
            'type' => 'text',
            'desc' => 'Linkedin profile'
        ) );
        $member_social->createOption( array(
            'name' => 'Skype',
            'id' => 'member_skype',
            'type' => 'text',
            'desc' => 'Skype'
        ) );

        //Testimonial meta
        $testi_meta = $kreo_meta->createMetaBox( array(
            'name' => 'Advanced Options',
            'post_type' => array( 'kreo_testimonial' )
        ) );
        $testi_meta->createOption( array(
            'name' => 'Show in Frontpage',
            'id' => 'kreo_testi_item_front_display',
            'type' => 'checkbox',
            'desc' => 'Check to show this testtimonial in frontpage',
            'default' => false,
        ) );
        $testi_meta->createOption( array(
            'name' => 'Author Image',
            'id' => 'testi_author_image',
            'type' => 'upload',
            'desc' => 'Upload author image'
        ) );
        $testi_meta->createOption( array(
            'name' => 'Author',
            'id' => 'testi_author_name',
            'type' => 'text',
            'desc' => 'Author name'
        ) );
        $testi_meta->createOption( array(
            'name' => 'Author Designation',
            'id' => 'testi_author_designation',
            'type' => 'text',
            'desc' => 'Author designation'
        ) );

        //Testimonial meta
        $slider_meta = $kreo_meta->createMetaBox( array(
            'name' => 'Advanced Options',
            'post_type' => array( 'kreo_slider' )
        ) );
        $slider_meta->createOption( array(
            'name' => 'Secondery Title',
            'id' => 'slider_secondary_title',
            'type' => 'text',
            'desc' => 'Add Secondary Title'
        ) );
        $slider_meta->createOption( array(
            'name' => 'Slider Image',
            'id' => 'slider_image',
            'type' => 'upload',
            'desc' => 'Upload Slider Image'
        ) );
    }
}

new kreo_meta_opt();