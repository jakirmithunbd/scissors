<?php 

/* ajax requests */
function leisuretex_load_faqs(){
	$slug = $_POST['slug'];

	$args = array(
		'post_type' => 'faqs',
		'posts_per_page' => -1,
	);

	$tax_args = array(
        array(
            'taxonomy' => 'faqs_cat',
            'field'    => 'slug',
            'terms'    => $slug
        )
	);

	if(!empty($slug)){
		$args['tax_query'] = $tax_args;
	}

	$faqs = get_posts($args);

	$counter = 1; 
		
	if($faqs){
		foreach ($faqs as $faq):
			setup_postdata( $faq );
		?>
		
	<div class="col-md-9 col-sm-10 col-xs-12 <?php echo $slug; ?>">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading" id="headingOne">
                    <h4 class="panel-title">
                        <a class="<?php echo $counter !== 1 ? 'collapsed' : ''; ?>" data-toggle="collapse" data-parent="#accordion" href="#item<?php echo $counter; ?>">
                           <?php echo $faq->post_title; ?>
                        </a>
                    </h4>
                </div>
                <div id="item<?php echo $counter; ?>" class="panel-collapse collapse <?php echo ($counter) == 1 ? 'in' : ''; ?>">
                    <div class="panel-body">
                        <p><?php echo $faq->post_content; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- / item -->
    <?php $counter++; ?>
<?php		
	endforeach;
	wp_reset_postdata();
	die();
	}
}
add_action("wp_ajax_load_faqs", "leisuretex_load_faqs");
add_action("wp_ajax_nopriv_load_faqs", "leisuretex_load_faqs");

// post Load more button ajax
function leisure_filter_posts(){
	$post_slug = $_POST['slug'];

	if ($post_slug == null) {
		$posts_per_page = 8;
	} else {
		$posts_per_page = 2;
	}

	$args = [
		'post_type' => 'post',
		'posts_per_page' => $posts_per_page,
	];

	if($_POST['slug']){
		$args['tax_query'] =  array(
			array(
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => $_POST['slug'],
			),
		);
	}

	if( $_POST['page'] > 1 ){
		$args['offset'] = ( $_POST['page'] * $posts_per_page ) - $posts_per_page;
	}

	$loop = new WP_Query($args);

	if($loop->have_posts()) : 
		while($loop->have_posts()) : $loop->the_post(); 
			$terms = get_the_category();
	        $term_slug = '';
	        if($terms) {
	            foreach ($terms as $term) {
	                $term_slug .= ' ' . $term->slug;
	            }
	        }
	?>

		<div class="col-md-4 col-sm-6 col-xs-6 col mix <?php echo $term_slug; ?>">
            <div class="post-content">
                <a href="<?php the_permalink(); ?>">
                    <div class="media">
                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail(null, array('class' => 'img-responsive')); ?>
                        <?php endif ?>
                    </div>
                </a>

                <div class="post-meta">
                    <div class="category">
                        <?php $cats = get_the_category(); ?>
                        <a href="<?php the_permalink(); ?>">

                            <?php $re = join(', ', wp_list_pluck($cats, 'name')) ?>
                            <?php echo $re; ?>
                        </a>
                    </div>
                    <a class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                    <div class="date">
                        <p><?php echo get_the_date(); ?></p>
                    </div>

                    <?php the_excerpt(); ?>
                </div>

                <div class="post-info">
                    <ul class="list-inline">
                        <li>
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo get_theme_file_uri('images/svg/comment.svg'); ?>" alt="">
                                <?php echo get_comments_number(); ?> 
                            </a>
                        </li>
                        <li>
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo get_theme_file_uri('images/svg/views.svg'); ?>" alt=""><?php echo getPostViews(get_the_ID()); ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo get_theme_file_uri('images/svg/share.svg'); ?>" alt=""></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div><!-- / item -->

	<?php
	    endwhile; wp_reset_postdata(); 
	else : 
	?> 
		<div class="entry-content notResult col-md-12 col-sm-12 col-xs-12">
            <h4 class="no-content text-center" style="padding: 0 0 50px; margin-top: 30px;">
                <?php _e('No more posts!!!', 'leisure'); ?>
            </h4>
        </div> 
	<?php 
	endif;
	die();
}
add_action("wp_ajax_leisure_filter_posts", "leisure_filter_posts");
add_action("wp_ajax_nopriv_leisure_filter_posts", "leisure_filter_posts");


// project Load more button ajax
function leisure_filter_projects(){
	$post_slug = $_POST['slug'];

	if ($post_slug == null) {
		$posts_per_page = 8;
	} else {
		$posts_per_page = 2;
	}

	$args = [
		'post_type' => 'portfolio',
		'posts_per_page' => $posts_per_page,
	];

	if($_POST['slug']){
		$args['tax_query'] =  array(
			array(
				'taxonomy' => 'portfolio_cat',
				'field'    => 'slug',
				'terms'    => $_POST['slug'],
			),
		);
	}

	if( $_POST['page'] > 1 ){
		$args['offset'] = ( $_POST['page'] * $posts_per_page ) - $posts_per_page;
	}

	$loop = new WP_Query($args);

	if($loop->have_posts()) : 
		while($loop->have_posts()) : $loop->the_post(); 
			$terms = get_the_category();
	        $term_slug = '';
	        if($terms) {
	            foreach ($terms as $term) {
	                $term_slug .= ' ' . $term->slug;
	            }
	        }
	?>

	<div class="col-md-4 col-sm-6 col-xs-6 col mix <?php echo $term_slug; ?>">
            <div class="mix-item">
                <a href="<?php the_permalink(); ?>">
                     <div class="media">
                        <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('large', array("class"=>"img-responsive")) ?>
                        <?php endif ?>
                        <div class="paint-location">
                            <h6>
                            <?php 
                                $terms = get_the_terms(get_the_ID(), 'portfolio_cat');
                                $terms_string = join(', ', wp_list_pluck($terms, 'name')); 
                            ?>
                            <?php echo $terms_string; ?>
                            </h6>
                        </div>
                    </div>
                </a>
                <div class="content">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <?php the_excerpt(); ?>
                </div>
            </div>
        </div><!-- / item -->

	<?php
	    endwhile; wp_reset_postdata(); 
	else : 
	?> 
		<div class="entry-content notResult col-md-12 col-sm-12 col-xs-12">
            <h4 class="no-content text-center" style="padding: 0 0 50px; margin-top: 30px;">
                <?php _e('No more projects!!!', 'leisure'); ?>
            </h4>
        </div> 
	<?php 
	endif;
	die();
}


add_action("wp_ajax_leisure_filter_projects", "leisure_filter_projects");
add_action("wp_ajax_nopriv_leisure_filter_projects", "leisure_filter_projects");

