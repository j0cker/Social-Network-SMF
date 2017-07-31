app.controller 'home', ($scope, evt, $window) ->
    console.log "[HomeCtrl]"

    $('.tooltipped').tooltip({delay: 50});

    evt.loading();

    if !$window.window.Laravel.timezone 
        $("#modal").modal "show"
        $(".modal-title").html Lang.get('messages.welcome') + "" + $window.window.Laravel.name
        evt.timezone($("#configurationForm #timezoneUrl").val()).then (response) ->
            #success
            if(response.data.success==Lang.get('messages.successFalse'))
                toastr.info(Lang.get("messages.errorsBDRepeat"), '');	
                $("#modal").modal "hide"
            else
                console.log response.data

            $scope.timezone = response.data;  
            return
        , (response) ->
            #ERROR
            toastr.error(Lang.get "messages.errorsBD", "ERROR");
            $("#modal").modal "hide"
            return
        evt.language($("#configurationForm #languageUrl").val()).then (response) ->
            #success
            if(response.data.success==Lang.get('messages.successFalse'))
                toastr.info(Lang.get("messages.errorsBDRepeat"), '');	
                $("#modal").modal "hide"
            else
                console.log response.data

            $scope.language = response.data;  
            return
        , (response) ->
            #ERROR
            toastr.error(Lang.get("messages.errorsBD"), "ERROR");
            $("#modal").modal "hide"
            return

         # add the rule here

        $.validator.addMethod "valueNotEquals", (value, element, arg) ->
            return arg != value;
        , "Value must not equal arg."

        $("#configurationForm").validate({
            'rules': {
                # compound rule
                'timezone': {
                    'valueNotEquals': Lang.get('messages.selectTimezone')
                },
                'language': {
                    'valueNotEquals': Lang.get('messages.selectLanguage')
                }
            }, 
            'messages': {
                'timezone': {
                    'valueNotEquals': Lang.get("messages.timezoneForm")
                },
                'language': {
                    'valueNotEquals': Lang.get("messages.languageForm")
                }
            },
            'errorPlacement': (error, element) -> 
                console.log "Validate: Error"
                element.css "width","100%"
                div = $(element).closest '.input-group'
                $(div).append error
            ,
            'submitHandler': (form) ->
                evt.startLoading();
                $("#modal").modal "hide"
                $("#configurationForm #configurationButtonSubmit").css "display","none"
                #entra cuando todo está bien sin errores, pero anteriormente debes de hacer un $("#registerButtonSubmit").submit();
                console.log "Validate: Submit Handler"
                #$("#registerButtonSubmit").submit(); no puede ir ésto aquí se hace un loop
                #form.submit();
                evt.configuration($("#configurationForm #url").val(), $("#configurationForm #timezone").val(), $("#configurationForm #language").val()).then (response) ->
                    #success
                    if(response.data.success==Lang.get('messages.successFalse'))
                        toastr.error(Lang.get("messages.errorsBD"), '');
                    else
                        toastr.success(Lang.get("messages.BDsuccess"), '');
                    evt.stopLoading();
                    window.location = "/";
                    return
                , (response) ->
                    #ERROR
                    toastr.error(Lang.get("messages.errorsBD"), "ERROR");
                    evt.stopLoading();
                    return
            , 
            'success': (label) ->
                #entra cuando un input ya está bien para el validador
                label.addClass("valid").text("Ok!");
        });

        $("#configurationForm #configurationButtonSubmit").unbind().click ->
            console.log "[Modal][Button][Configuration]";
            $("#configurationForm #configurationButtonSubmit").submit();

            return

    return
app.controller 'notsCtrl', ($rootScope, $scope, evt, $filter) ->
    
    return

