function validaFormProjetos(f) {
  if (isEmpty(f.titulo.value)) {
    requireInput(f.titulo);
    return false;
  }

  if (isEmpty(f.descricao.value)) {
    requireInput(f.descricao);
    $("textarea#descricao").addClass("invalid");
    return false;
  }

  if (isEmpty(f.link.value)) {
    requireInput(f.link);
    return false;
  }
}

function validaFormPublicacoes(f) {
  if (isEmpty(f.titulo.value)) {
    requireInput(f.titulo);
    return false;
  }

  if (isEmpty(f.anais.value)) {
    requireInput(f.anais);
    return false;
  }

  if (isEmpty(f.link.value)) {
    requireInput(f.link);
    return false;
  }
}

function confirmDelete(str) {
  if (confirm(str, "Confirmação")) {
    return true;
  } else {
    return false;
  }
}

function requireInput(input) {
  $("input#" + input.name).addClass("invalid");
  input.focus();
}

function isEmpty(str) {
  if (str == null || str.length < 1) {
    return true;
  }
  return false;
}

/* 
This function gives all inputs 
the hability to reset background 
color every keydown
*/
$(document).ready(() => {
  let txArea = $("textarea#descricao")[0];
  if (txArea != null) {
    txArea.onkeydown = function() {
      txArea.style.backgroundColor = "white";
    };
  }
});
