      <footer style="background-color: #343434;" id="footer">
                <div class="col-md-12">
                  <div class="col-md-1">
                  </div>
                  <div class="col-md-5" style="text-align:left;">
                      <ul style="font-size:12px;" class="f-menu">
                          <li><img style="padding:0; padding-bottom:2px; width:100px;" src="{{ url('assets/img/system/logo.png') }}"></img></li>
                          <li>Copyright © 2017 {{Config::get('app.name')}}</li>
                      </ul>
                  </div>
                  <div class="col-md-5" style="text-align:right;">
                      <ul style="font-size:11px; font-family:lato-bold; color:#787878;" class="f-menu">
                          <li><a href="ayuda.php">NOSOTROS</a></li>
                          <li>|</li>
                          <li><a href="ayuda.php">AYUDA</a></li>
                          <li>|</li>
                          <li style="padding-right:25px;"><a href="ayuda.php">CONTACTO</a></li>

                          <li><a href="https://www.facebook.com/{{Config::get('app.name')}}" target="blank;"><img style="padding:0; padding-bottom:2px; width:15px;" src="{{ url('assets/img/system/facebook-logo.png') }}"></img></a></li>
                          <li><a href="https://twitter.com/{{Config::get('app.name')}}" target="blank;"><img style="padding:0; padding-bottom:1px; width:15px;" src="{{ url('assets/img/system/twitter-logo.png') }}"></img></a></li>
                          <li><a href="https://www.instagram.com/{{Config::get('app.name')}}" target="blank;"><img style="padding:0; padding-bottom:2px; width:15px;" src="{{ url('assets/img/system/instagram-logo.png') }}"></img></a></li>
                      </ul>
                  </div>
                  <div class="col-md-1">
                  </div>
                </div>
      </footer>
    
    </body>
</html>