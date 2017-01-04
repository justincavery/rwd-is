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
  <div class="subscribe section section--two-col section--secondary section--padded">
      <div class="grid__row">
          <header class="section__header">
              <h2 class="section__title"><span class="soft-br">Subscribe to</span> our Newsletter</h2>
          </header>
          <div class="section__body">
              <p class="lead">Add your email address and receive an email every Friday covering off everything worth knowing about building your websites responsively.</p>
              <form action="//responsivedesignweekly.us4.list-manage.com/subscribe/post?u=559bc631fe5294fc66f5f7f89&amp;id=df65b6d7c8" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="subscription-form" target="_blank" novalidate="">
                  <input name="EMAIL" class="subscription-form__email" type="email" placeholder="Enter your email address" />
                  <input type="hidden" name="LOCATION" value="rwd.is">
                  <button  class="subscription-form__submit btn btn--secondary btn--inverted"  id="mc-embedded-subscribe" type="submit" name="subscribe" onclick="ga('send', 'event', 'RWD Weekly', 'Subscribe', 'Responsive Design Knowledge Hub');">Sign Up</button>
              </form>
          </div>
      </div>
  </div>    <footer class="site-footer">
          <nav class="nav nav--secondary">
              <ul class="nav__items">
                  <li class="nav__item"><a href="/contact" class="nav__link">Get In Touch</a></li>
                  <li class="nav__item"><a href="https://backpocket.co/products/responsive-web-design-notebook-3-pack" class="nav__link">Buy RWD Notebooks</a></li>
                  <li class="nav__item"><a href="https://backpocket.co" class="nav__link">Buy Back Pocket Notebooks <span class="icon icon--exit-arrow"></span></a></li>
              </ul>
          </nav>
          <nav class="nav nav--social">
              <ul class="nav__items">

                  <li class="nav__item"><a href="https://www.twitter.com/reswebdes" class="nav__link"><span class="icon icon--twitter"></span></a></li>
                  <li class="nav__item"><a href="https://plus.google.com/u/0/+ResponsiveDesignWeekly" class="nav__link"><span class="icon icon--GPlus"></span></a></li>
                  <li class="nav__item"><a href="https://www.facebook.com/responsivewebdesigns" class="nav__link"><span class="icon icon--facebook"></span></a></li>
              </ul>
          </nav>
          <p class="site-footer__copyright">&copy; 2012 - 2016. All rights reserved.<br />
              Responsivedesign.is is a side project of <a href="https://justinavery.me">Justin Avery</a> &amp; <a href="https://simplethin.gs">Simple Things</a></p>
      </footer>


<?php wp_footer(); ?>
    <script src="/wp-content/themes/rwd-is/js/main.js" async></script>
    <script>
         /*!
         loadCSS: load a CSS file asynchronously.
         [c]2014 @scottjehl, Filament Group, Inc.
         Licensed MIT
         */
         function loadCSS( href, before, media ){
          "use strict";
          // Arguments explained:
          // `href` is the URL for your CSS file.
          // `before` optionally defines the element we'll use as a reference for injecting our <link>
          // By default, `before` uses the first <script> element in the page.
          // However, since the order in which stylesheets are referenced matters, you might need a more specific location in your document.
          // If so, pass a different reference element to the `before` argument and it'll insert before that instead
          // note: `insertBefore` is used instead of `appendChild`, for safety re: http://www.paulirish.com/2011/surefire-dom-element-insertion/
          var ss = window.document.createElement( "link" );
          var ref = before || window.document.getElementsByTagName( "script" )[ 0 ];
          var sheets = window.document.styleSheets;
          ss.rel = "stylesheet";
          ss.href = href;
          // temporarily, set media to something non-matching to ensure it'll fetch without blocking render
          ss.media = "only x";
          // inject link
          ref.parentNode.insertBefore( ss, ref );
          // This function sets the link's media back to `all` so that the stylesheet applies once it loads
          // It is designed to poll until document.styleSheets includes the new sheet.
          function toggleMedia(){
            var defined;
            for( var i = 0; i < sheets.length; i++ ){
              if( sheets[ i ].href && sheets[ i ].href.indexOf( href ) > -1 ){
                defined = true;
              }
            }
            if( defined ){
              ss.media = media || "all";
            }
            else {
              setTimeout( toggleMedia );
            }
          }
          toggleMedia();
          return ss;
         }

         loadCSS('/wp-content/themes/rwd-is/styles.css?v=0.0.1')

         </script>
    <noscript>
    <link rel="stylesheet" href="/wp-content/themes/rwd-is/styles.css">
    </noscript>
</body>
</html>
