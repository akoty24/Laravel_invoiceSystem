<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PremissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            'الفواتير',
            'قائمة الفواتير',
            'الفواتير المدفوعة',
            'الفواتير المدفوعة جزئيا',
            'الفواتير الغير مدفوعة',
            'ارشيف الفواتير',
            'اضافة فاتورة',
            'حذف الفاتورة',
            'تصدير EXCEL',
            'تغير حالة الدفع',
            'تعديل الفاتورة',
            'عرض الفاتورة',
            'ارشفة الفاتورة',
            'طباعةالفاتورة',
            'اضافة مرفق',
            'حذف المرفق',

            'التقارير',
            'تقرير الفواتير',
            'تقرير العملاء',

            'المستخدمين',
            'قائمة المستخدمين',
            'صلاحيات المستخدمين',
            'اضافة مستخدم',
            'تعديل مستخدم',
            'حذف مستخدم',
            'عرض صلاحية',
            'اضافة صلاحية',
            'تعديل صلاحية',
            'حذف صلاحية',

            'الاعدادات',
            'الاقسام',
            'المنتجات',
            'اضافة قسم',
            'تعديل قسم',
            'حذف قسم',
            'اضافة منتج',
            'تعديل منتج',
            'حذف منتج',

            'الاشعارات',

        ];


        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
        }
    }
    }
