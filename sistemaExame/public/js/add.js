var controlcampo=1;
function adicionarcampo(){
    controlcampo++;
    console.log(controlcampo);
    document.getElementById('alinha').insertAdjacentHTML('beforeend', '<div class="form-group" id="opcao' +controlcampo + '" ><label for="title">Opção:</label><input type="text" class="form-control" id="opcao' + controlcampo+ '" name="opcao' + controlcampo+ '" placeholder="digite o corresponde a opção"> <button type="button" id="' + controlcampo + '" onclick="removercampo(' + controlcampo +')"> - </button></div>');
}

function removercampo(idcampo){
    document.getElementById('opcao' +idcampo).remove();
}
