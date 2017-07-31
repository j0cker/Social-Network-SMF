@extends('layouts.index.master')

  {{-- lang html tag --}}

  @section('lang'){{$lang}}@stop

  {{-- Title Head --}}

  @section('title'){{$title}}@stop

  {{-- Metatag Head --}}

  @section('Content-Type','text/html; charset=UTF-8')
  @section('x-ua-compatible','ie=edge')
  @section('description','')
  @section('viewport','width=device-width, initial-scale=1')

  {{-- Body --}}
  
  @section('content')
      <!-- .page-intro-->
      <div class="demo-section module md-bg-dark">
        <div class="bg-img bg-img-parallax" style="background-position: 50% 0px);"></div>
        <div class="container">
          <div class="row-content row">
            <div class="col-md-12 text-center">
              <ul style="margin: 0;" class="list-unstyled social-login">
                <form id="resetForm" class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                  {{ csrf_field() }}

                  <input type="hidden" name="token" value="{{ $token }}">

                  <div style="text-center">
                    @lang('messages.ResetPassword')
                  </div>

                  <li style="margin-top: 10px;">
                    <div class="col-md-2"></div>
                    <div class="input-group input-group-lg col-md-8">
                          <input name="email" id="email" style="padding-left: 10px; border: 1px solid #ccc; height: 37px; font-size: 13px;" type="email" class="form-control" placeholder="Mail" aria-describedby="sizing-addon1">
                          <span style="padding: 0px 9px 0px 8px; font-size: 12px; height: 30px; margin-top: 0px;" class="input-group-addon glyphicon glyphicon-envelope" id="sizing-addon1"></span>
                    </div>
                    <div class="col-md-2"></div>
                  </li>
                  <li style="margin-top: 10px;">
                    <div class="col-md-2"></div>
                    <div class="input-group input-group-lg col-md-8">
                          <input name="password" id="password" style="padding-left: 10px; border: 1px solid #ccc; height: 37px; font-size: 13px;" type="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon1">
                          <span style="padding: 0px 9px 0px 8px; font-size: 12px; height: 30px; margin-top: 0px;" class="input-group-addon glyphicon glyphicon-lock" id="sizing-addon1"></span>
                    </div>
                    <div class="col-md-2"></div>
                  </li>
                  <li style="margin-top: 10px;">
                    <div class="col-md-2"></div>
                    <div class="input-group input-group-lg col-md-8">
                          <input name="password_confirmation" id="password-confirm" style="padding-left: 10px; border: 1px solid #ccc; height: 37px; font-size: 13px;" data-rule-equalTo="#resetForm #password" type="password" class="form-control" placeholder="Confirm Password" aria-describedby="sizing-addon1">
                          <span style="padding: 0px 9px 0px 8px; font-size: 12px; height: 30px; margin-top: 0px;" class="input-group-addon glyphicon glyphicon-lock" id="sizing-addon1"></span>
                    </div>
                    <div class="col-md-2"></div>
                  </li>
                  <li style="margin-top: 10px;">
                    <div class="text-center col-md-12">
                      <button id="resetButtonSubmit" class="btn btn-lg btn-pill btn-shadow btn-theme-1" type="button">@lang('messages.ResetPassword')</button>
                    </div>
                  </li>
                </form>
              </ul>
            </div>
          </div>
        </div>
      </div>
    @stop
