<?php 

include_once 'model/db.php';
$sql = "SELECT comment.id,comment.name, comment.comment, images.file_name,images.id
FROM images
INNER JOIN comment 
ON comment.photo_id=images.id";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    // $imageURL = 'uploads/'.$row["p_p"];
    // $id="".$row['id'];
    // $name="".$row['name'];
    // $comment= "".$row["comment"];
    // $file_name= "".$row["file_name"];
 
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
      
      <th scope="col">Name</th>
      <th scope="col">comment</th>
      <th scope="col">Photo</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td><?php echo  "".$row['name']."" ?></td>
      <td><?php echo "".$row['comment']."" ?></td>
      <td> <img src="../client/assets/post/<?=$row['file_name']?>"
                                                 width="55px"
                                                height="55px" /> </td>
      
     


    </tr>
  </tbody>
</table>

<?php 

} 
}

?>

</body>
</html>

