<!DOCTYPE html>
<html lang="@yield('lang')" ng-app="myApp">
    <head>
        
        {{-- Meta tags --}}

        {{ Cache::forever('js_version_number', time()) }}

        <meta http-equiv="Content-Type" content="@yield('Content-Type')">
        <meta http-equiv="x-ua-compatible" content="@yield('x-ua-compatible')">
        <meta name="description" content="@yield('description')">
        <meta name="viewport" content="@yield('viewport')">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Title --}}

        <title>@yield('title')</title>

        {{-- Links --}}

        <!--{!! Html::favicon('http://demo.bonefishcode.com/veronica/assets/img/favicon.ico') !!}-->
        {!! Html::style('assets/css/index/fonts.css') !!}
        {!! Html::style('assets/css/index/bootstrap.min.css') !!}
        {!! Html::style('assets/css/index/vendor.css') !!}
        {!! Html::style('assets/css/index/loader.css') !!}
        {!! Html::style('assets/css/index/theme.css') !!}
        {!! Html::style('assets/css/index/toastr.css') !!}

        {{-- Scripts --}}
        
        {!! Html::script('assets/js/index/modernizr.js') !!}
        {!! Html::script('assets/js/index/jquery.min.js') !!}
        {!! Html::script('assets/js/index/jquery-mask.js') !!}
        {!! Html::script('assets/js/index/jquery.validate.min.js') !!}
        {!! Html::script('assets/js/system/google-analytics.js') !!}
        {!! Html::script('assets/js/index/toastr.min.js') !!}

        <!--CSRF Protection Global Variables-->
        <script>window.Laravel = {"csrfToken":"{{ csrf_token() }}"}</script>

        <!--Angular-->
        {!! Html::script('assets/js/index/angular/lib/angular.min.js') !!}
        {!! Html::script('assets/js/index/angular/lib/sanitize.min.js') !!}
        {!! Html::script('assets/js/index/angular/module.js') !!}
        {!! Html::script('assets/js/index/angular/controllers.js') !!}
        {!! Html::script('assets/js/index/angular/factory.js') !!}

        {!! Html::script('assets/js/index/bootstrap.min.js') !!}
        {!! Html::script('assets/js/index/vendor.js') !!}
        {!! Html::script('assets/js/index/main.js') !!}

        <!--Messages of laravel to JS-->
        {!! Html::script('assets/js/messages.js') !!} 


        <!--Own Library-->
        {!! Html::script('assets/js/index/index.js?v='.cache("js_version_number").'') !!}



        <!--Functions Library-->
        {!! Html::script('assets/js/functions.js') !!}

        <!-- AES Crypter -->
        {!! Html::script('assets/js/index/aes-min.js') !!}

        <!--Alerts-->
        <script>
            $( document ).ready(function() {

                @foreach ($errors->all() as $error)
                    {{ Log::error("[Index][Forms][Errors]") }}
                    {{ Log::error($error) }}
                @endforeach
                

                @if ($errors->has('email'))
                    toastr.error('{{ $errors->first("email") }}', 'Error:');
                @endif

                @if ($errors->has('password'))
                    toastr.error('{{ $errors->first("password") }}', 'Error:');
                @endif

                @if ($errors->has('password_confirmation'))
                    toastr.error('{{ $errors->first("password_confirmation") }}', 'Error:');
                @endif

                @if (session('status'))
                    toastr.success('{{ session("status") }}', '');
                @endif
            });
        </script>

    </head>
    <body ng-controller="ctrl">
        <!--[if lt IE 8]>
            <p class="browserupgrade">
                You are using an <strong>outdated</strong> browser.
                Please <a href="http://browsehappy.com/">upgrade your browser</a>
                to improve your experience.
            </p><![endif]-->
    
        <!-- .page-loader-->
        <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section"></div>
        </div> 
