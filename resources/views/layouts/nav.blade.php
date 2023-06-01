<aside>
    {{-- @if (session('auth'))
        show other features
        <p>Profile Setting</p>
    @endif --}}
    @user
        <p class="mt-3 mb-1">Dashboard</p>
        <div class="list-group">
            <a href="{{route('dashboard.home')}}" class="list-group-item">Dashboard</a>
        </div>

        <p class="mt-3 mb-1">Setting</p>
        <div class="list-group">
            <a href="{{route('dashboard.home')}}" class="list-group-item">Profile setting</a>

            <a href="{{route('auth.change-password')}}" class="list-group-item">Change Password</a>
        </div>
        <div class="list-group mt-3">
            <form action="{{route('auth.logout')}}" method="post">
                @csrf
                <button class="btn btn-outline-secondary d-block w-100">Logout</button>
            </form>
        </div>
    @enduser

    @guest
        <div class="list-group">
            <a href="{{ route('auth.login') }}" class="list-group-item">Login</a>
            <a href="{{ route('auth.register') }}" class="list-group-item">Register</a>
        </div>
    @endguest

</aside>
