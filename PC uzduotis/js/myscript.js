var selectedInput = document.getElementById("selectedInput");
var selectedAtlValue = selectedInput.options[selectedInput.selectedIndex].value;

var atl_antpopier_input = document.getElementById('atl_antpopier_input');
var atl_irankas_input = document.getElementById('atl_irankas_input');

var atl_irankas_skaiciuokle = document.getElementById('atl_irankas_skaiciuokle');
var atl_antPopier_skaiciuokle = document.getElementById('atl_antPopier_skaiciuokle');
var testSpan = document.getElementById('testSpan');


function inputAtlIRankas () {
  atl_antpopier_input.classList.remove("dn");
  atl_irankas_input.classList.add("dn");
  atl_irankas_skaiciuokle.classList.remove("dn");
  atl_antPopier_skaiciuokle.classList.add('dn');
  $('#atl-input').on('input', function (){
    testSpan.innerHTML = $('#atl-input').val();

  });



}

function inputAtlAntPopier () {
  atl_antpopier_input.classList.add("dn");
  atl_irankas_input.classList.remove('dn');
  atl_irankas_skaiciuokle.classList.add("dn");
  atl_antPopier_skaiciuokle.classList.remove('dn');


}



inputAtlIRankas ();



$('#selectedInput').on('change', function (){
  var selectedAtlValue = selectedInput.options[selectedInput.selectedIndex].value;
  if (selectedAtlValue === "i_rankas") {
    inputAtlIRankas ();
  }
  else if (selectedAtlValue === "ant_popieriaus") {
    inputAtlAntPopier ();
  }
});
