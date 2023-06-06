<html
lang="vi"
class="light-style layout-menu-fixed"
dir="ltr"
data-theme="theme-default"
data-assets-path="/assets/"
data-template="vertical-menu-template-free"
>
<head>
    @include('administrator.partials.head')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu --> 
        @include('administrator.partials.menu')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
        <!-- Navbar -->
        @include('administrator.partials.header')
        @include('administrator.partials.menu')
        
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->

            @yield('content')
            
            <!-- / Content -->

            <!-- Footer -->
            @include('administrator.partials.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    @include('administrator.partials.foot') 
    
</body>
</html>
