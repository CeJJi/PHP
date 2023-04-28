<?php
    $showcourse = "show";
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
    <link rel="stylesheet" href="csjs/dataTables.min.css">
    <link rel="stylesheet" href="csjs/css.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="csjs/js.js"></script>
    <script src="csjs/dataTables.min.js"></script>
    <title>List Course</title>
</head>
<body style="z-index: 1;">
    
    <div class="container" style="margin-left:auto;margin-right:auto;">
        <div class="row">
            <div class="col-1">

            </div>
            <div class="col-11">
            <div style="padding-top:50px;">
                <!-- The Modal -->
                <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title"> </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                                <form action="controller.user.php?savec" method="post" style="margin-left: 4%;" enctype="multipart/form-data">

                                    <div>
                                        <h2 style="margin-top: 20px; margin-bottom: -20px">Insert Data</h2>
                                        <input type="text"  name="UserID" placeholder="รหัสผู้ใช้" required disabled hidden><br><br>
                                        <div>
                                            CourseCode : <br>
                                            <input type="text" class="form-control" style="width: 95%;" name="CourseCode" placeholder="รหัสคอร์ส" required><br><br>
                                        </div>
                                        <div style="margin-top: -30px;">
                                            CourseName : <br>
                                            <input type="text" class="form-control" style="width: 95%;" name="CourseName" placeholder="ชื่อคอร์ส" required><br><br>
                                        </div>
                                        <div style="margin-top: -30px;">
                                            Image : <br>
                                            <img id="output" style="width: 250px">
                                            <input type="file" name="fileToUpload" id="fileToUpload" onchange="loadfile(event)" required>
                                        </div>
                                        <br>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <div style="display: flex; flex-shrink: 0; flex-wrap: wrap; align-items: center; justify-content: flex-end; margin-top: -38px;">
                                            <button class="btn btn-danger" style="margin-right: 10px;" type="reset">Reset</button>
                                            <button class="btn btn-success" style="margin-right: 18px;" type="submit" name="save">Save</button>
                                        </div>
                                       <br>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>

                <?php 
                    if(isset($_GET["editc"]) == true){
                ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card" style="width: 100%">
                                <form action="controller.user.php?updatec='<?php echo $c["CourseID"] ?>'" method="post" enctype="multipart/form-data">
                                    <div style="margin-left:30px; margin-right:30px; margin-top:20px; margin-bottom:20px;">
                                        <h2>Update Data</h2><hr>
                                        <div>
                                            CourseID : <br>
                                            <input type="text" class="form-control" name="CourseID" placeholder="รหัสคอร์ส" value="<?php echo $c["CourseID"] ?>" readonly disabled required><br>
                                        </div>
                                        <div style="margin-top: -10px">
                                            CourseCode : <br>
                                            <input type="text" class="form-control" name="CourseCode" placeholder="เลขรหัสคอร์ส" value="<?php echo $c["CourseCode"] ?>" required><br>
                                        </div>
                                        <div style="margin-top: -10px">
                                            CourseName : <br>
                                            <input type="text" class="form-control" name="CourseName" placeholder="ชื่อคอร์ส" value="<?php echo $c["CourseName"] ?>" required><br>
                                        </div>
                                        <div style="margin-top: -10px">
                                            Image : <br>
                                            <img id="output" style="width: 250px">
                                            <input type="file" name="fileToUpload" id="fileToUpload" onchange="loadfile(event)">
                                        </div>
                                        <input type="text" name="oldimage" value="<?php echo $c["CourseImg"] ?>" hidden>
                                        <br>
                                        <a class="btn btn-danger" href='listcourse.php'>Back</a>
                                        <div style="display: flex; flex-shrink: 0; flex-wrap: wrap; align-items: center; justify-content: flex-end; margin-top: -38px;">
                                            
                                            <button class="btn btn-danger" style="margin-right: 10px;" type="reset">Reset</button>
                                            <button class="btn btn-success" type="submit" name="save">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                        </div>
                    </div>
                <?php 
                    }else{
                ?>
                <a class="btn btn-success" data-bs-toggle='modal' data-bs-target='#myModal'>Add data</a><br><br>
                <table border="1" class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CourseCode</th>
                            <th>CourseName</th>
                            <th>CourseImg</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //echo "debug<br>";
                        //print_r($product_list);
                        foreach ($course_list as $c) {
                            echo "<tr>";
                            echo "<td>" . $c["CourseID"] . "</td>";
                            echo "<td>" . $c["CourseCode"] . "</td>";
                            echo "<td>" . $c["CourseName"] . "</td>";
                            echo "<td><img style='width:60px' src='" . $c["CourseImg"] . "'></td>";
                            echo "<td><a class='btn btn-warning' href='listcourse.php?editc=".$c["CourseID"]."'>edit</a> ";
                            ?>
                            <a href="JavaScript:if(confirm('Confirm?')==true){window.location='controller.user.php?opt=del&idc=<?php echo $c["CourseID"];?>';}" class="btn btn-danger">Delete</a>
                            <?php
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <?php 
                    }
                ?>
            </div>

        </div>
        </div>
    </div>
</body>

</html>
<script>
    let table = new DataTable('#myTable');
    var loadfile = function(event){
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function(){
            URL.revokeObjectURL(output.src);
        }
    }
</script>