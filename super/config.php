<?php
    class task
    {
    
        protected $Host     = "localhost"; // Hostname of our MySQL server.
        protected $Database = "clients"; // bigobuddy Logical database name on that server.
        protected $User     = "root"; // bigobuddy User and Password for login.
        protected $Password = ""; 
            

        public $con=0;  // Result of mysql_connect().
        public $clientCon=0;  // Result of mysql_connect().
        protected $Query_ID = 0;  // Result of most recent mysql_query().
        protected $Row;// current row number.
        public $Record;
        public $ROOT_URL="http://localhost/bigobuddy/";

        public function __construct()
        {
            $this->connect();
        }

        public function connect()
        {
            $this->con=mysqli_connect("$this->Host", "$this->User", "$this->Password", "$this->Database");
        }

        public function query($Query_String)
        {
            if ($this->Query_ID = mysqli_query($this->con, $Query_String)) {
                return $this->Query_ID;
            } else {
                return false;
            }
        }

        public function nextRecord()
        {
            $this->Record = mysqli_fetch_assoc($this->Query_ID);
            $this->Row += 1;
            $stat = is_array($this->Record);
            if (!$stat) {
                mysqli_free_result($this->Query_ID);
                $this->Query_ID = 0;
            }
            return $stat;
        }

        public function createClient(){
            $c_name = addslashes($_POST['c_name']);
            $c_email = addslashes($_POST['c_email']);
            $c_address = addslashes($_POST['c_address']);
            $c_number = addslashes($_POST['c_number']);
            $city = addslashes($_POST['city']);
            $state = addslashes($_POST['state']);
            $pincode = addslashes($_POST['pincode']);
            $e_name = addslashes($_POST['e_name']);
            $e_email = addslashes($_POST['e_email']);
            $e_address = addslashes($_POST['e_address']);
            $desg = addslashes($_POST['desg']);
            $e_number = addslashes($_POST['e_number']);
            $c_username = addslashes($_POST['c_username']);
            $e_username = addslashes($_POST['e_username']);
            $e_pass = addslashes($_POST['e_pass']);
            $query="INSERT INTO `admin`(`e_name`, `e_email`, `e_number`, `e_pass`, `c_name`, `designation`, `c_contact`, `c_address`, `c_email`, `c_username`, `e_username`, `city`, `pincode`, `state`, `user_registered_on`) VALUES ('$e_name', '$e_email', '$e_number','$e_pass', '$c_name', '$desg', '$c_number', '$c_address', '$c_email', '$c_username', '$e_username', '$city', '$pincode', '$state', NOW())";
            if(mysqli_query($this->con, $query)){
                return true;
            }
            else{
                return false;
            }
        }

        public function editClient($id){
            $c_name = addslashes($_POST['c_name']);
            $c_email = addslashes($_POST['c_email']);
            $c_address = addslashes($_POST['c_address']);
            $c_number = addslashes($_POST['c_phone']);
            $city = addslashes($_POST['city']);
            $state = addslashes($_POST['state']);
            $pincode = addslashes($_POST['pincode']);
            $e_name = addslashes($_POST['e_name']);
            $e_address = addslashes($_POST['e_address']);
            $e_email = addslashes($_POST['e_email']);
            $desg = addslashes($_POST['desg']);
            $e_number = addslashes($_POST['e_number']);
            $c_username = addslashes($_POST['c_username']);
            $e_username = addslashes($_POST['e_username']);
            $e_pass = addslashes($_POST['e_pass']);

            $db_host = addslashes($_POST['db_host']);
            $db_name = addslashes($_POST['db_name']);
            $db_user = addslashes($_POST['db_user']);
            $db_pass = addslashes($_POST['db_pass']);

            $query="UPDATE `admin` SET `e_name`='$e_name', `e_email`='$e_email', `e_number`='$e_number', `c_name`='$c_name', `designation`='$desg', `c_contact`='$c_number', `c_address`='$c_address', `c_email`='$c_email', `c_username`='$c_username', `e_username`='$e_username', `e_address`='$e_address', `city`='$city', `pincode`='$pincode', `state`='$state', `db_ip`='$db_host', `db_name`='$db_name', `db_user`='$db_user', `db_pass`='$db_pass' WHERE `id`='$id'";


            if($this->checkDb($db_host, $db_name, $db_user, $db_pass)){
                
                $this->connect();
                if(mysqli_query($this->con, $query)){
	                $this->connectDb($db_host, $db_name, $db_user, $db_pass);
	                ;
	                if($sqlfile=file_get_contents('bigobuddy.sql')) {
                      $var_array = explode(';',$sqlfile);
                      foreach($var_array as $value) {
                        mysqli_query($this->clientCon, $value.';');
                      }
                    die(var_dump($this->addAdmin()));

                    
                    }else{
                        die(var_dump(mysqli_error($this->clientCon)));
                    }
                }
                /*$directoryName = "../admin/$c_username";
				if(!is_dir($directoryName)){
                    if(mkdir($directoryName, 0755, true)){
                        $sql=file_get_contents('bigobuddy.sql');
                        if(mysqli_query($this->con,$sql)){
                            //echo "Shivji";
                            $createfile = fopen($directoryName.'/'.'db.php', 'x');
                        }
                    }else{
                        die('Failed to create folders...');
                    }
                }*/
            }
            else{
                $error="DB not found";
                die();
            }
        }

        public function addAdmin()
        {
            $username = addslashes($_POST["e_username"]);
            $password = addslashes($_POST["e_pass"]);
            $name = addslashes($_POST["e_name"]);
            $phone = addslashes($_POST["e_number"]);
            $address = addslashes($_POST["e_address"]);
            $emailid = addslashes($_POST["e_email"]);
            $ir = "0";
            if (isset($_POST["insert"])) {
                $ir = "1";
            }
            $er = "0";
            if (isset($_POST["edit"])) {
                $er = "1";
            }
            $dr = "0";
            if (isset($_POST["delete"])) {
                $dr = "1";
            }
            $vr = "0";
            if (isset($_POST["view"])) {
                $vr = "1";
            }

            $snap="admins/default.jpg";

            $query="INSERT INTO `user_login`(`username`, `password`, `type`,`created_at`) VALUES ('$username','$password','admin',NOW())";
            if (mysqli_query($this->clientCon, $query)) {
                $login=mysqli_insert_id($this->clientCon);
                $query2 = "INSERT INTO `admins`(`login_id`, `email`, `name`, `address`, `phone`, `snap`) VALUES ('$login','$emailid','$name','$address','$phone','$snap')";
                if(mysqli_query($this->clientCon,$query2)){
                    /*$ad_id=mysqli_insert_id($this->con);*/
                    $query3="INSERT INTO `rights`(`emp_id`, `ir`, `vr`, `ur`, `dr`) VALUES ('$login','$ir','$vr','$er','$dr')";
                    if(mysqli_query($this->clientCon,$query3)){
                        return 1;
                    }
                }
            }  
        }

        public function connectDb($db_host, $db_name, $db_user, $db_pass){
        	mysqli_close($this->con);
        	$this->clientCon=mysqli_connect($db_host, $db_user, $db_pass, $db_name);
        }

        public function checkDb($db_host, $db_name, $db_user, $db_pass){
            $checkDb=mysqli_connect($db_host, $db_user, $db_pass, $db_name);
            if($checkDb){
                mysqli_close($checkDb);
                return true;
            }else{
                return false;
            }
        }
        public function doLogin()
        {
           
            $name = $_POST['username'];
            $password = $_POST['password'];
        
            $sql = "SELECT * FROM super_admin WHERE username = '$name' AND password = '$password' ";
            $result = $this->query($sql);
            
            $result2=mysqli_num_rows($result);
            if ($result2) {
                $row = mysqli_fetch_assoc($result);
                session_start();
                $id=$row['id'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $name;
                header("location:home.php");
            } else {
                header('location:index.php?p=1');
            }
        
            return $errorMessage;
        }

        public function doClientLogin(){
            $username = $_POST['username'];
            $sql = "SELECT * FROM admin WHERE c_username = '$username'";
            $result = $this->query($sql);
            
            $result2=mysqli_num_rows($result);
            if ($result2) {
                $row = mysqli_fetch_assoc($result);
                session_start();
                header("location:admin/index.php?username=$username");
            } else {
                header('location:index.php?p=1');
            }
        } 

        public function checkUser()
        {
            // if the session id is not set, redirect to login page
            if (!isset($_SESSION['id'])) {
                header('Location:index.php');
            }
        } 
    }
?>