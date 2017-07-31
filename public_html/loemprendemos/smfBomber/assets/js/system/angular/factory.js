(function() {
  app.factory('evt', function($http, $window) {
    return {
      loading: function() {
        $('body').removeClass('load');
        $('body').removeClass('loaded');
        $('body').addClass('load');
        return setTimeout(function() {
          return $('body').addClass('loaded');
        }, 1000);
      },
      startLoading: function() {
        $('body').removeClass('load');
        $('body').removeClass('loaded');
        return $('body').addClass('load');
      },
      stopLoading: function() {
        $('body').removeClass('load');
        $('body').removeClass('loaded');
        return $('body').addClass('loaded');
      },
      timezone: function(url) {
        return $http.get(url, {
          cache: false
        });
      },
      language: function(url) {
        return $http.get(url, {
          cache: false
        });
      },
      configuration: function(url, timezone, language) {
        return $http.post(url, {
          params: {
            timezone: timezone,
            language: language
          }
        }, {
          cache: false
        });
      },
      subirImagen: function(url, fd) {
        return $.ajax({
          url: url,
          type: 'POST',
          data: fd,
          processData: false,
          contentType: false,
          headers: {
            'X-CSRF-TOKEN': $window.window.Laravel.csrfToken
          }
        });
      },
      actualizarImageProfile: function(url, imageUrl) {
        return $http.post(url, {
          params: {
            imageUrl: imageUrl
          }
        }, {
          cache: false
        });
      },
      profile: function(url, name, email, timezone, language, pswd) {
        return $http.post(url, {
          params: {
            name: name,
            email: email,
            timezone: timezone,
            language: language,
            pswd: pswd
          }
        }, {
          cache: false
        });
      },
      adminTotals: function(url) {
        return $http.get(url, {
          cache: false
        });
      },
      adminGetScopeTarget: function(url) {
        return $http.get(url, {
          cache: false
        });
      },
      customMail: function(url, target, subject, body, priority) {
        return $http.post(url, {
          params: {
            target: target,
            subject: subject,
            body: body,
            priority: priority
          }
        }, {
          cache: false
        });
      }
    };
  });

}).call(this);
