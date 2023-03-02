<ul class="nav-list list-unstyled components">
    <li class="d-flex flex-row ">
        <div class="selector d-flex flex-row navlink">
            <i class="fa-solid fa-house-chimney 
                h-50 my-auto ms-3"></i>
            <a class="" 
            href={{ URL::route('home') }}>{{ __('Trang chủ') }}</a>
        </div>
    </li>   
    <li class="d-flex flex-row ">
        <div class="selector d-flex flex-row navlink">
            <i class="fa-solid fa-book h-50 my-auto ms-3"></i>
            <a class="" 
            href="{{ URL::route('rules') }}">{{ __('Quy định thư viện') }}</a>
        </div>
    </li>
    <li class="d-flex flex-row ">
        <div class="selector d-flex flex-row navlink">
            <i class="fa-solid fa-bell h-50 my-auto ms-3"></i>
            <a class="" 
            href="{{ URL::route('notify') }}">{{ __('Thông báo') }}</a>
        </div>
    </li>
    <li class="d-flex flex-column has-submenu">
        <div class="selector d-flex flex-row openSubNav navlink">
            <i class="fa-solid fa-folder h-50 my-auto ms-3"></i>
            <a class="" 
            href="/manage">{{ __('Quản lý') }}</a>
        </div>
        <div class="submenu collapse">
            @include('layouts.librarian')    
        </div>            
    </li>   
</ul>