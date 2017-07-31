(function() {
  app.controller('indexCtrl', function($scope, evt) {
    console.log("[IndexCtrl]");
    evt.loading();
    return $("#loginButton").unbind().click(function() {
      console.log("[Login][Button]");
      $("#modal").modal("show");
      $(".modal-title").html(Lang.get("messages.login"));
      $scope.loginbutton = 1;
      return null;
    });
  });

}).call(this);
