<?php
namespace App\Livewire\Admin\Product;
use App\Models\CategoryFeature;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Features extends Component{

    public $productId;
    public $features = [];
    public $featureIdValue;


    public function mount(Product $product){
        $categoryId = $product->category_id;
        $this->productId = $product->id;
        $this->features = CategoryFeature::query()->where('category_id', $categoryId)->with('categoryFeatureValues')->get();
        foreach ($this->features as $index => $feature) {
            $this->featureIdValue[$index] = null;
        }
    }


    public function submit(){

        $featureIds = [];
        $featureValueIds = [];
        foreach ($this->featureIdValue as $value) {
            list($featureId, $featureValueId) = explode('_', $value);
            $featureIds[] = $featureId;
            $featureValueIds[] = $featureValueId;


        }

       $data = [
           'feature_ids' => $featureIds,
           'feature_value_ids' => $featureValueIds,
       ];

        $validator = Validator::make($data, [
            'feature_ids' => 'required|array',
            'feature_ids.*' => 'required|exists:category_features,id',
            'feature_value_ids' => 'required|array',
            'feature_value_ids.*' => 'required|exists:category_feature_values,id',
        ],[
            '*.required' => 'فیلد اجباری',
            '*.array' => 'نوع اطلاعات باید ارایه باشد',
            'feature_ids.*.required' => 'ویژگی نا معتبر است',
            'feature_value_ids.*.exists' => 'مقادیر ویژگی نامعتبر است',
        ]);

        $validator->validate();
        $this->resetValidation();

    }


    public function render(){
        return view('livewire.admin.product.features')->layout('layouts.admin.app');
    }
}
