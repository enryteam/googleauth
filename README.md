# googleauth
谷歌验证码

$secret = $ga->createSecret();
echo "1.安全密匙SecretKey: ".$secret."\n\n<br>";
//第一个参数是"标识",第二个参数为"安全密匙SecretKey" 生成二维码信息
$qrCodeUrl = $ga->getQRCodeGoogleUrl('118.178.123.219', $secret);
echo "2.如：身份宝扫码添加账号<br><img src='".$qrCodeUrl."' />\n\n<br />"; //Google Charts接口
$oneCode = $ga->getCode($secret); //服务端计算"一次性验证码"
echo "3.服务端计算的验证码是:".$oneCode."\n\n<br />";
