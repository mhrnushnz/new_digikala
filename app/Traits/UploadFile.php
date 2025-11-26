<?php
namespace App\Traits;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

trait UploadFile{
    //داخل این فایل میتونیم بدون ارث بری فانکشن ها ازشون استفاده کنیم تو هم دیگه و دیگه نیازی به ارث بری نیست (extends)
    protected function UploadImageInWebpFormat($image, $productId, $width, $height, $folder){

        $path = public_path('product/' . $productId . '/' . $folder);   //مسیر پابلیکی که اصلیه رو درنظر میگیره همونی که لیست دیستابیس هامون رو مشخص کردیم
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        $manager = new ImageManager(new Driver());
        $manager->read($image->getRealPath())->scale($width, $height)->toWebp()
            ->save($path . '/' . pathinfo($image->hashName(), PATHINFO_FILENAME) . '.webp');
    }
}
