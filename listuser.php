<?php
    $showuser = "show";
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
    <title>List User</title>
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
                                <form action="controller.user.php?save" method="post" style="margin-left: 4%;">

                                    <div>
                                        <h2 style="margin-top: 20px; margin-bottom: -20px">Insert Data</h2>
                                        <!-- UserID : -->
                                        <input type="text"  name="UserID" placeholder="รหัสผู้ใช้" required disabled hidden><br><br>
                                        <div>
                                            UserFname : <br>
                                            <input type="text" class="form-control" style="width: 95%;" name="UserFname" placeholder="ชื่อ" required><br><br>
                                        </div>
                                        <div style="margin-top: -30px;">
                                            UserLname : <br>
                                            <input type="text" class="form-control" style="width: 95%;" name="UserLname" placeholder="นามสกุล" required><br><br>
                                        </div>
                                        <div style="margin-top: -30px;">
                                            UUsername : <br>
                                            <input type="text" class="form-control" style="width: 95%;" name="UUsername" placeholder="ชื่อผู้ใช้" required><br><br>
                                        </div>
                                        <div style="margin-top: -30px;">
                                            UPassword : <br>
                                            <input type="password" class="form-control" style="width: 95%;" name="UPassword" placeholder="รหัสผ่าน" required><br><br>
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
                    if(isset($_GET["edit"]) == true){
                ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card" style="width: 100%">
                                <form action="controller.user.php?update='<?php echo $u["UserID"] ?>'" method="post">
                                    <div style="margin-left:30px; margin-right:30px; margin-top:20px; margin-bottom:20px;">
                                        <h2>Update Data</h2><hr>
                                        <div>
                                            UserID : <br>
                                            <input type="text" class="form-control" name="UserID" placeholder="รหัสผู้ใช้" value="<?php echo $u["UserID"] ?>" readonly disabled required><br>
                                        </div>
                                        <div style="margin-top: -10px">
                                            UserFname : <br>
                                            <input type="text" class="form-control" name="UserFname" placeholder="ชื่อ" value="<?php echo $u["UserFname"] ?>" required><br>
                                        </div>
                                        <div style="margin-top: -10px">
                                            UserLname : <br>
                                            <input type="text" class="form-control" name="UserLname" placeholder="นามสกุล" value="<?php echo $u["UserLname"] ?>" required><br>
                                        </div>
                                        <div style="margin-top: -10px">
                                            UUsername : <br>
                                            <input type="text" class="form-control" name="UUsername" placeholder="ชื่อผู้ใช้" value="<?php echo $u["UUsername"] ?>" required><br>
                                        </div>
                                        <div style="margin-top: -10px">
                                            UPassword : <br>
                                            <input type="password" class="form-control" name="UPassword" placeholder="รหัสผ่าน" value="<?php echo $u["UPassword"] ?>" required><br>
                                        </div>
                                        
                                        <a class="btn btn-danger" href='listuser.php'>Back</a>
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
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //echo "debug<br>";
                        //print_r($product_list);
                        foreach ($user_list as $u) {
                            echo "<tr>";
                            echo "<td>" . $u["UserID"] . "</td>";
                            echo "<td>" . $u["UserFname"] . "</td>";
                            echo "<td>" . $u["UserLname"] . "</td>";
                            echo "<td>" . $u["UUsername"] . "</td>";
                            echo "<td>" . $u["UPassword"] . "</td>";
                            echo "<td><a class='btn btn-warning' href='listuser.php?edit=".$u["UserID"]."'>edit</a> ";
                            ?>
                            <a href="JavaScript:if(confirm('Confirm?')==true){window.location='controller.user.php?opt=del&id=<?php echo $u["UserID"];?>';}" class="btn btn-danger">Delete</a>
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