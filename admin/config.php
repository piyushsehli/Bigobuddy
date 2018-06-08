<?php
class task
{
    protected $Host     = "localhost"; // Hostname of our MySQL server.
    protected $Database = "management"; // bigobuddy Logical database name on that server.
    protected $User     = "root"; // bigobuddy User and Password for login.
    protected $Password = ""; 

    /*    
    protected $Host     = "166.62.8.13"; // Hostname of our MySQL server.
    protected $Database = "bigobuddy"; // Logical database name on that server.
    protected $User     = "bigobuddy"; // User and Password for login.
    protected $Password = "Big@Friend8"; //    
*/
    public $con=0;  // Result of mysql_connect().
    protected $Query_ID = 0;  // Result of most recent mysql_query().
    protected $Row;// current row number.
    public $Record;

    public function __construct()
    {
        $this->connect();
        //$this->clientLogin();
    }
/*
    public function clientLogin(){
        mysqli_close($this->con);
        $this->con=mysqli_connect($_SESSION['db_ip'], $_SESSION['db_user'], $_SESSION['db_pass'], $_SESSION['db_name']);
    }*/

    public function AddDept()
    {
        $name = addslashes(strtoupper($_POST["name"]));
        $hod = addslashes(strtoupper($_POST["hod"]));
        $query = "insert into department(name, hod) values('$name','$hod')";
        //echo $query;
        mysqli_query($this->con, $query);
    }
    
    public function AddDesignation(){
        $post = addslashes(strtoupper($_POST["position"]));
        $query="insert into designation(position) values('$post')";   
        mysqli_query($this->con, $query);
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
        $query="INSERT INTO `admin`(`e_name`, `e_email`, `e_number`, `e_pass`, `c_name`, `designation`, `c_contact`, `c_address`, `c_email`, `c_username`, `e_username`, `city`, `pincode`, `state`, `user_registered_on`) VALUES ('$e_name', '$e_email', '$e_number','$e_pass', '$c_name', '$desg', '$c_number', '$c_address', '$c_email', '$c_username', '$e_username', '$city', '$pincode', '$state', NOW())";
        die(var_dump($query));
        if(mysqli_query($this->con, $query)){
            return true;
        }
        else{
            return false;
        }
    }

    public function addTeacher(){
        $firstname = addslashes($_POST["firstname"]);
        $lastname = addslashes($_POST["lastname"]);     
        $email = addslashes($_POST["email"]);     
        $username = addslashes($_POST["username"]);
        $password = addslashes($_POST["password"]);     
        $dept_id = addslashes($_POST["dept_id"]);     
        $des_id = addslashes($_POST["des_id"]);     
        $phone = addslashes($_POST["phone"]);     
        $gender = addslashes($_POST['gender']);
        $dob = addslashes($_POST["dob"]);     
        $address = addslashes($_POST["address"]);     
        $state = addslashes($_POST["state"]);     
        $city = addslashes($_POST["city"]);     
        $pincode = addslashes($_POST["pincode"]);     
        $qual = addslashes($_POST["qual"]);     
        $experience = addslashes($_POST["experience"]);     
        $salary = addslashes($_POST["salary"]);
        $join_date = $_POST["join_date"];

        $snap="teachers/default.jpg";

        if ($_FILES["snap"]["error"]==0) {
            $type=$_FILES["snap"]["type"];
            $temp=explode("/", $type);
            $ext=$temp[1];
            if ($ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="png") {
                $snap="teachers/$username".".".$ext;
                move_uploaded_file($_FILES["snap"]["tmp_name"], $snap);
            }
        }
        

        $query = "INSERT INTO `user_login`(`username`, `password`, `type`, `created_at`) VALUES ('$username','$password','teacher',NOW())";
        
        if (mysqli_query($this->con, $query)) {
            $login_id=mysqli_insert_id($this->con);

            $query2 = "INSERT INTO `teachers`(`dept_id`, `des_id`, `login_id`, `firstname`, `lastname`, `email`, `gender`, `phone`, `photo`, `dob`, `joining_date`, `address`, `state`, `city`, `pincode`, `qualification`, `experience`, `salary`) VALUES ('$dept_id','$des_id','$login_id','$firstname','$lastname','$email','$gender','$phone','$snap','$dob','$join_date','$address','$state','$city','$pincode','$qual','$experience','$salary')";
            mysqli_query($this->con, $query2);
            return true;
        } 
    }

