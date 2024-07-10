<?php

class Product
{
    private int $id;
    private string $serial_number;
    private string $manufacturer;
    private string $type;
    private string $status;
    private string $submission_date;
    private string $last_status_change;

    public function __construct(/*int $id, */string $serial_number, string $manufacturer, string $type, string $status, string $submission_date, string $last_status_change)
    {
        /*$this->id = $id;*/
        $this->serial_number = $serial_number;
        $this->manufacturer = $manufacturer;
        $this->type = $type;
        $this->status = $status;
        $this->submission_date = $submission_date;
        $this->last_status_change = $last_status_change;
    }

    public function getId():int
    {
        return $this->id;
    }

    public function getSerialNumber():string
    {
        return $this->serial_number;
    }

    public function getManufacturer():string
    {
        return $this->manufacturer;
    }

    public function getType():string
    {
        return $this->type;
    }

    public function getStatus():string
    {
        return $this->status;
    }

    public function getSubmissionDate():string
    {
        return $this->submission_date;
    }

    public function getLastStatusChange():string
    {
        return $this->last_status_change;
    }
}
