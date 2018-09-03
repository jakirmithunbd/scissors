<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <?php wp_head(); ?>
<body>
    <header class="header">
        <div class="container">
            <div class="top-bar">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12 header-logo">
                        <?php $logo = get_field('logo', 'options'); ?>
                        <?php if ($logo): ?>
                        <a href="<?php echo site_url(); ?>" class="navbar-brand">
                            <img src="<?php echo $logo; ?>" class="img-responsive" alt="Logo Image">
                        </a>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 quick-link">
                        <ul class="list-inline">
                            <li>
                                <div class="icon align-center">
                                    <span class="fas fa-phone"></span>
                                </div>
                                <div class="content">
                                    <p>Any queries call at</p>
                                    <a href="tel:1-800-23-456-7890">1-800-23-456-7890</a>
                                </div>
                            </li>
                            <li>
                                <div class="icon align-center">
                                    <span class="fas fa-home"></span>
                                </div>
                                <div class="content">
                                    <p>105 Joh nsplace,</p>
                                    <a href="#">Washington,USA</a>
                                </div>
                            </li>
                            <li>
                                <div class="icon align-center">
                                    <span class="fas fa-envelope"></span>
                                </div>
                                <div class="content">
                                    <p>Send your mail at</p>
                                    <a href="mailto:info@domain.com">info@domain.com</a>
                                </div>
                            </li>
                            <li class="social-icon">
                                <a class="icon align-center" href="#"><span class="fab fa-facebook-f"></span></a>
                                <a class="icon align-center" href="#"><span class="fab fa-twitter"></span></a>
                                <a class="icon align-center" href="#"><span class="fab fa-google-plus-g"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu">
            <div class="container">
                <nav class="navbar navbar-default">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
                        <span class="icon-bar"><span class="inner"></span></span>
                        <span class="icon-bar"><span class="inner"></span></span>
                        <span class="icon-bar"><span class="inner"></span></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php if (function_exists('wp_nav_menu')): ?>
                    <?php wp_nav_menu( 
                          array(
                          'menu'               => 'Main Menu',
                          'theme_location'     => 'menu-1',
                          'depth'              => 2,
                          'container'          => 'false',
                          'menu_class'         => 'nav navbar-nav',
                          'menu_id'            => '',
                          'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                          'walker'             => new wp_bootstrap_navwalker()
                          ) 
                        ); 
                    ?>
                    <?php endif; ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Make appointment</a></li>
                    </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div><!-- /.container -->
        </div>
    </header><!-- / Header -->