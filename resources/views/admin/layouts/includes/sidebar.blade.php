<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href="{{route('dashboard')}}"><i  class="la la-mouse-pointer active"></i><span
                        class="menu-title active" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>
     @can('الفواتير')
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الفواتير </span>
                </a>
                <ul class="menu-content">
                    @can('قائمة الفواتير')
                    <li class="active">
                        <a class="menu-item" href="{{route('index')}}" data-i18n="nav.dash.ecommerce"> قائمة الفواتير </a>
                    </li>
                    @endcan
                        @can('الفواتير المدفوعة')
                    <li>
                        <a class="menu-item" href="{{route('paid')}}" data-i18n="nav.dash.crypto">الفواتير المدفوعة</a>
                    </li>
                        @endcan
                        @can('الفواتير الغير مدفوعة')
                    <li>
                        <a class="menu-item" href="{{route('unpaid')}}" data-i18n="nav.dash.crypto">الفواتير الغير المدفوعة</a>
                    </li>
                        @endcan
                        @can('الفواتير المدفوعة جزئيا')
                    <li>
                        <a class="menu-item" href="{{route('paid_partial')}}" data-i18n="nav.dash.crypto">الفواتير المدفوعة جزئيا</a>
                    </li>
                        @endcan
                        @can('ارشيف الفواتير')
                    <li>
                        <a class="menu-item" href="{{route('archive_invoice')}}" data-i18n="nav.dash.crypto">الفواتير المؤرشفة</a>
                    </li>
                        @endcan

                </ul>
            </li>

            @endcan
            @can('التقارير')
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">التقارير </span>
                </a>
                <ul class="menu-content">
                    @can('تقرير الفواتير')
                    <li class="active">
                        <a class="menu-item" href="{{route('invoices.report')}}" data-i18n="nav.dash.ecommerce"> تقرير الفواتير </a>
                    </li>
                        @endcan
                        @can('تقرير العملاء')
                    <li>
                        <a class="menu-item" href="{{route('customers.report')}}" data-i18n="nav.dash.crypto">تقرير العملاء</a>
                    </li>
                        @endcan
                </ul>
            </li>
            @endcan
            @can('المستخدمين')
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">المستخدمين </span>
                </a>
                <ul class="menu-content">
                    @can('قائمة المستخدمين')
                        <li class="active">
                        <a class="menu-item" href="{{url('users')}}" data-i18n="nav.dash.ecommerce"> قائمةالمستخدمين </a>
                        </li>
                    @endcan
                    @can('صلاحيات المستخدمين')
                    <li>
                        <a class="menu-item" href="{{url('roles')}}" data-i18n="nav.dash.crypto">صلاحيات المستخدمين</a>
                    </li>
                        @endcan
                </ul>
            </li>
            @endcan
            @can('الاعدادات')
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الاعدادات </span>
                </a>
                <ul class="menu-content">
                    @can('الاقسام')
                    <li class="active">
                        <a class="menu-item" href="{{url('section')}}" data-i18n="nav.dash.ecommerce">الاقسام </a>
                    </li>
                    @endcan
                        @can('المنتجات')
                    <li>
                        <a class="menu-item" href="{{url('product')}}" data-i18n="nav.dash.crypto"> المنتجات</a>
                    </li>
                        @endcan
                </ul>
            </li>
            @endcan
        </ul>
    </div>
</div>
