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
    <header id="top" class="header" style="background: url(img/legion.jpg) no-repeat center center scroll;-webkit-background-size: cover;-moz-background-size: cover;background-size: cover;-o-background-size: cover;">
        <div class="text-vertical-center">
            <img src="img/sword.png" height="100px" width="100px"><br><br>
            <?php
            $name = $_GET['name'];
            $battles = $_GET['battles'];
            if ($battles===""){
                $battles=0;
            }
            else{
                $battles = intval($battles);
            }
            $battles++;
            $options = rand(1,5);
            if ($options===1){
                echo "<p style='font-size:20px'><mark>You were killed in battle.<br>You served an honorable career in the military, and the Roman Empire is thankful for your service.</mark></p>";
                echo '<form class="form-inline" action="dead.php" method="get">';
                echo '<input type="hidden" name="name" value="'.$name.'">';
                echo '<input type="hidden" name="job" value="deadsoldier">';
                echo '<button type="submit" class="btn btn-default">Continue</button></form>';
            }
            elseif ($options===2){
                echo "<p style='font-size:20px'><mark>You win the battle easily, and you don't need to make any important decisions.</mark></p>";
                echo '<form class="form-inline" action="battle.php" method="get">';
                echo '<input type="hidden" name="name" value="'.$name.'">';
                echo '<input type="hidden" name="battles" value="'.$battles.'">';
                echo '<button type="submit" class="btn btn-default">Continue</button></form>';
            }
            elseif ($options===3){
                echo "<p style='font-size:20px'><mark>The enemy has much more troops than what you expected.<br>You have to choose what to do with your men.</mark></p>";
                echo '<form class="form-inline" action="retreat.php" method="get">';
                echo '<input type="hidden" name="name" value="'.$name.'">';
                echo '<input type="hidden" name="battles" value="'.$battles.'">';
                echo '<button type="submit" class="btn btn-default">Retreat</button></form><br>';
                echo '<form class="form-inline" action="push.php" method="get">';
                echo '<input type="hidden" name="name" value="'.$name.'">';
                echo '<input type="hidden" name="battles" value="'.$battles.'">';
                echo '<input type="hidden" name="odds" value="low">';
                echo '<button type="submit" class="btn btn-default">Push Forward</button></form>';
            }
            elseif ($options===4){
                echo "<p style='font-size:20px'><mark>You are winning the battle at this point, but the tides could turn.<br>You have to choose what to do with your men.</mark></p>";
                echo '<form class="form-inline" action="retreat.php" method="get">';
                echo '<input type="hidden" name="name" value="'.$name.'">';
                echo '<input type="hidden" name="battles" value="'.$battles.'">';
                echo '<button type="submit" class="btn btn-default">Retreat</button></form><br>';
                echo '<form class="form-inline" action="push.php" method="get">';
                echo '<input type="hidden" name="name" value="'.$name.'">';
                echo '<input type="hidden" name="battles" value="'.$battles.'">';
                echo '<input type="hidden" name="odds" value="high">';
                echo '<button type="submit" class="btn btn-default">Push Forward</button></form>';
            }
            else{
                echo "<p style='font-size:20px'><mark>The enemy flanks from behind. There is no way to retreat. You have to choose what side you want to lead your troops to.</mark></p>";
                echo '<form class="form-inline" action="push.php" method="get">';
                echo '<input type="hidden" name="name" value="'.$name.'">';
                echo '<input type="hidden" name="battles" value="'.$battles.'">';
                echo '<button type="submit" class="btn btn-default">Left</button></form><br>';
                echo '<form class="form-inline" action="push.php" method="get">';
                echo '<input type="hidden" name="name" value="'.$name.'">';
                echo '<input type="hidden" name="battles" value="'.$battles.'">';
                echo '<input type="hidden" name="odds" value="high">';
                echo '<button type="submit" class="btn btn-default">Right</button></form>';
            }
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