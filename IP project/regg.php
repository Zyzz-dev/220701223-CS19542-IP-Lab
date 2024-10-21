<?php
error_reporting(0);
?>
<?php
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$address=$_POST['address'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$course=$_POST['course'];
$stream=$_POST['stream'];
$enroll=$_POST['enroll'];
$ta=$_POST['ta'];
$sub=$_POST['submit'];


$room="";

$UploadedFileName=$_FILES['ufile']['name'];

$conn=new mysqli("localhost","root","","dhruv");
if($conn->connect_error)
{
    echo"not connected".connect_error();
}


mysqli_select_db($conn,"dhruv");
if(isset($sub)) //Checks if the submit button is pressed
{
    if(isset($_POST["mt"])) //checks if any interest is checked
    {
        foreach($_POST["mt"] as $value) //Iterate the interest array and get the values
        {   
            $room=$room." ".$value;
           
        }}}  



  $query1="CREATE TABLE hostel(Path text,Firstname text,Lastname text,Address text,Email text,Phone_Number int,Course text,Stream text,Enrollment int,Details text,Requests text)";
  $query2="INSERT INTO hostel VALUES ('$UploadedFileName','$fname','$lname','$address','$email','$phone','$course','$stream','$enroll','$room','$ta')";

   if(mysqli_query($conn,$query2))
      { echo " Values Entered in table user"; }

    else {  
        mysqli_query($conn,$query1); 
        mysqli_query($conn,$query2);    
        echo " Table Created and Values Entered "; 
    }
       
       
header("location:done.html");

?>