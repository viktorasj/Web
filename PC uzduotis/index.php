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
  <!-- Vietoj Footer ROW -->

    <div class="row">
        <div class="col-md-10 d-flex align-items-center justify-content-center">
          <h3>Atlyginimo skaičiuoklė</h3>
        </div>
        <div class="col-md">
          <button class="cfg-button" type="button" name="button">CFG</button>
        </div>
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
          <input id="atl-input" type="number" name="atl_antpopier_input" value="" placeholder="Įveskite atlyginimą ant popieriaus">
        </div>

        <!-- Atlyginimo i rankas ivedimas -->

        <div id="atl_irankas_input" class="mt-3 mb-2 text-center dn">
          <input id="atl-input" type="number" name="atl_irankas_input" value="" placeholder="Įveskite atlyginimą į rankas">
        </div>

      </div>
    </div>
    <hr>
    <!-- Duomenys -->
    <div class="row">
      <div class="col-md-12">

      <div id="atl_irankas_skaiciuokle" class="dn">
        <h4>Priskaičiuotas atlyginimas "ant popieriaus" - <span id="testSpan"></span></h4>
        <h4>Sodros mokesčiai:</h4>
        <h5 class="ml-4">Pajamų mokestis 15%</h5>
        <h5 class="ml-4">Sodra. Sveikatos draudimas 6%</h5>
        <h5 class="ml-4">Sodra. Pensijų ir soc. draudimas 3%</h5>
        <h4>Išmokamas atlyginimas "į rankas"</h4>
        <br>
        <h4>Darbdavio sumokami mokesčiai - Sodra - 31.18%</h4>
        <h4>Visa darbo vietos kaina</h4>
      </div>

      <div id="atl_antPopier_skaiciuokle" class="dn">
        <h3>Atlyginimo ant popieriaus skaiciuokle</h3>
      </div>

    </div>
  </div>

      <!-- Autorines sutartys -->

    <div class="row au">
       <div class="bg-warning col-md-6"></div> <!-- nenaudojamas plotas -->
       <div class="bg-info col-md-6"> <!-- autorines sutartys -->
         <h3>Autorines sutartys</h3>
       </div>

    </div>

    </div>
</div>
<script type="text/javascript" src="./lib/jQuery/jquery-3.2.1.min.js" defer> </script>
<script type="text/javascript" src="./js/myscript.js" defer> </script>
</body>
</html>
