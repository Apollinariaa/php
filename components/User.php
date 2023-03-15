<?php

namespace classes;

use DateTime;
use Symfony\Component\Validator\Constraints as Assert;

class User
{
    #[Assert\GreaterThanOrEqual(0)]
    public int $id;

    #[Assert\Length(min: 3, max: 15), Assert\Type(['type' => 'string'])]
    public string $name;

    #[Assert\Email(), Assert\Length(['min' => 5])]
    public string $email;

    #[Assert\NotBlank(), Assert\Length(['min' => 8, 'max' => 64]), Assert\Type(['type' => 'string']),]
    public string $password;

    public function __construct($id, $name, $email, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->time = new DateTime();
    }

    public function getTime()
    {
        return $this->time;
    }
}

