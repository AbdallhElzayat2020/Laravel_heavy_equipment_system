<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['en' => 'Electronics', 'ar' => 'إلكترونيات'],
            ['en' => 'Beauty & Personal Care', 'ar' => 'الجمال والعناية الشخصية'],
            ['en' => 'Sports & Outdoors', 'ar' => 'الرياضة والهواء الطلق'],
            ['en' => 'Automotive', 'ar' => 'السيارات'],
            ['en' => 'Baby Products', 'ar' => 'منتجات الأطفال'],
            ['en' => 'Office Supplies', 'ar' => 'اللوازم المكتبية'],
            ['en' => 'Gaming', 'ar' => 'الألعاب الإلكترونية'],
            ['en' => 'Furniture', 'ar' => 'الأثاث'],
            ['en' => 'Garden & Tools', 'ar' => 'الحديقة والأدوات'],
            ['en' => 'Handmade Products', 'ar' => 'المنتجات اليدوية'],
            ['en' => 'Smartphones & Accessories', 'ar' => 'الهواتف الذكية والإكسسوارات'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
            ]);
        }
    }
}
