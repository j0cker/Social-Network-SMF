var dirx = [];
var diry = [];
var w = window.innerWidth;

function triggerHearts(){
    iniHearts();
    var intervalListener = setInterval(function() {
      moveHearts();
    }, 60);

    setTimeout(function(){
      clearInterval(intervalListener);
      $(".heart").remove();
    },6000);
}

function iniHearts(){
var numHeart = parseInt($("body").height()/30);
console.log("iniHearts");
console.log("Body Height: " + parseInt($("body").height()/15));
console.log("num hearts: " + numHeart );
for (i = 0; i < numHeart ; i++) {
  //Crear corazon
  let heart = document.createElement("DIV");
  heart.className = "heart";
  document.body.appendChild(heart);
  //Asignar tamaño       
  let tam = Math.floor((Math.random() * 20) + 15);
  heart.style.width = tam + "px";
  heart.style.height = tam + "px";
  //Asignar posicion inicial
  let posy = Math.floor((Math.random() * $("body").height()));
  heart.style.top = posy + "px";
  let posx = Math.floor((Math.random() * w));
  heart.style.left = posx + "px";
  //Crear vector direccion y id
  heart.id = "allHearts" + i;
  diry[i] = Math.floor((Math.random() * 5) - 10);
  dirx[i] = Math.floor((Math.random() * 10) - 5);

}
}

function moveHearts(){
  var numHeart = parseInt($("body").height()/30);
  for(i=0;i<numHeart ;i++){
    //Seleccion de corazon
    let heart = document.getElementById("allHearts"+i);
    //Aumento de coordenadas
    let y =  parseInt(heart.style.top) + diry[i];
    let x =  parseInt(heart.style.left) + dirx[i];

    //Asigmnacion de coordenadas
    heart.style.top = y + "px";
    heart.style.left = x + "px";
  }
}