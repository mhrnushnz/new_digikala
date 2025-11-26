<?php

namespace App\Repositories\admin;

interface AdminCategoryRepositoryInterface{
    public function submit($validatedData , $country_id);

    public function submitCategory($validatedData, $categoryId);

    public function submitCategoryFeatureValue($validatedData, $valueId,  $featureId);

    public function submitCategoryFeature($validatedData, $categoryId, $featureId);

    public function submitCity($validatedData , $city_id);

    public function submitState($validatedData , $stateId);
}
