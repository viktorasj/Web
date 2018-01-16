var selectedInput = document.getElementById("selectedInput");
var selectedAtlValue = selectedInput.options[selectedInput.selectedIndex].value;

var atl_antpopier_input = document.getElementById('atl_antpopier_input');
var atl_irankas_input = document.getElementById('atl_irankas_input');

var atl_irankas_skaiciuokle = document.getElementById('atl_irankas_skaiciuokle');
var atl_antPopier_skaiciuokle = document.getElementById('atl_antPopier_skaiciuokle');

var IRivesti_sutartis = document.getElementById('IRivesti_sutartis');
var APivesti_sutartis = document.getElementById('APivesti_sutartis');





//kai skaiciuojamas atlyginimas "i rankas" (IR reiskia "I Rankas")

var IRalgAntPopSpan = document.getElementById('IRalgAntPopSpan');
var IRpajamu_mokestisSpan = document.getElementById('IRpajamu_mokestisSpan');
var IRsveikatos_draudimasSpan = document.getElementById('IRsveikatos_draudimasSpan');
var IRpensijaSpan = document.getElementById('IRpensijaSpan');
var IRiRankasSpan = document.getElementById('IRiRankasSpan');
var IRdarboVietaSpan = document.getElementById('IRdarboVietaSpan');

var IRsutartis_btn = document.getElementById('IRsutartis_btn');
var IRautor = document.getElementById('IRautor');
var IRviso_autorSpan = document.getElementById('IRviso_autorSpan');
var IRautor_ir_atlPop = document.getElementById('IRautor_ir_atlPop');
var IRautor_ir_atlPopSpan = document.getElementById('IRautor_ir_atlPopSpan');
var IR_Sodrai_nuo_autoriniu_Span = document.getElementById('IR_Sodrai_nuo_autoriniu_Span');
var IR_Sodrai_nuo_autoriniu_procSpan = document.getElementById('IR_Sodrai_nuo_autoriniu_procSpan');
var IR_Sodrai_nuo_autoriniu = document.getElementById('IR_Sodrai_nuo_autoriniu');
var IR_procentai_sodrai_input = document.getElementById('IR_procentai_sodrai_input');
var IRuzAutorinesSutartisSpan = document.getElementById('IRuzAutorinesSutartisSpan');
var IRvisoSpan = document.getElementById('IRvisoSpan');


//kai skaiciuojamas atlyginimas "ant popieriaus" (AP reiskia "ant popieriaus")

var APalgIrankSpan = document.getElementById('APalgIrankSpan');
var APpajamu_mokestisSpan = document.getElementById('APpajamu_mokestisSpan');
var APsveikatos_draudimasSpan = document.getElementById('APsveikatos_draudimasSpan');
var APpensijaSpan = document.getElementById('APpensijaSpan');
var APantPopSpan = document.getElementById('APantPopSpan');
var APdarbdSumMokSpan = document.getElementById('APdarbdSumMokSpan');

var APsutartis_btn = document.getElementById('APsutartis_btn');
var APautor = document.getElementById('APautor');
var APviso_autorSpan = document.getElementById('APviso_autorSpan');
var APautor_ir_atlIRank = document.getElementById('APautor_ir_atlIRank');
var APautor_ir_atlIRankSpan = document.getElementById('APautor_ir_atlIRankSpan');
var AP_Sodrai_nuo_autoriniu_Span = document.getElementById('AP_Sodrai_nuo_autoriniu_Span');
var AP_Sodrai_nuo_autoriniu_procSpan = document.getElementById('AP_Sodrai_nuo_autoriniu_procSpan');
var AP_Sodrai_nuo_autoriniu = document.getElementById('AP_Sodrai_nuo_autoriniu');
var AP_procentai_sodrai_input = document.getElementById('AP_procentai_sodrai_input');
var APuzAutorinesSutartisSpan = document.getElementById('APuzAutorinesSutartisSpan');
var APvisoSpan = document.getElementById('APvisoSpan');




function skaiProc (skai, proc) {
  var temp = (skai/100)*proc;
  return Math.round(temp * 100)/100;
}

function apv (skai) {
  return Math.round(skai * 100)/100;
}




if (selectedInput.value === "i_rankas") {
  inputAtlIRankas ();
}
else if (selectedInput.value === "ant_popieriaus") {
  inputAtlAntPopier ();
}


