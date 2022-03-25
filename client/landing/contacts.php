<div class="thirdcolumn">
            
            



            <ul id="chatList" class="chatList">
                <p id="contact">Contacts</p>
                <?php if (!empty($conversations)) { ?>
                <?php 

    			    foreach ($conversations as $conversation){ ?>
                <li>
                    <a href="client/final.php?user=<?=$conversation['username']?>">
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
        <style> 
        ul{
    background-color: rgb(255 255 255);
}
</style>
