        <div id="siteFooter" class="site-footer md-bg-dark site-footer-layout-1">
            <!--
            <aside id="siteFooterTop" class="site-footer-top module module-sm">
                <div class="container">
                    <div class="row-content row">
                        <div class="col-md-8 col-md-offset-2">
                            
                            <ul class="list-social list-inline">
                                <li><a href="https://facebook.com/{{Config::get('app.name')}}" target="_blank" class="btn btn-circle btn-shadow btn-facebook"><i class="icon fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/{{Config::get('app.name')}}" target="_blank" class="btn btn-circle btn-shadow btn-twitter"><i class="icon fa fa-twitter"></i></a></li>
                                <li><a href="https://www.google.com/+{{Config::get('app.name')}}" target="_blank" class="btn btn-circle btn-shadow btn-google-plus"><i class="icon fa fa-google-plus"></i></a></li>
                            </ul>

                            <p class="text-lead">@Lang('messages.SubscribeTxt')</p>
                            <form id="siteFooterSubscribeForm" class="form">
                                {{ csrf_field() }}
                                <input id="url" type="hidden" value="{{ url('/subscribe') }}">
                                <div class="input-group input-group-lg">
                                    <input id="siteFooterSubscribeFormEmail" type="email" placeholder="@Lang('messages.mailForm')" name="email" class="form-control" required>
                                    <span class="input-group-btn">
                                        <button id="subscribeSubmit" class="btn btn-theme-1">@Lang('messages.Subscribe')</button>
                                    </span>
                                </div>
                                <span class="form-notify help-block text-primary"><i class="form-notify-icon-info"></i> @Lang('messages.privacy')</span>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </aside>
            -->
            <div class="site-footer-bottom module module-mini">

                <ul class="list-social list-inline">
                    <li><a href="https://facebook.com/{{Config::get('app.name')}}" target="_blank" class="btn btn-circle btn-shadow btn-facebook"><i class="icon fa fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/{{Config::get('app.name')}}" target="_blank" class="btn btn-circle btn-shadow btn-twitter"><i class="icon fa fa-twitter"></i></a></li>
                    <li><a href="https://www.google.com/+{{Config::get('app.name')}}" target="_blank" class="btn btn-circle btn-shadow btn-google-plus"><i class="icon fa fa-google-plus"></i></a></li>
                </ul>

                <div data-css-opacity=".12" class="bg-black" style="opacity: 0.12;"></div>
                <div class="container">
                    <p class="mb-0">@Lang('messages.Copyright')</p>
                </div>
            </div>
        </div><!--Fin siteFooter-->
    
    </body>
</html>