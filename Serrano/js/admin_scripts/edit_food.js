$('input[name=optradio_edit]').click(function (){
  $('.second_body').hide(500);
  $('#edit_form').show(250);
  $('.active').removeClass('active');
  $('#edit_form').find('.card').remove();
  $('.second_body').find('button').remove();
  request_product(this.value);
});


function request_product (food_type) {
    var request = new XMLHttpRequest ();
    var formData = new FormData();
    formData.append('food_type',food_type);
    formData.append('request_type', "get food");
    request.open('post', '../php/controller.php', true);
    request.send(formData);
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
          var received_data = JSON.parse(request.responseText);
          console.log(received_data);
          for (var i = 0; i < received_data.length; i++) {
            $('#edit_form').prepend('<div class="card d-inline-block mr-4 food_card" id="'+received_data[i].id+'" style="width:200px">'+
                                      '<img class="card-img-top" src="../'+received_data[i].food_img_thumb+'" alt="">'+
                                        '<div class="card-body">'+
                                          '<h4 class="card-title">'+received_data[i].food_name+'</h4>'+
                                          '<p class="card-text">'+received_data[i].food_ingridients+'.</p>'+
                                        '</div>'+
                                      '</div>'
                                    );
          }
        }
        $('.food_card').click(function (){
          $('.first_body').hide(1000);
          $('.second_body').show(1000).find('.form-group').remove();
          list_edit_form(received_data, event.currentTarget.id);
        });
    };
  }

  function list_edit_form (clicked_obj, id) {
    for (var i = 0; i < clicked_obj.length; i++) {
      if (clicked_obj[i].id === id) {
        if (clicked_obj[i].food_price_medium === clicked_obj[i].food_price_big) {
          clicked_obj[i].food_price = clicked_obj[i].food_price_big;
          prices = '<div class="form-group">'+
                          '<label>Produkto kaina</label>'+
                          '<input type="text" id="edit_food_price" class="form-control" value="'+clicked_obj[i].food_price+'"required>'+
                        '</div>';
        }
        else {
          prices = '<div class="form-group">'+
                          '<label>Vidutinės picos kaina</label>'+
                          '<input type="text" id="edit_food_price_medium" class="form-control" value="'+clicked_obj[i].food_price_medium+'"required>'+
                        '</div>'+
                        '<div class="form-group">'+
                          '<label>Didelės picos kaina</label>'+
                          '<input type="text" id="edit_food_price_big" class="form-control" value="'+clicked_obj[i].food_price_big+'"required>'+
                        '</div>';
        }
        console.log(clicked_obj[i]);
        $('.second_body').prepend('<div class="form-group">'+
                                    '<p class="text-center" id="product_id">Produkto ID: '+clicked_obj[i].id+'</p>'+
                                    '<img style="width: 10em; border: 2px solid #DFDFDF; margin-left: 43%" src="../'+clicked_obj[i].food_img_thumb+'" alt="">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label>Produkto pavadinimas</label>'+
                                    '<input type="text" id="edit_food_name" class="form-control" value="'+clicked_obj[i].food_name+'"required>'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label>Produkto ingridientai</label>'+
                                    '<input type="text" id="edit_food_ingridients" class="form-control" value="'+clicked_obj[i].food_ingridients+'"required>'+
                                  '</div>'+
                                  this.prices+
                                  '<div class="form-group">'+
                                    '<label>Įkelti naują produkto foto</label>'+
                                    '<input id="edit_food_img_norm" type="file" class="form-control" required>'+
                                  '</div>'+
                                  '<div class="form-group mb-2">'+
                                      '<label>Picos kategorija</label>'+
                                      '<select class="form-control" id="edit_food_cat" name="food_cat" required>'+
                                        '<option value="Mės">Su mėsa (betkokia)</option>'+
                                        '<option value="Veg">Vegetariška</option>'+
                                      '</select>'+
                                   '</div>'+
                                   '<button type="submit" class="btn btn-success" name="edit_food">Redaguoti</button>'+
                                   '<button type="submit" class="btn btn-primary ml-2" name="exit_editing">Atšaukti</button>'+
                                   '<button type="submit" class="btn btn-danger ml-2" name="delete_product">Ištrinti produktą</button>'
                                );
        }
    }

    $('button[name=exit_editing]').click(function (){
      $('.second_body').hide(500);
      $('#edit_form').show(500);
      $('.second_body').find('button').remove();
    });

    $('button[name=edit_food]').click(function (){
      var data_to_edit = collect_edited_data ();
      send_edited_data (data_to_edit);

    });
  }

  function collect_edited_data() {
    var product_to_edit = {
    edited_product_id: $('p#product_id').val(),
    edited_product_type: $('input[name=optradio_edit]:checked').val(),
    edited_product_name: $('input#edit_food_name').val(),
    edited_product_ingridients: $('input#edit_food_ingridients').val(),
    edited_product_price_medium: $('input#edit_food_price_medium').val(),
    edited_product_price_big: $('input#edit_food_price_big').val(),
    edited_product_price: $('input#edit_food_price').val(),
    // edited_product_img_norm: $('input#edit_food_img_norm').prop('files')[0].name,
    edited_product_cat: $('select#edit_food_cat option:selected').val(),
    edited_image_file: $('input#edit_food_img_norm').prop('files')[0]
    };
    if (!product_to_edit.edited_product_price_medium || !product_to_edit.edited_product_price_medium) {
      product_to_edit.edited_product_price_medium = product_to_edit.edited_product_price;
      product_to_edit.edited_product_price_big = product_to_edit.edited_product_price;
    }
    return product_to_edit;
  }

  function send_edited_data (edited_data) {
      var request = new XMLHttpRequest ();
      var formData = new FormData();
      $.each(edited_data, function(key, value) {
        formData.append(key, value);
      });
      formData.append('request_type', "edit food");
      request.open('post', '../php/controller.php', true);
      request.send(formData);
      request.onreadystatechange = function () {
          if (request.readyState == 4 && request.status == 200) {
            console.log("sended to edit");
          }
      };
    }
