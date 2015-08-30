/**
 * 模仿PHP的$_GET
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
    if($url.indexOf('?')<=0){
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
function _excelQueryString(){
    var _vstr = [];
    var _v = _GET();
    for(var i in _v){
        if(i=="page"){
            continue;
        }
        _vstr.push(i+"="+_v[i]);
    }    
    _vstr.push("action=export");
    return _vstr.join("&");
}

/**
 * 不带page的Url参数串
 * @returns {undefined}
 */
function _nopageQueryString(){
    var _vstr = [];
    var _v = _GET();
    for(var i in _v){
        if(i=="page"){
            continue;
        }
        _vstr.push(i+"="+_v[i]);
    }
    return _vstr.join("&");
}

/**
 * Url参数串
 * @returns {undefined}
 */
function _QueryString(){
    var _vstr = [];
    var _v = _GET();
    for(var i in _v){
        _vstr.push(i+"="+_v[i]);
    }
    return _vstr.join("&");
}


/**
 * 用户注销
 * @returns  bool
 */
function loginout(){
    if(!confirm("确定要注销系统吗?")) return false;
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


var arrSubmit=new Array();
var pregAccounts=/^[\w+]{5,15}$/; //帐户匹配规则
var pregPasswd=/^[\w+]{6,16}$/;//密码匹配规则

/**
 * 帐户正则检测
 * @param obj
 * @param promptStr
 * @returns
 */
function checkAccountsPreg(accname)
{
    if(pregFromString(accname, pregAccounts)) {
        return true;
    }
    return false;
}

/**
 * 密码正则
 * @param pwd
 * @param promptStr
 */
function checkFormatPasswdPreg(pwd)
{
    return checkPreg(pwd,6,16,pregPasswd);
}

/**
 * 验证通用方法
 * @param string pwd
 * @param mixLength　最大长度
 * @param maxLength  最小长度
 * @param preg  正则表达式
 */
function checkPreg(pwd,mixLength,maxLength,preg)
{
    if(pwd.length>=mixLength && pwd.length<=maxLength) {
        if(pregFromString(pwd, preg)){ 
            return true;
        } else {
            $.error('格式错误，仅限英文字母、数字、字符!');
            return false;
        }
    } else {    
        if(pwd==null || pwd=="") {
            $.error('密码不能为空');
        } else {
            $.error('格式错误，密码长度为6-16位!');
        }
        return false;
    }   
}

/**
 * 二次密码验证
 * @param obj
 * @param master
 * @param promptStr
 */
function checkPasswdConformPreg(repwd,master)
{
    var bReturn = checkPreg(repwd,6,16,pregPasswd);
    if(bReturn){
        masterpasswd=$("#"+master).val();
        if(masterpasswd!=repwd) {
           $.error('确认密码和密码不一致，请重新输入');
           return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}

/**
 * 正则匹配
 * @param str  匹配字符串
 * @param pregtype 正则表达式
 * @returns
 */
function pregFromString(str, pregtype)
{
    if(pregtype.test(str)) return true;
    return false;
}

function setProductCat(catstr,objid,productCat,objid2,productCat2){

    $str = "<option value=''>--请选择所属行业--</option>"
    for(i in catstr){
        if(catstr[i].id==productCat){
            $str += "<option value='"+catstr[i].id+"' selected>"+catstr[i].title+"</option>";
        }else{
            $str += "<option value='"+catstr[i].id+"'>"+catstr[i].title+"</option>";
        }
    }
    console.log($(objid));
    $(objid).html($str);
    $(objid).change(function(){
        changeProductCat2(catstr,objid,objid2);
    });
    if(productCat2){
        changeProductCat2(catstr,objid,objid2,productCat2);
    }
}

function changeProductCat2(catstr,objid,objid2,productCat2){
    _str = "<option value=''>--请选择产品分类--</option>";
    if($(objid).val()){
        var catstr = catstr[$(objid).val()]['child']
        for(i in catstr){
            if(catstr[i].id==productCat2){
                _str += "<option value='"+catstr[i].id+"' selected>"+catstr[i].title+"</option>";
            }else{
                _str += "<option value='"+catstr[i].id+"'>"+catstr[i].title+"</option>";
            }
        }
    }
    
    $(objid2).html(_str);
}

$(function (){
    $('body').on('click', '.model_notice .back', function(e){
         $('.model_notice').modal('hide');
         location.reload(false);
    });
    $('body').on('click', '.model_notice .continue', function(e){
         $('.model_notice').modal('hide');
         $('.addmodal').click();
    });
    $('body').on('click', '.model_notice .close', function(e){
         $('.model_notice').modal('hide');
         location.reload(false);
    });
    
    //全选
    $(".checkall").change(function(){
        if($(this).is(":checked")){
            $(".checkall").prop("checked",true)
            $(".checkone").prop("checked",true);
        }else{
            $(".checkall").prop("checked",false)
            $(".checkone").prop("checked", false);
        }
        
    });
    
     //全选
    $(".checkone").change(function(){
        if($(this).not(":checked")){
            $(".checkall").prop("checked", false);
        } 
    });
  
})
