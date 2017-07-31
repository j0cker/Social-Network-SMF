<!-- Login Modal -->
<div class="modal modal-signup" id="modal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="col-md-4"></div>
    <div class="col-md-4" style="margin: 30px auto; padding-top: 30px; padding-bottom: 30px;">
        <div class="modal-content" style="overflow-y: auto; ">
            <div class="modal-header">
                <button style="float: left; color: red; opacity: 1;" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" style="text-align: center; color: #a3a3a3;"></h3>
                <!--<p class="intro text-center">It only takes 3 minutes!</p>-->
            </div>
            <div style="height: 400px;" class="modal-body col-md-12">

              <!--Login Part-->

              <div ng-show="loginButton" clas="row">
                <div class="text-center col-md-12">                        
                    <ul style="margin: 0;" class="list-unstyled social-login">
                      <form method="POST" id="loginForm" name="loginForm" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <!--<li style="margin: 0;">
                            <button style="margin-top: 10px; margin-bottom: 10px;" onclick="window.location='facebook/redirect.php?liberar=1'" class="btn-facebook btn-lg btn-pill">
                            <img style="margin-left: 0px; margin-top: 4px; float: left; width: 10px; margin-right: 1em;" src="assets/img/index/f.png" />@lang('messages.logfacebook')</button>
                        </li>-->
                        <li style="margin: 0;">
                          <div class="col-md-2"></div>
                          <div class="text-center input-group input-group-lg col-md-8">
                                <input id="email" name="email" style="padding-left: 10px; border: 1px solid #ccc; height: 37px; font-size: 13px;" type="email" class="form-control" placeholder="@lang('messages.userormail')" aria-describedby="sizing-addon1">
                                <span style="padding: 0px 9px 0px 8px; font-size: 12px; height: 30px; margin-top: 0px;" class="input-group-addon glyphicon glyphicon-user" id="sizing-addon1"></span>
                          </div>
                          <div class="col-md-2"></div>
                        </li>
                        <li style="padding-top: 10px;">
                          <div class="col-md-2"></div>
                          <div class="input-group input-group-lg col-md-8">
                                <input id="password" name="password" style="padding-left: 10px; border: 1px solid #ccc; height: 37px; font-size: 13px;" type="password" class="form-control" placeholder="@lang('messages.password')" aria-describedby="sizing-addon1">
                                <span style="padding: 0px 9px 0px 8px; font-size: 12px; height: 30px; margin-top: 0px;" class="input-group-addon glyphicon glyphicon-lock" id="sizing-addon1"></span>
                          </div>
                          <div class="col-md-2"></div>
                        </li>
                        <li>
                          <div class="form-group">
                            <div class="checkbox">
                                <label for="remember">
                                <input id="remember" name="remember" type="checkbox"> @lang('messages.RememberMe')
                                </label>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div style="margin-top: 10px;" class="text-center col-md-12">
                            <button id="loginButtonSubmit" class="btn btn-lg btn-pill btn-shadow btn-theme-1" type="button">@lang('messages.login')</button>
                          </div>
                        </li>
                        <div style="padding-top: 20px;" class="hidden-sm hidden-md hidden-lg"></div> 
                        <a id="sendLinkPassButton" class="btn btn-link">
                            @lang('messages.Forgot')
                        </a>
                        <!--Redes Sociales-->
                        <!--<div class="or-separator">or</div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-block btn-pill btn-shadow btn-facebook"><i class="icon icon-left fa fa-fw fa-facebook"></i> Log In With Facebook</button>
                          <button type="submit" class="btn btn-block btn-pill btn-shadow btn-google-plus"><i class="icon icon-left fa fa-fw fa-google-plus"></i> Log In With Google+</button>
                        </div>-->                     
                      </form>
                    </ul>
                </div>
                <!--<div class="divider"><span>Or</span></div>-->
              </div> <!-- fin loginButton --> <!--fin row-->

              <!--Register part-->

              <div ng-show="registerButton" clas="row">
                <div class="text-center col-md-12">    
                    <ul style="margin: 0;" class="list-unstyled social-login">
                        <form method="POST" id="registerForm" name="registerForm" action="{{ url('/register') }}">
                          {{ csrf_field() }}
                          <li style="margin: 0;">
                            <div class="col-md-2"></div>
                            <div class="input-group input-group-lg col-md-8">
                                  <input name="name" id="name" style="padding-left: 10px; border: 1px solid #ccc; height: 37px; font-size: 13px;" type="text" class="form-control" placeholder="{{ Lang::get('messages.user') }}" aria-describedby="sizing-addon1">
                                  <span style="padding: 0px 9px 0px 8px; font-size: 12px; height: 30px; margin-top: 0px;" class="input-group-addon glyphicon glyphicon-user" id="sizing-addon1"></span>
                            </div>
                            <div class="col-md-2"></div>
                          </li>
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
                                  <input name="password" id="password" style="padding-left: 10px; border: 1px solid #ccc; height: 37px; font-size: 13px;" type="password" class="form-control" placeholder="{{ Lang::get('messages.password') }}" aria-describedby="sizing-addon1">
                                  <span style="padding: 0px 9px 0px 8px; font-size: 12px; height: 30px; margin-top: 0px;" class="input-group-addon glyphicon glyphicon-lock" id="sizing-addon1"></span>
                            </div>
                            <div class="col-md-2"></div>
                          </li>
                          <li style="margin-top: 10px;">
                            <div class="col-md-2"></div>
                            <div class="input-group input-group-lg col-md-8">
                                  <input name="password_confirmation" id="password-confirm" style="padding-left: 10px; border: 1px solid #ccc; height: 37px; font-size: 13px;" data-rule-equalTo="#registerForm #password" type="password" class="form-control" placeholder="{{ Lang::get('messages.confPassword') }}" aria-describedby="sizing-addon1">
                                  <span style="padding: 0px 9px 0px 8px; font-size: 12px; height: 30px; margin-top: 0px;" class="input-group-addon glyphicon glyphicon-lock" id="sizing-addon1"></span>
                            </div>
                            <div class="col-md-2"></div>
                          </li>
                          <li style="margin-top: 10px;">
                            <div class="text-center col-md-12">
                              <button id="registerButtonSubmit" class="btn btn-lg btn-pill btn-shadow btn-theme-1" type="button">@lang('messages.register')</button>
                            </div>
                          </li>
                          <div style="padding-top: 20px;" class="hidden-sm hidden-md hidden-lg"></div>  
                          <a id="sendLinkPassButton" class="btn btn-link">
                              @lang('messages.Forgot')
                          </a>
                        </form>           
                        <p style="text-align: center;" class="note">@lang('messages.permisosredes')</p>
                    </ul>
                </div>
                <!--<div class="divider"><span>Or</span></div>-->
              </div> <!-- fin registerButton --> <!--fin row-->

              <!--SendLinkPass part-->

              <div ng-show="sendLinkPassButton" clas="row">
                <div class="text-center col-md-12">    
                    <ul style="margin: 0;" class="list-unstyled social-login">
                        <form method="POST" id="sendLinkPassForm" name="sendLinkPassForm" action="{{ url('/password/email') }}">
                          {{ csrf_field() }}
                          <li style="margin: 0;">
                            <div class="col-md-2"></div>
                            <div class="input-group input-group-lg col-md-8">
                                  <input id="email" type="email" style="padding-left: 10px; border: 1px solid #ccc; height: 37px; font-size: 13px;" class="form-control" name="email" placeholder="email" required>
                                  <span style="padding: 0px 9px 0px 8px; font-size: 12px; height: 30px; margin-top: 0px;" class="input-group-addon glyphicon glyphicon-user" id="sizing-addon1"></span>
                            </div>
                            <div class="col-md-2"></div>
                          </li>
                          <li style="margin-top: 10px;">
                            <div class="text-center col-md-12">
                              <button id="sendLinkPassButtonSubmit" class="btn btn-lg btn-pill btn-shadow btn-theme-1" type="button">
                                @lang('messages.ResetPasswordButton')
                              </button>
                            </div>
                          </li>
                        </form>
                        <div style="padding-top: 20px;" class="hidden-sm hidden-md hidden-lg"></div>             
                    </ul>
                </div>
                <!--<div class="divider"><span>Or</span></div>-->
              </div> <!-- fin Button --> <!--fin row-->


            </div><!--//modal-body-->
            <!--
            <div class="modal-footer">
                <p>Already have an account? <a class="login-link" id="login-link" href="http://themes.3rdwavemedia.com/tempo/1.4/#">Log in</a></p>                    
            </div>--><!--//modal-footer-->
        </div><!--//modal-content-->
        <div class="popup-form-footer">
            <div class="btn-group btn-group-lg btn-group-justified"><a id="loginButtonFooter" data-toggle="tab" class="btn btn-default">@Lang('messages.login')</a><a id="registerButtonFooter" data-toggle="tab" class="btn btn-default">@Lang('messages.register')</a></div>
        </div>
    </div><!--//modal-dialog col-md-8-->
    <div class="col-md-4"></div>
</div><!--//modal-->
