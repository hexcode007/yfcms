<?php
Header("Content-type:image/png");
//����header������ͼƬ�ļ��������png���ް�Ȩ֮��;
//�����µ���λ������֤��
session_start();//����session;
$authnum_session = '';
$str = 'abcdefghijkmnpqrstuvwxyz1234567890';
//����������ʾ��ͼƬ�ϵ����ֺ���ĸ;
$l = strlen($str); //�õ��ִ��ĳ���;
//ѭ�������ȡ��λǰ�涨�����ĸ������;
for($i=1;$i<=4;$i++)
{
	$num=mt_rand(0,$l-1);
	//ÿ�������ȡһλ����;�ӵ�һ���ֵ����ִ���󳤶�,
	//��1����Ϊ��ȡ�ַ��Ǵ�0��ʼ����;����34�ַ����ⶼ�п�����������;
	$authnum_session.= $str[$num];
	//��ͨ�����ֵ������ַ�������һ������λ;
}
$_SESSION["authnum_session"] = $authnum_session;
//setcookie('authnum_session',$authnum_session);
//��session������֤Ҳ����;ע��session,����Ϊauthnum_session,
//����ҳ��ֻҪ�����˸�ͼƬ
//������ͨ��_SESSION["authnum_session"]������

//������֤��ͼƬ��
srand((double)microtime()*1000000);
$im = imagecreate(70,35);//ͼƬ�����;
//��Ҫ�õ��ڰ׻�����ɫ;
$black = imagecolorallocate($im, 0,0,0);
$white = imagecolorallocate($im, 255,255,255);
$yellow=imagecolorallocate($im,255,221,170);
$red = imagecolorallocate($im, 0, 0, 255);
$gray = imagecolorallocate($im, 200,200,200);
imagefill($im,0,0,$black);
//����λ������֤�����ͼƬ
//imagefill($im,68,30,$gray);
//�粻�ø����ߣ�ע�;�����;
// $li = ImageColorAllocate($im, 220,220,220);
// for($i=0;$i<5;$i++)
// {//����3��������;Ҳ���Բ�Ҫ;�������������Ϊ����Ӱ���û�����;
// 	imageline($im,rand(0,30),rand(0,21),rand(20,40),rand(0,21),$li);
// }

/*���������
for($i=0;$i<5;$i++){
    $randcolor=imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
    imageline($im,rand(0,50),0,rand(0,50),35,$randcolor);
}*/
//�ַ���ͼƬ��λ��;
for($i=0;$i<4;$i++){
	imagestring($im, 5, 10+($i*12), 10, $authnum_session[$i], $red);
}

//�����������
for($i=0;$i<40;$i++)
{
	$randcolor=imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
	imagesetpixel($im, rand()%70 , rand()%35 , $randcolor);
}
ImagePNG($im);
ImageDestroy($im);
?>