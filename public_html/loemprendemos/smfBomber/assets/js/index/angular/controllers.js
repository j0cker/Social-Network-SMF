(function() {
  app.controller('ctrl', function($scope, evt, $window) {
    console.log("[IndexCtrl]");
    evt.loading();
    if (getCookie("email")) {
      $("#loginForm #email").val(getCookie("email"));
    }
    if (getCookie("pass")) {
      $("#loginForm #password").val(CryptoJS.AES.decrypt(getCookie("pass"), Lang.get("messages.keyPass")).toString(CryptoJS.enc.Utf8));
    }
    $('#siteFooterSubscribeForm #siteFooterSubscribeFormEmail').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
      translation: {
        "A": {
          pattern: /[\w@\-.+]/
        }
      }
    });
    $("#siteFooterSubscribeForm").validate({
      'rules': {
        'email': {
          'required': true,
          'email': true
        }
      },
      'messages': {
        'email': Lang.get("messages.mailForm")
      },
      'errorPlacement': function(error, element) {
        var div;
        console.log("Validate: Error");
        element.css("width", "100%");
        div = $(element).closest('.input-group');
        return $(div).after(error);
      },
      'submitHandler': function(form) {
        $window.ga('send', 'event', 'subscriber button', 'click', 'subscriber button');
        console.log("Validate: Submit Handler");
        evt.loading();
        return evt.subscribe($("#siteFooterSubscribeForm #url").val(), $('#siteFooterSubscribeForm #siteFooterSubscribeFormEmail').val(), $window.window.urlReferral).then(function(response) {
          if (response.data.success === Lang.get('messages.successTrue')) {
            toastr.success(Lang.get("messages.subscribeSuccess"), $('#siteFooterSubscribeForm #siteFooterSubscribeFormEmail').val());
          } else {
            toastr.info(Lang.get("messages.errorsBDRepeat"), '');
          }
        }, function(response) {
          toastr.error(Lang.get("messages.errorsBD", "ERROR"));
        });
      },
      'success': function(label) {
        return label.addClass("valid").text("Ok! " + Lang.get("messages.subscribersNot"));
      }
    });
    $scope.loginButton = false;
    $scope.registerButton = false;
    $scope.sendLinkPassButton = false;
    $('#registerForm #name').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA');
    $('#registerForm #email').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
      translation: {
        "A": {
          pattern: /[\w@\-.+]/
        }
      }
    });
    $("#registerForm").validate({
      'rules': {
        'name': "required",
        'email': {
          'required': true,
          'email': true
        },
        'password': {
          'required': true,
          'minlength': 6
        }
      },
      'messages': {
        'name': Lang.get("messages.nameForm"),
        'password': {
          'required': Lang.get("messages.passwordFormRequired"),
          'minlength': Lang.get("messages.passwordFormMinLength")
        },
        'password-confirm': {
          'required': Lang.get("messages.passwordFormRequired"),
          'minlength': Lang.get("messages.passwordFormMinLength")
        },
        'email': Lang.get("messages.mailForm")
      },
      'errorPlacement': function(error, element) {
        var div;
        console.log("Validate: Error");
        element.css("width", "100%");
        div = $(element).closest('.input-group');
        return $(div).after(error);
      },
      'submitHandler': function(form) {
        console.log("Validate: Submit Handler");
        return form.submit();
      },
      'success': function(label) {
        return label.addClass("valid").text("Ok!");
      }
    });
    $("#registerButtonSubmit").unbind().click(function() {
      console.log("[Register][Button][Submit]");
      $("#registerButtonSubmit").submit();
    });
    $("#registerButtonFooter").unbind().click(function() {
      console.log("[Register][Button][Footer]");
      $("#modal").modal("show");
      $scope.loginButton = false;
      $scope.registerButton = true;
      $scope.sendLinkPassButton = false;
      $scope.$apply();
      $(".modal-title").html(Lang.get("messages.register"));
    });
    $("#registerButton").unbind().click(function() {
      console.log("[Register][Button]");
      $("#modal").modal("show");
      $scope.loginButton = false;
      $scope.registerButton = true;
      $scope.sendLinkPassButton = false;
      $scope.$apply();
      $(".modal-title").html(Lang.get("messages.register"));
    });
    $('#loginForm #email').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
      translation: {
        "A": {
          pattern: /[\w@\-.+]/
        }
      }
    });
    $("#loginForm").validate({
      'rules': {
        'email': {
          'required': true,
          'email': true
        },
        'password': {
          'required': true,
          'minlength': 6
        }
      },
      'messages': {
        'password': {
          'required': Lang.get("messages.passwordFormRequired"),
          'minlength': Lang.get("messages.passwordFormMinLength")
        },
        'email': Lang.get("messages.mailForm")
      },
      'errorPlacement': function(error, element) {
        var div;
        console.log("Validate: Error");
        element.css("width", "100%");
        div = $(element).closest('.input-group');
        return $(div).after(error);
      },
      'submitHandler': function(form) {
        console.log("Validate: Submit Handler");
        return form.submit();
      },
      'success': function(label) {
        return label.addClass("valid").text("Ok!");
      }
    });
    $("#loginButtonSubmit").unbind().click(function() {
      console.log("[Login][Button][Submit]");
      if ($("#loginForm #remember").prop("checked")) {
        setCookie("pass", CryptoJS.AES.encrypt($("#loginForm #password").val(), Lang.get("messages.keyPass")), 1);
        setCookie("email", $("#loginForm #email").val(), 1);
      }
      $("#loginButtonSubmit").submit();
    });
    $("#loginButtonFooter").unbind().click(function() {
      console.log("[Login][Button][Footer]");
      $("#modal").modal("show");
      $scope.loginButton = true;
      $scope.registerButton = false;
      $scope.sendLinkPassButton = false;
      $scope.$apply();
      $(".modal-title").html(Lang.get("messages.login"));
    });
    $("#loginButton").unbind().click(function() {
      console.log("[Login][Button]");
      $("#modal").modal("show");
      $scope.loginButton = true;
      $scope.registerButton = false;
      $scope.sendLinkPassButton = false;
      $scope.$apply();
      $(".modal-title").html(Lang.get("messages.login"));
    });
    $('#sendLinkPassForm #email').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
      translation: {
        "A": {
          pattern: /[\w@\-.+]/
        }
      }
    });
    $("#sendLinkPassForm").validate({
      'rules': {
        'email': {
          'required': true,
          'email': true
        }
      },
      'messages': {
        'email': Lang.get("messages.mailForm")
      },
      'errorPlacement': function(error, element) {
        var div;
        console.log("Validate: Error");
        element.css("width", "100%");
        div = $(element).closest('.input-group');
        return $(div).after(error);
      },
      'submitHandler': function(form) {
        console.log("Validate: Submit Handler");
        return form.submit();
      },
      'success': function(label) {
        return label.addClass("valid").text("Ok!");
      }
    });
    $("#sendLinkPassButtonSubmit").unbind().click(function() {
      console.log("[sendLinkPass][Button][Submit]");
      $("#sendLinkPassButtonSubmit").submit();
    });
    $("#loginForm #sendLinkPassButton").unbind().click(function() {
      console.log("[sendLinkPass][Login][Button]");
      $("#modal").modal("show");
      $scope.loginButton = false;
      $scope.registerButton = false;
      $scope.sendLinkPassButton = true;
      $scope.$apply();
      $(".modal-title").html(Lang.get("messages.ResetPassword"));
    });
    $("#registerForm #sendLinkPassButton").unbind().click(function() {
      console.log("[sendLinkPass][Register][Button]");
      $("#modal").modal("show");
      $scope.loginButton = false;
      $scope.registerButton = false;
      $scope.sendLinkPassButton = true;
      $scope.$apply();
      $(".modal-title").html(Lang.get("messages.ResetPassword"));
    });
    $('#resetForm #email').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
      translation: {
        "A": {
          pattern: /[\w@\-.+]/
        }
      }
    });
    $("#resetForm").validate({
      'rules': {
        'email': {
          'required': true,
          'email': true
        },
        'password': {
          'required': true,
          'minlength': 6
        }
      },
      'messages': {
        'password': {
          'required': Lang.get("messages.passwordFormRequired"),
          'minlength': Lang.get("messages.passwordFormMinLength")
        },
        'password-confirm': {
          'required': Lang.get("messages.passwordFormRequired"),
          'minlength': Lang.get("messages.passwordFormMinLength")
        },
        'email': Lang.get("messages.mailForm")
      },
      'errorPlacement': function(error, element) {
        var div;
        console.log("Validate: Error");
        element.css("width", "100%");
        div = $(element).closest('.input-group');
        return $(div).after(error);
      },
      'submitHandler': function(form) {
        console.log("Validate: Submit Handler");
        return form.submit();
      },
      'success': function(label) {
        return label.addClass("valid").text("Ok!");
      }
    });
    $("#resetButtonSubmit").unbind().click(function() {
      console.log("[Reset][Button][Submit]");
      $("#resetButtonSubmit").submit();
    });
    return null;
  });

  return;

}).call(this);
