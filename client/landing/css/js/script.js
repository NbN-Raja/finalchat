



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