function inputAtlIRankas () {

  $(atl_irankas_input).hide();
  $(atl_antPopier_skaiciuokle).hide();
  $(atl_antpopier_input).slideToggle();
  $(atl_irankas_skaiciuokle).slideToggle();
  $('#IRautorines').removeClass('dn');
  $('#APautorines').addClass('dn');
  $('#APcfg-button').addClass('dn');
  $('#IRcfg-button').removeClass('dn');

  IR_Sodrai_nuo_autoriniu_procSpan.innerHTML = IR_procentai_sodrai_input.value;


  $('#IRatl-input').on('input', function (){
    var atl_ant_popieriaus = Number(document.getElementById('IRatl-input').value);



// + euroSign
    if (atl_ant_popieriaus) {
      $('.IReuroSign').removeClass('dn');
    }
//apsauga
    if (atl_ant_popieriaus < 0) {
      alert ('Ar damokėsite darbdaviui už tai, kad dirbate?');
      atl_ant_popieriaus = 0;
      document.getElementById('IRatl-input').value = 0;
    }
//apsauga
    if (isNaN(atl_ant_popieriaus)) {
      atl_ant_popieriaus = 0;
    }

    var aut = Number(IRviso_autorSpan.innerHTML);
    var lieka_nuo_autoriniu = Number(IRuzAutorinesSutartisSpan.innerHTML);
    var IRpajamu_mokestis = skaiProc(atl_ant_popieriaus, 15);
    var IRsveikatos_draudimas = skaiProc(atl_ant_popieriaus, 6);
    var IRpensija = skaiProc(atl_ant_popieriaus, 3);
    var IRiRankas = apv (atl_ant_popieriaus - IRpajamu_mokestis - IRsveikatos_draudimas - IRpensija);
    var IRdarboVieta = apv (atl_ant_popieriaus + skaiProc(atl_ant_popieriaus, 31.18));

    IRalgAntPopSpan.innerHTML = atl_ant_popieriaus;
    IRpajamu_mokestisSpan.innerHTML = IRpajamu_mokestis;
    IRsveikatos_draudimasSpan.innerHTML = IRsveikatos_draudimas;
    IRpensijaSpan.innerHTML = IRpensija;
    IRiRankasSpan.innerHTML = IRiRankas;
    IRdarboVietaSpan.innerHTML = IRdarboVieta;
    IRautor_ir_atlPopSpan.innerHTML = atl_ant_popieriaus+aut;
    IRvisoSpan.innerHTML = IRiRankas + lieka_nuo_autoriniu;
  });
}

//skaiciuokles "ant popieriaus" fu-ja
function inputAtlAntPopier () {

// show/hide
  $(atl_irankas_input).slideToggle();
  $(atl_antPopier_skaiciuokle).slideToggle();
  $(atl_antpopier_input).hide();
  $(atl_irankas_skaiciuokle).hide();
  $('#APautorines').removeClass('dn');
  $('#IRautorines').addClass('dn');
  $('#IRcfg-button').addClass('dn');
  $('#APcfg-button').removeClass('dn');

AP_Sodrai_nuo_autoriniu_procSpan.innerHTML = AP_procentai_sodrai_input.value;
//read fu-ja
  $('#APatl-input').on('input', function (){
// nuskaitomas input'as
    var APatl_i_rankas = document.getElementById('APatl-input').value;


//apsauga
    if (!APatl_i_rankas) {
      APatl_i_rankas = 0;
    }
// + euroSign
    if (APatl_i_rankas) {
      $('.APeuroSign').removeClass('dn');
    }
//apsauga
    if (APatl_i_rankas < 0) {
      alert ('Ar damokėsite darbdaviui už tai, kad dirbate?');
      APatl_i_rankas = 0;
      document.getElementById('APatl-input').value = 0;
    }

//skaiciuokles "ant popieriaus" kintamieji
    var aut = Number(APviso_autorSpan.innerHTML);
    var uzAutorinesSutartis = Number(APuzAutorinesSutartisSpan.innerHTML);
    var APantPop = apv((APatl_i_rankas*100)/76);
    var APpajamu_mokestis = skaiProc (APantPop, 15);
    var APsveikatos_draudimas = skaiProc (APantPop, 6);
    var APpensija = skaiProc (APantPop, 3);
    var APdarbdSumMok = skaiProc (APantPop, 31.18);


//parse to AP skaiciuokle
    APalgIrankSpan.innerHTML = APatl_i_rankas;
    APantPopSpan.innerHTML = APantPop;
    APpajamu_mokestisSpan.innerHTML = APpajamu_mokestis;
    APsveikatos_draudimasSpan.innerHTML = APsveikatos_draudimas;
    APpensijaSpan.innerHTML = APpensija;
    APdarbdSumMokSpan.innerHTML = APdarbdSumMok;
    APautor_ir_atlIRankSpan.innerHTML = Number(APatl_i_rankas)+aut;
    APvisoSpan.innerHTML = apv(APantPop + uzAutorinesSutartis);


  });
}

