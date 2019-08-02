$(document).ready(function () {
    $("#login").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type:"POST",
            success:function(){
                swal(
                    'Matricula no valida',
                    'Ingrese matricula correcta',
                    'warning'
                );
                //imprimo el resultado en el div mensaje que procesa ajax
                //$("#mensaje").html(data);
            }
        });
    });
});
console.log("llego a warning")
