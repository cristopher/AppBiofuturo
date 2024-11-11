import {make, the, these} from '../wetrust.js';

var clientes = [];
var campos = [];
var regiones = [];
var comunas = [];

var _tabla = [{"nombre":"inspeccion_text", "oculto": false,"type":"text"}, {"nombre":"inspeccion_default", "oculto": true,"type":"bool"}];
var _filtros = [{"nombre":"inspeccion_text_search","type":"input"}, {"nombre":"inspeccion_default_search","type":"checkbox"}]

var iconos = {
    "tool" : '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-tools" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M0 1l1-1 3.081 2.2a1 1 0 0 1 .419.815v.07a1 1 0 0 0 .293.708L10.5 9.5l.914-.305a1 1 0 0 1 1.023.242l3.356 3.356a1 1 0 0 1 0 1.414l-1.586 1.586a1 1 0 0 1-1.414 0l-3.356-3.356a1 1 0 0 1-.242-1.023L9.5 10.5 3.793 4.793a1 1 0 0 0-.707-.293h-.071a1 1 0 0 1-.814-.419L0 1zm11.354 9.646a.5.5 0 0 0-.708.708l3 3a.5.5 0 0 0 .708-.708l-3-3z"></path><path fill-rule="evenodd" d="M15.898 2.223a3.003 3.003 0 0 1-3.679 3.674L5.878 12.15a3 3 0 1 1-2.027-2.027l6.252-6.341A3 3 0 0 1 13.778.1l-2.142 2.142L12 4l1.757.364 2.141-2.141zm-13.37 9.019L3.001 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z"></path></svg>',
    "pen" : '<svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-pen" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"></path></svg>',
    "trash" : '<svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path></svg>'
};

$(document).ready(function(){
    the("filtro").onclick = function(){
        if (the("cFiltro").classList.contains("d-flex")){
            the("cFiltro").classList.add("d-none")
            the("cFiltro").classList.remove("d-flex")
        } else {
            the("cFiltro").classList.remove("d-none")
            the("cFiltro").classList.add("d-flex")
        }
    }

    the("saveInspeccion").onclick = function(){
        document.getElementsByTagName("form")[0].submit()
    }

    the("closeInspeccion").onclick = function(){
        these("inspeccion_text")[0].value = ""
        these("inspeccion_default")[0].checked = false
        these("inspeccion_default")[0].onchange()
    }

    $(".delete").on("click", eliminarElemento)

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

    fetch("https://extranet.biofuturo.cl/android/clientes").then(response => response.json())
    .then(data => {

        clientes = data.clientes;
        campos = data.campos;
        regiones = data.regiones;
        comunas = data.comunas;

        poblarClientes()
        poblarCampos()
        selectRegiones()
    })

    these("region_id")[0].onchange = function(){
        let data = [...clientes]
        let region_id = this.value

        data = data.filter(dato => { return dato.cliente_region == region_id })

        data = data.sort((a, b) => {
            let fa = a.cliente_nombre.toLowerCase();
            let fb = b.cliente_nombre.toLowerCase();

            if (fa < fb) { return -1; }
            if (fa > fb) { return 1; }

            return 0;
        });

        let select = these("cliente_id")[0]
        let length = select.options.length;

        for (let i = 0; i < length; i++) {
            select.options[0] = null;
        }

        data.forEach(function(element) {
            let opt = document.createElement('option');
            opt.appendChild( document.createTextNode(element.cliente_nombre));
            opt.value = element.cliente_id; 
            select.appendChild(opt);
        });

        these("cliente_id")[0].onchange()
    }

    these("cliente_id")[0].onchange = function(){
        let data = [...campos]
        let cliente_id = this.value

        data = data.filter(dato => { return dato.cliente_id == cliente_id })

        data = data.sort((a, b) => {
            let fa = a.campos_nombre.toLowerCase();
            let fb = b.campos_nombre.toLowerCase();

            if (fa < fb) { return -1; }
            if (fa > fb) { return 1; }

            return 0;
        });

        let select = these("campos_id")[0]
        let length = select.options.length;

        for (let i = 0; i < length; i++) {
            select.options[0] = null;
        }

        data.forEach(function(element) {
            let opt = document.createElement('option');
            opt.appendChild( document.createTextNode(element.campos_nombre));
            opt.value = element.campos_id; 
            select.appendChild(opt);
        });
    }



    let thisChecks = document.getElementsByTagName("input");

    for (let i = 0; i < thisChecks.length; i++) {
        if (thisChecks[i].type == "checkbox"){
            thisChecks[i].addEventListener("change", function(){
                if (this.checked == true){
                    this.parentElement.children[1].innerText = "Si"
                }else{
                    this.parentElement.children[1].innerText = "No"
                }
            })
        }
    }

    _filtros.forEach( _input => {
        if (_input.type == "checkbox"){
            these(_input.nombre)[0].addEventListener("change", filtrar)
        }else if (_input.type == "input"){
            these(_input.nombre)[0].onkeyup = filtrar
        }
    })
})

