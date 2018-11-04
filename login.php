<!DOCTYPE html>
<html>
<head>
    <title>Web Dev Project</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/loginRegister.js"></script>
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
    <!-- Latest compiled and minified JavaScript -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="darken"></div>
<div class="header">
  <i class="fa fa-bars fa-3x"></i>
  <div class="menuPanel">
    <ul style="padding-left: 0px">
      <li><a href="login.php">Login</a></li>
      <li>About</li>
      <li>Support</li>
    </ul>
  </div>
</div>
<div class="container-fluid">
    <div id="loginContainer">
        <div id="login">
            <form action="verifyLogin.php" method="post">
                <fieldset>
                    <h3>Login</h3>
                    <p>Enter login credentials below</p>
                    <input class="inputField" type="text" name="username"
                    maxlength="30" required="required" placeholder="Username"/>
                    <input class="inputField" type="password" name="password"
                    minlength="6" required="required" placeholder="Password" type="password"/>
                    <div class="rememberUser">
                        <input type="checkbox" name="remeberUser" id="remeberUser">
                        <label for="remeberUser">Remember me</label>
                    </div>
                    <input class="submitButton" type="submit" value="Submit" />
                </fieldset>
            </form>
        </div>
        <div id="registerSnippet">
            <p>Don't have an account?</p>
            <button id="registerSnippetButton" Onclick="window.location.href='./register.php'">Register</button>
        </div>
        <!-- so that the footer doesn't creep up -->
        <div style="clear: both;"></div>
    </div>
</div>

<!--<div class="footer">
    <div class="horibar"></div>
    <p class="copyright">Copyright © 2015 Windjy Jean, Steven Avery. All rights reserved.</p>
</div>-->   
</body>
</html>