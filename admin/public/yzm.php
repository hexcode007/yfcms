<?php
Header("Content-type:image/png");
//定义header，声明图片文件，最好是png，无版权之扰;
//生成新的四位整数验证码
session_start();//开启session;
$authnum_session = '';
$str = 'abcdefghijkmnpqrstuvwxyz1234567890';
//定义用来显示在图片上的数字和字母;
$l = strlen($str); //得到字串的长度;
//循环随机抽取四位前面定义的字母和数字;
for($i=1;$i<=4;$i++)
{
	$num=mt_rand(0,$l-1);
	//每次随机抽取一位数字;从第一个字到该字串最大长度,
	//减1是因为截取字符是从0开始起算;这样34字符任意都有可能排在其中;
	$authnum_session.= $str[$num];
	//将通过数字得来的字符连起来一共是四位;
}
$_SESSION["authnum_session"] = $authnum_session;
//setcookie('authnum_session',$authnum_session);
//用session来做验证也不错;注册session,名称为authnum_session,
//其它页面只要包含了该图片
//即可以通过_SESSION["authnum_session"]来调用

//生成验证码图片，
srand((double)microtime()*1000000);
$im = imagecreate(70,35);//图片宽与高;
//主要用到黑白灰三种色;
$black = imagecolorallocate($im, 0,0,0);
$white = imagecolorallocate($im, 255,255,255);
$yellow=imagecolorallocate($im,255,221,170);
$red = imagecolorallocate($im, 0, 0, 255);
$gray = imagecolorallocate($im, 200,200,200);
imagefill($im,0,0,$black);
//将四位整数验证码绘入图片
//imagefill($im,68,30,$gray);
//如不用干扰线，注释就行了;
// $li = ImageColorAllocate($im, 220,220,220);
// for($i=0;$i<5;$i++)
// {//加入3条干扰线;也可以不要;视情况而定，因为可能影响用户输入;
// 	imageline($im,rand(0,30),rand(0,21),rand(20,40),rand(0,21),$li);
// }

/*加入干扰线
for($i=0;$i<5;$i++){
    $randcolor=imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
    imageline($im,rand(0,50),0,rand(0,50),35,$randcolor);
}*/
//字符在图片的位置;
for($i=0;$i<4;$i++){
	imagestring($im, 5, 10+($i*12), 10, $authnum_session[$i], $red);
}

//加入干扰象素
for($i=0;$i<40;$i++)
{
	$randcolor=imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
	imagesetpixel($im, rand()%70 , rand()%35 , $randcolor);
}
ImagePNG($im);
ImageDestroy($im);
?>