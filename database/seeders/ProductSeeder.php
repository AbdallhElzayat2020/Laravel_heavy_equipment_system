<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample products in multiple languages
        $productNames = [
            ['en' => 'Smartphone', 'ar' => 'الهاتف الذكي'],
            ['en' => 'Laptop', 'ar' => 'حاسوب محمول'],
            ['en' => 'Headphones', 'ar' => 'سماعات'],
            ['en' => 'Smart Watch', 'ar' => 'ساعة ذكية'],
            ['en' => 'Camera', 'ar' => 'كاميرا'],
            ['en' => 'Refrigerator', 'ar' => 'ثلاجة'],
            ['en' => 'Gaming Console', 'ar' => 'جهاز الألعاب'],
            ['en' => 'Microwave Oven', 'ar' => 'فرن الميكروويف'],
            ['en' => 'Bluetooth Speaker', 'ar' => 'مكبر صوت بلوتوث'],
            ['en' => 'Electric Scooter', 'ar' => 'سكوتر كهربائي'],
        ];
        $productDesc = [
            'en'=>'A smartphone is a mobile phone that has extended mobile computing capabilities',
            'ar'=>'وصف المنتج صور سيارات نقل مرسيدس 2025 , سيارات نقل ثقيل غريبه 2025 , احلىصور سيارات نقل مرسيدس 2025 , سيارات نقل ثقيل غريبه 2025 , احلىصور سيارات نقل مرسيدس 2025 , سيارات نقل ثقيل غريبه 2025 , احلى'
        ];

        // Fetch random categories
        $categories = Category::pluck('id')->toArray();

        foreach ($productNames as $name) {
            $productInstance = Product::create([
                'name' => $name,
                'description'=> $productDesc,
                'category_id' => $categories[array_rand($categories)],
            ]);

            // Add multiple images for each product
            for ($i = 1; $i <= rand(2, 5); $i++) {
                ProductImage::create([
                    'product_id' => $productInstance->id,
                    'file_name' => rand(1,5).".jpg",
                ]);
            }
        }
    }
}
