console.log("si esta aqui succces")
$(document).ready(function () {
    $("#login").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type:"POST",
            success:function(){
                swal(
                    'Bienvenido',
                    'Ingreso correcto',
                    'success'
                );
                //imprimo el resultado en el div mensaje que procesa ajax
                //$("#mensaje").html(data);
            }
        });
    });
});
