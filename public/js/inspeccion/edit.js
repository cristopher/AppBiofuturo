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

        var name = document.getElementsByName("inspeccion_text")[0].value;
        document.getElementsByName("inspeccion_text")[0].classList.remove("is-invalid");

        if (name.length == 0 ) {
            make.alert('<p class="text-center">Escriba algo en inspeccion</p>', true)
            document.getElementsByName("inspeccion_text")[0].classList.add("is-invalid");
            return false;
        }

        form.submit();
    })

    $("#default").trigger("change")
})