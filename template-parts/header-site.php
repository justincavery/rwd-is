     <header class="site-header site-header--compact">
        <a href="/"><span class="site-header__logo logo logo--inverted">Responsive Design.is</span></a>

        <div class="page-header">
          <span class="page-header__title">
          <?php if ( 0 == $post->post_parent ) {
             if ( 'podcasts' == get_post_type()) {
              echo 'Podcasts';
              } elseif ( 'resource' == get_post_type()) {
              echo 'Resources';
              } elseif ( 'example' == get_post_type()) {
              echo 'Examples';
              } elseif ( 'article' == get_post_type()) {
              echo 'Article';
              } elseif (is_search()) {
                echo 'Search';
              } elseif ( 'post' == get_post_type()) {
              echo 'News';
              } elseif ( 'patterns' == get_post_type()) {
                echo 'Patterns';
              }
              else {
                the_title();
              }
          }  else {
              $parents = get_post_ancestors( $post->ID );
              echo apply_filters( "the_title", get_the_title( end ( $parents ) ) );
          }?></span>
          <nav class="nav nav--breadcrumb">
          <?php echo get_hansel_and_gretel_breadcrumbs();?>
          </nav>
        </div>
      </header>