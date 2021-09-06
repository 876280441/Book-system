<?php
session_start();//开启缓存
srand((double)microtime()*1000000);
while(($authnum=rand()%10000)<1000);//生成四位随机整数
$_SESSION['auth']=$authnum;
//生成验证码图片
Header("Content-Type: image/png");
$im = imagecreate(55,18);
$red = ImageColorAllocate($im,255,0,0);
$white = ImageColorAllocate($im,200,200,100);
$gray = ImageColorAllocate($im,250,250,250);
$black = ImageColorAllocate($im,120,120,50);
imagefill($im,60,20,$gray);
//将四位整数验证码写入图片
for ($i = 0;$i<strlen($authnum);$i++){
    $i%2==0?$top = -1:$top = 3;
    imagestring($im,6,13*$i+4,1,substr($authnum,$i,1),$white);
}
for ($i = 0;$i<100;$i++){
    imagesetpixel($im,rand()%70,rand()%30,$black);
}
imagepng($im);
imagedestroy($im);
?>

