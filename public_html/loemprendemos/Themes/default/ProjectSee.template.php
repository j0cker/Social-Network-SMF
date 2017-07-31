<?php
function template_main()
{ 
	global $context, $txt, $settings;

        $comilla = "'";
    
       
	echo '
        
        <div ng-controller="projectSee" ng-init="init('.$comilla.''.$_GET["action"].''.$comilla.','.$comilla.''.$_GET["request"].''.$comilla.','.$comilla.''.$context["user"]["id"].''.$comilla.', '.$comilla.''.$_GET["project"].''.$comilla.');" class="content text-center">
        
          
	  <div ng-if="ProjectsList=='.$comilla.'null'.$comilla.'" class="cat_bar">
   	        <h3 class="catbg text-center"><% ProjectsList %>  </h3>
	  </div>


	  <div ng-if="ProjectsList!='.$comilla.'null'.$comilla.'" class="cat_bar">
   	        <h3 class="catbg text-center"><% ProjectsList.project_name %>  </h3>
	  </div>

	  <div ng-if="ProjectsList!='.$comilla.'null'.$comilla.'" class="windowbg2">


	          <div class="row text-left">
	            <div class="col-md-12 col-xs-12">
	              <span class="smalltext">Creado por <a href="profile/?u=<% ProjectsList.created_by %>"><% ProjectsList.real_name %></a> el <% ProjectsList.created_time %></span>
	            </div>
	          </div>

	          <div class="row">
	            <div class="col-md-12 col-xs-12">
	              <img style="width: 300px; border-radius: 15px;" src="<% ProjectsList.image %>" />
	            </div>
	          </div>

	          <div class="row text-left">
	            <div class="col-md-12 col-xs-12">
	              <b>Descripcion:</b>
	            </div>
	          </div>

	          <div class="row text-left">
	            <div class="col-md-12 col-xs-12">
	              <% ProjectsList.description %>
	            </div>
	          </div>

	          <div ng-if="ProjectsList.location!='.$comilla.''.$comilla.'" class="row text-left">
	            <div class="col-md-12 col-xs-12">
	              <b>Ubicación: </b> <% ProjectsList.location %>
                    </div>
	          </div> 

	          <div ng-if="ProjectsList.location=='.$comilla.''.$comilla.'" class="row text-left">
	            <div class="col-md-12 col-xs-12">
	              <b>Ubicación: </b> por definirse
                    </div>
	          </div>

	          <div class="row text-left">
	            <div class="col-md-12 col-xs-12">
	              <b>Categoría: </b><% ProjectsList.category %>
	            </div>
	          </div>

	          <div class="row text-left">
	            <div class="col-md-12 col-xs-12">
	              <b>Fundadores/Socios: </b> 
                      <div ng-repeat="(key,x) in ProjectsList.founder_list_name_array"><a href="profile/?u=<% ProjectsList.founder_list_array[key] %>"><% x %></a></div>
                    </div>
	          </div>

	          <div ng-if="ProjectsList.mentor_list_name !='.$comilla.''.$comilla.'" class="row text-left">
	            <div class="col-md-12 col-xs-12">
	              <b>Mentores: </b> 
                      <div ng-repeat="(key,x) in ProjectsList.mentor_list_name_array"><a href="profile/?u=<% ProjectsList.mentor_list_array[key] %>"><% x %></a></div>
                    </div>
	          </div>

	          <div ng-if="ProjectsList.contributor_list_name !='.$comilla.''.$comilla.'" class="row text-left">
	            <div class="col-md-12 col-xs-12">
	              <b>Contribuidores/Empleados: </b> 
                      <div ng-repeat="(key,x) in ProjectsList.contributor_list_name_array"><a href="profile/?u=<% ProjectsList.contributor_list_array[key] %>"><% x %></a></div>
                    </div>
	          </div>

	          <div ng-if="ProjectsList.founded_time !='.$comilla.''.$comilla.'" class="row text-left">
	            <div class="col-md-12 col-xs-12">
	              <b>Fecha de Fundación: </b> <% ProjectsList.founded_time %>
                    </div>
	          </div>

	          <div ng-if="ProjectsList.founded_time =='.$comilla.''.$comilla.'" class="row text-left">
	            <div class="col-md-12 col-xs-12">
	              <b>Fecha de Fundación: </b> por definirse
                    </div>
	          </div>

	          <div ng-if="ProjectsList.looking_for!='.$comilla.''.$comilla.'" class="row text-left">
	            <div class="col-md-12 col-xs-12">
	              <b>¿Qué está buscando el proyecto/startup?: </b> <% ProjectsList.looking_for %>
                    </div>
	          </div> 

	          <div ng-if="ProjectsList.looking_for=='.$comilla.''.$comilla.'" class="row text-left">
	            <div class="col-md-12 col-xs-12">
	              <b>¿Qué está buscando el proyecto/startup?: </b> por definirse
                    </div>
	          </div>

	          <div ng-if="ProjectsList.employees!='.$comilla.''.$comilla.'" class="row text-left">
	            <div class="col-md-12 col-xs-12">
	              <b>Número de Empleados: </b> <% ProjectsList.employees %>
                    </div>
	          </div> 

	          <div ng-if="ProjectsList.employees=='.$comilla.''.$comilla.'" class="row text-left">
	            <div class="col-md-12 col-xs-12">
	              <b>¿Qué está buscando el proyecto/startup?: </b> por definirse
                    </div>
	          </div>

	          <div class="row text-center">

	            <div class="col-md-2 col-xs-0">
                    </div>

	            <div ng-if="ProjectsList.website!='.$comilla.''.$comilla.'" class="col-md-2 col-xs-3">
	              <a href="http://<% ProjectsList.website %>"><img style="width: 50px;" src="' . $settings['images_url'] . '/www_sm.gif" /></a>
                    </div>

	            <div ng-if="ProjectsList.facebook_fanpage!='.$comilla.''.$comilla.'" class="col-md-2 col-xs-3">
	              <a href="https://facebook.com/<% ProjectsList.facebook_fanpage %>"><img style="width: 50px;" src="' . $settings['images_url'] . '/facebook.png" /></a>
                    </div>

	            <div ng-if="ProjectsList.twitter!='.$comilla.''.$comilla.'" class="col-md-2 col-xs-3">
	              <a href="https://twitter.com/<% ProjectsList.twitter %>"><img style="width: 70px;" src="' . $settings['images_url'] . '/twitter.png" /></a>
                    </div>

	            <div ng-if="ProjectsList.linkedin!='.$comilla.''.$comilla.'" class="col-md-2 col-xs-3">
	              <a href="https://linkedin.com/<% ProjectsList.linkedin %>"><img style="width: 70px;" src="' . $settings['images_url'] . '/linkedin.jpg" /></a>
                    </div>

	            <div class="col-md-2 col-xs-0">
                    </div>

	          </div>

	          <div class="row text-center">

	            <div class="col-md-2 col-xs-0">
                    </div>

	            <div ng-if="ProjectsList.app_android!='.$comilla.''.$comilla.'" class="col-md-4 col-xs-6">
	              <a href="https://play.google.com/store/apps/details?id=<% ProjectsList.app_android %>"><img style="width: 100px;" src="' . $settings['images_url'] . '/app-store.png" /></a>
                    </div>

	            <div ng-if="ProjectsList.app_ios!='.$comilla.''.$comilla.'" class="col-md-4 col-xs-6">
	              <a href="https://itunes.apple.com/<% ProjectsList.app_ios %>"><img style="width: 100px;" src="' . $settings['images_url'] . '/google-play-app-store.png" /></a>
                    </div>

	            <div class="col-md-2 col-xs-0">
                    </div>

	          </div>


                  <div class="row text-center">
                    <div class="col-md-12 col-xs-12">
                      
		      <div class="floatleft">
			<p style="text-align: left;">Si estás interesado en éste proyecto/startup "<% ProjectsList.project_name %>" te recomendamos a través de ésta página entrar al perfil de los fundadores y mandarles un mensaje.</p>
		      </div>
		      
                    </div>
                  </div>


                  <div class="row text-center">
                    <div class="col-md-12 col-xs-12">
                      
		      <div class="floatright">
			<ul class="reset smalltext quickbuttons">

			  <li ng-if="ProjectsList.mod_project=='.$comilla.'1'.$comilla.'" onclick="googleAna('.$comillas.'projectMenu', $txt['modify'], ''.$comillas.');" class="modify_button">
			    <a href="?action=project;request=modify;project=<% ProjectsList.id_project %>">', $txt['modify'], '</a>
			  </li>
                        
                        </ul>
		      </div>
		      
                    </div>
                  </div>

          
	  </div>

     
	</div>';

}
?>