<body
    class="vertical-layout vertical-menu-modern {{ $configData['showMenu'] === true ? '2-columns' : '1-column' }}
{{ $configData['blankPageClass'] }} {{ $configData['bodyClass'] }} {{ $configData['verticalMenuNavbarType'] }}
{{ $configData['sidebarClass'] }} {{ $configData['footerType'] }}"
    data-menu="vertical-menu-modern" data-col="{{ $configData['showMenu'] === true ? '2-columns' : '1-column' }}"
    data-layout="{{ $configData['theme'] === 'light' ? '' : $configData['layoutTheme'] }}"
    style="{{ $configData['bodyStyle'] }}" data-framework="laravel" data-asset-path="{{ asset('/') }}">


    @auth
    @include('panels.sidebar')


    @include('panels.navbar')

    <!-- BEGIN: Content-->
    <div class="app-content content {{ $configData['pageClass'] }}">
        <!-- BEGIN: Header-->
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
       

            <div class="content-wrapper {{ $configData['layoutWidth'] === 'boxed' ? 'container-xxl p-0' : '' }}">
                {{-- Include Breadcrumb --}}

                @include('panels.breadcrumb')


            @endauth
            <div class="content-body">
                <div id="notification" class="p-1 alert alert-success d-none invisible"></div>

                {{-- Include Page Content --}}
                @yield('content')
            </div>
        </div>


    </div>
    <!-- End: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    {{-- include footer --}}
    @include('panels/footer')

    
    {{-- include default scripts --}}
    @include('panels/scripts')
    


    <div></div>
    <script type="text/javascript">
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>

</body>

<script src="{{ asset('js/broadcastusernotification.js') }}"></script>
@stack('scripts')
</html>
