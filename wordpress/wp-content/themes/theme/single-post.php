<?php get_header() ?>

<?php wp_title(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <!-- boucle qui va permettre d'afficher l'article en entier -->
        <h1><?php the_title() ?></h1>

        <?php the_content() ?>
<?php endwhile;endif; ?>



<?php get_footer() ?>