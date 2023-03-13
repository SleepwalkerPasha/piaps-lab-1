<?php

namespace App;

use DateTime;
use InvalidArgumentException;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;


class User {
    
    private $createdAt;
    
    private $id;

    private $name;

    private $email;

    private $password;

    public function __construct($id, $name, $email, $password) {
        $this->validateArgs($id, $name, $email, $password);
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->createdAt = new DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    private function validateArgs(int $id,
    string $name,
    string $email,
    string $password) : void {
        $validator = Validation::createValidator();
        $errors = $validator->validate([
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ],
        new Assert\Collection(
            [
                'id' => new Assert\Positive(),
                'name' => new Assert\Length(max:50, min:2),
                'email' => new Assert\Email(),
                'password' => new Assert\Length(max:50, min:2),
            ]
            )
        );
        if (count($errors) > 0) {
            throw new InvalidArgumentException((string) $errors);
        }
    }
}