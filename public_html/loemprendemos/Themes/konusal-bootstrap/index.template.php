<?php
/**
 * Simple Machines Forum (SMF)
 *
 * @package SMF
 * @author Simple Machines
 * @copyright 2011 Simple Machines
 * @license http://www.simplemachines.org/about/smf/license.php BSD
 *
 * @version 2.0
 */

/*	This template is, perhaps, the most important template in the theme. It
	contains the main template layer that displays the header and footer of
	the forum, namely with main_above and main_below. It also contains the
	menu sub template, which appropriately displays the menu; the init sub
	template, which is there to set the theme up; (init can be missing.) and
	the linktree sub template, which sorts out the link tree.

	The init sub template should load any data and set any hardcoded options.

	The main_above sub template is what is shown above the main content, and
	should contain anything that should be shown up there.

	The main_below sub template, conversely, is shown after the main content.
	It should probably contain the copyright statement and some other things.

	The linktree sub template should display the link tree, using the data
	in the $context['linktree'] variable.

	The menu sub template should display all the relevant buttons the user
	wants and or needs.

	For more information on the templating system, please see the site at:
	http://www.simplemachines.org/
*/

// Initialize the template... mainly little settings.
function template_init()
{
	global $context, $settings, $options, $txt;

	/* Use images from default theme when using templates from the default theme?
		if this is 'always', images from the default theme will be used.
		if this is 'defaults', images from the default theme will only be used with default templates.
		if this is 'never' or isn't set at all, images from the default theme will not be used. */
	$settings['use_default_images'] = 'never';

	/* What document type definition is being used? (for font size and other issues.)
		'xhtml' for an XHTML 1.0 document type definition.
		'html' for an HTML 4.01 document type definition. */
	$settings['doctype'] = 'html';

	/* The version this template/theme is for.
		This should probably be the version of SMF it was created for. */
	$settings['theme_version'] = '2.0';

	/* Set a setting that tells the theme that it can render the tabs. */
	$settings['use_tabs'] = true;

	/* Use plain buttons - as opposed to text buttons? */
	$settings['use_buttons'] = true;

	/* Show sticky and lock status separate from topic icons? */
	$settings['separate_sticky_lock'] = true;

	/* Does this theme use the strict doctype? */
	$settings['strict_doctype'] = false;

	/* Does this theme use post previews on the message index? */
	$settings['message_index_preview'] = false;

	/* Set the following variable to true if this theme requires the optional theme strings file to be loaded. */
	$settings['require_theme_strings'] = true;
}

