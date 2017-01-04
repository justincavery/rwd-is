<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RWD.IS
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   <?php
   if ( is_page(2) ) {
      get_template_part( 'template-parts/critical-css-home');
   } else {
      get_template_part( 'template-parts/critical-css-site');
   }
  ?>
<meta name="theme-color" content="#CC4E46">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Accept-CH" content="DPR, Viewport-Width, Width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<script>
  (function(d) {
    var config = {
      kitId: 'hxh2qas',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>
<meta property="fb:pages" content="174099962709206" />
<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="/wp-content/themes/rwd-is/vendor.css">
<style>


   .subscription-form__email[type=email] {
     background-color: #59ABA9;
     border: 1px solid #59ABA9;
     color: #FFFFFF;
     float: left;
     margin-right: 13px;
     width: 230px;
     /**
      * Media query adjustments.
      *
      * We restrict the width of the email input at breakpoint 3.
      */
   }
   .subscription-form__email[type=email]::-webkit-input-placeholder {
     color: #C5ECEB;
   }
   .subscription-form__email[type=email]::-moz-placeholder {
     color: #C5ECEB;
   }
   .subscription-form__email[type=email]:-ms-input-placeholder {
     color: #C5ECEB;
   }
   .subscription-form__email[type=email]::placeholder {
     color: #C5ECEB;
   }
   @media only screen and (min-width: 60em) {
     .subscription-form__email[type=email] {
       max-width: 500px;
       width: 100%;
     }
   }
   @font-face {
     font-family: 'icomoon';
     src: url("/wp-content/themes/rwd-is/fonts/icomoon.eot?tsx43x");
     src: url("/wp-content/themes/rwd-is/fonts/icomoon.eot?tsx43x#iefix") format("embedded-opentype"), url("/wp-content/themes/rwd-is/fonts/icomoon.woff2?tsx43x") format("woff2"), url("/wp-content/themes/rwd-is/icomoon.ttf?tsx43x") format("truetype"), url("/wp-content/themes/rwd-is/fonts/icomoon.woff?tsx43x") format("woff"), url("/wp-content/themes/rwd-is/fonts/icomoon.svg?tsx43x#icomoon") format("svg");
     font-weight: normal;
     font-style: normal;
   }

  </style>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-30791350-6', 'auto');
    ga('send', 'pageview');

  </script>
</head>

<body <?php body_class(); ?>>
<!-- <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rwd-is' ); ?></a> -->
<?php  get_template_part( 'template-parts/nav'); ?>

 <?php
 if ( is_page(2) ) {
     get_template_part( 'template-parts/header-home');     // This is the blog posts index
 } else {
     // This is not the blog posts index
  get_template_part( 'template-parts/header-site');
 }
?>

<!--?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?-->

