<?php

namespace App\Api;

class ApiMessage
{
    public function __construct(string $message, array $data = [])
    {
        $this->message['message'] = $message;
        $this->message['data']  = $data;
    }

    public function getMessage()
    {
        return $this->message;
    }
}