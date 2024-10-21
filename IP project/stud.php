<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/retrive.css">
 </head>   
<body>
    <form action="#" method="post">
  
   
     
      <button id="delete" input type="submit" formaction="home.html">Home Page</button>
<?php
$conn=new mysqli("localhost","root","","dhruv");
    if($conn->connect_error)
    {
    echo("connection failed".$conn->connect_error());    
        
    }

mysqli_select_db($conn,"dhruv");

$query1="Select * from hoste";
$result=mysqli_query($conn,$query1);
echo"<table><tr><th><h1>Image(Path)</h1></th><th><h1>FirstName</h1></th><th><h1>LastName</h1></th><th><h1>Address</h1></th><th><h1>Email</h1></th> <th><h1>Phone Number</h1></th><th><h1>Course</h1></th><th><h1>Stream</h1></th><th><h1>Enrollment</h1></th><th><h1>Details</h1></th><th><h1>Requests</h1></th></tr>";
if(mysqli_num_rows($result) > 0)
{
while($row=mysqli_fetch_assoc($result)) 
{
    
    echo"<tr><td>".$row['Path']."</td><td>".$row['Firstname']."</td> <td>".$row['Lastname']."</td><td>".$row['Address']."</td><td>".$row['Email']."</td><td>".$row['Phone_Number']."</td><td>".$row['Course']."</td><td>".$row['Stream']."</td><td>".$row['Enrollment']."</td><td>".$row['Details']."</td><td>".$row['Requests']."</td></tr>";
}
    
    echo"</table>";
}
else{
    echo"";
}
        
       
?>
         
    </form>
            </body>
</html>