<?php
function template_main()
{ 
	global $context, $txt, $settings;

        //redireccionar al login si entra un guest al index
        if(!$context['user']['is_logged']){
            header("Location: /login/?referral=".$_GET['action']."");
        }
    
       // Catbg header
	echo '<div class="cat_bar">
	          ';
	          if($_GET["request"]=="modify"){
	            echo '
	            <h3 class="catbg text-center">', $txt['ProjectsListMod'], '</h3>
	            ';
	          } else {
	            echo '
	            <h3 class="catbg text-center">', $txt['Project_Head'], '</h3>
	            ';
	          }
	          echo '
   			
	</div>';

        $comilla = "'";
	
	echo '
	<script>
	var imageUrlProject = "";
        function loading(){

          $("body").removeClass("load");
          $("body").removeClass("loaded");
          $("body").addClass("load");
        }
        function loaded(){
          $("body").removeClass("load");
          $("body").removeClass("loaded");
          $("body").addClass("loaded");

        }

        function empecemos(){
          $("#rocketModal").modal("hide");
        }

        function modificarProyecto(){
          loading();
          if(imageUrlProject == "")
            imageUrlProject = $("#imagenLogotipo").attr("src");

	  googleAna("modificarProyectoFormButton");
	  
	  var nameProject = $("#nameProject").val();
	  console.log("nameProject: " + nameProject);
	  var location= $("#location").val();
	  console.log("location: " + location);
	  var description = $("#description ").val();
	  console.log("description : " + description + " length: "+ description.length);
	  
	  var categoryX = document.getElementById("category").selectedIndex;
	  var categoryY = document.getElementById("category").options;
	  var category = categoryY[categoryX].value;
	  if(category =="Otro"){
	    if($("#otroCategoryTxt").val())
	      category = "Otro " + $("#otroCategoryTxt").val();
	    else
	      category = "";
	  } else if (category =="selecciona"){
	    category = "";
	  }
	  console.log("category : " + category );
	  
	  var foundedTime= $("#foundedTime").val();
	  console.log("foundedTime: " + foundedTime);
	  
	  var lookingForX= document.getElementById("lookingFor").selectedIndex;
	  var lookingForY= document.getElementById("lookingFor").options;
	  var lookingFor= lookingForY[lookingForX].value;
	  if(lookingFor=="Otro"){
	    if($("#otroLookingForTxt").val())
	      lookingFor = "Otro " + $("#otroLookingForTxt").val();
	    else
	      lookingFor = "";
	  } else if (lookingFor =="selecciona"){
	    lookingFor = "";
	  }
	  console.log("lookingFor: " + lookingFor );
	  
	  var employeesX= document.getElementById("employees").selectedIndex;
	  var employeesY= document.getElementById("employees").options;
	  var employees= employeesY[employeesX].value;
	  if(employees=="selecciona"){
	    employees = "";
	  }
	  console.log("employees: " + employees);
	 
	  var founderList= $("#founderList").val();
	  console.log("founderList: " + founderList);
	  var mentorList= $("#mentorList").val();
	  console.log("mentorList: " + mentorList);
	  var contributorList= $("#contributorList").val();
	  console.log("contributorList: " + contributorList);
	  var website= $("#website").val();
	  console.log("website: " + website);
	  var facebookFanPage= $("#facebookFanPage").val();
	  console.log("facebookFanPage: " + facebookFanPage);
	  var twitter= $("#twitter").val();
	  console.log("twitter: " + twitter);
	  var linkedin= $("#linkedin").val();
	  console.log("linkedin: " + linkedin);
	  var androidApp= $("#androidApp").val();
	  console.log("androidApp: " + androidApp);
	  var iosApp= $("#iosApp").val();
	  console.log("iosApp: " + iosApp);
	  var emailList= $("#emailList").val();
	  console.log("emailList: " + emailList);
	  
	  if(nameProject==""){
	    toastr["error"]("Campo Obligatorio: Llenar el Nombre del Proyecto/Startup.");
            loaded();
	  } else if(imageUrlProject==""){
	    toastr["error"]("Campo Obligatorio: Subir el Logo del Proyecto/Startup.");
            loaded();
	  } else if(description=="" || description.length<250){
	    toastr["error"]("Campo Obligatorio: Llenar la Descripción mínimo 250 caracteres.");
            loaded();
	  } else if(location==""){
	    toastr["error"]("Campo Obligatorio: Llenar la Ubicación del proyecto/Startup.");
            loaded();
	  } else if(category==""){
	    toastr["error"]("Campo Obligatorio: Llenar la Categoria del Proyecto/Startup.");
            loaded();
	  } else if(employees==""){
	    toastr["error"]("Campo Obligatorio: Llenar Empleados del Proyecto/Startup.");
            loaded();
	  } else if(founderList==""){
	    toastr["error"]("Campo Obligatorio: Llenar Lista de Fundadores (Min 1) del Proyecto/Startup.");
            loaded();
	  } else {
	    console.log("Modifica Proyecto");
	    $.ajax({  	url:   "proyectos.php",
			type:  "POST",
			data:   {nameProject:nameProject, imageUrlProject:imageUrlProject, location:location, description:description, category:category, foundedTime:foundedTime, lookingFor:lookingFor, employees:employees, founderList:founderList, mentorList:mentorList, contributorList:contributorList, website:website, facebookFanPage:facebookFanPage, twitter:twitter, linkedin:linkedin, androidApp:androidApp, iosApp:iosApp, emailList:emailList, action:"2", id_member:'; echo $context["user"]["id"]; echo ', id_project:"'; echo $_GET["project"]; echo '"},
			success:  function (response) {
			        response = JSON.parse(response);
				console.log("[Ajax][Guardar Proyecto]");
				console.log(response);
				console.log(response.response);
				if(response.response=="true"){
					toastr["success"]("El proyecto/startup ha sido Modificado Correctamente.");
                                        if(emailList!=""){
					  toastr["success"]("Invitaciones Mandadas.");
                                        }
                                        setTimeout(function(){ 
                                          window.location = "/?action=project;request=see;project='; echo $_GET["project"]; echo '";
                                        }, 1000);

				} else {
					toastr["error"]("Error: " + response.comment);
                                 }
                                 loaded();
			},
			error: function (){
			        toastr["error"]("Error, inténtelo nuevamente..");
                                loaded();
			}
	    });//fin ajax
	  }
	  
	}//fin modificar proyecto


	function crearProyecto(){
          loading();
	  googleAna("crearProyectoFormButton");
	  
	  var nameProject = $("#nameProject").val();
	  console.log("nameProject: " + nameProject);
	  var location= $("#location").val();
	  console.log("location: " + location);
	  var description = $("#description ").val();
	  console.log("description : " + description + " length: "+ description.length);
	  
	  var categoryX = document.getElementById("category").selectedIndex;
	  var categoryY = document.getElementById("category").options;
	  var category = categoryY[categoryX].value;
	  if(category =="Otro"){
	    if($("#otroCategoryTxt").val())
	      category = "Otro " + $("#otroCategoryTxt").val();
	    else
	      category = "";
	  } else if (category =="selecciona"){
	    category = "";
	  }
	  console.log("category : " + category );
	  
	  var foundedTime= $("#foundedTime").val();
	  console.log("foundedTime: " + foundedTime);
	  
	  var lookingForX= document.getElementById("lookingFor").selectedIndex;
	  var lookingForY= document.getElementById("lookingFor").options;
	  var lookingFor= lookingForY[lookingForX].value;
	  if(lookingFor=="Otro"){
	    if($("#otroLookingForTxt").val())
	      lookingFor = "Otro " + $("#otroLookingForTxt").val();
	    else
	      lookingFor = "";
	  } else if (lookingFor =="selecciona"){
	    lookingFor = "";
	  }
	  console.log("lookingFor: " + lookingFor );
	  
	  var employeesX= document.getElementById("employees").selectedIndex;
	  var employeesY= document.getElementById("employees").options;
	  var employees= employeesY[employeesX].value;
	  if(employees=="selecciona"){
	    employees = "";
	  }
	  console.log("employees: " + employees);
	 
	  var founderList= $("#founderList").val();
	  console.log("founderList: " + founderList);
	  var mentorList= $("#mentorList").val();
	  console.log("mentorList: " + mentorList);
	  var contributorList= $("#contributorList").val();
	  console.log("contributorList: " + contributorList);
	  var website= $("#website").val();
	  console.log("website: " + website);
	  var facebookFanPage= $("#facebookFanPage").val();
	  console.log("facebookFanPage: " + facebookFanPage);
	  var twitter= $("#twitter").val();
	  console.log("twitter: " + twitter);
	  var linkedin= $("#linkedin").val();
	  console.log("linkedin: " + linkedin);
	  var androidApp= $("#androidApp").val();
	  console.log("androidApp: " + androidApp);
	  var iosApp= $("#iosApp").val();
	  console.log("iosApp: " + iosApp);
	  var emailList= $("#emailList").val();
	  console.log("emailList: " + emailList);
	  
	  if(nameProject==""){
	    toastr["error"]("Campo Obligatorio: Llenar el Nombre del Proyecto/Startup.");
            loaded();
	  } else if(imageUrlProject==""){
	    toastr["error"]("Campo Obligatorio: Subir el Logo del Proyecto/Startup.");
            loaded();
	  } else if(description=="" || description.length<250){
	    toastr["error"]("Campo Obligatorio: Llenar la Descripción mínimo 250 caracteres.");
            loaded();
	  } else if(location==""){
	    toastr["error"]("Campo Obligatorio: Llenar la Ubicación del proyecto/Startup.");
            loaded();
	  } else if(category==""){
	    toastr["error"]("Campo Obligatorio: Llenar la Categoria del Proyecto/Startup.");
            loaded();
	  } else if(employees==""){
	    toastr["error"]("Campo Obligatorio: Llenar Empleados del Proyecto/Startup.");
            loaded();
	  } else if(founderList==""){
	    toastr["error"]("Campo Obligatorio: Llenar Lista de Fundadores (Min 1) del Proyecto/Startup.");
            loaded();
	  } else {
	    console.log("Guarda Proyecto");
	    $.ajax({  	url:   "proyectos.php",
			type:  "POST",
			data:   {nameProject:nameProject, imageUrlProject:imageUrlProject, location:location, description:description, category:category, foundedTime:foundedTime, lookingFor:lookingFor, employees:employees, founderList:founderList, mentorList:mentorList, contributorList:contributorList, website:website, facebookFanPage:facebookFanPage, twitter:twitter, linkedin:linkedin, androidApp:androidApp, iosApp:iosApp, emailList:emailList, action:"1", id_member:'; echo $context["user"]["id"]; echo '},
			success:  function (response) {
			        response = JSON.parse(response);
				console.log("[Ajax][Guardar Proyecto]");
				console.log(response);
				console.log(response.response);
				if(response.response=="true"){
					toastr["success"]("Tu proyecto/startup se ha dado de alta.");
                                        window.location = "/?action=project;request=list";
				} else {
					toastr["error"]("" + response.comment);
                                }
                                loaded();
			},
			error: function (){
			        toastr["error"]("Error, inténtelo nuevamente..");
                                loaded();
			}
	    });//fin ajax
	  }//fin else
	  
	}//fin crearProyecto


	function lookingForChange(){
	  var lookingForX= document.getElementById("lookingFor").selectedIndex;
	  var lookingForY= document.getElementById("lookingFor").options;
	  var lookingFor= lookingForY[lookingForX].value;
	  if(lookingFor=="Otro"){
	    $("#otroLookingFor").css("display","");
	  } else {
	    $("#otroLookingFor").css("display","none");
	  }
	}


	function categoryChange(){
	  var categoryX = document.getElementById("category").selectedIndex;
	  var categoryY = document.getElementById("category").options;
	  var category = categoryY[categoryX].value;
	  if(category =="Otro"){
	    $("#otroCategory").css("display","");
	  } else {
	    $("#otroCategory").css("display","none");
	  }
	}

        function subirImageProject(){
	  ga("send", "event", "Subir Imágen Crear Proyecto", "click", "Subir Imágen Crear Proyecto");
	  $("#cargandoFileImage2").css("display","");
	  var rFilter = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;
	  if (document.getElementById("fileImageProject").files.length === 0) { return; }
	  var oFile = document.getElementById("fileImageProject").files[0];
	  if (!rFilter.test(oFile.type)) 
	  { toastr["warning"]("Error, archivo no soportado. Suba otro tipo de archivo");
		$("#cargandoFileImage2").css("display","none");
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
				  $("#imagePreview2").html("<img width=50 src='.$modSettings["pretty_root_url"].'/bibliotecaImages/"+response+" />");
				  imageUrlProject = "'.$modSettings["pretty_root_url"].'/bibliotecaImages/"+response+"";
				  
				} else if(response.indexOf("ERROR Tamaño")!="-1") {
				  toastr["error"]("ERROR: imágen muy pesada");
				} else {
				  toastr["error"]("Error, inténtelo nuevamente...");
				}
				$("#cargandoFileImage2").css("display","none");
			},
			error: function (){
			        toastr["error"]("Error, inténtelo nuevamente....");
				$("#cargandoFileImage2").css("display","none");
			}
	  });//fin ajax
	}//fin subirimage
	</script>
	';

	// Windowbg2 Content
	echo '<div ng-controller="project" ng-init="init('.$comilla.''.$_GET["action"].''.$comilla.','.$comilla.''.$_GET["request"].''.$comilla.','.$comilla.''.$context["user"]["id"].''.$comilla.', '.$comilla.''.$_GET["project"].''.$comilla.');" class="windowbg2">';
        if($_GET["request"]=="modify"){
          echo '
          <div ng-if="ProjectsList.mod_project=='.$comilla.'1'.$comilla.'">
  			<span class="topslice"><span></span></span>
  		  		<div class="content">
  		  		
			          <b></b>
  		  		 
                                </div>
                                <div class="content">

                                  <div class="form-group">
                                    <label style="margin-top: 10px;"><font style="color: red;">* </font>Nombre del Proyecto/Startup: </label>
                                    <input value="<% ProjectsList.project_name %>" type="text" class="form-control" placeholder="Nombre del Proyecto/Startup" id="nameProject">
                                  </div>

                                  <div class="form-group">
                                    <label><font style="color: red;">* </font>Subir Logo: </label>
                                    <input style="cursor:pointer;" onchange="subirImageProject();" name="file2" type="file" class="form-control" id="fileImageProject">
                                  </div>
                                  <div style="margin-top: 10px; display: none;" id="cargandoFileImage2" class="col-md-12 text-center">
			            <img class="text-center" style="width: 50px;" src="'.$settings["theme_url"].'/images/cargando.gif">
			          </div>
			          <div style="margin-top: 10px;" id="imagePreview2" class="col-md-12 text-center">
			            <img id="imagenLogotipo" style="width: 300px;" src="<% ProjectsList.image %>" />
			          </div>

                                  <div class="form-group">
                                    <label><font style="color: red;">* </font>Ubicación (País, Ciudad, Dirección): </label>
                                    <input value="<% ProjectsList.location %>" type="text" class="form-control" placeholder="País, Ciudad, Dirección" id="location">
                                  </div>

                                  <div class="form-group">
                                    <label><font style="color: red;">* </font>Descripción: </label>
                                    <textarea placeholder="Propuesta de Valor, Misión, Status del Proyecto, De que se Trata, Que se ha logrado hasta ahorita, etc..." class="form-control" rows="5" id="description"><% ProjectsList.description %></textarea>
                                  </div>

                                  <div class="form-group">
                                    <label><font style="color: red;">* </font>Categoría del Proyecto/Startup: </label>
                                    <select onchange="categoryChange();" class="form-control" id="category">
                                      <option name="<% ProjectsList.category %>" value="<% ProjectsList.category %>" selected><% ProjectsList.category %></option>
                                      <option name="'; echo $txt['select_default_value']; echo '" value="'; echo $txt['select_default_value']; echo '">Seleciona una Opción</option>
                                                ';
                                                foreach($txt['category'] AS $key => $category){
                                                  echo '
                                                  <option name="'.$category.'" value="'.$category.'">'.$category.'</option>
                                                  ';
                                                }
                                                echo '
                                    </select>
                                    <div style="display: none;" id="otroCategory">
                                      <label>Sea más Específico con la Categoría de su Proyecto: </label>
                                      <input type="text" class="form-control" placeholder="Sea más Específico" id="otroCategoryTxt">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label>Fecha de Fundación: </label>
                                    <input type="date" class="form-control datepicker" id="foundedTime">
                                    <p>Al dejarlo vacío se considerará que está por definirse.</p>
                                  </div>

                                  <div class="form-group">
                                    <label>¿Qué Busca éste Proyecto/Startup?: </label>
                                    <select onchange="lookingForChange();" class="form-control" id="lookingFor">
                                      <option name="<% ProjectsList.looking_for %>" value="<% ProjectsList.looking_for %>" selected><% ProjectsList.looking_for %></option>
                                      <option name="'; echo $txt['select_default_value']; echo '" value="'; echo $txt['select_default_value']; echo '">Seleciona una Opción o no selecciones nada</option>
                                                ';
                                                foreach($txt['lookingFor'] AS $key => $lookingFor){
                                                  echo '
                                                  <option name="'.$lookingFor.'" value="'.$lookingFor.'">'.$lookingFor.'</option>
                                                  ';
                                                }
                                                echo '
                                    </select>
                                    <p>Al dejarlo vacío se considerará que está por definirse.</p>
                                    <div style="display: none;" id="otroLookingFor">
                                      <label>Sea más Específico con lo que Busca su Proyecto: </label>
                                      <input type="text" class="form-control" placeholder="Sea más Específico" id="otroLookingForTxt">
                                    </div>
                                    
                                  </div>

                                  <div class="form-group">
                                    <label><font style="color: red;">* </font>Número de Empleados: </label>
                                    <select class="form-control" id="employees">
                                      <option name="<% ProjectsList.employees %>" value="<% ProjectsList.employees %>" selected><% ProjectsList.employees %></option>
                                      <option name="'; echo $txt['select_default_value']; echo '" value="'; echo $txt['select_default_value']; echo '">Seleciona una Opción</option>
                                                ';
                                                foreach($txt['employees'] AS $key => $employees){
                                                  echo '
                                                  <option name="'.$employees.'" value="'.$employees.'">'.$employees.'</option>
                                                  ';
                                                }
                                                echo '
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <label><font style="color: red;">* </font>Lista de Fundadores (Actuales): </label>
                                    <input type="text" class="form-control" placeholder="por Nombre de Usuario (Min 1)" id="founderList">
                                    <p>Mínimo uno, (Agrégalos por Nombre de Usuario, solo disponible para usuarios en Loemprendemos, si no está registrada la persona en loemprendemos, puedes invitarla más abajo).<br />Te puedes Agregar (Sólo Si Aplica). Únicamente los fundadores o socios podrán editar tu proyecto. </p><p>Al dejarlo vacío se considerará que está por definirse.</p>
                                  </div>

                                  <div class="form-group">
                                    <label>Lista de Mentores (Actuales): </label>
                                    <input type="text" class="form-control" placeholder="por Nombre de Usuario" id="mentorList">
                                    <p>(Agrégalos por Nombre de Usuario, solo disponible para usuarios en Loemprendemos, si no está registrada la persona en loemprendemos, puedes invitarla más abajo).<br />Te puedes Agregar (Sólo Si Aplica). </p><p>Al dejarlo vacío se considerará que está por definirse.</p>
                                  </div>

                                  <div class="form-group">
                                    <label>Lista de Contribuidores o Empleados (Actuales): </label>
                                    <input type="text" class="form-control" placeholder="por Nombre de Usuario" id="contributorList">				
					<script>
					$( document ).ready(function() {
						console.log("Modify");
							
						$(".datepicker").pickadate({
						    format: "dd-mm-yyyy",
						    selectMonths: true, // Creates a dropdown to control month
						    selectYears: 100 // Creates a dropdown of 15 years to control year
						});
						
                                                if(window.founded_time!=""){
							var $input = $(".datepicker").pickadate();
                                                        $input.val(window.founded_time);
                                                }

						var allmembers = $.getJSON("getAllMembers.php");
						
						var founderList = $("#founderList");
						$("#founderList").tagsinput({
						  tagClass: function(item) {
						      var random = Math.floor((Math.random() * 4));
						      if(random==0)
						        return "label label-info";
						      if(random==1)
						        return "label label-warning";
						      if(random==2)
						        return "label label-danger";
						      if(random==3)
						        return "label label-success";
						  },
						  itemValue: "value",
						  itemText: "text",
						  typeahead: { 
						    source: function(query) {
						      return allmembers;
						    }
						  }
						});
						
						var contributorList = $("#contributorList");
						contributorList.tagsinput({
						  tagClass: function(item) {
						      var random = Math.floor((Math.random() * 4));
						      if(random==0)
						        return "label label-info";
						      if(random==1)
						        return "label label-warning";
						      if(random==2)
						        return "label label-danger";
						      if(random==3)
						        return "label label-success";
						  },
						  itemValue: "value",
						  itemText: "text",
						  typeahead: { 
						    source: function(query) {
						      return allmembers;
						    }
						  }
						});
						
						var mentorList = $("#mentorList");
						$("#mentorList").tagsinput({
						  tagClass: function(item) {
						      var random = Math.floor((Math.random() * 4));
						      if(random==0)
						        return "label label-info";
						      if(random==1)
						        return "label label-warning";
						      if(random==2)
						        return "label label-danger";
						      if(random==3)
						        return "label label-success";
						  },
						  itemValue: "value",
						  itemText: "text",
						  typeahead: { 
						    source: function(query) {
						      return allmembers;
						    }
						  }
						});
						
						
						//fill tag inputs
						if(window.founder_list_name && window.founder_list){
						  var founder_list_name = window.founder_list_name.split(",");
                                                  var founder_list = window.founder_list.split(",");
						  for(var i = 0; i< founder_list_name.length; i++)
						    founderList.tagsinput("add", { "value": founder_list[i] , "text":founder_list_name[i] });
						}

						//fill tag inputs
						if(window.mentor_list_name && window.mentor_list){
						  var mentor_list_name = window.mentor_list_name.split(",");
                                                  var mentor_list= window.mentor_list.split(",");
						  for(var i = 0; i< mentor_list_name.length; i++)
						    mentorList.tagsinput("add", { "value": mentor_list[i] , "text":mentor_list_name[i] });
						}

						//fill tag inputs
						if(window.contributor_list_name && window.contributor_list){
						  var contributor_list_name= window.contributor_list_name.split(",");
                                                  var contributor_list = window.founder_list.split(",");
						  for(var i = 0; i< contributor_list_name.length; i++)
						    contributorList.tagsinput("add", { "value": contributor_list[i] , "text":contributor_list_name[i] });
						}
					         
					});
					</script>

                                    <p>(Agrégalos por Nombre de Usuario, solo disponible para usuarios en Loemprendemos, si no está registrada la persona en loemprendemos, puedes invitarla más abajo).<br />Te puedes Agregar (Sólo Si Aplica). </p><p>Al dejarlo vacío se considerará que está por definirse.</p>
                                  </div>
                                
                                  <label for="basic-url">Sitio Web</label>
                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3">http://</span>
                                    <input value="<% ProjectsList.website %>" style="margin: 0 !important;" placeholder="loemprendemos.com o déjalo vacío" id="website" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                  </div>
                                  <p>Al dejarlo vacío se ignorará éste campo.</p>
                                  
                                  <label style="margin-top: 20px;" for="basic-url">Facebook FanPage</label>
                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3">https://facebook.com/</span>
                                    <input value="<% ProjectsList.facebook_fanpage %>" style="margin: 0 !important;" placeholder="loemprendemos o déjalo vacío" id="facebookFanPage" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                  </div>
                                  <p>Al dejarlo vacío se ignorará éste campo.</p>
                                
                                  <label style="margin-top: 20px;" for="basic-url">Twitter</label>
                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3">https://twitter.com/</span>
                                    <input value="<% ProjectsList.twitter %>" style="margin: 0 !important;" placeholder="loemprendemos o déjalo vacío" id="twitter" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                  </div>
                                  <p>Al dejarlo vacío se ignorará éste campo.</p>
                                
                                  <label style="margin-top: 20px;" for="basic-url">Linkedin</label>
                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3">https://linkedin.com/</span>
                                    <input value="<% ProjectsList.linkedin %>" style="margin: 0 !important;" placeholder="company-beta/5597/ o déjalo vacío" id="linkedin" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                  </div>
                                  <p>Al dejarlo vacío se ignorará éste campo.</p>
                                
                                  <label style="margin-top: 20px;" for="basic-url">Android App</label>
                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3">https://play.google.com/store/apps/details?id=</span>
                                    <input value="<% ProjectsList.app_android %>" style="margin: 0 !important;" placeholder="com.ea.game.pvz2_row o déjalo vacío" id="androidApp" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                  </div>
                                  <p>Al dejarlo vacío se ignorará éste campo.</p>
                                
                                  <label style="margin-top: 20px;" for="basic-url">IOS App</label>
                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3">https://itunes.apple.com/</span>
                                    <input value="<% ProjectsList.app_ios %>" style="margin: 0 !important;" placeholder="app/id378458261 o déjalo vacío" id="iosApp" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                  </div>
                                  <p>Al dejarlo vacío se ignorará éste campo.</p>
                  
                                  <div style="margin-top: 20px;" class="form-group">
                                    <label>Invita a Usuario(s) Faltante(s): </label>
                                    <input type="text" class="form-control" placeholder="chucho@hotmail.com, juan@gmail.com, susanito@empresa.com, etc.." id="emailList">
                                    <p>(Agrégalos por Correo Electrónico divididos por comas). Ésto enviará una invitación para que se registren y puedas dar de alta en el proyecto actual a éstos usuarios. </p><p>Al dejarlo vacío se ignorará éste campo.</p>
                                  </div>

                                  <div class="form-group text-center">
                                    <p style="color: red;">* Campos Obligatorios</p>
                                  </div>

                                  <div class="form-group text-center">
                                    <button onclick="modificarProyecto();" style="margin-top: 20px;" type="button" class="btn btn-success text-center">Modificar Proyecto</button>
                                  </div>
                                </div>
 
  			<span class="botslice"><span></span></span>
            </div><!--ng-if-->';
         
        } else {
          echo '
          <div class="text-left" ng-if="ProjectsList.mod_project!='.$comilla.'1'.$comilla.'">		
                          <span class="topslice"><span></span></span>
  		  		<div class="content">
  		  		
			          <b> Aquí podrás añadir los proyectos/startups que tengas o creas que deban de publicarse, los cuales verán los emprendedores, inversionistas, incubadoras, aceleradoras, etc... ¡Empecemos a conectar! </b>
  		  		 
                                </div>
                                <div class="content">

                                  <div class="form-group">
                                    <label style="margin-top: 10px;"><font style="color: red;">* </font>Nombre del Proyecto/Startup: </label>
                                    <input value="" type="text" class="form-control" placeholder="Nombre del Proyecto/Startup" id="nameProject">
                                  </div>

                                  <div class="form-group">
                                    <label><font style="color: red;">* </font>Subir Logo: </label>
                                    <input style="cursor:pointer;" onchange="subirImageProject();" name="file2" type="file" class="form-control" id="fileImageProject">
                                  </div>
                                  <div style="margin-top: 10px; display: none;" id="cargandoFileImage2" class="col-md-12 text-center">
			            <img class="text-center" style="width: 50px;" src="'.$settings["theme_url"].'/images/cargando.gif">
			          </div>
			          <div style="margin-top: 10px;" id="imagePreview2" class="col-md-12 text-center">
			          </div>

                                  <div class="form-group">
                                    <label><font style="color: red;">* </font>Ubicación (País, Ciudad, Dirección): </label>
                                    <input type="text" class="form-control" placeholder="País, Ciudad, Dirección" id="location">
                                  </div>

                                  <div class="form-group">
                                    <label><font style="color: red;">* </font>Descripción: </label>
                                    <textarea placeholder="Propuesta de Valor, Misión, Status del Proyecto, De que se Trata, Que se ha logrado hasta ahorita, etc..." class="form-control" rows="5" id="description"></textarea>
                                  </div>

                                  <div class="form-group">
                                    <label><font style="color: red;">* </font>Categoría del Proyecto/Startup: </label>
                                    <select onchange="categoryChange();" class="form-control" id="category">
                                      <option name="'; echo $txt['select_default_value']; echo '" value="'; echo $txt['select_default_value']; echo '">Seleciona una Opción</option>
                                                ';
                                                foreach($txt['category'] AS $key => $category){
                                                  echo '
                                                  <option name="'.$category.'" value="'.$category.'">'.$category.'</option>
                                                  ';
                                                }
                                                echo '
                                    </select>
                                    <div style="display: none;" id="otroCategory">
                                      <label>Sea más Específico con la Categoría de su Proyecto: </label>
                                      <input type="text" class="form-control" placeholder="Sea más Específico" id="otroCategoryTxt">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label>Fecha de Fundación: </label>
                                    <input type="date" class="form-control datepicker" placeholder="Fecha de Fundación" id="foundedTime">
                                    <p>Al dejarlo vacío se considerará que está por definirse.</p>
                                  </div>

                                  <div class="form-group">
                                    <label>¿Qué Busca éste Proyecto/Startup?: </label>
                                    <select onchange="lookingForChange();" class="form-control" id="lookingFor">
                                      <option name="'; echo $txt['select_default_value']; echo '" value="'; echo $txt['select_default_value']; echo '">Seleciona una Opción o no selecciones nada</option>
                                                ';
                                                foreach($txt['lookingFor'] AS $key => $lookingFor){
                                                  echo '
                                                  <option name="'.$lookingFor.'" value="'.$lookingFor.'">'.$lookingFor.'</option>
                                                  ';
                                                }
                                                echo '
                                    </select>
                                    <p>Al dejarlo vacío se considerará que está por definirse.</p>
                                    <div style="display: none;" id="otroLookingFor">
                                      <label>Sea más Específico con lo que Busca su Proyecto: </label>
                                      <input type="text" class="form-control" placeholder="Sea más Específico" id="otroLookingForTxt">
                                    </div>
                                    
                                  </div>

                                  <div class="form-group">
                                    <label><font style="color: red;">* </font>Número de Empleados: </label>
                                    <select class="form-control" id="employees">
                                      <option name="'; echo $txt['select_default_value']; echo '" value="'; echo $txt['select_default_value']; echo '">Seleciona una Opción</option>
                                                ';
                                                foreach($txt['employees'] AS $key => $employees){
                                                  echo '
                                                  <option name="'.$employees.'" value="'.$employees.'">'.$employees.'</option>
                                                  ';
                                                }
                                                echo '
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <label><font style="color: red;">* </font>Lista de Fundadores (Actuales): </label>
                                    <input type="text" class="form-control" placeholder="por Nombre de Usuario (Min 1)" id="founderList">
                                    <p>Mínimo uno, (Agrégalos por Nombre de Usuario, solo disponible para usuarios en Loemprendemos, si no está registrada la persona en loemprendemos, puedes invitarla más abajo).<br />Te puedes Agregar (Sólo Si Aplica). Únicamente los fundadores o socios podrán editar tu proyecto. </p><p>Al dejarlo vacío se considerará que está por definirse.</p>
                                  </div>

                                  <div class="form-group">
                                    <label>Lista de Mentores (Actuales): </label>
                                    <input type="text" class="form-control" placeholder="por Nombre de Usuario" id="mentorList">
                                    <p>(Agrégalos por Nombre de Usuario, solo disponible para usuarios en Loemprendemos, si no está registrada la persona en loemprendemos, puedes invitarla más abajo).<br />Te puedes Agregar (Sólo Si Aplica). </p><p>Al dejarlo vacío se considerará que está por definirse.</p>
                                  </div>

                                  <div class="form-group">
                                    <label>Lista de Contribuidores o Empleados (Actuales): </label>
                                    <input type="text" class="form-control" placeholder="por Nombre de Usuario" id="contributorList">
								
					<script>
					$( document ).ready(function() {
						console.log("See");

                                                $("#rocketModal").modal("show");					

						$(".datepicker").pickadate({
						    format: "dd-mm-yyyy",
						    selectMonths: true, // Creates a dropdown to control month
						    selectYears: 100 // Creates a dropdown of 15 years to control year
						  });
							  
						  
						var allmembers = $.getJSON("getAllMembers.php");
						
						$("#contributorList").tagsinput({
						  tagClass: function(item) {
						      var random = Math.floor((Math.random() * 4));
						      if(random==0)
						        return "label label-info";
						      if(random==1)
						        return "label label-warning";
						      if(random==2)
						        return "label label-danger";
						      if(random==3)
						        return "label label-success";
						  },
						  itemValue: "value",
						  itemText: "text",
						  typeahead: { 
						    source: function(query) {
						      return allmembers;
						    }
						  }
						});
						
						$("#founderList").tagsinput({
						  tagClass: function(item) {
						      var random = Math.floor((Math.random() * 4));
						      if(random==0)
						        return "label label-info";
						      if(random==1)
						        return "label label-warning";
						      if(random==2)
						        return "label label-danger";
						      if(random==3)
						        return "label label-success";
						  },
						  itemValue: "value",
						  itemText: "text",
						  typeahead: { 
						    source: function(query) {
						      return allmembers;
						    }
						  }
						});
						
						$("#mentorList").tagsinput({
						  tagClass: function(item) {
						      var random = Math.floor((Math.random() * 4));
						      if(random==0)
						        return "label label-info";
						      if(random==1)
						        return "label label-warning";
						      if(random==2)
						        return "label label-danger";
						      if(random==3)
						        return "label label-success";
						  },
						  itemValue: "value",
						  itemText: "text",
						  typeahead: { 
						    source: function(query) {
						      return allmembers;
						    }
						  }
						});
					
						
					});
					</script>

                                    <p>(Agrégalos por Nombre de Usuario, solo disponible para usuarios en Loemprendemos, si no está registrada la persona en loemprendemos, puedes invitarla más abajo).<br />Te puedes Agregar (Sólo Si Aplica). </p><p>Al dejarlo vacío se considerará que está por definirse.</p>
                                  </div>
                                
                                  <label for="basic-url">Sitio Web</label>
                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3">http://</span>
                                    <input style="margin: 0 !important;" placeholder="loemprendemos.com o déjalo vacío" id="website" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                  </div>
                                  <p>Al dejarlo vacío se ignorará éste campo.</p>
                                  
                                  <label style="margin-top: 20px;" for="basic-url">Facebook FanPage</label>
                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3">https://facebook.com/</span>
                                    <input style="margin: 0 !important;" placeholder="loemprendemos o déjalo vacío" id="facebookFanPage" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                  </div>
                                  <p>Al dejarlo vacío se ignorará éste campo.</p>
                                
                                  <label style="margin-top: 20px;" for="basic-url">Twitter</label>
                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3">https://twitter.com/</span>
                                    <input style="margin: 0 !important;" placeholder="loemprendemos o déjalo vacío" id="twitter" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                  </div>
                                  <p>Al dejarlo vacío se ignorará éste campo.</p>
                                
                                  <label style="margin-top: 20px;" for="basic-url">Linkedin</label>
                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3">https://linkedin.com/</span>
                                    <input style="margin: 0 !important;" placeholder="company-beta/5597/ o déjalo vacío" id="linkedin" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                  </div>
                                  <p>Al dejarlo vacío se ignorará éste campo.</p>
                                
                                  <label style="margin-top: 20px;" for="basic-url">Android App</label>
                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3">https://play.google.com/store/apps/details?id=</span>
                                    <input style="margin: 0 !important;" placeholder="com.ea.game.pvz2_row o déjalo vacío" id="androidApp" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                  </div>
                                  <p>Al dejarlo vacío se ignorará éste campo.</p>
                                
                                  <label style="margin-top: 20px;" for="basic-url">IOS App</label>
                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3">https://itunes.apple.com/</span>
                                    <input style="margin: 0 !important;" placeholder="app/id378458261 o déjalo vacío" id="iosApp" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                  </div>
                                  <p>Al dejarlo vacío se ignorará éste campo.</p>
                  
                                  <div style="margin-top: 20px;" class="form-group">
                                    <label>Invita a Usuario(s) Faltante(s): </label>
                                    <input type="text" class="form-control" placeholder="chucho@hotmail.com, juan@gmail.com, susanito@empresa.com, etc.." id="emailList">
                                    <p>(Agrégalos por Correo Electrónico divididos por comas). Ésto enviará una invitación para que se registren y puedas dar de alta en el proyecto actual a éstos usuarios. </p><p>Al dejarlo vacío se ignorará éste campo.</p>
                                  </div>

                                  <div class="form-group text-center">
                                    <p style="color: red;">* Campos Obligatorios</p>
                                  </div>

                                  <div class="form-group text-center">
                                    <button onclick="crearProyecto();" style="margin-top: 20px;" type="button" class="btn btn-success text-center">Crear Proyecto</button>
                                  </div>
                                </div>
 
  			<span class="botslice"><span></span></span>
	  </div>';
        }
        echo '
	  
	</div><!--fin ng-controller-->';
        
		// Welcome
		echo '<div class="modal fade" id="rocketModal" role="dialog" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog modal-sm">
				  <div class="modal-content">
					<div class="modal-header text-center">
					  ¡Lancemos tu Proyecto Ahora!
					</div>
					<div class="modal-body">
                                          Te ayudaremos a que tu proyecto sea exitoso.<br />
                                          <div class="text-center">
                                            <img style="text-align: center; width: 100px;" src="'.$settings["theme_url"].'/images/rocket.png" />
                                          </div><br />

					</div>
					<div style="text-align: center;" class="modal-footer text-center">
                                          <button onclick="empecemos();" type="button" class="btn btn-primary text-center">Empecemos</button>
					</div>
				  </div>
				</div>
			  </div>

                 
	
        <br />';

}
?>