<link rel="stylesheet" href="client/landing/css/index.css">
<link rel="stylesheet" href="client/landing/css/landing_page.css">
<script src="client/landing/js/script.js"> </script>

            <div class=" firstcolumn ">
                
                <?php $phoo = $_SESSION['p_p']?>
                     <img src="client/assets/uploads/<?=$phoo?>"
                      class="w-30 rounded-circle"
                    style="width:64px; height: 64px;"> <br>
                    <b class="caret">
                         <?php echo htmlspecialchars($_SESSION["name"]); ?></a> <br>
                         <?php echo htmlspecialchars($_SESSION["lastname"]); ?></a>   
                 </b> 
                 
                 <p class="bio text-center">
                     <a href="client/bioupdate.php?user=<?=$user['username']?>&bio=<?=$user['bio']?>" style="color:black" >  
                 Hello Designer 
                
                </a> </p> 
                <hr>
            </div>

            


            <!-- chat lists  -->
            <div class="messageusers" id="messageContainer">
               
  <!-- User Search here  -->
  <ul id="chatList" >
            
            <?php if (!empty($conversations)) { ?>
                
            <?php 
                foreach ($conversations as $conversation){ ?>
                
            <?php } ?>
            <?php }else{ ?>
            <?php } ?>
        </ul>
                
            </div>
            
            <div class="mycard">
           
            </div>
           
         
        <!-- Css Link -->
        <style>

.firstcolumn{
    position: sticky;
    top: 50px;
    background-color: white;
    text-align: center;
    padding: 10px;
    border-radius: 10px;
}
a{
    text-decoration: none;
}
li a{
    list-style: none;
    text-decoration: none;
    color: black;

}
 li  {
    list-style: none;
    text-decoration: none;

    padding: 10px;
    font-family: Montserrat, sans-serif;


}

.caret{
    font-weight: 600;

}
    /* message container */
    .messageContainer {
        transform: translate(10px); 
        height: 100vh;
        width: 100%;
    }

    #cancel-btn{
        position:relative;
       
    }

    li img{
        
    }
    
    .bio{
        font-size: 15px;
   ;
   text-shadow: 1px 0px 20px #9e6f6f;
    margin: 10px 9px 10px;
    text-align: justify;
    /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */
    }

        </style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>






$('.main').click(function(){
   $('#chatList').hide(); //hide modal
})



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

    <style>
@import url('https://fonts.googleapis.com/css?family=Montserrat');



/* body {
    background-color: #28223f;
    font-family: Montserrat, sans-serif;

    display: flex;
    align-items: center;
    justify-content: center;

    min-height: 100vh;
    margin: 0;
}

h3 {
    margin: 10px 0;
}

h6 {
    margin: 5px 0;
    text-transform: uppercase;
}

p {
    font-size: 14px;
    line-height: 21px;
} */
        </style>