    public function updateTeacher(){
        $id=$_POST['id'];
        $login_id=$_POST['login_id'];
        $firstname = addslashes($_POST["firstname"]);
        $lastname = addslashes($_POST["lastname"]);     
        $email = addslashes($_POST["email"]);     
        $username = addslashes($_POST["username"]);     
        $dept_id = addslashes($_POST["dept_id"]);     
        $des_id = addslashes($_POST["des_id"]);     
        $phone = addslashes($_POST["phone"]);     
        $gender = addslashes($_POST['gender']);
        $dob = addslashes($_POST["dob"]);     
        $address = addslashes($_POST["address"]);     
        $state = addslashes($_POST["state"]);     
        $city = addslashes($_POST["city"]);     
        $pincode = addslashes($_POST["pincode"]);     
        $qual = addslashes($_POST["qual"]);     
        $experience = addslashes($_POST["experience"]);     
        $salary = addslashes($_POST["salary"]);
        $join_date = $_POST["join_date"];
        
        $snap=substr($_POST['photo'],10);
        if($snap == $_FILES["snap"]["name"]){
          $snap=$_POST['photo'];
        }
        else{
            if ($_FILES["snap"]["error"]==0) {
                $type=$_FILES["snap"]["type"];
                $temp=explode("/", $type);
                $ext=$temp[1];
                if ($ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="png") {
                    $snap="teachers/$username"."."."$ext";
                    move_uploaded_file($_FILES["snap"]["tmp_name"], $snap);
                }
            }
        }
        if($username==$user_check){
            $query="UPDATE `teachers` SET `dept_id`='$dept_id',`des_id`='$des_id',`firstname`='$firstname',`lastname`='$lastname',`email`='$email',`gender`='$gender',`phone`='$phone',`photo`='$snap',`dob`='$dob',`joining_date`='$join_date',`address`='$address',`state`='$state',`city`='$city',`pincode`='$pincode',`qualification`='$qual',`experience`='$experience',`salary`='$salary' WHERE id='$id'";

                if (mysqli_query($this->con, $query)) {
                    return true;
                }
        }
        else{
            $query2="update user_login set username='$username' where id='$login_id'";
            if (mysqli_query($this->con, $query2)) {
                $query="UPDATE `teachers` SET `dept_id`='$dept_id',`des_id`='$des_id',`firstname`='$firstname',`lastname`='$lastname',`email`='$email',`gender`='$gender',`phone`='$phone',`photo`='$snap',`dob`='$dob',`joining_date`='$join_date',`address`='$address',`state`='$state',`city`='$city',`pincode`='$pincode',`qualification`='$qual',`experience`='$experience',`salary`='$salary' WHERE id='$id'";
                if (mysqli_query($this->con, $query)) {
                    return true;
                } 
            } 
        }
    }

    public function addEmp(){
        $firstname = addslashes($_POST["firstname"]);
        $lastname = addslashes($_POST["lastname"]);     
        $email = addslashes($_POST["email"]);     
        $username = addslashes($_POST["username"]);
        $password = addslashes($_POST["password"]);     
        $dept_id = addslashes($_POST["dept_id"]);     
        $des_id = addslashes($_POST["des_id"]);     
        $phone = addslashes($_POST["phone"]);     
        $gender = addslashes($_POST['gender']);
        $dob = addslashes($_POST["dob"]);     
        $address = addslashes($_POST["address"]);     
        $state = addslashes($_POST["state"]);     
        $city = addslashes($_POST["city"]);     
        $pincode = addslashes($_POST["pincode"]);     
        $qual = addslashes($_POST["qual"]);     
        $experience = addslashes($_POST["experience"]);     
        $salary = addslashes($_POST["salary"]);

        $types=$_POST['type'];
        $ir = 0;
        $ur = 0;
        $dr = 0;
        $vr = 0;
        if($types=="admin"){
            if (isset($_POST["insert"])) {
                $ir = 1;
            }
            if (isset($_POST["edit"])) {
                $ur = 1;
            }
            if (isset($_POST["delete"])) {
                $dr = 1;
            }
            if (isset($_POST["view"])) {
                $vr = 1;
            }  
        }
        else{
            $ir = 0;
            $ur = 0;
            $dr = 0;
            $vr = 0;
        }
        $snap="admins/default.jpg";

        if ($_FILES["snap"]["error"]==0) {
            $type=$_FILES["snap"]["type"];
            $temp=explode("/", $type);
            $ext=$temp[1];
            if ($ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="png") {
                $snap="admins/$username";
                move_uploaded_file($_FILES["snap"]["tmp_name"], $snap);
            }
        }     
        $query = "INSERT INTO `employee`(`dept_id`, `des_id`, `firstname`, `lastname`, `username`, `email`, `password`, `gender`,`phone`, `photo`, `dob`, `address`, `state`, `city`, `pincode`, `qualification`, `experience`, `salary`, `type`) VALUES ('$dept_id', '$des_id', '$firstname', '$lastname', '$username', '$email', '$password', '$gender','$phone', '$snap', '$dob', '$address', '$state', '$city', '$pincode', '$qual', '$experience', '$salary', '$types')";
        if (mysqli_query($this->con, $query)) {
            $id=mysqli_insert_id($this->con);
            $query2 = "INSERT INTO `rights`(`emp_id`, `ir`, `vr`, `ur`, `dr`) VALUES ('$id', '$ir', '$vr', '$ur', '$dr')";
            mysqli_query($this->con, $query2);
            return true;
        }   
    }

