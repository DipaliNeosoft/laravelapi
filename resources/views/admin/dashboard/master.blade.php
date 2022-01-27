<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.head')
</head>
<body>
    @include('admin.include.nav')

    <section class="container row">
        <div class="col-md-4">
            @include('admin.include.sidebar')
        </div>
        <div class="col-md-8">
            @yield('content')
        </div>
</secion>

    @include('admin.include.foot')
</body>
</html>