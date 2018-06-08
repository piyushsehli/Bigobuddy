<?php
	class task
	{
    
	    protected $Host     = "localhost"; // Hostname of our MySQL server.
	    protected $Database = "clients"; // bigobuddy Logical database name on that server.
	    protected $User     = "root"; // bigobuddy User and Password for login.
	    protected $Password = ""; 
	    	

	    public $con=0;  // Result of mysql_connect().
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
	        $desg = addslashes($_POST['desg']);
	        $e_number = addslashes($_POST['e_number']);
	        $c_username = addslashes($_POST['c_username']);
	        $e_username = addslashes($_POST['e_username']);
	        $e_pass = addslashes($_POST['e_pass']);
	        
	        if($this->checkClientUsername($c_username)==='user_exists'){
	        	echo "<script>alert('Username already exists');</script>";
	        	return false;
	        }

	        $query="INSERT INTO `admin`(`e_name`, `e_email`, `e_number`, `e_pass`, `c_name`, `designation`, `c_contact`, `c_address`, `c_email`, `c_username`, `e_username`, `city`, `pincode`, `state`, `user_registered_on`) VALUES ('$e_name', '$e_email', '$e_number','$e_pass', '$c_name', '$desg', '$c_number', '$c_address', '$c_email', '$c_username', '$e_username', '$city', '$pincode', '$state', NOW())";
	        if(mysqli_query($this->con, $query)){
	            return true;
	        }
	        else{
	            return false;
	        }
    	}

    	public function checkClientUsername($username){
    		$query="select * from admin where c_username='$username'";
    		$res=mysqli_query($this->con, $query);
    		$num=mysqli_num_rows($res);
    		if($num>0){
    			return 'user_exists';
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
	        $e_email = addslashes($_POST['e_email']);
	        $desg = addslashes($_POST['desg']);
	        $e_number = addslashes($_POST['e_number']);
	        $c_username = addslashes($_POST['c_username']);
	        $e_username = addslashes($_POST['e_username']);

	        $db_host = addslashes($_POST['db_host']);
	        $db_name = addslashes($_POST['db_name']);
	        $db_user = addslashes($_POST['db_user']);
	        $db_pass = addslashes($_POST['db_pass']);

	        $query="UPDATE `admin` SET `e_name`='$e_name', `e_email`='$e_email', `e_number`='$e_number', `c_name`='$c_name', `designation`='$desg', `c_contact`='$c_number', `c_address`='$c_address', `c_email`='$c_email', `c_username`='$c_username', `e_username`='$e_username', `city`='$city', `pincode`='$pincode', `state`='$state', `db_ip`='$db_host', `db_name`='$db_name', `db_user`='$db_user', `db_pass`='$db_pass' WHERE `id`='$id'";
	    	if($this->checkDb($db_host, $db_name, $db_user, $db_pass)){
	    		$directoryName = "./$c_username/db.php";

				if(!is_dir($directoryName)){
					if(mkdir($directoryName, 0755, true)){
    					$sql=file_get_contents('bigobuddy.sql');
    					if(mysqli_query($this->con,$sql)){
    						echo "Shivji";
    					}
					}else{
						die('Failed to create folders...');
					}
				}
				
	    	}
	    	else{
	    		$error="DB not found";
	    	}
	    	//die(var_dump($res));
    	}

    	public function checkDb($db_host, $db_name, $db_user, $db_pass){
    		if(mysqli_connect($db_host, $db_user, $db_pass, $db_name)){
    			return true;
    		}else{
    			return false;
    		}
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
    }
?>