// The main sub template above the content.
function template_html_above()
{
	global $context, $settings, $options, $scripturl, $txt, $modSettings;

        $comilla = "'";

	// Show right to left and the character set for ease of translating.
	echo '<!DOCTYPE html>
<html lang="', $txt['lang_dictionary'],'" ', $context['right_to_left'] ? ' dir="rtl"' : '', ' ng-app="myApp">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=', $context['character_set'], '" />';

	// The ?fin20 part of this link is just here to make sure browsers don't cache it wrongly.
	echo '
        <link rel="shortcut icon" type="image/x-icon" href="'.$settings['theme_url'].'/images/loemprendemosMini.ico" />
	<link rel="stylesheet" type="text/css" href="', $settings['theme_url'], '/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="', $settings['theme_url'], '/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="', $settings['theme_url'], '/css/loader.css" />
	<link rel="stylesheet" type="text/css" href="', $settings['theme_url'], '/css/index', $context['theme_variant'], '.css?fin20" />';

	// Some browsers need an extra stylesheet due to bugs/compatibility issues.
	foreach (array('ie7', 'ie6', 'webkit') as $cssfix)
		if ($context['browser']['is_' . $cssfix])
			echo '
	<link rel="stylesheet" type="text/css" href="', $settings['default_theme_url'], '/css/', $cssfix, '.css" />';

	// RTL languages require an additional stylesheet.
	if ($context['right_to_left'])
		echo '
	<link rel="stylesheet" type="text/css" href="', $settings['theme_url'], '/css/rtl.css" />';

	// Here comes the JavaScript bits!
	echo '
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>	
        <script type="text/javascript" src="', $settings['theme_url'], '/scripts/functions.js?v='; echo time(); echo '"></script>
        <script src="', $settings['theme_url'], '/scripts/materialize.js"></script>
        <link rel="stylesheet" type="text/css" href="', $settings['theme_url'], '/css/materialize.css" />
        <script src="', $settings['theme_url'], '/scripts/angular.min.js"></script>
        <script src="', $settings['theme_url'], '/scripts/sanitize.min.js"></script>
        <script src="', $settings['theme_url'], '/scripts/module.js"></script>
        <script src="', $settings['theme_url'], '/scripts/controllers.js"></script>
        <script src="', $settings['theme_url'], '/scripts/factory.js"></script>
	<script type="text/javascript" src="', $settings['theme_url'], '/scripts/bootstrap.min.js?fin20"></script>
        <script src="', $settings['default_theme_url'], '/scripts/typeahead.bundle.js"></script>
        <script src="', $settings['default_theme_url'], '/scripts/typehead.js"></script>
        <script src="', $settings['default_theme_url'], '/scripts/bootstrap-tagsinput.min.js"></script>
        <link rel="stylesheet" type="text/css" href="', $settings['default_theme_url'], '/css/bootstrap-tagsinput.css" />
        <script src="', $settings['theme_url'], '/scripts/hearts.js"></script>
        <link rel="stylesheet" href="', $settings['theme_url'], '/css/hearts.css">

	<script type="text/javascript" src="', $settings['default_theme_url'], '/scripts/script.js?fin20"></script>
	<script type="text/javascript" src="', $settings['theme_url'], '/scripts/theme.js?fin20"></script>
	<script type="text/javascript"><!-- // --><![CDATA[
		var smf_theme_url = "', $settings['theme_url'], '";
		var smf_default_theme_url = "', $settings['default_theme_url'], '";
		var smf_images_url = "', $settings['images_url'], '";
		var smf_scripturl = "', $scripturl, '";
		var smf_iso_case_folding = ', $context['server']['iso_case_folding'] ? 'true' : 'false', ';
		var smf_charset = "', $context['character_set'], '";', $context['show_pm_popup'] ? '
		var fPmPopup = function ()
		{
			if (confirm("' . $txt['show_personal_messages'] . '"))
				window.open(smf_prepareScriptUrl(smf_scripturl) + "action=pm");
		}
		addLoadEvent(fPmPopup);' : '', '
		var ajax_notification_text = "', $txt['ajax_in_progress'], '";
		var ajax_notification_cancel_text = "', $txt['modify_cancel'], '";
	// ]]></script>

        <script>
        function likeDisplay(id_post, id_member_profile, element, location){
            console.log( "like" );
            $(element).css("display","none");
            triggerHearts();
            googleAna("likePostProfileDelMuro");
            
            $.ajax({  	url:   "'.$modSettings["pretty_root_url"].'/sendLike.php",
				type:  "POST",
				data:   {id_member:'; echo $context["user"]["id"]; echo ', id_member_name:"'; echo $context["user"]["name"]; echo '", id_post:id_post, id_member_profile:id_member_profile, id_member_profile_name:""},
				success:  function (response) {
                                  response = JSON.parse(response);
                                  if(response.response=="true"){
                                    toastr["success"](response.comment);
					
    setTimeout(function(){
      if(location=="display"){
        window.location = "'.$modSettings["pretty_root_url"].'/index.php?msg="+id_post+"";
      } else if(location="index"){
        window.location = "'.$modSettings["pretty_root_url"].'";
      }
    },6000);
                                  } else {
                                    toastr["error"](response.comment);
                                    $(element).css("display","");
                                  }
				},
				error: function (){
                                  toastr["error"]("Error al Enviar, Inténtalo nuevamente");
                                  $(element).css("display","");
				}
		  });//fin ajax
        }
        function verCategorias(){
          googleAna("verCategoríasButtonIndex");
          if($("#categorias").css("display")=="none"){
            $("#categorias").css("display","");
            $("#buttonCategorias").addClass("active");
          } else {
            $("#categorias").css("display","none");
            $("#buttonCategorias").removeClass("active");
          }
        }
        function publicar(){
                 googleAna("escribirButtonIndex");
                 $("#publicarModal2").modal("show");
                 $("#publish").css("display","");
        }
        function escribirYa(){
                 googleAna("escribirYaModalPublicar");
                 var x = document.getElementById("foros2").selectedIndex;
		 var y = document.getElementById("foros2").options;
		 console.log("Index: " + y[x].index + " is " + y[x].text + " value " + y[x].value);
                 
                 if(y[x].value=="'; echo $txt['select_default_value']; echo '"){
                 	toastr["warning"]("Selecciona una categoría");
                 } else {
	                 window.location = ""+y[x].value+";action=post";
                 }
        }
        function showLogin2(){
                 googleAna("showLogin2SMImgButton");
                 $("#showLoginButton2").css("display","none");
                 $("#showLoginOption2").css("display","");
        }
        </script>

	<!--Google analytics-->
	<script type="text/javascript" src="', $settings['theme_url'], '/scripts/googleAnalytics.js"></script>
	<script type="text/javascript">
		function googleAna(button){
			console.log("[googleAnalytics.js][googleAna] " + button);
			//alert(button);
			ga("send", "event", button, "click", button);
		}
		$( document ).ready(function() {
                        var cambioPublicar = 2;
                        setInterval(function(){
                          if(cambioPublicar==1){ 
                            $("#buttonPublicar").html("<span class='.$comilla.'fa fa-pencil'.$comilla.'></span> Publica una Pregunta");
                          }
                          if(cambioPublicar==2){ 
                            $("#buttonPublicar").html("<span class='.$comilla.'fa fa-pencil'.$comilla.'></span> Publica un Artículo");
                          }
                          if(cambioPublicar==3){ 
                            $("#buttonPublicar").html("<span class='.$comilla.'fa fa-pencil'.$comilla.'></span> Publica un Evento");
                          }
                          if(cambioPublicar>=3){
                            cambioPublicar=1;
                          } else {
                            cambioPublicar++;
                          }
                        }, 2000);
                        
			//smileys
	   		$(".displayTopicIcons").unbind().click(function() {
	   			console.log("[googleAnalytics.js][.displayTopicIcons] " + $(this).attr("title"));
	   			//alert($(this).attr("title"));
	   			//sendCommentAndTopicIconsSmileys
	   			
	   			ga("send", "event", "sendCommentAndTopicIconsSmileys", "click", "sendCommentAndTopicIconsSmileys" + $(this).attr("title"));
	   		});
	   		$(".displayTopicBBC").unbind().click(function() {
	   			console.log("[googleAnalytics.js][.displayTopicBBC] " + $(this).attr("title"));
	   			//alert($(this).attr("title"));
	   			//sendCommentAndTopicIconsBBC
	   			
	   			ga("send", "event", "sendCommentAndTopicIconsBBC", "click", "sendCommentAndTopicIconsBBC" + $(this).attr("title"));
	   		});
	   		$("#BBCBox_message_select_0_9").unbind().click(function() {
	   			console.log("[googleAnalytics.js][#BBCBox_message_select_0_10] " + $(this).attr("name"));
	   			//alert($(this).attr("name"));
	   			//sendCommentAndTopicSelect
	   			
	   			ga("send", "event", "sendCommentAndTopicSelect", "click", "sendCommentAndTopicSelect" + $(this).attr("name"));
	   		});
	   		$("#BBCBox_message_select_0_10").unbind().click(function() {
	   			console.log("[googleAnalytics.js][#BBCBox_message_select_0_10] " + $(this).attr("name"));
	   			//alert($(this).attr("name"));
	   			//sendCommentAndTopicSelect
	   			
	   			ga("send", "event", "sendCommentAndTopicSelect", "click", "sendCommentAndTopicSelect" + $(this).attr("name"));
	   		});
	   		$("#BBCBox_message_select_0_11").unbind().click(function() {
	   			console.log("[googleAnalytics.js][#BBCBox_message_select_0_10] " + $(this).attr("name"));
	   			//alert($(this).attr("name"));
	   			//sendCommentAndTopicSelect
	   			
	   			ga("send", "event", "sendCommentAndTopicSelect", "click", "sendCommentAndTopicSelect" + $(this).attr("name"));
	   		});
	   	});
	</script>
        <script type="text/javascript" src="', $settings['theme_url'], '/scripts/twitter.js"></script>
        <div id="fb-root"></div>
        <script type="text/javascript" src="', $settings['theme_url'], '/scripts/facebook.js"></script>';

	echo '
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1">
	<meta name="description" content="', $context['page_title_html_safe'], '" />', !empty($context['meta_keywords']) ? '
	<meta name="keywords" content="' . $context['meta_keywords'] . '" />' : '', '
        
        <!--toastr-->
        <script type="text/javascript" src="', $settings['theme_url'], '/scripts/toastr.js"></script>
        <link rel="stylesheet" type="text/css" href="', $settings['theme_url'], '/css/toastr.css" />

	<title>', $context['page_title_html_safe'], '</title>';

	// Please don't index these Mr Robot.
	if (!empty($context['robot_no_index']))
		echo '
	<meta name="robots" content="noindex" />';

	// Present a canonical url for search engines to prevent duplicate content in their indices.
	if (!empty($context['canonical_url']))
		echo '
	<link rel="canonical" href="', $context['canonical_url'], '" />';

	// Show all the relative links, such as help, search, contents, and the like.
	echo '
	<link rel="help" href="', $scripturl, '?action=help" />
	<link rel="search" href="', $scripturl, '?action=search" />
	<link rel="contents" href="', $scripturl, '" />';

	// If RSS feeds are enabled, advertise the presence of one.
	if (!empty($modSettings['xmlnews_enable']) && (!empty($modSettings['allow_guestAccess']) || $context['user']['is_logged']))
		echo '
	<link rel="alternate" type="application/rss+xml" title="', $context['forum_name_html_safe'], ' - ', $txt['rss'], '" href="', $scripturl, '?type=rss;action=.xml" />';

	// If we're viewing a topic, these should be the previous and next topics, respectively.
	if (!empty($context['current_topic']))
		echo '
	<link rel="prev" href="', $scripturl, '?topic=', $context['current_topic'], '.0;prev_next=prev" />
	<link rel="next" href="', $scripturl, '?topic=', $context['current_topic'], '.0;prev_next=next" />';

	// If we're in a board, or a topic for that matter, the index will be the board's index.
	if (!empty($context['current_board'])){
          echo '
	    <link rel="index" href="', $scripturl, '?board=', $context['current_board'], '.0" />
          ';
          if (!empty($context['current_topic']) && empty($_GET["action"])){
           
            $context['get_all_messages'] = $context['get_message']();
            $imagenes_first_post_msg = extraer_imagen($context['get_all_messages']);
            echo "<!--";
            print_r($imagenes_first_post_msg);
            echo "-->";
            if(!empty($imagenes_first_post_msg)){
              if(!empty($imagenes_first_post_msg[1][0])){
                echo '
                <!--Facebook-->
                <meta property="og:image" content="'.$imagenes_first_post_msg[1][0].'.'.$imagenes_first_post_msg[2][0].'" />
                ';
              } else {
                echo '
                <!--Facebook-->
                <meta property="og:image" content="', $settings['theme_url'], '/images/logo-cuadrado.png" /> 
             '  ;
              }
            } else {
              echo '
              <!--Facebook-->
              <meta property="og:image" content="', $settings['theme_url'], '/images/logo-cuadrado.png" /> 
             ';
            }
            
          } else {
            //si no estoy en un tema pero si dentro de uno de los foros.
            echo '
            <!--Facebook-->
            <meta property="og:image" content="', $settings['theme_url'], '/images/logo-cuadrado.png" /> 
            ';
          }
        } else {
          //estoy en alguna parte menos tema y foros
          echo '
          <!--Facebook -->
          <meta property="og:image" content="', $settings['theme_url'], '/images/logo-cuadrado.png" /> 
          ';
        }

	// Output any remaining HTML headers. (from mods, maybe?)
	echo $context['html_headers'];

echo '
</head>
<body ng-controller="index" ng-init="init('.$comilla.''.$_GET["action"].''.$comilla.','.$comilla.''.$_GET["request"].''.$comilla.','.$comilla.''.$context["user"]["id"].''.$comilla.');" style="overflow-x: hidden;">  
        <!-- .page-loader-->
        <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section"></div>
        </div> 
';
}
function template_body_above()
{
	global $context, $settings, $scripturl, $txt, $modSettings;
	$comillas = "'";
	echo '
        
	<div style="width: 100% !important;" class="container text-left">    
		  <div class="row">
		  <nav style="margin-bottom: 0;" class="navbar navbar-custom">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button onclick="googleAna('.$comillas.'menuSMImgButton'.$comillas.');" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			  </button>
			  <a onclick="googleAna('.$comillas.'logoSMImg'.$comillas.');" class="navbar-brand hidden-sm hidden-md hidden-lg" href="', $scripturl, '">', empty($settings['site_logo']) ? '<img style="width: 150px;" id="sitelogo" src="' . $context['header_logo_url_html_safe'] . '" alt="'.$context['forum_name'].'" title="'.$context['forum_name'].'" />' : '<img id="sitelogo" src="' . $settings['site_logo'] . '" alt="' . $context['forum_name'] . '" title="' . $context['forum_name'] . '" />', '</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
			  <ul class="nav navbar-nav">';
			   template_menu();
			echo '</ul>';
                        if($context['user']['is_logged']){
                              echo '
					<form style="margin-bottom: 0;" class="navbar-form navbar-right" role="search" action="', $scripturl, '?action=search2" method="post" accept-charset="', $context['character_set'], '">
					<div class="form-group ">
					<input style="margin-bottom: 0; color: #31708f; border-bottom: 1px solid #31708f;" type="text" name="search" class="form-control formsl" placeholder="'.$txt['search'].'" /> 
					</div>	
					<button onclick="googleAna('.$comillas.'searchHeaderMenuMDTxt'.$comillas.');" type="submit" class="btn btn-default navbar-right" style="padding-left: 10px; padding-right: 10px;">', $txt['search'], '</button>
					</form>';
                        }
                        echo '
			</div>
		  </div>
		</nav>
		<div style="margin-bottom: 0;" class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left">
            <div class="panel-body">';
		echo '<div class="row">';
		if (!$context['user']['is_logged'] || $context['page_title_html_safe']!=$txt['forum_index']){
			echo '
			<div onclick="googleAna('.$comillas.'sloganMDTxt'.$comillas.');" class="col-sm-4 col-xs-12">
				<h1 style="font-size: 12px; padding-top: 10px;" class="forumtitle">'.$settings['site_slogan'].'</a></h1>
			</div>';
		} else {
			echo '
			<div class="col-sm-4 col-xs-12 text-center">
			</div>';
		}

	echo '<div class="hidden-xs col-sm-4 text-center">
		<img onclick="googleAna('.$comillas.'logoMDImg'.$comillas.');" style="width: 200px;" id="smflogo" src="' . $context['header_logo_url_html_safe'] . '" alt="'.$context['forum_name'].'" title="'.$context['forum_name'].'" />';
	echo'</div><div class="col-sm-4"><div class="dropdown  floatright">';
	if ($context['user']['is_logged'])
	{
		echo '
			<button onclick="googleAna('.$comillas.'profileLogSMImgButton'.$comillas.');" style="font-size:12px; padding: 0 !important;" type="button" class="btn btn-info" data-toggle="collapse" data-target="#snrj">';

		if (!empty($context['user']['avatar']))
		{
			echo '
				<span class="posbit">', $context['user']['avatar']['image'], '</span>';
		}
		else
		{
			echo '
				<span class="posbit"><img class="avatar" src="'.$settings['images_url'].'/default_avatar.png" alt="" /></span>';
		}

		echo '
				<span style="padding-right: 5px;">'.($context['user']['is_logged'] ? "".$txt['hello_member']." ".$context['user']['name']." ":"".$txt['guest'].", ").'</span><span style="margin-right: 5px;" class="caret"></span>
			</button>
			<div id="snrj" class="collapse">
  <ul class="list-group">';
                                      if($context['user']['unread_messages']==0){             
                                         echo '
                                           <li onclick="googleAna('.$comillas.'PMSMImgButton'.$comillas.');" class="list-group-item"><a href="', $scripturl, '?action=pm">Tienes ', $context['user']['unread_messages'], ' Mensajes Privados</a></li>
                                         ';
                                      } else {
                                         echo '
                                           <li onclick="googleAna('.$comillas.'PMSMImgButton'.$comillas.');" class="list-group-item"><a style="color: red !important;" href="', $scripturl, '?action=pm">Tienes ', $context['user']['unread_messages'], ' Mensaje(s) Privado(s)</a></li>
                                         ';
                                      }
                                      echo '
                                        <li onclick="googleAna('.$comillas.'profileSMImgButton'.$comillas.');" class="list-group-item"><a href="', $scripturl, '?action=profile">', $txt['view_profile'], '</a></li>
					<li onclick="googleAna('.$comillas.'unreadSMImgButton'.$comillas.');" class="list-group-item"><a href="', $scripturl, '?action=unread">', $txt['unread_since_visit'], '</a></li>
					<li onclick="googleAna('.$comillas.'unreadrepliesSMImgButton'.$comillas.');" class="list-group-item"><a href="', $scripturl, '?action=unreadreplies">', $txt['show_unread_replies'], '</a></li>';

		if ($context['in_maintenance'] && $context['user']['is_admin'])
			echo '
					<li class="list-group-item">', $txt['maintain_mode_on'], '</li>';

		if (!empty($context['unapproved_members']))
			echo '
					<li class="list-group-item">', $context['unapproved_members'] == 1 ? $txt['approve_thereis'] : $txt['approve_thereare'], ' <a href="', $scripturl, '?action=admin;area=viewmembers;sa=browse;type=approve">', $context['unapproved_members'] == 1 ? $txt['approve_member'] : $context['unapproved_members'] . ' ' . $txt['approve_members'], '</a> ', $txt['approve_members_waiting'], '</li>';

		if (!empty($context['open_mod_reports']) && $context['show_open_reports'])
			echo '
					<li class="list-group-item"><a href="', $scripturl, '?action=moderate;area=reports">', sprintf($txt['mod_reports_waiting'], $context['open_mod_reports']), '</a></li>';

		echo '		
					<li class="list-group-item list-group-item-warning">', $context['current_time'], '</li>
  </ul> </div>';

	}
	elseif (!empty($context['show_login_bar']))
	{
		echo ' <button onclick="googleAna('.$comillas.'guestLogSMImgButton'.$comillas.');" type="button" class="btn btn-danger" data-toggle="collapse" data-target="#snrj">
  '.$txt['hello_member'].' '.$txt['guest'].', '.$txt['login2'].'
    <span class="caret"></span>
  </button><div id="snrj" class="collapse well well-sm">
				<script type="text/javascript" src="', $settings['default_theme_url'], '/scripts/sha1.js"></script>
				<form id="guest_form" action="', $scripturl, '?action=login2" method="post" accept-charset="', $context['character_set'], '" ', empty($context['disable_login_hashing']) ? ' onsubmit="hashLoginPassword(this, \'' . $context['session_id'] . '\');"' : '', '>
					<div class="info">', sprintf($txt['welcome_guest'], $txt['guest_title']), '</div>
					<div style="display: none;" id="showLoginOption2" class="text-center">
						<input type="text" name="user" size="20" class="input_text" placeholder="'.$txt['email'].'" /><br /><br />
						<input type="password" name="passwrd" size="20" class="input_password" placeholder="'.$txt['password'].'" /><br /><br />
						<select  style="display: none !important;" onclick="googleAna('.$comillas.'guestLogCookiesSMImgButton'.$comillas.');" name="cookielength">
							<option value="60">', $txt['one_hour'], '</option>
							<option value="1440">', $txt['one_day'], '</option>
							<option value="10080">', $txt['one_week'], '</option>
							<option value="43200">', $txt['one_month'], '</option>
							<option value="-1" selected="selected">', $txt['forever'], '</option>
						</select>
                                                <button onclick="googleAna('.$comillas.'loginSMImgButton'.$comillas.');" style="margin-top: 10px;" type="submit" value="', $txt['login'], '" class="btn btn-success">', $txt['login'], '</button>
					</div>
					<br />';

		if (!empty($modSettings['enableOpenID']))
			echo '
					<br /><input type="text" name="openid_identifier" id="openid_url" size="25" class="input_text openid_login" />';

		echo '
					<input type="hidden" name="', $context['session_var'], '" value="', $context['session_id'], '" />
					<input type="hidden" name="hash_passwrd" value="" />
				</form>
                        <div style="margin-bottom: 20px;" id="showLoginButton2" class="col-md-12 text-center">
					<button onclick="showLogin2();" style="text-align: center;" class="btn btn-success" value="Soy Usuario" type="button">Soy Usuario</button>		
			</div>
			<div class="col-md-12 text-center">
				<a href="', $scripturl, '?action=register">
					<button onclick="googleAna('.$comillas.'registerSMImgButton'.$comillas.');" style="text-align: center;" class="btn btn-danger" value="'.$txt['register'].'" type="button">'.$txt['register'].'</button>
				</a>		
			</div>
		</div>';
	}

	echo '</div></div>
		</div>';

		if (!empty($settings['enable_news']) && $context['user']['is_logged'])

	echo '<div style="margin-top: 10px;" class="alert alert-success small fade in">
        	<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
		if($context['user']['is_logged']){
			echo '<p onclick="googleAna('.$comillas.'randomNewsMDTxt'.$comillas.');">', $context['random_news_line'], '</p>';
			echo '<p onclick="googleAna('.$comillas.'welcomeNewsMDTxt'.$comillas.');" style="color: #000;">',$txt['benvenida_stats_index'],'<b> '.$context['common_stats']['latest_member']['link'].'</b></p>';
		}
	echo '
	      </div>
		
            </div>';
		  	theme_linktree();
	echo'
          </div>
        </div>
      </div>';


}

