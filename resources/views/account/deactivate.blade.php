@extends('layouts.account')

@section('content')
  <div class="account-layout border">
    <div class="account-hdr bg-primary text-white border">
      {{ __('deactive-account.Deactivate Account') }}
    </div>
    <div class="account-bdy p-3">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <p class="lead">{{ __('deactive-account.Deleting Account') }}</p>
         
        </div>
        <div class="col-sm-12 col-md-8">
          <div class="py-3">
            <p class="mb-3">{{ __('deactive-account.Logout instead') }}</p>
            <a href="{{route('account.logout')}}" class="btn primary-outline-btn">{{ __('deactive-account.Logout') }}</a>
          </div>
          
          <div>
            <p class="text-sm"><i class="fas fa-info-circle"></i> <span class="font-weight-bold">{{ __('deactive-account.You will not be able to retrive your account once you have deleted it') }}.</span> </p>
            <div class="my-4">
            <p class="my-3">{{ __('deactive-account.Click the button to delete this account') }}.</p>
              <form action="{{route('account.delete')}}" method="POST">
                @csrf
                @method('delete')
                <div class="form-group">
                  <div class="d-flex">
                    <button type="submit" class="btn danger-btn">{{ __('deactive-account.Delete Account') }}</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endSection

