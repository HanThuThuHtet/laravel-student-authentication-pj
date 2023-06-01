<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>

    <section class="container">
        <div class="row py-5">
            <div class="col-3">
               @include('layouts.nav')
            </div>
            <div class="col-9">
                {{-- @user
                    @if (is_null(session('auth')->email_verified_at))
                    <div class="alert alert-info">
                        Verify Your Account <a href="{{route('auth.verify-email')}}" class=" alert-link">Verify Your Email Here</a>
                    </div>
                    @endif
                @enduser  //to email-verify-noti.blade--}}
                @include('layouts.email-verify-noti')
                @yield('content')
            </div>
        </div>
    </section>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
