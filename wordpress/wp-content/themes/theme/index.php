


<section class="col-12 container-fluid " id="banner">
    
        <?php get_header() ?>
        <img src="http://localhost/wp-content/uploads/2021/05/banner-top-1.jpg" alt="banner" id="banner-img"/>
        <div id="title">
            <p>For happy day</p>
            <h1>ENJOY</h1>
            <h1>HAPPY MEAL</h1>
        </div>
</section>

<section class='container-fluid' id="card-list" >
    <div id="bck-card"></div>
    <?php if (have_posts()) : ?>
        <!-- si y a des articles -->
        <div class="row justify-content-center">
            <?php while (have_posts()) : the_post(); ?>
                <!-- boucle qui va permettre d'afficher les articles sous forme de card -->
                <div class="col-8 mb-5 ">
                    <div class="card">
                        <div class="card-horizontal">
                            <?php the_post_thumbnail('card-header', ['class' => 'card-img-square-wrapper', 'alt' => 'Card image cap', 'style' => 'height: auto;']) ?>
                            <!--fct qui affiche l'image -->
                            <div class="card-body">
                                <!-- <h5 class="card-title"><?php //the_title() ?></h5> -->
                                <p class="card-text">
                                    <?php the_content('En voir plus') ?>
                                </p>
                                <div class="d-flex justify-content-center">
                                <a href="<?php the_permalink() ?>" role="button" class="btn btn-dark col-3 p-3  ">More Info</a>
                                </div>
                            </div>
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
    
    
    
    
</section>


<?php get_footer() ?>