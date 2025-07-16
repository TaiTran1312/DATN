<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;

class OtpMail extends Mailable
{
    public $otp;

    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    public function build()
    {
        return $this->subject('Mã OTP đăng nhập')
                    ->view('emails.otp')
                    ->with(['otp' => $this->otp]);
    }
}
