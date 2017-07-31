        <section id="main">
            <aside id="sidebar" class="">
                <div class="sidebar-inner c-overflow" tabindex="1" style="overflow: hidden; outline: none;">
                  <ul class="main-menu">
                        <li style="text-align: center;">
                          <button style="background-color: #26A8FF;" class="btn waves-effect waves-light" type="submit" name="action">Botón
                            <span class="fa fa-plus"></span>
                          </button>
                        </li>
                        <li id="tableSys1" style="padding-top: 10px;">
                            <a href="{{ url('/home') }}" style="cursor: pointer;"><i class="fa fa-home"></i> @Lang('messages.homeTitle')</a>
                        </li>
                        <li id="tableSys2">
                            <a href="{{ url('/profile') }}" style="cursor: pointer;"><i class="fa fa-user"></i> @Lang('messages.profileTitle')</a>
                        </li>
                        <li id="tableSys3">
                            <a href="" style="cursor: pointer;"><i class="fa fa-calendar"></i> Ver calendario de publicaciones</a>
                        </li>
                        <li id="tableSys4">
                            <a href="" style="cursor: pointer;"><i class="fa fa-envelope"></i> Mis mensajes</a>
                        </li>
                        <li id="tableSys12">
                            <a href="stats.php" style="cursor: pointer;" id="tableSys5"><i class="icon-stats-dots"></i> Mis estadísticas</a>
                        </li>
                        @if($priv[0]->N_PERNAME!=Lang::get('messages.admin'))
                          <li id="tableSys13">
                            <div style="cursor: pointer;" class="dropdown">
                                <a class="dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" href="" style="cursor: pointer; padding: 14px 20px 14px 52px; display: block; color: #4C4C4C; font-weight: 500; position: relative;"><i class="fa fa-shopping-cart" style="position: absolute; left: 16px; font-size: 20px; top: 0; width: 25px; text-align: center; padding: 13px 0;"></i> Pagar</a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li id="tableSys11"><a style="cursor: pointer;" href="">Pagar por MercadoPago</a></li>
                                    <li style="text-align: center; cursor: default;">ó</li>
                                    <li style="text-align: center;">Pagar por PayPal
                                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                            <input type="hidden" name="cmd" value="_s-xclick">
                                            <input type="hidden" name="hosted_button_id" value="89NRE5J3DZDCL">
                                            <input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
                                            <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
                                        </form>
                                    </li>  
                                </ul>
                            </div>
                          </li>
                        @endif
                        @if($priv[0]->N_PERNAME==Lang::get('messages.admin'))
                            <li>
                                <a href="{{ url('/admin') }}" style="cursor: pointer;" id="tableSys7"><i class="fa fa-cogs"></i> @Lang('messages.adminTitle')</a>
                            </li>
                        @endif
                        <li id="tableSys8">
                            <a href="{{ url('/help') }}" style="cursor: pointer;"><i class="fa fa-question-circle"></i>@Lang('messages.helpTitle')</a>
                        </li>
                        @if($priv[0]->N_PERNAME!=Lang::get('messages.admin'))
                            <li>
                                <a href="" style="cursor: pointer;" id="tableSys9"><i class="icon-subirpremium"></i> Conviértete a GOLD</a>
                            </li>
                        @endif
                        <li id="tableSys10">
                            <a href="{{ url('/logout') }}" style="cursor: pointer;"><i class="icon-salir"></i> Salir de {{Config::get('app.name')}}</a>
                        </li>
                  </ul>
                </div>
            </aside>
        </section>