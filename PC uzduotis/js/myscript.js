var selectedInput = document.getElementById("selectedInput");
var selectedAtlValue = selectedInput.options[selectedInput.selectedIndex].value;

var atl_antpopier_input = document.getElementById('atl_antpopier_input');
var atl_irankas_input = document.getElementById('atl_irankas_input');

var atl_irankas_skaiciuokle = document.getElementById('atl_irankas_skaiciuokle');
var atl_antPopier_skaiciuokle = document.getElementById('atl_antPopier_skaiciuokle');

//kai skaiciuojamas atlyginimas "i rankas" (IR reiskia "I Rankas")
var IRalgAntPopSpan = document.getElementById('IRalgAntPopSpan');
var IRpajamu_mokestisSpan = document.getElementById('IRpajamu_mokestisSpan');
var IRsveikatos_draudimasSpan = document.getElementById('IRsveikatos_draudimasSpan');
var IRpensijaSpan = document.getElementById('IRpensijaSpan');
var IRiRankasSpan = document.getElementById('IRiRankasSpan');
var IRdarboVietaSpan = document.getElementById('IRdarboVietaSpan');
var sutartis_btn = document.getElementById('sutartis_btn');
var IRautor = document.getElementById('IRautor');
var viso_autorSpan = document.getElementById('viso_autorSpan');
var IRautor_ir_atlPop = document.getElementById('IRautor_ir_atlPop');
var autor_ir_atlPopSpan = document.getElementById('autor_ir_atlPopSpan');

if (selectedInput.value === "i_rankas") {
  inputAtlIRankas (0);
}
else if (selectedInput === "ant_popieriaus") {
  inputAtlAntPopier ();
}



function inputAtlIRankas () {
  $(atl_antpopier_input).slideToggle();
  $(atl_irankas_skaiciuokle).slideToggle();
  $(atl_irankas_input).hide();
  $(atl_antPopier_skaiciuokle).hide();
  // atl_antpopier_input.classList.remove("dn");
  // atl_irankas_input.classList.add("dn");
  // atl_irankas_skaiciuokle.classList.remove("dn");
  // atl_antPopier_skaiciuokle.classList.add('dn');



  $('#atl-input').on('input', function (){
    var atl_ant_popieriaus = parseInt(document.getElementById('atl-input').value);
    var aut = parseInt(viso_autorSpan.innerHTML);

    if (isNaN(atl_ant_popieriaus)) {
      atl_ant_popieriaus = 0;
    }
    var IRpajamu_mokestis = atl_ant_popieriaus * 0.15;
    var IRsveikatos_draudimas = atl_ant_popieriaus * 0.06;
    var IRpensija = atl_ant_popieriaus * 0.03;
    var IRiRankas = atl_ant_popieriaus - IRpajamu_mokestis - IRsveikatos_draudimas - IRpensija;
    var IRdarboVieta = atl_ant_popieriaus + (atl_ant_popieriaus * 0.3118);



    IRalgAntPopSpan.innerHTML = atl_ant_popieriaus.toFixed(2);
    IRpajamu_mokestisSpan.innerHTML = IRpajamu_mokestis.toFixed(2);
    IRsveikatos_draudimasSpan.innerHTML = IRsveikatos_draudimas.toFixed(2);
    IRpensijaSpan.innerHTML = IRpensija.toFixed(2);
    IRiRankasSpan.innerHTML = IRiRankas.toFixed(2);
    IRdarboVietaSpan.innerHTML = IRdarboVieta.toFixed(2);
    autor_ir_atlPopSpan.innerHTML = (atl_ant_popieriaus+aut).toFixed(2);
    return;
  });


}



function inputAtlAntPopier () {
  $(atl_irankas_input).slideToggle();
  $(atl_antPopier_skaiciuokle).slideToggle();
  $(atl_antpopier_input).hide();
  $(atl_irankas_skaiciuokle).hide();

}







$('#selectedInput').on('change', function (){
  var selectedAtlValue = selectedInput.options[selectedInput.selectedIndex].value;
  if (selectedAtlValue === "i_rankas") {
    inputAtlIRankas ();
  }
  else if (selectedAtlValue === "ant_popieriaus") {
    inputAtlAntPopier ();
  }
});

$('#add_icon').click(function(){
    $("#autorines_input").slideToggle('slow');
});


// sita funkcija itraukia sutartis i DOM ir nusiuncia visa autoriniu sutarciu suma
$('#sutartis_btn').on('click', function (e) {
  var sutarties_pav = document.getElementById('sutarties_pav').value;
  var sutarties_kaina = document.getElementById('sutarties_kaina').value;
  if (sutarties_pav === "" || sutarties_kaina === "") {
    alert ("Neįvestas sutarties pavadinimas arba suma");
    return;
  }
  var nauja_sutartis = document.createElement('div');
  nauja_sutartis.className = "nauja_sutartis h5 ml-5 mt-3 mb-3";
  nauja_sutartis.setAttribute("kaina", sutarties_kaina);
  nauja_sutartis.innerHTML = "&#9673; Įtraukta autorinė sutartis: "+sutarties_pav+" už "+sutarties_kaina+" &euro;";
  $(nauja_sutartis).appendTo('.sutartys_div');
  $(IRautor).slideToggle();
  $(IRautor_ir_atlPop).slideToggle();
  // IRautor.classList.remove('dn');

  var test = document.getElementsByClassName('nauja_sutartis');
  var sutarciu_suma = [];
  var viso_uz_sutartis = 0;
  for (i = 0; i < test.length; i++) {
    sutarciu_suma[i] = parseInt(test[i].attributes[1].value);
  }

  for (var i = 0; i < sutarciu_suma.length; i++) {
    viso_uz_sutartis = viso_uz_sutartis + sutarciu_suma[i];
  }

  viso_autorSpan.innerHTML = "";
  viso_autorSpan.innerHTML = viso_uz_sutartis.toFixed(2);
  var temp = parseInt(IRalgAntPopSpan.innerHTML);
  var atl_ir_auto = viso_uz_sutartis + temp;
  autor_ir_atlPopSpan.innerHTML = "";
  autor_ir_atlPopSpan.innerHTML = atl_ir_auto.toFixed(2);

  return;

});


$("#sutarties_pav").on("click", function(){
    if(IRalgAntPopSpan.innerHTML === "") {
      alert ("Neįvestas atlyginimas");
      }
});
