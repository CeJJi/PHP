<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
  border-radius: 5px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
</style>
<?php
    $showcourseuser = "show";
    include('controller.user.php');
    include_once("navbar.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="csjs/css.css">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="csjs/js.js"></script>
    <title>Index</title>
</head>
<body>
    
    <div class="container"> 
        <div style="padding-top:25px;padding-right:25px">
            <div class="row">
                    <?php
                        //echo "debug<br>";
                        //print_r($product_list);
                        foreach ($course_list as $c) {
                            echo "<div class='col-lg-3 col-sm-6' style='margin-top: 20px'>";
                            echo "<div class='card' style='border-radius: 10px 10px 10px 10px; width: 100%; margin-left:20px;'>";
                            echo "<img src='".$c["CourseImg"]."'  width='100%' style='border-radius: 10px 10px 0px 0px;' alt=''>";
                            echo $c['CourseName'];
                            if(@$_SESSION['userstatus']=="user"){
                                echo "<a href='controller.user.php?enroll=".$c["CourseID"]."' class='btn btn-success' style='border-radius: 0px 0px 10px 10px;'>Enroll</a>";
                            };
                            echo "</div>";
                            echo "</div><br><br><br>";
                        }
                    ?>
            </div>
        </div>
    </div>
</body>

