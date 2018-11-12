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

  if (f.titulo.value.length > 120) {
    alert("O campo Título permite no máximo 120 caracteres.");
    requireInput(f.titulo);
    return false;
  }

  if (f.descricao.value.length > 400) {
    alert("O campo Descrição permite no máximo 400 caracteres.");
    requireInput(f.descricao);
    return false;
  }

  if (f.link.value.length > 255) {
    alert("O campo Link permite no máximo 255 caracteres.");
    requireInput(f.link);
    return false;
  }
}

function validaFormPublicacoes(f) {
  if (isEmpty(f.titulo.value)) {
    requireInput(f.titulo);
    return false;
  }

  if (isEmpty(f.evento.value)) {
    requireInput(f.evento);
    return false;
  }

  if (isEmpty(f.cidade.value)) {
    requireInput(f.cidade);
    return false;
  }

  if (isEmpty(f.ano.value)) {
    requireInput(f.ano);
    return false;
  }

  if (isEmpty(f.link.value)) {
    requireInput(f.link);
    return false;
  }

  if (f.titulo.value.length > 200) {
    alert("O campo Título permite no máximo 200 caracteres.");
    requireInput(f.titulo);
    return false;
  }

  if (f.evento.value.length > 200) {
    alert("O campo Evento permite no máximo 200 caracteres.");
    requireInput(f.evento);
    return false;
  }

  if (f.cidade.value.length > 72) {
    alert("O campo Cidade permite no máximo 72 caracteres.");
    requireInput(f.cidade);
    return false;
  }

  if (f.ano.value.length > 4) {
    alert("O campo Ano permite no máximo 4 caracteres.");
    requireInput(f.ano);
    return false;
  }

  if (f.link.value.length > 255) {
    alert("O campo Link permite no máximo 255 caracteres.");
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

/*$(document).ready(() => {
  let txArea = $("textarea#descricao")[0];
  if (txArea != null) {
    txArea.onkeydown = function() {
      txArea.style.backgroundColor = "white";
    };
  }
});*/
