<?php namespace Contentify;

use Session, Str;

class Captcha {

    /**
     * Creates a new captcha image and displays it
     * 
     * @return void
     */
    public function make() 
    {
        $captchaCode = strtolower(Str::random(4));
        Session::put('captchaCode', $captchaCode);

        $img = imagecreatefromjpeg(public_path().'/theme/captcha.jpg'); // Create image from file
        
        $color      = imagecolorallocate($img, rand(0, 50), rand(0, 50), rand(0, 50));
        $font       = public_path().'/theme/xfiles.ttf';
        $fheight    = 12; // Font height
        $angle      = rand(-3, 3);
        $x          = rand(3, 17);
        $y          = 16; // y = 0 is located at the BOTTOM of the picture!
        
        imagettftext($img, $fheight, $angle, $x, $y, $color, $font, $captchaCode); // Add text to image
        
        imagejpeg($img); // Display image
        
        imagedestroy($img); // Delete image from memory
    }
    
    /**
     * Checks if the captcha code is valid
     * 
     * @param   string  $value The potential captcha code
     * @return  bool
     */
    public function check($code) 
    {
        // Note: We do not need (want?) a strict string comparison here.
        return ($code == Session::get('captchaCode'));
    }
}   