$(document).ready(function(){
    $("#publish-description").on('input', function(){
        var change = $(this).val().length
        var remain = 255 - change
        $("#publish-description").val(
            $(this).val()
            .replace("<", "&lt;")
            .replace(">", "&gt;")
        )
        $("#cha-remaining").html("เหลือ " + remain + " ตัวอักษร")
        if(remain <= 20){
            $("#cha-remaining").css("color", "red")
        } else if(remain == 255){
            $("#cha-remaining").html("")
        } else {
            $("#cha-remaining").css("color", "white")
        }
    })
    $("#manage-description").on('input', function(){
        var change = $(this).val().length
        var remain = 255 - change
        $("#manage-description").val(
            $(this).val()
            .replace("<", "&lt;")
            .replace(">", "&gt;")
        )
        $("#manage-remaining").html("เหลือ " + remain + " ตัวอักษร")
        if(remain <= 20){
            $("#manage-remaining").css("color", "red")
        } else if(remain == 255){
            $("#manage-remaining").html("")
        } else {
            $("#manage-remaining").css("color", "white")
        }
    })
    $("#report-detail").on('input', function(){
        var change = $(this).val().length
        var remain = 255 - change
        $("#report-detail").val(
            $(this).val()
            .replace("<", "&lt;")
            .replace(">", "&gt;")
        )
        $("#report-remaining").html("เหลือ " + remain + " ตัวอักษร")
        if(remain <= 20){
            $("#report-remaining").css("color", "red")
        } else if(remain == 255){
            $("#report-remaining").html("")
        } else {
            $("#report-remaining").css("color", "white")
        }
    })
    $("#logo").click(function(){
        window.location.href="index.php";
    })
    $("#login").click(function(){
        window.location.href="login.php";
    })
    $("#register").click(function(){
        window.location.href="register.php";
    })
    $("#btn-editprofile").click(function(){
        $("#info").hide()
        $("#changepwd").hide()
        $(".managepost").hide()
        $("#managepost").hide()
        $("#manageticket").hide()
        $("#edit-info").css("display", "grid")
        if($(window).width() < 850){
            $("#edit-info").css("display", "block")
        }
        $("#edit-info").fadeIn()
    })
    $("#btn-managepost").click(function(){
        $("#info").hide()
        $("#changepwd").hide()
        $("#edit-info").hide()
        $("#manageticket").hide()
        $("#managepost").fadeIn()
        $(".managepost").fadeIn()
    })
    $("#btn-changepwd").click(function(){
        $("#info").hide()
        $("#manageticket").hide()
        $("#edit-info").hide()
        $(".managepost").hide()
        $("#managepost").hide()
        $("#changepwd").fadeIn()
    })
    $("#btn-ticket").click(function(){
        $("#info").hide()
        $("#edit-info").hide()
        $(".managepost").hide()
        $("#managepost").hide()
        $("#changepwd").hide()
        $("#manageticket").fadeIn()
    })
    $("#btn-closeedit").click(function(){
        $("#edit-info").hide()
        $("#info").fadeIn()
    })
    $("#btn-closechangepwd").click(function(){
        $("#changepwd").hide()
        $("#info").fadeIn()
    })
    $("#btn-closemanagepost").click(function(){
        $("#managepost").hide()
        $(".managepost").hide()
        $("#info").fadeIn()
    })
    $("#btn-closemanageticket").click(function(){
        $("#manageticket").hide()
        $("#info").fadeIn()
    })
    $("#tutorpublish").click(function(){
        $(".publish").fadeToggle()
    })
})