<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Serrano administration</title>
  <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/admin_style.css?v=1.0">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header text-center">
            <h3>Puslapio Administravimas</h3>
          </div>
        </div>
        <div class="card mt-5">
          <div class="card-header text-center ">
            <h3>Pridėti produktą</h3>
          </div>
          <div class="card-header text-center" sub-id="header_add">
            <label class="radio-inline"><input type="radio" name="optradio_add" value="pizza">Pica</label>
            <label class="radio-inline ml-5"><input type="radio" name="optradio_add" value="salad">Salotos</label>
            <label class="radio-inline ml-5"><input type="radio" name="optradio_add" value="rolls">Roletai</label>
            <label class="radio-inline ml-5"><input type="radio" name="optradio_add" value="other">Kiti patiekalai</label>
          </div>
        <div class="card-body" id="add_form">
            <div class="form-group" sub-id="food_name">
              <label for="food_name">Pavadinimas:</label>
              <input type="text" class="form-control" id="food_name" required>
            </div>
            <div class="form-group" sub-id="food_ingridients">
              <label for="food_ingridients">Ingridientai:</label>
              <input type="text" class="form-control" id="food_ingridients" required>
            </div>
            <div class="form-group" sub-id="food_price_medium">
              <label for="food_price_medium">Vidutinės picos kaina</label>
              <input type="number" class="form-control" id="food_price_medium" required>
            </div>
            <div class="form-group" sub-id="food_price_big">
              <label for="food_price_big">Didelės picos kaina</label>
              <input type="number" class="form-control" id="food_price_big" required>
            </div>
            <div class="form-group" sub-id="food_price">
              <label for="food_price_big">Kaina</label>
              <input type="number" class="form-control" id="food_price" required>
            </div>
            <div class="form-group" sub-id="food_img_norm">
              <label for="food_img_norm">Pasirinkti foto</label>
              <input type="file" class="form-control" id="food_img_norm" required>
            </div>
            <div class="form-group" sub-id="food_cat">
              <label for="food_cat">Picos kategorija</label>
              <select class="form-control" id="food_cat" name="food_cat" required>
                <option value="Mės">Su mėsa (betkokia)</option>
                <option value="Veg">Vegetariška</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary" name="add_food">Pridėti</button>
          </div>
        </div>
        <!-- <div class="card mt-5">
          <div class="card-header text-center ">
            <h3>Redaguoti produktą</h3>
          </div>
          <div class="card-header text-center">
            <label class="radio-inline"><input type="radio" name="optradio_edit" value="pizza">Pica</label>
            <label class="radio-inline ml-5"><input type="radio" name="optradio_edit" value="salad">Salotos</label>
            <label class="radio-inline ml-5"><input type="radio" name="optradio_edit" value="rolls">Roletai</label>
            <label class="radio-inline ml-5"><input type="radio" name="optradio_edit" value="other">Kiti patiekalai</label>
          </div>
        </div> -->
    </div>
  </div>
  </div>
  <script type="text/javascript" src="../libs/jQuery/jquery-3.2.1.min.js" defer></script>
  <script type="text/javascript" src="../libs/bootstrap/js/bootstrap.min.js" defer></script>
  <script type="text/javascript" src="../js/admin_script.js" defer></script>
</body>

</html>
