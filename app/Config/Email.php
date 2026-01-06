<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail  = 'pec.jetable@gmail.com';
    public string $fromName   = 'Palmes en Cornouailles';
    public string $protocol   = 'smtp';

    // --- CONFIGURATION MAILTRAP (TEST) ---
    public string $SMTPHost   = 'sandbox.smtp.mailtrap.io';
    public string $SMTPUser   = 'a0b22794666abb'; 
    public string $SMTPPass   = '8499ff398152fb'; // Tes identifiants Mailtrap
    public int $SMTPPort      = 2525;
    public string $SMTPCrypto = 'tls';

    /* // --- CONFIGURATION BREVO (PRODUCTION) ---
    public string $SMTPHost   = 'smtp-relay.brevo.com';
    public string $SMTPUser   = '9f6919001@smtp-brevo.com';
    public string $SMTPPass   = 'x2BIGfkW0sYqOP6F';
    public int $SMTPPort      = 587;
    public string $SMTPCrypto = 'tls';
    */

    public string $mailType   = 'html';
    public string $charset    = 'utf-8';
    public string $newline    = "\r\n";
    public string $CRLF       = "\r\n";
    public bool $wordWrap     = true;
}