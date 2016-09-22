<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RWD.IS
 */

?>
<section id="newsletter">
<h2>Subscribe to our Newsletter:</h2>
<p>Add your email address and receive an email every Friday covering off everything worth knowing about building your websites responsively.</p>
<form action="//responsivedesignweekly.us4.list-manage.com/subscribe/post?u=559bc631fe5294fc66f5f7f89&amp;id=df65b6d7c8" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="">
<input type="hidden" name="LOCATION" value="rwd.is">
<input type="email" name="EMAIL" value="">
<button id="mc-embedded-subscribe" type="submit" name="subscribe" onclick="ga('send', 'event', 'RWD Weekly', 'Subscribe', 'Responsive Design Knowledge Hub');">Sign Up</button>
</form>
</section>
	</div><!-- #content -->


	<footer id="footer" class="site-footer" role="contentinfo">

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
