app.controller 'ctrl', ($scope, evt, $window) ->
    console.log "[IndexCtrl]"

    evt.loading();

    if getCookie("email")
        $("#loginForm #email").val getCookie("email");
    
    if getCookie("pass")
        $("#loginForm #password").val CryptoJS.AES.decrypt(getCookie("pass"), Lang.get("messages.keyPass")).toString(CryptoJS.enc.Utf8);
    
    #Subscribe

    $('#siteFooterSubscribeForm #siteFooterSubscribeFormEmail').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
        translation: {
            "A": { pattern: /[\w@\-.+]/ }
        }
    });

    $("#siteFooterSubscribeForm").validate({
        'rules': {
            # compound rule
            'email': {
                'required': true,
                'email': true
            }
        }, 
        'messages': {
            'email': Lang.get("messages.mailForm")
        },
        'errorPlacement': (error, element) -> 
            console.log "Validate: Error"
            element.css "width","100%"
            div = $(element).closest '.input-group'
            $(div).after error
        ,
        'submitHandler': (form) ->
            ga 'subscriber button', 'event', 'Mensaje Normal', 'click', 'Problem Statement'
            #entra cuando todo está bien sin errores, pero anteriormente debes de hacer un $("#registerButtonSubmit").submit();
            console.log "Validate: Submit Handler"
            #$('#siteFooterSubscribeForm #siteFooterSubscribeFormEmail').val("");
            #$("#subscribeSubmit").submit();
            #form.submit();
            evt.loading();
            evt.subscribe($("#siteFooterSubscribeForm #url").val(), $('#siteFooterSubscribeForm #siteFooterSubscribeFormEmail').val(), $window.window.urlReferral).then (response) ->
                #success
                if(response.data.success==Lang.get('messages.successTrue'))
                  toastr.success(Lang.get("messages.subscribeSuccess"), $('#siteFooterSubscribeForm #siteFooterSubscribeFormEmail').val());		   
                else
                  toastr.info(Lang.get("messages.errorsBDRepeat"), '');		   
                return
            , (response) ->
                #ERROR
                toastr.error(Lang.get "messages.errorsBD", "ERROR");
                return
        , 
        'success': (label) ->
            #entra cuando un input ya está bien para el validador
            label.addClass("valid").text("Ok! " + Lang.get("messages.subscribersNot"));
    });

    $scope.loginButton = false
    $scope.registerButton = false
    $scope.sendLinkPassButton = false

    #register form mask with 50 chars
    $('#registerForm #name').mask 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'
    $('#registerForm #email').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
        translation: {
            "A": { pattern: /[\w@\-.+]/ }
        }
    });

    $("#registerForm").validate({
        'rules': {
            # simple rule, converted to {required:true}
            'name': "required",
            # compound rule
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
        'errorPlacement': (error, element) -> 
            console.log "Validate: Error"
            element.css "width","100%"
            div = $(element).closest '.input-group'
            $(div).after error
        ,
        'submitHandler': (form) ->
            #entra cuando todo está bien sin errores, pero anteriormente debes de hacer un $("#registerButtonSubmit").submit();
            console.log "Validate: Submit Handler"
            #$("#registerButtonSubmit").submit(); no puede ir ésto aquí se hace un loop
            form.submit();
        , 
        'success': (label) ->
            #entra cuando un input ya está bien para el validador
            label.addClass("valid").text("Ok!");
    });
    
    $("#registerButtonSubmit").unbind().click ->
        console.log "[Register][Button][Submit]"
        #$('#registerForm').valid() #it is doing automatically
        $("#registerButtonSubmit").submit(); #is going to validate first before enter to submitHandler
        return

    $("#registerButtonFooter").unbind().click ->
        console.log "[Register][Button][Footer]"
        $("#modal").modal "show"
        $scope.loginButton = false
        $scope.registerButton = true
        $scope.sendLinkPassButton = false
        $scope.$apply(); #this triggers a $digest
        $(".modal-title").html Lang.get "messages.register"
        return

    $("#registerButton").unbind().click ->
        console.log "[Register][Button]"
        $("#modal").modal "show"
        $scope.loginButton = false
        $scope.registerButton = true
        $scope.sendLinkPassButton = false
        $scope.$apply(); #this triggers a $digest
        $(".modal-title").html Lang.get("messages.register")
        return

    $('#loginForm #email').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
        translation: {
            "A": { pattern: /[\w@\-.+]/ }
        }
    });

    $("#loginForm").validate({
        'rules': {
            # compound rule
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
            'email': Lang.get "messages.mailForm"
        },
        'errorPlacement': (error, element) -> 
            console.log "Validate: Error"
            element.css "width","100%"
            div = $(element).closest '.input-group'
            $(div).after error
        ,
        'submitHandler': (form) ->
            #entra cuando todo está bien sin errores, pero anteriormente debes de hacer un $("#registerButtonSubmit").submit();
            console.log "Validate: Submit Handler"
            #$("#registerButtonSubmit").submit(); no puede ir ésto aquí se hace un loop
            form.submit();
        , 
        'success': (label) ->
            #entra cuando un input ya está bien para el validador
            label.addClass("valid").text("Ok!");
    });

    $("#loginButtonSubmit").unbind().click ->
        console.log "[Login][Button][Submit]"

        if $("#loginForm #remember").prop "checked"
            setCookie("pass",CryptoJS.AES.encrypt($("#loginForm #password").val(), Lang.get "messages.keyPass"),1)
            setCookie("email",$("#loginForm #email").val(),1) 
            

        #$('#registerForm').valid() #it is doing automatically
        $("#loginButtonSubmit").submit(); #is going to validate first before enter to submitHandler
        return

    $("#loginButtonFooter").unbind().click ->
        console.log "[Login][Button][Footer]"
        $("#modal").modal "show"
        $scope.loginButton = true
        $scope.registerButton = false
        $scope.sendLinkPassButton = false
        $scope.$apply(); #this triggers a $digest
        $(".modal-title").html Lang.get("messages.login")
        return

    $("#loginButton").unbind().click ->
        console.log "[Login][Button]"
        $("#modal").modal "show"
        $scope.loginButton = true
        $scope.registerButton = false
        $scope.sendLinkPassButton = false
        $scope.$apply(); #this triggers a $digest
        $(".modal-title").html Lang.get("messages.login")
        return

    #sendLinkPass

    $('#sendLinkPassForm #email').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
        translation: {
            "A": { pattern: /[\w@\-.+]/ }
        }
    });

    $("#sendLinkPassForm").validate({
        'rules': {
            # compound rule
            'email': {
                'required': true,
                'email': true
            }
        }, 
        'messages': {
            'email': Lang.get "messages.mailForm"
        },
        'errorPlacement': (error, element) -> 
            console.log "Validate: Error"
            element.css "width","100%"
            div = $(element).closest '.input-group'
            $(div).after error
        ,
        'submitHandler': (form) ->
            #entra cuando todo está bien sin errores, pero anteriormente debes de hacer un $("#registerButtonSubmit").submit();
            console.log "Validate: Submit Handler"
            #$("#registerButtonSubmit").submit(); no puede ir ésto aquí se hace un loop
            form.submit();
        , 
        'success': (label) ->
            #entra cuando un input ya está bien para el validador
            label.addClass("valid").text("Ok!");
    });

    $("#sendLinkPassButtonSubmit").unbind().click ->
        console.log "[sendLinkPass][Button][Submit]"
        #$('#registerForm').valid() #it is doing automatically
        $("#sendLinkPassButtonSubmit").submit(); #is going to validate first before enter to submitHandler
        return

    $("#loginForm #sendLinkPassButton").unbind().click ->
        console.log "[sendLinkPass][Login][Button]"
        $("#modal").modal "show"
        $scope.loginButton = false
        $scope.registerButton = false
        $scope.sendLinkPassButton = true
        $scope.$apply(); #this triggers a $digest
        $(".modal-title").html Lang.get("messages.ResetPassword")
        return

    $("#registerForm #sendLinkPassButton").unbind().click ->
        console.log "[sendLinkPass][Register][Button]"
        $("#modal").modal "show"
        $scope.loginButton = false
        $scope.registerButton = false
        $scope.sendLinkPassButton = true
        $scope.$apply(); #this triggers a $digest
        $(".modal-title").html Lang.get("messages.ResetPassword")
        return

    #ResetPassword View

    $('#resetForm #email').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
        translation: {
            "A": { pattern: /[\w@\-.+]/ }
        }
    });

    $("#resetForm").validate({
        'rules': {
            # compound rule
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
            'email': Lang.get "messages.mailForm"
        },
        'errorPlacement': (error, element) -> 
            console.log "Validate: Error"
            element.css "width","100%"
            div = $(element).closest '.input-group'
            $(div).after error
        ,
        'submitHandler': (form) ->
            #entra cuando todo está bien sin errores, pero anteriormente debes de hacer un $("#registerButtonSubmit").submit();
            console.log "Validate: Submit Handler"
            #$("#registerButtonSubmit").submit(); no puede ir ésto aquí se hace un loop
            form.submit();
        , 
        'success': (label) ->
            #entra cuando un input ya está bien para el validador
            label.addClass("valid").text("Ok!");
    });

    $("#resetButtonSubmit").unbind().click ->
        console.log "[Reset][Button][Submit]"
        #$('#registerForm').valid() #it is doing automatically
        $("#resetButtonSubmit").submit(); #is going to validate first before enter to submitHandler
        return
    
    null

return