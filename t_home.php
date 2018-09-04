<?php 
/*
Template Name: Home
*/ 
$page_id = get_queried_object_id();
get_header(); ?>
 <section class="banner">
    <?php $items = get_field('banner_item'); 
    if($items) : 
        foreach ($items as $item):?>
    <div class="item" style="background: url(<?php echo $item['banner_bg'] ?>);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <?php if ($item['title']): ?>
                    <h1><?php echo $item['title'] ?></h1>
                    <?php endif; ?>

                    <?php if ($item['banenr_logo']): ?>
                    <img src="<?php echo $item['banenr_logo']; ?>" class="img-responsive" alt="">
                    <?php endif; ?>

                    <?php if ($item['subtitle']): ?>
                    <h2><?php echo $item['subtitle']; ?></h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div><!-- / Slider Item -->
    <?php endforeach; endif; ?>
</section><!-- / Banner -->

<section class="about-us sp">
    <div class="container">
        <?php $title = get_field('about_section_title'); ?>
        <?php if ($title): ?>
        <div class="row justify-content-center">
            <div class="col-md-7 section-title text-center">
                <?php if ($title['title']): ?>
                <h3><?php echo $title['title']; ?></h3>
                <?php endif; ?>
                <span class="separator">
                    <img src="../images/separator.png" alt="">
                </span>
                
                <?php if ($title['description']): ?>
                    <?php echo $title['description']; ?>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="row">
            <?php $img = get_field('about_image'); ?>
            <?php if ($img): ?>
            <div class="col-md-6">
                <div class="media">
                    <img src="<?php echo $img; ?>" class="img-responsive" alt="">
                </div>
            </div>
            <?php endif; ?>

            <div class="col-md-6">
                <?php $items = get_field('about_item'); 
                if($items): 
                    foreach ($items as $item):
                    ?>
                <div class="service-item">
                    <?php if ($item['icon']): ?>
                    <div class="icon align-center">
                        <img src="<?php echo $item['icon']; ?>" class="img-responsive" alt="">
                    </div>
                    <?php endif; ?>
                    <?php if ($item['title'] || $item['content']): ?>
                    <div class="content">
                        <?php if ($item['title']): ?>
                        <h5><?php echo $item['title']; ?></h5>
                        <?php endif; ?>

                        <span class="dots"></span>

                        <?php if ($item['content']): ?>
                        <?php echo $item['content']; ?>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; endif; ?>

            </div>
        </div>
    </div>
</section><!-- / About Us -->

<section class="counterup sp" style="background: url(<?php echo get_field('counter_bg)'); ?>);">
    <div class="container">
        <div class="row">
            <?php $items = get_field('counter_up');
            if($items) :
                foreach ($items as $item):
            ?>
            <div class="col-md-3 col-xs-6 col counter-item text-center">

                <?php if ($item['counter_number']): ?>
                <h1><span class="counter"><?php echo $item['counter_number']; ?></span></h1>
                <?php endif; ?>

                <img src="<?php echo get_theme_file_uri('images/faruni.png'); ?>" class="img-responsive" alt="">

                <?php if ($item['title']): ?>
                <h5><?php echo $item['title']; ?></h5>
                <?php endif; ?>
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section><!-- / counter up -->

<section class="fag sp">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
              <div class="work-experience-image-holder">
                <img src="../images/work-image-holder.png" class="img-responsive" alt="image">
              </div>
            </div>
            <div class="col-md-6"> 
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Section 1
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Section 2
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Section 3
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="appoinments sp">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-12">  
                <div class="section-title text-center">
                    <h3>Make an appointment</h3>
                    <span class="separator">
                        <img src="../images/separator-2.png" alt="">
                    </span>
                    <p>They call him Flipper Flipper faster than lightning. No one you see is smarter than he so join us her are sure to get a smile from seven stranded. </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <img src="../images/form.png" class="img-responsive" alt="">
            </div>
            <div class="col-md-6">
                <img src="../images/about.jpg" class="img-responsive" alt="">
            </div>
        </div>
    </div>
