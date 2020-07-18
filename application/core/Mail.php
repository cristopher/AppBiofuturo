<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Mail
{
    private $error;

    public function sendMailWithPHPMailer($user_email, $from_email, $from_name, $subject, $body)
    {
        $mail = new PHPMailer;
        
        $mail->CharSet = 'UTF-8';

        if (Config::get('EMAIL_USE_SMTP')) {

            $mail->IsSMTP();
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->SMTPAuth = Config::get('EMAIL_SMTP_AUTH');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            $mail->Host = Config::get('EMAIL_SMTP_HOST');
            $mail->Username = Config::get('EMAIL_SMTP_USERNAME');
            $mail->Password = Config::get('EMAIL_SMTP_PASSWORD');
            $mail->Port = Config::get('EMAIL_SMTP_PORT');

        } else {

            $mail->IsMail();
        }

        $mail->From = $from_email;
        $mail->FromName = $from_name;
        $mail->AddAddress($user_email);
        $mail->Subject = $subject;
        $mail->Body = $body;

        $wasSendingSuccessful = $mail->Send();

        if ($wasSendingSuccessful) {
            return true;

        } else {
            $this->error = $mail->ErrorInfo;
            return false;
        }
    }

    public function sendMail($user_email, $from_email, $from_name, $subject, $body)
    {
        if (Config::get('EMAIL_USED_MAILER') == "phpmailer") {

            return $this->sendMailWithPHPMailer(
                $user_email, $from_email, $from_name, $subject, $body
            );
        }

        return false;
    }

    public function getError()
    {
        return $this->error;
    }
}
