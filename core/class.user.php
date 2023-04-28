<?php
class user
{
    private $db;
    private $UserID;
    private $UserFname;
    private $UserLname;
    private $UserAddress;
    const value = "Value";

    public function __construct(){
        define("USER","root");
        define("PWD","");
        define("CONFIG","mysql:host=localhost;dbname=workshop;charset=utf8");
        // $user = "root";
        // $pass = "";
        // $config = "mysql:host=localhost;dbname=workshop;charset=utf8";
        //echo "test<br>";
        //echo user::value."<br>";
        try{
            $this->db = new PDO(CONFIG, USER, PWD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
    public function closeconnect()
    {
        $this->db = null;
    }
    public function insertuser($UserFname, $UserLname, $UUsername, $UPassword)
    {
        $sql = "INSERT INTO `user`(`UserFname`, `UserLname`, `UUsername`, `UPassword`, `Ustatus`) 
                VALUES (:UserFname, :UserLname, :UUsername, :UPassword, '2')";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":UserFname",      $UserFname,  PDO::PARAM_STR);
        $stmt->bindValue(":UserLname",      $UserLname, PDO::PARAM_STR);
        $stmt->bindValue(":UUsername",      $UUsername, PDO::PARAM_STR);
        $stmt->bindValue(":UPassword",    $UPassword,   PDO::PARAM_STR);
        //$stmt->debugDumpParams();
        return $stmt->execute();
    }
    public function insertcourse($CourseCode, $CourseName, $target_file)
    {
        $sql = "INSERT INTO `course`(`CourseCode`, `CourseName`, `CourseImg`) 
                VALUES (:CourseCode, :CourseName, :CourseImg)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":CourseCode",      $CourseCode,  PDO::PARAM_STR);
        $stmt->bindValue(":CourseName",      $CourseName, PDO::PARAM_STR);
        $stmt->bindValue(":CourseImg",      $target_file, PDO::PARAM_STR);
        //$stmt->debugDumpParams();
        return $stmt->execute();
    }
    public function insertenrolluser($EnrollUserID, $EnrollCourseID)
    {
        $sql = "INSERT INTO `enroll`(`EnrollUserID`, `EnrollCourseID`) 
                VALUES (:EnrollUserID, :EnrollCourseID)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":EnrollUserID",      $EnrollUserID,  PDO::PARAM_STR);
        $stmt->bindValue(":EnrollCourseID",    $EnrollCourseID, PDO::PARAM_STR);
        //$stmt->debugDumpParams();
        return $stmt->execute();
    }
    public function updateuser($UserID, $field)
    {
        $command = "UPDATE `user` SET ";
        $i = 0;
        foreach($field as $idx => $value){
            if($value != null){
                //echo "key[{$idx}] : = ".$_REQUEST[$idx]."<br>";
                $command .= ($i == 0?"{$idx} = '$value'":", {$idx} = '$value'");
                $i++;
            }
        }
        $command .= " WHERE `UserID` = {$UserID}";
        //echo $command;
        $this->db->exec($command);
    }
    public function updatecourse($CourseID, $field)
    {
        $command = "UPDATE `course` SET ";
        $i = 0;
        foreach($field as $idx => $value){
            if($value != null){
                //echo "key[{$idx}] : = ".$_REQUEST[$idx]."<br>";
                $command .= ($i == 0?"{$idx} = '$value'":", {$idx} = '$value'");
                $i++;
            }
        }
        $command .= " WHERE `CourseID` = {$CourseID}";
        //echo $command;
        $this->db->exec($command);
    }
    public function updateenrolluser($EnrollID, $field)
    {
        $command = "UPDATE `enroll` SET ";
        $i = 0;
        foreach($field as $idx => $value){
            if($value != null){
                //echo "key[{$idx}] : = ".$_REQUEST[$idx]."<br>";
                $command .= ($i == 0?"{$idx} = '$value'":", {$idx} = '$value'");
                $i++;
            }
        }
        $command .= " WHERE `EnrollID` = {$EnrollID}";
        //echo $command;
        $this->db->exec($command);
    }
    public function removeUser($id)
    {
        $sql = "DELETE FROM `user` WHERE `UserID` = :UserID";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":UserID",  $id,    PDO::PARAM_INT);
        $stmt->execute();
    }
    public function removeCourse($idc)
    {
        $sql = "DELETE FROM `course` WHERE `CourseID` = :CourseID";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":CourseID",  $idc,    PDO::PARAM_INT);
        $stmt->execute();
    }
    public function removeEnrollUser($ideu)
    {
        $sql = "DELETE FROM `enroll` WHERE `EnrollID` = :EnrollID";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":EnrollID",  $ideu,    PDO::PARAM_INT);
        $stmt->execute();
    }
    public function getUserByID($UserID)
    {
        $sql = "SELECT * FROM `user` WHERE `UserID` = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$UserID]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        //print_r($data);
        return $data;
    }
    public function getCourseByID($CourseID)
    {
        $sql = "SELECT * FROM `course` WHERE `CourseID` = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$CourseID]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        //print_r($data);
        return $data;
    }
    public function getEnrollUserByID($EnrollID)
    {
        $sql = "SELECT * FROM `enroll` WHERE `EnrollID` = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$EnrollID]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        //print_r($data);
        return $data;
    }
    public function user_list()
    {
        $sql = "SELECT * FROM `user`";
        $res = $this->db->query($sql);
        //print_r($res->fetchall());
        return $res->fetchall(PDO::FETCH_ASSOC);
    }
    public function course_list()
    {
        $sql = "SELECT * FROM `course`";
        $res = $this->db->query($sql);
        //print_r($res->fetchall());
        return $res->fetchall(PDO::FETCH_ASSOC);
    }
    public function enrollcourselist()
    {
        $sql = "SELECT * FROM `enroll`";
        $res = $this->db->query($sql);
        //print_r($res->fetchall());
        return $res->fetchall(PDO::FETCH_ASSOC);
    }
    public function courseuser_list($UserID)
    {
        $sql = "SELECT * FROM `course` WHERE `CourseID` NOT IN (SELECT `EnrollCourseID` FROM `enroll` WHERE `EnrollUserID` = '".$UserID."')";
        $res = $this->db->query($sql);
        //print_r($res->fetchall());
        return $res->fetchall(PDO::FETCH_ASSOC);
    }
    public function userenrollcourse_list($UserID)
    {
        $sql = "SELECT * 
        FROM `course`
        INNER JOIN `enroll` ON `course`.`CourseID`=`enroll`.`EnrollCourseID`
        WHERE `course`.`CourseID` IN (SELECT `EnrollCourseID` FROM `enroll` WHERE `EnrollUserID` = '".$UserID."') AND `enroll`.`EnrollUserID` = '".$UserID."'";
        $res = $this->db->query($sql);
        //print_r($res->fetchall());
        return $res->fetchall(PDO::FETCH_ASSOC);
    }
    public function enrollcourse($CourseID, $UserID)
    {
        $sql = "INSERT INTO `enroll`(`EnrollUserID`, `EnrollCourseID`) 
                VALUES (:UserID, :CourseID)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":UserID",      $UserID,  PDO::PARAM_INT);
        $stmt->bindValue(":CourseID",    $CourseID, PDO::PARAM_INT);
        //$stmt->debugDumpParams();
        return $stmt->execute();
    }
    public function unrollcourse($CourseID)
    {
        $sql = "DELETE FROM `enroll` WHERE `EnrollID` = :EnrollID";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":EnrollID",  $CourseID,    PDO::PARAM_INT);
        $stmt->execute();
    }
    public function loginuser($username, $password)
    {
        $passwordcv = md5($password);
        $sql = "SELECT * FROM `user` WHERE `UUsername` = :uusername AND `UPassword` = :upassword";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":uusername",  $username,    PDO::PARAM_STR);
        $stmt->bindValue(":upassword",  $passwordcv,    PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        //print_r($data);
        return $data;
    }
    public function regisuser($username, $password, $fname, $lname)
    {
        $passwordcv = md5($password);
        $sql = "INSERT INTO `user`(`UserFname`, `UserLname`, `UUsername`, `UPassword`, `Ustatus`) 
                VALUES (:UserFname, :UserLname, :UUsername, :UPassword, '2')";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":UserFname",      $fname,  PDO::PARAM_STR);
        $stmt->bindValue(":UserLname",    $lname, PDO::PARAM_STR);
        $stmt->bindValue(":UUsername",     $username,  PDO::PARAM_STR);
        $stmt->bindValue(":UPassword",    $passwordcv, PDO::PARAM_STR);
        //$stmt->debugDumpParams();
        return $stmt->execute();
    }
    public function regisfinduser($username)
    {
        $sql = "SELECT * FROM `user` WHERE `UUsername` = :uusername";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":uusername",      $username,  PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        //$stmt->debugDumpParams();
        return $data;
    }
    public function most5enroll()
    {
        $sql = "SELECT COUNT(`enroll`.`EnrollCourseID`) as `CEnrollCourseID`, `enroll`.`EnrollCourseID`, `course`.`CourseCode`, `course`.`CourseName`
        FROM `enroll`
        INNER JOIN `course` ON `enroll`.`EnrollCourseID`=`course`.`CourseID`
        GROUP BY `enroll`.`EnrollCourseID` ORDER BY `CEnrollCourseID` DESC
        LIMIT 5";
        $res = $this->db->query($sql);
        //print_r($res->fetchall());
        return $res->fetchall(PDO::FETCH_ASSOC);
    }
    public function countenroll()
    {
        $sql = "SELECT COUNT(`enroll`.`EnrollCourseID`) as `CEnrollCourseID`, `enroll`.`EnrollCourseID`, `course`.`CourseCode`, `course`.`CourseName`
        FROM `enroll`
        INNER JOIN `course` ON `enroll`.`EnrollCourseID`=`course`.`CourseID`
        GROUP BY `enroll`.`EnrollCourseID` ORDER BY `CEnrollCourseID` DESC";
        $res = $this->db->query($sql);
        //print_r($res->fetchall());
        return $res->fetchall(PDO::FETCH_ASSOC);
    }
}

?>
