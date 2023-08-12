<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie9" xmlns="http://www.w3.org/1999/xhtml" lang="en-US"> <![endif]-->
<!--[if (gte IE 10)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
<!--<![endif]-->

<!-- Mirrored from codevz.com/html/remix/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Aug 2023 19:26:25 GMT -->

<head>
    <title>Remix - Music & Band Site Template HTML5 and CSS3</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Seo Meta -->
    <meta name="description" content="Remix - Music & Band Site Template HTML5 and CSS3">
    <meta name="keywords" content="remix, music, light, dark, themeforest, multi purpose, band, css3, html5">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ url('/client/bootstrap/css/bootstrap.min.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ url('/client/bootstrap/css/bootstrap-responsive.min.css') }}"
        media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ url('/client/style.css') }}" id="dark" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ url('/client/js/rs-plugin/css/settings.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ url('/client/styles/icons/icons.css') }}" media="screen" />
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('/client/images/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ url('/client/images/apple-touch-icon.png') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <style>
        /* Set a higher z-index for the notyf container */
        .notyf {
            z-index: 99999999 !important;
            /* Use !important to ensure it takes precedence */
            position: fixed;
            /* Change position to fixed */
            top: 10px;
            /* Adjust the value as needed for top positioning */
            right: 10px;
        }


        /* Set a lower z-index for the login popup */
        #popupLogin {
            z-index: 99999998 !important;
            /* Make sure it's lower than the notyf container */
        }
    </style>
    <script></script>
    <!-- In your HTML file, add the following script -->
    

    <!--[if IE]>
  <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=EmulateIE8; IE=EDGE" />
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <link rel="stylesheet" type="text/css" href="styles/icons/font-awesome-ie7.min.css" />
 <![endif]-->
</head>

