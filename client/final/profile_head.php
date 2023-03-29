<div class="profile_head" style="display:flex ; justify-content: space-between;">
            <div class="profile" style="display:flex">

                <img src="assets/uploads/<?=$chatWith['p_p']?>" class="w-15 rounded-circle">

                <div class="">
                    <h3 class="display-2 fs-sm m-2">
                        <a>
                            <?=$chatWith['name']?>
                        </a> <br>
                        <!-- <div class="d-flex
               	              align-items-center" title="online">

                            <?php
                        if (last_seen($chatWith['last_seen']) == "Active") {
               	    ?>
                            <div class="online"></div>
                            <small class="d-block p-1">Online</small>
                            <?php }else{ ?>
                            <small class="d-block p-1">
                                Active:
                                <?=last_seen($chatWith['last_seen'])?>
                            </small>
                            <?php } ?>
                        </div> -->

                    </h3>
                </div>
            </div>
        </div>