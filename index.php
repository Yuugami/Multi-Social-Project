<!DOCTYPE html>
<html>

<head>
    <title>Web Dev Project</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
  <script src="../../assets/js/html5shiv.js"></script>
  <script src="../../assets/js/respond.min.js"></script>
  <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <!-- RSS Feeds -->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <!-- Other Scripts -->
    <script type='text/javascript' src='js/main.js'></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>

<body>
    <div id="darken"></div>
    <div class="header">
        <i class="fa fa-bars fa-3x"></i>
        <div class="menuPanel">
            <ul style="padding-left: 0px">
                <li><a href="login.php">Login</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Support</a></li>
            </ul>
        </div>
    </div>
    <div class="home">
        <div class="container-fluid">
            <div class="corebody">
                <!-- Design of the main portion of the body of the site. -->
                <div class="cabinethover">
                    <ul>
                        <li><i class="fa fa-arrow-left fa-4x"></i></li>
                        <li><i class="fa fa-arrow-left fa-4x"></i></li>
                        <li><i class="fa fa-arrow-left fa-4x"></i></li>
                    </ul>
                </div>
                <!-- So these are where the social site blocks are. 
      You can pick them up and replace the current blocks-->
                <div id="cabinet">
                    <p> Social Blocks </p>
                    <div class="miniblocks" id="pinterest">
                        <p>Pinterest</p>
                    </div>
                    <div class="miniblocks" id="tumblr">
                        <p>Tumblr</p>
                    </div>
                    <div class="miniblocks" id="reddit">
                        <p>Reddit</p>
                    </div>
                    <div class="miniblocks" id="google">
                        <p>Google+</p>
                    </div>
                    <div class="miniblocks" id="linkedin">
                        <p>LinkedIn</p>
                    </div>
                    <div class="miniblocks" id="flickr">
                        <p>Flickr</p>
                    </div>
                    <div class="miniblocks" id="deviantart">
                        <p>DeviantArt</p>
                    </div>
                    <div class="miniblocks" id="stumbleupon">
                        <p>StumbleUpon</p>
                    </div>
                    <div class="miniblocks" id="soundcloud">
                        <p>SoundCloud</p>
                    </div>
                    <div id="instructions">
                        <p>Drag social blocks out of the cabinet to replace the sections!</p>
                    </div>
                </div>
                <!-- -->
                <!-- Forefront -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="blocks" id="facebook">
                            <p>Facebook</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="blocks" id="twitter">
                                    <p>Twitter</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="blocks" id="instagram">
                                    <p>Instagram</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="blocks" id="extrafeed">
                            <script>
                                startGoogleFeeds();
                            </script>
                            <p>Other Stuff/Feed/RSS</p>
                        </div>
                    </div>
                </div>
                <!-- End of the design -->
            </div>
        </div>
    </div>
    <!--<div class="footer">
    <div class="horibar"></div>
    <p class="copyright">Copyright © 2015 Windjy Jean, Steven Avery. All rights reserved.</p>
</div>-->
</body>

</html>