function template_body_below()
{
	global $context, $settings, $options, $scripturl, $txt, $modSettings;
	// Show the "Powered by" and "Valid" logos, as well as the copyright. Remember, the copyright must be somewhere!
	$comillas = "'";
	echo '
	<div style="margin-bottom: 20px;" class="row">
		<div style="text-align: center;" class="col-sm-12">
				<a onclick="googleAna('.$comillas.''.$act.'twitterFooter'.$comillas.');" target="_blank" href="http://twitter.com/loemprendemos"><img style="width: 40px;" src="http://loemprendemos.com/Themes/default/images/twitter.png" /></a>
				<a onclick="googleAna('.$comillas.''.$act.'facebookFooter'.$comillas.');" target="_blank" href="http://facebook.com/Loemprendemos"><img style="width: 30px;" src="http://loemprendemos.com/Themes/default/images/facebook.png" /></a>
		</div>
	</div>
	<div class="row">
			<div class="col-sm-8">', theme_copyright(), '
			</div>
			<div class="col-sm-4 text-right small">';
/*
			<div class="list-group list-group-horizontal">
			', !empty($modSettings['xmlnews_enable']) && (!empty($modSettings['allow_guestAccess']) || $context['user']['is_logged']) ? '<a class="list-group-item" href="' . $scripturl . '?action=.xml;type=rss" ><span>' . $txt['rss'] . '</span></a>' : '', '
		</div>';*/

	// Show the load time?
	if ($context['show_load_time'])
		echo '
		<p>', $txt['page_created'], $context['load_time'], $txt['seconds_with'], $context['load_queries'], $txt['queries'], '</p>';

	echo '
	</div></div>';
}

