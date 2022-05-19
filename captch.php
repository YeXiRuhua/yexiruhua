<?php
session_start();
Header("Content-type: image/PNG" );//说明PNG格式
$im = imagecreate(120, 38);//创建画布126 工
$back = imagecolorallocate($im, 245, 245, 245);//设置背景颇色
imagefill($im, 0,0, $back);//绘劇圍像
$yzm_code="";
for($i = 0; $i < 4; $i++){
    $font=imagecolorallocate($im, rand(100, 255),rand(0, 100), rand(100, 255));//
    $authnum = rand(0, 9);
    $yzm_code .=$authnum;
imagestring($im, 5, 50 + $i*10, 20, $authnum, $font);
}
$_SESSION['yzm']=$yzm_code;

for($i=0;$i<200;$i++) {
    $randcolor = imagecolorallocate($im, rand(0, 255), rand(0, 255), rand(0, 255));
    imagesetpixel($im, rand()%150, rand()%150, $randcolor); //
}
imagepng($im);
imagedestroy($im);

