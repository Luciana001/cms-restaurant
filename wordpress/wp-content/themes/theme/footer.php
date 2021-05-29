        </div>
        </section>
       
    <?php
    // wp_nav_menu([
    //     'theme_location' => 'footer', // 1er param: option de notre nav menu, 2e param: nom qu on lui à donné (voir fct.php) 
    //     'container' => false,
    //     'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0' //2eme param: voir menu nav bar de bootsrap
    // ])
    ?>
    </footer> 

        <footer id="footer">
            <div class="row justify-content-center ">
                <img src="http://localhost/wp-content/uploads/2021/05/hachures-noires.png" class=" col-8 d-flex my-0 p-0 bd-highlight " alt="hach-black">
                <div class="col-8 d-flex border" id="footer-xs">
                    <div class="col-4 d-flex align-items-center">
                        <h3>JOIN OUR NEWSLETTER</h3>
                    </div>
                    <div class="col-8 ">
                        <form class="d-flex p-5 mb-2 ">
                            <input class="form-control me-2" type="text" placeholder="Enter your adress mail" aria-label="Mail">
                            <button class=" btn btn-light btn-md" type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
                <div class="row" id="footer-xl">
                    <img src="http://localhost/wp-content/uploads/2021/05/hachures-noires.png" class="d-flex my-0 p-0 bd-highlight" alt="hach-black" id="footer-img">
                    <?php
                    $the_query = new WP_Query('category_name=footer');
                    while ($the_query->have_posts()) :
                        $the_query->the_post();
                    ?>
                        <div class="col-3 ">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title"><?php the_title(); ?></h6>
                                    <p class="card-text"><?php the_content(); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
        </footer>
        <?php wp_footer() ?>
        </body>
        </html>