function welcome_modal()
{
		global $context, $settings, $options, $scripturl, $txt, $modSettings;

                $comillas = "'";

        echo ' 
         
        <script>
         // '; 
           if(($_GET["action"]=="welcome" || $_GET["action"]=="welcome2") && $context['page_title_html_safe']==$txt['forum_index']){
             echo '
               
               var skipThird = "0";
               
               //alert("bienvenido");
               $( document ).ready(function() {
                 
                
                ';
                if($_GET["action"]=="welcome2"){
                  echo '$("#step21Modal").modal("show");';
                } else {
                  echo '$("#welcomeModal").modal("show");';
                }
                echo '
               });

               function firstStep(){
                 googleAna("welcomeUXFirstStep");
                 $("#welcomeModal").modal("hide");
                 $("#step2Modal").modal("show");
               }
               
               function secondStep(){
                 googleAna("welcomeUXSecondStepSkip");
                 $("#step2Modal").modal("hide");
                 $("#step21Modal").modal("show");
               }
               
               function secondStepSkip(){
                 googleAna("welcomeUXSecondStepSkip");
                 $("#step2Modal").modal("hide");
                 $("#step21Modal").modal("show");
               }
               
               function secondOneStep(){
                 googleAna("welcomeUXSecondOneStep");
                 //alert("Input text: |" + $("#tipo_detalle_input").val() + "|");
                 $("#tipo_detalle").css("display","none");
                 $("#tipo_detalle2").css("display","none");
                 $("#tipo_profesion_emprendedor_select").css("display","none");
                 var x = document.getElementById("tipo_perfil").selectedIndex;
		 var y = document.getElementById("tipo_perfil").options;
                 if(y[x].value=="'; echo $txt['select_default_value']; echo '"){
                 	toastr["warning"]("Selecciona un tipo de perfil");
                 	$("#secondOneStep").css("display","none");
                 } else {
                         if(y[x].value=="Emprendedor"){
                           $("#tipo_profesion_emprendedor_select").css("display","");
                         } else if(y[x].value=="Proveedor" || y[x].value=="Mentor" || y[x].value=="Otro") {
                           $("#tipo_detalle").css("display","");
                           $("#tipo_detalle2").css("display","");
                         } else {
                           $("#tipo_detalle").css("display","none");
                           $("#tipo_detalle2").css("display","none");
                           $("#secondOneStep").css("display","");
                         }
                 }
                 if(y[x].value=="Emprendedor" || y[x].value=="Proveedor" || y[x].value=="Mentor" || y[x].value=="Otro"){
	                 var x2 = document.getElementById("tipo_profesion_emprendedor").selectedIndex;
			 var y2 = document.getElementById("tipo_profesion_emprendedor").options;
	                 if(y[x].value=="Emprendedor" && y2[x2].value=="'; echo $txt['select_default_value']; echo '"){
	                 	
	                 	$("#secondOneStep").css("display","none");
	                 }  else if(y2[x2].value=="Otro" && $("#tipo_detalle_input").val()=="") {
	                           $("#tipo_detalle").css("display","");
	                           $("#tipo_detalle2").css("display","");
	                           $("#secondOneStep").css("display","none");
	                 }  else if(y2[x2].value=="Otro" && $("#tipo_detalle_input").val()!="") {
	                           $("#tipo_detalle").css("display","");
	                           $("#tipo_detalle2").css("display","");
	                           $("#secondOneStep").css("display","");
	                 }  else if(y[x].value=="Emprendedor" && y2[x2].value!="'; echo $txt['select_default_value']; echo '") {
	                 	   $("#secondOneStep").css("display","");
	                 }  else if((y[x].value=="Proveedor" || y[x].value=="Mentor" || y[x].value=="Otro") && $("#tipo_detalle_input").val()=="") {
	                 	   $("#tipo_detalle").css("display","");
	                           $("#tipo_detalle2").css("display","");
	                           $("#secondOneStep").css("display","none");
	                 }  else if((y[x].value=="Proveedor" || y[x].value=="Mentor" || y[x].value=="Otro") && $("#tipo_detalle_input").val()!="") {
	                 	   $("#tipo_detalle").css("display","");
	                           $("#tipo_detalle2").css("display","");
	                           $("#secondOneStep").css("display","");
	                 }
                 //fin if
                 }
                 
               }//fin function
               
               function secondOneStepContinue(){
                 googleAna("welcomeUXActiveSecondOneStepContinue");
                 $("#step21Modal").modal("hide");
                 $("#step22Modal").modal("show");
               }
               
               function secondTwoStep(){
                 googleAna("welcomeUXSecondTwoStep");
                 var x = document.getElementById("busca_perfil").selectedIndex;
		 var y = document.getElementById("busca_perfil").options;
		 $("#secondTwoStep").css("display","none");
                 if(y[x].value=="'; echo $txt['select_default_value']; echo '"){
                 	toastr["warning"]("Selecciona un tipo de perfil");
                 	$("#secondTwoStep").css("display","none");
                 	$("#busca_detalle").css("display","none");
                        $("#busca_detalle2").css("display","none");
                 } else if(y[x].value=="Otros") {
                 	$("#busca_detalle").css("display","");
                        $("#busca_detalle2").css("display","");
                 } else {
                        $("#secondTwoStep").css("display","");
                 }
                 if(y[x].value=="Otros" && $("#busca_detalle_input").val()!=""){
                   $("#secondTwoStep").css("display","");
                 } else if(y[x].value=="Otros" && $("#busca_detalle_input").val()==""){
                   $("#secondTwoStep").css("display","none");
                 }
               }

               function marcarTodosConexion(){
                 googleAna("welcomeUXActiveMarcarTodosConexion");
                 for(var i=0; i<$("#sizeUser").val(); i++){
                   $("#userConect"+i+"").prop("checked", true);
                 }
               }

               function desmarcarTodosConexion(){
                 googleAna("welcomeUXActiveDesmarcarTodosConexion");
                 for(var i=0; i<$("#sizeUser").val(); i++){
                   $("#userConect"+i+"").prop("checked", false);
                 }
               }
               
               function secondTwoStepContinue(){
                 googleAna("welcomeUXActiveSecondTwoStepContinue");
                
                 var x = document.getElementById("tipo_perfil").selectedIndex;
		 var tipo_perfil = document.getElementById("tipo_perfil").options;

                 var x2 = document.getElementById("tipo_profesion_emprendedor").selectedIndex;
	         var tipo_profesion_emprendedor = document.getElementById("tipo_profesion_emprendedor").options;

                 var x3 = document.getElementById("busca_perfil").selectedIndex;
		 var busca_perfil = document.getElementById("busca_perfil").options;

                 $("#secondTwoStep").css("display","none");
                 $.ajax({  	url:   "cargaDatosyConecta.php",
				type:  "POST",
				data:   {tipo_profesion:tipo_perfil[x].value+" "+tipo_profesion_emprendedor[x2].value+" "+$("#tipo_detalle_input").val(),tipo_busca:busca_perfil[x3].value+" "+$("#busca_detalle_input2").val(), replace:"'; echo $txt['select_default_value']; echo '",id_member:'; echo $context["user"]["id"]; echo '},
				success:  function (response) {
                                  response = JSON.parse(response);
                                  if(response.response=="true"){
                                    $("#step22Modal").modal("hide");

                                    var comilla = "'; echo "'"; echo '";                                    

                                    //formato de conexion
                                    var html = "";

                                    html = html + "<div class="+comilla+"row"+comilla+">";
                                      html = html + "<div class="+comilla+"col-xs-12 col-md-12"+comilla+">";         
                                        html = html + "<div class="+comilla+"col-xs-6 col-md-6 text-center"+comilla+"><a onclick="+comilla+"marcarTodosConexion();"+comilla+">Marcar Todos</a></div>";       
                                        html = html + "<div class="+comilla+"col-xs-6 col-md-6 text-center"+comilla+"><a onclick="+comilla+"desmarcarTodosConexion();"+comilla+">Desmarcar Todos</a></div>";         
                                      html = html + "</div>";  
                                    html = html + "</div>";
                             

                                    for(var i=0; i<response.users.length; i++){
                                      html = html + "<div style="+comilla+"margin-top: 0px;"+comilla+" class="+comilla+"row"+comilla+">";
                                        html = html + "<div style="+comilla+"margin-top: 30px;"+comilla+" class="+comilla+"col-md-12"+comilla+">";
                                          html = html + "<div class="+comilla+"col-xs-2 col-md-2"+comilla+">";
                                            html = html + "<input type="+comilla+"checkbox"+comilla+" name="+comilla+"userConect"+comilla+" id="+comilla+"userConect"+i+""+comilla+" checked>";
                                          html = html + "</div>";
                                          html = html + "<div class="+comilla+"col-xs-10 col-md-10"+comilla+">";
                                            html = html + "<input type="+comilla+"text"+comilla+" name="+comilla+"userConectId"+comilla+" id="+comilla+"userConectId"+i+""+comilla+" value="+comilla+""+response.users[i].id+""+comilla+" hidden>";
                                            html = html + "" + utf8_decode(response.users[i].name) + "<br/>";
                                            html = html + "" + utf8_decode(response.users[i].location) + "<br />";
                                            html = html + "" + utf8_decode(response.users[i].tipo_profesion);
                                          html = html + "</div>";
                                        html = html + "</div>";
                                      html = html + "</div>";
                                    } //fin for
                                    html = html + "<input type="+comilla+"text"+comilla+" name="+comilla+"sizeUser"+comilla+" id="+comilla+"sizeUser"+comilla+" value="+comilla+""+response.sizeUser+""+comilla+" hidden>";
                                    $("#conexion").html(html);


				    $("#step23Modal").modal("show");
                                  } else {
                                    $("#step31Modal").modal("show");
                                  }
				},
				error: function (){
				        toastr["error"]("Error, inténtelo nuevamente.");
                                        $("#step22Modal").modal("show");
				}
		  });//fin ajax
               }

               function secondThreeStepContinue(){
                 googleAna("welcomeUXActiveSecondThreeStepContinue");

                 var comilla = "'; echo "'"; echo '"; 
                 
                 for(var i=0; i<$("#sizeUser").val(); i++){
                   var checkInput = document.getElementById("userConect"+i+"").checked;
                   var id_user_input = $("#userConectId"+i+"").val();
                   console.log("[secondThreeStepContinue] invitation checkbox: " + checkInput + " id: " + id_user_input);
                   if(checkInput){
                     $.ajax({   url:   "enviarDatosConecta.php",
			 	type:  "POST",
				data:   {id_send:id_user_input,id_member:'; echo $context["user"]["id"]; echo '},
				success:  function (response) {
				},
				error: function (){
				}
		    });//fin ajax
                  }//fin if checkbox
                  else {
                    console.log("No se Envía Invitación");
                  }
                 }//fin for

                 $("#step23Modal").modal("hide");
                 $("#step31Modal").modal("show");
               }

               function activarStep31Modal(){
                 googleAna("welcomeUXActiveThirdOneStep");
               	 $("#thirdOneStep").css("display","none");
                 var x = document.getElementById("interes").selectedIndex;
		 var y = document.getElementById("interes").options;
                 if(y[x].value=="'; echo $txt['select_default_value']; echo '"){
                 	toastr["warning"]("Selecciona una categoría");
                 } else {
                         $.ajax({  	url:   "cargaDatosIntereses.php",
				type:  "POST",
				data:   {interes:y[x].value,id_member:'; echo $context["user"]["id"]; echo '},
				success:  function (response) {
                                  response = JSON.parse(response);
                                  if(response.response=="true"){
                                    $("#step31Modal").modal("hide");
	                            $("#step41Modal").modal("show");
                                  } else {
                                    toastr["error"]("Error, inténtelo nuevamente.");
                                    $("#step31Modal").modal("show");
                                    $("#thirdOneStep").css("display","");
                                  }
				},
				error: function (){
				        toastr["error"]("Error, inténtelo nuevamente.");
                                        $("#step31Modal").modal("show");
                                        $("#thirdOneStep").css("display","");
				}
		  });//fin ajax
                 }
               }

               function fourthOneStep(){
                 googleAna("welcomeUXFourthOneStep");
                 $("#step41Modal").modal("hide");
		 var x = document.getElementById("interes").selectedIndex;
		 var y = document.getElementById("interes").options;
		 console.log("Index: " + y[x].index + " is " + y[x].text + " value " + y[x].value);
		 if(y[x].value!="'; echo $txt['select_default_value']; echo '"){
                   //window.location = ""+y[x].getAttribute("name")+"";
                   
                 }
               }
               
               function activarStep3Modal(){
                 googleAna("welcomeUXActiveThirdStep");
               	 $("#thirdStep").css("display","");
               	 $("#thirdStepSkip").css("display","");
               }
               
               function thirdStep(){
                 googleAna("welcomeUXThirdStep");
                 var x = document.getElementById("foros").selectedIndex;
		 var y = document.getElementById("foros").options;
                 if(y[x].value=="'; echo $txt['select_default_value']; echo '"){
                 	toastr["warning"]("Selecciona una categoría");
                 } else {
	                 $("#step3Modal").modal("hide");
	                 $("#step4Modal").modal("show");
	                 $("#instruccionesFourthStep").html("La categoría a la que publicarás será a " + y[x].text);
                 }
               }
               
               function thirdStepSkip(){
                 googleAna("welcomeUXThirdStepSkip");
                 $("#step3Modal").modal("hide");
                 $("#step4Modal").modal("show");
                 skipThird = "1";
                 $("#instruccionesFourthStep").html("Te recomendamos que te presentes ante la comunidad a través de la siguiente liga: <a href=http://loemprendemos.com/networking-otros-temas/t5/?action=post>Presentate Aquí</a>");
               }
               
               function fourthStep(){
                 googleAna("welcomeUXFourthStep");
                 $("#step4Modal").modal("hide");
		 var x = document.getElementById("foros").selectedIndex;
		 var y = document.getElementById("foros").options;
		 console.log("Index: " + y[x].index + " is " + y[x].text + " value " + y[x].value);
		 if(skipThird=="0" && y[x].value!="'; echo $txt['select_default_value']; echo '"){
                   window.location = ""+y[x].value+";action=post";
                 }
               }

               function subirImage(){
		  ga("send", "event", "Subir Imágen UX Welcome", "click", "Subir Imágen UX Welcome");
                  $("#secondStep").css("display","");
		  $("#cargandoFileImage").css("display","");
		  var rFilter = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;
		  if (document.getElementById("fileImage").files.length === 0) { return; }
		  var oFile = document.getElementById("fileImage").files[0];
		  if (!rFilter.test(oFile.type)) 
		  { toastr["warning"]("Error, archivo no soportado. Suba otro tipo de archivo");
			$("#cargandoFileImage").css("display","none");
			return; 
		  }
		  var fd = new FormData();
		  fd.append("fileImage", oFile);
		  console.log(fd);
		  $.ajax({  	url:   "subirImagenes.php",
				type:  "POST",
				data:   fd,
				processData: false,
				contentType: false,
				success:  function (response) {
                                        console.log(response);
					if(response.indexOf("ERROR")=="-1"){
					  $("#imagePreview").html("<img width=50 src='.$modSettings["pretty_root_url"].'/bibliotecaImages/"+response+" />");
					  $.ajax({  	url:   "subirImagenesBD.php",
							type:  "POST",
							data:   {url:"'.$modSettings["pretty_root_url"].'/bibliotecaImages/"+response+"", id:"'.$context["user"]["id"].'", image:response},
							success:  function (response) {
							        response = JSON.parse(response);
								console.log("[subirImagenesBD] ");
								console.log(response);
								console.log(response.response);
								if(response.response=="true")
									toastr["success"]("Tu imágen a sido cargada a tu perfil Exitosamente.");
								else
									toastr["error"]("Error, inténtelo nuevamente.");
							},
							error: function (){
							        toastr["error"]("Error, inténtelo nuevamente..");
							}
					  });//fin ajax
					}  else if(response.indexOf("ERROR Tamaño")!="-1") {
				           toastr["error"]("ERROR: imágen muy pesada");
				        } else {
					  toastr["error"]("Error, inténtelo nuevamente...");
					}
					$("#cargandoFileImage").css("display","none");
				},
				error: function (){
				        toastr["error"]("Error, inténtelo nuevamente....");
					$("#cargandoFileImage").css("display","none");
				}
		  });//fin ajax
		}//fin subirimage';
              }
        echo '//'.$context['page_title_html_safe'].'
        </script>'; 
           if(($_GET["action"]=="welcome" || $_GET["action"]=="welcome2") && $context['page_title_html_safe']==$txt['forum_index']){

		// Welcome
		echo '<div class="modal fade" id="welcomeModal" role="dialog" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog modal-sm">
				  <div class="modal-content">
					<div class="modal-header text-center">
					  Bienvenido
					</div>
					<div class="modal-body">
                                          <hi>Hola </h1>'.$context["user"]["name"].'.<br /><br />
                                          Estamos muy contentos de tenerte en Loemprendemos.com.<br /><br />
                                          <h1 class="text-center" style="font-size: 16px;"><b class="text-center">¡Muchas Gracias por Registrarte!</b></h1><br /><br/>
                                          <div class="text-center">
                                            <img style="text-align: center; width: 150px;" src="'.$settings["theme_url"].'/images/serpentina.png" />
                                          </div><br />
                                          <div class="text-center">
                                            Sólo faltan unos últimos pasos más.
                                          </div>
					</div>
					<div class="modal-footer">
                                          <button onclick="firstStep();" type="button" class="btn btn-info">Siguiente</button>
					</div>
				  </div>
				</div>
			  </div>';

                 // Image Profile Upload
		echo '<div class="modal fade" id="step2Modal" role="dialog" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog modal-sm">
				  <div class="modal-content">
					<div class="modal-header text-center">
					  Elige una imágen de perfil
					</div>
					<div class="modal-body">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <input onclick="" id="fileImage" type="file" onchange="subirImage();" name="file" style="height: 30px; width: 100%; cursor:pointer;">
					    </div>
					    <div style="margin-top: 10px; display: none;" id="cargandoFileImage" class="col-md-12 text-center">
					      <img class="text-center" style="width: 50px;" src="'.$settings["theme_url"].'/images/cargando.gif">
					    </div>
					    <div style="margin-top: 10px;" id="imagePreview" class="col-md-12 text-center">
					    </div>
					  </div>
					</div>
					<div class="modal-footer">
					  <button style="float: left;" onclick="secondStepSkip();" type="button" class="btn btn-default">Saltar</button>
                                          <button style="display: none;" id="secondStep" onclick="secondStep();" type="button" class="btn btn-info">Siguiente</button>
					</div>
				  </div>
				</div>
			  </div>';

                 // Tipo Perfil
		echo '<div class="modal fade" id="step21Modal" role="dialog" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog modal-sm">
				  <div class="modal-content">
					<div class="modal-header text-center">
					  Ayúdanos a conectarte mejor
					</div>
					<div class="modal-body">
                                          <div class="row">
                                            <div style="margin-top: 10px; text-align: left;" id="cargandoFileImage" class="col-md-12">
					      Ayúdanos a identificar el mejor perfil que te describa, el cuál quieras llevar frente a los emprendedores:
					    </div>
                                            <div class="col-md-12">
                                              <select class="form-control" onchange="secondOneStep();" name="tipo_perfil" id="tipo_perfil">
                                                <option name="'; echo $txt['select_default_value']; echo '" value="'; echo $txt['select_default_value']; echo '">Seleciona un perfil</option>
                                                ';
                                                foreach($txt['tipo_profesion'] AS $key => $tipo_profesion){
                                                  echo '
                                                  <option name="'.$tipo_profesion.'" value="'.$tipo_profesion.'">'.$tipo_profesion.'</option>
                                                  ';
                                                }
                                                echo '
                                              </select>
					    </div>
					    <div onchange="secondOneStep();" id="tipo_profesion_emprendedor_select" style="display: none; margin-top: 20px;" class="col-md-12">
					      Selecciona una Profesión: <br />
                                              <select class="form-control" name="tipo_profesion_emprendedor" id="tipo_profesion_emprendedor">
                                                <option name="'; echo $txt['select_default_value']; echo '" value="'; echo $txt['select_default_value']; echo '">Seleciona una Profesión</option>
                                                ';
                                                foreach($txt['tipo_profesion_emprendedor'] AS $key => $tipo_profesion_emprendedor){
                                                  echo '
                                                  <option name="'.$tipo_profesion_emprendedor.'" value="'.$tipo_profesion_emprendedor.'">'.$tipo_profesion_emprendedor.'</option>
                                                  ';
                                                }
                                                echo '
                                              </select>
					    </div>
					    <div id="tipo_detalle" style="display: none; margin-top: 20px;" class="col-md-12">
                                              Sé más específico por favor:
					    </div>
					    <div id="tipo_detalle2" style="display: none;" class="col-md-12">
                                              <input class="form-control" onchange="secondOneStep();" value="" type="text" id="tipo_detalle_input"  />
					    </div>
					  </div>
					</div>
					<div class="modal-footer">
                                          <button style="display: none;" id="secondOneStep" onclick="secondOneStepContinue();" type="button" class="btn btn-info">Siguiente</button>
					</div>
				  </div>
				</div>
			  </div>';
			  
	        // Que buscas?
		echo '<div class="modal fade" id="step22Modal" role="dialog" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog modal-sm">
				  <div class="modal-content">
					<div class="modal-header text-center">
					  ¿Qué tipo de perfiles estás buscando?
					</div>
					<div class="modal-body">
                                          <div class="row">
                                            <div style="margin-top: 10px; text-align: left;" id="cargandoFileImage" class="col-md-12">
					      Ayúdanos a identificar los perfiles que estás buscando para conectarte ahora:
					    </div>
                                            <div class="col-md-12">
                                              <select class="form-control" onchange="secondTwoStep();" name="busca_perfil" id="busca_perfil">
                                                <option name="'; echo $txt['select_default_value']; echo '" value="'; echo $txt['select_default_value']; echo '">Seleciona un perfil</option>
                                                ';
                                                foreach($txt['busca_profesion'] AS $key => $tipo_profesion){
                                                  echo '
                                                  <option name="'.$tipo_profesion.'" value="'.$tipo_profesion.'">'.$tipo_profesion.'</option>
                                                  ';
                                                }
                                                echo '
                                              </select>
					    </div>
					    <div id="busca_detalle" style="display: none; margin-top: 20px;" class="col-md-12">
                                              Sé más específico por favor:
					    </div>
					    <div id="busca_detalle2" style="display: none;" class="col-md-12">
                                              <input class="form-control" onchange="secondTwoStep();" value="" type="text" id="busca_detalle_input2"  />
					    </div>
					  </div>
					</div>
					<div class="modal-footer">
                                          <button style="display: none;" id="secondTwoStep" onclick="secondTwoStepContinue();" type="button" class="btn btn-info">Siguiente</button>
					</div>
				  </div>
				</div>
			  </div>';
			  
		// Conéctate
		echo '<div class="modal fade" id="step23Modal" role="dialog" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog modal-sm">
				  <div class="modal-content">
					<div class="modal-header text-center">
					  !Conecta ahora¡
					</div>
					<div class="modal-body">
                                          <div class="row">
                                            <div style="margin-top: 10px; text-align: left;" id="cargandoFileImage" class="col-md-12">
					      Selecciona a la(s) persona(s) que más te llamen la atención y Conecta con ellas. (Se les enviará una solicitud de conexión).
					    </div>
                                            <div style="background-color: #CECECE; margin-top: 10px; border: 1px solid #BBBBBB; overflow: -moz-scrollbars-vertical; overflow-y: scroll; height: 200px;" id="conexion" class="col-md-12">
					    </div>
					  </div>
					</div>
					<div class="modal-footer">
                                          <button id="secondThreeStep" onclick="secondThreeStepContinue();" type="button" class="btn btn-info">Siguiente</button>
					</div>
				  </div>
				</div>
			  </div>';
			  
                // Leer un foro
		echo '<div class="modal fade" id="step31Modal" role="dialog" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog modal-sm">
				  <div class="modal-content">
					<div class="modal-header text-center">
					  ¿Qué temática te interesa?
					</div>
					<div class="modal-body">
                                          <div class="row">
                                            <div class="col-md-12">
                                            	Selecciona la temática que más te interese. No olvides que cada vez que creas un tema o post, toda la comunidad de emprendedores los verá publicados y podrás conectar y compartir más rápido:<br /><br />
                                            	<select class="form-control" onchange="activarStep31Modal();" id="interes" name="interes">
                                            		<option name="'; echo $txt['select_default_value']; echo '" value="'; echo $txt['select_default_value']; echo '">Seleciona una Temática</option>';
                                               foreach($context["categories"] as $categries){
					         foreach($categries as $bords){
					           foreach($bords as $bords2){
					             echo '<option value="'.$bords2["name"].'" name="'.$bords2["href"].'">'.$bords2["name"].'</option>';
					           }
					         }
					       }
					       echo '
					       </select>
					    </div>
					  </div>
					</div>
					<div class="modal-footer">
                                          <button id="thirdOneStep" style="display: none;" onclick="activarStep31Modal();" type="button" class="btn btn-info">Siguiente</button>
					</div>
				  </div>
				</div>
			  </div>';

                // Instrucciones y fin para redireccionar a lectura
		echo '<div class="modal fade" id="step41Modal" role="dialog" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog modal-sm">
				  <div class="modal-content">
					<div class="modal-header text-center">
					  Finalizamos
					</div>
					<div class="modal-body">
                                          <div class="row">
					    <div class="col-md-12">
					      Recuerda que puedes publicar un post dando click en el botón:<br /><center> <buton style="padding-left: 5px; padding-right: 5px; text-align: center;" type="button" class="btn btn-danger text-center"><span class="fa fa-pencil"></span> Publica una Pregunta</button></center>
					    </div>					    
                                            <div style="margin-top: 10px;" class="col-md-12">
					      También puedes publicar tu proyecto/startup, tan sólo da click en el botón azul:<br /> 
                                              <center>
                                                <buton style="padding-left: 5px; padding-right: 5px; text-align: center;" type="button" class="btn btn-primary text-center">Proyectos</button>
                                              </center>
					    </div>
					    <div style="margin-top: 20px;" class="col-md-12">
                                            	<div id="instruccionesFourthOneStep"></div>
					    </div>
					  </div>
                                        </div>
					<div class="modal-footer text-center">
					  <div class="col-md-12 text-center">
                                              <button style="text-align: center;" onclick="fourthOneStep();" type="button" class="btn btn-danger text-center">Finalizar</button>	
					  </div>
				        </div>
			          </div>
                              </div>
                            </div>';
			  
		// Escribir un post
		echo '<div class="modal fade" id="step3Modal" role="dialog" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog modal-sm">
				  <div class="modal-content">
					<div class="modal-header text-center">
					  Escribe tu primer Tema o Post
					</div>
					<div class="modal-body">
                                          <div class="row">
                                            <div class="col-md-12">
                                            	Selecciona la categoría del tema del que quieras platicar o preguntar. No olvides que cada vez que creas un tema o post, toda la comunidad de emprendedores los verá publicados y podrás conectar y compartir más rápido:<br /><br />
                                            	<select class="form-control" onchange="activarStep3Modal();" id="foros" name="foros">
                                            		<option name="'; echo $txt['select_default_value']; echo '" value="'; echo $txt['select_default_value']; echo '">Seleciona una Categoría</option>';
                                               foreach($context["categories"] as $categries){
					         foreach($categries as $bords){
					           foreach($bords as $bords2){
					             echo '<option value="'.$bords2["href"].'" name="'.$bords2["href"].'">'.$bords2["name"].'</option>';
					           }
					         }
					       }
					       echo '
					       </select>
					    </div>
					  </div>
					</div>
					<div class="modal-footer">
					  <button id="thirdStepSkip" style="float: left; display: none;" onclick="thirdStepSkip();" type="button" class="btn btn-default">Saltar</button>
                                          <button id="thirdStep" style="display: none;" onclick="thirdStep();" type="button" class="btn btn-info">Siguiente</button>
					</div>
				  </div>
				</div>
			  </div>';
			  
			  
 		// Instrucciones y fin para escribir un post
		echo '<div class="modal fade" id="step4Modal" role="dialog" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog modal-sm">
				  <div class="modal-content">
					<div class="modal-header text-center">
					  Finalizamos
					</div>
					<div class="modal-body">
                                          <div class="row">
					    <div class="col-md-12">
					      Recuerda que cada vez que quieras publicar un post tan sólo da click en los botones rojos o en el botón:<br /> <buton type="button" class="btn btn-danger"><span class="fa fa-pencil"></span> Publica una Pregunta</button>
					  </div>
					  <div style="margin-top: 20px;" class="col-md-12">
                                            	<div id="instruccionesFourthStep"></div>
					  </div>
					</div>
					<div class="modal-footer text-center">
					  <div class="col-md-12 text-center">
                                          	<button style="text-align: center;" onclick="fourthStep();" type="button" class="btn btn-danger text-center">Finalizar</button>	
                                          </div>
					</div>
				  </div>
				</div>
                              </div>
                            </div>
		
             ';
          }
          if($context['page_title_html_safe']==$txt['forum_index']){ 
             // Nueva Publicacion ¿Qué piensas?
             echo '	  
	        	  
 		
		     <div class="modal fade" id="publicarModal2" role="dialog" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog modal-sm">
				  <div class="modal-content">
					<div class="modal-header text-center">
					  Crear Nuevo Tema o Post <button onclick="googleAna('.$comillas.'publicarModal2CloseHeader'.$comillas.');" type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
                                          <div class="row">
					    <div class="col-md-12">
					      Selecciona la categoría del tema del que quieras platicar o preguntar. No olvides que cada vez que creas un tema o post, toda la comunidad de emprendedores los verá publicados y podrás conectar y compartir más rápido:<br /><br />
                                            	<select class="form-control" id="foros2" name="foros2">
                                            		<option name="'; echo $txt['select_default_value']; echo '" value="'; echo $txt['select_default_value']; echo '">Seleciona una Categoría</option>';
                                               foreach($context["categories"] as $categries){
					         foreach($categries as $bords){
					           foreach($bords as $bords2){
					             echo '<option value="'.$bords2["href"].'" name="'.$bords2["href"].'">'.$bords2["name"].'</option>';
					           }
					         }
					       }
					      echo '
                                              </select>
                                            </div>
					  </div>
					</div>
					<div class="modal-footer text-center">
					  <div class="col-md-12 text-center">
                                                <button style="padding-left: 10px; padding-right: 10px; float: left;" onclick="googleAna('.$comillas.'publicarModal2CloseFooter'.$comillas.');" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          	<button style="float: right;" id="publish" style="text-align: center;" onclick="escribirYa();" type="button" class="btn btn-danger text-center">Escribir</button>	
                                          </div>
					</div>
				  </div>
				</div>
			  </div>';
           }//fin get y txt forum index
}

