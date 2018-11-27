<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 11/27/2018
 * Time: 3:09 PM
 */

namespace RWC\Shutterfly;

/**
 * Information about the end customer.
 *
 * @package RWC\Shutterfly
 */
class Orderer
{
    /**
     * First name of the customer.
     *
     * @var string
     */
    protected $firstName;

    /**
     * Last name of the customer.
     *
     * @var string
     */
    protected $lastName;

    /**
     * Email address of the customer.
     *
     * @var null|string
     */
    protected $email;

    /**
     * Internal Shutterfly user type. This is only used by Shutterfly’s labs.
     *
     * @var null|string
     */
    protected $userType;

    /**
     * First name of the customer.
     *s
     * @return string First name of the customer.
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * First name of the customer. z
     *
     * @param string $firstName First name of the customer.
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * Last name of the customer.
     *
     * @return string Last name of the customer.
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * Last name of the customer.
     *
     * @param string $lastName Last name of the customer.
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * Email address of the customer.
     *
     * @return null|string Email address of the customer.
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Email address of the customer.
     *
     * @param null|string $email Email address of the customer.
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * Internal Shutterfly user type. This is only used by Shutterfly’s labs.
     *
     * @return null|string Internal Shutterfly user type. This is only used by Shutterfly’s labs.
     */
    public function getUserType(): ?string
    {
        return $this->userType;
    }

    /**
     * Internal Shutterfly user type. This is only used by Shutterfly’s labs.
     *
     * @param null|string $userType Internal Shutterfly user type. This is only used by Shutterfly’s labs.
     */
    public function setUserType(?string $userType): void
    {
        $this->userType = $userType;
    }
}