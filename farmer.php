<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Go On an Adventure in Rome">
    <meta name="author" content="Zach Panzarino">
    <title>Roman Adventure</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stylish-portfolio.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="img/icon.png">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="/"  onclick = $("#menu-close").click(); >Roman Adventure</a>
            </li>
            <li>
                <a href="/" onclick = $("#menu-close").click(); >Home</a>
            </li>
            <li>
                <a href="start.php" onclick = $("#menu-close").click(); >Restart</a>
            </li>
        </ul>
    </nav>
    <header id="top" class="header" style="background: url(img/farmer.jpg) no-repeat center center scroll;-webkit-background-size: cover;-moz-background-size: cover;background-size: cover;-o-background-size: cover;">
        <div class="text-vertical-center">
            <img src="img/hoe.png" height="100px" width="100px"><br>
            <?php
            $name = $_GET['name'];
            $past = $_GET['past'];
            if ($past==="none"){
                echo "<p style='font-size:20px'><mark>You have became a young farmer working for your father, one of the largest farmers in the area.<br>He has allocated a small part of his farm for you to grow crops on until you can afford to buy your own land.<br>You have been given 3 slaves to help tend your land.<br>He has also given you some animals.</mark></p><br><br>";
            }
            if ($past==="merchant"){
                echo "<p style='font-size:20px'><mark>With your profits from sailing you were able to buy a small farm</mark></p>";
            }
            echo "<h3><mark>Your first task is to choose what crop to grow.</mark><h3>";
            echo '<input type="hidden" name="name" id="name" value="'.$name.'">';
            echo '<form class="form-inline" action="wheat.php" method="get">';
            echo '<input type="hidden" name="name" value="'.$name.'">';
            echo '<button type="submit" class="btn btn-default">Wheat</button></form><br>';
            echo '<form class="form-inline" action="grapes.php" method="get">';
            echo '<input type="hidden" name="name" value="'.$name.'">';
            echo '<button type="submit" class="btn btn-default">Grapes</button></form><br>';
            echo '<form class="form-inline" action="gourds.php" method="get">';
            echo '<input type="hidden" name="name" value="'.$name.'">';
            echo '<button type="submit" class="btn btn-default">Gourds</button></form><br>';
            ?>
            <br>
        </div>
    </header>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>
</body>
</html>