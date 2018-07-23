<?php

$basename = basename($_SERVER['PHP_SELF']);
//if (!in_array($basename, array('plugins.php', 'update.php', 'upgrade.php'))) {
//    ob_start();
//    ob_start("ob_gzhandler");
//}
/* ----------------------------------------------------------------------------------- */
# Set default timezone
/* ----------------------------------------------------------------------------------- */
date_default_timezone_set('Asia/Ho_Chi_Minh');
/* ----------------------------------------------------------------------------------- */
# Definition
/* ----------------------------------------------------------------------------------- */
if (!defined('THEME_NAME'))
    define('THEME_NAME', "PPO");
if (!defined('SHORT_NAME'))
    define('SHORT_NAME', "ppo");
if (!defined('THEME_DIR'))
    define('THEME_DIR', trailingslashit(get_template_directory()));
if (!defined('THEME_URI'))
    define('THEME_URI', trailingslashit(get_template_directory_uri()));
if (!defined('MENU_NAME'))
    define('MENU_NAME', SHORT_NAME . "_settings");
if (!defined('THEME_VER'))
    define('THEME_VER', "1.0");
if (!defined('API_URL'))
    define('API_URL', "http://chungcubinhdan.batdongsan.vn/wp-json/api/v1");
/* ----------------------------------------------------------------------------------- */
# Theme Options
/* ----------------------------------------------------------------------------------- */
$pages = get_pages();
$page_list = array();
foreach ($pages as $page) {
    $page_list[$page->ID] = $page->post_title;
}
$categories = get_categories(array('hide_empty' => 0));
$category_list = array();
foreach ($categories as $category) {
    $category_list[$category->term_id] = $category->name;
}

