$(document).ready(function(){

    function validateEmail(email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if( !emailReg.test( email ) ) {
            return false;
        } else {
            return true;
        }
    }

    /* Login */
    $("#btn-signin").click(function(){
        var loginusername = $("#login-user").val()
        var loginpassword = $("#login-pass").val()
        $.ajax({
            data : {
                "type" : "login",
                "username" : loginusername,
                "password" : loginpassword
            },
            url : "sys/main.php",
            type : "POST",
            beforeSend: function(){
                $("#fail-msg").html("โปรดเติมข้อมูลให้ครบ")
                if(loginusername.length == 0){
                    $("#login-user").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(loginpassword.length == 0){
                    $("#login-pass").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                }
            }
        })
        .done(function(data){
            if(data == "Success"){
                $("#success-msg").html("Logged in!")
                $("#success-box").fadeIn()
                setTimeout(function(){
                    window.location.href="index.php";
                }, 1000);
            } else if (data = "failedwrong"){
                $("#fail-msg").html("Username or Password is incorrect!")
                $("#fail-box").fadeIn()
                setTimeout(function(){
                    $("#fail-box").fadeOut()
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
    /* Register */
    $("#btn-signup").click(function(){
        var username = $("#reg-username").val()
        var password = $("#reg-pass").val()
        var confirmpassword = $("#reg-confirmpass").val()
        var prefix = $("#reg-prefix").val()
        var email = $("#reg-email").val()
        var thaifirstname = $("#reg-thai-firstname").val()
        var thailastname = $("#reg-thai-lastname").val()
        var thainickname = $("#reg-thai-nickname").val()
        var engfirstname = $("#reg-eng-firstname").val()
        var englastname = $("#reg-eng-lastname").val()
        var engnickname = $("#reg-eng-nickname").val()
        var age = $("#reg-age").val()
        var sex = $("#reg-sex").val()
        var edu = $("#reg-educate").val()
        var district = $("#reg-district").val()
        var province = $("#reg-province").val()
        var facebook = $("#reg-facebook").val()
        var urlfacebook = $("#reg-facebooklink").val()
        var lineid = $("#reg-lineid").val()
        var tel = $("#reg-tel").val()
        var role = $("#reg-role").val()

        $.ajax({
            data : {
                "type" : "register",
                "username" : username,
                "password" : password,
                "prefix" : prefix,
                "email" : email,
                "thaifirstname" : thaifirstname,
                "thailastname" : thailastname,
                "thainickname" : thainickname,
                "engfirstname" : engfirstname,
                "englastname" : englastname,
                "engnickname" : engnickname,
                "age" : age,
                "sex" : sex,
                "edu" : edu,
                "district" : district,
                "province" : province,
                "facebook" : facebook,
                "urlfacebook" : urlfacebook,
                "lineid" : lineid,
                "tel" : tel,
                "role" : role
            },
            url : "sys/main.php",
            type : "POST",
            beforeSend: function(){
                $("#fail-msg").html("โปรดเติมข้อมูลให้ครบ")
                if(username.length == 0){
                    $("#reg-username").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(email.length == 0){
                    $("#reg-email").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(validateEmail(email) == false){
                    $("#reg-email").css("border", "2px solid red")
                    $("#fail-msg").html("Incorrect email!")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(password.length < 8){
                    $("#fail-msg").html("You have entered less than 8 characters for password.")
                    $("#reg-pass").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(confirmpassword.length < 8){
                    $("#fail-msg").html("You have entered less than 8 characters for password.")
                    $("#reg-confirmpass").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(prefix == null){
                    $("#reg-prefix").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(thaifirstname.length == 0){
                    $("#reg-thai-firstname").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(thailastname.length == 0){
                    $("#reg-thai-lastname").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(thainickname.length == 0){
                    $("#reg-thai-nickname").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(engfirstname.length == 0){
                    $("#reg-eng-firstname").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(englastname.length == 0){
                    $("#reg-eng-lastname").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(engnickname.length == 0){
                    $("#reg-eng-nickname").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(age.length == 0){
                    $("#reg-age").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(sex == null){
                    $("#reg-sex").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(edu == null){
                    $("#reg-educate").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(district.length == 0){
                    $("#reg-district").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(province == null){
                    $("#reg-province").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(facebook.length == 0){
                    $("#reg-facebook").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(urlfacebook.length == 0){
                    $("#reg-facebooklink").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(lineid.length == 0){
                    $("#reg-lineid").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(tel.length < 10){
                    $("#fail-msg").html("You have entered less than 10 characters for telephone number.")
                    $("#reg-tel").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(role == null){
                    $("#reg-role").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if($("#agreement").prop("checked") == false){
                    $("#fail-msg").html("โปรดยอมรับข้อตกลงของทางเรา")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(password != confirmpassword){
                    $("#fail-msg").html("Your password is not match !")
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
                $("#success-msg").html("Registered !")
                $("#success-box").fadeIn()
                setTimeout(function(){
                    window.location.href="index.php";
                }, 1000);
            } else if(data == "usedusername") {
                $("#fail-msg").html("Username already exists.")
                $("#fail-box").fadeIn()
                setTimeout(function(){
                    $("#fail-box").fadeOut()
                }, 1000);
            } else if(data == "usedemail") {
                $("#fail-msg").html("Email already exists.")
                $("#fail-box").fadeIn()
                setTimeout(function(){
                    $("#fail-box").fadeOut()
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

    // ทำ recharater ยืนยันตัวตน
    // ทำ change password

    // edit information 
    $("#btn-submitedit").click(function(){
        var edituserid = $("#edit-userid").val()
        var editemail = $("#edit-email").val()
        var editprefix = $("#edit-prefix").val()
        var editthaifirstname = $("#edit-thaifirstname").val()
        var editthailastname = $("#edit-thailastname").val()
        var editthainickname = $("#edit-thainickname").val()
        var editengfirstname = $("#edit-engfirstname").val()
        var editenglastname = $("#edit-englastname").val()
        var editengnickname = $("#edit-engnickname").val()
        var editage = $("#edit-age").val()
        var editsex = $("#edit-sex").val()
        var editedu = $("#edit-edu").val()
        var editdistrict = $("#edit-district").val()
        var editprovince = $("#edit-province").val()
        var editfacebook = $("#edit-facebook").val()
        var editurlfacebook = $("#edit-urlfacebook").val()
        var editlineid = $("#edit-lineid").val()
        var edittel = $("#edit-tel").val()

        $.ajax({
            data : {
                "type" : "edit",
                "id" : edituserid,
                "email" : editemail,
                "prefix" : editprefix,
                "thaifirstname" : editthaifirstname,
                "thailastname" : editthailastname,
                "thainickname" : editthainickname,
                "engfirstname" : editengfirstname,
                "englastname" : editenglastname,
                "engnickname" : editengnickname,
                "age" : editage,
                "sex" : editsex,
                "edu" : editedu,
                "district" : editdistrict,
                "province" : editprovince,
                "facebook" : editfacebook,
                "urlfacebook" : editurlfacebook,
                "lineid" : editlineid,
                "tel" : edittel
            },
            url : "sys/main.php",
            type : "POST",
            beforeSend: function(){
                $("#fail-msg").html("โปรดเติมข้อมูลให้ครบ")
                if(editemail.length == 0){
                    $("#edit-email").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(validateEmail(editemail) == false){
                    $("#edit-email").css("border", "2px solid red")
                    $("#fail-msg").html("Incorrect email!")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(editprefix == null){
                    $("#edit-prefix").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(editthaifirstname.length == 0){
                    $("#edit-thaifirstname").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(editthailastname.length == 0){
                    $("#edit-thailastname").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(editthainickname.length == 0){
                    $("#edit-thainickname").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(editengfirstname.length == 0){
                    $("#edit-engfirstname").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(editenglastname.length == 0){
                    $("#edit-englastname").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(editengnickname.length == 0){
                    $("#edit-engnickname").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(editage.length == 0){
                    $("#edit-age").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(editsex == null){
                    $("#edit-sex").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(editedu == null){
                    $("#edit-edu").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(editdistrict.length == 0){
                    $("#edit-district").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(editprovince == null){
                    $("#edit-province").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(editfacebook.length == 0){
                    $("#edit-facebook").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(editurlfacebook.length == 0){
                    $("#edit-urlfacebook").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(editlineid.length == 0){
                    $("#edit-lineid").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(edittel.length < 10){
                    $("#fail-msg").html("You have entered less than 10 characters for telephone number.")
                    $("#edit-tel").css("border", "2px solid red")
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
                $("#success-msg").html("Save edited !")
                $("#success-box").fadeIn()
                setTimeout(function(){
                    window.location.href="profile.php";
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
    /* publish */
    $("#btn-submit-publish-tutor").click(function(){
        var userid = $("#publish-userid").val()
        var subject = $("#publish-subject").val()
        var topic = $("#publish-topic").val()
        var teachingtype = $("#publish-teaching-type").val()
        var price = $("#publish-price").val()
        var agestu = $("#publish-agestu").val()
        var place = $("#publish-place").val()
        var description = $("#publish-description").val()

        $.ajax({
            data : {
                "type" : "publish-tutor",
                "userid" : userid,
                "subject" : subject,
                "topic" : topic,
                "teachingtype" : teachingtype,
                "price" : price,
                "agestu" : agestu,
                "place" : place,
                "description" : description
            },
            url : "sys/main.php",
            type : "POST",
            beforeSend : function(){
                $("#fail-msg").html("โปรดเติมข้อมูลให้ครบ")
                if(subject.length == 0){
                    $("#publish-subject").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(topic.length == 0){
                    $("#publish-topic").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(teachingtype == null){
                    $("#publish-teaching-type").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(price.length == 0){
                    $("#publish-price").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(agestu.length == 0){
                    $("#publish-agestu").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(place.length == 0){
                    $("#publish-place").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(description.length == 0){
                    $("#publish-description").css("border", "2px solid red")
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
                    window.location.href="index.php";
                }, 1000);
            } else if(data == "alreadypublish") {
                $("#fail-msg").html("You have already post your publish !")
                $("#fail-box").fadeIn()
                setTimeout(function(){
                    $("#fail-box").fadeOut()
                }, 1000);
            } else if(data == "nosubjects") {
                $("#fail-msg").html("Your subject is not available. please contact admin.")
                $("#fail-box").fadeIn()
                setTimeout(function(){
                    $("#fail-box").fadeOut()
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
    // change password
    $("#btn-submitchangepwd").click(function(){
        var userid = $("#changepwd-userid").val()
        var oldpassword = $("#changepwd-old").val()
        var newpassword = $("#changepwd-new").val()
        var confirmpassword = $("#changepwd-confirm").val()
        
        $.ajax({
            data : {
                "type" : "changepwd",
                "userid" : userid,
                "oldpassword" : oldpassword,
                "newpassword" : newpassword,
                "confirmpassword" : confirmpassword
            },
            type : "POST",
            url : "sys/main.php",
            beforeSend: function(){
                $("#fail-msg").html("You have entered less than 8 characters for password.")
                if(oldpassword.length < 8){
                    $("#fail-box").fadeIn()
                    $("#changepwd-old").css("border", "2px solid red")
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;  
                } else if(newpassword.length < 8){
                    $("#fail-box").fadeIn()
                    $("#changepwd-new").css("border", "2px solid red")
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;  
                } else if(confirmpassword.length < 8){
                    $("#fail-box").fadeIn()
                    $("#changepwd-confirm").css("border", "2px solid red")
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;  
                } else if(newpassword != confirmpassword){
                    $("#fail-msg").html("Your password is not match !")
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
                $("#success-msg").html("Password changed !")
                $("#success-box").fadeIn()
                setTimeout(function(){
                    window.location.href="index.php";
                }, 1000);
            } else if(data == "oldpassnotmatch") {
                $("#fail-msg").html("Wrong password !")
                $("#fail-box").fadeIn()
                setTimeout(function(){
                    $("#fail-box").fadeOut()
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

    // update 
    $("#btn-submitmanage").click(function(){
        var postid = $("#manage-postid").val()
        var managesubject = $("#manage-subject").val()
        var managetopic = $("#manage-topic").val()
        var managetype = $("#manage-type").val()
        var manageprice = $("#manage-price").val()
        var manageagestu = $("#manage-agestu").val()
        var manageplace = $("#manage-place").val()
        var managedescription = $("#manage-description").val()

        $.ajax({
            data : {
                "type" : "editpost",
                "postid" : postid,
                "managesubject" : managesubject,
                "managetopic" : managetopic,
                "managetype" : managetype,
                "manageprice" : manageprice,
                "manageagestu" : manageagestu,
                "manageplace" : manageplace,
                "managedescription" : managedescription
            },
            url : "sys/main.php",
            type : "POST",
            beforeSend: function(){
                $("#fail-msg").html("โปรดเติมข้อมูลให้ครบ")
                if(managesubject.length == 0){
                    $("#manage-subject").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(managetopic.length == 0){
                    $("#manage-topic").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(managetype == null){
                    $("#manage-type").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(manageprice.length == 0){
                    $("#manage-price").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(manageagestu.length == 0){
                    $("#manage-agestu").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(manageplace.length == 0){
                    $("#manage-place").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(managedescription.length == 0){
                    $("#manage-description").css("border", "2px solid red")
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
                    window.location.href="profile.php";
                }, 1000);
            } else if(data == "nosubjects") {
                $("#fail-msg").html("Your subject is not available. please contact admin.")
                $("#fail-box").fadeIn()
                setTimeout(function(){
                    $("#fail-box").fadeOut()
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

    // upload img profile

    $("#image-profile").on('change' , function(){
        var userid = $("#img-profile-userid").val()
        var img = $("#image-profile")[0].files[0]
        var form_data = new FormData()
        form_data.append("type", "profileimg")
        form_data.append("userid", userid)
        form_data.append("fileToUpload", img)
                $.ajax({
                    url : "sys/main.php",
                    method : "POST",
                    data : form_data,
                    contentType : false,
                    cache : false,
                    processData : false,
                    beforeSend : function(){
                        
                    }
                })
                .done(function(data){
                    if(data == "success"){
                        $("#success-msg").html("Success !")
                        $("#success-box").fadeIn()
                        setTimeout(function(){
                            window.location.href="profile.php";
                        }, 1000);
                    } else if(data == "filetolarge"){
                        $("#fail-msg").html("Your uploaded file is too large !")
                        $("#fail-box").fadeIn()
                        setTimeout(function(){
                            $("#fail-box").fadeOut()
                        }, 1000);
                    } else if(data == "invalidfile"){
                        $("#fail-msg").html("Invalid File !")
                        $("#fail-box").fadeIn()
                        setTimeout(function(){
                            $("#fail-box").fadeOut()
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

    $("#report-submit").click(function(){
        var userid = $("#report-userid").val()
        var reporttype = $("#report-type").val()
        var reportsubject = $("#report-subject").val()
        var reportdetail = $("#report-detail").val()

        $.ajax({
            data : {
                "type" : "ticket",
                "userid" : userid,
                "reporttype" : reporttype,
                "reportsubject" : reportsubject,
                "reportdetail" : reportdetail
            },
            url : "sys/main.php",
            type : "POST",
            beforeSend: function(){
                $("#fail-msg").html("โปรดเติมข้อมูลให้ครบ")
                if(reporttype == null){
                    $("#report-type").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(reportsubject.length == 0){
                    $("#report-subject").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(reportdetail.length == 0){
                    $("#report-detail").css("border", "2px solid red")
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
                    $.get("sys/datamanager.getUserTicketID.php", function(ticketid){
                        $("#success-box").hide()
                        $("#ticket").hide()
                        $("#getTicketID").html("#" + ticketid)
                        $("#getTicketID").attr("href", "report.php?ticket=" + ticketid)
                        $("#ticketnum").show()
                    })
                }, 1000);
            } else if(data == "loginfirst"){
                $("#fail-msg").html("Please, Login First !")
                $("#fail-box").fadeIn()
                setTimeout(function(){
                    $("#fail-box").fadeOut()
                    window.location.href="login.php";
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