<html>
  <head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>
      function fetchToken(code) {
        var consumer_key = "dj0yJmk9YXN6NU9UbWZyNzk1JmQ9WVdrOVQwOTROemhGTkhNbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD1hYw--";
        var consumer_secret = "43b3b74f01a0e990b3db4526591998e7dec35312";
        $.ajax({
          url: "curl_token.php",
	  type:  "POST",
          data: { client_id:consumer_key,
                  client_secret:consumer_secret,
                  redirect_uri:"http://loemprendemos.com/yahooSDK/index.php",
                  code:code,
                  grant_type:"authorization_code"
               
                },
          success:function(data) {
                  data = JSON.parse(data);
                  console.log(data);
                  console.log(data.access_token);
                  console.log(data.expires_in);
                  console.log(data.refresh_token);
                  console.log(data.token_type);
                  console.log(data.xoauth_yahoo_guid);
			$.ajax({
			          url: "curl_getContacts.php",
				  type:  "POST",
			          data: { client_id:consumer_key,
			                  client_secret:consumer_secret,
			                  guid:data.xoauth_yahoo_guid,
			                  access_token:data.access_token
			               
			                },
			          success:function(data) {
			                  data = JSON.parse(data);
			                  console.log(data);
			                  if(data.contacts.contact!=null && data.contacts.contact.length>0){
			                    console.log(data.contacts.contact);
			                    console.log(data.contacts.contact.length);
			                  }
			          }
			 });
          }
        });
        
      }
    </script>
      <?PHP
        if($_GET["code"]){
          echo '
            <script>
              fetchToken("';?><?PHP echo "".$_GET["code"].""; ?><?PHP echo '");
            </script>
          ';
        }
      ?>
  </head>

  <body>
    <a href="https://api.login.yahoo.com/oauth2/request_auth?client_id=dj0yJmk9YXN6NU9UbWZyNzk1JmQ9WVdrOVQwOTROemhGTkhNbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD1hYw--&redirect_uri=http://loemprendemos.com/yahooSDK/index.php&response_type=code&language=en-us">
      <button>Yahoo Verify</button>
    </a>
  </body>
</html>