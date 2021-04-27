<?php

namespace App\Repositories;

use App\Models\Customer;
use App\contracts\CustomerRepositoryInterface;

class CustomerRepository implements CustomerRepositoryInterface
{

    public function all()
    {

        return Customer::orderBy('name')
            ->where('active', 1)
            ->with('user')
            ->get()
            ->map->format();

        //Or

        // return Customer::orderBy('name')
        // ->where('active', 1)
        // ->with('user')
        // ->get()
        // ->map(function($customer){
        //     return $customer->format();
        // });

    }

    public function getById($customer_id)
    {
        return Customer::where('id', $customer_id)
            ->where('active', 1)
            ->with('user')
            ->firstOrFail()
            ->format();                    //which is created in customer model
    }

    public function update($customerId)
    {
        $customer = Customer::where('id', $customerId)->firstOrFail();
        $customer->update(request()->only('name'));                     // URI?name=Bassam
    }

    public function delete($customerId)
    {
        return Customer::where('id', $customerId)->delete();            //existed ==> 1 ,  not found ==> 0
    }
}
