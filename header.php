<!DOCTYPE html>
    <html lang=<?php language_attributes(); ?>>
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
                        <?php $logo = get_field('logo', 'options'); if ($logo): ?>
                        <a href="<?php echo site_url(); ?>" class="navbar-brand">
                            <img src="<?php echo $logo; ?>" class="img-responsive" alt="Logo Image">
                        </a>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 quick-link">
                        <ul class="list-inline">
                            <?php 
                            $phone = get_field('phone', 'options'); 
                            $add = get_field('address', 'options'); 
                            $email = get_field('email', 'options'); 

                            ?>
                            <li>
                                <?php if ($phone['icon']): ?>
                                <div class="icon align-center">
                                    <span class="fas fa-<?php echo $phone['icon']; ?>"></span>
                                </div>
                                <?php endif; ?>

                                <?php if ($phone['phone']): ?>
                                <div class="content">
                                    <p><?php _e('Any queries call at', 'options'); ?></p>
                                    <a href="tel:<?php echo $phone['phone']; ?>"><?php echo $phone['phone']; ?></a>
                                </div>
                                <?php endif; ?>
                            </li>

                            <?php if ($add): ?>
                            <li>
                                <?php if ($add['icon']): ?>
                                <div class="icon align-center">
                                    <span class="fas fa-<?php echo $add['icon']; ?>"></span>
                                </div>
                                <?php endif; ?>

                                <?php if ($add['location']): ?>
                                <div class="content">
                                    <p><?php _e('105 Joh nsplace,', 'sciss'); ?></p>
                                    <a href="#"><?php echo $add['location']; ?></a>
                                </div>
                                <?php endif; ?>
                            </li>
                            <?php endif; ?>

                            <?php if ($email): ?>
                            <li>
                                <?php if ($email['icon']): ?>
                                <div class="icon align-center">
                                    <span class="fas fa-<?php echo $email['icon']; ?>"></span>
                                </div>
                                <?php endif; ?>

                                <?php if ($email['email_id']): ?>
                                <div class="content">
                                    <p><?php _e('Send your mail at', 'sciss'); ?></p>
                                    <a href="mailto:<?php echo $email['email_id']; ?>"><?php echo $email['email_id']; ?></a>
                                </div>
                                <?php endif; ?>

                            </li>
                            <?php endif; ?>

                            <li class="social-icon">
                                <?php $icons = get_field('social_media', 'options'); ?>
                                <?php if ($icons): foreach ($icons as $icon):?>
                                <a class="icon align-center" href="<?php echo $icon['url']; ?>"><span class="fab fa-<?php echo $icon['icon']; ?>"></span></a>
                                <?php endforeach; endif; ?>

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
                    <?php if (function_exists('wp_nav_menu')): ?>
                    <?php wp_nav_menu( 
                          array(
                          'menu'               => 'Right Menu',
                          'theme_location'     => 'menu-2',
                          'depth'              => 2,
                          'container'          => 'false',
                          'menu_class'         => 'nav navbar-nav navbar-right',
                          'menu_id'            => '',
                          'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                          'walker'             => new wp_bootstrap_navwalker()
                          ) 
                        ); 
                    ?>
                    <?php endif; ?>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div><!-- /.container -->
        </div>
    </header><!-- / Header -->