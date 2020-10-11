<?php

require_once './Employee.class.php';

class Employees implements IteratorAggregate
{
    private $employee;
    public function __construct()
    {
        $this->employee = new ArrayObject();
    }

    public function add(Employee $employee)
    {
        $this->employee[] = $employee;
    }

    public function getIterator()
    {
        return $this->employee->getIterator();
    }
}
