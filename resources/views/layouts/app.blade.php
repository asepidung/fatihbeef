<!DOCTYPE html>
<html lang="id">
@include('layouts.partials.header') <!-- Memasukkan Header -->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('layouts.partials.navbar') <!-- Navbar -->
        @include('layouts.partials.sidebar') <!-- Sidebar -->

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <!-- <h1 class="m-0">@yield('title')</h1> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>

        @include('layouts.partials.footer') <!-- Footer -->

    </div>
</body>

</html>