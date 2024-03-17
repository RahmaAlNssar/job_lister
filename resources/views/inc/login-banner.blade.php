<div class="login-banner d-none d-md-block border-top">
  <div class="container p-3">
    <div class="d-flex justify-content-center align-items-center">
      <p class="login-banner-text {{ Config::get('app.locale') == 'en' ? 'mr-5':'ml-5' }}">{{ __('home.Search Apply & Get Job') }}<strong>{{ __('home.Free') }}</strong></p>
      <a href="{{route('register')}}" class="primary-btn {{ Config::get('app.locale') == 'en' ? 'mr-4':'ml-4' }}">{{ __('home.Register') }}</a>
      <a href="{{route('login')}}" class="primary-outline-btn {{ Config::get('app.locale') == 'en' ? 'mr-4':'ml-4' }}">{{ __('home.Login') }}</a>
      <a href="{{route('login')}}" class="secondary-link">{{ __('home.Are you an Employer') }}?</a>
    </div>
  </div>
</div>


@push('css')
  <style>
    .login-banner{
      background-color:white;
    }
    .login-banner-text{
      font-size:1.6rem;
      color:#185A91;
    }
  </style>
@endpush