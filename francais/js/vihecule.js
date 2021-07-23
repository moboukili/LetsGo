function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries = ["Abarth","Ac","Acrea","Acura","Aiways","Aixam","Al Melling","Aleko","Alfa Romeo","Alke","Alpina","Alvis","Amc","Amphicar","Aptera Motors","Ariel","Armstrong Siddeley","Aro","Artega","Ascari","Aspark","Aston Martin","Audi","Austin","Austin Healey","Auto Union","Autobianchi","Auverland","Bellier","Bentley","Berliet","Bertone","Bitter","Bizzarrini","Bmw","Bollore","Bongarini","Booxt","Borgward","Bowler","Brabus","Bristol","Bugatti","Cadillac","Caparo","Carbodies","Carver","Casalini","Caterham","Chatenet","Chenard Et Walcker","Chery","Chevrolet","Chrysler","Citroen","Clenet","Connaught","Coste","Courb","Cupra","Dacia","Daewoo","Daihatsu","Daimler","Dallara","Dangel","Darmont","Datsun","De Fremond","De La Chapelle","De Lorean","De Soto","De Tomaso","Delage","Delahaye","Deronda","Deutsch-bonnet","Devon","Dkw","Dodge","Dongfeng","Donkervoort","Donnet","Due","Duesenberg","Eagle","Ebro","Edsel","Elv","Erad","Estrima","Excalibur","Facel Vega","Farbio","Ferrari","Fiat","Fioravanti","Fisker","Ford","Fornasari","Grandin","Grecav","Gumpert","Healey","Heuliez","Holden","Hommell","Honda","Hotchkiss","Howmet","Hudson","Humber","Hummer","Hyundai","Infiniti","Invicta" ,"Iso","Isorivolta" ,"Isuzu","Italcar","Iveco","Jaguar","Jdm Simpa","Jeep","Jensen","Jiayuan","Kassbohrer Setra","Kia","Koenigsegg","Ktm","Lada","Lagonda","Lamborghini","Lancia","Land Rover","Lexus","Ligier","Lincoln","Loremo","Lotus","Lumeneo","Marcadier","Marcos","Martin","Marussia","Maruti","Maserati","Matra","Mazda","Mclaren","Mdi","Mercedes","Mercedes-amg","Mercury","Messerschmitt","Mev","Meyers Manx","Microcar","Minauto","Mini","Mitsubishi","Mitsuoka","onteverdi","Morgan","Morris","Mosler","Mygale","Nanjing","Nash","Neckar","Newteon","Nissan","Packard","Pagani","Panhard","Panoz","Panther","Pegaso","Perana","Peugeot","Plymouth","Polestar","Polski","Pontiac","Porsche","Proton","Protoscar","Radical","Reliant","Renault","Reva","Reynard","Riley","Rinspeed","Rolls","Royce","Ronart","Rosengart","Rover","Saic","Saleen","Salica","Salmson","Samsung","Santana","Saturn","Savel","Saviem","Sbarro","Scania","Scion" ,"Seat","Secma","Shelby","Shuanghuan","Simca","Singer","Sivax","Smart","Studebaker","Stutz","Subaru","Sunbeam","Suzuki","Talbot","Talbot Simca","Tata","Teilhol","Tesla","Think","Toyota","Trabant","Triumph","Ultima","Vaillante","VandenPlas","Vauxhall","Velam","Venturi","Veritas","Vespa","Vinfast","Virago","Volkswagen","Volteis","Volvo","Trucks","WallysCar","Westfield","Wiesmann","Willys","Wolseley","Zagato","Zap","Zastava","Zenn","Zenvo"];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);