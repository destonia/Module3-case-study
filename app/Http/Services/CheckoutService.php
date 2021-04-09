<?php


namespace App\Http\Services;


use App\Http\Repositories\CheckoutRepository;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use http\Exception;
use Illuminate\Support\Facades\DB;

class CheckoutService
{
    protected $checkoutRepo;

    public function __construct(CheckoutRepository $checkoutRepo)
    {
        $this->checkoutRepo = $checkoutRepo;
    }

    public function createCheckout($request, $order)
    {
        DB::beginTransaction();
        try {
            $customer = new Customer();
            $customer->fill($request->all());
            $this->checkoutRepo->createCheckout($customer);

            $bill = new Bill();
            $bill->customer_id = $customer->id;
            $this->checkoutRepo->createCheckout($bill);

            foreach ($order as $key => $item) {
                $billDetail = new BillDetail();
                $billDetail->bill_id = $bill->id;
                $billDetail->product_id = $key;
                $billDetail->quantity = $item['quantity'];
                $billDetail->price = $item['price'];
                $this->checkoutRepo->createCheckout($billDetail);
            }
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
