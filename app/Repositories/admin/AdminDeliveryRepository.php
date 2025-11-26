<?php
namespace App\Repositories\admin;
use App\Models\CategoryFeatureValue;
use App\Models\DeliveryMethod;

class AdminDeliveryRepository implements AdminDeliveryRepositoryInterface{
    public function submiDelivery($validatedData , $deliveryId){
        DeliveryMethod::query()->updateOrCreate([
            'id' => $deliveryId,
        ],[
            'name' => $validatedData['name'],
            'price' => $validatedData['price'],
        ]);
    }


}
