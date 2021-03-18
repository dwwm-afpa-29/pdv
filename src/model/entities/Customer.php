<?php

class Customer {

    private $id;
    private $firstName;
    private $lastName;
    private $mail;
    private $passwd;
    private $addressStreet;
    private $addressZipCode;
    private $addressCity;
    private $phoneNumber;
    private $dateOfBirth;

    public function getId() {
        return $this->id;
    }

    public function setId($id) : Customer {
        $this->id = $id;
        return $this;
    }

    public function getFirstName() : string {
        return $this->firstName;
    }

    public function setFirstName($firstName) : Customer {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName() : string {
        return $this->lastName;
    }

    public function setLastName(string $lastName) : Customer {
        $this->lastName = $lastName;
        return $this;
    }

    public function getMail() : string {
        return $this->mail;
    }
    
    public function setMail(string $mail) : Customer {
        $this->mail = $mail;
        return $this;
    }

    public function getPasswd() : string {
       return $this->passwd;
    }

    public function setPasswd(string $passwd) : Customer {
        $this->passwd = $passwd;
        return $this;
    }

    public function getAddressStreet() : string {
        return $this->addressStreet;
    }

    public function setAddressStreet(string $addressStreet) : Customer {
        $this->addressStreet = $addressStreet;
        return $this;
    }

    public function getAddressZipCode() : string {
        return $this->addressZipCode;
    }

    public function setAddressZipCode(string $addressZipCode) : Customer {
        $this->addressZipCode = $addressZipCode;
        return $this;
    }

    public function getAddressCity() : string {
        return $this->addressCity;
    }

    public function setAddressCity(string $addressCity) : Customer {
        $this->addressCity = $addressCity;
        return $this;
    }

    public function getPhoneNumber() : string {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber) : Customer {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function getDateOfBirth() : \DateTime {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(DateTime $dateOfBirth) : Customer {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }
}

?>