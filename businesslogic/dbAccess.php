<?php

class dbAccess {
    
//  local DB    
    const host = "localhost";
    const db = "etc";
    const user = "root";
    const password = "";
    
//  remote DB
//    const host = "mysqlsvr31.world4you.com";
//    const db = "oidawtfcomdb1";
//    const user = "oidawtfcom";
//    const password = "JDx0Z@M";
  
    public function __construct() {
    }
    
    private function displayError($connection) {
        echo mysql_errno($connection) . ": " . mysql_error($connection). "\n";
    }
    
    private function openConnection()
    {
         $connection = mysql_connect(self::host, self::user, self::password) or die("cannot connect");
         mysql_query("SET NAMES 'utf8'");

         if (mysqli_connect_errno($connection))
         {
             printf("Connect failed: %s\n", mysqli_connect_error());
             exit();
         }
         
         mysql_select_db(self::db) or die("cannot connect");
         
         return $connection;
    }
    
    private function closeConnection($buffer) {
        mysql_free_result($buffer);
        mysql_close();  
    }
    
    public function selectUsers()
    {
        $this->openConnection();

        $query = mysql_query("
            SELECT
                U.id,
                U.firstname,
                U.lastname,
                U.email,
                U.is_admin as isAdmin
            FROM user AS U
            ");
        
        $result = array();
        while ($row = mysql_fetch_assoc($query))
            $result[] = array(
                'id' => $row['id'],
                'firstname' => $row['firstname'],
                'lastname' => $row['lastname'],
                'username' => $row['email'],
                'isAdmin' => $row['isAdmin'],
            );
        
        $this->closeConnection($query);
        
        return $result;
    }
    
    public function getEvents($search)
    {
        $this->openConnection();

        $search = $this->format($search);
        
        if ($search == "")
            $query = mysql_query("select * from event");
        else
            $query = mysql_query("select * from event where name like '%".$search."%'");
        
        $result = array();
        while ($row = mysql_fetch_assoc($query))
        {
            $result[] = new event(
                    $row['id'],
                    $row['name'],
                    $row['date'],
                    $row['image'],
                    $row['description'],
                    $row['link'],
                    $row['type'],
                    $row['is_major'],
                    $row['price']
                    );
        }
        
        $this->closeConnection($query);
        
        return $result;
    }

    private function format($input)
    {
        // Commented out - SQLi is possible
//        $input = stripslashes($input);
//        $input = mysql_real_escape_string($input);
        return $input;
    }
    
    public function checkCredentials($email, $password) {
        $this->openConnection();

        $email = $this->format($email);
        $password = $this->format($password);
        
        $query = mysql_query("SELECT * FROM user WHERE email='$email' and password='$password'");

        $result = mysql_num_rows($query);
        if ($result)
        {
            $row = mysql_fetch_assoc($query);
            $this->isAdmin = $row['is_admin'];
        }
        
        $this->closeConnection($query);
        
        return $result;
    }
    
    public function isUserRegistered($email) {
        $this->openConnection();

        $email = $this->format($email);
        
        $query = mysql_query("SELECT * FROM user WHERE email='$email'");
        
        $result = mysql_num_rows($query);

        $this->closeConnection($query);
        
        if ($result > 0)
            return true;
        else
            return false;
    }
    
    public function isAdmin($email) {
        $this->openConnection();

        $email = $this->format($email);
        
        $query = mysql_query("SELECT * FROM user WHERE email='$email' AND is_admin=1");
        
        $result = mysql_num_rows($query);

        $this->closeConnection($query);
        
        if ($result > 0)
            return true;
        else
            return false;
    }
    
    public function Register($firstname, $lastname, $email, $password) {
        $this->openConnection();
        
        $firstname = $this->format($firstname);
        $lastname = $this->format($lastname);
        $email = $this->format($email);
        $password = $this->format($password);
        
        mysql_query("INSERT INTO user (firstname, lastname, password, email) VALUES ('".$firstname."','".$lastname."','".$password."','".$email."')");
        
        mysql_close();
    }
    
    public function CreateEvent($title, $date, $image, $description, $link, $type, $ismajor, $price) {
        $this->openConnection();
        
        $title = $this->format($title);
        $date = $this->format($date);
        $image = $this->format($image);
        $description = $this->format($description);
        $link = $this->format($link);
        $type = $this->format($type);
        $ismajor = $this->format($ismajor);
        $price = $this->format($price);
        
        mysql_query("INSERT INTO event (name, date, image, description, link, type, is_major, price) VALUES ('".$title."','".$date."','".$image."','".$description."','".$link."','".$type."','".$ismajor."','".$price."')");
        
        mysql_close();
    }
    
    public function UpdateEvent($id, $title, $date, $image, $description, $link, $type, $ismajor, $price) {
        $this->openConnection();
        
        $id = $this->format($id);
        $title = $this->format($title);
        $date = $this->format($date);
        $image = $this->format($image);
        $description = $this->format($description);
        $link = $this->format($link);
        $type = $this->format($type);
        $ismajor = $this->format($ismajor);
        $price = $this->format($price);
        
        mysql_query("
            UPDATE event
                SET
                    name = '".$title."',
                    date = '".$date."',
                    image = '".$image."',
                    description = '".$description."',
                    link = '".$link."',
                    type = '".$type."',
                    is_major = '".$ismajor."',
                    price = '".$price."'
                WHERE id = '".$id."'
            ");
        
        mysql_close();
    }
    
    public function DeleteEvent($id) {
        $this->openConnection();
        
        $id = $this->format($id);
        
        mysql_query("DELETE FROM event WHERE id = ".$id);
        
        mysql_close();
    }
    
    public function updateSeat($userId, $seatId, $status) {
        $this->openConnection();

        if ($status == "free")
            $sql = "
                INSERT INTO booking (
                    FK_user,
                    seat_id
                    )
                VALUES (
                    '".$userId."',
                    '".$seatId."'
                        )
                ";
        else
            $sql = "
                DELETE
                FROM booking
                WHERE FK_user = '".$userId."' AND seat_id = '".$seatId."'
            ";
        
        mysql_query($sql);
        
        mysql_close();
    }
    
    public function selectSeats() {
        $this->openConnection();

        $query = mysql_query("
            SELECT
                id,
                FK_user AS userId,
                seat_id AS seatId
            FROM booking
            ");
        
        $result = array();
        while ($row = mysql_fetch_assoc($query))
            $result[$row['seatId']] = $row['userId'];
        
        $this->closeConnection($query);
        
        return $result;
    }
    
    public function deleteSeats($id) {
        $this->openConnection();
        
        mysql_query("DELETE FROM booking WHERE FK_user = ".$id);
        
        mysql_close();
    }
}

?>
