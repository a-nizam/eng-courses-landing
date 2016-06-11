<?php

class Bid extends Model
{
    private $name;
    private $phone;
    private $ref;

    function __construct($_name = '', $_phone = '', $_ref = '')
    {
        $this->name = $_name;
        $this->phone = $_phone;
        $this->ref = $_ref;
    }

    public function setFields($_name, $_phone, $_ref)
    {
        $this->name = $_name;
        $this->phone = $_phone;
        $this->ref = $_ref;
    }

    public function sendBid($isCall = false)
    {
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: Курсы английского языка <noreply@" . __functions::getDomainName() . ">\r\n";
        $subject = $isCall ? "Заказ звонка" : "Заявка";
        $message = "Имя: " . $this->name . "<br />Телефон: " . $this->phone . "<br />Реферал: " . $this->ref;

        return mail(ADMIN_EMAIL, $subject, $message, $headers);
    }
}