function template_html_below()
{
	global $context, $settings, $options, $scripturl, $txt, $modSettings;
echo '
		</div>
	</div>';
        welcome_modal();
echo '
</body></html>';
}

function theme_linktree($force_show = false)
{
	global $context, $txt, $settings, $options, $shown_linktree;

        $comillas = "'";

	if (empty($context['linktree']) || (!empty($context['dont_default_linktree']) && !$force_show))
		return;

	echo '<hr class="hr-primary" />
        <ol onclick="googleAna('.$comillas.'linkTreeUrl'.$comillas.');" class="breadcrumb small">';

	foreach ($context['linktree'] as $link_num => $tree)
	{ 
		echo $settings['linktree_link'] && isset($tree['url']) ? '
				<li><a href="' . $tree['url'] . '" ><span>' . $tree['name'] . '</span></a>' : '<span>' . $tree['name'] . '</span></li>';

		
	}
	echo '
		</ol>';

	$shown_linktree = true;
}

// Show the menu up top. Something like [home] [help] [profile] [logout]...
function template_menu()
{
	global $context, $settings, $options, $scripturl, $txt;
	$comillas = "'";
        
	foreach ($context['menu_buttons'] as $act => $button)
	{       
		echo ' 
				<li id="button_', $act, '" class="small">
					<a onclick="googleAna('.$comillas.''.$act.'HeaderMenuMDTxt'.$comillas.');" class="', $button['active_button'] ? 'active ' : '', 'firstlevel"  role="button" href="', $button['href'], '"', isset($button['target']) ? ' target="' . $button['target'] . '"' : '', '>
						<span '.($act=="register" ? 'style="color: red;"' : '').' class="', isset($button['is_last']) ? 'last ' : '', 'firstlevel">';

                 if(strpos($button["title"],"<strong>")!==false){
                   $button["title"] = str_replace("[<strong>","<span style=".$comillas."background-color: #d9534f;".$comillas." class=".$comillas."new badge".$comillas.">",$button["title"]);
                   $button["title"] = str_replace("</strong>]","</span>",$button["title"]);
                   echo $button["title"];
                 } else {
                   echo $button["title"];
                 }  

                 echo '</span>
					</a>
				</li>';
	}

	
}