app.controller 'profile', ($scope, evt, $window) ->
    console.log "[ProfileCtrl]"

    $('.tooltipped').tooltip({delay: 50});

    evt.loading();

    evt.timezone($("#timezoneUrl").val()).then (response) ->
        #success
        if(response.data.success==Lang.get('messages.successFalse'))
            toastr.info(Lang.get("messages.errorsBDRepeat"), '');	
        else
            console.log response.data

        $scope.timezone = response.data;  
        return
    , (response) ->
        #ERROR
        toastr.error(Lang.get "messages.errorsBD", "ERROR");
        return


    evt.language($("#languageUrl").val()).then (response) ->
        #success
        if(response.data.success==Lang.get('messages.successFalse'))
            toastr.info(Lang.get("messages.errorsBDRepeat"), '');	
        else
            console.log response.data

        $scope.language = response.data;  
        return
    , (response) ->
        #ERROR
        toastr.error(Lang.get("messages.errorsBD"), "ERROR");
        return

    #register form mask with 50 chars
    $('#profileForm #name').mask 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'

    $('#profileForm #email').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
        translation: {
            "A": { pattern: /[\w@\-.+]/ }
        }
    });

    $scope.cambiarImagen = (url, url2) ->
        $('body').attr "class","loading"
        #ga('send', 'event', 'Subir Imágen Profile', 'click', 'Subir Imágen Profile');

        rFilter = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;

        console.log("[cambiarImagen][fileImage][Tamaño]: " + document.getElementById("fileImage").files.length);

        if document.getElementById("fileImage").files.length==0
            return

        oFile = document.getElementById("fileImage").files[0]

        if !rFilter.test(oFile.type)
            $('body').addClass 'loaded'
            toastr["error"](Lang.get('messages.errorFormat'), "ERROR");
            return 
        
        fd = new FormData();
        fd.append("fileImage", oFile);

        console.log("[cambiarImagen][fd]");
        console.log(fd);

        evt.subirImagen(url, fd).then (response) ->

            response = JSON.parse(response);

            #success
            if(response.success==Lang.get('messages.successFalse'))
                toastr.info(Lang.get("messages.errorsBD"), 'ERROR');	
            else 
                evt.actualizarImageProfile(url2, response.description).then (response) ->

                    #success
                    if(response.data.success==Lang.get('messages.successFalse'))
                        toastr.info(Lang.get("messages.errorsBD"), 'ERROR');	
                    else
                        toastr.success(Lang.get("messages.BDsuccess"), '');	
                        window.location = "/profile";
                    return
                , (response) ->
                    #ERROR
                    toastr.error(Lang.get("messages.errorsBD"), "ERROR");
                    return
                return
            return
        , (response) ->
            #ERROR
            toastr.error(Lang.get("messages.errorsBD"), "ERROR");
            return
        

        return

    # add the rule here

    $.validator.addMethod "valueNotEquals", (value, element, arg) ->
        return arg != value;
    , "Value must not equal arg."

    $("#profileForm").validate({
        'rules': {
            # compound rule
            'name': "required",
            'email': {
                'required': true,
                'email': true
            },
            'timezoneProfile': {
                'valueNotEquals': Lang.get('messages.selectTimezone')
            },
            'languageProfile': {
                'valueNotEquals': Lang.get('messages.selectLanguage')
            }
        }, 
        'messages': {
            'name': Lang.get("messages.nameForm"),
            'email': Lang.get("messages.mailForm"),
            'timezoneProfile': {
                'valueNotEquals': Lang.get("messages.timezoneForm")
            },
            'languageProfile': {
                'valueNotEquals': Lang.get("messages.languageForm")
            }
        },
        'errorPlacement': (error, element) -> 
            console.log "Validate: Error"
            element.css "width","100%"
            div = $(element).closest '.input-group'
            $(div).append error
        ,
        'submitHandler': (form) ->
            $("#profileForm #profileButtonSubmit").css "display","none"
            #entra cuando todo está bien sin errores, pero anteriormente debes de hacer un $("#registerButtonSubmit").submit();
            console.log "Validate: Submit Handler"
            #$("#registerButtonSubmit").submit(); no puede ir ésto aquí se hace un loop
            #form.submit();
            evt.profile($("#profileForm #profileUrl").val(), $("#profileForm #name").val(), $("#profileForm #email").val(), $("#profileForm #timezoneProfile").val(), $("#profileForm #languageProfile").val(), $("#profileForm #password").val()).then (response) ->
                #success
                if(response.data.success==Lang.get('messages.successFalse'))
                    toastr.error(Lang.get("messages.errorsBD"), '');
                else
                    toastr.success(Lang.get("messages.BDsuccess"), '');
                    window.location = "/profile";

                $("#profileForm #profileButtonSubmit").css "display",""
                return
            , (response) ->
                #ERROR
                toastr.error(Lang.get "messages.errorsBD", "ERROR");
                $("#profileForm #profileButtonSubmit").css "display",""
                return
        , 
        'success': (label) ->
            #entra cuando un input ya está bien para el validador
            label.addClass("valid").text("Ok!");
    });

    $("#profileForm #profileButtonSubmit").unbind().click ->
        console.log "[Modal][Button][Profile]";
        $("#profileForm #profileButtonSubmit").submit();

        return

    return