//fu-ja suveikia kai keiciamas ivedimas i rankas/ ant popieriaus

$('#selectedInput').on('change', function (){
  var selectedAtlValue = selectedInput.options[selectedInput.selectedIndex].value;
  if (selectedAtlValue === "i_rankas") {
    inputAtlIRankas ();
  }
  else if (selectedAtlValue === "ant_popieriaus") {
    inputAtlAntPopier ();
  }
});

//parodo autoriniu eilutes kai autorine sutartis pirma kart ivesta
  $('.sutartis_button').one("click", function () {
    if($(this).attr('id') === "IRsutartis_btn") {
       $(IRautor).slideToggle();
       $(IRautor_ir_atlPop).slideToggle();
       $(IR_Sodrai_nuo_autoriniu).slideToggle();
       $(IRuzAutorinesSutartis).slideToggle();
       $(IRviso).slideToggle();
     }
     else if ($(this).attr('id') === "APsutartis_btn") {
       $(APautor).slideToggle();
       $(APautor_ir_atlIRank).slideToggle();
       $(AP_Sodrai_nuo_autoriniu).slideToggle();
       $(APuzAutorinesSutartis).slideToggle();
       $(APviso).slideToggle();
     }
   });

// $('#IRsutartis_btn').ready(function () {
//  $(IRautor).slideToggle();
//  $(IRautor_ir_atlPop).slideToggle();
//  $(IR_Sodrai_nuo_autoriniu).slideToggle();
//  $(IRuzAutorinesSutartis).slideToggle();
//  $(IRviso).slideToggle();
// });

//Autoriniu sutarciu ivedimas skaiciuoklei "i rankas"
$('#IRsutartis_btn').on('click', function () {
  var sutarties_pav = document.getElementById('IRsutarties_pav').value;
  var sutarties_kaina = document.getElementById('IRsutarties_kaina').value;

//apsauga jei neivestu sutarties duomenu
  if (sutarties_pav === "" || sutarties_kaina === "") {
    alert ("Neįvestas sutarties pavadinimas arba suma");
    return;
  }

//sukuria DOM, atvaizduoja sutartis
  var nauja_sutartis = document.createElement('div');
  nauja_sutartis.className = "nauja_sutartis h5 ml-5 mt-3 mb-3";
  nauja_sutartis.setAttribute("kaina", sutarties_kaina); //iraso sutarties kaina i attr "kaina"
  nauja_sutartis.innerHTML = "&#9673; Įtraukta autorinė sutartis: "+sutarties_pav+" už "+sutarties_kaina+" &euro;";
  $(nauja_sutartis).appendTo('#IRsutartys_div');

//surenka visas itrauktas sutartis ir atiduoda bendra sutarciu kainu suma ("viso uz sutartis")
  var temp = document.getElementsByClassName('nauja_sutartis');
  var sutarciu_suma = [];
  var viso_uz_sutartis = 0;
  for (i = 0; i < temp.length; i++) {
    sutarciu_suma[i] = parseInt(temp[i].attributes[1].value);
  }
  for (i = 0; i < sutarciu_suma.length; i++) {
    viso_uz_sutartis = viso_uz_sutartis + sutarciu_suma[i];
  }

// kintamieji
  var temp2 = Number(IRalgAntPopSpan.innerHTML);
  var atl_ir_auto = viso_uz_sutartis + temp2;
  var IRsodrai_nuo_autoriniu = (viso_uz_sutartis/100)*IR_procentai_sodrai_input.value;
  var esamas_atlyginimas = Number(IRiRankasSpan.innerHTML);
  var atlyginimas_ir_autorines = apv(esamas_atlyginimas + (viso_uz_sutartis - IRsodrai_nuo_autoriniu));

// parse to html
  IRviso_autorSpan.innerHTML = "";
  IRviso_autorSpan.innerHTML = viso_uz_sutartis;
  IRautor_ir_atlPopSpan.innerHTML = "";
  IRautor_ir_atlPopSpan.innerHTML = atl_ir_auto;
  IR_Sodrai_nuo_autoriniu_Span.innerHTML = IRsodrai_nuo_autoriniu;
  IRuzAutorinesSutartisSpan.innerHTML = (viso_uz_sutartis - IRsodrai_nuo_autoriniu);
  IRvisoSpan.innerHTML = atlyginimas_ir_autorines;


// isvalo langus
  $("#IRsutarties_pav").val("");
  $("#IRsutarties_kaina").val("");

});

