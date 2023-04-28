SELECT *
FROM `course`
LEFT JOIN `enroll` ON `enroll`.`EnrollCourseID`=`course`.`CourseID`
WHERE `course`.`CourseID` NOT IN (SELECT `enroll`.`EnrollCourseID` FROM `enroll` WHERE `enroll`.`EnrollUserID`=1032)