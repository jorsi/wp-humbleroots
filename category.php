<?php
  get_header();
  // Variables
  $humble = get_page_by_title( 'Humble Thoughts' );
  $cat = get_category_by_slug( single_cat_title("",false) );

  //The Query
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $post_query = new WP_Query();
  $post_query->query( 'showposts=5&category_name=' . $cat->slug .'&paged='.$paged );
  $postid = $post->ID;
  $thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

  $results = $post_query->found_posts;
  $start = $paged * 5 - 4;
?>

<div class="nav-pad"></div>
<main id="main">
  <div class="container-md humble-header">
      <h1 class="humble-title"><?php echo stripslashes( get_post_meta( $humble->ID, 'humblerootsmedia_splash-title', true ) ); ?></h1>
      <h3 class="splash-tagline black"><?php echo stripslashes( get_post_meta(  $humble->ID, 'humblerootsmedia_splash-tagline', true ) ); ?></h3>
      <form role="search" method="get" id="searchform" class="searchform" action="/">
          <label class="screen-reader-text" for="s">Search for:</label>
          <input type="text" value="" name="s" id="s">
          <button type="submit" id="searchsubmit"><i class="fa fa-fw fa-search"></i></button>
      </form>
      <p class="search-results">
        Displaying <?php echo $start . ' to ' . (($start + 4) <= $results ? ($start + 4) : $results); ?> of <?php echo $results; ?> results.
      </p>
  </div>
  <div class="container-lg">
    <section class="blog-posts">
      <!-- Start the Loop. -->
      <?php
        if ( $post_query->have_posts() ) : while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
          <section class="post-summary">
            <div class="container-md">
              <h2 class="post-title text-center">
                <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
              </h2>
              <div class="post-metadata">
                <ul class="post-metadata-authorinfo">
                  <li class="post-metadata-author">Written by <span class="author"><a href="/author/<?php echo get_the_author_meta('user_nicename'); ?>"><?php echo get_the_author(); ?></a></span></li>
                  <li class="post-metadata-time"> on <time datetime="<?php echo get_the_time('F jS, Y g:i:s'); ?>" pubdate><?php echo get_the_time('F jS, Y'); ?></time></li>

                  <?php
                  $twitter = get_the_author_meta( 'twitter' );
                  if ( $twitter ) { ?>
                    <li class="post-metadata-twitter">
                      <a href="http://www.twitter.com/<?php echo $twitter; ?>" target="_blank">
                        <i class="fa fa-fw fa-twitter"></i>@<?php echo $twitter; ?>
                      </a>
                    </li>
                  <?php }

                  $instagram = get_the_author_meta( 'instagram' );
                  if ( $instagram ) { ?>
                    <li class="post-metadata-instagram">
                      <a href="http://www.instagram.com/<?php echo $instagram; ?>" target="_blank">
                        <i class="fa fa-fw fa-instagram"></i>@<?php echo $instagram; ?>
                      </a>
                    </li>
                  <?php }

                  $facebook = get_the_author_meta( 'facebook' );
                  if ( $facebook ) { ?>
                    <li class="post-metadata-facebook">
                      <a href="http://www.facebook.com/<?php echo $facebook; ?>" target="_blank">
                        <i class="fa fa-fw fa-facebook"></i>@<?php echo $facebook; ?>
                      </a>
                    </li>
                  <?php } ?>
                </ul>
                <ul class="post-metadata-categories">
                  <?php
                  $categories = get_the_category();
                  if ( $categories ) {
                      foreach ($categories as $category) {
                        if ( $category->name != 'Uncategorised' ) { ?>
                          <li class="post-metadata-category">
                            <a href="/category/<?php echo $category->slug; ?>">
                              <?php echo $category->name; ?>
                            </a>
                          </li>
                        <?php
                        }
                      } ?>
                  <?php } ?>
                </ul>
              </div>

              <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img class="post-image block-center" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>"></a>

              <article class="post-entry">
                <?php the_content('<span class="ghost">Read More</div>'); ?>
              </article>
            </div>
          </section>

        <?php
          endwhile;
          // pager
          if( $post_query->max_num_pages > 1 ) : ?>
              <nav class="pager">
              <?php
              if($paged != 1) : ?>
                <div class="pager-col">
                  <a class="pager-link" href="/category/<?php echo $cat->slug; ?>"><i class="fa fa-fw fa-angle-double-left"></i></a>
                  <a class="pager-link" href="/category/<?php echo $cat->slug;?>/page/<?php echo ($paged - 1); ?>"><i class="fa fa-fw fa-angle-left"></i> Newer Posts</a>
                </div>
              <?php endif;

              if($paged != $post_query->max_num_pages) : ?>
                <div class="pager-col">
                  <a class="pager-link" href="/category/<?php echo $cat->slug; ?>/page/<?php echo ($paged + 1); ?>">Older Posts <i class="fa fa-fw fa-angle-right"></i></a>
                  <a class="pager-link" href="/category/<?php echo $cat->slug; ?>/page/<?php echo $post_query->max_num_pages; ?>"><i class="fa fa-fw fa-angle-double-right"></i></a>
                </div>
              <?php endif; ?>
            </nav>
        <?php endif;

          wp_reset_postdata();
          else :
        ?>
           <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>
    </section>

    <aside class="break text-center">
      <div class="container-md">
        <p><?php echo stripslashes( get_post_meta( $humble->ID, 'humblerootsmedia_outro-text', true ) ); ?></p>
        <p>
          <a href="/contact">Grow with us.</a>
        </p>
      </div>
    </aside>
  </div>
</main>

<?php get_footer();
