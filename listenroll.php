<?php
    $showenrolluser = "show";
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
    <title>List Enroll</title>
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
                                <form action="controller.user.php?saveeu" method="post" style="margin-left: 4%;">

                                    <div>
                                        <h2 style="margin-top: 20px; margin-bottom: -20px">Insert Data</h2>
                                        <!-- UserID : -->
                                        <input type="text"  name="UserID" placeholder="รหัสผู้ใช้" required disabled hidden><br><br>
                                        <div>
                                            EnrollUserID : <br>
                                            <input type="text" class="form-control" style="width: 95%;" name="EnrollUserID" placeholder="รหัสผู้ใช้" required><br><br>
                                        </div>
                                        <div style="margin-top: -30px;">
                                            EnrollCourseID : <br>
                                            <input type="text" class="form-control" style="width: 95%;" name="EnrollCourseID" placeholder="รหัสคอร์ส" required><br><br>
                                        </div>

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
                    if(isset($_GET["editeu"]) == true){
                ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card" style="width: 100%">
                                <form action="controller.user.php?updateeu='<?php echo $e["EnrollID"] ?>'" method="post">
                                    <div style="margin-left:30px; margin-right:30px; margin-top:20px; margin-bottom:20px;">
                                        <h2>Update Data</h2><hr>
                                        <div>
                                            EnrollID : <br>
                                            <input type="text" class="form-control" name="EnrollID" placeholder="รหัสลงทะเบียน" value="<?php echo $e["EnrollID"] ?>" readonly disabled required><br>
                                        </div>
                                        <div>
                                            EnrollUserID : <br>
                                            <input type="text" class="form-control" name="EnrollUserID" placeholder="รหัสผู้ใช้" value="<?php echo $e["EnrollUserID"] ?>" required><br>
                                        </div>
                                        <div style="margin-top: -10px">
                                            EnrollCourseID : <br>
                                            <input type="text" class="form-control" name="EnrollCourseID" placeholder="รหัสคอร์ส" value="<?php echo $e["EnrollCourseID"] ?>" required><br>
                                        </div>
                                        <div style="margin-top: -10px">
                                            Time : <br>
                                            <input type="text" class="form-control" name="EnrollTime" placeholder="เวลา" value="<?php echo $e["EnrollTime"] ?>" required disabled><br>
                                        </div>
                                        
                                        <a class="btn btn-danger" href='listenroll.php'>Back</a>
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
                            <th>EnrollID</th>
                            <th>EnrollUserID</th>
                            <th>EnrollCourseID</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //echo "debug<br>";
                        //print_r($product_list);
                        foreach ($enrollcourse_list as $e) {
                            echo "<tr>";
                            echo "<td>" . $e["EnrollID"] . "</td>";
                            echo "<td>" . $e["EnrollUserID"] . "</td>";
                            echo "<td>" . $e["EnrollCourseID"] . "</td>";
                            echo "<td>" . $e["EnrollTime"] . "</td>";
                            echo "<td><a class='btn btn-warning' href='listenroll.php?editeu=".$e["EnrollID"]."'>edit</a> ";
                            ?>
                            <a href="JavaScript:if(confirm('Confirm?')==true){window.location='controller.user.php?opt=del&ideu=<?php echo $e["EnrollID"];?>';}" class="btn btn-danger">Delete</a>
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
</script>