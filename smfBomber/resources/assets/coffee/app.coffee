# Assignment:
number   = 42
opposite = true

# Conditions:
number = -42 if opposite

# Functions:
square = (x) -> x * x

#function without return without parameters
caca = -> #tambn compila así:     = () ->
    alert "no mms" if 1 if hola?
    return

# Arrays:
list = [1, 2, 3, 4, 5]

# Objects JSON:
math =
  root:   Math.sqrt
  square: square
  cube:   (x) -> x * square x

# Splats:
race = (winner, runners...) ->
  print winner, runners
  
#if
alert "webos" if food isnt "chocolate" and food == "vegetables"
  
#loops

eat food for food in ['toast', 'cheese', 'wine']

num = 0;

return num += x for x in [1..10] by 2

return num for x in [10..1] by -2

 i.N_TIPONAME for i in response.data by 1

foods = ['broccoli', 'spinach', 'chocolate']
eat food for food in foods when food isnt 'chocolate' and food isnt 'vegetables'

#for each

yearsOld = max: 10, ida: 9, tim: 11

ages = for child, age of yearsOld
  "#{child} is #{age}"

# Existence:
alert "I knew it!" if elvis?

# Array comprehensions:
cubes = (math.cube num for num in list)

# Log

log object.class
console.log object.class

# JQuery
$(document).ready -> 
    $('.account').attr class: 'active'
    $('.account').css 'display', 'none'
    $(".total-price span.price").css("display","none"); 
    return #es forzoso el return

# Jquery Method
$(".submit").click ->
  console.log "submitted!"
  
$(".button").on "click", ->
  console.log "button clicked!"
  
$(document).on "click", ".button2", ->
  console.log "delegated button click!"

$(".button").on "click", (event) ->
  console.log("button clicked!")
  event.preventDefault()
  
# setTimeOut
setTimeout ->
    something param
    return
, 1000

# setTimeInterval
setTimeInterval ->
    something param
    return
, 1000
    
# Ajax
$.ajax
    url: "some.html"
    dataType: "html"
    error: (jqXHR, textStatus, errorThrown) ->
        $('body').append "AJAX Error: #{textStatus}"
    success: (data, textStatus, jqXHR) ->
        $('body').append "Successful AJAX call: #{data}"