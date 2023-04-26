<div class="profile_detail">
    <div class="image" style="text-align:center;    ">
        <img src="assets/uploads/<?= $chatWith['p_p'] ?>" width="98" height="90" style="border-radius: 50%; margin-left:10px;  text-align:center;    object-fit: cover;"> <br> <br>
        <p style="text-align: center;"> <b>
                <?= $chatWith['name'] ?>
                <?= $chatWith['lastname'] ?>
                <div class="d-flex -items-center" title="online">

                    <?php
                    if (last_seen($chatWith['last_seen']) == "Active") {
                    ?>
                        <div class="online"></div>
                        <small class="d-block p-1" style="margin-left: 91px; margin-bottom:10px;">Online</small>
                    <?php } else { ?>
                        <small class="d-block p-1" style="margin-left: 91px;">
                            Active:
                            <?= last_seen($chatWith['last_seen']) ?>
                        </small>
                    <?php } ?>
                </div>
            </b> </p>

    </div>



    <div class="">
        <div class="">
            <label> Gender: </label>
            <i> <?= $chatWith['gender'] ?> </i>
        </div>

        <div class="pb-4">
            <label> Email: </label>
            <i> <?= $chatWith['email'] ?> </i>
        </div>

        <div class="custom-file">
            <button class="open_chat_img circle" style="
                    background-color: #6b7179;
                    color: #f5f3f3;
                    border: 1px solid #000;
                    border-radius: 7px;
                    border: 1px solid white;
                    ">
                <i class="fa fa-cloud-upload"></i> Open Image
            </button>
        </div>
        <br>

        <!-- chat image fetch -->
        <div class="fetch_chat_img" style="display: none;">
            <p class="close_chat_img" style="margin-left: 0pc; font-size: 10px; border: 1px solid #3d3232; display: inline-block; width: 30px; background-color: #e7e6e6;">&lt;--</p>
            <p style="align-items: center; text-align: center; font-size: 20px; color: grey; font-weight: 700;">Images</p>
            <?php
            $conn = new mysqli('localhost', 'root', '', 'chat_app_db');
            $to = $chatWith['user_id'];
            $from = $_SESSION['user_id'];
            $image = "SELECT DISTINCT `chat_img`  FROM `chats` where (`from_id`='$to' and `to_id`='$from') OR (`to_id`='$to' and `from_id`='$from')";
            $result = $conn->query($image);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="image" style="margin: 5px; padding: 5px;">
                        <img src="assets/chatimg/<?= $row['chat_img'] ?> " width="100" height="100">
                    </div>
            <?php
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>





    <!-- Send Image here  -->

    <div class="">


        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" value=" <?php echo  $chat['from_id']   ?>" name="from_id">
            <input type="hidden" value="   <?php echo  $chat['to_id']    ?>" name="to_id">
            <label for="img_upload" class="custom-file-upload">
                <i class="fa fa-cloud-upload"></i> Send Image
            </label>
            <input type="file" name="chat_img" id="img_upload">
            <input type="submit" name="chatimg" class="img_submit"><br>

        </form>
        <?php

        if (isset($_POST['chatimg'])) {
            $from_id = $chat['from_id'];
            $to_id = $chat['to_id'];
            $filename = $_FILES["chat_img"]["name"];
            $tempname = $_FILES["chat_img"]["tmp_name"];
            $folder = "assets/chatimg/" . $filename;

            $db = mysqli_connect("localhost", "root", "", "chat_app_db");

            // Get all the submitted data from the form
            // $sql = "INSERT INTO chats (chat_img) VALUES ('$filename')";
            $sql = " INSERT INTO  chats (from_id, to_id, chat_img) 
        VALUES ('$from_id','$to_id' ,'$filename' )";
            // $sql ="UPDATE `chats` SET `chat_img` = 'chat_img' WHERE `chats`.`chat_id` = $chat_id";


            // Execute query
            mysqli_query($db, $sql);
        }


        ?>

    </div>
</div>

<style>
    .open_chat_img {
        display: inline-block;
        border: 1px solid #fff;
        border-radius: 1px;
        font-size: 15px;
        padding: 4px 16px;
        text-align: center;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .open_chat_img:hover {
        background-color: #fff;
        color: #000;
    }

    .custom-file-upload {
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
        color: #fff;
        background-color: #6b7179;
        border: 1px solid #f5f7f9;
        border-radius: 4px;
        font-size: 14px;
    }

    #img_upload {
        display: none;
    }

    .img_submit {
        background-color: white;
    }
</style>