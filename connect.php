<?php
$firstname =$_POST['firstname'];
$lastname =$_POST['lastname'];
$email =$_POST['email'];
$phone_number =$_POST['phone_number'];
$department =$_POST['department'];
$dob =$_POST['dob'];
$class =$_POST['class'];
$alt_phone =$_POST['alt_phone'];
$latitude =$_POST['latitude'];
$longitude =$_POST['longitude'];
$attached_dep =$_POST['attached_dep'];
$supervisor_no =$_POST['supervisor_no'];
$org_email =$_POST['org_email'];
$org_no =$_POST['org_no'];
$insured =$_POST['insured'];
$org_name =$_POST['org_name'];
$start_date =$_POST['start_date'];
$completion_date =$_POST['completion_date'];
$remark =$_POST['remark'];

//database connection
$conn = new mysqli('localhost','root','','attachment');
if($conn ->connect_error){
    die('Connection Failed  :'.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into tbl_form(firstname,lastname,email,phone_number,department,dob,class,alt_phone,latitude,longitude,attached_dep,supervisor_no,org_email,org_no,insured,org_name,start_date,completion_date,remark)values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?");
    $stmt->bind_param("sssssi", $firstname,$lastname,$email,$phone_number,$department,$dob,$class,$alt_phone,$latitude,$longitude,$attached_dep,$supervisor_no,$org_email,$org_no,$insured,$org_name,$start_date,$completion_date,$remark);
    $execval = $stmt->execute();
		echo $execval;
		echo "Submission successfully...";
		$stmt->close();
		$conn->close();
}

?>