</section><!-- / appoinments -->

<section class="blog sp">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 section-title text-center">
                <h3>fresh news</h3>
                <span class="separator">
                    <img src="../images/separator-2.png" alt="">
                </span>
                <p>They call him Flipper Flipper faster than lightning. No one you see is smarter than he so join us her are sure to get a smile from seven stranded. </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-xs-6 col">
                <div class="post">
                    <a href="#">
                        <div class="media">
                            <img src="../images/post-1.jpg" class="img-responsive" alt="">

                            <div class="post-format">   
                                <span class="far fa-image"></span>
                            </div>
                        </div>
                    </a>
                    <div class="content">
                        <a href="#">Returns Buck Rogers to Earth</a>
                        <div class="post-meta">
                            <ul class="list-inline">
                                <li>
                                    <a href="#">
                                        <span class="far fa-heart"></span>
                                        13 Likes
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="far fa-comment-alt"></span>
                                        13 Comments
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="far fa-user"></span>
                                        13 Comments
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="post-excerpt">
                            <p>The Brady Bunch the Brady Bunch that's the way we all became the Brady Bunch the no one you see is smarter than everyone.</p>
                            <a href="#">Read More</a>
                        </div>
                        <div class="post-footer">
                            <ul class="list-inline">
                                <li><a href="#">JAN 15, 2016</a></li>
                                <li><a href="#">News</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- Post Item-->
            <div class="col-md-4 col-xs-6 col">
                <div class="post">
                    <a href="#">
                        <div class="media">
                            <img src="../images/post-1.jpg" class="img-responsive" alt="">

                            <div class="post-format">   
                                <span class="far fa-image"></span>
                            </div>
                        </div>
                    </a>
                    <div class="content">
                        <a href="#">Returns Buck Rogers to Earth</a>
                        <div class="post-meta">
                            <ul class="list-inline">
                                <li>
                                    <a href="#">
                                        <span class="far fa-heart"></span>
                                        13 Likes
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="far fa-comment-alt"></span>
                                        13 Comments
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="far fa-user"></span>
                                        13 Comments
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="post-excerpt">
                            <p>The Brady Bunch the Brady Bunch that's the way we all became the Brady Bunch the no one you see is smarter than everyone.</p>
                            <a href="#">Read More</a>
                        </div>
                        <div class="post-footer">
                            <ul class="list-inline">
                                <li><a href="#">JAN 15, 2016</a></li>
                                <li><a href="#">News</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- Post Item-->
            <div class="col-md-4 col-xs-6 col">
                <div class="post">
                    <a href="#">
                        <div class="media">
                            <img src="../images/post-1.jpg" class="img-responsive" alt="">

                            <div class="post-format">   
                                <span class="far fa-image"></span>
                            </div>
                        </div>
                    </a>
                    <div class="content">
                        <a href="#">Returns Buck Rogers to Earth</a>
                        <div class="post-meta">
                            <ul class="list-inline">
                                <li>
                                    <a href="#">
                                        <span class="far fa-heart"></span>
                                        13 Likes
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="far fa-comment-alt"></span>
                                        13 Comments
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="far fa-user"></span>
                                        13 Comments
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="post-excerpt">
                            <p>The Brady Bunch the Brady Bunch that's the way we all became the Brady Bunch the no one you see is smarter than everyone.</p>
                            <a href="#">Read More</a>
                        </div>
                        <div class="post-footer">
                            <ul class="list-inline">
                                <li><a href="#">JAN 15, 2016</a></li>
                                <li><a href="#">News</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- Post Item-->
        </div>
        <div class="load-more text-center">
            <a href="#" class="btn">View More</a>
        </div>
    </div>
</section><!-- Post-->

<?php get_footer(); ?>