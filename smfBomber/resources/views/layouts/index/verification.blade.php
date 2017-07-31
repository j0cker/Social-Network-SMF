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
                <p class="text-lead" style="text-align: center;">{{$verify}}</p>
            </div>
            <div class="col-md-12 text-center">
                <a id="loginButton" class="btn btn-lg btn-pill btn-shadow btn-theme-1">
                    <i class="icon icon-left fa fa-fw fa-arrow-right"></i>
                    @lang('messages.login')
                </a>
            </div>
          </div>
        </div>
      </div>
    @stop
