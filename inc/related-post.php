<?php 
// solutions related post
function diena_cats_related_post() {
    global $post;
    $post_id = $post->ID;
    $cat_ids = array();
    $categories = get_the_terms( $post_id, 'portfolio_cat' );

    if(!empty($categories)):
        foreach ($categories as $category):
            array_push($cat_ids, $category->term_id);
        endforeach;
    endif;


    $current_post_type = get_post_type($post_id);

    $query_args = array( 

        'post_type'      => $current_post_type,
        'post_not_in'    => array($post_id),
        'posts_per_page' => '3',
        'tax_query' => array(
            array(
                'taxonomy' => 'portfolio_cat',
                'field'    => 'term_id',
                'terms'    => $cat_ids,
            ),
        ),
     );

    $related_cats_post = new WP_Query( $query_args );

    if($related_cats_post->have_posts()):
         while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
            <ul>
                <li class="post">
                    <a href="<?php the_permalink(); ?>">
                        <div class="media">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail(null, array('class'=>'img-responsive')); ?>
                            <?php endif ?>
                        </div>
                        <h6><?php the_title(); ?></h6>
                    </a>
                </li>
            </ul>
        <?php endwhile;

        // Restore original Post Data
        wp_reset_postdata();
    endif;

}

// Blog related post
function leisure_blog_related_post() {

    $post_id = get_the_ID();
    $cat_ids = array();
    $categories = get_the_category( $post_id );

    if(!empty($categories)):
        foreach ($categories as $category):
            array_push($cat_ids, $category->term_id);
        endforeach;
    endif;

    $query_args = array( 
        'category__in'   => $cat_ids,
        'post_type'      => 'post',
        'post_not_in'    => array($post_id),
        'posts_per_page'  => -1
     );

    $related_cats_post = new WP_Query( $query_args );

    if($related_cats_post->have_posts()):
         while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
            <div class="col-md-4 col-sm-4 col-xs-6 col">
                <div class="post-content">
                    <a href="<?php the_permalink(); ?>">
                        <div class="media">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail(null, array('class' => 'img-responsive')); ?>
                            <?php endif ?>
                        </div>
                    </a>

                    <div class="post-meta">
                        
                        <div class="date">
                            <p><?php echo get_the_date(); ?></p>
                        </div>

                        <a class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                        <?php the_excerpt(); ?>
                    </div>

                    <div class="post-info">
                        <ul class="list-inline">
                            <li>
                                <a href="#"><img src="<?php echo get_theme_file_uri('images/svg/comment.svg'); ?>" alt="">
                                    <?php echo get_comments_number(); ?> 
                                </a>
                            </li>
                            <li>
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo get_theme_file_uri('images/svg/views.svg'); ?>" alt=""><?php echo getPostViews(get_the_ID()); ?>
                                </a>
                            </li>
                            <li>
                                <a href="#"><img src="<?php echo get_theme_file_uri('images/svg/share.svg'); ?>" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> 
        <?php endwhile;

        // Restore original Post Data
        wp_reset_postdata();
     endif;
}