//Autoriniu sutarciu ivedimas skaiciuoklei "ant popieriaus"
$('#APsutartis_btn').on('click', function () {
  var sutarties_pav = document.getElementById('APsutarties_pav').value;
  var sutarties_kaina = document.getElementById('APsutarties_kaina').value;

//apsauga jei neivestu sutarties duomenu
  if (sutarties_pav === "" || sutarties_kaina === "") {
    alert ("Neįvestas sutarties pavadinimas arba suma");
    return;
  }

//sukuria DOM, atvaizduoja sutartis
  var nauja_sutartis = document.createElement('div');
  nauja_sutartis.className = "nauja_sutartis2 h5 ml-5 mt-3 mb-3";
  nauja_sutartis.setAttribute("kaina", sutarties_kaina); //iraso sutarties kaina i attr "kaina"
  nauja_sutartis.innerHTML = "&#9673; Įtraukta autorinė sutartis: "+sutarties_pav+" už "+sutarties_kaina+" &euro;";
  $(nauja_sutartis).appendTo('#APsutartys_div');

//surenka visas itrauktas sutartis ir atiduoda bendra sutarciu kainu suma ("viso uz sutartis")
  var temp = document.getElementsByClassName('nauja_sutartis2');
  var sutarciu_suma = [];
  var viso_uz_sutartis = 0;
  for (i = 0; i < temp.length; i++) {
    sutarciu_suma[i] = parseInt(temp[i].attributes[1].value);
  }
  for (i = 0; i < sutarciu_suma.length; i++) {
    viso_uz_sutartis = viso_uz_sutartis + sutarciu_suma[i];
  }


// kintamieji
  var temp2 = Number(APalgIrankSpan.innerHTML);
  var atl_ir_auto = viso_uz_sutartis + temp2;
  var APsodrai_nuo_autoriniu = (viso_uz_sutartis*100)/(100-AP_procentai_sodrai_input.value)-viso_uz_sutartis;
  var esamas_atlyginimas = Number(APantPopSpan.innerHTML);
  var atlyginimas_ir_autorines = apv(viso_uz_sutartis + APsodrai_nuo_autoriniu + Number(APantPopSpan.innerHTML));

// parse to html
  APviso_autorSpan.innerHTML = "";
  APviso_autorSpan.innerHTML = viso_uz_sutartis;
  APautor_ir_atlIRankSpan.innerHTML = "";
  APautor_ir_atlIRankSpan.innerHTML = atl_ir_auto;
  AP_Sodrai_nuo_autoriniu_Span.innerHTML = apv(APsodrai_nuo_autoriniu);
  APuzAutorinesSutartisSpan.innerHTML = apv(viso_uz_sutartis + APsodrai_nuo_autoriniu);
  APvisoSpan.innerHTML = atlyginimas_ir_autorines;

// isvalo langus
  $("#APsutarties_pav").val("");
  $("#APsutarties_kaina").val("");

});


  $('#IR_procentai_sodrai_input').on('input', function (){
    var IR_procentai_sodrai = document.getElementById('IR_procentai_sodrai_input').value;

//apsauga
    if (IR_procentai_sodrai > 100) {
      alert("100% max");
      document.getElementById('IR_procentai_sodrai_input').value = 100;
      IR_procentai_sodrai = 100;
    }
//apsauga
    else if (IR_procentai_sodrai < 0) {
      alert("Sodra nedamokės ;) ");
      document.getElementById('IR_procentai_sodrai_input').value = 0;
      IR_procentai_sodrai = 0;
    }
//apsauga
    else if (!IR_procentai_sodrai) {
      IR_procentai_sodrai = 0;
    }

    IR_Sodrai_nuo_autoriniu_procSpan.innerHTML = IR_procentai_sodrai;


//kintamieji
    var IR_Sodrai_nuo_aut_Span = apv((Number(IRviso_autorSpan.innerHTML))*(IR_procentai_sodrai/100));
    var IR_aut_lieka_nuo_sodros = Number(IRviso_autorSpan.innerHTML) - IR_Sodrai_nuo_aut_Span;
    var IR_viso = (Number(IRiRankasSpan.innerHTML)) + IR_aut_lieka_nuo_sodros;
    var IRvisoSpan = document.getElementById('IRvisoSpan');

//parse
    IR_Sodrai_nuo_autoriniu_Span.innerHTML = IR_Sodrai_nuo_aut_Span;
    IRuzAutorinesSutartisSpan.innerHTML = apv(IR_aut_lieka_nuo_sodros);
    IRvisoSpan.innerHTML = apv (IR_viso);
});

  $('#AP_procentai_sodrai_input').on('input', function (){
    var AP_procentai_sodrai = document.getElementById('AP_procentai_sodrai_input').value;

//apsauga
    if (AP_procentai_sodrai > 100) {
      alert("100% max");
      document.getElementById('AP_procentai_sodrai_input').value = 100;
      AP_procentai_sodrai = 100;
    }
//apsauga
    else if (AP_procentai_sodrai < 0) {
      alert("Sodra nedamokės ;) ");
      document.getElementById('AP_procentai_sodrai_input').value = 0;
      AP_procentai_sodrai = 0;
    }
//apsauga
    else if (!AP_procentai_sodrai) {
      AP_procentai_sodrai = 0;
    }

    AP_Sodrai_nuo_autoriniu_procSpan.innerHTML = AP_procentai_sodrai;


//kintamieji
    var AP_Sodrai_nuo_aut_Span = apv((Number(APviso_autorSpan.innerHTML))*100/(100-AP_procentai_sodrai)-(Number(APviso_autorSpan.innerHTML)));
    var AP_aut_lieka_nuo_sodros = Number(APviso_autorSpan.innerHTML) + AP_Sodrai_nuo_aut_Span;
    var AP_viso = (Number(APantPopSpan.innerHTML)) + AP_aut_lieka_nuo_sodros;
    var APvisoSpan = document.getElementById('APvisoSpan');

//parse
    AP_Sodrai_nuo_autoriniu_Span.innerHTML = AP_Sodrai_nuo_aut_Span;
    APuzAutorinesSutartisSpan.innerHTML = apv(AP_aut_lieka_nuo_sodros);
    APvisoSpan.innerHTML = apv (AP_viso);
});



// atidaro autoriniu sutarciu langa
  $('.add_icon').click(function(){
    if($(this).attr('id') === "IRadd_icon") {
        $("#IRautorines_input").slideToggle('slow');
    }
    else if($(this).attr('id') === "APadd_icon") {
        $("#APautorines_input").slideToggle('slow');
    }
  });

// sutarciu apsauga, jei neivestu laukeliu
  $("#IRsutarties_pav").on("click", function(){
      if(IRalgAntPopSpan.innerHTML === "") {
        alert ("Neįvestas atlyginimas");
        }
  });

// rodo procentu korekcijos div'a skaiciuokleje "I RANKAS"
  $('#IRcfg-button').on('click', function () {
    $('#IRprocentu_redagavimas').slideToggle();
  });

  $('#IRcross').on('click', function () {
    $('#IRprocentu_redagavimas').slideToggle();
  });
// rodo procentu korekcijos div'a skaiciuokleje "ANT POPIERIAUS"
  $('#APcfg-button').on('click', function () {
    $('#APprocentu_redagavimas').slideToggle();
  });

  $('#APcross').on('click', function () {
    $('#APprocentu_redagavimas').slideToggle();
  });
