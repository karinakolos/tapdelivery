<footer class="footer">
    <div class="contaniner">
        <div class="row">
            <div class="col-xs-12">
                <?php if (!is_page('contact-us')) {
                    ?>
                    <img src="/wp-content/uploads/2022/02/logo.png" alt="Insult Online" />
                    <?php
                }
                ?>
                <div class="footer__nav">
                    <a href="#" class="footer__nav-item">О проекте</a>
                    <a href="#" class="footer__nav-item">Об инсульте</a>
                    <a href="#" class="footer__nav-item">Контакты</a>
                </div>
                <p class="footer__copyright text-small">2022 Copyright <a href="/">Insult.online</a> All rights
                    reserved.</p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer() ?>

<!--<script async src="<?php //echo esc_url( get_template_directory_uri() ); ?>/assets/js/sticky-menu.min.js"></script>-->
<script async src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/toggle-nav.js"></script>
<script async src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/typed-text.min.js"></script>
<script defer src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/utils/slick/slick.min.js"></script>
<script defer src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/utils/splide/splide.min.js"></script>
<script defer src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/custom.js"></script>
<!--<script defer src="<?php //echo esc_url( get_template_directory_uri() ); ?>/assets/js/reachgoal.min.js"></script>-->
</body>

</html>