<link rel="stylesheet" href="client/landing/css/index.css">
<link rel="stylesheet" href="client/landing/css/landing_page.css">
<script src="client/landing/js/script.js"> </script>

<div class="firstcolumn">
            <!-- User Search here  -->
            <ul id="chatList" style="display:inline-block;">
            <div id="cancel-btn" onClick="cancelHandler()">x</div>
                <?php if (!empty($conversations)) { ?>
                <?php 
    			    foreach ($conversations as $conversation){ ?>
                <?php } ?>
                <?php }else{ ?>
                <?php } ?>
            </ul>

            
            <div class=" " style="  margin-left:10px;">
                <li>
                     <img src="client/assets/uploads/<?=$user['p_p']?>"
                      class="w-30 rounded-circle"
                    style="width:36px; height: 36px; left: 19pc;">
                    <b class="caret">
                         <?php echo htmlspecialchars($_SESSION["name"]); ?></a>
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
                    width="36">  <a href="client/fina.php"> Message </a> 
                </li>
                <li>
                    <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/YF1bztyGuX-.png" height="36"
                    width="36">  <a href="groupchatt/index.php"> Group Chat </a> 
                </li>
                <li >
                    
                    <img src="client/assets/img/icon/settings.png" style="height: 28px;width: 35px;"   >    
                    <a href="client/settings.php"> Settings </a>
                </li>
             
                

            </div>


            <!-- chat lists  -->
            <div class="messageusers" id="messageContainer">
               

                
            </div>
            
           
        </div>
         
        <!-- Css Link -->
        <style>
.firstcolumn {
    width: 10%;
    position: fixed;
    left: 2pc;
    top: 5pc;
    border: 1px solid rgb(238, 232, 232);
    border-radius: 10px;
    height: 18pc;
    width: 20pc;
    color: black;
    background-color: #ffffff;
    /* background-color: #7b90ce;
    background-image: linear-gradient( 
86deg
 ,#5e77c2 10%,#4963ac 100%); */
}

.firstcolumn li {
    list-style: none;
    padding: 10px;


}

    /* message container */
    .messageContainer {
        transform: translate(10px); 
        height: 100vh;
        width: 100%;
    }

        </style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

const chatList = document.querySelector("#chatList");
const cancelBtn = document.querySelector("#cancel-btn")

const cancelHandler = () => {
    chatList.style.display = "none"
}



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

console.log("hello")
    </script>