    public function addPayment($roll, $fee){
        $query="select fee_paid from students where roll_number='$roll' limit 1";
        $result=mysqli_query($this->con,$query);
        $res=mysqli_fetch_assoc($result);
        return $fee+$res['fee_paid'];
    }

    public function addFee(){
        $course_id = addslashes($_POST["course"]);
        $fee = addslashes($_POST["fee"]);
        $roll = addslashes($_POST["roll_number"]);
        $type = addslashes($_POST["fee_type"]);
        $due_date = addslashes($_POST["due_date"]);
        $fee_taker = $_SESSION['id'];
        $query="INSERT INTO `fee`(`roll_number`, `course_id`, `amount`, `date_of_receipt`, `fee_taker`, `fee_type`) VALUES ('$roll', '$course_id','$fee',NOW(),'$fee_taker', '$type')";

        if(mysqli_query($this->con, $query)){
            $pay=$this->addPayment($roll, $fee);
            $query="update students set fee_paid='$pay', due_date='$due_date' where roll_number='$roll'";
            if(mysqli_query($this->con, $query)){    
                return 1;
            }
        }
    }

    public function editFee(){
        $id=$_POST['id'];
        $course_id = addslashes($_POST["course"]);
        $fee = addslashes($_POST["fee"]);
        $roll = addslashes($_POST["roll_number"]);
        $type = addslashes($_POST["fee_type"]);
        $fee_taker = $_SESSION['id'];
        $query="UPDATE `fee` SET `roll_number`='$roll',`course_id`='$course_id',`amount`='$fee',`fee_taker`='$fee_taker',`fee_type`='$type' WHERE id='$id'";
        if(mysqli_query($this->con, $query)){
            return 1;
        }
    }

    public function addStudent(){
        
        $firstname = addslashes($_POST["fname"]);
        $lastname = addslashes($_POST["lname"]);     
        $middlename = addslashes($_POST["mname"]);     
        $email = addslashes($_POST["email"]);     
        $phone = addslashes($_POST["phone"]);     
        $gender = addslashes($_POST['gender']);
        $dob = addslashes($_POST["dob"]);     
        $address = addslashes($_POST["address"]);     
        $state = addslashes($_POST["state"]);     
        $city = addslashes($_POST["city"]);     
        $pincode = addslashes($_POST["pincode"]);     
        
        $qual = addslashes($_POST["qual"]);     
        $join_date = $_POST['join_date'];
        $class = $_POST['class'];
        $course_id=$this->getValue('classes','course_id',$class);
        $roll_num = $_POST['roll_number'];

        $mother = addslashes($_POST["mother"]);
        $father = addslashes($_POST["father"]);
        $parents_num = addslashes($_POST["parents_num"]);

        $username = addslashes($_POST["username"]);
        $password = addslashes($_POST["password"]);     
    
        $snap="students/default.jpg";
        $full_fee=$this->getValue('courses', 'fee_details', $course_id);
        if ($_FILES["snap"]["error"]==0) {
            $type=$_FILES["snap"]["type"];
            $temp=explode("/", $type);
            $ext=$temp[1];
            if ($ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="png") {
                $snap="students/$username".".".$ext;
                move_uploaded_file($_FILES["snap"]["tmp_name"], $snap);
            }
        }     
        $query = "INSERT INTO `user_login`(`username`, `password`, `type`,`created_at`) VALUES ('$username','$password','student',NOW())";
        if (mysqli_query($this->con, $query)) {
            $login_id=mysqli_insert_id($this->con);

            $query2 = "INSERT INTO `students`(`class_id`, `login_id`, `roll_number`, `f_name`, `l_name`, `m_name`, `gender`, `email`, `address`, `state`, `city`, `pincode`, `dob`, `phone`, `mother_name`, `father_name`, `parents_contact`, `qualification`, `joining_date`, `photo`, `full_fee`) VALUES ('$class','$login_id','$roll_num','$firstname','$lastname','$middlename','$gender','$email','$address','$state','$city','$pincode','$dob','$phone','$mother','$father','$parents_num','$qual','$join_date','$snap','$full_fee')";
            mysqli_query($this->con, $query2);
            return true;
        }   
    }

