<!DOCTYPE html>
<html lang="zxx" class="js">

@include('layouts.partials.head')

<body class="nk-body bg-lighter npc-default has-sidebar">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
           @include('layouts.partials.sidebar')
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                @include('layouts.partials.header')

                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    @yield('page')
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                @include('layouts.partials.footer')
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('assets/auth/js/bundle.js') }}"></script>
    <script src="{{ asset('assets/auth/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/auth/js/charts/chart-ecommerce.js') }}"></script>
</body>

</html>
