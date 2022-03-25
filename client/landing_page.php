


<body>
<link rel="stylesheet" href="client/assets/css/landing_page.css">
<!-- Navigation Bar Here  -->

<?php include 'nav.php' ?>


<!--  -->



    <!-- Contain Here  -->
    <div class="containerr" style="display:flex; justify-content: space-between;">
        <div class="firstcolumn">
            <!-- User Search here  -->

            
            <div class=" " style="  margin-left:10px;">
                <li> <img src="client/assets/uploads/<?=$user['p_p']?>" class="w-30 rounded-circle"
                        style="width:36px; height: 36px; left: 19pc;">
                    <b class="caret"> <?php echo htmlspecialchars($_SESSION["name"]); ?></a>
                        <?=$user['lastname']?>

                </li> </b>
            </div>
            <div class="profile">
                <li>
                 <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yx/r/-XF4FQcre_i.png"
                    width="36" height="36">

                <a href="client/home.php"> Profile </a> 
                </li>
                <li>
                    <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/YF1bztyGuX-.png" height="36"
                    width="36">  <a href="client/final_one.php"> Message </a> 
                </li>
                <li >
                    
                    <img src="client/assets/img/icon/settings.png" style="height: 28px;width: 35px;"   >    
                    <a href="client/settings.php"> Settings </a>
                </li>
                <li>
                <img src="client/assets/img/icon/privacy.png" style="height: 28px;width: 35px;"   > 
                     <a href="client/settings.php"> Privacy </a>
                </li>

            </div>
            <ul id="chatList" style="display:inline-block;">
                <?php if (!empty($conversations)) { ?>
                <?php 
    			    foreach ($conversations as $conversation){ ?>
                <?php } ?>
                <?php }else{ ?>
                <?php } ?>
            </ul>
        </div>

        <div class="secondcolumn" >
            <?php
		// Include the database configuration file
		// Database configuration
		$dbHost     = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbName     = "chat_app_db";
		
		// Create database connection
		$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
		
		// Check connection
		if ($db->connect_error) {
			die("Connection failed: " . $db->connect_error);
		}

		$query = $db->query("SELECT images.id, images.name,images.file_name,images.something,images.uploaded_on,users.user_id,
		users.name, users.lastname, users.p_p FROM images
		  LEFT JOIN users ON users.name = images.name Order by images.id DESC");
		while($data = mysqli_fetch_array($query))
		{	
		?>
        
            <div class="" style="background-color: #d0d0d0;  border-top-left-radius: 15px; border-top-right-radius: 15px;padding: 10px; width: 560px;"  >
                <div class="" style="display: flex;">
                    <div class="">
                        <img src="<?php echo  'client/assets/uploads/'.$data["p_p"]; ?>" width="10" height="20"
                            style="width:3pc; height:3pc; position:relative; left:0px; border-radius:50%; top: 4px;">
                    </div>
                    <div class="" style="margin-left: 10px;">
                        <b> <?php echo $data['name']; ?> <?php echo $data['lastname']; ?> </b><br>
                        <?php echo $data['uploaded_on']; ?> <br>
                    </div>
                </div>
                <?php echo $data['something']; ?> <br>





                

            </div> 

            <img class="image" src="<?php echo  'client/assets/post/'.$data["file_name"]; ?>" height="50" style="width:35pc"><br>

            
            
            <div class=" comment">
                <div class="bg-white">
                    <div class="d-flex flex-row fs-12 justify-content: space-between;">
                        <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Like</span></div>
                        <div class="like p-2 cursor"><i class="fa fa-commenting"></i><span class="ml-1">Comment</span></div>
                        <div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
                    </div>
                </div>
                <hr>
                <form action="comment.php" method="POST" class="form">
                    <div style="display: flex;     margin-top: 15px;     justify-content: space-evenly;">
                        <input type="hidden" name="name" value=<?php echo ($_SESSION["name"]); ?>
                            placeholder="Display Name">
                        <div>
                            <img src="client/assets/uploads/<?=$user['p_p']?>" style="width: 36px; height: 36px; border-radius: 50%;">
                        </div>
                        <div >
                            <input id="comment" type="text" name="comment" placeholder="Enter your Comment" >
                        </div>
                        <div class="">
                            <input type="submit" name="submit" class="btn">
                        </div>
                    </div>
                    
                </form> <br> <br>
            </div>
            <!-- show -->
<hr>

            <?php
		}
		?>



    
        </div>
        <div class="posting"> 
        <form action="client/posting.php" method="post" enctype="multipart/form-data" class="post">
            <p> <b> Post Here </b> </p>
            <input type="hidden" name="name" value=<?php echo htmlspecialchars($_SESSION["name"]); ?>
                placeholder="Display Name">

            <div class="image_post" style="display: flex; ">
                <div class="">
                    <img src="client/assets/uploads/<?=$user['p_p']?>" class="w-30 rounded-circle"
                        style="width:36px; height: 36px; left: 19pc;">
                </div>

                <div class="">

                    <input type="text" name="something"
                        placeholder="Whats on Your Mind  <?php echo htmlspecialchars($_SESSION["name"]); ?> ?"> <br>
                </div>
            </div>
            <hr>
            <input type="file" name="file">

            <input type="submit" name="submit" value="post">
        </form>
    </div>

        <div class="thirdcolumn">
            
            



            <ul id="chatList" class="chatList">
                <p id="contact">Contacts</p>
                <?php if (!empty($conversations)) { ?>
                <?php 

    			    foreach ($conversations as $conversation){ ?>
                <li>
                    <a href="final.php?user=<?=$conversation['username']?>">
                        <div style="display: flex;">
                            <img src="client/assets/uploads/<?=$conversation['p_p']?>" class="w-10 rounded-circle"
                                style="width: 36px; height: 36px;">
                            <p> <?=$conversation['name']?><br> </p>
                            <p> <?=$conversation['lastname']?><br> </p>
                        </div>
                    </a>
                </li>
                <?php } ?>
                <?php }?>
            </ul>

        </div>
    </div>






</body>

</html>



<style>

.profile a{
    font-size: 0.94rem;
    font-weight: 500;


}


.firstcolumn {
    width: 10%;
    position: fixed;
    left: 2pc;
    top: 5pc;
    border: 1px solid rgb(238, 232, 232);
    border-radius: 10px;
    height: 19pc;
    width: 20pc;
    color: black;
    background-color: #d0d0d0;
    /* background-color: #7b90ce;
    background-image: linear-gradient( 
86deg
 ,#5e77c2 10%,#4963ac 100%); */
}

.firstcolumn li {
    list-style: none;
    padding: 10px;


}

.secondcolumn {
    margin-top: 80px;
    position: relative;
    left: 28pc;
    top: 205px;
    /* border: 1px solid hsl(0, 2%, 81%); */
    padding: 3px;
}



.secondcolumn img {
    position: relative;
    left: 0pc;
    top: -2px;
    width: 23pc;
    height: 30pc;
}

.comment {
    position: relative;
    left: 0pc;
    top:-2px;
    height: 117px;
    background-color: #d0d0d0;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    width: 560px;
}
.comment input[type="text"] {
    width: 25pc;
    margin-top: 4pc;
    height: 28px;
    margin: 0 auto;
    border: none;
    border: solid 1px #ccc;
    border-radius: 10px;
    margin-top: 6px;

}

.btn{
    font-size: 0.9rem;
    font-weight: 600;
    background-color: #f8f9fa;
    margin: 0px;
    padding: 0px;
    margin-left: 13px;
    margin-top: 6px;

}

.thirdcolumn {
    width: 10%;
    position: fixed;
    left: 70pc;
    top: 6pc;
    width: 20pc;
}

.posting{
    position: relative;
    left: -32pc;
    height: 11pc;
    top: 5pc;
    width: 35pc;
}

.posting form {
    background-color: rgb(219, 219, 217);
    /* background-color: #7b90ce;
    background-image: linear-gradient( 86deg,#5e77c2 10%,#4963ac 100%); */
    border-radius: 8px;
    border: 1px solid #f0e9e9;
    /* position: relative; */
    position: sticky;
    left: 28pc;
    width: 35pc;
}

.chatList {
    background-color: rgb(219, 219, 217);
    /* background-color: #7b90ce;
    background-image: linear-gradient( 
86deg
 ,#5e77c2 10%,#4963ac 100%); */
    border-radius: 8px;
    margin: 0px;
    padding: 12px;
    margin-top: -4pc;
}


.chatList li {
    list-style-type: none;

}

#contact {
    font-size: 1.5rem;
    font-weight: 600;
    color: #56565c;

}

