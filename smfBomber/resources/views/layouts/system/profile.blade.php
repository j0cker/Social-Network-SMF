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
  @section('angularController','profile')

  {{-- Body --}}
  
  @section('content')
        <section id="body">

          <div class="row">

              <div class="col-md-2">
              </div>     

              <div class="col-md-8">
                <div style="background-color: #f9f9f9;" class="card">
                    <div class="card-content">
                      <!-- <p style="color: #175780; padding-left: 50px; font-size: 15px; display: inline-block;">
                         <a class="underline" href="system.php">Inicio</a> > <a class="underline" href="">Mi perfil</a>
                      </p><br /> -->
                      <!-- <p style="padding-right: 50px; font-size: 20px; display: inline-block;" class="pull-right hidden-xs">
                        <button onclick="abrirSignUpModal();" style="background-color: #26A8FF; margin-left: 50px;" class="btn waves-effect waves-light" type="submit" name="action">Agrega otra red social<span class="fa fa-plus"></span>
                        </button>    
                      </p> -->
                      <p style="color: #14446d; padding-left: 50px; font-size: 28px; display: inline-block;">@Lang('messages.headTitleProfile')</p><br />
                      <p style="color: #929292; padding-left: 50px; font-size: 18px; display: inline-block;">@Lang('messages.headTitleProfile2')</p>
                    </div>
                </div>
              </div>

             <div class="col-md-2">
             </div>

          </div>  
        </section>

        <section id="body">
            <!-- <div class="row">
   
              <div class="col-md-2">
              </div>

              <div class="col-md-8">

                <div class="card">
                    <div class="card-content">
                      <img src="" style="display: inline-block;">
                      <p style="padding-left: 50px; font-size: 20px; display: inline-block;"></p>
                    </div>
                </div>
              </div>

              <div class="col-md-2">
              </div>

          </div> -->


         <div class="row">

          <div class="row">
           <div class="col-md-2">
           </div>
            
           <div class="col-md-8">
             <ul class="tabs">
               <li class="tab col-md-4"><a class="active" href="#tab1">@Lang('messages.profileTitle')</a></li>
               <!--<li class="tab col-md-4"><a href="#tab2">Cuentas</a></li>-->
               <!--<li class="tab col-md-4"><a href="#tab3">Redes</a></li>-->
             </ul>
           </div>
         
           <div class="col-md-2">
           </div>
          </div>

          <div class="col-md-2">
          </div> 

           <div class="col-xs-12 col-md-8">
             <div class="card">
               <div class="card-content">

              <div id="tab1" class="col s12">
                
                <div class="col-xs-12 col-sm-6 col-md-6" style="text-align: center; padding: 0;">
                    
                  <div id="foto_perfil" style="margin: auto auto 40px auto; cursor: pointer; opacity: 1; color: #ffffff; font-size: 35px; text-align: center; background: url('{{Auth::user()->X_UFOTO}}'), url('{{ url('assets/img/system/perfil_default.png') }}') no-repeat scroll center center / 100% 100%; width: 250px; height: 250px;" data-position="top" id="">
                    <!--<input id="fileImage" type="file" name="file" style="text-align: center; width: 100px; height: 100px; opacity: 0; display: inline-block;">
                    -->

                    <div style="background: rgba(0,0,0,0.5);width: 100%;height: 100%;">
                      <p style="font-size: 70px; margin-top: 100px;" class="glyphicon glyphicon-camera"></p>
                      <p style="font-size: 27px; margin-top: -10px; font-family: lato-bold;">@Lang('messages.changePicture')</p>
                      <p style="font-size: 27px; margin-top: -10px; font-family: lato-bold;">@Lang('messages.changePicture2')</p>
                    </div>

                    <span class="file-input btn btn-block btn-primary btn-file col-lg-6 col-sm-6 col-12">
                        @Lang('messages.examinar') <input style="cursor: hand;" id="fileImage" type="file" name="file" size="50" ng-model="photo" onchange="angular.element(this).scope().cambiarImagen('{{ url('/subirImagen') }}', '{{ url('/actualizarImageProfile') }}')" accept="image/jpeg, image/png, image/gif, image/bmp" />
                    </span>

                  </div>

                </div>

                <div class="hidden-xs hidden-sm col-md-1" style="border-right:3px solid #eeeeee; height:425px; padding: 0; margin: 0; margin-right: 10px; width:3px; text-align: center;">
                </div>

                <div class="col-xs-12 col-sm-6 col-md-5" style="text-align: left; padding: 0;">

                  <form id="profileForm" name="profileForm">

                    {{ csrf_field() }}

                    <input id="profileUrl" type="hidden" value="{{ url('/profile') }}">

                    <div class="input-group col-xs-12 col-sm-12 col-md-12">

                      <p style="font-size: 16px; color:#a3a3a3">@Lang('messages.nameProfile')</p>
                      <input name="name" style="cursor: text; border: 1px solid #26a8ff; height: 30px; font-size: 13px; color: #5e5e5e; padding-left: 10px; height: 36px; width: 100%; border-radius: 4px; margin-bottom:10px;" type="text" class="form-control closeTag" value="{{Auth::user()->name}}" aria-describedby="sizing-addon1" id="name" required>

                    </div>

                    <div class="input-group col-xs-12 col-sm-12 col-md-12">

                      <p style="cursor: text; font-size: 16px; color:#a3a3a3">@Lang('messages.emailProfile')</p>
                      <input name="email" style="border: 1px solid #26a8ff; !important height: 30px; font-size: 13px; color: #5e5e5e; padding-left: 10px; height: 36px; width: 100%; border-radius: 4px; margin-bottom:10px;" type="email" class="form-control" value="{{Auth::user()->email}}" aria-describedby="sizing-addon1" id="email" required>
                    
                    </div>
            
                    <div class="input-group col-xs-12 col-sm-12 col-md-12">

                      <p style="font-size: 16px; color:#a3a3a3">@Lang('messages.zonaHorarioProfile')</p>
                      <select style="border: 1px solid #26a8ff; height: 30px; font-size: 13px; color: #5e5e5e; padding-left: 10px; height: 36px; width: 100%; !important border-radius: 4px; margin-bottom:10px; display: block; !important" id="timezoneProfile" name="timezoneProfile" required>
                        <option>@lang('messages.selectTimezone')</option>
                        <option ng-repeat="x in timezone" class="lv-item" style="cursor: pointer;" ng-if="x.I_UHID=={{Auth::user()->I_UHID}}" value="<% x.I_UHID %>" selected="selected"><% x.N_UHNAME %></option>
                        <option ng-repeat="x in timezone" class="lv-item" style="cursor: pointer;" ng-if="x.I_UHID!={{Auth::user()->I_UHID}}" value="<% x.I_UHID %>"><% x.N_UHNAME %></option>
                      </select>

                    </div>

                    <input id="timezoneUrl" type="hidden" value="{{ url('/timezone') }}">

                    <div class="input-group col-xs-12 col-sm-12 col-md-12">

                      <p style="font-size: 16px; color:#a3a3a3">@Lang('messages.idiomaProfile')</p>
                      <select style="border: 1px solid #26a8ff; height: 30px; font-size: 13px; color: #5e5e5e; padding-left: 10px; height: 36px; width: 100%; !important border-radius: 4px; margin-bottom:10px; display: block; !important" id="languageProfile" name="languageProfile" required>
                        <option>@lang('messages.selectLanguage')</option>
                        <option ng-repeat="x in language" class="lv-item" style="cursor: pointer;" ng-if="x.I_IDIDI=={{Auth::user()->I_IDIDI}}" value="<% x.I_IDIDI %>" selected="selected"><% x.N_IDINAME %></option>
                        <option ng-repeat="x in language" class="lv-item" style="cursor: pointer;" ng-if="x.I_IDIDI!={{Auth::user()->I_IDIDI}}" value="<% x.I_IDIDI %>"><% x.N_IDINAME %></option>
                      </select>
                    
                    </div>

                    <input id="languageUrl" type="hidden" value="{{ url('/language') }}">
                    <!--
                    <div class="input-group col-xs-12 col-sm-12 col-md-12">

                      <p style="font-size: 16px; color:#a3a3a3">@Lang('messages.contraseñaActualProfile')</p>
                      <input style="cursor: text; border: 1px solid #26a8ff; height: 30px; font-size: 13px; color: #5e5e5e; padding-left: 10px; height: 34px; width: 100%; border-radius: 4px; margin-bottom:0;" type="password" class="form-control" value="password" aria-describedby="sizing-addon1" id="passwordActual">

                    </div>
                    -->
                    <p ng-click="olvidastePass()" style="font-size: 16px; color:#26a8ff; cursor: text; width:250px;">@Lang('messages.olvidasteProfile')</p>
                    
                    <div class="input-group col-xs-12 col-sm-12 col-md-12">

                      <p style="font-size: 16px; color:#a3a3a3">@Lang('messages.nuevaContraseñaProfile')</p>
                      <input style="cursor: text; border: 1px solid #26a8ff; height: 30px; font-size: 13px; color: #5e5e5e; padding-left: 10px; height: 34px; width: 100%; border-radius: 4px; margin-bottom:0;" type="password" class="form-control" value="" aria-describedby="sizing-addon1" id="password" name="password">

                    </div>
                    
                    <div class="input-group col-xs-12 col-sm-12 col-md-12">

                      <p style="font-size: 16px; color:#a3a3a3">@Lang('messages.confirmarProfile')</p>
                      <input name="password_confirmation" id="password-confirm" data-rule-equalTo="#profileForm #password" style="cursor: text; border: 1px solid #26a8ff; height: 30px; font-size: 13px; color: #5e5e5e; padding-left: 10px; height: 34px; width: 100%; border-radius: 4px; margin-bottom:0;" type="password" class="form-control" value="" aria-describedby="sizing-addon1" id="passwordConf52">

                    </div>

                    <div class="text-center input-group col-xs-12 col-sm-12 col-md-12">

                      <a class="waves-effect waves-light btn" style="margin-top: 10px; background-color:#26A8FF; width:250px;" id="profileButtonSubmit">@Lang('messages.saveChangesProfile')</a>
                    
                    </div>

                  </form>

                </div>
 
                </br>

                <div class="col-xs-12 col-sm-12 col-md-12">
                   <br/>
                </div>

                </div>

                </div> <!-- FIN TAB PERFIL -->

                <div id="tab2" class="col s12"> 
                </div> <!-- FIN tab2 -->

                <div id="tab3" class="col s12">
                </div><!--fin tab 3-->

                </div> <!-- final card-content -->
               </div> <!-- final card -->
              </div> <!-- final col-md-8 -->

              <div class="col-md-2">
              </div> 
               
              </div>
            </div>
          </div>
    
            
        </section>

@stop