
<div class="col-xl-3 col-lg-4">
    <div class="wsus__dashboard_menu">
        <div class="dasboard_header">
            @if ($user->image)
                <div class="dasboard_header_img">
                    <img src="{{ asset($user->image) }}" alt="user" class="img-fluid w-100">
                    <label for="upload"><i class="far fa-camera"></i></label>
                    <input type="file" id="upload" hidden>
                </div>
            @else
                <div class="dasboard_header_img">
                    <img src="{{ asset($default_avatar) }}" alt="user" class="img-fluid w-100">
                </div>
            @endif

            <h2>{{ $user->name }}</h2>
        </div>
        <div class="wsus__dashboard_menu_package">
            @if ($is_package)
                <h3>{{ $package_name }}</h3>
                <p id="left_word">{{ $left_word }} {{__('user.words left')}}</p>
                <a class="read_btn" href="{{ route('dashboard-pricing-plan') }}">{{__('user.upgrade')}}</a>
            @else
                <p id="left_word">{{ $left_word }} {{__('user.words left')}}</p>
                <a class="read_btn" href="{{ route('dashboard-pricing-plan') }}">{{__('user.Purchase')}}</a>
            @endif

        </div>
        <ul>
            <li><a class="{{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"> <span><i class="fas fa-marker"></i></span>
                    {{__('user.AI Write')}}</a> </li>
            <li><a class="{{ Route::is('ai-history') ? 'active' : '' }}" href="{{ route('ai-history') }}"><span><i class="fas fa-th-list"></i></span>
                    {{__('user.AI history')}}</a> </li>
            <li><a class="{{ Route::is('my-profile') ? 'active' : '' }}" href="{{ route('my-profile') }}"><span><i class="fas fa-user"></i></span>{{__('user.Personal Information')}}</a></li>
            <li><a class="{{ Route::is('dashboard-pricing-plan') ? 'active' : '' }}" href="{{ route('dashboard-pricing-plan') }}"><span><i class="fas fa-badge-dollar"></i></span>
                    {{__('user.pricing plan')}}</a></li>
            <li><a class="{{ Route::is('payment-history') ? 'active' : '' }}" href="{{ route('payment-history') }}"><span><i
                            class="fas fa-money-check-alt"></i></span>{{__('user.payment history')}}</a></li>

            <li><a class="{{ Route::is('change-password') ? 'active' : '' }}" href="{{ route('change-password') }}"><span><i
                            class="fas fa-lock-alt"></i></span>{{__('user.Change Password')}}</a></li>

            <li><a href="{{ route('user.logout') }}"><span> <i class="fas fa-sign-out-alt"></i> </span> {{__('user.Logout')}}</a></li>
        </ul>
    </div>
</div>
