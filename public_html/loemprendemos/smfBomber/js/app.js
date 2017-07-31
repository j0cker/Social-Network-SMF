(function() {
  var age, ages, caca, child, cubes, food, foods, i, j, k, l, len, len1, list, math, num, number, opposite, race, ref, square, x, yearsOld,
    slice = [].slice;

  number = 42;

  opposite = true;

  if (opposite) {
    number = -42;
  }

  square = function(x) {
    return x * x;
  };

  caca = function() {
    if (typeof hola !== "undefined" && hola !== null) {
      if (1) {
        alert("no mms");
      }
    }
    return null;
  };

  list = [1, 2, 3, 4, 5];

  math = {
    root: Math.sqrt,
    square: square,
    cube: function(x) {
      return x * square(x);
    }
  };

  race = function() {
    var runners, winner;
    winner = arguments[0], runners = 2 <= arguments.length ? slice.call(arguments, 1) : [];
    return print(winner, runners);
  };

  if (food !== "chocolate" && food === "vegetables") {
    alert("webos");
  }

  ref = ['toast', 'cheese', 'wine'];
  for (i = 0, len = ref.length; i < len; i++) {
    food = ref[i];
    eat(food);
  }

  num = 0;

  for (x = j = 1; j <= 10; x = j += 2) {
    return num += x;
  }

  for (x = k = 10; k >= 1; x = k += -2) {
    return num;
  }

  foods = ['broccoli', 'spinach', 'chocolate'];

  for (l = 0, len1 = foods.length; l < len1; l++) {
    food = foods[l];
    if (food !== 'chocolate' && food !== 'vegetables') {
      eat(food);
    }
  }

  yearsOld = {
    max: 10,
    ida: 9,
    tim: 11
  };

  ages = (function() {
    var results;
    results = [];
    for (child in yearsOld) {
      age = yearsOld[child];
      results.push(child + " is " + age);
    }
    return results;
  })();

  if (typeof elvis !== "undefined" && elvis !== null) {
    alert("I knew it!");
  }

  cubes = (function() {
    var len2, m, results;
    results = [];
    for (m = 0, len2 = list.length; m < len2; m++) {
      num = list[m];
      results.push(math.cube(num));
    }
    return results;
  })();

  log(object["class"]);

  console.log(object["class"]);

  $(document).ready(function() {
    $('.account').attr({
      "class": 'active'
    });
    $('.account').css('display', 'none');
    $(".total-price span.price").css("display", "none");
    return null;
  });

  $(".submit").click(function() {
    return console.log("submitted!");
  });

  $(".button").on("click", function() {
    return console.log("button clicked!");
  });

  $(document).on("click", ".button2", function() {
    return console.log("delegated button click!");
  });

  $(".button").on("click", function(event) {
    console.log("button clicked!");
    return event.preventDefault();
  });

  setTimeout(function() {
    something(param);
    return null;
  }, 1000);

  setTimeInterval(function() {
    something(param);
    return null;
  }, 1000);

  $.ajax({
    url: "some.html",
    dataType: "html",
    error: function(jqXHR, textStatus, errorThrown) {
      return $('body').append("AJAX Error: " + textStatus);
    },
    success: function(data, textStatus, jqXHR) {
      return $('body').append("Successful AJAX call: " + data);
    }
  });

}).call(this);

(function() {
  $(document).ready(function() {
    $("#loginButton").unbind().click(function() {
      console.log("[Login][Button]");
      $("#modal").modal("show");
      $(".modal-title").html(Lang.get("messages.login"));
      return null;
    });
    return null;
  });

}).call(this);