<body id="fluidGridSystem">
    <div id="layout" class="full">

        {{-- ________________ Login Form _________ --}}
        <!-- popup login -->

        <div id="popupLogin">
            <div class="def-block widget">
                <h4> Sign In </h4><span class="liner"></span>
                <div class="widget-content row-fluid">
                    <form id="popup_login_form" method="POST" action="{{ route('account.login') }}">
                        @csrf
                        <input type="text" name="email" id="login_username" placeholder="username">
                        <input type="password" name="password" id="login_password" placeholder="password">

                        <button class="tbutton small" id="login_button"><span>Sign In</span></button>
                        {{-- <a href="#" class="tbutton color2 small"><span>Register</span></a> --}}
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                const notyf = new Notyf();

                                $("#popup_login_form").submit(function(e) {
                                    e.preventDefault(); // Prevent default form submission

                                    $.ajax({
                                        url: $(this).attr("action"),
                                        type: "POST",
                                        data: $(this).serialize(),
                                        dataType: "json",
                                        success: function(response) {
                                            // Handle successful login
                                            if (response.role === 1) {
                                                window.location.href = "/Dashboard/Index";
                                            } else if (response.role === 2) {
                                                window.location.href = "/";
                                            } else if (response.role === 3) {
                                                window.location.href = "employee.dashboard";
                                            }
                                        },
                                        error: function(xhr) {
                                            // Handle login error
                                            if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.error) {
                                                const errorMessage = xhr.responseJSON.error;
                                                notyf.open({
                                                    type: 'error',
                                                    message: errorMessage,
                                                    duration: 2000,
                                                    position: {
                                                        y: 'top',
                                                        x: 'right',
                                                    },
                                                });
                                            } else if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON
                                                .errors) {
                                                const errors = xhr.responseJSON.errors;
                                                let errorMessage = '';
                                                let i = 0;
                                                for (const key in errors) {
                                                    i++;
                                                    errorMessage += i + '. ' + errors[key][0] +
                                                    '<br>'; // Concatenate all error messages
                                                }

                                                notyf.open({
                                                    type: 'error',
                                                    message: errorMessage,
                                                    duration: 2000,
                                                    position: {
                                                        y: 'top',
                                                        x: 'right',
                                                    },
                                                });

                                            } else {
                                                notyf.error('An error occurred. Please try again later.');
                                            }
                                        }
                                    });
                                });
                            });
                        </script>
                    </form><!-- login form -->

                </div><!-- content -->
            </div><!-- widget -->
            <div id="popupLoginClose">x</div>
        </div><!-- popup login -->
        <div id="LoginBackgroundPopup"></div>
        <!-- popup login -->

        <!-- In your HTML file, add the following script -->



        {{-- ________________ Register Form _________ --}}
        <!-- popup login -->
        <div id="popupRegister">
            <div class="def-block widget">
                <h4> Sign In </h4><span class="liner"></span>
                <div class="widget-content row-fluid">
                    <form id="popup_Register_form" method="POST" action="{{ route('account.register') }}">
                        @csrf
                        <input type="text" name="reg_username" id="username" placeholder="username">
                        <input type="email" name="reg_email" id="email" placeholder="email">
                        <input type="password" name="reg_password" id="password" placeholder="password">
                        <button type="submit" class="tbutton small"><span>Sign Up</span></button>
                        {{-- <a href="#" class="tbutton color2 small"><span>Register</span></a> --}}
                    </form><!-- login form -->
                </div><!-- content -->
            </div><!-- widget -->
            <div id="popupRegisterClose">x</div>
        </div><!-- popup login -->
        <div id="RegisterBackgroundPopup"></div>
        <script>
            $(document).ready(function() {

                $("#popup_Register_form").submit(function(e) {
                    const notyf = new Notyf();
                    e.preventDefault(); // Prevent default form submission

                    $.ajax({
                        url: $(this).attr("action"),
                        type: "POST",
                        data: $(this).serialize(),
                        dataType: "json",
                        success: function(response) {
                            // Handle successful registration
							notyf.open({
								type: 'success',
								message: 'User registered successfully',
								duration: 2000,
								position: {
									y: 'top', // Corrected from y:top to y: 'top'
									x: 'right', // Corrected from x:right to x: 'right'
								},
							});

							setTimeout(function() {
								window.location.href = "/";
							}, 2000);
                        },
                        error: function(xhr) {
                            // Handle registration error
                            if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                                // const errors = xhr.responseJSON.errors;
                                // for (const key in errors) {
                                // 	notyf.open({
                                // 		type: 'error',
                                // 		message: errors[key][0],
                                // 		duration: 2000,
                                // 		position: {
                                // 			y: 'top', // Corrected from y:top to y: 'top'
                                // 			x: 'right', // Corrected from x:right to x: 'right'
                                // 		},
                                // 	}); // Display each validation error using notyf
                                // }
                                const errors = xhr.responseJSON.errors;
                                let errorMessage = '';
                                let i = 0;
                                for (const key in errors) {
                                    i++;
                                    errorMessage += i + ' ' + errors[key][0] +
                                    '<br>'; // Concatenate all error messages
                                }

                                notyf.open({
                                    type: 'error',
                                    message: errorMessage,
                                    duration: 2000,
                                    position: {
                                        y: 'top', // Corrected from y:top to y: 'top'
                                        x: 'right', // Corrected from x:right to x: 'right'
                                    },
                                });

                            } else {
								notyf.open({
                                    type: 'error',
                                    message: "An error occurred. Please try again later.",
                                    duration: 2000,
                                    position: {
                                        y: 'top', // Corrected from y:top to y: 'top'
                                        x: 'right', // Corrected from x:right to x: 'right'
                                    },
                                });
                            }
                        }
                    });
                });
            });
        </script>
        <!-- popup login -->


        <header id="header" class="glue">
            <div class="row clearfix">
                @if (Session::has('user'))
                    <div class="little-head">
                        <a href="{{ route('account.logout') }}" class="sign-btn tbutton small"><span>Sign
                                Out</span></a>
                        <div class="social social-head">
                            <b
                                style="font-size: 20px;color:white">{{ strtoupper(Session::get('user')->username) }}</b>
                            {{-- <img src="{{ Session::get('user')->image }}" alt="User Image"> --}}
                        </div><!-- end social -->
                    </div><!-- little head -->
                @else
                    <div class="little-head">
                        <div id="Login_PopUp_Link" class="sign-btn tbutton small"><span>Sign In</span></div>
                        <div class="social social-head">
                            <div id="Register_PopUp_Link" class="sign-btn tbutton small"><span>Sign Up</span></div>
                        </div><!-- end social -->

                        <div class="search">
                            <form action="https://codevz.com/html/remix/search.html" id="search" method="get">
                                <input id="inputhead" name="search" type="text"
                                    onfocus="if (this.value=='Start Searching...') this.value = '';"
                                    onblur="if (this.value=='') this.value = 'Start Searching...';"
                                    value="Start Searching..." placeholder="Start Searching ...">
                                <button type="submit"><i class="icon-search"></i></button>
                            </form><!-- end form -->
                        </div><!-- search -->
                    </div><!-- little head -->
                @endif

            </div><!-- row -->

            <div class="headdown">
                <div class="row clearfix">
                    <div class="logo bottomtip" title="Best and Most Popular Musics">
                        <a href="#" style="font-size: 30px;color: #FF0078">Sound.Web</a>
                    </div><!-- end logo -->
                    <nav>
                        <ul class="sf-menu">
                            <li class="current "><a href="{{url('/')}}">Home<span class="sub">start
                                here</span></a>
                            </li>
                            <li><a href="{{route('clientMedia.list',['mediaId'=>1])}}">MP3<span class="sub">full archive</span></a></li>
                            <li><a href="{{route('clientMedia.list',['mediaId'=>2])}}">Video<span class="sub">latest clips</span></a></li>
                            
                            <li><a href="#">Blog<span class="sub">Explore Us</span></a>
                                <ul>
                                    <li><a href="blog-right-sidebar.html">Contact Us</a></li>
                                    <li><a href="blog-left-sidebar.html">About Us</a></li>
                                </ul>
                            </li>
                        </ul><!-- end menu -->
                    </nav><!-- end nav -->
                </div><!-- row -->
            </div><!-- headdown -->
        </header><!-- end header -->

        @yield('content')

        <footer id="footer">
            <div class="footer-last">
                <div class="row clearfix">
                    <span class="copyright">© 2022 by <a href="https://codevz.com/">Codevz</a>. All Rights Reserved.
                        Powered by <a href="https://themeforest.net/user/codevz">Themeforest</a>.</span>
                    <div id="toTop"><i class="icon-angle-up"></i></div><!-- Back to top -->

                    <div class="foot-menu">
                        <ul>
                            <li><a href="index-2.html">Home</a></li>
                            <li><a href="mp3s.html">MP3</a></li>
                            <li><a href="videos.html">Video</a></li>
                            <li><a href="gallery.html">Photo Gallery</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul><!-- end links -->
                    </div><!-- end foot menu -->
                </div><!-- row -->
            </div><!-- end last -->

        </footer><!-- end footer -->

    </div><!-- end layout -->
    <!-- Scripts -->
    
    <script type="text/javascript" src="{{ url('/client/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/client/js/codevz.js') }}"></script>
    <script type="text/javascript" src="{{ url('/client/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/client/js/rs-plugin/js/jquery.themepunch.plugins.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/client/js/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/client/js/jquery.prettyPhoto.js') }}"></script>
    <script type="text/javascript" src="{{ url('/client/js/jquery.flexslider-min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/client/js/jquery.jplayer.js') }}"></script>
    <script type="text/javascript" src="{{ url('/client/js/ttw-music-player-min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/client/music/myplaylist.js') }}"></script>
    <script type="text/javascript" src="{{ url('/client/js/countdown.js') }}"></script>
    <script type="text/javascript" src="{{ url('/client/js/jquery.nicescroll.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/client/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    
    <script type="text/javascript">
        /* <![CDATA[ */
        jQuery(document).ready(function() {

            jQuery('.tp-banner').revolution({
                delay: 9000,
                startwidth: 1060,
                startheight: 610,
                hideThumbs: 10,
                navigationType: "off",
                fullWidth: "on",
                forceFullWidth: "on"
            });

            jQuery("#event1").countdown({
                    date: "31 December 2023 23:59:59",
                    format: "on"
                },
                function() {
                    // callback function
                });

        });
        /* ]]> */
    </script>
</body>

<!-- Mirrored from codevz.com/html/remix/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Aug 2023 19:28:04 GMT -->

</html>