    public function markAttendance(){
        $student_id=$_POST['student_id'];
        $status='present';
        $date=date("Y-m-d");
        $q="INSERT INTO `daily_attendance`(`student_id`, `date`, `status`,`created_at`) VALUES ('$student_id', '$date', '$status',NOW())";
        if(mysqli_query($this->con,$q)){
            return true;
        }
    }

    public function markTeacherAttendance(){
        $teacher_id=$_POST['teacher_id'];
        $status='present';
        $date=date("Y-m-d");
        $q="INSERT INTO `teacher_attend`(`teacher_id`, `date`, `status`,`marked_on`) VALUES ('$teacher_id','$date','$status',NOW())";
        if(mysqli_query($this->con,$q)){
            return true;
        }
    } 

    public function AddLecture(){
          $class=$_POST['class'];    
          $subject=$_POST['subject'];    
          $teacher=$_POST['teacher'];    
          $day=$_POST['day'];    
          $timings=$_POST['slot'];    
          $query="INSERT INTO `lectures`(`subject_id`, `class_id`, `teacher_id`, `day`, `slot_id`) VALUES ('$subject','$class','$teacher','$day','$timings')";
          if(mysqli_query($this->con,$query)){
            return true;
          }
    }

    public function editLecture(){
          $id=$_POST['id']; 
          $class=$_POST['class'];    
          $subject=$_POST['subject'];    
          $teacher=$_POST['teacher'];    
          $day=$_POST['day'];    
          $timings=$_POST['slot'];            
          $query = "UPDATE `lectures` SET `subject_id`='$subject',`class_id`='$class',`teacher_id`='$teacher',`day`='$day',`slot_id`='$timings' WHERE id='$id'";
          if(mysqli_query($this->con,$query)){
            return true;
          }  
    }

    public function addSubject(){
        $class=$_POST['class'];
        $subject=$_POST['subject'];
        $query="INSERT INTO `subjects`(`class_id`, `name`) VALUES ('$class','$subject')";
        mysqli_query($this->con,$query);
    }

    public function editSubject(){
        $id=$_POST['id'];
        $class=$_POST['class'];
        $subject=$_POST['subject'];
        $query="UPDATE subjects set `class_id`='$class', `name`='$subject' where id='$id'";
        if(mysqli_query($this->con,$query)){
            return true;
        }
    }

    public function EditCategory(){
        $id = $_POST['id'];
        $name = addslashes(strtoupper($_POST["name"]));

        $query = "update category set name='$name' where id='$id'";
        
        if (mysqli_query($this->con, $query)) {
            return 1;
        }
    }

    public function AddCategory(){
        $name = addslashes(strtoupper($_POST["name"]));
        $query="insert into category(name) values('$name')";   
        mysqli_query($this->con, $query);
    }

    public function AddCourse(){
        $name = addslashes($_POST["course_name"]);
        $branch = addslashes($_POST["branch"]);
        $fee = addslashes($_POST["fee"]);
        $query="INSERT INTO `courses`(`name`, `branch`, `fee_details`) VALUES ('$name','$branch','$fee')";   
        mysqli_query($this->con, $query);
    }

