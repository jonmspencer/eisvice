<?php get_header(); 
  
// get_the_term_list( $id, $taxonomy, $before, $sep, $after );
  
while ( have_posts() ) : the_post();?>
  <section <?php post_class('story'); ?>>
    <div class="post-header">
      <h1><?php the_title(); ?></h1>
      <div class="meta"><?php echo get_the_term_list( $post->ID, 'project', 'From <span class="album">', '</span> by <span class="band">', '</span>' ); ?></div>
    </div><!-- END POST HEADER -->
    
    
    
    
    

    
    <?php the_content(); ?>
  </section><!-- END STORY -->
<?php endwhile; get_footer(); ?>