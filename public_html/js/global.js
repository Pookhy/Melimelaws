jQuery(document).ready(function () {
    $.ajax({
        url: "index.php",
        type:"get",
        data: {t:"message", action: "allMessages"},
        success: function (msg) {
            $("#messages").html(msg);
        }
    })
})