.chatList p {
    font-size: .9375rem;
    font-weight: 500;
    padding: 4px;
    color: rgb(12, 8, 8);
}


.profile {
    margin-left: 10px;
    color: black;
}

.profile a {
    color: black;
}



label {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}


.post {
    border: 1px solid black;
    padding: 10px;
}

.post input[type="text"] {
    border-radius: 21px 1px 26px 40px;
    background-color: rgb(229 226 233 / 2%);
    width: 28pc;
    margin-left: 14px;
}
.post ::placeholder {
  color: rgb(75, 72, 72);
  font-size: 0.945rem;
    font-weight: 600;
    margin-left: 9px;

}



.d-flex {
    display: -ms-flexbox!important;
    display: flex!important;
    justify-content: space-between;
}

.bg-white{
    width: 92%;
    background-color: #e8e5e50d!important;
    border-radius: 10px;
}


</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function() {

    // Search
    $("#searchText").on("input", function() {
        var searchText = $(this).val();
        if (searchText == "") return;
        $.post('server/ajax/search.php', {
                key: searchText
            },
            function(data, status) {
                $("#chatList").html(data);
            });
    });

    // Search using the button
    $("#serachBtn").on("click", function() {
        var searchText = $("#searchText").val();
        if (searchText == "") return;
        $.post('server/ajax/search.php', {
                key: searchText
            },
            function(data, status) {
                $("#chatList").html(data);
            });
    });


    /** 
    auto update last seen 
    for logged in user
    **/
    let lastSeenUpdate = function() {
        $.get("app/ajax/update_last_seen.php");
    }
    lastSeenUpdate();
    /** 
    auto update last seen 
    every 10 sec
    **/
    setInterval(lastSeenUpdate, 10000);

});
</script>