<?php
namespace App\Repositories\admin;
use App\Models\Product;
use App\Models\ProductImage;

interface ProductRepositoryInterface{

    public function SubmitContent($validatedData, $productId);
    public function submitToProductImage($images, $productId, $coverIndex);
    public function saveImages($images, $productId );
    public function submitToProduct($validatedData, $productId);
    public function generateProductCode();
    public function submitToSeo($validatedData, $productId);
    public function RemoveOldImage(ProductImage $productImage , $productId);
    public function setCoverOldImage($imageId, $productId);
    public function removeProduct(Product $product);


}
