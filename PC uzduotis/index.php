<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Atlyginimo skaičiuoklė</title>
    <link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">


  </head>
  <body>
  <div class="container">

  <!-- Procentu redagavimas (skaiciuoklei I RANKAS) -->

  <div class="procentu_redagavimas dn" id="IRprocentu_redagavimas">
    <svg class="cross" id="IRcross" height="2em" width="2em">
      <line x1="0" y1="0" x2="100%" y2="100%" style="stroke:#0092ff;stroke-width:6"></line>
      <line x1="0" y1="100%" x2="100%" y2="0" style="stroke:#0092ff;stroke-width:6"></line>
    </svg>
    <div class="" style="margin-left: 30%; margin-top: 5%">
        <span class="h3">% Sodrai nuo autorinių sutarčių</span>
        <input id="procentai_sodrai_input" class="h3 text-center" type="text" name="" value="39.48">
    </div>

  </div>

  <!-- Procentu redagavimas (skaiciuoklei I RANKAS) -->

    <div class="procentu_redagavimas dn" id="APprocentu_redagavimas">

      <svg class="cross" id="APcross" height="2em" width="2em">
        <line x1="0" y1="0" x2="100%" y2="100%" style="stroke:#0092ff;stroke-width:6"></line>
        <line x1="0" y1="100%" x2="100%" y2="0" style="stroke:#0092ff;stroke-width:6"></line>
      </svg>
    </div>

  <!-- Vietoj Footer ROW -->

    <div class="row">
        <div class="col-md-10 d-flex align-items-end">
          <img src="./img/logo.png" alt="">
        </div>

  <!-- CFG I RANKAS SKAICIUOKLEI -->


          <button id="IRcfg-button" class="cfg-button dn" type="button" name="button">REDAGUOTI %</button>


  <!-- CFG I ANT POPIERIAUS SKAICIUOKLEI -->

        <button id="APcfg-button" class="cfg-button dn" type="button" name="button">REDAGUOTI %</button>


    </div>

    <hr>

  <!-- Atlyginimo pasirinkimas -->

    <div class="row au">
      <div class="col-md-12 d-flex align-items-center justify-content-center">
        <span class="atl-span mr-2 mb-1 d-flex align-items-center justify-content-center">Skaičiuosime atlyginimą</span>
        <select class="atl-choose" name="" id="selectedInput">
          <option value="i_rankas">Į rankas</option>
          <option value="ant_popieriaus">Ant popieriaus</option>
        </select>
      </div>
    </div>

    <!-- Atlyginimo ivedimas -->

    <div class="row">
      <div class="bg-info col-md-12">

        <!-- Atlyginimo ant popieriaus ivedimas -->

        <div id="atl_antpopier_input" class="mt-3 mb-2 text-center dn">
          <input class="text-center" id="atl-input" type="number" name="atl_antpopier_input" value="" placeholder="Įveskite atlyginimą ant popieriaus" autofocus>
        </div>

        <!-- Atlyginimo i rankas ivedimas -->

        <div id="atl_irankas_input" class="mt-3 mb-2 text-center dn">
          <input class="text-center" id="atl-input" type="number" name="atl_irankas_input" value="" placeholder="Įveskite atlyginimą į rankas">
        </div>

      </div>
    </div>
    <hr>
    <!-- Atlyginimo i rankas skaiciuokle -->
    <div class="row">
      <div class="col-md-12">

      <div id="atl_irankas_skaiciuokle" class="dn">
        <h4>Priskaičiuotas atlyginimas "ant popieriaus" - <span id="IRalgAntPopSpan"></span></h4>
        <h5 id="IRautor" class="dn">Viso už autorines sutartis - <span id="viso_autorSpan"></span></h5>
        <h5 id="IRautor_ir_atlPop" class="dn">Autorinės sutartys + atlyginimas "ant popieriaus" - <span id="autor_ir_atlPopSpan"></span></h5>
        <hr>
        <h4>Sodros mokesčiai:</h4>
        <h5 class="ml-4">Pajamų mokestis 15% - <span id="IRpajamu_mokestisSpan"></span> </h5>
        <h5 class="ml-4">Sodra. Sveikatos draudimas 6% - <span id="IRsveikatos_draudimasSpan"></span></h5>
        <h5 class="ml-4">Sodra. Pensijų ir soc. draudimas 3% - <span id="IRpensijaSpan"></span></h5>
        <h5 class="ml-4 dn" id="IR_Sodrai_nuo_autoriniu">Sodra. Autorinės sutartys <span id="IR_Sodrai_nuo_autoriniu_procSpan"></span><span> - </span><span id="IR_Sodrai_nuo_autoriniu_Span"></span></h5>
        <hr>
        <h4 class="dn" id="IRuzAutorinesSutartis">Išmokamas atlyginimas už autorines sutartis - <span id="IRuzAutorinesSutartisSpan"></span></h4>
        <h4>Išmokamas atlyginimas "į rankas" - <span id="IRiRankasSpan"></span></h4>
        <h4 class="dn" id="IRviso">Išmokamas atlyginimas viso - <span id="IRvisoSpan"></span></h4>
        <hr>
        <h5>Darbdavio sumokami mokesčiai (į Sodrą) - 31.18%</h5>
        <h4>Visa darbo vietos kaina - <span id="IRdarboVietaSpan"></span></h4>
      </div>

      <div id="atl_antPopier_skaiciuokle" class="dn">
        <h3>Atlyginimo ant popieriaus skaiciuokle</h3>
      </div>

    </div>
  </div>

      <!-- Autorines sutartys -->
  <hr>
    <div class="row au">
       <div class="col-md-12"> <!-- autorines sutartys -->
         <div class="">
           <div class="">
                <img class="mb-1" id="add_icon" src="./img/add.png" alt="">
                  <span class="h5">Autorinės sutartys</span>
          </div>
          <div id="autorines_input" class="dn">
            <div class="sutartys_div pt-3">

            </div>
            <input id="sutarties_pav" class="m-3" type="text" name="" value="" placeholder="Įveskite trumpą sutarties pavadinimą" style="width: 650px;">
            <input id="sutarties_kaina" type="number" name="" value="" placeholder="Sutarties suma">
            <button id="sutartis_btn" class="m-3 float-right" type="submit" name="button">Įtrauktį autorinę sutartį</button>
          </div>

          </div>
       </div>

    </div>

    </div>
</div>
<script type="text/javascript" src="./lib/jQuery/jquery-3.2.1.min.js" defer> </script>
<script type="text/javascript" src="./js/myscript.js" defer> </script>
</body>
</html>
