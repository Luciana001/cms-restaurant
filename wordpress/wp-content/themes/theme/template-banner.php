<?php
/*
*Template Name: Page avec bannière 
*Template Post Type: page, post
*/
?>
<?php get_header() ?>

<?php wp_title(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>   <!-- boucle qui va permettre d'afficher l'article en entier -->
        <h6>
        <?php the_title() ?>
        </h6>
        <p> Ici la bannière olé olé ... on danse ... </p>
        <?php the_content() ?>
<?php endwhile;endif; ?>

<?php get_footer() ?>
