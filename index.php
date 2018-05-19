<?php
/*
Plugin Name: Custom Media Upload
Description: Custom Image saved path and name.
Author: Tonvin Tian<itonvin@gmail.com>
Plugin URI: https://www.wordpressmatrix.com/plugin/145/wordpress-custom-media-upload/
Author URI: https://www.tonvin.net/
*/
class Custom_Media_Upload {
    public function __construct() {
        add_filter( 'upload_dir', array($this, 'upload_dir'), 1, 1);
        add_filter( 'sanitize_file_name', array($this, 'sanitize_file_name'), 100, 1);
        add_filter( 'pre_option_upload_url_path', array($this, 'custom_upload_url_path'));
    }
    public function upload_dir($config) {
        $day = date('d', time());
        return array(
                'path'   => $config['path'] . '/'.$day,
                'url'    => $config['url'] . '/'.$day,
                'subdir' => $config['subdir']. '/'.$day,
                ) + $config;
    }

    public function sanitize_file_name( $filename ) {
        $info = pathinfo( $filename );
        return substr(md5(time().uniqid()), 5, 10).'.'.$info['extension'];
    }

    public function custom_upload_url_path( $upload_url_path ) {
        if ( defined('UPLOAD_URL_PATH') ) {
            return UPLOAD_URL_PATH;
        }
        return false;
    }
}
new Custom_Media_Upload();
