// assets/js/main.js
document.addEventListener('DOMContentLoaded', function(){
  // exemple: confirmation suppression (si boutons ont classe confirm-delete)
  document.querySelectorAll('.confirm-delete').forEach(btn=>{
    btn.addEventListener('click', function(e){
      if(!confirm('Confirmer l\'action ?')) e.preventDefault();
    });
  });
});
