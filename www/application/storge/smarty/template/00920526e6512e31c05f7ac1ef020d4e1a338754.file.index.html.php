<?php /* Smarty version Smarty-3.1.17, created on 2015-07-15 11:01:09
         compiled from "/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/login/index.html" */ ?>
<?php /*%%SmartyHeaderCode:42423833555a5ccf5028013-66215208%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00920526e6512e31c05f7ac1ef020d4e1a338754' => 
    array (
      0 => '/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/login/index.html',
      1 => 1436924650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42423833555a5ccf5028013-66215208',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'static_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a5ccf502dc28_53887759',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a5ccf502dc28_53887759')) {function content_55a5ccf502dc28_53887759($_smarty_tpl) {?><div class="zuobi">
    <a href="#">云扫除</a> > <a href="/login.html">登陆</a> <span>还没有账户？<a href="reg.html">点此注册</a></span>
</div>

<div class="login">
    <div class="login_ad"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/2.jpg"></div>
    <div class="login_login">
        <div class="login_login_top"><span>免费注册</span><h1>用户登陆</h1></div>
        <div class="login_login_cer">
            <form action="" method="post" name="form_login" id="form_login">
                <ul>
                    <li><input class="LoginID" id="username" name='username' value="" tabindex="1" type="text"></li>
                    <li class="wang">忘记用户名？</li>
                    <li><input class="mima" id="password" name='password' value="" tabindex="2" type="text"></li>
                    <li class="wang">忘记密码？</li>
                    <li><button class="button" type="button" tabindex="3"  onclick="return login()">登 录</button></li>
                </ul>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
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
</script>
<?php }} ?>
