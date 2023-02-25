var count = 0;
let messages = [
  "Vraiment c'est inutile, tu peux arrêter!!!",
  "Mais arrête!!!",
  "Arrête ça, ça ne sert à rien!!!",
  "Tu te moques de moi, arrete à la fin!!!",
  "Attention je vais me mettre en colère!!!",
  "Stop that man!!!",
  "TROIS !!!",
  "DEUX !!!",
  "UN !!!",
  "You're dead!!!",
  "Bon okay, en réaliter je peux rien faire",
  "Mais ce n'est pas une raison, arrête",
  "Je peux toujours appeler tes parents",
  "Ah non, c'est vrai, je ne peux pas",
  "Mais je peux... non je ne peux pas",
  "Tu sais quoi, casse-toi, je ne veux plus te voir",
  "Non mais casse-toi vile malotru !!!",
  "Non mais vraiment !!!",
  "Je vais commencer à me fâcher"
];

$('.dont-click').click(function() {
  $(".bubble-content").text(messages[count]);
  count += 1;
  if (count == messages.length + 1) {
    document.location.href="./index.php";
  }
});
