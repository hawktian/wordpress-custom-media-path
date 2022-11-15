<?php
/*
 * Plugin Name: Custom Media Path
 * Plugin URI: https://github.com/Tonvin/wordpress-custom-media-path
 * Description: Change medias directory and name.
 * Author: Tonvin Tian<itonvin@gmail.com>
 * Author URI: https://tonvin.net/
 **/

class Custom_Media_Path {
    public function __construct() {
        add_filter( 'upload_dir', array($this, 'upload_dir'), 1, 1);
        add_filter( 'sanitize_file_name', array($this, 'sanitize_file_name'), 100, 1);
    }

    //append day directory on origin path
    public function upload_dir($config) {
        $day = date('d', time());
        return array(
                'path'   => $config['path'] . '/'.$day,
                'url'    => $config['url'] . '/'.$day,
                'subdir' => $config['subdir']. '/'.$day,
                ) + $config;
    }

    //change file name
    public function sanitize_file_name( $filename ) {
        $info = pathinfo( $filename );
        return substr(md5(time().uniqid()), 5, 10).'.'.$info['extension'];
    }

}
new Custom_Media_Path();

