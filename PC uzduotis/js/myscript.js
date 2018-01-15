var selectedInput = document.getElementById("selectedInput");
var selectedAtlValue = selectedInput.options[selectedInput.selectedIndex].value;

var atl_antpopier_input = document.getElementById('atl_antpopier_input');
var atl_irankas_input = document.getElementById('atl_irankas_input');

var atl_irankas_skaiciuokle = document.getElementById('atl_irankas_skaiciuokle');
var atl_antPopier_skaiciuokle = document.getElementById('atl_antPopier_skaiciuokle');




//kai skaiciuojamas atlyginimas "i rankas" (IR reiskia "I Rankas")
//kai skaiciuojamas atlyginimas "ant popieriaus" (AP reiskia "ant popieriaus")
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
var IR_Sodrai_nuo_autoriniu_Span = document.getElementById('IR_Sodrai_nuo_autoriniu_Span');
var IR_Sodrai_nuo_autoriniu_procSpan = document.getElementById('IR_Sodrai_nuo_autoriniu_procSpan');
var IR_Sodrai_nuo_autoriniu = document.getElementById('IR_Sodrai_nuo_autoriniu');
var IR_procentai_sodrai_input = document.getElementById('IR_procentai_sodrai_input');
var IRuzAutorinesSutartisSpan = document.getElementById('IRuzAutorinesSutartisSpan');
var IRvisoSpan = document.getElementById('IRvisoSpan');






if (selectedInput.value === "i_rankas") {
  inputAtlIRankas ();
}
else if (selectedInput === "ant_popieriaus") {
  inputAtlAntPopier ();
}



function inputAtlIRankas () {

  $(atl_antpopier_input).removeClass('dn');
  $(atl_irankas_skaiciuokle).removeClass('dn');
  $(atl_irankas_input).addClass('dn');
  $(atl_antPopier_skaiciuokle).addClass('dn');
  $('#APcfg-button').addClass('dn');
  $('#IRcfg-button').removeClass('dn');

  IR_Sodrai_nuo_autoriniu_procSpan.innerHTML = IR_procentai_sodrai_input.value;


  $('#atl-input').on('input', function (){
    var atl_ant_popieriaus = parseInt(document.getElementById('atl-input').value);
    var aut = parseInt(viso_autorSpan.innerHTML);

    var sodrai_nuo_aut_temp = IR_Sodrai_nuo_autoriniu_Span.innerHTML.replace(/\D/g,'');
    var sodrai_nuo_aut = (Number(sodrai_nuo_aut_temp))/100;
    console.log(sodrai_nuo_aut);

    // var lieka_nuo_autoriniu = Math.round((((Number(viso_autorSpan.innerHTML.replace(/\D/g,'')))/100)-sodrai_nuo_aut) * 100) / 100;
    var lieka_nuo_autoriniu = ((Number(IRuzAutorinesSutartisSpan.innerHTML.replace(/\D/g,'')))/100);
    console.log(lieka_nuo_autoriniu);





    if (isNaN(sodrai_nuo_aut)) {
      sodrai_nuo_aut = 0;
    }

    if (isNaN(atl_ant_popieriaus)) {
      atl_ant_popieriaus = 0;
    }

    var IRpajamu_mokestis = atl_ant_popieriaus * 0.15;
    var IRsveikatos_draudimas = atl_ant_popieriaus * 0.06;
    var IRpensija = atl_ant_popieriaus * 0.03;
    var IRiRankas = atl_ant_popieriaus - IRpajamu_mokestis - IRsveikatos_draudimas - IRpensija;
    var IRdarboVieta = atl_ant_popieriaus + (atl_ant_popieriaus * 0.3118);




    IRalgAntPopSpan.innerHTML = atl_ant_popieriaus.toFixed(2) + " &euro;";
    IRpajamu_mokestisSpan.innerHTML = IRpajamu_mokestis.toFixed(2) + " &euro;";
    IRsveikatos_draudimasSpan.innerHTML = IRsveikatos_draudimas.toFixed(2) + " &euro;";
    IRpensijaSpan.innerHTML = IRpensija.toFixed(2) + " &euro;";
    IRiRankasSpan.innerHTML = IRiRankas.toFixed(2) + " &euro;";
    IRdarboVietaSpan.innerHTML = IRdarboVieta.toFixed(2) + " &euro;";
    autor_ir_atlPopSpan.innerHTML = (atl_ant_popieriaus+aut).toFixed(2) + " &euro;";
    IRvisoSpan.innerHTML = (IRiRankas + lieka_nuo_autoriniu).toFixed(2) + " &euro;";



  });
}



function inputAtlAntPopier () {
  $(atl_irankas_input).removeClass('dn');
  $(atl_antPopier_skaiciuokle).removeClass('dn');
  $(atl_antpopier_input).addClass('dn');
  $(atl_irankas_skaiciuokle).addClass('dn');
  $('#IRcfg-button').addClass('dn');
  $('#APcfg-button').removeClass('dn');

}


// sita funkcija suveikia kai keiciamas ivedimas i rankas/ ant popieriaus

$('#selectedInput').on('change', function (){
  var selectedAtlValue = selectedInput.options[selectedInput.selectedIndex].value;
  if (selectedAtlValue === "i_rankas") {
    inputAtlIRankas ();
  }
  else if (selectedAtlValue === "ant_popieriaus") {
    inputAtlAntPopier ();
  }
});

// atidaro autoriniu sutarciu langa