     public function EditCourse(){
        $id=$_POST['id'];
        $name = addslashes($_POST["course_name"]);
        $branch = addslashes($_POST["branch"]);
        $fee = addslashes($_POST["fee"]);

        $query="UPDATE `courses` SET name='$name', branch='$branch', fee_details='$fee' where id='$id'";   
        mysqli_query($this->con, $query);
    }

    public function AddClass(){
        $course = addslashes($_POST["course"]);
        $sem = addslashes($_POST["sem"]);
        $sec = addslashes($_POST["sec"]);
        $query="INSERT INTO `classes`(`course_id`, `semester`, `section`) VALUES ('$course','$sem','$sec')";   
        mysqli_query($this->con, $query);
    }

    public function EditClass(){
        $id = addslashes($_POST['id']);
        $course = addslashes($_POST["course"]);
        $sem = addslashes($_POST["sem"]);
        $sec = addslashes($_POST["sec"]);
        $query="UPDATE `classes` SET `course_id`='$course',`semester`='$sem',`section`='$sec' WHERE id='$id'";   
        if(mysqli_query($this->con, $query)){
            return true;
        }
    }

    public function AddAttend(){
        $date=$_POST['date'];
        $status="present";
        $time=$_POST['time'];
        $id=$_SESSION['id'];
        $query="INSERT INTO `attendance`(`emp_id`, `status`, `time`, `date`) VALUES ('$id','$status','$time','$date')";
        if(mysqli_query($this->con, $query)){
            return 1;
        }
    }

    public function AddTasks(){
        $title=$_POST['subject'];
        $description=$_POST['description'];
        $date=$_POST['date'];
        $category=$_POST['category'];
        $priority=$_POST['priority'];
        $send=$_POST['send'];
        $userId=$_SESSION['id'];
        if ($send){
            foreach ($send as $s){
                $query="INSERT INTO `tasks`(`cid`, `title`, `description`, `deadline`, `priority`, `assigned_by`, `assigned_to`) VALUES ('$category', '$title', '$description', '$date', '$priority', '$userId', '$s')";
                mysqli_query($this->con, $query);  
            }
            return 1;
        }
    }

    public function connect()
    {
        $this->con=mysqli_connect($_SESSION['db_ip'], $_SESSION['db_user'], $_SESSION['db_pass'], $_SESSION['db_name']);
    }



   
    public function EditDept()
    {
        $id = $_POST['id'];
        $name = addslashes(strtoupper($_POST["name"]));
        $hod = addslashes(strtoupper($_POST["hod"]));

        $query = "update department set name='$name', hod='$hod' where id=".$id;
        //echo $query;
        
        if (mysqli_query($this->con, $query)) {
            return true;
        }
    }

    public function EditDesignation()
    {
        $id = $_POST['id'];
        $post = addslashes(strtoupper($_POST["position"]));

        $query = "update designation set position='$post' where id='$id'";
        //echo $query;
        
        if (mysqli_query($this->con, $query)) {
            return 1;
        }
    }



