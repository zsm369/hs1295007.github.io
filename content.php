<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['login'])) {
        header("Location: login.php");
    }
?>
<html>
<head>

<style type="text/css">
 
 
table, td{
border: 1px solid
}

table{
height: 100px;

text-align: center;
}

</style>


<?php

$con=mysqli_connect("localhost","root","hansung","guest");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
echo "거리값 불러오기";
echo "<br>";
echo "<br>";
$result = mysqli_query($con,"SELECT count FROM guest ORDER BY id DESC LIMIT 1");

echo "<table border='1'>
<tr>
<th>count value</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  
  echo "<tr>";
  echo "<td>" . $row['count'] . "</td>";
  echo "</tr>";
  
  }
echo "</table>";

echo "<br>";




mysqli_close($con);
?>
    <title> Content Page </title>
</head>
<body>
<h1> Content Page </h1>
<h2> Welcome <?=$_SESSION['login']?> </h2>
<hr>
<b> <a href="./logout.php" align="right"> Logout </a> </b>
</body>
</html>