#admin controller

app.controller 'admin', ($rootScope, $scope, evt, $filter, $window) ->

    console.log "[adminCtrl]"

    $('.tooltipped').tooltip({delay: 50});

    evt.startLoading();

    # add the rule here

    $.validator.addMethod "valueNotEquals", (value, element, arg) ->
        return arg != value;
    , "Value must not equal arg."

    $("#customMailForm").validate({
        'rules': {
            # compound rule
            'subject': "required",
            'body': {
                'required': true
            },
            'target': {
                'valueNotEquals': Lang.get('messages.emailAdminSelect')
            },
            'priority':{
                'valueNotEquals' : Lang.get('messages.emailPrioritySelect')
            }
        }, 
        'messages': {
            'subject': Lang.get("messages.subjectFormRequired"),
            'body': Lang.get("messages.bodyFormRequired"),
            'target': {
                'valueNotEquals': Lang.get("messages.emailAdminSelect")
            },
            'priority':{
                'valueNotEquals' : Lang.get('messages.emailPrioritySelect')
            }
        },
        'errorPlacement': (error, element) -> 
            console.log "Validate: Error"
            element.css "width","100%"
            div = $(element).closest '.input-group'
            $(div).append error
        ,
        'submitHandler': (form) ->
            evt.startLoading();
            $("#customMailForm #customMailFormButtonSubmit").css "display","none"
            #entra cuando todo está bien sin errores, pero anteriormente debes de hacer un $("#registerButtonSubmit").submit();
            console.log "Validate: Submit Handler"
            #$("#registerButtonSubmit").submit(); no puede ir ésto aquí se hace un loop
            #form.submit();
            url = '' + $window.window.Laravel.url + '/customMail';
            evt.customMail(url, $("#customMailForm #target").val(), $("#customMailForm #subject").val(), $("#customMailForm #body").val(), $("#customMailForm #priority").val()).then (response) ->
                #success
                if(response.data.success==Lang.get('messages.successFalse'))
                    toastr.error(Lang.get("messages.errorsBD"), '');
                else
                    toastr.success(Lang.get("messages.BDsuccess"), '');
                evt.stopLoading();
                $("#customMailForm #customMailFormButtonSubmit").css "display",""
                return
            , (response) ->
                #ERROR
                toastr.error(Lang.get "messages.errorsBD", "ERROR");
                evt.stopLoading();
                $("#customMailForm #customMailFormButtonSubmit").css "display",""
                return
        , 
        'success': (label) ->
            #entra cuando un input ya está bien para el validador
            label.addClass("valid").text("Ok!");
    });

    url = '' + $window.window.Laravel.url + '/adminTotals';
    evt.adminTotals(url).then (response) ->
        #success
        if(response.data.success==Lang.get('messages.successFalse'))
            toastr.error(Lang.get("messages.errorsBD"), '');
        else 
            $("#totalUsers").html(response.data.totalUsers);
            $("#totalMailsVerified").html(response.data.totalMailsVerified);
            $("#totalIdioms").html(response.data.totalIdioms);
            $("#totalTimeZone").html(response.data.totalTimeZone);
            $("#totalRoles").html(response.data.totalRoles);
            $("#totalPlans").html(response.data.totalPlans);
            $("#totalQueueMails").html(response.data.totalQueueMails);
            $("#totalSubscribers").html(response.data.totalSubscribers);
            $("#totalUsersPaying").html(response.data.totalUsersPaying);
        evt.stopLoading();
        return
    , (response) ->
        #ERROR
        toastr.error(Lang.get "messages.errorsBD", "ERROR");
        evt.stopLoading();
        return

    url = '' + $window.window.Laravel.url + '/adminGetScopeTarget';
    evt.adminGetScopeTarget(url).then (response) ->
        #success
        if(response.data.success==Lang.get('messages.successFalse'))
            toastr.error(Lang.get("messages.errorsBD"), '');
        else
            $("#target").append('<option value="'+i.I_TIPOID+'" name="'+i.I_TIPOID+'">'+Lang.get("messages.emailAdminAllTipo1")+' '+i.N_TIPONAME+' '+Lang.get("messages.emailAdminAllTipo2")+'</option>') for i in response.data by 1
            return

        return
    , (response) ->
        #ERROR
        toastr.error(Lang.get "messages.errorsBD", "ERROR");
        $("#profileForm #profileButtonSubmit").css "display",""
        return
    return