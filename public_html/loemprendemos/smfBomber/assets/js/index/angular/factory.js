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
      subscribe: function(url, email, referral) {
        return $http.post(url, {
          cache: false,
          params: {
            email: email,
            referral: referral
          }
        });
      }
    };
  });

}).call(this);
