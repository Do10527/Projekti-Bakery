<?php
class contact
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "bakery";
    public $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
       
        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    public function contact_us($data)
    {
    
        $name=$data['name'];
        $email=$data['email'];
        $phone=$data['phone']; 
        $gender=$data['gender']; 
        $mssage=$data['message'];
        
        
        $sql = "INSERT INTO contact SET name='$name', email='$email', phone='$phone', gender='$gender', message='$message'";


      

    return $this->mysqli->query(sql);
    }
}
?>
