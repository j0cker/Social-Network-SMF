(function() {
  app.controller('index', function($scope, evt, $window) {
    console.log("[IndexCtrl]");

    $scope.rowClass = function(key){
         if(key%2== 0){
             return "windowbg2";
         } else {
           return "windowbg";
         }
    }; 

    $scope.init = function(action, request, id_member)
    {  
       if(action!="project"){
         evt.loading();
       } else if(action=="project" && request=="list"){
         evt.getProjects(id_member).then(function (response) {
           if (response.data.response=="true"){
             evt.loading();
             $scope.ProjectsList = response.data.projectsList;
             $scope.ProjectsListComment = "not null";
           } else if(response.data.response=="null") {
             toastr["warning"]("" + response.data.comment);
             evt.loading();
             $scope.ProjectsList = response.data.comment;
             $scope.ProjectsListComment = "null";
           } else {
             toastr["error"]("Error, " + response.data.comment);
             evt.loading();
             $scope.ProjectsList = response.data.comment;
             $scope.ProjectsListComment = "null";
           }
         }, function (response) {
           /*ERROR*/
           toastr["error"]("Error, inténtelo nuevamente.");
           evt.loading();
           $scope.ProjectsList = response.data.comment;
           $scope.ProjectsListComment = "null";
         });
       } else {
         evt.loading();
       }
    };


  });



  app.controller('projectSee', function($scope, evt, $window) {

    $scope.init = function(action, request, id_member, project)
    {   evt.getProject(id_member, project, "4").then(function (response) {
           if (response.data.response=="true"){
             evt.loading();
             $scope.ProjectsList = response.data;
             $("title").html($scope.ProjectsList.project_name);

             $window.founder_list_name = $scope.ProjectsList.founder_list_name;
             $window.mentor_list_name= $scope.ProjectsList.mentor_list_name;
             $window.contributor_list_name = $scope.ProjectsList.contributor_list_name;

             $scope.ProjectsListComment = "not null";
           } else if(response.data.response=="null") {
             toastr["warning"]("" + response.data.comment);
             evt.loading();
             $scope.ProjectsList = response.data.comment;
             $scope.ProjectsListComment = "null";
           } else {
             toastr["error"]("Error, " + response.data.comment);
             evt.loading();
             $scope.ProjectsList = response.data.comment;
             $scope.ProjectsListComment = "null";
           }
       }, function (response) {
           /*ERROR*/
           toastr["error"]("Error, inténtelo nuevamente.");
           evt.loading();
           $scope.ProjectsList = response.data.comment;
           $scope.ProjectsListComment = "null";
       });
    };
  });


  app.controller('project', function($scope, evt, $window) {
    $scope.init = function(action, request, id_member, project)
    {  
       if(request=="modify"){
	       evt.getProject(id_member, project, "4").then(function (response) {
	           if (response.data.response=="true"){
	             evt.loading();
	             $scope.ProjectsList = response.data;
	             
                     //names
                     $window.founder_list_name = $scope.ProjectsList.founder_list_name;
                     $window.mentor_list_name= $scope.ProjectsList.mentor_list_name;
                     $window.contributor_list_name = $scope.ProjectsList.contributor_list_name;

                     //ids
                     $window.founder_list = $scope.ProjectsList.founder_list;
                     $window.mentor_list= $scope.ProjectsList.mentor_list;
                     $window.contributor_list = $scope.ProjectsList.contributor_list;

                     //founded_time
                     $window.founded_time = $scope.ProjectsList.founded_time;
	
	             $scope.ProjectsListComment = "not null";
	           } else if(response.data.response=="null") {
	             toastr["warning"]("" + response.data.comment);
	             evt.loading();
	             $scope.ProjectsList = response.data.comment;
	             $scope.ProjectsListComment = "null";
	           } else {
	             toastr["error"]("Error, " + response.data.comment);
	             evt.loading();
	             $scope.ProjectsList = response.data.comment;
	             $scope.ProjectsListComment = "null";
	           }
	       }, function (response) {
	           /*ERROR*/
	           toastr["error"]("Error, inténtelo nuevamente.");
	           evt.loading();
	           $scope.ProjectsList = response.data.comment;
	           $scope.ProjectsListComment = "null";
	       });
      }
    };
  });

  return;

}).call(this);