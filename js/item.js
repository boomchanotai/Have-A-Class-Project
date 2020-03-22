$(document).ready(function(){

    $.get("sys/datamanager.getNumberPublishRecord.php", function(data){
        for(i = 1; i <= data; i++){
            var description = $("#description-" + i).text()
            if(description.length > 60) {
                description = description.substring(0,60)
                $("#description-" + i).html(description + "...")
            }
        }
    })

    $("#publish-teaching-type").on('change', function(){
        if($(this).val() == 1){
            $("#publish-place").val("Online")
            $("#publish-place").attr('readonly', 'readonly')
        } else {
            $("#publish-place").val("")
            $("#publish-place").removeAttr('readonly')
        }
    })
    $("#manage-type").on('change', function(){
        if($(this).val() == 1){
            $("#manage-place").val("Online")
            $("#manage-place").attr('readonly', 'readonly')
        } else {
            $("#manage-place").val("")
            $("#manage-place").removeAttr('readonly')
        }
    })

    $("input").on('input', function(){
        $(this).val(
            $(this).val().replace("<", "&lt;").replace(">", "&gt;")
        )
    })

    $(document).on('scroll', function(){
        setTimeout(function(){
            $(".profile-thumbnail").fadeIn()
        }, 1000);
    })

})