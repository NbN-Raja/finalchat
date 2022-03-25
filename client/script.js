$(document).ready(function() {

    // Search
    $("#searchTextt").on("input", function() {
        var searchTextt = $(this).val();
        if (searchTextt == "") return;
        $.post('../server/ajax/searchh.php', {
                key: searchTextt
            },
            function(data, status) {
                $("#chatList").html(data);
            });
    });

    // Search using the button
    $("#serachBtn").on("click", function() {
        var searchTextt = $("#searchTextt").val();
        if (searchTextt == "") return;
        $.post('../server/ajax/searchh.php', {
                key: searchTextt
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


// Final.php Last Chat Sceen Here 