$('#add_icon').click(function(){
    $("#autorines_input").slideToggle('slow');
});


// sita funkcija itraukia sutartis i DOM ir nusiuncia visa autoriniu sutarciu suma

$('#sutartis_btn').one("click", function () {
   $(IRautor).slideToggle();
   $(IRautor_ir_atlPop).slideToggle();
   $(IR_Sodrai_nuo_autoriniu).slideToggle();
   $(IRuzAutorinesSutartis).slideToggle();
   $(IRviso).slideToggle();
 });

// $('#sutartis_btn').ready(function () {
//    $(IRautor).slideToggle();
//    $(IRautor_ir_atlPop).slideToggle();
//    $(IR_Sodrai_nuo_autoriniu).slideToggle();
//    $(IRuzAutorinesSutartis).slideToggle();
//    $(IRviso).slideToggle();
//  });

// sita fu-ja itraukia autorines sutartis i DOM'a

$('#sutartis_btn').on('click', function () {
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


  var temp = document.getElementsByClassName('nauja_sutartis');
  var sutarciu_suma = [];
  var viso_uz_sutartis = 0;
  for (i = 0; i < temp.length; i++) {
    sutarciu_suma[i] = parseInt(temp[i].attributes[1].value);
  }

  for (var i = 0; i < sutarciu_suma.length; i++) {
    viso_uz_sutartis = viso_uz_sutartis + sutarciu_suma[i];
  }

  viso_autorSpan.innerHTML = "";
  viso_autorSpan.innerHTML = viso_uz_sutartis.toFixed(2) + " &euro;";
  var temp2 = parseInt(IRalgAntPopSpan.innerHTML);
  var atl_ir_auto = viso_uz_sutartis + temp2;
  var IRsodrai_nuo_autoriniu = (viso_uz_sutartis/100)*IR_procentai_sodrai_input.value;
  console.log(Number(IR_Sodrai_nuo_autoriniu_procSpan.innerHTML));
  autor_ir_atlPopSpan.innerHTML = "";
  autor_ir_atlPopSpan.innerHTML = atl_ir_auto.toFixed(2) + " &euro;";
  IR_Sodrai_nuo_autoriniu_Span.innerHTML = IRsodrai_nuo_autoriniu.toFixed(2) + " &euro;";
  IRuzAutorinesSutartisSpan.innerHTML = (viso_uz_sutartis - IRsodrai_nuo_autoriniu).toFixed(2) + " &euro;";

  var esamas_atlyginimas = (Number(IRiRankasSpan.innerHTML.replace(/\D/g,'')))/100;
  var atlyginimas_ir_autorines = Math.round((esamas_atlyginimas + (viso_uz_sutartis - IRsodrai_nuo_autoriniu)) * 100) / 100;

  IRvisoSpan.innerHTML = atlyginimas_ir_autorines.toFixed(2) + " &euro;";

  // isvalo langus
  $("#sutarties_pav").val("");
  $("#sutarties_kaina").val("");

});


  $('#IR_procentai_sodrai_input').on('input', function (){
    var IR_procentai_sodrai = document.getElementById('IR_procentai_sodrai_input').value;
    if (IR_procentai_sodrai >= 100) {
      alert("100% max");
      document.getElementById('IR_procentai_sodrai_input').value = 100;
      IR_procentai_sodrai = 100;
    }
    else if (IR_procentai_sodrai < 0) {
      alert("Sodra nedamokės ;) ");
      document.getElementById('IR_procentai_sodrai_input').value = 0;
      IR_procentai_sodrai = 0;
    }

    IR_Sodrai_nuo_autoriniu_procSpan.innerHTML = IR_procentai_sodrai;

    var IR_Sodrai_nuo_aut_Span_temp = ((Number(viso_autorSpan.innerHTML.replace(/\D/g,'')))/100)*(IR_procentai_sodrai/100);
    var IR_Sodrai_nuo_aut_Span = Math.round(IR_Sodrai_nuo_aut_Span_temp * 100) / 100;
    IR_Sodrai_nuo_autoriniu_Span.innerHTML = IR_Sodrai_nuo_aut_Span.toFixed(2) + " &euro;";

    var IR_aut_lieka_nuo_sodros = ((Number(viso_autorSpan.innerHTML.replace(/\D/g,'')))/100) - IR_Sodrai_nuo_aut_Span;
    IRuzAutorinesSutartisSpan.innerHTML = (Math.round(IR_aut_lieka_nuo_sodros * 100) / 100).toFixed(2) + " &euro;";

    var IR_viso = ((Number(IRiRankasSpan.innerHTML.replace(/\D/g,'')))/100) + IR_aut_lieka_nuo_sodros;
    var IRvisoSpan = document.getElementById('IRvisoSpan');
    IRvisoSpan.innerHTML = (Math.round(IR_viso * 100) / 100).toFixed(2) + " &euro;";



  });






$("#sutarties_pav").on("click", function(){
    if(IRalgAntPopSpan.innerHTML === "") {
      alert ("Neįvestas atlyginimas");
      }
});

$('#IRcfg-button').on('click', function () {
  $('#IRprocentu_redagavimas').slideToggle();
});

$('#IRcross').on('click', function () {
  $('#IRprocentu_redagavimas').slideToggle();
});

$('#APcfg-button').on('click', function () {
  $('#APprocentu_redagavimas').slideToggle();
});

$('#APcross').on('click', function () {
  $('#APprocentu_redagavimas').slideToggle();
});