$options = array(
    'general' => array(
        "name" => "General",
        array("id" => "ppo_opt",
            "std" => "general",
            "type" => "hidden"),
        array("name" => "Site Options",
            "type" => "title",
            "desc" => ""),
        array("type" => "open"),
        array("name" => "Keywords meta",
            "desc" => "Enter the meta keywords for all pages. These are used by search engines to index your pages with more relevance.",
            "id" => "keywords_meta",
            "std" => "",
            "type" => "text"),
        array("name" => "Favicon",
            "desc" => "An icon associated with a particular website, and typically displayed in the address bar of a browser viewing the site. Size: 16x16",
            "id" => "favicon",
            "std" => "",
            "type" => "text",
            "btn" => true),
        array("name" => "Logo",
            "desc" => "Size: 234x40",
            "id" => "sitelogo",
            "std" => "",
            "type" => "text",
            "btn" => true),
        array("name" => "Banner Top",
            "desc" => "Size: 1170x100",
            "id" => "logo_banner",
            "std" => "",
            "type" => "text",
            "btn" => true),
        array("type" => "close"),
        
        array("name" => "Information",
            "type" => "title",
            "desc" => ""),
        array("type" => "open"),
        array("name" => "Đơn vị chủ thể",
            "desc" => "Ví dụ: Công ty CP ABC",
            "id" => "unit_owner",
            "std" => "",
            "type" => "text"),
        array("name" => "Địa chỉ",
            "desc" => "Địa chỉ trụ sở công ty/văn phòng/cửa hàng...",
            "id" => "info_address",
            "std" => "",
            "type" => "text"),
        array("name" => "Email",
            "desc" => "",
            "id" => "info_email",
            "std" => "",
            "type" => "text"),
        array("name" => "Điện thoại",
            "desc" => "",
            "id" => "info_tel",
            "std" => "",
            "type" => "text"),
        array("name" => "Hotline",
            "desc" => "Nhập số điện thoại hỗ trợ. Ví dụ: 096.4747.046",
            "id" => SHORT_NAME . "_hotline",
            "std" => '',
            "type" => "text"),
        array("name" => "Website",
            "desc" => "Ví dụ: https://ngothang.com",
            "id" => SHORT_NAME . "_website",
            "std" => '',
            "type" => "text"),
        array("type" => "close"),
        array("type" => "submit"),
    ),
    'theme-options' => array(
        "name" => "Theme Options",
        array("id" => "ppo_opt",
            "std" => "theme-options",
            "type" => "hidden"),
        
         array("name" => "Bất động sản",
            "type" => "title",
            "desc" => "",
        ),
        array("type" => "open"),
        array("name" => "BĐS cần bán",
            "desc" => "Điền ID danh mục",
            "id" => SHORT_NAME . "_cat_sell",
            "std" => '',
            "type" => "text"),
        array("name" => "BĐS cho thuê",
            "desc" => "Điền ID danh mục",
            "id" => SHORT_NAME . "_cat_rent",
            "std" => '',
            "type" => "text"),
        array("name" => "BĐS đầu tư",
            "desc" => "Điền ID danh mục",
            "id" => SHORT_NAME . "_cat_invest",
            "std" => '',
            "type" => "text"),
        array("name" => "Phân trang sản phẩm",
            "desc" => "Số lượng sản phẩm hiển thị trên 1 trang. Ví dụ: 24",
            "id" => SHORT_NAME . "_product_pager",
            "std" => '12',
            "type" => "text"),
        array("name" => "Email nhận tin ký gửi và mua bán nhà đất",
            "desc" => "",
            "id" => "realestate_email",
            "std" => "",
            "type" => "text"),
        array("type" => "close"),
        
        array("name" => "Bình luận",
            "type" => "title",
            "desc" => "",
        ),
        array("type" => "open"),
        array("name" => "Comment type",
            "desc" => "Chọn kiểu bình luận.",
            "id" => SHORT_NAME . "_coment_type",
            "std" => '',
            "type" => "select",
            "options" => array(
                'default' => __('Default', SHORT_NAME),
                'fb' => 'Facebook',
                'disqus' => 'DISQUS',
            )),
        array("name" => "DISQUS Site Shortname",
            "desc" => "Nhập site shortname của bạn trên DISQUS để theo dõi và quản lý bình luận.",
            "id" => SHORT_NAME . "_disqus_shortname",
            "std" => '',
            "type" => "text"),
        array("name" => "Facebook App ID",
            "desc" => "Nhập Facebook App ID để theo dõi và quản lý bình luận.",
            "id" => SHORT_NAME . "_fb_appid",
            "std" => '',
            "type" => "text"),
        array("type" => "close"),
        
        array("name" => "Tùy chọn khác",
            "type" => "title",
            "desc" => "Tìm chỉnh website.",
        ),
        array("type" => "open"),
        array("name" => "Fixed menu",
            "desc" => "Menu chính của bạn sẽ luôn dính ở phía trên trình duyệt.",
            "id" => SHORT_NAME . "_fixedMenu",
            "std" => '',
            "type" => "checkbox"),
        array("name" => "POPUP",
            "desc" => "Kích hoạt tính năng hiển thị POPUP khi vào website.",
            "id" => SHORT_NAME . "_showPopup",
            "std" => '',
            "type" => "checkbox"),
        array("name" => "Banner POPUP",
            "desc" => "Hiển thị khi vào website",
            "id" => "banner_popup",
            "std" => "",
            "type" => "text",
            "btn" => true),
        array("name" => "Banner POPUP Link",
            "desc" => "",
            "id" => "banner_popup_link",
            "std" => "",
            "type" => "text"),
        array("name" => "Follow form",
            "desc" => "Contact Form Shortcode",
            "id" => "follow_form",
            "std" => "",
            "type" => "text"),
        array("name" => "Subiz License ID v3",
            "desc" => "Subiz sẽ ẩn trên Mobile. Ví dụ: 22038",
            "id" => SHORT_NAME . "_subizID",
            "std" => "",
            "type" => "text"),
        array("name" => "Subiz License ID v4",
            "desc" => "Subiz sẽ ẩn trên Mobile. Ví dụ: acpynffovdjwbjdhhoxz",
            "id" => SHORT_NAME . "_subizID_v4",
            "std" => "",
            "type" => "text"),
        array("name" => "Zopim Key",
            "desc" => "Zopim sẽ ẩn trên Mobile. Ví dụ: 45dRAcMR15dTPbRdXeXEtTLQAKxNDjij",
            "id" => SHORT_NAME . "_zopimKey",
            "std" => "",
            "type" => "text"),
        array("name" => "Google Analytics",
            "desc" => "Google Analytics. Ví dụ: UA-40210538-1",
            "id" => SHORT_NAME . "_gaID",
            "std" => "",
            "type" => "text"),
        array("name" => "Google maps",
            "desc" => "Dán đoạn mã của Google maps vào đây. Kích thước 500 x 600",
            "id" => SHORT_NAME . "_gmaps",
            "std" => '',
            "type" => "textarea"),
        array("name" => "Header Code",
            "desc" => "Phần này cho phép đặt các mã code vào đầu trang.",
            "id" => SHORT_NAME . "_headerCode",
            "std" => '',
            "type" => "textarea"),
        array("name" => "Footer Code",
            "desc" => "Phần này cho phép đặt các mã code vào cuối trang.",
            "id" => SHORT_NAME . "_footerCode",
            "std" => '',
            "type" => "textarea"),
        array("type" => "close"),
        array("type" => "submit"),
    ),
    'pages-options' => array(
        "name" => "Pages options",
        array("id" => "ppo_opt",
            "std" => "pages-options",
            "type" => "hidden"),

        array("name" => "Tùy chọn trang",
            "type" => "title",
            "desc" => ""),
        
        array("type" => "open"),
        array("name" => "Đăng nhập",
            "desc" => "",
            "id" => SHORT_NAME . "_pagelogin",
            "std" => '',
            "type" => "select",
            "options" => $page_list),
        array("name" => "Đăng ký",
            "desc" => "",
            "id" => SHORT_NAME . "_pageregister",
            "std" => '',
            "type" => "select",
            "options" => $page_list),
        array("name" => "Quên mật khẩu",
            "desc" => "",
            "id" => SHORT_NAME . "_pagelostpassword",
            "std" => '',
            "type" => "select",
            "options" => $page_list),
        array("name" => "Tài khoản",
            "desc" => "",
            "id" => SHORT_NAME . "_pageprofile",
            "std" => '',
            "type" => "select",
            "options" => $page_list),
        array("name" => "Yêu thích",
            "desc" => "",
            "id" => SHORT_NAME . "_pageFavorites",
            "std" => '',
            "type" => "select",
            "options" => $page_list),
        array("name" => "So sánh",
            "desc" => "",
            "id" => SHORT_NAME . "_pageCompare",
            "std" => '',
            "type" => "select",
            "options" => $page_list),
        array("name" => "Đăng tin bán/cho thuê nhà đất",
            "desc" => "",
            "id" => SHORT_NAME . "_pageposter",
            "std" => '',
            "type" => "select",
            "options" => $page_list),
        array("name" => "Yêu cầu thuê/mua nhà đất",
            "desc" => "",
            "id" => SHORT_NAME . "_pagesale",
            "std" => '',
            "type" => "select",
            "options" => $page_list),
        array("name" => "Ký gửi nhà đất",
            "desc" => "",
            "id" => SHORT_NAME . "_pagesign",
            "std" => '',
            "type" => "select",
            "options" => $page_list),
        array("name" => "Liên hệ",
            "desc" => "",
            "id" => SHORT_NAME . "_pagecontact",
            "std" => '',
            "type" => "select",
            "options" => $page_list),
        array("type" => "close"),
        array("type" => "submit"),
    ),
    'social-options' => array(
        "name" => "Socials",
        array("id" => "ppo_opt",
            "std" => "social-options",
            "type" => "hidden"),
        array("name" => "Theo dõi trên mạng xã hội",
            "type" => "title",
            "desc" => ""),
        array("type" => "open"),
        array("name" => "Dribbble",
            "desc" => "Nhập URL page của bạn trên dribbble.",
            "id" => SHORT_NAME . "_dribbbleURL",
            "std" => "",
            "type" => "text"),
        array("name" => "Facebook",
            "desc" => "Nhập URL page của bạn trên facebook.",
            "id" => SHORT_NAME . "_fbURL",
            "std" => "",
            "type" => "text"),
        array("name" => "Flickr",
            "desc" => "Nhập URL page của bạn trên flickr.",
            "id" => SHORT_NAME . "_flickrURL",
            "std" => "",
            "type" => "text"),
        array("name" => "Foursquare",
            "desc" => "Nhập URL page của bạn trên foursquare.",
            "id" => SHORT_NAME . "_foursquareURL",
            "std" => "",
            "type" => "text"),
        array("name" => "Github",
            "desc" => "Nhập URL page của bạn trên github.",
            "id" => SHORT_NAME . "_githubURL",
            "std" => "",
            "type" => "text"),
        array("name" => "Google plus",
            "desc" => "Nhập URL page của bạn trên Google plus.",
            "id" => SHORT_NAME . "_googlePlusURL",
            "std" => "",
            "type" => "text"),
        array("name" => "Instagram",
            "desc" => "Nhập URL page của bạn trên Instagram.",
            "id" => SHORT_NAME . "_instagramURL",
            "std" => "",
            "type" => "text"),
        array("name" => "Linked In",
            "desc" => "Nhập URL page của bạn trên Linked In.",
            "id" => SHORT_NAME . "_linkedInURL",
            "std" => "",
            "type" => "text"),
        array("name" => "Pinterest",
            "desc" => "Nhập URL page của bạn trên Pinterest.",
            "id" => SHORT_NAME . "_pinterestURL",
            "std" => "",
            "type" => "text"),
        array("name" => "Skype",
            "desc" => "Nhập tên đăng nhập skype.",
            "id" => SHORT_NAME . "_skype",
            "std" => "",
            "type" => "text"),
        array("name" => "Twitter",
            "desc" => "Nhập URL page của bạn trên Twitter.",
            "id" => SHORT_NAME . "_twitterURL",
            "std" => "",
            "type" => "text"),
        array("name" => "Youtube",
            "desc" => "Nhập URL page của bạn trên Youtube.",
            "id" => SHORT_NAME . "_youtubeURL",
            "std" => "",
            "type" => "text"),
        array("type" => "close"),
        array("type" => "submit"),
    ),
);