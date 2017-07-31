(function() {
  app.factory('evt', function($http) {
    return {
      loading: function() {
        $('body').removeClass('load');
        $('body').removeClass('loaded');
        $('body').addClass('load');
        setTimeout(function() {
          return $('body').addClass('loaded');
        }, 1000);
      },
      getProjects: function(id_member) {
        //lista de proyecto

        var url = "proyectos.php";
        var data = $.param({id_member:id_member, action:"3"});
        return $http({
          method: 'POST',
          url: url,
          data: data,
          headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8'}
        });
      },
      getProject: function(id_member, project, action) {
        //obtener un proyecto    

        var url = "proyectos.php";
        var data = $.param({id_member:id_member, id_project:project, action:action});
        return $http({
          method: 'POST',
          url: url,
          data: data,
          headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8'}
        });
      }
    };
  });

}).call(this);