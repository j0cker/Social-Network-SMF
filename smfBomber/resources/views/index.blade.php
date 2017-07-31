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

    <script>
      $( document ).ready(function() {
          <!--Get referral url for subscribers-->
          window.urlReferral = "Referral: {{ (!empty($_GET['action']))? $_GET['action'] : 'Sin Referral'}}, ABTesting: {{ (!empty($ABTesting))? $ABTesting : 'Sin A/B Testing' }}"
      });
    </script>

    <!-- Content -->
    <div id="content" class="site-content">
      <div id="pageIntro" class="page-intro page-intro-sm page-intro-layout-text">
        <!-- .bg-img-->
        <div class="page-intro-align">
          <div class="container">
            <div class="row-content row">
              <div class="col-content col-md-8 col-xs-8 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
                
                 <div style="font: arial; font-size: 30px;" class="text-center">
                   SMF Mail Bomber
                 </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- .page-intro-->
      <!--
      <div class="demo-section module md-bg-light">
        <div class="container">
          <div class="row-content row">
            
          </div>
        </div>
      </div>
      -->
    @stop

</body>
</html>
