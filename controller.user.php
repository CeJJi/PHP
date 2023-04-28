<?php
    session_start();
?>
<script>
    function goto(url){
        setTimeout(()=>{
            window.location.href=url;
        }, 1);
    }
    function alertfunc(messagealert){
        alert(messagealert);
    }
</script>
<?php
    require_once('./core/class.user.php');
    $user = new user();

    if(isset($_GET['save'])){
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";

        $UserFname = $_POST["UserFname"];
        $UserLname = $_POST["UserLname"];
        $UUsername = $_POST["UUsername"];
        $UPassword = $_POST["UPassword"];
        $user->insertuser($UserFname, $UserLname, $UUsername, $UPassword);
        header('Location: listuser.php');
    }else if(isset($_GET['savec'])){
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        date_default_timezone_set("Asia/bangkok");
        $date=date("Ymdhis");
        $imgname = $_FILES["fileToUpload"]["name"];
        $extension = pathinfo($imgname,PATHINFO_EXTENSION);
        //echo "extension : ".$extension[0].$extension[1].$extension[2]."<br>";
        $target_dir = "img/";
        $target_file = $target_dir . basename($date.".".$extension[0].$extension[1].$extension[2]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        //echo "targetfile : ".$target_file."<br>";
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png") {
            echo "Sorry, only JPG, PNG files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if($uploadOk == 0) {
            echo "<script>alertfunc('Sorry, your file was not uploaded.');";
            echo "goto('listcourse.php')</script>";
            // if everything is ok, try to upload file
        }else {
            if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
                echo "Success: upload completed<br>";
                echo "The file ".htmlspecialchars(basename($_FILES["fileToUpload"]["name"]))." has been uploaded to server.";
                $CourseCode = $_POST["CourseCode"];
                $CourseName = $_POST["CourseName"];
                $user->insertcourse($CourseCode, $CourseName, $target_file);
                echo "<script>goto('listcourse.php');</script>";
            } else {
                echo "<script>alertfunc('Sorry there was an error uploading your file');";
                echo "goto('listcourse.php')</script>";
            }
        }
    }else if(isset($_GET['saveeu'])){
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";

        $EnrollUserID = $_POST["EnrollUserID"];
        $EnrollCourseID = $_POST["EnrollCourseID"];
        $user->insertenrolluser($EnrollUserID, $EnrollCourseID);
        header('Location: listenroll.php');
    }else if(isset($_GET['edit'])){
        $u = $user->getUserByID($_GET['edit']);
        // echo "<pre>";
        // print_r($u);
        // echo "</pre>";
    }else if(isset($_GET['editc'])){
        $c = $user->getCourseByID($_GET['editc']);
        // echo "<pre>";
        // print_r($u);
        // echo "</pre>";
    }else if(isset($_GET['editeu'])){
        $e = $user->getEnrollUserByID($_GET['editeu']);
        // echo "<pre>";
        // print_r($u);
        // echo "</pre>";
    }else if(isset($_GET['update'])){
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";

        $field = ['UserFname' => $_POST["UserFname"], 'UserLname' => $_POST["UserLname"], 'UUsername' => $_POST["UUsername"], 'UPassword' => md5($_POST["UPassword"])];
        $user->updateuser($_GET['update'],$field);
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";
        header('Location: listuser.php');
    }else if(isset($_GET['updatec'])){
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        date_default_timezone_set("Asia/bangkok");
        $date=date("Ymdhis");
        $uploadOk = 1;
        if($_FILES["fileToUpload"]["name"] == null){
            $target_file = $_POST["oldimage"];
            $field = ['CourseCode' => $_POST["CourseCode"], 'CourseName' => $_POST["CourseName"], 'CourseImg' => $target_file];
            $user->updatecourse($_GET['updatec'],$field);
            // echo "<pre>";
            // print_r($user);
            // echo "</pre>";
            echo "<script>goto('listcourse.php');</script>";
        }else{
            $imgname = $_FILES["fileToUpload"]["name"];
            $extension = pathinfo($imgname,PATHINFO_EXTENSION);
            //echo "extension : ".$extension[0].$extension[1].$extension[2]."<br>";
            $target_dir = "img/";
            $target_file = $target_dir . basename($date.".".$extension[0].$extension[1].$extension[2]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            //echo "targetfile : ".$target_file."<br>";
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png") {
                echo "Sorry, only JPG, PNG files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if($uploadOk == 0) {
                echo "<script>alertfunc('Sorry, your file was not uploaded.');";
                echo "goto('listcourse.php')</script>";
                // if everything is ok, try to upload file
            }else {
                if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
                    echo "Success: upload completed<br>";
                    echo "The file ".htmlspecialchars(basename($_FILES["fileToUpload"]["name"]))." has been uploaded to server.";
                    $field = ['CourseCode' => $_POST["CourseCode"], 'CourseName' => $_POST["CourseName"], 'CourseImg' => $target_file];
                    $user->updatecourse($_GET['updatec'],$field);
                    // echo "<pre>";
                    // print_r($user);
                    // echo "</pre>";
                    echo "<script>goto('listcourse.php');</script>";
                } else {
                    echo "<script>alertfunc('Sorry there was an error uploading your file');";
                    echo "goto('listcourse.php')</script>";
                }
            }
        }
    }else if(isset($_GET['updateeu'])){
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";

        $field = ['EnrollUserID' => $_POST["EnrollUserID"], 'EnrollCourseID' => $_POST["EnrollCourseID"]];
        $user->updateenrolluser($_GET['updateeu'],$field);
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";
        header('Location: listenroll.php');
    }else if(isset($_GET['enroll'])){
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";


        $user->enrollcourse($_GET['enroll'], $_SESSION['userid']);
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";
        header('Location: index.php');
    }else if(isset($_GET['unroll'])){
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";


        $user->unrollcourse($_GET['unroll']);
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";
        header('Location: enroll.php');
    }else if(isset($_GET['regiser'])){
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";

        // $field = ['UserFname' => $_POST["UserFname"], 'UserLname' => $_POST["UserLname"], 'UserAddress' => $_POST["UserAddress"], 'UUsername' => $_POST["UUsername"], 'UPassword' => $_POST["UPassword"]];
        // $user->update($_GET['update'],$field);
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";
        $username = $_POST["username"];
        $password = $_POST["password"];
        $varpassword = $_POST["varpassword"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $logic = $user->regisfinduser($username);
        if($logic == null){
            if($password != $varpassword){
                echo "<script>alertfunc('Wrong password. Please try again');";
                echo "goto('login.php?regis')</script>";
            }else{
                $user->regisuser($username, $password, $fname, $lname);
                echo "<script>alertfunc('Regis Success');";
                echo "goto('logout.php')</script>";
            }
        }else{
            echo "<script>alertfunc('This username already exists');";
            echo "goto('login.php?regis')</script>";
        }
        
    }else if(isset($_GET['login'])){
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";

        // $field = ['UserFname' => $_POST["UserFname"], 'UserLname' => $_POST["UserLname"], 'UserAddress' => $_POST["UserAddress"], 'UUsername' => $_POST["UUsername"], 'UPassword' => $_POST["UPassword"]];
        // $user->update($_GET['update'],$field);
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";
        $username = $_POST["username"];
        $password = $_POST["password"];
        $u = $user->loginuser($username, $password);
        // echo "<pre>";
        // print_r($u);
        // echo "</pre>";
        if(@$u["Ustatus"]=="1"){
            $_SESSION['userid'] = $u["UserID"];
            $_SESSION['userstatus'] = "admin";
            echo "<script>alertfunc('Login as admin Success');";
            echo "goto('dashboard.php')</script>";
        }
        else if(@$u["Ustatus"]=="2"){
            $_SESSION['userid'] = $u["UserID"];
            $_SESSION['userstatus'] = "user";
            echo "<script>alertfunc('Login Success');";
            echo "goto('index.php')</script>";
        }
        else{
            echo "<script>alertfunc('Wrong username or password');";
            echo "goto('logout.php')</script>";
        }
    }
    
    if(isset($showuser)){
        $user_list = $user->user_list();
    }
    if(isset($showcourse)){
        $course_list = $user->course_list();
    }
    if(isset($showcourseuser)){
        @$course_list = $user->courseuser_list($_SESSION['userid']);
    }
    if(isset($showenrolluser)){
        $enrollcourse_list = $user->enrollcourselist();
    }
    if(isset($showcourseuserenroll)){
        $userenrollcourse_list = $user->userenrollcourse_list($_SESSION['userid']);
    }
    if(isset($dashboard)){
        $most5enroll = $user->most5enroll();
        $countenroll = $user->countenroll();
    }

    if(isset($_GET['id'])){
        $user->removeUser($_GET['id']);
        header('Location: listuser.php');
    }
    if(isset($_GET['idc'])){
        $user->removeCourse($_GET['idc']);
        header('Location: listcourse.php');
    }
    if(isset($_GET['ideu'])){
        $user->removeEnrollUser($_GET['ideu']);
        header('Location: listenroll.php');
    }
    $user->closeconnect();
?>