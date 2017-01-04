<?php
/**
 * Template Name: Custom RSS Template - Feedname
 */
$postCount = 5; // The number of posts to show in the feed
$posts = query_posts('showposts=' . $postCount);
header('Content-Type: '.feed_content_type('rss-http').'; charset='.get_option('blog_charset'), true);
echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>';
?>
<rss version="2.0"
        xmlns:content="http://purl.org/rss/1.0/modules/content/"
        xmlns:wfw="http://wellformedweb.org/CommentAPI/"
        xmlns:dc="http://purl.org/dc/elements/1.1/"
        xmlns:atom="http://www.w3.org/2005/Atom"
        xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
        xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
        <?php do_action('rss2_ns'); ?>>
<channel>
        <title><?php bloginfo_rss('name'); ?> - Facebook Feed</title>
        <atom:link href="<?php self_link(); ?>" rel="self" type="application/rss+xml" />
        <link><?php bloginfo_rss('url') ?></link>
        <description><?php bloginfo_rss('description') ?></description>
        <lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
        <language><?php echo get_option('rss_language'); ?></language>
        <sy:updatePeriod><?php echo apply_filters( 'rss_update_period', 'hourly' ); ?></sy:updatePeriod>
        <sy:updateFrequency><?php echo apply_filters( 'rss_update_frequency', '1' ); ?></sy:updateFrequency>
        <?php do_action('rss2_head'); ?>
        <?php while(have_posts()) : the_post(); ?>
                <item>
                        <title><?php the_title_rss(); ?> - title</title>
                        <link><?php the_permalink_rss(); ?></link>
                        <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
                        <dc:creator><?php the_author(); ?></dc:creator>
                        <guid isPermaLink="false"><?php the_guid(); ?></guid>
                        <description><![CDATA[<?php the_excerpt_rss() ?>]]></description>
                        <content:encoded><![CDATA[

                        <!doctype html>
                               <html lang="en" prefix="op: http://media.facebook.com/op#">
                                 <head>
                                   <meta charset="utf-8">
                                   <link rel="canonical" href="http://example.com/article.html">
                                   <meta property="op:markup_version" content="v1.0">
                                 </head>
                                 <body>
                                   <article>
                                     <header>
                                        <h1><?php the_title_rss(); ?></h1>
                                </header>
                        <?php the_content()?>
                        <blockquote>
                        <?php the_field(news_article_excerpt);?>
                        <small><cite>An excerpt from <?php the_title_rss()?></cite></small>
                        </blockquote>
                        <footer>
                                <p><a href="https://responsivedesign.is">Find this and more articles on Responsive Design</a>.</p>
                                      </footer>
                                    </article>
                                  </body>
                                </html>
                               ]]></content:encoded>
                        <?php rss_enclosure(); ?>
                        <?php do_action('rss2_item'); ?>
                </item>
        <?php endwhile; ?>
</channel>
</rss>