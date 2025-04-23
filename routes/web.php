<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\CartController;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Blog;
use App\Models\SubCategory;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\InvoiceController;

Route::get('/', function () {
    $subcategory = SubCategory::all();
    $is_top = Product::with('firstVariant')->where('is_top', 1)->take(9)->get();
    $is_tren = Product::with('firstVariant')->where('is_trending', 1)->take(4)->get();
    $blog = Blog::all()->take(2);
    $recentBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();

    return view('welcome', compact('subcategory', 'blog', 'is_top', 'is_tren', 'recentBlogs'));
});
// PageController---------------
Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('shop', [PageController::class, 'shop'])->name('shop');
Route::get('services', [PageController::class, 'services'])->name('services');
Route::get('blog', [PageController::class, 'blog'])->name('blog');
Route::get('contact', [PageController::class, 'contact'])->name('contact');
Route::get('cart', [PageController::class, 'cart'])->name('cart');
Route::get('shippinganddelivery', [PageController::class, 'shippinganddelivery'])->name('shippinganddelivery');
Route::get('cancellationandrefund', [PageController::class, 'cancellationandrefund'])->name('cancellationandrefund');
Route::get('termandconditions', [PageController::class, 'termandconditions'])->name('termandconditions');
Route::get('privacypolicy', [PageController::class, 'privacypolicy'])->name('privacypolicy');
Route::get('faq', [PageController::class, 'faq'])->name('faq');
Route::get('wishlist', [PageController::class, 'wishlist'])->name('wishlist');
Route::get('checkout', [PageController::class, 'checkout'])->name('checkout');
// Authentication--------------

Route::get('/login', [AuthController::class, 'showloginform'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showregisterform'])->name('Auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Admin login routes
Route::get('/admin/login', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
// Dashboards
Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/user/dashboard', [AuthController::class, 'dashboard'])->name('user.dashboard');
Route::get('admin/users', [AuthController::class, 'index'])->name('admin.users');
// category routes---------
Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category');
Route::get('/admin/manage_category', [CategoryController::class, 'manage_category'])->name('admin/manage_category');
Route::get('admin/category/manage_category/{id}', [CategoryController::class, 'manage_category']);
Route::post('admin/category/manage_category_process', [CategoryController::class, 'manage_category_process'])->name('category.manage_category_process');
Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);
Route::get('admin/category/status/{status}/{id}', [CategoryController::class, 'status']);
// subcategory routes---------
Route::get('/admin/subcategory', [SubCategoryController::class, 'index'])->name('admin.subcategory');
Route::get('/admin/manage_subcategory', [SubCategoryController::class, 'manage_subcategory'])->name('admin/manage_subcategory');
Route::get('admin/subcategory/manage_subcategory/{id}', [SubCategoryController::class, 'manage_subcategory']);
Route::post('admin/subcategory/manage_subcategory_process', [SubCategoryController::class, 'manage_subcategory_process'])->name('subcategory.manage_subcategory_process');
Route::get('admin/subcategory/delete/{id}', [SubCategoryController::class, 'delete']);
Route::get('admin/subcategory/status/{status}/{id}', [SubCategoryController::class, 'status']);
// Customer routes---------
Route::get('admin/customer', [CustomerController::class, 'index'])->name('admin.customer');
Route::get('admin/customer/show/{id}', [CustomerController::class, 'show']);
Route::get('admin/customer/show_customer/{id}', [CustomerController::class, 'show_customer'])->name('customer.show_customer');
Route::get('admin/customer/status/{status}/{id}', [CustomerController::class, 'status']);
// product---------
Route::get('admin/product', [ProductController::class, 'index'])->name('admin.product');
Route::get('/admin/manage_product', [ProductController::class, 'manage_product'])->name('admin/manage_product');
Route::get('/product/{slug}', [ProductController::class, 'show']);
Route::get('admin/product/manage_product/{id}', [ProductController::class, 'manage_product']);
Route::post('admin/product/manage_product_process', [ProductController::class, 'manage_product_process'])->name('product.manage_product_process');
Route::get('admin/product/delete/{id}', [ProductController::class, 'delete']);
Route::get('admin/product/status/{status}/{id}', [ProductController::class, 'status']);
// Route::get('/shop/{slug}', [ProductController::class, 'productdetails']);
Route::get('/product-details/{id}', [ProductController::class, 'productdetails'])->name('product.details');


// Blogs------------
Route::get('/admin/blog', [BlogController::class, 'index'])->name('admin.blog');
Route::get('/admin/manage_blog/{id?}', [BlogController::class, 'manage_blog'])->name('blog.manage_blog');
Route::post('/admin/manage_blog_process', [BlogController::class, 'manage_blog_process'])->name('blog.manage_blog_process');
Route::get('/admin/blog/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');
Route::get('/blog/{slug}', [BlogController::class, 'blog_details']);

// MailController
Route::post('send-email', [MailController::class, 'sendEmail']);
Route::view('send-email', 'contact');

// wishlist---------
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::post('/wishlist/add', [WishlistController::class, 'store'])->name('wishlist.add');
Route::get('/wishlist/remove/{id}', [WishlistController::class, 'destroy'])->name('wishlist.remove');
// Route::get('/wishlist/cart/{id}', [WishlistController::class, 'addToCart'])->name('wishlist.addtocart');
Route::post('/wishlist/add-to-cart', [WishlistController::class, 'addToCart'])->name('wishlist.addtocart');

Route::post('/wishlist/store', [WishlistController::class, 'store'])->name('wishlist.store');

// cart----------
Route::get('/carthome', [CartController::class, 'index'])->name('carthome');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
// Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
// checkout-----
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/place-order', [CheckoutController::class, 'placeOrder'])->name('place.order');
    Route::post('/payment-success', [CheckoutController::class, 'paymentSuccess'])->name('payment.success');
});
Route::get('/thank-you', function () {
    return view('thankyou');
})->name('thankyou.page');

Route::get('/admin/order', [OrderController::class, 'index'])->name('admin.order');
Route::get('/admin/orderitem', [OrderController::class, 'orderitem'])->name('admin.orderitem');
Route::get('/admin/orderaccepted', [OrderController::class, 'orderaccepted'])->name('admin.orderaccepted');
Route::get('/admin/orderpending', [OrderController::class, 'orderpending'])->name('admin.orderpending');
Route::get('/admin/ordercancelled', [OrderController::class, 'ordercancelled'])->name('admin.ordercancelled');
Route::put('admin/order-item/status/{id}', [OrderController::class, 'updateOrderItemStatus'])->name('admin.updateOrderItemStatus');
Route::delete('admin/order-item/delete/{id}', [OrderController::class, 'deleteOrderItem'])->name('admin.deleteOrderItem');

// invoices-------
// Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
Route::get('/admin/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
Route::get('/admin/invoices/generate/{orderId}', [InvoiceController::class, 'generate'])->name('invoices.generate');
Route::get('/admin/invoices/download/{id}', [InvoiceController::class, 'download'])->name('invoices.download');
// });
