</div>
</div>
<!-- End Container -->
</div>
<!-- Footer -->
<footer id="footer">
    <?php if (is_active_sidebar('footer-widget-area')) : ?>
        <div id="primary" class="widget-area">
            <ul class="xoxo">
                <?php dynamic_sidebar('footer-widget-area'); ?>
            </ul>
        </div>
    <?php endif; ?>
</footer>
<!-- End Footer -->
</div>
<!-- Javascript -->
<?php wp_footer(); ?>
<!-- End Javascript -->
</body>

</html>

<!-- Copyright
    <div id="copyright">
        &copy; <?php echo esc_html(date_i18n(__('Y', 'dsq'))); ?> <?php echo esc_html(get_bloginfo('name')); ?>
    </div>
    end Copyright-->