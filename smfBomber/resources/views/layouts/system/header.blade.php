<!DOCTYPE html>
<html lang="@yield('lang')" ng-app="myApp">
    <head>
        
        {{-- Meta tags --}}

        <meta http-equiv="Content-Type" content="@yield('Content-Type')">
        <meta http-equiv="x-ua-compatible" content="@yield('x-ua-compatible')">
        <meta name="description" content="@yield('description')">
        <meta name="author" content="@yield('author')">
        <meta name="viewport" content="@yield('viewport')">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Title --}}

        <title>@yield('title')</title>

        {{-- Links --}}

        {!! Html::favicon('http://demo.bonefishcode.com/veronica/assets/img/favicon.ico') !!}
        {!! Html::style('assets/css/system/fonts.css') !!}
        {!! Html::style('assets/css/system/bootstrap.min.css') !!}
        {!! Html::style('assets/css/system/vendor.css') !!}
        {!! Html::style('assets/css/system/loader.css') !!}
        {!! Html::style('assets/css/system/theme.css') !!}

        <!--Box Images-->
        {!! Html::style('assets/css/system/fresco.css') !!}

        {!! Html::style('assets/css/system/font-awesome.min.css') !!}
        {!! Html::style('assets/css/system/flexslider.css') !!}
        {!! Html::style('assets/css/system/_style.css') !!}
        {!! Html::style('assets/css/system/fullcalendar.css') !!}
        {!! Html::style('assets/css/system/bootstrap-tour.min.css') !!}
        {!! Html::style('assets/css/system/bootstrap-tour-standalone.min.css') !!}
        {!! Html::style('assets/css/system/jQuery-UI-v1.11.2.css') !!}
        {!! Html::style('assets/css/system/timepicker.css') !!}
        {!! Html::style('assets/css/system/materialize.min.css') !!}
        {!! Html::style('assets/css/system/font-awesome.min.css') !!}
        {!! Html::style('assets/css/system/animate.min.css') !!}
        {!! Html::style('assets/css/system/material-design-iconic-font.min.css') !!}
        {!! Html::style('assets/css/system/app.min.1.css') !!}
        {!! Html::style('assets/css/system/app.min.2.css') !!}
        {!! Html::style('assets/css/system/font-brenda/style.css') !!}
        {!! Html::style('assets/css/system/style-loading.css') !!}
        {!! Html::style('assets/css/system/sortable.css') !!}
        {!! Html::style('assets/css/system/toastr.css') !!}

        {{-- Scripts --}}
        
        {!! Html::script('assets/js/system/modernizr.js') !!}
        {!! Html::script('assets/js/system/jquery.min.js') !!}
        {!! Html::script('assets/js/system/jquery-migrate-1.2.1.js') !!}
        {!! Html::script('assets/js/system/jquery-mask.js') !!}
        {!! Html::script('assets/js/system/jquery.validate.min.js') !!}
        {!! Html::script('assets/js/system/google-analytics.js') !!}
        {!! Html::script('assets/js/system/toastr.min.js') !!}

        <!--CSRF Protection, Url Default, Timezone, name global Variables-->
        <script>
        $( document ).ready(function() {
            var privPer = new Array();
            var privName = "";
            @foreach ($priv as $item)
                    //{{ $item->I_PUDID }}
                    //{{ $item->N_PERNAME }}
                    //{{ $item->N_PERPER }}
                    privName = "{{ $item->N_PERNAME }}"
                    @if($item->N_PERPER)
                      privPer.push("{{ $item->N_PERPER }}")
                    @endif
            @endforeach

            window.Laravel = {"csrfToken":"{{ csrf_token() }}", "url":"{{ url('/') }}", "timezone":"{{Auth::user()->I_UHID}}", "name":"{{Auth::user()->name}}", "id":"{{Auth::user()->id}}", "language":"{{Auth::user()->I_IDIDI}}", priv:[{"privName":privName, "privPer":privPer}]}

            //console.log(window.Laravel.priv[0].privName);

        });
        </script>
        
        <!--Functions Library-->
        {!! Html::script('assets/js/functions.js') !!}

        <!--Angular-->
        {!! Html::script('assets/js/system/angular/lib/angular.min.js') !!}
        {!! Html::script('assets/js/system/angular/lib/sanitize.min.js') !!}
        {!! Html::script('assets/js/system/angular/module.js') !!}
        {!! Html::script('assets/js/system/angular/controllers.js') !!}
        {!! Html::script('assets/js/system/angular/factory.js') !!}

        {!! Html::script('assets/js/system/bootstrap.min.js') !!}

        <!--Box Images-->
        {!! Html::script('assets/js/system/fresco.js') !!}

        {!! Html::script('assets/js/system/bootstrap-tour.min.js') !!}
        {!! Html::script('assets/js/system/bootstrap-tour-standalone.min.js') !!}
        {!! Html::script('assets/js/system/jQuery-UI-v1.11.2.js') !!}
        {!! Html::script('assets/js/system/timepicker.js') !!}
        {!! Html::script('assets/js/system/modernizr.js') !!}
        {!! Html::script('assets/js/system/bootstrap-typeahead.js') !!}
        {!! Html::script('assets/js/system/moment.min.js') !!}
        {!! Html::script('assets/js/system/fullcalendar.min.js') !!}
        <!--{!! Html::script('assets/js/system/livechat.js') !!}-->
        {!! Html::script('assets/js/system/materialize.min.js') !!}
        {!! Html::script('assets/js/system/mercado-pago.js') !!}
        <!--{!! Html::script('assets/js/system/feedback.js') !!}-->
        {!! Html::script('assets/js/system/menu.js') !!}

        <!--Tag In
        <link href="tag-it/css/jquery.css" rel="stylesheet" type="text/css">
        <link href="tag-it/css/tagit.css" rel="stylesheet" type="text/css">
        <script src="tag-it/js/tag-it.js" type="text/javascript" charset="utf-8"></script>-->
        <!--Fin Tag In-->

        <!--Messages of laravel to JS-->
        {!! Html::script('assets/js/messages.js') !!} 

        <!--Own Library-->
        {!! Html::script('assets/js/system/index.js') !!}

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
    <body ng-controller="@yield('angularController')">
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
