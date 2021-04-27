<?php

namespace App\contracts;

interface CustomerRepositoryInterface
{
    public function all();
    public function getById($customer_id);
    public function update($customerId);
    public function delete($customerId);
}
