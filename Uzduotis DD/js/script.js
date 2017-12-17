$("input.timepicker").timepicki({
    show_meridian:false,
    step_size_minutes:10,
    start_time: ["00","00","00"],
    custom_classes:"custom",
    min_hour_value: 0,
	max_hour_value: 23
});

$('#ani').slideDown('slow');

$('#dp2').fdatepicker({
      closeButton: true
  });


$('.choose-button-vechile').click(function (){
    $('#chooseVechileDiv').slideToggle("slow");
});

$('#showDrivers').click(function (){
    $('#divForShowingDrivers').slideToggle("slow");
});

$('#showVechiles').click(function (){
    $('#divForShowingVechiles').slideToggle("slow");
});


$('#select-vechile-driver').on('change', function() {
    var vechile = this.value;
    $.ajax({
        type: "GET",
        url: 'process.php',
        data: {ajaxVechile: vechile},
        success: function (){
            $.ajax({
                url: 'driver.php',
                    success: function() {
                        window.location.reload();
                    }
                });
                }

            });

});