    public function updateEmp(){
        $id=$_POST['id'];
        $firstname = addslashes($_POST["firstname"]);
        $lastname = addslashes($_POST["lastname"]);     
        $email = addslashes($_POST["email"]);     
        $username = addslashes($_POST["username"]);     
        $dept_id = addslashes($_POST["dept_id"]);     
        $des_id = addslashes($_POST["des_id"]);     
        $phone = addslashes($_POST["phone"]);     
        $gender = addslashes($_POST['gender']);
        $dob = addslashes($_POST["dob"]);     
        $address = addslashes($_POST["address"]);     
        $state = addslashes($_POST["state"]);     
        $city = addslashes($_POST["city"]);     
        $pincode = addslashes($_POST["pincode"]);     
        $qual = addslashes($_POST["qual"]);     
        $experience = addslashes($_POST["experience"]);     
        $salary = addslashes($_POST["salary"]);
        
        $types=$_POST['type'];
        $ir = 0;
        $ur = 0;
        $dr = 0;
        $vr = 0;
        if($types=="admin"){
            if (isset($_POST["insert"])) {
                $ir = 1;
            }
            if (isset($_POST["edit"])) {
                $ur = 1;
            }
            if (isset($_POST["delete"])) {
                $dr = 1;
            }
            if (isset($_POST["view"])) {
                $vr = 1;
            }  
        }
        else{
            $ir = 0;
            $ur = 0;
            $dr = 0;
            $vr = 0;
        }
        $snap=substr($_POST['photo'],7);
        if($snap == $_FILES["snap"]["name"]){
          $snap=$_POST['photo'];  
        }
        else{
            if ($_FILES["snap"]["error"]==0) {
                $type=$_FILES["snap"]["type"];
                $temp=explode("/", $type);
                $ext=$temp[1];
                if ($ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="png") {
                    $snap="admins/$username";
                    move_uploaded_file($_FILES["snap"]["tmp_name"], $snap);
                }
            }
        }
        $query="UPDATE `employee` SET `dept_id`='$dept_id', `des_id`='$des_id', `firstname`='$firstname', `lastname`='$lastname', `username`='$username', `email`='$email', `gender`='$gender',`phone`='$phone', `photo`='$snap', `dob`='$dob', `address`='$address', `state`='$state', `city`='$city', `pincode`='$pincode', `qualification`='$qual', `experience`='$experience', `salary`='$salary' WHERE id='$id'";
        //die(var_dump($city));

        if (mysqli_query($this->con, $query)) {
            $query2 = "UPDATE `rights` SET `ir`='$ir',`vr`='$vr',`ur`='$ur',`dr`='$dr' WHERE emp_id='$id'";
            if(mysqli_query($this->con, $query2)){
                return true;
            }
        } 
    }

    public function updateStudent(){
        
        $id=$_POST['id'];
        
        $firstname = addslashes($_POST["firstname"]);
        $lastname = addslashes($_POST["lastname"]);     
        $middlename = addslashes($_POST["middlename"]);     
        $email = addslashes($_POST["email"]);     
        $phone = addslashes($_POST["phone"]);     
        $gender = addslashes($_POST['gender']);
        $dob = addslashes($_POST["dob"]);     
        $address = addslashes($_POST["address"]);     
        $state = addslashes($_POST["state"]);     
        $city = addslashes($_POST["city"]);     
        $pincode = addslashes($_POST["pincode"]);     
        $username = addslashes($_POST["username"]);
        $user_check = addslashes($_POST["user_check"]);
        $login_id = $_POST['login_id'];
        
        $qual = addslashes($_POST["qual"]);     
        $join_date = $_POST['join_date'];
        $class = $_POST['class'];
        $roll_num = $_POST['roll_num'];

        $mother = addslashes($_POST["mother"]);
        $father = addslashes($_POST["father"]);
        $parents_num = addslashes($_POST["parents_contact"]);     
        
        $snap=substr($_POST['photo'],9);
        if($snap == $_FILES["snap"]["name"]){
          $snap=$_POST['photo'];
        }
        else{
            if ($_FILES["snap"]["error"]==0) {
                $type=$_FILES["snap"]["type"];
                $temp=explode("/", $type);
                $ext=$temp[1];
                if ($ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="png") {
                    $snap="students/$username";
                    move_uploaded_file($_FILES["snap"]["tmp_name"], $snap);
                }
            }
        }
        if($username==$user_check){
            $query="UPDATE `students` SET `class_id`='$class',`roll_number`='$roll_num',`f_name`='$firstname',`l_name`='$lastname',`m_name`='$middlename',`gender`='$gender',`email`='$email',`address`='$address',`state`='$state',`city`='$city',`pincode`='$pincode',`dob`='$dob',`phone`='$phone',`mother_name`='$mother',`father_name`='$father',`parents_contact`='$parents_num',`qualification`='$qual',`joining_date`='$join_date',`photo`='$snap' WHERE id='$id'";
                if (mysqli_query($this->con, $query)) {
                    return true;
                }
        }
        else{
            $query2="update user_login set username='$username' where id='$login_id'";
            if (mysqli_query($this->con, $query2)) {
                $query="UPDATE `students` SET `class_id`='$class',`roll_number`='$roll_num',`f_name`='$firstname',`l_name`='$lastname',`m_name`='$middlename',`gender`='$gender',`email`='$email',`address`='$address',`state`='$state',`city`='$city',`pincode`='$pincode',`dob`='$dob',`phone`='$phone',`mother_name`='$mother',`father_name`='$father',`parents_contact`='$parents_num',`qualification`='$qual',`joining_date`='$join_date',`photo`='$snap' WHERE id='$id'";
                if (mysqli_query($this->con, $query)) {
                    return true;
                } 
            } 
        }
    }


