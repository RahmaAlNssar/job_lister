@extends('layouts.account')

@section('content')
  <div class="account-layout  border">
    <div class="account-hdr bg-primary text-white border">
     {{__('account-view-users.VIewing all users')}} <span class="badge badge-primary">{{ __('account-view-users.Any Role') }}</span>
    </div>
    <div class="account-bdy p-3">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <div class="table-responsive pt-3">
            <table class="table table-hover table-striped small">
              <thead>
                <tr>
                  <th>#</th>
                  <th>{{ __('account-view-users.Users') }}</th>
                  <th>{{ __('account-view-users.Email') }}</th>
                  <th>{{ __('account-view-users.created on') }}</th>
                  <th>{{ __('account-view-users.Action') }}</th>
                </tr>
              </thead>
              <tbody>
                @if($users->count()) 
                @foreach($users as $user)
                <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                  <td>{{$user->created_at}}</td>
                  <td>
                    <form action="{{route('account.destroyUser')}}" method="POST">
                      @csrf
                      @method('delete')
                      <input type="hidden" name="user_id" value="{{$user->id}}">
                      <button class="btn primary-btn">{{ __('account-nav.Delete') }}</button>
                    </form>
                  </td>
                </tr>
                @endforeach
                @else
                <tr>
                  <td>{{ __("account-view-users.There isn't any users") }}.</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                @endif 
              </tbody>
            </table>
          </div>
          <div class="d-flex justify-content-center mt-4 custom-pagination">
            {{ $users->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endSection
