$(document).ready(function() {
  $("textarea#mensagem").characterCounter();
  $("textarea#descricao").characterCounter();
});

$(document).ready(function() {
  $(".sidenav").sidenav();
});

document.addEventListener("DOMContentLoaded", function() {
  var elems = document.querySelectorAll(".parallax");
  var instances = M.Parallax.init(elems, 0);
});

$(document).ready(function() {
  $(".modal").modal();
});
