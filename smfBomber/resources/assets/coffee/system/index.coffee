# JQuery Ready

$.ajaxSetup ->
  headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr 'content'
  },
  cache: false,
  ajaxStart: -> 
    $body.addClass "loading"
  , ajaxStop: ->
    $body.removeClass "loading"
  null


toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-full-width",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",#300
  "hideDuration": "1000",#1000
  "timeOut": "5000",#5000
  "extendedTimeOut": "1000",#1000
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

#$(document).ready -> 

    #loading()
    
    #$("#loginButton").unbind().click ->
    #    console.log "[Login][Button]"
    #    $("#modal").modal "show"
    #    $(".modal-title").html Lang.get "messages.login"
    #    null
    #null

#loading = ->

    #$('body').addClass 'load'

    #setTimeout ->
        #$('body').addClass 'loaded'
        #null
    #, 1000

    #null
