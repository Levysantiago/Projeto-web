$(document).ready(function() {
  $('textarea#descricao').characterCounter();
});

document.addEventListener('DOMContentLoaded', function() {
	var elems = document.querySelectorAll('.parallax');
	var instances = M.Parallax.init(elems, 0);
});