function filtrar(){
    let _res = datos
    let _valor = ""
    let _filtrar = ""

    _filtros.forEach( _input => {
        if (these(_input.nombre)[0].type == "checkbox"){
            _valor = these(_input.nombre)[0].checked
            _filtrar = these(_input.nombre)[0].dataset.dato

            if(_valor == true){
                _res = _res.filter(dato => { return ((dato[_filtrar] == "1") ? true : false) == _valor })
            }

        }else if (these(_input.nombre)[0].type == "select-one"){
            _valor = these(_input.nombre)[0].value
            _filtrar = these(_input.nombre)[0].dataset.dato

            if(_valor != 0){
                _res = _res.filter(dato => { return dato[_filtrar] ==  _valor })
            }

        }else{
            _valor = these(_input.nombre)[0].value
            _filtrar = these(_input.nombre)[0].dataset.dato
            _res = _res.filter(dato => { 
                let _el = String(dato[_filtrar]).toLowerCase()
                _valor = String(_valor).toLowerCase()
                return _el.includes(_valor) 
            })
        }
    })

    construirFila(_res)
}

function construirFila(_dato){
    
    the("tabla").innerHTML = ""
    let contador = 0
    _dato.forEach( fila =>{
        contador++
        let _res = document.createElement("tr")

        _tabla.forEach( _td => {
            let td = document.createElement("td")

            if (_td.oculto == true){
                td.classList.add("d-none", "d-lg-table-cell")
            }

            if (_td.type == "bool"){
                td.innerText = (fila[_td.nombre] == "1") ? "Si" : "No"
            }else if (_td.type == "image"){
                let _im = document.createElement("img")
                _im.classList.add("rounded")
                _im.width = 40
                _im.height = 40
                _im.loading = "lazy"
                _im.src = fila[_td.nombre]

                td.appendChild(_im)
            }else{
                td.innerText = fila[_td.nombre]
            }

            _res.appendChild(td)
        })

        _res.appendChild(construirOpciones(fila, (contador == datos.length) ? true : false))

        the("tabla").appendChild(_res)
    })
}

function construirOpciones(_fila,last){
    let _res = document.createElement("td")

    let _div = document.createElement("div")
    _div.classList.add("btn-group", "dropleft")

    if (last == true) {
        _div.classList.add("dropup")
    }

    let _boton = document.createElement("button")
    _boton.id = "btnGroupDrop" + _fila.inspeccion_id
    _boton.type = "button"
    _boton.classList.add("btn", "dropdown-toggle")
    _boton.dataset.toggle = "dropdown"
    _boton.innerHTML = iconos.tool

    _div.appendChild(_boton)

    let _divMenu = document.createElement("div")
    _divMenu.classList.add("dropdown-menu","dropdown-menu-right")

    let _aMod = document.createElement("a")
    _aMod.classList.add("dropdown-item")
    _aMod.href = "inspeccion/edit/"+ _fila.inspeccion_id

    let _aModDiv = document.createElement("div")
    _aModDiv.classList.add("d-flex", "justify-content-between", "align-items-center")
    _aModDiv.innerHTML = "Modificar " + iconos.pen

    _aMod.appendChild(_aModDiv)

    _divMenu.appendChild(_aMod)

    let _sep = document.createElement("div")
    _sep.classList.add("dropdown-divider")

    _divMenu.appendChild(_sep)

    let _aElim = document.createElement("a")
    _aElim.classList.add("dropdown-item", "delete")
    _aElim.dataset.id = _fila.inspeccion_id
    _aElim.onclick = eliminarElemento

    let _aElimDiv = document.createElement("div")
    _aElimDiv.classList.add("d-flex", "justify-content-between", "align-items-center")
    _aElimDiv.innerHTML = "Eliminar " + iconos.trash

    _aElim.appendChild(_aElimDiv)
    _divMenu.appendChild(_aElim)
    _div.appendChild(_divMenu)
    _res.appendChild(_div)

    return _res
}

function eliminarElemento(){
    make.deleteModal("el inspeccion", this.dataset.id, function(){
        window.location.href = '/inspeccion/delete/'+this.dataset.delete;
    });
}

function poblarClientes(){

    var ufs = document.getElementsByClassName("cliente-dinamic")

    for (let i = 0; i < ufs.length; i++) {
        let cliente_id = ufs[i].dataset.cliente

        let _res = [...clientes]
        _res = _res.filter(dato => { return dato.cliente_id == cliente_id })

        ufs[i].innerText = _res[0].cliente_nombre

    }
}

function poblarCampos(){

    var ufs = document.getElementsByClassName("campo-dinamic")

    for (let i = 0; i < ufs.length; i++) {
        let campo_id = ufs[i].dataset.campo

        let _res = [...campos]
        _res = _res.filter(dato => { return dato.campos_id == campo_id })

        ufs[i].innerText = _res[0].campos_nombre
    }
}

function selectRegiones(){

    let opcion = these("region_id")[0]

    regiones.forEach(function(element) {
        let opt = document.createElement('option');
        opt.appendChild( document.createTextNode(element.region_nombre));
        opt.value = element.region_numero; 
        opcion.appendChild(opt);
    });

    opcion.onchange()

}