@user
    @if (is_null(session('auth')->email_verified_at))
        <div class="alert alert-info">
            Verify Your Account <a href="{{route('auth.verify-email')}}" class=" alert-link">Verify Your Email Here</a>
        </div>
    @endif
@enduser
