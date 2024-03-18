@extends('layouts.account')

@section('content')
  <div class="account-layout border">
    <div class="account-hdr bg-primary text-white border">
      {{ __('post-create.Create Job listings') }}
    </div>
    <div class="account-bdy p-3">
      <div class="alert alert-primary">{{ __('post-create.Your company details will be attached automatically') }}.</div>
      <p class="text-primary mb-4">{{ __('post-create.Fill in all fields to create a job listing') }}</p>
      <div class="row mb-3">
        <div class="col-sm-12 col-md-12">
          <form action="{{route('post.store')}}" id="postForm" method="POST">
            @csrf
            <div class="form-group">
              <label for="">{{ __('post-create.Job title') }}</label>
              <input type="text" placeholder="{{ __('post-create.Job title') }}" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ old('job_title') }}" required autofocus >
              @error('job_title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="">{{ __('post-create.Job level') }}</label>
                  <select name="job_level" class="form-control" value="{{old('job_level')}}" required>
                    <option value="Senior level">{{ __('post-create.Senior level') }}</option>
                    <option value="Mid level">{{ __('post-create.Mid level') }}</option>
                    <option value="Top level">{{ __('post-create.Top level') }}</option>
                    <option value="Entry level">{{ __('post-create.Entry level') }}</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="">{{ __('post-create.No of vacancy') }}</label>
                  <input type="number" class="form-control @error('vacancy_count') is-invalid @enderror" name="vacancy_count" value="{{ old('vacancy_count') }}" required >
                  @error('vacancy_count')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
            </div>
       

            <div class="form-group">
              <label for="">{{ __('post-create.Employment Type') }}</label>
              <select name="employment_type" class="form-control" name="employment_type" value="{{old('employment_type')}}">
                <option value="Full Time">{{ __('post-create.Full Time') }}</option>
                <option value="Part Time">{{ __('post-create.Part Time') }}</option>
                <option value="Freelance">{{ __('post-create.Freelance') }}</option>
                <option value="Internship">{{ __('post-create.Internship') }}</option>
                <option value="Trainneship">{{ __('post-create.Trainneship') }}</option>
                <option value="Volunter">{{ __('post-create.Volunter') }}</option>
              </select>
            </div>

            <div class="form-group">
              <label for="">{{ __('post-create.Job location') }}</label>
              <input type="text" placeholder="{{ __('post-create.Job location') }}" class="form-control @error('job_location') is-invalid @enderror" name="job_location" value="{{ old('job_location') }}" required >
              @error('job_location')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="">{{ __('post-create.Offered Salary (Monthly)') }}</label>
                  <input type="text" placeholder="20k - 50k" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}" required >
                  @error('salary')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="">{{ __('post-create.Deadline') }}</label>
                  <input type="date" class="form-control @error('deadline') is-invalid @enderror" name="deadline" value="{{ old('deadline') }}" required >
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="">{{ __('post-create.Education level') }}</label>
                  <select name="education_level" class="form-control" value="{{old('education_level')}}">
                    <option value="Bachelors">{{ __('post-create.Bachelors') }}</option>
                    <option value="High School">{{ __('post-create.High School') }}</option>
                    <option value="Master">{{ __('post-create.Master') }}</option>
                    <option value="SEE Mid School">{{ __('post-create.SEE Mid School') }}</option>
                    <option value="Other">{{ __('post-create.Other') }}</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="">{{ __('post-create.Experience') }}</label>
                  <select name="experience" class="form-control" value="{{old('experience')}}">
                    <option value="Internship">{{ __('post-create.Less than 1 year') }}</option>
                    <option value="1 year">1 {{ __('post-create.year') }}</option>
                    <option value="2 years">2 {{ __('post-create.year') }}</option>
                    <option value="2 years">3 {{ __('post-create.year') }}</option>
                    <option value="More than 5+ year">{{ __('post-create.More than 5+ year') }}</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="">{{ __('post-create.Professional skills') }} <span class="text-info">( {{ __('post-create.If multiple separate with') }} "," )</span></label>
              <input type="text" placeholder="{{ __('post-create.Skill') }}1,{{ __('post-create.Skill') }}2 ..." class="form-control @error('skills') is-invalid @enderror" name="skills" value="{{ old('skills') }}" required >
            </div>

            <div class="form-group">
              <label for="">{{ __('post-create.Job Description (Specifications)') }} <small>{{ __('post-create.Optional Field') }}</small></label>
              <input type="hidden" id="specifications" name="specifications" value="{{old('specifications')}}">
              <div id="quillEditor" style="height:200px"></div>
            </div>

            <button type="button" id="postBtn" class="btn primary-btn"> {{ __('post-create.Create Job listings') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endSection

@push('css')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('js')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
  $(document).ready(function(){
    var quill = new Quill('#quillEditor', {
    modules: {
      toolbar: [
          [{ 'font': [] }, { 'size': [] }],
          ['bold', 'italic'],
          [{ list: 'ordered' }, { list: 'bullet' }],
          ['link', 'blockquote', 'code-block', 'image'],
        ]
      },
    placeholder: 'Job Reqirement , Job Specifications etc ...',
    theme: 'snow'
    });
    

    const postBtn = document.querySelector('#postBtn');
    const postForm = document.querySelector('#postForm');
    const specifications = document.querySelector('#specifications');
    
    if(specifications.value){
      quill.root.innerHTML = specifications.value;
    }

    postBtn.addEventListener('click',function(e){
      e.preventDefault();
      specifications.value = quill.root.innerHTML
      
      postForm.submit();
    })
  })
</script>
@endpush