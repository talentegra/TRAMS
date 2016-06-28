<?php

/*
  | -------------------------------------------------------------------
  | EMAIL CONFING
  | -------------------------------------------------------------------
  | Configuration of outgoing mail server.
  | */
$config = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'mail.bilsn.com',
    'smtp_port' => 587,
    'smtp_user' => 'webadmin@bilsn.com', 
    'smtp_pass' => 'Zaq12wsx', 
    'mailtype' => 'html',
    'charset' => 'utf-8',
    'wordwrap' => TRUE,
    'from_email' => 'webadmin@bilsn.com',
    'wrapchars' => 76,
    'validate' => FALSE,
    'priority' => 3,
    'newline' => "\r\n",
    'crlf'    => "\n", 
);


/* End of file email.php */
/* Location: ./system/application/config/email.php */
?>
