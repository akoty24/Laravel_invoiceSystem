<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href=""><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الفواتير </span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('index')}}" data-i18n="nav.dash.ecommerce"> قائمة الفواتير </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('paid')}}" data-i18n="nav.dash.crypto">الفواتير المدفوعة</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('unpaid')}}" data-i18n="nav.dash.crypto">الفواتير الغير المدفوعة</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('paid_partial')}}" data-i18n="nav.dash.crypto">الفواتير المدفوعة جزئيا</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">التقارير </span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="" data-i18n="nav.dash.ecommerce"> تقرير الفواتير </a>
                    </li>
                    <li>
                        <a class="menu-item" href="" data-i18n="nav.dash.crypto">تقرير العملاء</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">المستخدمين </span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="" data-i18n="nav.dash.ecommerce"> قائمةالمستخدمين </a>
                    </li>
                    <li>
                        <a class="menu-item" href="" data-i18n="nav.dash.crypto">صلاحيات المستخدمين</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الاعدادات </span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{url('section')}}" data-i18n="nav.dash.ecommerce">الاقسام </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{url('product')}}" data-i18n="nav.dash.crypto"> المنتجات</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
