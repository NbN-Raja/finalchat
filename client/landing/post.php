<div class="posting">
    <form action="client/posting.php" method="post" enctype="multipart/form-data" class="post">
        <div class="" style="display:flex ;     justify-content: space-around;">
    <p> <b> Image Post  </b> </p>
        <a class="openButton" onclick="openForm()"><strong>Text Post</strong></a>
        
        </div>
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
        <div class="image-upload" style="display: flex; justify-content: space-around;">
            <label for="file-input">
                <img src="https://www.freeiconspng.com/uploads/no-image-icon-13.png" width="36" alt="Png Transparent No" />
        </label>
        <input id="file-input" type="file" name="file" />
         <button type="submit" name="submit" class="myButton"> Post </button>
        </div>
    </form>
</div>


<!-- popup form -->




    
    <style>
     
        form{
            background-color: white;
            
        }
      
      .formPopup {
        display: none;
        position: fixed;
        left: 47%;
        top: 13%;
        transform: translate(-50%, 5%);
        
        z-index: 2;
        -webkit-transition: 0.5s;
        
      }
      
      #cancel{
        position: relative;
    top: -11pc;
    left: 30pc;
    background-color: white;

      }
     
      
      
    
    </style>
 
    
      <div class="formPopup" id="popupForm">
      <form action="client/posting.php" method="post" enctype="multipart/form-data" class="post">
        <p> <b> Text Post  </b> </p>
        
        
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
        <div class="image-upload" style="display: flex; justify-content: space-around;">
            <label for="file-input">
                <img src="https://www.freeiconspng.com/uploads/no-image-icon-13.png" width="36" alt="Png Transparent No" />
        </label>
        <input id="file-input" type="file" name="file" />
         <button type="submit" name="submitt" class="myButton"> Post </button>
        </div>
    </form>
          <button type="button" class="btn cancel" id="cancel" onclick="closeForm()">X</button>
        </form>
      </div>
    
    <script>
      function openForm() {
        document.getElementById("popupForm").style.display = "block";
      }
      function closeForm() {
        document.getElementById("popupForm").style.display = "none";
      }
    </script>
 