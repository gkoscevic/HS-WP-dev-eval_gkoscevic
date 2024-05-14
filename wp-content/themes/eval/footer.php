</main>
</div>
<footer id="footer" role="contentinfo" class="footer">
  <div class="footer__primary">
    <div id="copyright">
			<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
    </div>
  </div>
  <div class="footer__secondary">
    <nav
      id="menu"
      class="navigation navigation--footer"
      role="navigation"
      itemscope
      itemtype="https://schema.org/SiteNavigationElement">
			<?php wp_nav_menu([
				'theme_location' => 'footer-menu',
				'menu_class' => 'navigation__list',
			]); ?>
    </nav>
  </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
