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
  @section('angularController','admin')

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
                      <p style="color: #14446d; padding-left: 50px; font-size: 28px; display: inline-block;">@Lang('messages.adminTitle')</p><br />
                      <p style="color: #929292; padding-left: 50px; font-size: 18px; display: inline-block;">@Lang('messages.headTitleAdmin')</p>
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
               <li class="tab col-md-6"><a class="active" href="#tab1">@Lang('messages.homeTab')</a></li>
               <li class="tab col-md-6"><a href="#tab2">@Lang('messages.mailsTab')</a></li>
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
          
                  <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center; padding: 0;">
                    @Lang('messages.homeDescription')

                    <div style="margin-top: 10px;" class="row">
                      <div class="col-md-12">

                        <div class="col-md-4">
                          <a href="escribir.php">
                            <div class="card" style="background-color: #76BC12;">
                            
                                <div class="card-content" style="height: 140px; padding-top: 12px;">
                                  <span id="totalUsers" style="color: white; font-size: 50px;">-</span>
                                  <p style="color: white; font-size: 20px; padding-top: 10px;">Total Users</p>
                                </div>
                                
                            </div>
                          </a>
                        </div>

                        <div class="col-md-4">
                          <a href="calendario.php">
                            <div class="card" style="background-color: #274565;">
                                
                                <div class="card-content" style="height: 140px; padding-top: 12px;">
                                  <span id="totalMailsVerified" style="color: white; font-size: 50px;">-</span>
                                  <p style="color: white; font-size: 20px; padding-top: 10px;">Total mails verified</p>
                                </div>
                                
                            </div>
                          </a>
                        </div>

                        <div class="col-md-4">
                          <a href="responder.php">
                            <div class="card" style="background-color: #2EBEB5;">
                            
                                <div class="card-content" style="height: 140px; padding-top: 12px;">
                                  <span id="totalIdioms" style="color: white; font-size: 50px;">-</span>
                                  <p style="color: white; font-size: 20px; padding-top: 10px;">Total Idioms</p>
                                </div>
                                
                            </div>
                          </a>
                        </div>

                      </div><!--col-md-8-->
                    </div><!--row-->

                    <div style="margin-top: 10px;" class="row">
                      <div class="col-md-12">

                        <div class="col-md-4">
                          <a href="escribir.php">
                            <div class="card" style="background-color: #F68921;">
                            
                                <div class="card-content" style="height: 140px; padding-top: 12px;">
                                  <span id="totalUsersPaying" style="color: white; font-size: 50px;">-</span>
                                  <p style="color: white; font-size: 20px; padding-top: 10px;">Total users paying</p>
                                </div>
                                
                            </div>
                          </a>
                        </div>

                        <div class="col-md-4">
                          <a href="calendario.php">
                            <div class="card" style="background-color: #4C7AD8;">
                                
                                <div class="card-content" style="height: 140px; padding-top: 12px;">
                                  <span id="totalTimeZone" style="color: white; font-size: 50px;">-</span>
                                  <p style="color: white; font-size: 20px; padding-top: 10px;">Total Time Zone's</p>
                                </div>
                                
                            </div>
                          </a>
                        </div>

                        <div class="col-md-4">
                          <a href="responder.php">
                            <div class="card" style="background-color: #1F8984;">
                            
                                <div class="card-content" style="height: 140px; padding-top: 12px;">
                                  <span id="totalRoles" style="color: white; font-size: 50px;">-</span>
                                  <p style="color: white; font-size: 20px; padding-top: 10px;">Total Roles</p>
                                </div>
                                
                            </div>
                          </a>
                        </div>

                      </div><!--col-md-8-->
                    </div><!--row-->

                    <div style="margin-top: 10px;" class="row">
                      <div class="col-md-12">

                        <div class="col-md-4">
                          <a href="escribir.php">
                            <div class="card" style="background-color: #F44336;">
                            
                                <div class="card-content" style="height: 140px; padding-top: 12px;">
                                  <span id="totalPlans" style="color: white; font-size: 50px;">-</span>
                                  <p style="color: white; font-size: 20px; padding-top: 10px;">Total Plans</p>
                                </div>
                                
                            </div>
                          </a>
                        </div>
                        
                        <div class="col-md-4">
                          <a href="calendario.php">
                            <div class="card" style="background-color: #9C27B0;">
                                
                                <div class="card-content" style="height: 140px; padding-top: 12px;">
                                  <span id="totalQueueMails" style="color: white; font-size: 50px;">-</span>
                                  <p style="color: white; font-size: 20px; padding-top: 10px;">Total Queue Mails</p>
                                </div>
                                
                            </div>
                          </a>
                        </div>

                        <div class="col-md-4">
                          <a href="responder.php">
                            <div class="card" style="background-color: #673AB7;">
                            
                                <div class="card-content" style="height: 140px; padding-top: 12px;">
                                  <span id="totalSubscribers" style="color: white; font-size: 50px;">-</span>
                                  <p style="color: white; font-size: 20px; padding-top: 10px;">Total Subscribers</p>
                                </div>
                                
                            </div>
                          </a>
                        </div>

                      </div><!--col-md-8-->
                    </div><!--row-->

                  </div><!--col-xs-12 col-sm-12 col-md-12-->

                 </div> <!-- FIN TAB 1 -->

                 <div id="tab2" class="col s12"> 
                    <div class="text-center col-md-12">                        
                        <ul style="margin: 0;" class="list-unstyled social-login">
                          <form id="customMailForm" name="customMailForm">
                            {{ csrf_field() }}
                            <li style="text-align: center;">
                             
                              <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center;">
                                <p style="margin-bottom: 20px; text-align: center; font-size: 16px; color:#a3a3a3">@Lang('messages.emailAdminTitle')</p>
                              </div>
                             
                            </li>
                            <li style="margin-top: 0px;">
                             
                              <div class="input-group col-xs-12 col-sm-12 col-md-12">

                                <p style="font-size: 16px; color:#a3a3a3">@Lang('messages.emailAdminTarget'): </p>
                                <select style="border: 1px solid #26a8ff; height: 30px; font-size: 13px; color: #5e5e5e; padding-left: 10px; height: 36px; width: 100%; border-radius: 4px; margin-bottom: 0px; margin-top: 10px; display: block; !important" name="target" value="" id="target">
                                  <option name="@Lang('messages.emailAdminSelect')" value="@Lang('messages.emailAdminSelect')">@Lang('messages.emailAdminSelect')</option>
                                  <option name="all" value="all">@Lang('messages.emailAdminAllUsers')</option>
                                  <option name="subs" value="subs">@Lang('messages.emailAdminSubscribers')</option>
                                </select>

                              </div>
                             
                            </li>
                            <li style="margin-top: 10px;">
                             
                              <div class="input-group col-xs-12 col-sm-12 col-md-12">

                                <p style="font-size: 16px; color:#a3a3a3">@Lang('messages.emailAdminIdioma'): </p>
                                <select style="border: 1px solid #26a8ff; height: 30px; font-size: 13px; color: #5e5e5e; padding-left: 10px; height: 36px; width: 100%; border-radius: 4px; margin-bottom: 0px; margin-top: 10px; display: block; !important" name="priority" value="" id="priority"> 
                                  <option name="@Lang('messages.emailPrioritySelect')" value="@Lang('messages.emailPrioritySelect')">@Lang('messages.emailPrioritySelect')</option>
                                  <option name="1" value="1">@Lang('messages.emailPrioridad1')</option>
                                  <option name="3" value="3">@Lang('messages.emailPrioridad3')</option>
                                  <option name="5" value="5">@Lang('messages.emailPrioridad5')</option>
                                </select>

                              </div>
                             
                            </li>
                            <li style="margin-top: 10px;">
                             
                              <div class="input-group col-xs-12 col-sm-12 col-md-12">

                                <p style="font-size: 16px; color:#a3a3a3">@Lang('messages.emailAdminPrioridad'): </p>
                                <select style="border: 1px solid #26a8ff; height: 30px; font-size: 13px; color: #5e5e5e; padding-left: 10px; height: 36px; width: 100%; border-radius: 4px; margin-bottom: 0px; margin-top: 10px; display: block; !important" name="priority" value="" id="priority"> 
                                  <option name="@Lang('messages.emailPrioritySelect')" value="@Lang('messages.emailPrioritySelect')">@Lang('messages.emailPrioritySelect')</option>
                                  <option name="1" value="1">@Lang('messages.emailPrioridad1')</option>
                                  <option name="3" value="3">@Lang('messages.emailPrioridad3')</option>
                                  <option name="5" value="5">@Lang('messages.emailPrioridad5')</option>
                                </select>

                              </div>
                             
                            </li>
                            <li style="margin-top: 10px;">
                             
                              <div class="input-group col-xs-12 col-sm-12 col-md-12">

                                <p style="font-size: 16px; color:#a3a3a3">@Lang('messages.emailAdminSubject'): </p>
                                <input style="margin-top: 10px; cursor: text; border: 1px solid #26a8ff; height: 30px; font-size: 13px; color: #5e5e5e; padding-left: 10px; height: 34px; width: 100%; border-radius: 4px; margin-bottom:0;" type="text" class="form-control" value="" placeholder="@Lang('messages.emailAdminSubject')" aria-describedby="sizing-addon1" id="subject" name="subject">

                              </div>
                             
                            </li>
                            <li style="margin-top: 10px;">
                             
                              <div class="input-group col-xs-12 col-sm-12 col-md-12">

                                <p style="font-size: 16px; color:#a3a3a3">@Lang('messages.emailAdminBody'): </p>
                                <textarea style="margin-top: 10px; cursor: text; border: 1px solid #26a8ff; height: 30px; font-size: 13px; color: #5e5e5e; padding-left: 10px; height: 340px; width: 100%; border-radius: 4px; margin-bottom:0;" type="text" class="form-control" value="" placeholder="@Lang('messages.emailAdminBody')" aria-describedby="sizing-addon1" id="body" name="body"></textarea>

                              </div>
                             
                            </li>
                            <li style="margin-bottom: 70px; margin-top: 20px; text-align: right;">
                             
                              <div class="col-md-12">
                                <button type="" id="customMailFormButtonSubmit" style="background-color: #26A8FF;" class="btn waves-effect waves-light" name="customMailFormButtonSubmit">Enviar
                                  <span class="fa fa-paper-plane"></span>
                                </button>
                              </div>
                             
                            </li>
                          </form>
                        </ul>
                    </div>
                 </div> <!-- FIN tab2 -->

                 <!--tab3
                 <div id="tab3" class="col s12">
                 </div>--><!--fin tab 3-->

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