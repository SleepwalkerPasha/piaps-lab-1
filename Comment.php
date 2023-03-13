<?php

namespace App;

use DateTime;

class Comment{

    private $created_at;

    private $user;

    private $message;

    public function __construct($user, $message) {
        $this->user = $user;
        $this->message = $message;
        $this->created_at = new DateTime();
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }
}