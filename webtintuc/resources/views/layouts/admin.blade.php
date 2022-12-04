<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quan tri</title>
</head>
<body>

    @include('admin.block.header')
    <main class="py-0 my-auto">
        <div class="container-fluid">
            <div class="row">
                <div class="col-2 border bg-dark" style="height: 1000px;">
                    <aside style="margin: 0">
                        @section('sidebar')
                        @include('admin.block.sidebar')
                        @show
                    </aside>
                </div>
                <div class="col-10">
                    <div class="content">
                        @yield('content')
                    </div>

                </div>
            </div>
        </div>
    </main>
    @include('admin.block.footer')
</body>
</html>
