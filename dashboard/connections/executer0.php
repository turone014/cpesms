<?php
  session_start();
 
  require_once('../../PDO-connection.php');
  require_once('../../connection.php');


  $users = $_SESSION['name'];
  $query = mysqli_query ($con, "SELECT * FROM cpe_students WHERE stdnumber = '$users' ");
  $row=mysqli_fetch_array($query);
$firstname=$row["first_name"];
$lastname=$row["lastname"];
$middlename=$row["middlename"];
$stdnumber=$row["stdnumber"];
$id=$row["id"];
?>


<?php

if(isset($_POST)){
	    

      $semesters          =$_POST["semester"];
      $academicyears      =$_POST["acadyears"];
      $r0subcode          =$_POST["nsc"];
      $r0subdes           =$_POST["nsd"];
      $r0subcys           =$_POST["nscys"];
      $r0day              =$_POST["nday"];
      $r0time             =$_POST["ntime"];
      $r0units            =$_POST["nunits"];
      

          $sql = "INSERT INTO r0_form_std (idstd,studentnumber,firstname,lastname,semester,academic,subjectcode,subjectdescription,subcys,day,time,units) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
          $stmtinsert = $db->prepare($sql);
          $result = $stmtinsert->execute([ $id,$stdnumber,$firstname,$lastname, $semesters, $academicyears, $r0subcode, $r0subdes, $r0subcys, $r0day, $r0time, $r0units]);
      }else{
      	echo 'no data';
      }



      ?>