// Generate a strip of buttons.
function template_button_strip($button_strip, $direction = 'top', $strip_options = array())
{
	global $settings, $context, $txt, $scripturl;

	$comillas = "'";

	if (!is_array($strip_options))
		$strip_options = array();

	// List the buttons in reverse order for RTL languages.
	if ($context['right_to_left'])
		$button_strip = array_reverse($button_strip, true);

	// Create the buttons...
	$buttons = array();
	foreach ($button_strip as $key => $value)
	{	
		if ((!isset($value['test']) || !empty($context[$value['test']])) && ($key!="print") && ($key!="send") && ($key!="notify")){
			$buttons[] = '
				<a onclick="googleAna('.$comillas.''.$key.'ButtonBoardMenu'.$comillas.');" ' . (isset($value['id']) ? ' id="button_strip_' . $value['id'] . '"' : '') . ' class="btn btn-xs '. ($key=="new_topic" || $key=="reply" ?"btn-danger ".$key."":"btn-info ".$key."") .'" href="' . $value['url'] . '"' . (isset($value['custom']) ? ' ' . $value['custom'] : '') . ' role="button">'.($key=="reply"?'<span style="padding-right: 5px;" class="fa fa-comment-o"></span>':'').''.($key=="new_topic"?'<span style="padding-right: 5px;" class="fa fa-pencil"></span>':'').'<span>' . $txt[$value['text']] . '</span></a>'; 
		}
	}

	// No buttons? No button strip either.
	if (empty($buttons))
		return;

	// Make the last one, as easy as possible.
	$buttons[count($buttons) - 1] = str_replace('<span>', '<span class="last">', $buttons[count($buttons) - 1]);

	echo '
		<div class="buttonlist', !empty($direction) ? ' float' . $direction : '', '"', (empty($buttons) ? ' style="display: none;"' : ''), (!empty($strip_options['id']) ? ' id="' . $strip_options['id'] . '"': ''), '>
			',implode('', $buttons), '
		</div>';
}

//funciones fuera del template
function extraer_imagen($texto){
  $matches = "";
  if(isset($texto)){
    $first2_post_msg = $texto;
    $first_post__msg = $first2_post_msg['body'];
    prepareDisplayContext(true);
    if(isset($first_post__msg)){
      preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*).(jpg|png|gif)/i', $first_post__msg, $matches);
      echo '<!--antes';
      echo print_r($matches);
      echo '-->';
      foreach($matches[0] as $key => $image){
        if(strpos($image, "".$modSettings["pretty_root_url"]."/Smileys/")!==false){
          unset($matches[0][$key]);
          unset($matches[1][$key]);
          unset($matches[2][$key]);
        }
      }//fin foreach
      $matches[0] = array_values($matches[0]);
      $matches[1] = array_values($matches[1]);
      $matches[2] = array_values($matches[2]);
    }//finfirst post msg
  }//fin if texto 
  return $matches;
}


?>