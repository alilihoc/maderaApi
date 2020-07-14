<?php


namespace App\Controller\Api;


use App\Entity\Customer;

class CustomerCreateController
{

    public function __invoke(Customer $data)
    {
        dd($data);
    }
}