<?php get_header() ?>

<?php wp_title(); ?> <!-- titre de la page -->

<?php if (have_posts()) : ?>
    <!-- si y a des articles -->
    <div class="row">
        <?php while (have_posts()) : the_post(); ?>
            <!-- boucle qui va permettre d'afficher les articles sous forme de card -->
            <div class="col-sm-6">
                <div class="card">
                    <?php the_post_thumbnail('card-header', ['class' => 'card-img-top', 'alt' => '', 'style' => 'height: auto;']) ?>
                    <!--fct qui affiche l'image -->
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title() ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php the_category() ?></h6>
                        <p class="card-text">
                            <?php the_content('En voir plus') ?>
                        </p>
                        <a href="<?php the_permalink() ?>" class="card-link">Voir plus ...</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php theme_pagination(); ?>
    <?= paginate_links(); ?> 
<?php else : ?>
    <h1>Pas d'articles</h1>
<?php endif; ?>

<?php get_footer() ?>