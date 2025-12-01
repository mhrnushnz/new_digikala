<?php
use App\Livewire\Admin\Category\Features;
use App\Livewire\Admin\Category\FeatureValue;
use App\Livewire\Admin\Category\Index as CategoryIndex;
use App\Livewire\Admin\City\Index as CityIndex;
use App\Livewire\Admin\Country\Index as CountryIndex;
use App\Livewire\Admin\Dashboard\Index as DashboardIndex;
use App\Livewire\Admin\Delivery\Index as DeliveryIndex;
use App\Livewire\Admin\Payment\Index as IndexPayment;
use App\Livewire\Admin\Product\CkUpload;
use App\Livewire\Admin\Product\Content;
use App\Livewire\Admin\Product\Create;
use App\Livewire\Admin\Product\Features as ProductFeatures;
use App\Livewire\Admin\Product\Index;
use App\Livewire\Admin\State\Index as StateIndex;
use App\Livewire\Admin\Story\Index as StoryIndex;
use App\Livewire\Admin\slider\Index as SliderIndex;



use App\Livewire\Client\Auth\Index as ClientIndex;
use App\Livewire\Client\Home\Home as ClientHome;
use App\Livewire\Client\Product\Index as ClientProduct;
use Illuminate\Support\Facades\Route;


// Admin routes
Route::get('/dashboard', DashboardIndex::class)->name('admin.dashboard.index');
Route::get('/country', CountryIndex::class)->name('admin.country.index');
Route::get('/state', StateIndex::class)->name('admin.state.index');
Route::get('/city', CityIndex::class)->name('admin.city.index');
Route::get('/category', CategoryIndex::class)->name('admin.category.index');
Route::get('/features/{category?}/{categoryId}', Features::class)->name('admin.features.index');
Route::get('/category/features_value/{categoryFeature}', FeatureValue::class)->name('admin.features_value.index');
Route::get('/product/create', Create::class)->name('admin.product_create.index');
Route::get('/product/index', Index::class)->name('admin.product.index');
Route::get('/product/features/{product}', ProductFeatures::class)->name('admin.product.features');
Route::get('/product/content/{product}', Content::class)->name('admin.product.content');
Route::get('/product/ck-upload/{productId}', CkUpload::class)->name('admin.product.ck-upload');
Route::get('/delivery/index', DeliveryIndex::class)->name('admin.delivery.index');
Route::get('/payment/index', IndexPayment::class)->name('admin.payment.index');
Route::get('/story', StoryIndex::class)->name('admin.story.index');
Route::get('/slider', SliderIndex::class)->name('admin.slider.index');



//client



Route::get('/', ClientHome::class)->name('home');
Route::get('/auth', ClientIndex::class)->name('client.auth.index');
Route::get('/logout', [ClientIndex::class,'clientLogout'])->name('client.auth.logout');
Route::get('/auth/gmail', [ClientIndex::class, 'redirectToProvider'])->name('gmail');
Route::get('/auth/gmail/callback', [ClientIndex::class, 'handelProviderCallback'])->name('callback');
Route::get('/client/product/{p_code?}/{slug?}', ClientProduct::class)->name('client.product.index');


