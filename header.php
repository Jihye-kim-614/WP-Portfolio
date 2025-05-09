<?php



/*
 * 컴포넌트 - 헤더
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <link rel="preload" href="https://cdn.jsdelivr.net/gh/fonts-archive/Pretendard/Pretendard-Light.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="https://cdn.jsdelivr.net/gh/fonts-archive/Pretendard/Pretendard-Regular.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="https://cdn.jsdelivr.net/gh/fonts-archive/Pretendard/Pretendard-Medium.woff2" as="font" type="font/woff2" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fonts-archive/Pretendard/Pretendard.css" type="text/css"/>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;700&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header class="site-header" role="header">
        <div class="container">
            <div class="site-logo-wrap">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <h3 class="site-branding">JIHYE KIM</h3>
                </a>
            </div>
            <nav id="site-navigation" class="site-navigation" role="navigation">
                <?php wp_nav_menu(array('theme_location'  => 'primary-menu')); ?>
            </nav>

            <!-- Mobile -->
            <div class="menu-btn">
                <!-- Moblie_nav -->
                <div class="menu-icon"></div>
            </div>
            <div class="menu-container">
                <nav class="more-navigation">
                    <div class="container">
                        <?php wp_nav_menu(array(
                            'theme_location'  => 'primary-menu',
                            'menu_class' => 'gnb',
                            'container' => '',
                        )); ?>
                    </div>
                </nav>
                <div class="overlay"></div>
            </div>

        </div>
    </header>
    
    <div class="breadcrumbs-container">
        <?php if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb('<p id="breadcrumbs">','</p>');
        } ?>
    </div>

    <!-- 페이지 공통 레이아웃 -->
    <main id="main" class="site-main" role="main">