<html>
<body>
<?php
error_reporting(0);

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$fathername=$_POST['fatherfullname'];
$mothername=$_POST['motherfullname'];
$cityname=$_POST['city'];
$statename=$_POST['state'];
$zipnumber=$_POST['zip'];
$Emailaddress=$_POST['email'];
$phonenumber1=$_POST['phonenumber'];
$phonenumber2=$_POST['alternatephonenumber'];
$branchname=$_POST['branch'];
$gendersex=$_POST['Gender'];
$nation=$_POST['nationality'];
$caste=$_POST['community'];
$addr1=$_POST['address1'];
$addr2=$_POST['address2'];
$birth=$_POST['dob'];
$passyear=$_POST['12thpassingyear'];
$sname=$_POST['schoolname'];
$sboard=$_POST['schoolboard'];
$cname=$_POST['collegename'];
$cboard=$_POST['collegeboard'];
$cgpatenth=$_POST['10thcgpa'];
$cgpatwelvhth=$_POST['12thcgpa'];
$eamcet=$_POST['eamcetrank'];
$jee=$_POST['jeerank'];
/*$tenthc=$_POST['10thcertificate'];
$twelvthc=$_POST['12thcertificate'];
$bonafile=$_POST['bonafide'];*/


$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="admissiondetails";
$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
if(mysqli_connect_error()){
	die('Connect Error('.mysql_connect_errno().')'.mysqli_connect_error());	
}
else{
	$INSERT="insert into details(firstname,lastname,fatherfullname,motherfullname,city,state,zip,email,phonenumber,alternatephonenumber,branch,Gender,nationality,
	community,address1,address2,dob,12thpassingyear,schoolname,schoolboard,collegename,collegeboard,10thcgpa,12thcgpa,eamcetrank,jeerank) values('$firstname','$lastname','$fathername','$mothername','$cityname','$statename','$zipnumber',
	'$Emailaddress','$phonenumber1','$phonenumber2','$branchname','$gendersex','$nation','$caste','$addr1','$addr2','$birth','$passyear','$sname','$sboard','$cname','$cboard','$cgpatenth','$cgpatwelvhth','$eamcet'
,'$jee')";

$run=mysqli_query($conn,$INSERT) or die(mysqli_error($conn));
if($run){
	echo "<strong>Form submitted successfully</strong>.<hr>";	
}
else{
	echo"<strong>Form not submitted</strong>.<hr>";
}
/*$SELECT="SELECT* from details where firstname=$firstname";
$display=mysqli_query($conn,$SELECT) or die(mysqli_error($conn));
$output=mysqli_fetch_assoc($display);
echo $output['*'];

if($display){
	echo "Diaplaying.<br>";	
}
else{
	echo"Error.<br>";
}*/


$filename=$_FILES["10thcertificate"]["name"];
$tempname=$_FILES["10thcertificate"]["tmp_name"];
$folder="certificates/".$filename;
echo $folder;
move_uploaded_file($tempname,$folder);
$insert_img="INSERT into details(10thcertificate) values('$filename')";
if($insert_img){
	echo "<br><strong>-10thcertificate uploaded successfully</strong>.<br>";	
}
else{
	echo "<br>-<strong>10thcertificate not uploaded</strong>.<br>";
}
  
  
$filename2=$_FILES["12thcertificate"]["name"];
$tempname2=$_FILES["12thcertificate"]["tmp_name"];
$folder2="certificates/".$filename2;
echo $folder2;
move_uploaded_file($tempname2,$folder2);
$insert_img2="INSERT into details(12thcertificate) values('$filename2')";
if($insert_img2){
	echo "<br>-<strong>12thcertificate uploaded successfully.</strong><br>";
}
else{
	echo "<br>-<strong>12thcertificate not uploaded</strong>.<br>";
}

$filename3=$_FILES["bonafide"]["name"];
$tempname3=$_FILES["bonafide"]["tmp_name"];
$folder3="certificates/".$filename3;
echo $folder3;
move_uploaded_file($tempname3,$folder3);
$insert_img3="INSERT into details(12thcertificate) values('$filename3')";
if($insert_img3){
	echo "<br>-<strong>Bonafide uploaded successfully<strong>.<br>";
}
else{
	echo "<br>-<strong>Bonafide not uploaded</strong>.<br>";
}



}
/*$stmt=$conn->prepare($INSERT);
$stmt->bind_param("ssssssisiissssssssssssiiii",$firstname,$lastname,$fathername,$mothername,$cityname,$statename,$zipnumber,$Emailaddress,$phonenumber1,$phonenumber2,
$branchname,$gendersex,$nation,$caste,$addr1,$addr2,$birth,$passyear,$sname,$sboard,$cname,$cboard,$cgpatenth,$cgpatwelvhth,$eamcet,$jee);
$stmt->execute();*/

/*$image1=addslashes($_FILES['10thcertificate']['tmp_name']);
$images=file_get_contents($image1);
$img=base64_decode($images);

$image2=addslashes($_FILES['12thcertificate']['tmp_name']);
$img2=file_get_contents($image2);
$ima=base64_decode($img2);

$image3=addslashes($_FILES['bonafide']['tmp_name']);
$img3=file_get_contents($image3);
$ime=base64_decode($img3);

$query=mysqli_query($conn,"insert into details(10thcertificate,12thcertificate,bonafide)values('$img','$ima','$ime')") or die("query error");*/

//echo "new record inserted successfully";
//$stmt->close();
/*if($conn->query($INSERT)==True)
{
	echo"data is inserted";
}
else{
	echo"data is not inserted";
}*/

$conn->close();

?>
<script>window.alert("KUDOS!!! Your Details and Certificates have been UPLOADED SUCCESSFULLY!!");</script>
</body>
</html>