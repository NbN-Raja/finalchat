<?php 

include_once 'model/db.php';

$sql = "SELECT user_id,name, username,lastname, password,email,gender, p_p,report, is_blocked  FROM users where is_blocked=1;";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    // $imageURL = 'uploads/'.$row["p_p"];
    $user_id="".$row['user_id'];
    $p_p = "".$row['p_p'];
    $name= "".$row["name"];
    $lastname= "".$row["lastname"];
    $gender= "".$row["gender"];
    $email= "".$row["email"];
    $is_blocked= "".$row["is_blocked"];
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
    
        <div class="row">
            
            <div class="card w-100">
                
            
                <!-- /.card-header -->
                <div class="card-body">
                    
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#No</th>
                                <th>User</th>
                                <th>Actions</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td> #<?php echo $user_id ?> </td>
                                <td>
                                    <div class="d-flex">
                                        <div>
                                            <img src="../client/assets/uploads/<?=$row['p_p']?>"
                                                class="rounded-circle border border-2 shadow-sm mx-2" width="55px"
                                                height="55px" />
                                        </div>
                                        <div>
                                            <h5><?php echo $name ?>- <span class="text-muted">@<?php echo $name ?></span></h5>
                                            <h6 class="text-muted"><?php echo $email ?></h6>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    
                                    <!-- <button style="display:" class="m-1 btn btn-danger btn-sm block_user_btn ub"
                                        data-user-id="15"> <a href="include/blockuser.php"> Block </a></button> -->
                                    <!-- <button style="display:" class="m-1 btn btn-danger btn-sm block_user_btn ub"
                                        data-user-id="15"> <a type="button" value="1" name="block" Cursor="pointer"
                                         href="include/blockuser.php?uid=$user_id"> <?php echo $user_id ?></a></button> -->
                                         <!-- <a href="include/blockuser.php?uid=<?php echo $row['user_id']; ?>" class="del_btn">block</a> -->
                                        <?php 
                                        if($row["is_blocked"] ==1){
                                            echo '<p> <a href="include/blockuser.php?uid='.$row['user_id']. '&is_blocked=0">Block </a> </p>';

                                        }else{
                                            echo '<p> <a href="include/blockuser.php?uid='.$row['user_id']. '&is_blocked=1">Unblock </a> </p>';
                                        
                                        }
                                    ?>
                                        
                                </td>
                                <td>
                                <?php 
                                        if($row["report"] ==0){
                                            echo '<p> Active</p>';

                                        }else{
                                            echo '<p> Blocked </p>';
                                        
                                        }
                                    ?>

                                    </td>
                            </tr>
                            </tbody>
                    </table>
                </div>
            </div>
       
        </div>

</body>

</html>
<?php } ?>
<?php } ?>