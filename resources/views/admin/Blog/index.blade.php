<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
       <link rel="icon" href="{{ asset('front/assets/images/icons.png') }}" type="image/x-icon">
   <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="../../../code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min2167.css?v=3.2.0') }}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">
    
        <script nonce="f1447a86-ce2c-40e9-9e09-d88357b3081d">
        try {
            (function(w, d) {
                ! function(bu, bv, bw, bx) {
                    bu[bw] = bu[bw] || {};
                    bu[bw].executed = [];
                    bu.zaraz = {
                        deferred: [],
                        listeners: []
                    };
                    bu.zaraz.q = [];
                    bu.zaraz._f = function(by) {
                        return async function() {
                            var bz = Array.prototype.slice.call(arguments);
                            bu.zaraz.q.push({
                                m: by,
                                a: bz
                            })
                        }
                    };
                    for (const bA of ["track", "set", "debug"]) bu.zaraz[bA] = bu.zaraz._f(bA);
                    bu.zaraz.init = () => {
                        var bB = bv.getElementsByTagName(bx)[0],
                            bC = bv.createElement(bx),
                            bD = bv.getElementsByTagName("title")[0];
                        bD && (bu[bw].t = bv.getElementsByTagName("title")[0].text);
                        bu[bw].x = Math.random();
                        bu[bw].w = bu.screen.width;
                        bu[bw].h = bu.screen.height;
                        bu[bw].j = bu.innerHeight;
                        bu[bw].e = bu.innerWidth;
                        bu[bw].l = bu.location.href;
                        bu[bw].r = bv.referrer;
                        bu[bw].k = bu.screen.colorDepth;
                        bu[bw].n = bv.characterSet;
                        bu[bw].o = (new Date).getTimezoneOffset();
                        if (bu.dataLayer)
                            for (const bH of Object.entries(Object.entries(dataLayer).reduce(((bI, bJ) => ({
                                    ...bI[1],
                                    ...bJ[1]
                                })), {}))) zaraz.set(bH[0], bH[1], {
                                scope: "page"
                            });
                        bu[bw].q = [];
                        for (; bu.zaraz.q.length;) {
                            const bK = bu.zaraz.q.shift();
                            bu[bw].q.push(bK)
                        }
                        bC.defer = !0;
                        for (const bL of [localStorage, sessionStorage]) Object.keys(bL || {}).filter((bN => bN
                            .startsWith("_zaraz_"))).forEach((bM => {
                            try {
                                bu[bw]["z_" + bM.slice(7)] = JSON.parse(bL.getItem(bM))
                            } catch {
                                bu[bw]["z_" + bM.slice(7)] = bL.getItem(bM)
                            }
                        }));
                        bC.referrerPolicy = "origin";
                        bC.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(bu[
                            bw])));
                        bB.parentNode.insertBefore(bC, bB)
                    };
                    ["complete", "interactive"].includes(bv.readyState) ? zaraz.init() : bu.addEventListener(
                        "DOMContentLoaded", zaraz.init)
                }(w, d, "zarazData", "script");
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

      <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                    class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('logout') }}" class="nav-link">Logout</a>
        </li>
    </ul>
</nav>

    
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('') }}admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">HoneyCombDeals</span>
    </a>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link active">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Setup Manager
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.category') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.store') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Stores</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.coupon') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Coupons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.network') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Network</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.blog') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blog</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
            </ul>
        </nav>

    </div>

   
</aside>
   <div class="content-wrapper">
    <section class="content">
        <div class="container bg-light justify-content">
            @section('main-content')

            <div class="container">
                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="post" action="{{ route('admin.blog.store') }}">
                    @csrf
                </form>
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Blog</h1>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-end">
                                <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">Add New</a>
                            </div>
                        </div>
                    </div>
                </section>

                @if ($blogs->isEmpty())


                @else

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Blog Image</th>
                             <!--<th scope="col">Main content</th>-->
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $blog->title }}</td>
                            <td>
                                @if ($blog->category_image)
                                <img src="{{ asset($blog->category_image) }}" alt="Category Image"
                                    style="max-width: 50px;">
                                @else
                                No Image
                                @endif
                            </td>
                             <!--<td>{!!$blog->content!!}</td>-->
                            <td>
                                <a href="{{ route('admin.blog.edit', $blog->id) }}"
                                    class="btn btn-primary">Edit</a>
                                <!-- Replace 'admin.blog.edit' with the route name for your edit page -->
                                <form action="{{ route('admin.blog.delete', $blog->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this blog entry?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @endif

            </div>
        </div>
    </section>
</div>

            <!-- /.content -->
        </div>

        <footer class="main-footer">
            <!-- Footer content -->
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content -->
        </aside>

    </div>

    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>


    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/sparklines/sparkline.js') }}"></script>

    <script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

    <script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

    <script src="{{ asset('admin/dist/js/adminlte2167.js?v=3.2.0') }}"></script>

    <script src="{{ asset('admin/dist/js/demo.js') }}"></script>

    <script src="{{ asset('admin/dist/js/pages/dashboard.js') }}"></script>
</body>

</html>
