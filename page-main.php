<?php
get_header();
?>
<main id="primary" class="site-main">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- hero banner -->
    <section class="hero">
      <!-- Slider main container -->
      <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->
          <div class="swiper-slide">Slide 1</div>
          <div class="swiper-slide">Slide 2</div>
          <div class="swiper-slide">Slide 3</div>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
      </div>
    </section>
    <section class="products">
      <div class="container mx-auto px-4 relative">
        <div class="grid lg:grid-cols-2 gap-8">
          <div class="grid grid-cols-2 gap-x-4 gap-y-8 order-2 lg:order-1">
            <?php
      $posts = get_posts(array(
        'post_type'       => 'product',
        'post_status'     => 'publish',
        'posts_per_page'  => -1,
      ));
      if ($posts) :
        foreach($posts as $post) :
          // echo '<xmp>';
          // print_r($post);
          // echo '</xmp>';
          $photo      = get_the_post_thumbnail($post->ID, 'full');
          $title      = get_the_title();
          $desc       = get_the_content();
          $cost       = get_field('cost', $post->ID);
          $homepage   = get_field('homepage', $post->ID);
          $color      = get_field('color', $post->ID);
          echo '
          <div class="product text-center">
            <figure class="rounded-xl shadow-md">'.$photo.'</figure>
            <div class="product-title font-semibold text-xl mt-4">'.$title.'</div>
            <div class="product-cost font-xs">'.$cost.'</div>
            <div class="product-homepage">'.$homepage.'</div>
            <div class="product-color">
              <span class="inline-block w-4 h-4 rounded-full" style="background-color:'.$color.'"></span>
            </div>
          </div>
          ';
        endforeach;
      endif;
      ?>
          </div>
          <div class="order-1 lg:order-2">
            <div class="sticky top-8">
              <h2 class="text-4xl md:text-6xl lg:text-8xl font-extrabold">
                Products
              </h2>
              <div class="text-sm pb-10">
                Phasellus tempus venenatis enim, scelerisque blandit ex malesuada egestas. Maecenas posuere, mi quis euismod volutpat, purus ex volutpat mauris, laoreet consectetur ligula nisl in ligula. Cras consequat mauris nec magna faucibus, sed congue metus ultricies. Etiam at velit nec neque ullamcorper consequat ut nec orci. Ut at nisi odio. Sed posuere feugiat tellus, sit amet consectetur leo imperdiet ut. Cras et tortor et risus sagittis tristique. Etiam id pulvinar arcu.
              </div>
            </div>
          </div>
        </div>
      </div>


    </section>
    <section class="w-full h-screen bg-secondary">

    </section>
  </article>
</main>
<?php
get_footer();
?>