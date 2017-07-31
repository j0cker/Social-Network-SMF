<?php
function template_main()
{ 
	global $context, $txt, $settings;

        $comilla = "'";
    
       // Catbg header
	echo '<div class="cat_bar">
   	        <h3 class="catbg text-center">', $txt['ProjectsList_Head'], '</h3>
	</div>

	<script>
	$( document ).ready(function() {
	  
	});
	</script>
	
        <div style="margin-top: 20px;" class="row text-center">
          <div class="col-md-12 col-xs-12 text-center">
            <a href="index.php?action=project">
              <button type="button" class="btn btn-primary">Crear Nuevo Proyecto</button>
            </a>
          </div>
        </div>
        
        <div ng-if="ProjectsListComment=='.$comilla.'null'.$comilla.'" id="contentProjectsList" class="content text-center">
	  // Windowbg2 Content
	  <div class="windowbg2">
  			<span class="topslice"><span></span></span>
                          
                          <% ProjectsList %>  

                        <span class="botslice"><span></span></span>
          </div>
        </div>
                     
        <div ng-repeat="(key,x) in ProjectsList" ng-if="ProjectsListComment!='.$comilla.'null'.$comilla.'" id="contentProjectsList" class="content text-center">     
          <div ng-class="rowClass(key)">
              <span class="topslice"><span></span></span>
                                  <div class="topic_details text-left">
		                    <h5 onclick="googleAna(TituloClickProjectsNewTimeLineFeed);" style="font-size: 25px;"><a href="?action=project;request=see;project=<% x.id_project %>" rel="nofollow"><% x.project_name %></a></h5>
				      <span class="smalltext">Creado por <a href="profile/?u=<% x.created_by %>"><% x.real_name %></a> el <% x.created_time %></span>
		                  </div>

                                  <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                      <img style="width: 300px; border-radius: 15px;" src="<% x.image %>" />
                                    </div>
                                  </div>

                                  <div class="row text-left">
                                    <div class="col-md-12 col-xs-12">
                                      <% x.description %>
                                    </div>
                                  </div>

                                  <div class="row text-center">
                                    <div class="col-md-12 col-xs-12">
                                      
				      <div class="floatright">
					<ul class="reset smalltext quickbuttons">

					  <li ng-if="x.mod_project=='.$comilla.'1'.$comilla.'" onclick="googleAna('.$comillas.'projectListMenu', $txt['modify'], ''.$comillas.');" class="modify_button">
					    <a href="index.php?action=project;request=modify;project=<% x.id_project %>">', $txt['modify'], '</a>
					  </li>
		                        
                                        </ul>
				      </div>
				      
                                    </div>
                                  </div>

                                  <div class="row text-center">
                                    <div class="col-md-12 col-xs-12">
                                      <a onclick="googleAna('.$comilla.'leerMasButtonProjectListNewTimeLineFeed'.$comilla.');" href="?action=project;request=see;project=<% x.id_project %>">
                                        <button class="text-center btn btn-primary" type="button">Leer Más</button>
                                      </a>
                                    </div>
                                  </div>


                                        </div>

  	     <span class="botslice"><span></span></span>
           </div>
	 </div><br />';

}
?>