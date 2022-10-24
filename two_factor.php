<?php
/*Для начала нужно установить нужную бибилиотеку через консоль
php composer.phar require robthree/twofactorauth
Затем подключаем ее*/
use RobThree\Auth\TwoFactorAuth;

$tfa = new TwoFactorAuth();
//Создаем секретный ключ
$secret = $tfa->createSecret();
//Создаем QR код
$qrCodeUrl = $tfa->getQRCodeImageAsDataUri('Bitrix', $secret);
echo '<img src="'.$qrCodeUrl.'">';
//Создаем код
$code = $tfa->getCode($secret);
//Проверяем код
$checkResult = $tfa->verifyCode($secret, $code, 2);
if ($checkResult) {
    echo 'OK';
} else {
    echo 'Error';
}
?>