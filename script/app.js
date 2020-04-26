var buttons = document.querySelectorAll("nav button");
var contenus = document.querySelectorAll("section article");
var search = document.querySelector("#search");
var ok = document.querySelector(".ok");
var btn = document.querySelectorAll(".btn");
var sujets = document.querySelectorAll(".art");

btn.forEach(function (bt) {
  bt.addEventListener('click', function (e) {
    e.preventDefault();
    var id = this.className.match(/\d/)[0];
    trie(id);
  })
});

function trie(id) {
  sujets.forEach((sujet) => {
    if (!sujet.classList.contains("art" + id)) {
      sujet.style.display = "none";
    } else {
      sujet.style.display = "block";
    }
  });
}


trie(1);

function showContents(indice) {
  buttons.forEach((el) => {
    el.style.color = "";
  });

  buttons[indice + 1].style.color = "red";

  // contenus.forEach((el) => {
  //   el.style.display = "none";
  // });

  // contenus[indice].style.display = "block";
}
showContents(0);

function voirArticle() {
  var masquer = document.querySelector(".masquer");
  masquer.classList.remove("masquer");
}

ok.addEventListener("click", () => {
  var searchValue = search.value.toUpperCase();
  switch (searchValue) {
    case "CRACK":
      showContents(0);
      break;
    case "HEROINE":
      showContents(1);
      break;
    case "OVERDOSE":
      showContents(2);
      break;
    case "CANABIS":
      showContents(3);
      break;
    default:
      alert("Recherche non trouvée !");
      break;
  }
});
