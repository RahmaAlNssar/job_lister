@extends('layouts.account')

@section('content')
  <div class="account-layout border">
    <div class="account-hdr bg-primary text-white border">
      {{ __('create-company.Edit Company') }}
    </div>
    <div class="account-bdy p-3">
     <form action="{{route('company.update',['id'=>$company])}}" method="POST" enctype="multipart/form-data">
      @if($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif

        @csrf
        @method('put')
        <div class="form-group">
          <label for="">{{ __('create-company.Choose a Company Category') }}</label>
          <select class="form-control" name="category" value="{{ old('category')??$company->company_category_id }}"  required>
            @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endforeach
          </select>
        </div>

        <div class="pb-3">
          <div class="py-3">
            <p>{{ __('create-company.Company logo') }}</p>
            <img src="{{asset($company->logo)}}" width="80px" alt="">
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input"  name="logo">
            <label class="custom-file-label" >{{ __('create-company.Choose logo') }}...</label>
            @error('logo')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="form-group">
          <div class="py-3">
            <p>{{ __('create-company.Company Title') }}</p>
          </div>
          <input type="text" placeholder="{{ __('create-company.Company Title') }}" class="form-control @error('password') is-invalid @enderror" name="title" value="{{ old('title')??$company->title }}" required>
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
          <div class="pt-3">
            <p>{{ __('create-company.Company Website Url') }}</p>
            <p class="text-primary">For example : https://www.examplecompany.com</p>
          </div>
          <input type="text" placeholder="{{ __('create-company.Company Website Url') }}" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website')??$company->website }}" required>
            @error('website')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="pb-3">
          <div class="py-3">
            <p class="py-2">{{ __('create-company.Company banner/cover') }}</p>
            <img src="{{asset($company->cover_img)}}" width="200px;" class="img-fluid" alt="">
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="validatedCustomFile" name="cover_img">
            <label class="custom-file-label" for="validatedCustomFile">{{ __('create-company.Choose cover img') }}...</label>
            @error('cover_img')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
   
        <div class="pt-2">
          <p class="mt-3 alert alert-primary">{{ __('create-company.Provide a short paragraph description about your company') }}</p>
        </div>
        <div class="form-group">
          <textarea class="form-control @error('description') is-invalid @enderror" name="description" required>{{ old('description')??$company->description }}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
   
        <div class="line-divider"></div>
        <div class="mt-3">
          <button type="submit" class="btn primary-btn">{{ __('create-company.Update company') }}</button>
          <a href="{{route('account.authorSection')}}" class="btn primary-outline-btn">{{ __('create-company.Cancel') }}</a>
        </div>
      </form>
    </div>
  </div>
@endSection
