<?php
    $dashboard = "show";
    include('controller.user.php');
    include_once("navbar.php");
    if(@$_SESSION['userstatus']!="admin"){
        header('Location: logout.php');
    }else{
        
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="csjs/css.css">
    <script src="csjs/js.js"></script>
    <title>Dashboard</title>
</head>

<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-5" style="padding-top: 70px;">
        <div style="display: flex;margin-left:auto;margin-right:auto; margin-bottom: 20px; align-items: top;justify-content: center;">
        Most Enroll 5 Course
        </div>
        <div class="chart-container" style="position: relative; width:100%;max-width:600px; margin-left:auto; margin-right:auto;">
            <canvas id="lineChart"></canvas>
        </div>
    </div>
    <div class="col-lg-5" style="padding-top: 70px;">
        <div style="display: flex;margin-left:auto;margin-right:auto; margin-bottom: 20px; align-items: top;justify-content: center;">
            All Enroll
        </div>
        <div class="chart-container" style="position: relative; width:100%;max-width:300px; margin-left:auto; margin-right:auto;">
            <canvas id="pieChart"></canvas>
        </div> <br>
    </div>
    <div class="col-lg-1"></div>
</div>

<script src="csjs/chart.js"></script>
<script>
    const lchart = document.getElementById('lineChart'); 
    const lineChart = new Chart(lchart, {
        data: {
            datasets: [
                {
                    type: 'bar',
                    label: 'Course Name', 
                    data: [
                    <?php
                        $i = count($most5enroll);
                        foreach ($most5enroll as $m5r) {
                            echo $m5r["CEnrollCourseID"];
                            if($i != 1){
                                echo ",";
                                $i--;
                            }
                        } 
                    ?>
                ]
            },
        ],
        labels: [
            <?php
                $i = count($most5enroll);
                foreach ($most5enroll as $m5r) {
                    echo "'".$m5r["CourseCode"]." ".$m5r["CourseName"]."'";
                    if($i != 1){
                        echo ",";
                        $i--;
                    }
                } 
            ?>
        ]
    },
});
const pchart = document.getElementById('pieChart'); 
    const pieChart = new Chart(pchart, {
    type: "pie",
    data: {
        labels: [
            <?php
                $i = count($countenroll);
                foreach ($countenroll as $cr) {
                    echo "'".$cr["CourseCode"]." ".$cr["CourseName"]."'";
                    if($i != 1){
                        echo ",";
                        $i--;
                    }
                } 
            ?>
        ],
            datasets: [{
                data: [
                    <?php
                        $i = count($countenroll);
                        foreach ($countenroll as $cr) {
                            echo $cr["CEnrollCourseID"];
                            if($i != 1){
                                echo ",";
                                $i--;
                            }
                        } 
                    ?>
                ]
        }]
    },
    options: {
        plugins: {
            legend: {
                display: false
            }
        },
    },
});
</script>