$(document).ready(function(){
    $.ajax({
        url : "../sys/datamanager.getData.php",
        type : "POST",
        data : {
            "getWhat" : "SubjectList"
        },
        success: function(data){
            for(i = 1; i <= data; i++){
                $("#btn-edit-subject-" + i).click(function(){
                    var idsubject = event.target.id
                    var idsubject = idsubject.split("-")
                    var idsubject = idsubject[3]
                    $.ajax({
                        url : "../sys/datamanager.getData.php",
                        type :"POST",
                        data : {
                            "getWhat" : "getSubjectdata",
                            "idsubject" : idsubject
                        },
                        success: function(subjectdata){
                            var subjectdata = subjectdata.split(".")
                            $("#edit-subject").val(subjectdata[1])
                            $("#edit-subject-eng").val(subjectdata[2])
                            $("#edit-subject-id").val(subjectdata[0])
                            $("#edit-subject-container").fadeIn()
                        }
                    })
                })
            }
        }
    })
    $.ajax({
        url : "../sys/datamanager.getData.php",
        type : "POST",
        data : {
            "getWhat" : "TicketTypeList"
        },
        success: function(data){
            for(i = 1; i <= data; i++){
                $("#btn-edit-tickettype-" + i).click(function(){
                    var idTicketType = event.target.id
                    var idTicketType = idTicketType.split("-")
                    var idTicketType = idTicketType[3]
                    $.ajax({
                        url : "../sys/datamanager.getData.php",
                        type :"POST",
                        data : {
                            "getWhat" : "getTicketTypedata",
                            "idtickettype" : idTicketType
                        },
                        success: function(tickettypedata){
                            var tickettypedata = tickettypedata.split(".")
                            $("#edit-tickettype").val(tickettypedata[1])
                            $("#edit-tickettype-eng").val(tickettypedata[2])
                            $("#edit-tickettype-id").val(tickettypedata[0])
                            $("#edit-tickettype-container").fadeIn()
                        }
                    })
                })
            }
        }
    })
    // Send Data
    $("#submit-add-subject").click(function(){
        var addsubjectname = $("#add-subject").val()
        var addsubjectengname = $("#add-subject-eng").val()
        
        $.ajax({
            url : "../sys/main.php",
            type : "POST",
            data : {
                "type" : "addsubject",
                "addsubjectname" : addsubjectname,
                "addsubjectengname" : addsubjectengname
            },
            beforeSend : function(){
                $("#fail-msg").html("โปรดเติมข้อมูลให้ครบ")
                if(addsubjectname.length == 0){
                    $("#add-subject").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(addsubjectengname.length == 0){
                    $("#add-subject-eng").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                }
            }
        })
        .done(function(data){
            console.log(data)
            if(data == "success"){
                $("#success-msg").html("Success !")
                $("#success-box").fadeIn()
                setTimeout(function(){
                    $("#success-box").fadeOut()
                    window.location.href="backend.php"
                }, 1000);
            } else {
                $("#fail-msg").html("Something went wrong !")
                $("#fail-box").fadeIn()
                setTimeout(function(){
                    $("#fail-box").fadeOut()
                }, 1000);
            }
        })
    })
    $("#submit-edit-subject").click(function(){
        var editsubjectid = $("#edit-subject-id").val()
        var editsubjectname = $("#edit-subject").val()
        var editsubjectengname = $("#edit-subject-eng").val()
        
        $.ajax({
            url : "../sys/main.php",
            type : "POST",
            data : {
                "type" : "editsubject",
                "editsubjectid" : editsubjectid,
                "editsubjectname" : editsubjectname,
                "editsubjectengname" : editsubjectengname
            },
            beforeSend : function(){
                $("#fail-msg").html("โปรดเติมข้อมูลให้ครบ")
                if(editsubjectname.length == 0){
                    $("#edit-subject").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(editsubjectengname.length == 0){
                    $("#edit-subject-eng").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                }
            }
        })
        .done(function(data){
            console.log(data)
            if(data == "success"){
                $("#success-msg").html("Success !")
                $("#success-box").fadeIn()
                setTimeout(function(){
                    $("#success-box").fadeOut()
                    $("#edit-subject-container").fadeOut()
                    window.location.href="backend.php"
                }, 1000);
            } else {
                $("#fail-msg").html("Something went wrong !")
                $("#fail-box").fadeIn()
                setTimeout(function(){
                    $("#fail-box").fadeOut()
                }, 1000);
            }
        })
    })
    $("#submit-add-tickettype").click(function(){
        var addtickettype = $("#add-tickettype").val()
        var addtickettypeeng = $("#add-tickettype-eng").val()
        
        $.ajax({
            url : "../sys/main.php",
            type : "POST",
            data : {
                "type" : "addtickettype",
                "addtickettype" : addtickettype,
                "addtickettypeeng" : addtickettypeeng
            },
            beforeSend : function(){
                $("#fail-msg").html("โปรดเติมข้อมูลให้ครบ")
                if(addtickettype.length == 0){
                    $("#add-subject").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(addtickettypeeng.length == 0){
                    $("#add-subject-eng").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                }
            }
        })
        .done(function(data){
            if(data == "success"){
                $("#success-msg").html("Success !")
                $("#success-box").fadeIn()
                setTimeout(function(){
                    $("#success-box").fadeOut()
                    window.location.href="backend.php"
                }, 1000);
            } else {
                $("#fail-msg").html("Something went wrong !")
                $("#fail-box").fadeIn()
                setTimeout(function(){
                    $("#fail-box").fadeOut()
                }, 1000);
            }
        })
    })
    $("#submit-edit-tickettype").click(function(){
        var edittickettypeid = $("#edit-tickettype-id").val()
        var edittickettype = $("#edit-tickettype").val()
        var edittickettypeeng = $("#edit-tickettype-eng").val()
        
        $.ajax({
            url : "../sys/main.php",
            type : "POST",
            data : {
                "type" : "edittickkettype",
                "edittickettypeid" : edittickettypeid,
                "edittickettype" : edittickettype,
                "edittickettypeeng" : edittickettypeeng
            },
            beforeSend : function(){
                $("#fail-msg").html("โปรดเติมข้อมูลให้ครบ")
                if(edittickettype.length == 0){
                    $("#edit-subject").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(edittickettypeeng.length == 0){
                    $("#edit-subject-eng").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                }
            }
        })
        .done(function(data){
            console.log(data)
            if(data == "success"){
                $("#success-msg").html("Success !")
                $("#success-box").fadeIn()
                setTimeout(function(){
                    $("#success-box").fadeOut()
                    $("#edit-tickkettype-container").fadeOut()
                    window.location.href="backend.php"
                }, 1000);
            } else {
                $("#fail-msg").html("Something went wrong !")
                $("#fail-box").fadeIn()
                setTimeout(function(){
                    $("#fail-box").fadeOut()
                }, 1000);
            }
        })
    })
    $("#btn-edit-changepwd").click(function(){
        var edituserid = $("#edit-user-id").val()
        if(edituserid.length != 0){
            $.ajax({
                type : "POST",
                url : "../sys/datamanager.getData.php",
                data : {
                    "getWhat" : "admin-changepwd"
                },
                success: function(data){
                    if(edituserid > data){
                        $("#admin-changepwd").fadeOut()
                        $("#fail-msg").html("ไม่มี user id นี้ !")
                        $("#fail-box").fadeIn()
                        setTimeout(function(){
                            $("#fail-box").fadeOut()
                        }, 1000);
                    } else {
                        $("#edit-user-id").hide()
                        $("#btn-edit-changepwd").hide()
                        $("#useriddisplay").html(edituserid)
                        $("#admin-changepwd").fadeIn()
                        $("#btn-submitedit-changepwd").click(function(){
                            var adminedituserpwd = $("#edit-changepwd-new").val()
                            var adminedituserpwdconfirm = $("#edit-changepwd-confirm").val()
                            if(adminedituserpwd != adminedituserpwdconfirm){
                                $("#fail-msg").html("Password ไม่ตรงกัน !")
                                $("#fail-box").fadeIn()
                                setTimeout(function(){
                                    $("#fail-box").fadeOut()
                                }, 1000);
                            } else if(adminedituserpwd.length < 8){
                                $("#fail-msg").html("Password น้อยกว่า 8 ตัวอักษร !")
                                $("#fail-box").fadeIn()
                                setTimeout(function(){
                                    $("#fail-box").fadeOut()
                                }, 1000);
                            } else if(adminedituserpwdconfirm < 8){
                                $("#fail-msg").html("Password น้อยกว่า 8 ตัวอักษร !")
                                $("#fail-box").fadeIn()
                                setTimeout(function(){
                                    $("#fail-box").fadeOut()
                                }, 1000);
                            } else {
                                $.ajax({
                                    data : {
                                        "type" : "admineditpass",
                                        "userid" : edituserid,
                                        "newpass" : adminedituserpwd
                                    },
                                    url : "../sys/main.php",
                                    type : "POST",
                                })
                                .done(function(data){
                                    if(data == "success"){
                                        $("#success-msg").html("Success !")
                                        $("#success-box").fadeIn()
                                        setTimeout(function(){
                                            $("#success-box").fadeOut()
                                            $("#edit-tickkettype-container").fadeOut()
                                            window.location.href="backend.php"
                                        }, 1000);
                                    } else {
                                        $("#fail-msg").html("Something went wrong !")
                                        $("#fail-box").fadeIn()
                                        setTimeout(function(){
                                            $("#fail-box").fadeOut()
                                        }, 1000);
                                    }
                                })
                            }
                        })
                    }
                }
            })
        }  
    })
    $.ajax({
        data : {
            "getWhat" : "getTicketList"
        },
        url : "../sys/datamanager.getData.php",
        type : "POST",
        success: function(data){
            for(i = 1; i <= data; i++){
                $("#btn-edit-ticket-" + i).click(function(){
                    if($("#ticketreply").css("display") != "none"){
                        window.location.href="backend.php";
                    }
                    var ticketid = event.target.id
                    var ticketid = ticketid.split("-")
                    var ticketid = ticketid[3]
                    $.ajax({
                        url : "../sys/datamanager.getData.php",
                        type : "POST",
                        data : {
                            "getWhat" : "getTicketdata",
                            "ticketid" : ticketid
                        },
                    })
                    .done(function(data){
                        var data = data.split(".")
                        $("#ticketreply").fadeIn()
                        $("#ticketid").html(data[0])
                        $("#ticketproblem").html(data[1])
                        $("#tickettopic").html(data[2])
                        $("#ticketdetail").html(data[3])
                        $("#btn-submit-admin-reply").click(function(){
                            var ticketid = $("#ticketid").text()
                            var ticketreplyans = $("#ticketreply-ans").val()
                            $.ajax({
                                url : "../sys/main.php",
                                type : "POST",
                                data : {
                                    "type" : "adminticketreply",
                                    "ticketid" : ticketid,
                                    "ticketreply-ans" : ticketreplyans
                                },
                                beforeSend : function(){
                                    if(ticketreplyans.length == 0){
                                        $("#fail-msg").html("โปรดเติมข้อมูลให้ครบ")
                                        $("#fail-box").fadeIn()
                                        setTimeout(function(){
                                            $("#fail-box").fadeOut()
                                        }, 1000);
                                        return false;
                                    }
                                }
                            })
                            .done(function(data){
                                if(data == "success"){
                                    $("#success-msg").html("Success !")
                                    $("#success-box").fadeIn()
                                    setTimeout(function(){
                                         $("#success-box").fadeOut()
                                        $("#edit-tickkettype-container").fadeOut()
                                        window.location.href="backend.php"
                                    }, 1000);
                                } else {
                                    $("#fail-msg").html("Something went wrong !")
                                    $("#fail-box").fadeIn()
                                    setTimeout(function(){
                                        $("#fail-box").fadeOut()
                                    }, 1000);
                                }
                            })
                        })
                    })
                })
            }
        }
    })
})