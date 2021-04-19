<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        $customers = $this->customerRepository->all();
        return [ 'code' => 200, 'error' => null, 'data' => $customers ];
    }

    public function show($customeId)
    {

        return $this->customerRepository->getById($customeId);

    }

    public function update($customerId)
    {
        $this->customerRepository->update($customerId);
        return redirect('/customers/' . $customerId);
    }

    public function destroy($customerId)
    {
        $is_deleted = $this->customerRepository->delete($customerId);

        if($is_deleted){

            return ['message' => 'Customer deleted successfully', 'code' => 203];
        }
        return ['message' => 'Customer Not Found', 'code' => 404];
    }

}
