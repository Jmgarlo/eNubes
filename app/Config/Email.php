<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail  = 'juanma.servicios@gmail.com';
    public string $fromName   = 'Administrador eNubes';
    public string $recipients = '';
    public string $userAgent = 'CodeIgniter';
    public string $protocol = 'smtp';
    public string $mailPath = '/usr/sbin/sendmail';

    public string $SMTPHost;
    public string $SMTPUser;
    public string $SMTPPass;
    public int $SMTPPort;
    public string $SMTPCrypto;

    public function __construct()
    {
        $this->SMTPHost = getenv('SMTP_HOST');
        $this->SMTPUser = getenv('SMTP_USER');
        $this->SMTPPass = getenv('SMTP_PASSWORD');
        $this->SMTPPort = getenv('SMTP_PORT');
        $this->SMTPCrypto = getenv('SMTP_CRYPTO');
    }

    public int $SMTPTimeout = 5;
    public bool $SMTPKeepAlive = false;
    /**
     * SMTP Encryption.
     *
     * @var string '', 'tls' or 'ssl'. 'tls' will issue a STARTTLS command
     *             to the server. 'ssl' means implicit SSL. Connection on port
     *             465 should set this to ''.
     */

    public bool $wordWrap = true;
    public int $wrapChars = 76;
    public string $mailType = 'html';
    public string $charset = 'UTF-8';
    public bool $validate = false;
    public int $priority = 3;
    public string $CRLF = "\r\n";
    public string $newline = "\r\n";
    public bool $BCCBatchMode = false;
    public int $BCCBatchSize = 200;
    public bool $DSN = false;
}
