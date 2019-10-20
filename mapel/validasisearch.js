
function validasiCari(){
  var src = document.getElementById('src');

   if(src.value == ""){
    alert("Anda belum mengisi pencarian");
    src.focus();
    return false;
  }
    else{
        return true;
    }
}
