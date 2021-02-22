<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Phpmailer_library {
    public function load() {
        require_once('PHPMailer/PHPMailerAutoload.php');
    }
}