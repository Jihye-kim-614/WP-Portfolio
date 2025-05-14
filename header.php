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
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;700&display=swap" rel="stylesheet">

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="robots" content="index, follow">
    <meta name="author" content="Jihye Kim">

    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/svg/favicon.ico" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/svg/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/svg/favicon-16x16.png">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/svg/apple-touch-icon.png">

    <?php if (is_front_page()) : ?>
    <!-- 메인 페이지 -->
    <title>Jihye Kim – Individuelles WordPress Theme für kleine Unternehmen</title>
    <meta name="description" content="Portfolio und individuelles WordPress-Theme für kleine Unternehmen. Benutzerfreundlich, responsiv und komplett ohne kostenpflichtige Plugins.">
    <meta property="og:title" content="Jihye Kim – WordPress-Lösungen für KMUs">
    <meta property="og:description" content="Entdecken Sie ein individuell gestaltetes WordPress-Theme mit Buchungssystem, Newsletter, Q&A und mehr – ideal für kleine Unternehmen.">
    <meta property="og:url" content="http://jihye-wordpress-shop.wuaze.com/">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/about-img-jihye.jpg">
    <meta name="twitter:card" content="summary_large_image">
 
    <?php elseif (is_page('about-jihye-kim')) : ?>
        <!-- About 페이지 -->
        <title>Über Jihye Kim – WordPress-Entwicklerin & Designerin</title>
        <meta name="description" content="Erfahren Sie mehr über Jihye Kim, die Entwicklerin hinter dem benutzerfreundlichen WordPress-Theme für kleine Unternehmen.">
        <meta property="og:title" content="Über Jihye Kim">
        <meta property="og:description" content="Individuelle Weblösungen mit Fokus auf Barrierefreiheit, Design und Usability – lernen Sie die Entwicklerin kennen.">
        <meta property="og:url" content="http://jihye-wordpress-shop.wuaze.com/about-jihye-kim/">
        <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/about-img-jihye.jpg">
    <?php elseif (is_page('team')) : ?>
        <!-- 팀 소개 -->
        <title>Unser Team – Persönlich & Professionell</title>
        <meta name="description" content="Lernen Sie das Team hinter dem WordPress-Projekt kennen – interaktiv gestaltet mit swiper.js für eine moderne Benutzererfahrung.">
        <meta property="og:title" content="Das Team hinter dem WordPress-Theme">
        <meta property="og:description" content="Erfahren Sie mehr über die Menschen hinter dem Projekt – mit Fokus auf Design, Entwicklung und Support.">
        <meta property="og:url" content="http://jihye-wordpress-shop.wuaze.com/team/">
        <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/about-img-jihye.jpg">
    <?php elseif (is_page('newsletter')) : ?>
        <!-- 뉴스레터 -->
        <title>Newsletter abonnieren – Bleiben Sie informiert</title>
        <meta name="description" content="Tragen Sie sich in unseren Newsletter ein, um aktuelle Updates, Tipps und Informationen zu erhalten – entwickelt für kleine Unternehmen.">
        <meta property="og:title" content="Newsletter von Jihye Kim">
        <meta property="og:description" content="Jetzt abonnieren und keine News mehr verpassen – direkt aus dem WordPress-System heraus verwaltet.">
        <meta property="og:url" content="http://jihye-wordpress-shop.wuaze.com/newsletter/">
        <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/about-img-jihye.jpg">
    <?php elseif (is_page('booking')) : ?>
        <!-- 예약 시스템 -->
        <title>Termin buchen – Einfach & Flexibel</title>
        <meta name="description" content="Reservieren Sie Ihren Termin online mit unserem benutzerfreundlichen Buchungssystem mit individuellen Zeitfenstern.">
        <meta property="og:title" content="Online-Terminbuchung">
        <meta property="og:description" content="Buchen Sie direkt online – einfach, schnell und übersichtlich. Keine Registrierung erforderlich.">
        <meta property="og:url" content="http://jihye-wordpress-shop.wuaze.com/booking/">
        <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/about-img-jihye.jpg">
    <?php elseif (is_page('qa-board')) : ?>
        <!-- Q&A 게시판 -->
        <title>Fragen & Antworten – Hilfe für Ihre Anliegen</title>
        <meta name="description" content="Stellen Sie Ihre Fragen oder finden Sie Antworten rund um unser WordPress-Theme. Direkter Kundenkontakt inklusive.">
        <meta property="og:title" content="Q&A Board – Kundenfragen einfach erklärt">
        <meta property="og:description" content="Nutzen Sie das Q&A-Board für häufig gestellte Fragen und persönliche Anliegen – direkt im Frontend verwaltbar.">
        <meta property="og:url" content="http://jihye-wordpress-shop.wuaze.com/qa-board/">
        <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/about-img-jihye.jpg">
    <?php endif; ?>

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
    


    <!-- 페이지 공통 레이아웃 -->
    <main id="main" class="site-main" role="main">