$(document).ready(function() {
    console.log("Hola");

    var seats = $("#seats");

    seats.change(function (){

        $("#reservasExtras").html("");
        var seatsVal =$(this).children("option:selected").val();
        var i;
        if(seatsVal >= 2 && seatsVal <= 4) {
            for (i=1; i < seatsVal; i++){


                var reservas =

                    `
            <div class="extras" style="display: none">
            <div class="form-group row"  >
                <label for="name${i}" class="col-md-4 col-form-label text-md-right">Acompañante ${i}</label>
                <div class="col-md-6">
                    <input id="name${i}" type="text" class="form-control"  name="name${i}"  required >
                </div>
            </div>
            <!--<div class="form-group row" >
                <label for="email${i}" class="col-md-4 col-form-label text-md-right">Correo Electronico</label>
                <div class="col-md-6">
                    <input id="email${i}" type="email" class="form-control"  name="email${i}"  required>
                </div>
            </div>-->
            </div>

            `

                $("#reservasExtras").append(reservas);
                $(".extras").show("slow");

            }
        }




    });



    var submitButton = $("#submitReservation");

    $("#medidasConf").click(function (){
       if($("#medidasConf").is(':checked') && $("#medidasHigiene").is(':checked')){
           submitButton.prop("disabled", false);
       }else{
           submitButton.prop("disabled", true);
       }
    });

    $("#medidasHigiene").click(function (){
        if($("#medidasConf").is(':checked') && $("#medidasHigiene").is(':checked')){
            submitButton.prop("disabled", false);
        }else{
            submitButton.prop("disabled", true);
        }
    });



});
