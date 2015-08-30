/**
 * 模仿$_GET
 * @param {type} attr
 * @returns {String}
 */
base_url = "/";
souce_url = "/";
function _GET() {
    var _v = [];
    try {
        var $url = location.href;
    } catch (e) {
        var $url = window.top.location.href;
    }
    if ($url.indexOf('?') <= 0) {
        return false;
    }
    $start = $url.indexOf('?') + 1;
    $end = $url.length;
    $Query_String = $url.substring($start, $end);

    $Get = $Query_String.split('&');
    for (var i in $Get) {
        $tmp = $Get[i].split('=');
        _v[$tmp[0]] = $tmp[1];
        //_v = decodeURIComponent($tmp[1]);

    }
    return _v;
}

/**
 * 生成Excel导出Url参数
 * @returns {undefined}
 */
function _excelQueryString() {
    var _vstr = [];
    var _v = _GET();
    for (var i in _v) {
        if (i == "page") {
            continue;
        }
        _vstr.push(i + "=" + _v[i]);
    }
    _vstr.push("action=export");
    return _vstr.join("&");
}

/**
 * 不带page的Url参数串
 * @returns {undefined}
 */
function _nopageQueryString() {
    var _vstr = [];
    var _v = _GET();
    for (var i in _v) {
        if (i == "page") {
            continue;
        }
        _vstr.push(i + "=" + _v[i]);
    }
    return _vstr.join("&");
}

/**
 * Url参数串
 * @returns {undefined}
 */
function _QueryString() {
    var _vstr = [];
    var _v = _GET();
    for (var i in _v) {
        _vstr.push(i + "=" + _v[i]);
    }
    return _vstr.join("&");
}


/**
 * 用户注销
 * @returns  bool
 */
function loginout() {
    if (!confirm("确定要注销系统吗?"))
        return false;
    $.request({
        url: "/login/out/",
        callback: function(msg) {
            if (msg.status == 0) {
                location.reload(false);
            }
        }
    });
    return true;
}

var pregAccounts = /^[\w+]{6,16}$/; //帐户匹配规则
var pregPasswd = /^[^\s\t\n\'\"]{6,16}$/;//密码匹配规则
var pregEmail = /^[a-z0-9-]{1,30}@[a-z0-9-]{1,65}.[a-z]{3}$/; // 邮箱验证
var pregQQ = /^[0-9]{5,12}$/; // QQ验证
var pregWeixin = /^[\w+]{2,30}$/; // 微信账号验证
var pregMobile = /^1[3|4|5|7|8][0-9]{9}$/; // 手机验证

/**
 * 帐户验证
 */
function checkUsername(username)
{
    return pregAccounts.test(username);
}

/**
 * 密码验证
 */
function checkPassword(pwd)
{
    //return pregPasswd.test(pwd);
    if (pwd != "" && pwd.length > 5 && pwd.length < 17) {
        return true;
    }
    return false;
}

/**
 * 邮箱验证
 */
function checkEmail(email)
{
    return pregEmail.test(email);
}

/**
 * QQ验证
 */
function checkQQ(QQ)
{
    return pregQQ.test(QQ);
}

/**
 * 微信验证
 */
function checkWeixin(weixin)
{
    return pregWeixin.test(weixin);
}

/**
 * 手机验证
 */
function checkMobile(mobile)
{
    return pregMobile.test(mobile);
}

function login() {
    username = $("#username").val();
    password = $("#password").val();

    if (!checkUsername(username)) {
        alert("用户名不正确")
        return false;
    }

    if (!checkPassword(password)) {
        alert("密码错误")
        return false;
    }

    $.ajax({
        type: "post",
        data: 'username=' + $('#username').val() + '&password=' + $.md5($.md5($('#password').val())),
        url: "/login/in/",
        success: function(msg) {
            if (typeof msg != "object") {
                try {
                    msg = $.parseJSON(msg);
                    if (msg.status != 0) {
                        alert(msg.info);
                    } else {
                        location.href = "/";
                        return true;
                    }

                } catch (e) {
                    alert("登陆失败,请重试");
                    location.reload(false);
                }
            }
            return false;
        }

    });
    return false;
}


function setProductCat(catstr,productCat,productCat2){
    $str = "<option value=''>--请选择所属行业--</option>"
    for(i in catstr){
        if(catstr[i].id==productCat){
            $str += "<option value='"+catstr[i].id+"' selected>"+catstr[i].title+"</option>";
        }else{
            $str += "<option value='"+catstr[i].id+"'>"+catstr[i].title+"</option>";
        }
    }
    $("#productCat").html($str);
    if(productCat2){
        changeProductCat2(productCat2);
    }
}

function changeProductCat2(productCat2){
    $str = "<option value=''>--请选择产品分类--</option>";
    var catstr = productCat[$("#productCat").val()]['child']
    for(i in catstr){
        if(catstr[i].id==productCat2){
            $str += "<option value='"+catstr[i].id+"' selected>"+catstr[i].title+"</option>";
        }else{
            $str += "<option value='"+catstr[i].id+"'>"+catstr[i].title+"</option>";
        }
    }
    $("#productCat2").html($str);
}

$(function() {
    $("form").on("focus", "input.error", (function() {
        $(this).removeClass('error');
    }));
    $("form").on("focus", "textarea.error", (function() {
        $(this).removeClass('error');
    }));
    $("form").on("focus", "select.error", (function() {
        $(this).removeClass('error');
    }));
});