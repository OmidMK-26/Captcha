
<?php
session_start();

function generateCaptcha() {
    $captcha_num = rand(1000,9999);
    $_SESSION['captcha_number'] = $captcha_num;
    
    $string = generateRandomString(5);
    $_SESSION['captcha_string'] = $string;
    
    $image = imagecreatetruecolor(200, 50);
    $bg_color = imagecolorallocate($image, 255, 255, 255);
    $text_color = imagecolorallocate($image, 0, 0, 0);
    
    
    $backgrounds = glob("backgrounds/bg3.jpg");
    $background = $backgrounds[array_rand($backgrounds)];
    $bg_image = imagecreatefromjpeg($background);
    imagecopy($image, $bg_image, 0, 0, 0, 0, 200, 50);
    
    
    imagettftext($image, 30, 0, 30, 40, $text_color, 'Code-Bold 700.otf', $captcha_num);
    
    imagettftext($image, 12, 0, 100, 20, $text_color, 'Code-Bold 700.otf', $string);
    
    header('Content-type: image/jpeg');
    imagejpeg($image);
    imagedestroy($image);
}


function checkCaptcha($user_num, $user_string) {
    if(isset($_SESSION['captcha_number']) && isset($_SESSION['captcha_string']) && 
       $_SESSION['captcha_number'] == $user_num && $_SESSION['captcha_string'] == $user_string) {
        return true;
    } else {
        return false;
    }
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}


generateCaptcha();
?>
