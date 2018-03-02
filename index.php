<?php
require_once 'PHPGangsta/GoogleAuthenticator.php';
$ga = new PHPGangsta_GoogleAuthenticator();
$secret = '4XN2PZ5PUI4MG7GT';
// $secret = $ga->createSecret();
// echo "1.安全密匙SecretKey: ".$secret."\n\n<br>";
//
// $qrCodeUrl = $ga->getQRCodeGoogleUrl('118.178.123.219', $secret); //第一个参数是"标识",第二个参数为"安全密匙SecretKey" 生成二维码信息
// echo "2.如：身份宝扫码添加账号<br><img src='".$qrCodeUrl."' />\n\n<br />"; //Google Charts接口

 $oneCode = $ga->getCode($secret); //服务端计算"一次性验证码"
 echo "3.服务端计算的验证码是:".$oneCode."\n\n<br />";

//把提交的验证码和服务端上生成的验证码做对比
// $secret 服务端的 "安全密匙SecretKey"
// $oneCode 手机上看到的 "一次性验证码"
// 最后一个参数 为容差时间,这里是2 那么就是 2* 30 sec 一分钟.
// 这里改成自己的业务逻辑
$oneCode = $_GET['checkcode'];
echo '4.客户端输入验证码为：'.$oneCode;
$checkResult = $ga->verifyCode($secret, $oneCode, 2);
if ($checkResult) {
    echo '匹配! OK';
} else {
    echo '不匹配! FAILED';
}
