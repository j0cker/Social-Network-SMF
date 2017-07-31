@extends('layouts.system.master')

  {{-- lang html tag --}}

  @section('lang'){{$lang}}@stop

  {{-- Title Head --}}

  @section('title'){{$title}}@stop

  {{-- Metatag Head --}}

  @section('Content-Type','text/html; charset=UTF-8')
  @section('x-ua-compatible','ie=100s')
  @section('description','')
  @section('author','Manlio Emiliano Terán Ramos')
  @section('viewport','width=device-width, initial-scale=1')

  {{-- angular Controller Name --}}
  @section('angularController','home')

  {{-- Body --}}
  
  @section('content')
        <section id="body">
          <div class="row">
              <div class="col-md-2">
              </div>
              <div class="col-md-8">
                <div class="card">
                    <div class="card-content">
                      <a href="{{ url('/profile') }}">
                        <img onerror="this.src='{{ url('assets/img/system/perfil_default.png') }}'" src="{{Auth::user()->X_UFOTO}}" style="width: 100px; height: 100px; display: inline-block;">
                      </a>
                      <p style="padding-left: 50px; font-size: 20px; display: inline-block;">@Lang('messages.welcome') {{Auth::user()->name}}</p>
                      <p style="padding-right: 50px; font-size: 20px; display: inline-block;" class="pull-right hidden-xs">
                        <button style="background-color: #26A8FF; margin-left: 50px;" class="btn waves-effect waves-light" type="submit" name="action">Botón
                            <span class="fa fa-plus"></span>
                        </button>    
                      </p>
                    </div>
                </div>
              </div>
            <div class="col-md-2">
            </div>
          </div>
          
          <div id="bloques" class="row" style="margin:0;">

            <div class="row">

              <div class="col-md-2">
              </div>
              <div class="col-md-8">
                <div class="col-md-4">
                  <a href="escribir.php">
                    <div class="card" style="background-color: #76BC12;">
                    
                        <div class="card-content" style="height: 140px; padding-top: 12px;">
                          <span style="color: white; font-size: 50px;" class="fa fa-pencil"></span>
                          <p style="color: white; font-size: 20px; padding-top: 10px;">Escribe una publicación nueva</p>
                        </div>
                        
                    </div>
                  </a>
                </div>
                <div class="col-md-4">
                  <a href="calendario.php">
                    <div class="card" style="background-color: #274565;">
                        
                        <div class="card-content" style="height: 140px; padding-top: 12px;">
                          <span style="color: white; font-size: 50px;" class="fa fa-calendar"></span>
                          <p style="color: white; font-size: 20px; padding-top: 10px;">Ver calendario de publicaciones</p>
                        </div>
                        
                    </div>
                  </a>
                </div>
                <div class="col-md-4">
                  <a href="responder.php">
                    <div class="card" style="background-color: #2EBEB5;">
                    
                        <div class="card-content" style="height: 140px; padding-top: 12px;">
                          <span style="color: white; font-size: 50px;" class="fa fa-envelope"></span>
                          <p style="color: white; font-size: 20px; padding-top: 10px;">Mis mensajes</p>
                        </div>
                        
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-2">
              </div>

            </div>
          
            <div class="row">
            
              <div class="col-md-2">
              </div>
              <div class="col-md-8">
                <div class="col-md-4">
                  <a href="stats.php">
                    <div class="card" style="background-color: #F68921;">
                    
                        <div class="card-content" style="height: 140px; padding-top: 12px;">
                          <span style="color: white; font-size: 50px;" class="icon-stats-dots"></span>
                          <p style="color: white; font-size: 20px; padding-top: 10px;">Mis estadísticas</p>
                        </div>
                        
                    </div>
                  </a>
                </div>
                <div class="col-md-4">
                  <a href=""> 
                    <div class="card" style="background-color: #4C7AD8;">
                        
                        <div class="card-content" style="height: 140px; padding-top: 12px;">
                          <span style="color: white; font-size: 50px;" class="fa fa-newspaper-o"></span>
                          <p style="color: white; font-size: 20px; padding-top: 10px;">Descubre contenidos</p>
                        </div>
                        
                    </div>
                  </a>
                </div>
                <div class="col-md-4">
                  @if($priv[0]->N_PERNAME==Lang::get('messages.admin'))
                    <a href="/admin">
                      <div class="card" style="background-color: #1F8984;">
                      
                          <div class="card-content" style="height: 140px; padding-top: 12px;">
                            <span style="color: white; font-size: 50px;" class="fa fa-cogs"></span>
                            <p style="color: white; font-size: 20px; padding-top: 10px;">@Lang('messages.adminTitle')</p>
                          </div>
                          
                      </div>
                    </a>
                  @endif
                </div>
                <div class="col-md-2">
                </div>

              </div>

            </div>
          
        </section>

@stop