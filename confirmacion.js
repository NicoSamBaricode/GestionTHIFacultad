funcion confirmacion(e){
    if (confirm("Esta por eliminar el registro, desea continuar?")){
        return true;
    }
    else {
      e.preventDefault();
    }
}

let linkDelete = document.querySelectorAll(".btn");

for (var i=0; i<linkDelete,length;i++){
  linkDelete[i].addEventListener('click',confirmacion);
}
