<?php


namespace App\Http\Services;


use App\Http\Repositories\OrderRepository;

class OrderService
{
    protected $orderRepository;
    public function __construct(OrderRepository $orderRepository){
        $this->orderRepository = $orderRepository;
    }
    public function showAllRecentOrder(){
        return $this->orderRepository->showAllRecentOrder();
    }

    public function showRecentOrder(){
        return $this->orderRepository->showRecentOrder();
    }
}
