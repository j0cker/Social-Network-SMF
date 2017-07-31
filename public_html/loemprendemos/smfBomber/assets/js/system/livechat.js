var LiveHelpSettings = {};
LiveHelpSettings.server = '';
LiveHelpSettings.embedded = true;
(function($) {
    // JavaScript
    LiveHelpSettings.server = LiveHelpSettings.server.replace(/[a-z][a-z0-9+\-.]*:\/\/|\/livehelp\/*(\/|[a-z0-9\-._~%!$&'()*+,;=:@\/]*(?![a-z0-9\-._~%!$&'()*+,;=:@]))|\/*$/g, '');
    var LiveHelp = document.createElement('script'); LiveHelp.type = 'text/javascript'; LiveHelp.async = true;
    LiveHelp.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + LiveHelpSettings.server + '/livehelp/scripts/jquery.livehelp.min.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(LiveHelp, s);
})(jQuery);