    public function updateadmin()
    {
        $id=$_POST['id'];

        /*$query="select snap from admins where id=$id";
        $data=mysqli_query($this->con, $query);
        $row=mysqli_fetch_assoc($data);*/
        //$password = strtolower(addslashes($_POST["password"]));
        $username = strtolower(addslashes($_POST["username"]));
        $name = strtolower(addslashes($_POST["name"]));
        $phone = strtolower(addslashes($_POST["phone"]));
        $address = strtolower(addslashes($_POST["address"]));
        $email = strtolower(addslashes($_POST["email"]));
        $ir = "n";
        if (isset($_POST["insert"])) {
            $ir = "y";
        }
        $er = "n";
        if (isset($_POST["edit"])) {
            $er = "y";
        }
        $dr = "n";
        if (isset($_POST["delete"])) {
            $dr = "y";
        }
        $vr = "n";
        if (isset($_POST["view"])) {
            $vr = "y";
        }

        $snap=$row['snap'];

        if ($_FILES["snap"]["error"]==0) {
            $type=$_FILES["snap"]["type"];
            $temp=explode("/", $type);
            $ext=$temp[1];
            if ($ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="png") {
                $snap="admins/$admin_id.$ext";
                move_uploaded_file($_FILES["snap"]["tmp_name"], $snap);
            }
        }
        
        $query="UPDATE `admins` SET `username`='$username',`name`='$name',`password`='$password',`address`='$address',`email`='$emailid',`phone`='$phone',`snap`='$snap',`insertright`='$ir',`editright`='$er',`deleteright`='$dr',`viewright`='$vr' WHERE admin_id='$admin_id'";
        if (mysqli_query($this->con, $query)) {
            return 1;
        }
    }

     //-------------------------------------------
//    Change Admin password
//-------------------------------------------
    public function changeAdminPsw($password)
    {
        $id = $_SESSION['admin_id'];
        $query = "update admins set `password`='$password' where admin_id=$id";
        if (mysqli_query($this->con, $query)) {
            return 1;
        } else {
            return 0;
        }
    } // end function changeAdminPsw


    public function updateproduct()
    {
        $name = strtolower(addslashes($_POST["name"]));
        $price = $_POST["price"];
        $subcatid = $_POST["subcatid"];
        $bid = $_POST["brand"];
        $description = strtolower(addslashes($_POST["des"]));
        $snap="products/default.jpg";
        $pid=$_POST['pid'];

        $snap=$_SESSION['productsnap'];

        if ($_FILES["snap"]["error"]==0) {
            $type=$_FILES["snap"]["type"];
            $temp=explode("/", $type);
            $ext=$temp[1];
            if ($ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="png") {
                $snap="admins/$admin_id.$ext";
                move_uploaded_file($_FILES["snap"]["tmp_name"], $snap);
            }
        }
        $query="UPDATE `products` SET `price`='$price',`bid`='$bid',`subcatid`='$subcatid',`pname`='$name',`description`='$description',`snap`='$snap',`status`='1' WHERE pid='$pid'";
        if (mysqli_query($this->con, $query)) {
            return 1;
        }
    }

    
    public function addproduct()
    {
        $name = strtolower(addslashes($_POST["name"]));
        $price = strtolower(addslashes($_POST["price"]));
        $subcatid = strtolower(addslashes($_POST["subcatid"]));
        $bid = strtolower(addslashes($_POST["brand"]));
        $description = strtolower(addslashes($_POST["des"]));
        $snap="products/default.jpg";
        $pid=$this->getId("products", "pid");

        if ($_FILES["snap"]["error"]==0) {
            $type=$_FILES["snap"]["type"];
            $temp=explode("/", $type);
            $ext=$temp[1];
            if ($ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="png") {
                $snap="products/$pid.$ext";
                move_uploaded_file($_FILES["snap"]["tmp_name"], $snap);
            }
        }
        $query="INSERT INTO `techshark`.`products` (`pid`, `price`,`bid`, `subcatid`, `pname`, `description`, `snap`,`time` ,`status`) VALUES ('$pid', '$price','$bid' ,'$subcatid', '$name', '$description', '$snap',NOW(),'1')";
        if (mysqli_query($this->con, $query)) {
            return 1;
        }
    }
    
