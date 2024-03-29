<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="icon" href="<?php echo base_url(); ?>siteimage/site.jpg" type="image/ico">

    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/menu_toggle.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/croppie.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/croppie.css" />

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/stylesheet.css">
    <script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/register.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/slicebox.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/homeSlide.css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/modernizr.custom.46884.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.slicebox.js"></script>

</head>
<body style="background-image: url('<?php echo base_url(); ?>siteimage/wall.png');">

<div class="mainDiv">

    <div class="menu-toggle" id="hamburger">
        <i class="fas fa-bars"></i>
    </div>
    <div class="overlay"></div>
    <div class="container">
        <nav>
            <h1 class="brand"><a href="<?php echo base_url('LmsController/home'); ?>">SLI<span>IT</span> LMS</a></h1>
            <ul>
                <?php
                    if (isset($_SESSION['userType'])){
                        echo '
                            <li><a href="'.base_url('LmsController/home').'">Home</a></li>
                            <li><a href="'.base_url('LmsController/profile').'">Profile</a></li>
                            <li><a href="'.base_url('LmsController/logout').'">Logout</a></li>
                            ';
                    }else{
                        echo '
                            <li><a href="'.base_url('LmsController/home').'">Home</a></li>
                            <li><a href="'.base_url('UserController/Login').'">Login</a></li>
                            <li><a href="'.base_url('UserController/register').'">Register</a></li>
                            ';
                    }
                ?>
            </ul>
        </nav>
    </div>

    <div class="homeBox">
        <div class="homeSlider">
            <div class="wrapper">

                <ul id="sb-slider" class="sb-slider">
                    <li>
                        <a><img src="<?php echo base_url(); ?>homeImage/1.jpg" alt="image1"/></a>
                        <div class="sb-description">
                            <h3>Creative Lifesaver</h3>
                        </div>
                    </li>
                    <li>
                        <a><img src="<?php echo base_url(); ?>homeImage/2.jpg" alt="image2"/></a>
                        <div class="sb-description">
                            <h3>Honest Entertainer</h3>
                        </div>
                    </li>
                    <li>
                        <a><img src="<?php echo base_url(); ?>homeImage/3.jpg" alt="image1"/></a>
                        <div class="sb-description">
                            <h3>Brave Astronaut</h3>
                        </div>
                    </li>
                    <li>
                        <a><img src="<?php echo base_url(); ?>homeImage/4.jpg" alt="image1"/></a>
                        <div class="sb-description">
                            <h3>Affectionate Decision Maker</h3>
                        </div>
                    </li>
                    <li>
                        <a><img src="<?php echo base_url(); ?>homeImage/5.jpg" alt="image1"/></a>
                        <div class="sb-description">
                            <h3>Faithful Investor</h3>
                        </div>
                    </li>
                    <li>
                        <a><img src="<?php echo base_url(); ?>homeImage/6.jpg" alt="image1"/></a>
                        <div class="sb-description">
                            <h3>Groundbreaking Artist</h3>
                        </div>
                    </li>
                    <li>
                        <a><img src="<?php echo base_url(); ?>homeImage/7.jpg" alt="image1"/></a>
                        <div class="sb-description">
                            <h3>Selfless Philantropist</h3>
                        </div>
                    </li>
                </ul>

                <div id="nav-arrows" class="nav-arrows">
                    <a href="#" style="background: #2a3342 url(<?php echo base_url(); ?>homeImage/nav.png) no-repeat top right;">Next</a>
                    <a href="#" style="background: #2a3342 url(<?php echo base_url(); ?>homeImage/nav.png) no-repeat top left;">Previous</a>
                </div>

            </div>
        </div>
        <div class="contact">
            <h2 class="contact-text1">CONTACT</h2>
            <div class="contact-line"></div>
            <div class="contact-text2"><p>For any media inquiries, please contact agent Mark Oakley:</p></div>
            <div class="contact-text3"><p>Tel: 123-456-7890 | Fax: 123-456-7890 | info@my-domain.com</p></div>
            <div class="contact-links">
                <a href="#">FAQ</a>
                <a href="#">Shipping & Returns </a>
                <a href="#">Terms & Conditions</a>
                <a href="#">Payment Methods</a>
            </div>
            <div class="contact-social">
                <p>Follow me:
                    <a href="#"><img src="<?php echo base_url(); ?>siteimage/faceb.png"></a>
                    <a href="#"><img src="<?php echo base_url(); ?>siteimage/twi.png"></a>
                    <a href="#"><img src="<?php echo base_url(); ?>siteimage/gplus+.png" style="width: 43px"></a>
                    <a href="#"><img src="<?php echo base_url(); ?>siteimage/ink.png"></a></p>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br>
</div>

<div class="headDiv">
</div>
</body>
</html>
<script type="text/javascript">

    $(function() {

        var Page = (function() {

            var $navArrows = $( '#nav-arrows' ).hide(),
                slicebox = $( '#sb-slider' ).slicebox( {
                    onReady : function() {

                        $navArrows.show();

                    },
                    orientation : 'r',
                    cuboidsCount : true,
                    cuboidsRandom : true,
                    disperseFactor : 30
                } ),

                init = function() {

                    initEvents();

                },
                initEvents = function() {

                    slicebox.play();

                    // add navigation events
                    $navArrows.children( ':first' ).on( 'click', function() {

                        slicebox.next();
                        slicebox.play();

                        return false;

                    } );

                    $navArrows.children( ':last' ).on( 'click', function() {

                        slicebox.previous();
                        slicebox.play();

                        return false;

                    } );

                };

            return { init : init };

        })();

        Page.init();

    });
</script>