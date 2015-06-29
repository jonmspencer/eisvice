<?php get_header(); ?>

  <?php if(is_page('coming-soon')) { ?>
  <div class="center coming-soon">
    <a class="logo" href="<?php echo home_url(); ?>"></a>
    <h1>Coming very soon.</h1>
  </div>
  <?php } // END COMING SOON ?>

<?php get_footer(); ?>