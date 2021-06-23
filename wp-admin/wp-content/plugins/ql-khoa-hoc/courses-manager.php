<?php

/**
 * Plugin Name: Course  Manager
 * Description: Quản lí khóa học
 * Version: 1.0
 * Author: VanKai 
 * Author URI: http://vankai.com
 * License: GPLv2 or later
 */


// custom post type
require plugin_dir_path(__DIR__)  . '/ql-khoa-hoc/post-type/CPT.php';
// // Portfolio custom post type
require plugin_dir_path(__DIR__) . '/ql-khoa-hoc/post-type/register-portfolio.php';
