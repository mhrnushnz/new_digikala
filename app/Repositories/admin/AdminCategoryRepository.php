<?php

namespace App\Repositories\admin;

use App\Models\Category;
use App\Models\CategoryFeature;
use App\Models\CategoryFeatureValue;
use App\Models\City;
use App\Models\Country;
use App\Models\State;

class AdminCategoryRepository implements AdminCategoryRepositoryInterface{
    public function submit($validatedData , $country_id){
        Country::query()->updateOrCreate(
            ['id' => $country_id],                  //update
            ['name' => $validatedData['name'],      //create
            ]);
    }
    public function submitCategory($validatedData, $categoryId){
        if ($validatedData['parentId'] == "" ) {
            $validatedData['parentId'] = null;
        }
        Category::query()->updateOrCreate([
            'id' => $categoryId,                                                      //بررسی وجود این دسته بندی
        ], [
            'name' => $validatedData['name'],                                 //ساختن یا اپ دیت کردن دسته بندی
            'category_id' => $validatedData['parentId'],        //این اطلاعات از خوده جدول دسته بندی بررسی میشه
        ]);
    }
    public function submitCategoryFeatureValue($validatedData, $valueId,  $featureId){

        CategoryFeatureValue::query()->updateOrCreate([
            'id' => $valueId,                                                      //بررسی وجود این دسته بندی
        ],[
            'value' => $validatedData['value'],                                 //ساختن یا اپ دیت کردن دسته بندی
            'category_feature_id' => $featureId,        //این اطلاعات از خوده جدول دسته بندی بررسی میشه
        ]);
    }
    public function submitCategoryFeature($validatedData, $categoryId, $featureId){
        CategoryFeature::query()->updateOrCreate([
            'id' => $featureId,                                                      //بررسی وجود این دسته بندی
        ], [
            'name' => $validatedData['name'],                                 //ساختن یا اپ دیت کردن دسته بندی
            'category_id' => $categoryId,        //این اطلاعات از خوده جدول دسته بندی بررسی میشه
        ]);
    }
    public function submitCity($validatedData , $city_id){

        City::query()->updateOrCreate(
            [
                'id' => $city_id,                                          //create
            ],[
            'name' => $validatedData['name'],                          //update
            'state_id' => $validatedData['state_id'],
        ]);
    }
    public function submitState($validatedData , $stateId){
        State::query()->updateOrCreate(
            [
                'id' => $stateId
            ],[                                                            //update
            'name' => $validatedData['name'],                          //create
            'country_id' => $validatedData['country_id'],
        ]);

    }



}
