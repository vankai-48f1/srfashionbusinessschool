<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'cp442560_fashion' );

/** Username của database */
define( 'DB_USER', 'cp442560_fashion' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '~}p&kvsAT%Ne' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '=Hj`]g?XOz*8hMqSNTy{Fd76HnSL)TRTH#`kLf`X|=]GMV}N_2=Bi9GoCX-?.#T+' );
define( 'SECURE_AUTH_KEY',  'zr|qx^fg_!;%z[vo9cq(JPzjlfqw0+P)#Wi+~e#V52!(a?Ad5b@hD(vFU[TTl-FC' );
define( 'LOGGED_IN_KEY',    '18wc&G}KCL~-6BjU*UBg~v>YxxNSL `CQen&;NQ8t,J?J~u?Dua#Gtl$tz.zSgVk' );
define( 'NONCE_KEY',        '{_~?xUM54bZTanbr&y+o <sEdVL@mEM3{Es^i>8,M&ph#{]8F^[GwQ@fVH Q^lVq' );
define( 'AUTH_SALT',        'pTfF.KHzw7seyDP`>z)[78}5jA:+<n07/:cM1Ru=v[BV:BkkP>k(iX8ymq@o,DwZ' );
define( 'SECURE_AUTH_SALT', 'kdRP%bI4Ja*w[0BFE=-1b]i[zV@4pP&h+?RuPAS8ijwSA=X)<l=ZAzuXh:w4U5MF' );
define( 'LOGGED_IN_SALT',   'zfr 6whv4+]M2^4FKSXyDvSjDFaxd2l5emJ-=a3K]:e7Z[T:AqZRnCh<W;0kc|O|' );
define( 'NONCE_SALT',       'e2oC)CHV$i+-Nn;_,xv. +P0J`Uxh8hjU*z[=?.kD:jRZ5rX|8AF,oI_ 8M}<f.9' );

/**#@-*/
/* file đính kèm email*/
define( 'WPCF7_UPLOADS_TMP_DIR', 'wp-content/uploads/wpcf7_uploads' );

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix  = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');