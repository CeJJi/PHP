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
    $showcourseuserenroll = "show";
    include('controller.user.php');
    include_once("navbar.php");
    if(@$_SESSION['userstatus']!="user"){
        header('Location: logout.php');
    }else{
        
    }
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
                        foreach ($userenrollcourse_list as $ue) {
                            echo "<div class='col-lg-3 col-sm-6' style='margin-top: 20px'>";
                            echo "<div class='card' style='border-radius: 10px 10px 10px 10px; width: 100%; margin-left:20px;'>";
                            echo "<img src='".$ue["CourseImg"]."'  width='100%' style='border-radius: 10px 10px 0px 0px;' alt=''>";
                            echo $ue['CourseName'];
                            ?>
                            <a href="JavaScript:if(confirm('Confirm?')==true){window.location='controller.user.php?unroll=<?php echo $ue["EnrollID"];?>';}" class="btn btn-danger" style="border-radius: 0px 0px 10px 10px;">Unroll</a>
                            <?php
                            //echo "<a href='controller.user.php?unroll=".$ue["EnrollID"]."' class='btn btn-danger' style='border-radius: 0px 0px 10px 10px;'>Unroll</a>";
                            echo "</div>";
                            echo "</div><br><br><br>";

                        }
                    ?>
                    
            </div>
        </div>
    </div>
</body>

