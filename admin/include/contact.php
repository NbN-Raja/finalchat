<?php 

include_once 'model/db.php';
$sql = "SELECT id,name, email,message FROM contact";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    // $imageURL = 'uploads/'.$row["p_p"];
    $id="".$row['id'];
    $name= "".$row["name"];
    $email= "".$row["email"];
    $message= "".$row["message"];
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<table class="table">
  <thead>
    <tr>
      <th scope="col"> Id </th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Message</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <td> <?php echo "".$row['id']."" ?> </td>
      <td><?php echo  "".$row['name']."" ?></td>
      <td><?php echo "".$row['email']."" ?></td>
      <td><?php echo "".$row['message']."" ?></td>
      <td>  </td>
      
     


    </tr>
  </tbody>
</table>



  </body>
  </html>









<?php

  }
}

?>