<?php


/*
 * footer
 */
?>

</main><!-- #main -->


<footer class="footer">
<div class="site-info">
<div class="container">
    <div class="footer__container">
        <div class="inner-padding">
        <div class="footer__grid">

            <div class="footer__address">
                JIHYE KIM<br>
                Beispielstraße 12<br>
                10101 Berlin 
            </div>

            <div class="footer__address">
                CONTACT<br>
                <a class="mailto" href="mailto:huhuhahahoho11@gmail.com">huhuhahahoho11@gmail.com</a><br>
                T +49 (0)12 34 56 87
            </div>
            <div class="footer__menu">
                <ul class="footermenu">
                                            <li class="footermenu__item">
                            <a href="<?php echo esc_url(home_url('/impressum')); ?>" class="footermenu__link">IMPRESSUM</a>
                        </li>
                                            <li class="footermenu__item">
                            <a href="<?php echo esc_url(home_url('/datenschutz')); ?>" class="footermenu__link">DATENSCHUTZ</a>
                        </li>
                                    </ul>
            </div>
            
            <div class="footer__address">
            © 2025 <a href="https://jihye-kim.de/" target="_blank" class="color-1">Jihye Kim</a> All Rights Reserved.
            </div>


        </div>
        </div>
    </div>
    <div class="scroll-top">
        <div class="scroll-top-icon"></div>
    </div>
</div>
</footer>



<?php wp_footer(); ?>
</body>

</html>