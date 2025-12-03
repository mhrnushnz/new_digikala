<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DefaultDataSeeder extends Seeder{
    /**
     * Run the database seeds.
     */


    public function run(): void{

        $sellers = [
            ['shop_name' => 'شاپ1', 'mobile' => '0000000000'],
            ['shop_name' => 'شاپ2', 'mobile' => '0000000000'],
            ['shop_name' => 'شاپ3', 'mobile' => '0000000000'],
            ['shop_name' => 'شاپ4', 'mobile' => '0000000000'],
            ['shop_name' => 'شاپ5', 'mobile' => '0000000000'],
            ['shop_name' => 'شاپ6', 'mobile' => '0000000000'],
        ];

        $categories = [
            ['name' => 'موبایل'],
            ['name' => 'گل و گیاه'],
            ['name' => 'لباس'],
            ['name' => 'لوازم جانبی'],
        ];

        $attributes = [
            ['name' => 'ضد ضربه',      'category_id' => 4],
            ['name' => 'کیفیت ساخت',   'category_id' => 4],
            ['name' => 'بالاترین کیفیت', 'category_id' => 3],
            ['name' => 'نوع رنگ',      'category_id' => 4],
            ['name' => 'سایز',         'category_id' => 1],
            ['name' => 'رنگ',          'category_id' => 3],
            ['name' => 'جنسیت',        'category_id' => 1],
            ['name' => 'مشخصات',       'category_id' => 2],
            ['name' => 'رنگ',          'category_id' => 2],
            ['name' => 'وزن',          'category_id' => 3],
            ['name' => 'جنس',          'category_id' => 3],
            ['name' => 'حجم',          'category_id' => 3],
            ['name' => 'کیفیت',        'category_id' => 1],
            ['name' => 'مقاومت',       'category_id' => 1],
            ['name' => 'اندازه',       'category_id' => 3],
            ['name' => 'ابعاد',        'category_id' => 3],
        ];


        $categoryFeatureValue = [
            ['category_feature_id' => 4, 'value' => '60 گرم'],
            ['category_feature_id' => 2, 'value' => '250000'],
            ['category_feature_id' => 1, 'value' => 'بسیار سفت'],
            ['category_feature_id' => 5, 'value' => 'بافت'],
            ['category_feature_id' => 8, 'value' => 'متوسط'],
            ['category_feature_id' => 6, 'value' => 'سختی'],
            ['category_feature_id' => 7, 'value' => 'بسیار زباد'],
            ['category_feature_id' => 10, 'value' => '60 گرم'],
            ['category_feature_id' => 9, 'value' => '70 گرم'],
            ['category_feature_id' => 10, 'value' => '30 گرم'],
        ];






        foreach ($sellers as $seller) {
            \App\Models\Seller::firstOrCreate(
                ['shop_name' => $seller['shop_name']],
                ['mobile' => $seller['mobile'] ?? null] // nullable یا مقدار پیش‌فرض
            );
        }

        foreach ($categories as $category) {
            \App\Models\Category::firstOrCreate(['name' => $category['name']]);
        }

        foreach ($attributes as $attribute) {
            \App\Models\CategoryFeature::firstOrCreate([
                'name' => $attribute['name'],
                'category_id' => $attribute['category_id']
            ]);
        }


        foreach ($categoryFeatureValue as $value) {
            \App\Models\CategoryFeatureValue::firstOrCreate([
                'category_feature_id' => $value['category_feature_id'],
                'value'               => $value['value'],
            ]);
        }
    }
}
