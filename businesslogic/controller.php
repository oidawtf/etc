<?php

class controller {
    
    private static $menu;
    private static $menuAuthorized;
    private static $news;
    
    private static $dataService;
    private static $xmlService;
    
    const sessionIDName = 'etc_session';
    const sessionIDUser = "username";
    const sessionIDIsAdmin = "isAdmin";
    const sessionIDEvents = 'eventIds';
    const sessionIDCount = 'eventCount';
    
    public static function getMenu() {
         if (empty(controller::$menu)) {
            controller::$menu = array(
                new menu("Home", $_SERVER["PHP_SELF"], "", "", "", "images/logo.png"),
                menu::getSeparator(),
                new menu("Login", "login.php"),
                new menu("Register", "register.php"),
                menu::getSeparator(),
                new menu("Info", "", "", "", "", "", array(
                    new menu("Contact", "contact.php"),
                    new menu("Terms and Conditions", "terms.php"),
                    new menu("About", "about.php")
                ))
            );
        }
         
        return controller::$menu;
    }
    
        public static function getMenuAuthorized() {
         if (empty(controller::$menuAuthorized)) {
            controller::$menuAuthorized = array(
                new menu("Home - ".controller::getUsername(), $_SERVER["PHP_SELF"], "", "", "", "images/logo.png"),
                new textmenu("search", "Search...", "btn-search", "schedule.php"),
                menu::getSeparator(),
                new menu("Schedule", "schedule.php"),
                new menu("Shopping Cart", "cart.php", "", "GET", "icon-cart"),
                new menu("Logout", "logout", $_SERVER["PHP_SELF"], "POST"),
                menu::getSeparator(),
                new menu("Info", "", "", "", "", "", array(
                    new menu("Contact", "contact.php"),
                    new menu("Terms and Conditions", "terms.php"),
                    new menu("About", "about.php")
                ))
            );
        }
         
        return controller::$menuAuthorized;
    }

    public static function getNews() {
         if (empty(controller::$news)) {
            controller::$news = array(
                0 => new news(
                        "Christoph Waltz",
                        "http://upload.wikimedia.org/wikipedia/commons/thumb/1/11/ChristophWaltz82AAMar10.jpg/220px-ChristophWaltz82AAMar10.jpg",
                        "http://en.wikipedia.org/wiki/Christoph_Waltz",
                        "Christoph Waltz (German pronunciation: [ˈkrɪstɔf ˈvalts]; born 4 October 1956) is a two-time Academy Award-winning Austrian-German actor."
                        ),
                1 => new news(
                        "Academy Awards 2013",
                        "http://a.oscar.go.com/service/image/index/id/606c01b4-1a19-429d-ac07-b24453667518/dim/830x350.jpg",
                        "http://oscar.go.com/",
                        "Lorem ipsum dolor sit amet consectetuer dolor amet"
                        )
                );
         }
         
        return controller::$news;
    }
    
    public static function getEvents($search) {
        return controller::getDataService()->getEvents($search);
    }
    
    public static function getEvent($id) {
        foreach (controller::getEvents("") as $event)
            if ($event->getId() == $id)
                return $event;
    }
    
    private static function getDataService() {
        if (empty(controller::$dataService)) {
            controller::$dataService = new dbAccess();
        }
         
        return controller::$dataService;
    }
    
    private static function getXmlService() {
        if (empty(controller::$xmlService)) {
            controller::$xmlService = new xmlAccess();
        }
         
        return controller::$xmlService;
    }
    
    public static function isLoginValid($email, $password) {
        return controller::getDataService()->checkCredentials($email, $password);
    }
    
    public static function Login($username) {
        @session_start();
        $_SESSION[self::sessionIDName] = 1;
        $_SESSION[self::sessionIDUser] = $username;
        $_SESSION[self::sessionIDIsAdmin] = controller::getDataService()->isAdmin($username);
    }
    
    public static function Logout() {
        @session_start();
        session_unset();
        $_SESSION = array();
        session_destroy();
    }
    
    public static function isLoggedIn() {
        @session_start();
        return isset($_SESSION[controller::getSessionName()]);
    }
    
    public static function getSessionName() {
        return self::sessionIDName;
    }
    
    public static function getUsername() {
        @session_start();
        if (isset($_SESSION[self::sessionIDUser]))
            return $_SESSION[self::sessionIDUser];
    }
    
    public static function isAdmin() {
        @session_start();
        if (isset($_SESSION[self::sessionIDIsAdmin]))
            return $_SESSION[self::sessionIDIsAdmin];
        
        return false;
    }
    
    public static function checkAuthentication() {
        if(!controller::isLoggedIn())
        {
            echo
            "
                <h1>Forbidden</h1>
                <p>You don't have permission to access / on this server.</p>
            ";
            die();
        }
    }
    
    public static function Register($firstname, $lastname, $email, $password) {
         controller::getDataService()->Register($firstname, $lastname, $email, $password); 
    }
    
    public static function IsRegistered($email) {
        return controller::getDataService()->isUserRegistered($email);
    }
    
    public static function AddtoCart($id, $count) {
        if (!isset($_SESSION[self::sessionIDEvents])) {
            $_SESSION[self::sessionIDEvents] = array();
        }
        
        if (array_key_exists($id, $_SESSION[self::sessionIDEvents])) {
            $_SESSION[self::sessionIDEvents][$id] += $count;
        }
        else {
            $_SESSION[self::sessionIDEvents][$id] = $count;
        }    
    }
    
    public static function CreateEvent() {
        $title = $_POST['title'];
        $date = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $_POST['date'])));
        $extension = explode("/", $_FILES['image']['type']);
        $image = "images/events/".uniqid().".".$extension[1];
        $description = $_POST['description'];
        $link = $_POST['link'];
        if ($_POST['type'] == 'event')
            $type = 'event';
        if ($_POST['type'] == 'theater')
            $type = 'theater';
        if ($_POST['type'] == 'cinema')
            $type = 'cinema';
        $ismajor = false;
        if (isset($_POST['ismajor']))
            $ismajor = true;
        $price = $_POST['price'];
        
        move_uploaded_file($_FILES['image']['tmp_name'], $image);

        controller::getDataService()->CreateEvent(
                $title,
                $date,
                $image,
                $description,
                $link,
                $type,
                $ismajor,
                $price
                );
    }
    
    public static function EditEvent() {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $date = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $_POST['date'])));
        $extension = explode("/", $_FILES['image']['type']);
        $image = "images/events/".uniqid().".".$extension[1];
        $description = $_POST['description'];
        $link = $_POST['link'];
        if ($_POST['type'] == 'event')
            $type = 'event';
        if ($_POST['type'] == 'theater')
            $type = 'theater';
        if ($_POST['type'] == 'cinema')
            $type = 'cinema';
        $ismajor = false;
        if (isset($_POST['ismajor']))
            $ismajor = true;
        $price = $_POST['price'];
        
        move_uploaded_file($_FILES['image']['tmp_name'], $image);

        controller::getDataService()->UpdateEvent(
                $id,
                $title,
                $date,
                $image,
                $description,
                $link,
                $type,
                $ismajor,
                $price
                );
    }
    
    public static function DeleteEvent($id) {
        controller::getDataService()->DeleteEvent($id);
    }
    
    public static function GetSeats() {
        return controller::getXmlService ()->ReadSeats();
    }
}

?>
