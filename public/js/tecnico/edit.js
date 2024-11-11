$(document).ready(function(){
    $("#default").on("change", function(){
        if (this.checked == true){
            this.parentElement.children[1].innerText = "Predeterminado: Si"
        }else{
            this.parentElement.children[1].innerText = "Predeterminado: No"
        }
    })

    $("form").submit(function(e){
        e.preventDefault();
        var form = this;

        var name = document.getElementsByName("tecnico_nombre")[0].value;
        document.getElementsByName("tecnico_nombre")[0].classList.remove("is-invalid");

        if (name.length == 0 ) {
            make.alert('<p class="text-center">Escriba algo en tecnico</p>', true)
            document.getElementsByName("tecnico_nombre")[0].classList.add("is-invalid");
            return false;
        }

        var lastName = document.getElementsByName("tecnico_apellido")[0].value;
        document.getElementsByName("tecnico_apellido")[0].classList.remove("is-invalid");

        if (lastName.length == 0 ) {
            make.alert('<p class="text-center">Escriba algo en tecnico</p>', true)
            document.getElementsByName("tecnico_apellido")[0].classList.add("is-invalid");
            return false;
        }

        var user = document.getElementsByName("tecnico_usuario")[0].value;
        document.getElementsByName("tecnico_usuario")[0].classList.remove("is-invalid");

        if (user.length == 0 ) {
            make.alert('<p class="text-center">Escriba algo en tecnico</p>', true)
            document.getElementsByName("tecnico_usuario")[0].classList.add("is-invalid");
            return false;
        }

        var password = document.getElementsByName("tecnico_password")[0].value;
        document.getElementsByName("tecnico_password")[0].classList.remove("is-invalid");

        if (password.length == 0 ) {
            make.alert('<p class="text-center">Escriba algo en tecnico</p>', true)
            document.getElementsByName("tecnico_password")[0].classList.add("is-invalid");
            return false;
        }

        form.submit();
    })

    $("#default").trigger("change")
})