<?php
declare(strict_types=1);
namespace MaxLZp\Messaging;

/**
 * Class Recipient
 *
 * @package  MaxLZp\Messaging
 */
class Recipient
{
    /** @var string */
    protected $firstName;
    /** @var string */
    protected $lastName;
    /** @var string */
    protected $email;
    /** @var string */
    protected $phone;

    public function __construct(
        string $firstName, 
        string $lastName, 
        string $email = '', 
        string $phone = ''
    ) {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setEmail($email);
        $this->setPhone($phone);
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

}