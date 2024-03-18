@extends('layouts.account')
@section('content')
<div class="account-layout  border">
  <div class="account-hdr bg-primary text-white border">
   {{ __('become-employer.Become an employer in') }} {{config('app.name')}}
  </div>
  <div class="account-bdy p-3">
    <div class="row">
      <div class="col-sm-12 col-md-4">
        <p class="lead">{{ __('become-employer.Upgrade to Author Role') }}</p>
      </div>
      <div class="col-sm-12 col-md-8">
        <div>
          <p class="text-sm"><i class="fas fa-info-circle"></i> <span class="font-weight-bold">{{ __('become-employer.Usually this should be validated by Admin but for testing it is one click away to become an employer') }}.</span> </p>
          <div class="my-4">
          <p class="my-3">{{ __('become-employer.Click the button to assign') }} <span class="text-primary">{{ __('become-employer.Author roles') }}</span> {{ __('become-employer.to your account') }}.</p>
            <form action="{{route('account.becomeEmployer')}}" method="POST">
              @csrf
              <div class="form-group">
                <div class="d-flex">
                  <button type="submit" class="btn primary-outline-btn">{{ __('become-employer.Become Employer') }}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection