app.factory 'evt',($http, $window) ->
    return {
        loading: ->
            $('body').removeClass 'load'
            $('body').removeClass 'loaded'
            $('body').addClass 'load'
            setTimeout ->
                $('body').addClass 'loaded'
            , 1000
        , startLoading: ->
            $('body').removeClass 'load'
            $('body').removeClass 'loaded'
            $('body').addClass 'load'
        , stopLoading: ->
            $('body').removeClass 'load'
            $('body').removeClass 'loaded'
            $('body').addClass 'loaded'    
        timezone: (url) ->
            return  $http.get(url, { cache: false })
        , language: (url) ->
            return  $http.get(url, { cache: false })
        , configuration: (url, timezone, language) ->
            return  $http.post(url, params: {timezone:timezone, language:language}, { cache: false })
        , subirImagen: (url, fd) ->
            return $.ajax  
                            url: url
                            type: 'POST'
                            data: fd
                            processData: false
                            contentType: false
                            headers: {
                                'X-CSRF-TOKEN': $window.window.Laravel.csrfToken
                            }
        , actualizarImageProfile: (url, imageUrl) ->
            return $http.post(url, params: {imageUrl:imageUrl}, { cache: false })
        , profile: (url, name, email, timezone, language, pswd) ->
            return  $http.post(url, params: {name:name, email:email, timezone:timezone, language:language, pswd:pswd} , { cache: false })
        , adminTotals: (url) ->
            return  $http.get(url, { cache: false })
        , adminGetScopeTarget: (url) ->
            return  $http.get(url, { cache: false })
        , customMail: (url, target, subject, body, priority) ->
             return  $http.post(url, params: {target:target, subject:subject, body:body, priority:priority} , { cache: false })
    }