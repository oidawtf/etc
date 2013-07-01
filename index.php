<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta content="Events, Theater, Cinema" name="description">
        <meta content="Max Hotko, Ermin Cubikcic, Astrid Meissner, Lara Mae Quidet" name="author">
        <meta content="Events, Theater, Cinema" name="keywords">
        
        <link rel="stylesheet" href="css/modern.css">
        <link rel="stylesheet" href="css/modern-responsive.css">
        <link type="text/css" rel="stylesheet" href="css/site.css">
        <link type="text/css" rel="stylesheet" href="js/google-code-prettify/prettify.css">
        
        <script src="js/assets/jquery-1.9.0.min.js" type="text/javascript"></script>
        <script src="js/assets/jquery.mousewheel.min.js" type="text/javascript"></script>
        <script src="js/assets/moment.js" type="text/javascript"></script>
        <script src="js/assets/moment_langs.js" type="text/javascript"></script>
        <script src="js/modern/dropdown.js" type="text/javascript"></script>
        <script src="js/modern/accordion.js" type="text/javascript"></script>
        <script src="js/modern/buttonset.js" type="text/javascript"></script>
        <script src="js/modern/carousel.js" type="text/javascript"></script>
        <script src="js/modern/input-control.js" type="text/javascript"></script>
        <script src="js/modern/pagecontrol.js" type="text/javascript"></script>
        <script src="js/modern/rating.js" type="text/javascript"></script>
        <script src="js/modern/slider.js" type="text/javascript"></script>
        <script src="js/modern/tile-slider.js" type="text/javascript"></script>
        <script src="js/modern/tile-drag.js" type="text/javascript"></script>
        <script src="js/modern/calendar.js" type="text/javascript"></script>
        <script src="js/ajax.js" type="text/javascript"></script>
        
        <script type="text/javascript">
        
        function changeState(eventId, id, status) {
            var xmlhttp = getXmlHttpRequest();
            var url = "ui/changeState.php";
            var params = "id=" + id + "&status=" + status;

            xmlhttp.open("POST", url, true);

            xmlhttp.onreadystatechange = function()
            {
                if (xmlhttp.readyState===4 && xmlhttp.status===200) {
                    OnSeatsLoad(eventId);
                }
            };

            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.setRequestHeader("Content-length", params.length);
            xmlhttp.setRequestHeader("Connection", "close");

            xmlhttp.send(params);
        }
    
        </script>
        
        <title>ETC - Events. Theater. Cinema.</title>

    </head>
    
    <?php
    include_once "includes.php";
    
    // Login clicked
    if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password']))
        if (controller::isLoginValid($_POST['email'], $_POST['password']))
            controller::Login($_POST['email']);
    
    // Logout clicked
    if (isset($_POST['content']) && $_POST['content'] == 'logout')
        controller::Logout();

    // Register clicked
    if (
            isset($_POST['register']) && 
            isset($_POST['firstname']) && 
            isset($_POST['lastname']) && 
            isset($_POST['email']) && 
            isset($_POST['password']) && 
            isset($_POST['retypedpassword'])
            ) {
        
        if ($_POST['password'] != $_POST['retypedpassword']) {
            echo "The passwords do not match. Please try again.";
            die;
        }
        
        if (controller::IsRegistered($_POST['email'])) {
            echo "Sorry. This email is already taken. Try another one.";
            die;
        }
            
        controller::Register(
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['email'],
                $_POST['password']
                );
        
        controller::Login($_POST['email']);
        
        }
        
    // Create new event clicked
    if (
            isset($_POST['createevent'])
            )
        controller::CreateEvent();
    
    // Edit event clicked
    if (
            isset($_POST['editevent'])
            )
        controller::EditEvent();
    
    // Delete clicked
    if (
            controller::isAdmin() &&
            isset($_POST['delete']) &&
            isset($_POST['id'])
            ) {
        if ($_POST['delete'] == 'event') {
            controller::DeleteEvent($_POST['id']);
        }
        // Include other deletes here as well
    }
    ?>

    <body class="metrouicss">
        
        <div class="page">
            <div id="menu">
                <?php
                include "ui/menu.php";
                ?>
            </div>
        </div>
        
        <div id="page-index" class="page">
            <div class="page-region">
                <div class="page-region-content">
                    <div id="content">
                        <?php

                        if (isset($_GET['content'])) {
                            switch ($_GET['content']) {
                                case 'login.php':
                                case 'register.php':
                                case 'schedule.php':
                                case 'cart.php':
                                case 'contact.php':
                                case 'terms.php':
                                case 'about.php':
                                    @include 'ui/'.$_GET['content'];
                                    break;
                                case 'editevent':
                                    @include 'ui/editevent.php';
                                    break;
                                case 'createevent':
                                    @include 'ui/createevent.php';
                                    break;
                                case 'cart':
                                    if (isset($_GET['id']) && isset($_GET['count']) && $_GET['count'] > 0)  {
                                        controller::AddtoCart($_GET['id'], $_GET['count']);
                                    }
                                    @include 'ui/'.$_GET['content'].'.php';
                                    break;
                                case 'eventdetails':
                                    @include 'ui/'.$_GET['content'].'.php';
                                    break;
                                
                                default:
                                    echo $_GET['content']." - 404 - Not found! =(";
                                    break;
                            }
                        }
                        elseif(controller::isLoggedIn()) {
                            include 'ui/home.php';
                        }
                        else {
                            include 'ui/login.php';
                        }
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="page">
            <div class="nav-bar">
                <div class="nav-bar-inner padding10">
                    <span class="element">
                        <div id="info">
                            <?php
                            include "ui/info.php";
                            ?>
                        </div>
                    </span>
                </div>
            </div>
        </div>     
    </body>
</html>