    /*public function EditClass(){
        $id=$_POST['id'];
        $course = addslashes($_POST["course"]);
        $sem = addslashes($_POST["sem"]);
        $sec = addslashes($_POST["sec"]);
        
    }*/
    public function AddAdmin()
    {
        $username = addslashes($_POST["username"]);
        $password = addslashes($_POST["password"]);
        $name = addslashes($_POST["name"]);
        $phone = addslashes($_POST["phone"]);
        $address = addslashes($_POST["address"]);
        $emailid = addslashes($_POST["emailid"]);
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

        if ($_FILES["snap"]["error"]==0) {
            $type=$_FILES["snap"]["type"];
            $temp=explode("/", $type);
            $ext=$temp[1];
            if ($ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="png") {
                $snap="admins/$username.$ext";
                move_uploaded_file($_FILES["snap"]["tmp_name"], $snap);
            }
        }
        
        $query="INSERT INTO `user_login`(`username`, `password`, `type`,`created_at`) VALUES ('$username','$password','admin',NOW())";
        if (mysqli_query($this->con, $query)) {
            $login=mysqli_insert_id($this->con);
            $query2 = "INSERT INTO `admins`(`login_id`, `email`, `name`, `address`, `phone`, `snap`) VALUES ('$login','$emailid','$name','$address','$phone','$snap')";
            if(mysqli_query($this->con,$query2)){
                /*$ad_id=mysqli_insert_id($this->con);*/
                $query3="INSERT INTO `rights`(`emp_id`, `ir`, `vr`, `ur`, `dr`) VALUES ('$login','$ir','$vr','$er','$dr')";
                if(mysqli_query($this->con,$query3)){
                    return 1;
                }
            }
        }
        
        
    }




 //-------------------------------------------
//    Queries the database
//-------------------------------------------
    public function query($Query_String)
    {
        if ($this->Query_ID = mysqli_query($this->con, $Query_String)) {
            return $this->Query_ID;
        } else {
            return false;
        }
    } // end function query

       
    public function checkUser()
    {
        // if the session id is not set, redirect to login page
        if (!isset($_SESSION['id'])) {
            header('Location:index.php');
        }
    }

    public function doLogin()
    {
        // if we found an error save the error message in this variable
    
    $name = $_POST['username'];
    $password = $_POST['password'];
    
    // first, make sure the username & password are not empty
        // check the database and see if the username and password combo do match
        $sql = "SELECT * FROM user_login WHERE username = '$name' AND password = '$password' ";
        $result = $this->query($sql);
        
        $result2=mysqli_num_rows($result);
        if ($result2) {
            $row = mysqli_fetch_assoc($result);
            session_start();
            $id=$row['id'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $name;
            $_SESSION['type']=$row['type']; 

            if($_SESSION['type']=="admin"){
                $query="select * from rights where emp_id='$id'";
                $res=$this->query($query);
               
                $res2=mysqli_num_rows($res);
                
                if($res2){
                    $row2 = mysqli_fetch_assoc($res);
                    $_SESSION['ir']=$row2['ir'];
                    $_SESSION['dr']=$row2['dr'];
                    $_SESSION['ur']=$row2['ur'];
                    $_SESSION['vr']=$row2['vr'];
                }
            }
            header("location:home.php");
        } else {
            header('location:index.php?p=1');
        }
    
        return $errorMessage;
    }

//-------------------------------------------
//    Retrieves the 2 record in a recordset
//-------------------------------------------
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
    } // end function nextRecord



    public function getId($table, $field)
    {
        $id = 1;
        $query = "select $field from $table where $field=(select max($field) from $table)";
        $data = $this->query($query);
        if ($row = mysqli_fetch_assoc($data)) {
            extract($row);
            $id = $row[$field] + 1;
        }
        return $id;
    }
    
    public function getValue($table, $field, $id){
        $query="select $field from $table where id=".$id;
        $data= $this->query($query);
        $row = mysqli_fetch_assoc($data);
        return $row[$field];
    }

    public function getValues($table, $field, $id, $check){
        $query="select $field from $table where $check=".$id;
        $data= $this->query($query);
        $row = mysqli_fetch_assoc($data);
        return $row[$field];
    }

}
