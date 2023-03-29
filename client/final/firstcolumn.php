<div class="firstcolumn">

        <div class="">
            
            <div class="" style="    display: flex; margin-top:10px    ">
                <img src="assets/uploads/<?=$user['p_p']?>" class="w-25 rounded-circle" style="width: 18%!important;">
                <div class="fs-xs m-2" style="    font-family: unset;
    font-size: 21px;
    font-weight: 700;">
                    <?=$user['name']?>       <?=$user['lastname']?>
                </div>
               
            </div>
        </div>
        <div class="input-group mt-2">
            <input type="text" placeholder="Search..." id="searchTextt" name="type" class="form-control">
            <button class="btn btn-primary" id="serachBtn">
                <i class="fa fa-search"></i>
            </button>
        </div>
        <ul id="chatList" class="">
            <?php if (!empty($conversations)) { ?>
            <?php  foreach ($conversations as $conversation){ ?>
            <li class="" style="    position: relative;right: 35px;width: 20pc;">
                <a id="main" href="final.php?user=<?=$conversation['username']?>" style="display:flex; justify-content: space-between;">
                    <div class="d-flex  align-items-center">
                        <img src="assets/uploads/<?=$conversation['p_p']?>" class="w-10 rounded-circle"
                            style="height: 3pc; width: 3pc;">
                        <h6 class="fs-xs m-2 " style="color:black; font-weight:500; margin-top:3px">
                            <?=$conversation['name']?><br>
                            <p class="text-secondary" style="font-size:12px"> 
                            <?php  echo  lastChat($_SESSION['user_id'], $conversation['user_id'], $conn);
                                            ;?>
                                        </p>
                        </h6>
                    </div>
                    <?php if (last_seen($conversation['last_seen']) == "Active") { ?>
                    <div title="online">
                        <div class="online"></div>
                    </div>
                    <?php }else{ ?>
                    <div class="offline"> </div>
                    <?php  } ?>
                </a>
            </li>
            <?php } ?>
            <?php }else{ ?>
            <div class="alert alert-info text-center">
                <i class="fa fa-comments d-block fs-big"></i>
                No messages yet, Start the conversation
            </div>
            <?php } ?>
        </ul>


    </div>