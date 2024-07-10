<?php

class Contact
{
    private int $id;
    private int $product_id;
    private string $first_name;
    private string $middle_name;
    private string $last_name;
    private string $phone;
    private string $email;

    public function __construct(?int $id, int $product_id, string $first_name, string $middle_name, string $last_name, string $phone, string $email)
    {
        $this->id = $id ?? 0;
        $this->product_id = $product_id;
        $this->first_name = $first_name;
        $this->middle_name = $middle_name;
        $this->last_name = $last_name;
        $this->phone = $phone;
        $this->email = $email;
    }

    public function getId():int
    {
        return $this->id;
    }

    public function getProductId():int
    {
        return $this->product_id;
    }

    public function getFirstName():string
    {
        return $this->first_name;
    }

    public function getMiddleName():string
    {
        return $this->middle_name;
    }

    public function getLastName():string
    {
        return $this->last_name;
    }

    public function getPhone():string
    {
        return $this->phone;
    }

    public function getEmail():string
    {
        return $this->email;
    }
}