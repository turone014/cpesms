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

     
      $pr0subcode          =$_POST["pnsc"];
      $pr0subdes           =$_POST["pnsd"];
      $pr0subcys           =$_POST["pnscys"];
      $pr0day              =$_POST["pnday"];
      $pr0time             =$_POST["pntime"];
      $pr0units            =$_POST["pnunits"];
      

          $sql = "INSERT INTO ace_form_change (idstd,studentnumber,firstname,lastname,semester,academic,subjectcode,subjectdescription,subcys,day,time,units,psubjectcode,psubjectdescription,psubcys,pday,ptime,punits) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
          $stmtinsert = $db->prepare($sql);
          $result = $stmtinsert->execute([ $id,$stdnumber,$firstname,$lastname, $semesters, $academicyears, $r0subcode, $r0subdes, $r0subcys, $r0day, $r0time, $r0units, $pr0subcode, $pr0subdes, $pr0subcys, $pr0day, $pr0time, $pr0units]);
      }else{
      	echo 'no data';
      }



      ?>