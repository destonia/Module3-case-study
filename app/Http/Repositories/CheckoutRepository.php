<?php


namespace App\Http\Repositories;


class CheckoutRepository
{
    public function createCheckout($object)
    {
        $object->save();
    }
}
