<div class="thirdcolumn">
    <div class="lastpost">
      <!-- <p id="contact">Suggestions</p>


      <?php
      define('PUBLIC_PATH', dirname(__FILE__) . '/uploads/');


      $conn = new mysqli('localhost', 'root', '', 'chat_app_db');
      $sqll = "SELECT * FROM `users`    ORDER BY RAND() LIMIT 2";
      $result = mysqli_query($conn, $sqll);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>

          <div class="image" style="display: flex;">
            <img class="" src="client/assets/uploads/<?= $row['p_p'] ?>" width="30" height="30" style="border:2px solid white">

            <a href="client/user_profile.php?user=<?= $row['username'] ?>" style="color:black">
              <?php

              echo "<div class='name'>";
              echo "" . $row['name'] . " &nbsp" . $row['lastname'] . "";
              echo "</div> <br>";
              ?>
            </a>
          </div>


      <?php
        }
      }
      ?>
    </div> -->
    

    <ul id="chatList" class="chatList">
      <p id="contact">Contacts</p>
      <?php if (!empty($conversations)) { ?>
        <?php

        foreach ($conversations as $conversation) { ?>
          <li>
            <a href="client/final.php?user=<?= $conversation['username'] ?>">
              <div style="display: flex;">
                <img src="client/assets/uploads/<?= $conversation['p_p'] ?>" class="w-10 rounded-circle" style="width: 36px; height: 36px;">
                <p> <?= $conversation['name'] ?><br> </p>
                <p> <?= $conversation['lastname'] ?><br> </p>
              </div>
            </a>
          </li>
        <?php } ?>
      <?php } ?>
    </ul>

  </div>

  <style>
    
  </style>
  <style>
.lastpost{
    padding: 12px;
    margin-top: 9px;
}

.name{
    font-size: larger;
    font-weight: 500;
    font-family: inherit;
    margin-left:1pc;
    margin-top:2px;
}
.image img{
    
    border-radius: 32px;

}
.image{
    background-color: rgb(243, 243, 239);
}
.thirdcolumn{
    
    top: 4pc;
}
</style>