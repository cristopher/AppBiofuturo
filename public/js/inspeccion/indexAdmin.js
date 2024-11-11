import {make, the} from '../wetrust.js'
$(document).ready(function(){
    $("#default").on("change", function(){
        if (this.checked == true){
            this.parentElement.children[1].innerText = "Predeterminado: Si"
        }else{
            this.parentElement.children[1].innerText = "Predeterminado: No"
        }
    })

    $(".delete").on("click", function(){
        let data = {
            id: this.dataset.id,
            user:this.dataset.user
        }

        make.deleteModal("el inspeccion", JSON.stringify(data), function(){
            let _del = JSON.parse(this.dataset.delete)
            window.location.href = '/inspeccion/deleteAdmin/'+_del.id + '/'+ _del.user;
        });
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
})