<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Catalog;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // التحقق من وجود الجداول قبل محاولة الوصول إليها
        if (!Schema::hasTable('settings')) {
            return;
        }

        $setting = $this->firstOrCreateSetting();
        
        // التحقق من وجود باقي الجداول
        $categories = Schema::hasTable('categories') ? Category::all() : collect();
        $catalog = Schema::hasTable('catalogs') ? Catalog::first() : null;
        $products_count = Schema::hasTable('products') ? Product::all()->count() : 0;

        view()->share([
            'setting' => $setting,
            'categories' => $categories,
            'catalog' => $catalog,
            'products_count' => $products_count,
        ]);

        view()->composer('dashboard.*', function ($view) use ($categories) {
            if (!Schema::hasTable('categories') || !Schema::hasTable('products') || !Schema::hasTable('contacts')) {
                return;
            }

            $categories_count = $categories->count();
            $products_count = Product::all()->count();
            $contacts_count = Contact::all()->count();

            // unread contacts
            $unread_contacts = Contact::where('is_read', 0)->get();

            view()->share([
                'products_count' => $products_count,
                'categories_count' => $categories_count,
                'contacts_count' => $contacts_count,
                'unread_contacts' => $unread_contacts
            ]);
        });
    }

    public function firstOrCreateSetting()
    {
        $getSetting = Setting::firstOr(function () {
            return Setting::create([
                'site_name' => [
                    'ar' => 'متجر الكتروني',
                    'en' => 'E-Commerce',
                ],
                'site_description' => [
                    'en' => 'Welcome to [Your Store Name], your one-stop destination for the latest and greatest products!
                                We are committed to providing high-quality products, affordable prices, and exceptional customer service.

                                At [Your Store Name], we offer a wide range of categories, from fashion and electronics to home essentials and more. Our goal is to make online shopping easy, secure, and enjoyable.

                                💡 Why shop with us?
                                ✔️ 100% Authentic Products
                                ✔️ Secure Payments & Fast Shipping
                                ✔️ 24/7 Customer Support

                                Thank you for choosing [Your Store Name] – where quality meets convenience!',

                                'ar' => 'مرحبًا بكم في [اسم المتجر]، وجهتكم المثالية للحصول على أحدث المنتجات وأفضل العروض!
                                        نحن ملتزمون بتقديم منتجات عالية الجودة بأسعار تنافسية وخدمة عملاء استثنائية.

                                        في [اسم المتجر]، نقدم مجموعة واسعة من المنتجات، بدءًا من الأزياء والإلكترونيات إلى المستلزمات المنزلية وأكثر من ذلك. هدفنا هو جعل التسوق عبر الإنترنت سهلًا وآمنًا وممتعًا.

                                        💡 لماذا تتسوق معنا؟
                                        ✔️ منتجات أصلية 100%
                                        ✔️ طرق دفع آمنة وشحن سريع
                                        ✔️ دعم فني متاح 24/7

                                        شكرًا لاختيارك [اسم المتجر] – حيث تلتقي الجودة بالراحة!',
                ],
                'about_us_image'=>'about-us.jpg',
                'site_address' => [
                    'en' => 'Egypt , Alex , Mandara',
                    'ar' => 'مصر , الاسكندريه ,  المندره',
                ],
                'site_phone' => '01222220000',
                'site_whatsapp' => '01222220000',
                'site_email' => 'e-commerce@gmail.com',

                'site_fax' => '01222220000',
                'latitude' => 24.694969,
                'longitude' => 46.724129,
                'site_logo' => 'logo.png',
                'site_favicon' => 'logo.png',
                'site_vedio' => 'https://www.youtube.com/embed/SsE5U7ta9Lw?rel=0&amp;controls=0&amp;showinfo=0',

                'after_sale_content' => [
                    'en' => 'Welcome to [Your Store Name], your one-stop destination for the latest and greatest products!
                                We are committed to providing high-quality products, affordable prices, and exceptional customer service.

                                At [Your Store Name], we offer a wide range of categories, from fashion and electronics to home essentials and more. Our goal is to make online shopping easy, secure, and enjoyable.

                                💡 Why shop with us?
                                ✔️ 100% Authentic Products
                                ✔️ Secure Payments & Fast Shipping
                                ✔️ 24/7 Customer Support

                                Thank you for choosing [Your Store Name] – where quality meets convenience!',

                                'ar' => 'مرحبًا بكم في [اسم المتجر]، وجهتكم المثالية للحصول على أحدث المنتجات وأفضل العروض!
                                        نحن ملتزمون بتقديم منتجات عالية الجودة بأسعار تنافسية وخدمة عملاء استثنائية.

                                        في [اسم المتجر]، نقدم مجموعة واسعة من المنتجات، بدءًا من الأزياء والإلكترونيات إلى المستلزمات المنزلية وأكثر من ذلك. هدفنا هو جعل التسوق عبر الإنترنت سهلًا وآمنًا وممتعًا.

                                        💡 لماذا تتسوق معنا؟
                                        ✔️ منتجات أصلية 100%
                                        ✔️ طرق دفع آمنة وشحن سريع
                                        ✔️ دعم فني متاح 24/7

                                        شكرًا لاختيارك [اسم المتجر] – حيث تلتقي الجودة بالراحة!',
                ],
                'quality_policy' => [
                    'en' => 'Welcome to [Your Store Name], your one-stop destination for the latest and greatest products!
                                We are committed to providing high-quality products, affordable prices, and exceptional customer service.

                                At [Your Store Name], we offer a wide range of categories, from fashion and electronics to home essentials and more. Our goal is to make online shopping easy, secure, and enjoyable.

                                💡 Why shop with us?
                                ✔️ 100% Authentic Products
                                ✔️ Secure Payments & Fast Shipping
                                ✔️ 24/7 Customer Support

                                Thank you for choosing [Your Store Name] – where quality meets convenience!',

                                'ar' => 'مرحبًا بكم في [اسم المتجر]، وجهتكم المثالية للحصول على أحدث المنتجات وأفضل العروض!
                                        نحن ملتزمون بتقديم منتجات عالية الجودة بأسعار تنافسية وخدمة عملاء استثنائية.

                                        في [اسم المتجر]، نقدم مجموعة واسعة من المنتجات، بدءًا من الأزياء والإلكترونيات إلى المستلزمات المنزلية وأكثر من ذلك. هدفنا هو جعل التسوق عبر الإنترنت سهلًا وآمنًا وممتعًا.

                                        💡 لماذا تتسوق معنا؟
                                        ✔️ منتجات أصلية 100%
                                        ✔️ طرق دفع آمنة وشحن سريع
                                        ✔️ دعم فني متاح 24/7

                                        شكرًا لاختيارك [اسم المتجر] – حيث تلتقي الجودة بالراحة!',
                ],
            ]);
        });
        return $getSetting;
    }
}