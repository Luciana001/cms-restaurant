


<section class="col-12 container-fluid " id="container-banner">
        <?php
            get_header();
            $the_query = new WP_Query('category_name=banner');
            $the_query->the_post();
        ?>
        <div class="col-12" id="banner">
        <?php the_content() ?>
        <img src="http://localhost/wp-content/uploads/2021/05/hachures-blanches-e1622028219319.png" class="d-flex  bd-highlight border" alt="hach-black" id="hach-white">
        </div>
        
        
</section>

<section class='container-fluid' id="card-list" >
    <div id="bck-card"></div>
    <div class="row justify-content-center">
    <div class="col-8 mb-5 ">
    <?php $the_query = new WP_Query('category_name=chef');
            $the_query->the_post();
    ?>
    <div class="card">
        <?php the_content() ?>
    </div>
    <?php
        $the_query = new WP_Query('category_name=Non classé');
        while ($the_query->have_posts()) :
        $the_query->the_post();
    ?>
    <!-- boucle qui va permettre d'afficher les articles sous forme de card -->
    
        
             <div class="card ">
                <div class="card-horizontal ">
                    <?php the_post_thumbnail('card-header', ['class' => 'card-img-square-wrapper', 'alt' => 'Card image cap', 'style' => 'height: auto;']) ?>
                    <!--fct qui affiche l'image -->
                        <div class="card-body ">
                            <h5 class="card-title"><?php the_title() ?></h5>
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
    
    
    
    
    
</section>


<?php get_footer() ?>