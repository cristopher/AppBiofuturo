<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;

class Mail
{
    private $mail;
    public $error;
    private $html = false;
    private $provider;
    private $refreshToken;
    private $userName;

    public function __construct($system = true)
    {

        $this->mail = new PHPMailer;
        $this->mail->CharSet = PHPMailer::CHARSET_UTF8;

        $this->mail->IsSMTP();

        $this->mail->SMTPDebug = SMTP::DEBUG_OFF;
        $this->mail->SMTPAuth = Config::get('EMAIL_SMTP_AUTH');
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        $this->mail->Host = Config::get('EMAIL_SMTP_HOST');
        $this->mail->Port = Config::get('EMAIL_SMTP_PORT');

        if (Config::get('EMAIL_USED_MAILER') == "phpmailer") {

            $this->mail->Username = Config::get('EMAIL_SMTP_USERNAME');
            $this->mail->Password = Config::get('EMAIL_SMTP_PASSWORD');

            if ($system == true){
                $this->mail->From = Config::get('EMAIL_FROM');
                $this->mail->FromName = Config::get('EMAIL_FROM_NAME');
            }else{
                $this->mail->From = Session::get('user_email');
                $this->mail->FromName = Session::get('user_name');
            }

        }elseif(Config::get('EMAIL_USED_MAILER') == "google"){

            $this->mail->AuthType = 'XOAUTH2';

            $this->provider = new Google(
                [
                    'clientId' => Config::get('EMAIL_GOOGLE_CLIENT_ID'),
                    'clientSecret' => Config::get('EMAIL_GOOGLE_CLIENT_SECRET'),
                ]
            );
            
            if ($system == true){
    
                $this->refreshToken = Config::get('EMAIL_GOOGLE_SYSTEM_CODE');
                $this->userName = Config::get('EMAIL_FROM');

                $this->mail->setFrom($this->userName, Config::get('EMAIL_FROM_NAME'));
    
            }else{
    
                $this->refreshToken = UserModel::getGoogleToken(Session::get('user_id'));
                $this->userName = Session::get('user_email');

                $this->mail->setFrom($this->userName, Session::get('user_name'));

            }

            //Pass the OAuth provider instance to PHPMailer
            $this->mail->setOAuth(
                new OAuth(
                    [
                        'provider' => $this->provider,
                        'clientId' => Config::get('EMAIL_GOOGLE_CLIENT_ID'),
                        'clientSecret' => Config::get('EMAIL_GOOGLE_CLIENT_SECRET'),
                        'refreshToken' => $this->refreshToken,
                        'userName' => $this->userName,
                    ]
                )
            );

        }

    }

    public function html(){
        $this->html = true;
    }

    public function prepare($destino, $asunto, $mensaje){

        if ($this->html){
            $this->mail->IsHTML(true);
            $this->mail->msgHTML($mensaje);
        }else{
            $this->mail->Body = $mensaje;
        }

        if (is_array($destino)){

            foreach ($destino as $email) {
                $this->mail->AddAddress($email);
            }

        }else{
            $this->mail->AddAddress($destino);
        }


        $this->mail->Subject = $asunto;
    }

    public function ical($archivo){
        
        $this->mail->Ical = $archivo;

    }

    public function adjuntar($file){

        $this->mail->addAttachment($file);

    }

    public function adjuntarBase64($file, $name, $type){
        //'application/pdf'
        //"text/calendar; charset=utf-8; method=REQUEST"
        $this->mail->addStringAttachment($file, $name, 'base64', $type);

    }

    public function send(){

        $wasSendingSuccessful = $this->mail->Send();

        if ($wasSendingSuccessful) {
            return true;

        } else {
            $this->error = $this->mail->ErrorInfo;
            return false;

        }
    }
}
