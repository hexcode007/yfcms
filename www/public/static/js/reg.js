$(function() {
    setProductCat(productCat);
    $("#username").change(function() {
        username = $("#username").val();
        if (username == '' || username.length < 6) {
            showError("#username");
        } else {
            $.ajax({
                type: "post",
                data: "username=" + username,
                url: "/login/checkUsername/",
                success: function(msg) {
                    if (typeof msg != "object") {
                        try {
                            msg = $.parseJSON(msg);
                            if (msg.status != 0) {
                                var ul = $("#username").parent().parent();
                                ul.find(".yq").hide();
                                ul.find(".dui").hide();
                                ul.find(".cw").hide();
                                ul.find(".ck").show();
                                return false;
                            } else {
                                var ul = $("#username").parent().parent();
                                ul.find(".yq").hide();
                                ul.find(".dui").show();
                                ul.find(".cw").hide();
                                ul.find(".ck").hide();
                            }

                        } catch (e) {
                            return false;
                        }
                    }
                    return false;
                }

            });
        }

    });
})
function showError(id) {
    var ul = $(id).parent().parent();
    ul.find(".yq").hide();
    ul.find(".dui").hide();
    ul.find(".cw").show();
    ul.find(".ck").hide();
}

function showSuccess(id) {
    var ul = $(id).parent().parent();
    ul.find(".yq").hide();
    ul.find(".dui").show();
    ul.find(".cw").hide();
    ul.find(".ck").hide();
}

function register() {
    username = $("#username").val();
    password = $("#password").val();
    repassword = $("#repassword").val();
    email = $("#email").val();
    qq = $("#qq").val();
    weixin = $("#weixin").val();
    mobile = $("#mobile").val();

    if (!checkUsername(username)) {
        showError("#username");
        return false;
    }
    showSuccess("#username");


    if (!checkPassword(password)) {
        showError("#password");
        return false;
    }
    showSuccess("#password");

    if (password != repassword) {
        showError("#repassword");
        return false;
    }
    showSuccess("#repassword");

    if (!checkMobile(mobile)) {
        showError("#mobile");
        return false;
    }
    showSuccess("#mobile");

    if (!checkEmail(email)) {
        showError("email");
        return false;
    }
    showSuccess("#email");

    if (!checkQQ(qq)) {
        showError("#qq");
        return false;
    }
    showSuccess("#qq");

    if (!checkWeixin(weixin)) {
        showError("#weixin");
        return false;
    }
    showSuccess("#weixin");

    if ($("#productCat").val() == '') {
        showError("#productCat");
        return false;
    }
    showSuccess("#productCat");

    if ($("#productCat2").val() == '') {
        showError("#productCat2");
        return false;
    }
    showSuccess("#productCat2");

    $.ajax({
        type: "post",
        data: $("#form_reg").serialize(),
        url: "/regsave.html",
        success: function(msg) {
            if (typeof msg != "object") {
                try {
                    msg = $.parseJSON(msg);
                    if (msg.status != 0) {
                        alert(msg.info);
                    } else {
                        location.href = "/login.html";
                        return true;
                    }

                } catch (e) {
                    alert("注册失败,请重试");
                    //location.reload(false);
                }
            }
            return false;
        }

    });
    return false;
}
