<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Atlyginimo skaičiuoklė</title>
    <link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script type="text/javascript" src="./lib/jQuery/jquery-3.2.1.min.js" defer> </script>
    <script type="text/javascript" src="./js/myscript.js" defer> </script>


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
        <select class="atl-choose" name="">
          <option value="i_rankas">Į rankas</option>
          <option value="ant_popieriaus">Ant popieriaus</option>
        </select>
        <button class="btn btn-primary ml-3" type="submit" name="selection">Pasirinkti</button>
      </div>
    </div>

    <!-- Atlyginimo ivedimas -->

    <div class="row au">
      <div class="bg-info col-md-12">
        <h3>Atlyginimo ivedimas</h3>
      </div>
    </div>

    <!-- Duomenys -->

    <div class="row aux">
      <div class="bg-success col-md-12">
      <h3>Duomenys</h3>
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
</body>
</html>
