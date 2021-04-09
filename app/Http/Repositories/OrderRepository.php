<?php


namespace App\Http\Repositories;


use Illuminate\Support\Facades\DB;

class OrderRepository
{
    public function showRecentOrder(){
        $recentOrder = DB::table('customers')
            ->join('bills', 'customers.id', '=', 'bills.customer_id')
            ->join('bill_details', 'bills.id', '=', 'bill_details.bill_id')
            ->join('products', 'products.id', '=', 'bill_details.product_id')
            ->select('customers.full_name', 'bill_details.quantity', 'bill_details.price','bill_details.price','products.name','products.photo','products.id','bills.created_at')
            ->orderBy('bills.created_at','desc')->take(5)->get();
       return $recentOrder;
    }

    public function showAllRecentOrder(){
        $recentOrder = DB::table('customers')
            ->join('bills', 'customers.id', '=', 'bills.customer_id')
            ->join('bill_details', 'bills.id', '=', 'bill_details.bill_id')
            ->join('products', 'products.id', '=', 'bill_details.product_id')
            ->select('customers.full_name', 'bill_details.quantity', 'bill_details.price','bill_details.price','products.name','products.photo','products.id','bills.created_at')
            ->orderBy('bills.created_at','desc')->get();
        return $recentOrder;
    }
}
