<!-- Configuration Modal -->
<div class="modal modal-signup" id="modal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="col-md-2"></div>
    <div class="col-md-8" style="margin: 30px auto; padding-top: 30px; padding-bottom: 30px;">
        <div class="modal-content" style="overflow-y: auto; ">
            <div class="modal-header">
                <!--<button style="float: left; color: red; opacity: 1;" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
                <h3 class="modal-title" style="text-align: center; color: #a3a3a3;"></h3>
                <!--<p class="intro text-center">It only takes 3 minutes!</p>-->
                <p></p>
            </div>
            <div style="padding: 0; height: 400px;" class="modal-body col-md-12">

              <!--configuration part-->

              <div clas="row">
                <div class="text-center col-md-12">    
                    <ul style="margin: 0;" class="list-unstyled social-login">
                        <form method="POST" id="configurationForm" name="configurationsForm" action="{{ url('/configuration') }}">
                          {{ csrf_field() }}
                          <input id="timezoneUrl" type="hidden" value="{{ url('/timezone') }}">
                          <input id="languageUrl" type="hidden" value="{{ url('/language') }}">
                          <input id="url" type="hidden" value="{{ url('/configuration') }}">

                          <li style="margin: 0; margin-top: 20px;">
                            <div style="text-align: left;" class="input-group input-group-lg col-md-12">
                                  <span>@lang('messages.confTitle')</span>
                            </div>
                          </li>

                          @if (!isset(Auth::user()->I_UHID))
                            <li style="margin: 0; margin-top: 20px;">
                              <div sytle="text-align: center;" class="input-group input-group-lg col-xs-12 col-md-12">
                                    <span style="margin-top: 10px;">@lang('messages.selectTimezoneSpan')</span>
                                    <select style="border: 1px solid #26a8ff; height: 30px; font-size: 13px; color: #5e5e5e; padding-left: 10px; height: 36px; width: 100%; border-radius: 4px; margin-bottom:10px; margin-top: 10px; display: block; !important" id="timezone" name="timezone" required>
                                      <option>@lang('messages.selectTimezone')</option>
                                      <option ng-repeat="x in timezone" class="lv-item" style="cursor: pointer;" value="<% x.I_UHID %>"><% x.N_UHNAME %></option>
                                    </select>
                              </div>
                            </li>

                            <li style="margin: 0; margin-top: 20px;">
                              <div sytle="text-align: center;" class="input-group input-group-lg col-xs-12  col-md-12">
                                    <span style="margin-top: 10px;">@lang('messages.selectLanguageSpan')</span>
                                    <select style="border: 1px solid #26a8ff; height: 30px; font-size: 13px; color: #5e5e5e; padding-left: 10px; height: 36px; width: 100%; border-radius: 4px; margin-bottom:10px; margin-top: 10px; display: block; !important" id="language" name="language" required>
                                      <option>@lang('messages.selectLanguage')</option>
                                      <option ng-repeat="x in language" class="lv-item" style="cursor: pointer;" value="<% x.I_IDIDI %>"><% x.N_IDINAME %></option>
                                    </select>
                              </div>
                            </li>
                          @endif

                          <li style="margin: 0; margin-top: 20px;">
                            <div class="text-center col-md-12">
                              <button id="configurationButtonSubmit" class="btn btn-lg btn-pill btn-shadow btn-theme-1" type="button">
                                @lang('messages.continue')
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
    </div><!--//modal-dialog col-md-8-->
    <div class="col-md-2"></div>
</div><!--//modal-->
