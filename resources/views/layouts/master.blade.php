@include('layouts.includes.meta')
@include('layouts.includes.preloader')
@include('layouts.includes.header')
@include('layouts.includes.sidebar')
<div class="mobile-menu-overlay"></div>

@yield('content')

@include('layouts.includes.script')
