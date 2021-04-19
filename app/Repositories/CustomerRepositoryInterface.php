<?php
namespace App\Repositories;

interface CustomerRepositoryInterface
{
    public function all();
    public function getById($customer_id);
    public function update($customerId);
    public function delete($customerId);
}
