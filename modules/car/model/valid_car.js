function validate_car(texto) {
    if (texto.length > 0) {
        var reg = /^[a-zA-Z]*$/;
        return reg.test(texto);
    }
    return false;
}

function validate_modelo(texto) {
    if (texto.length > 0) {
        var reg = /^[a-zA-Z0-9]*$/;
        return reg.test(texto);
    }
    return false;
}

function validate_estado(texto) {
    if (texto.length > 0) {
        var reg = /^[a-zA-Z0-0{1}]*$/;
        return reg.test(texto);
    }
    return false;
}

function validate_bastidor(texto) {
    if (texto.length > 0) {
        var reg = /^[0-9]*$/;
        return reg.test(texto);
    }
    return false;
}

function validate_matricula(texto) {
    if (texto.length > 0) {
        var reg = /^[A-Z{3} 0-9 {4}]*$/;
        return reg.test(texto);
    }
    return false;
}

function validate_puertas(texto) {
    var i;
    var ok = 0;
    for (i = 0; i < texto.length; i++) {
        if (texto[i].checked) {
            ok = 1
        }
    }

    if (ok == 1) {
        return true;
    }
    if (ok == 0) {
        return false;
    }
}

function validate_ex_visual(array) {
    var check = false;
    for (var i = 0, l = array.options.length, o; i < l; i++) {
        o = array.options[i];
        if (o.selected) {
            check = true;
        }
    }
    return check;
}

function validate_ex_tecnico(array) {
    var i;
    var ok = 0;
    for (i = 0; i < array.length; i++) {
        if (array[i].checked) {
            ok = 1
        }
    }

    if (ok == 1) {
        return true;
    }
    if (ok == 0) {
        return false;
    }
}








function validate() {

    var check = true;

    if (document.alta_car.marca.value.length == 0) {

        document.getElementById("error_marca").innerHTML = ("Tiene que escribir la marca.");
        document.alta_car.marca.focus();
        check = false;
        return check;

    } else {
        var v_marca = validate_car(document.getElementById("marca").value);

        if (v_marca) {
            document.getElementById("error_marca").innerHTML = (" ");
        } else {
            document.getElementById("error_marca").innerHTML = ("La marca introducida no es valida.");
            document.alta_car.marca.focus();
            check = false;
            return check;
        }

    }

    if (document.alta_car.modelo.value.length == 0) {

        document.getElementById("error_modelo").innerHTML = ("Tiene que escribir el modelo.");
        document.alta_car.modelo.focus();
        check = false;
        return check;

    } else {
        var v_modelo = validate_modelo(document.getElementById("modelo").value);

        if (v_modelo) {
            document.getElementById("error_modelo").innerHTML = (" ");
        } else {
            document.getElementById("error_modelo").innerHTML = ("El modelo introducid no es valido.");
            document.alta_car.modelo.focus();
            check = false;
            return check;
        }

    }

    if (document.alta_car.estado.value.length == 0) {

        document.getElementById("error_estado").innerHTML = ("Tiene que escribir el estado.");
        document.alta_car.estado.focus();
        check = false;
        return check;

    } else {
        var v_estado = validate_estado(document.getElementById("estado").value);

        if (v_estado) {
            document.getElementById("error_estado").innerHTML = (" ");
        } else {
            document.getElementById("error_estado").innerHTML = ("El estado introducido no es valido.");
            document.alta_car.estado.focus();
            check = false;
            return check;
        }

    }

    if (document.alta_car.num_bast.value.length == 0) {

        document.getElementById("error_bastidor").innerHTML = ("Tiene que escribir el bastidor");
        document.alta_car.num_bast.focus();
        check = false;
        return check;

    } else {
        var v_num_bast = validate_bastidor(document.getElementById("num_bast").value);

        if (v_num_bast) {
            document.getElementById("error_bastidor").innerHTML = (" ");
        } else {
            document.getElementById("error_bastidor").innerHTML = ("El bastidor introducido no es valido.");
            document.alta_car.num_bast.focus();
            check = false;
            return check;
        }

    }

    if (document.alta_car.matricula.value.length == 0) {

        document.getElementById("error_matricula").innerHTML = ("Tiene que escribir la matricula");
        document.alta_car.matricula.focus();
        check = false;
        return check;

    } else {
        var v_matricula = validate_matricula(document.getElementById("matricula").value);

        if (v_matricula) {
            document.getElementById("error_matricula").innerHTML = (" ");
        } else {
            document.getElementById("error_matricula").innerHTML = ("La matricula introducida no es valida.");
            document.alta_car.matricula.focus();
            check = false;
            return check;
        }

    }

    if (document.alta_car.color.value.length == 0) {

        document.getElementById("error_color").innerHTML = ("Tiene que escribir el color");
        document.alta_car.color.focus();
        check = false;
        return check;

    } else {
        var v_color = validate_car(document.getElementById("color").value);

        if (v_color) {
            document.getElementById("error_color").innerHTML = (" ");
        } else {
            document.getElementById("error_color").innerHTML = ("El color introducido no es valido.");
            document.alta_car.color.focus();
            check = false;
            return check;
        }
    }

    if (document.alta_car.puertas.value.length == 0) {

        document.getElementById("error_puertas").innerHTML = ("Cuantas puertas son?");
        check = false;
        return check;

    } else {
        var v_puertas = validate_puertas(document.getElementById("puertas").value);

        if (v_puertas) {
            document.getElementById("error_puertas").innerHTML = (" ");
        } else {
            document.getElementById("error_puertas").innerHTML = ("");
            document.alta_car.puertas.focus();
            check = false;
            return check;
        }

    }

    if (document.alta_car.fecha.value.length == 0) {

        document.getElementById("error_fecha").innerHTML = ("Tienes que poner una fecha.");
        document.alta_car.fecha.focus();
        check = false;
        return check;
    }

    if (document.alta_car.ex_visual.value.length == 0) {

        document.getElementById("error_ex_visual").innerHTML = ("Selecciona un extra visual porfavor.");
        document.alta_car.ex_visual.focus();
        check = false;
        return check;

    } else {
        var v_ex_visual = validate_ex_visual(document.getElementById("ex_visual[]").value);

        if (v_ex_visual) {
            document.getElementById("error_ex_visual").innerHTML = (" ");
        } else {
            document.getElementById("error_ex_visual").innerHTML = ("Los extras introducidos no son validos.");
            document.alta_car.ex_visual.focus();
            check = false;
            return check;
        }

    }

    if (document.alta_car.ex_tecnico.value.length == 0) {

        document.getElementById("error_ex_tecnico").innerHTML = ("Selecciona un extra tecnico porfavor.");
        document.alta_car.ex_tecnico.focus();
        check = false;
        return check;

    } else {
        var v_ex_tecnico = validate_ex_tecnico(document.getElementById("ex_tecnico[]").value);

        if (v_ex_tecnico) {
            document.getElementById("error_ex_tecnico").innerHTML = (" ");
        } else {
            document.getElementById("error_ex_tecnico").innerHTML = ("Los extras introducidos no son validos.");
            document.alta_car.ex_tecnico.focus();
            check = false;
            return check;
        }

    }





    document.alta_car.submit();
    document.alta_car.action = "index.php?modules=car&op=create";

    check = true;
    return check;

}







function validate_update() {

    var check = true;

    if (document.update_car.marca.value.length == 0) {

        document.getElementById("error_marca_update").innerHTML = ("Tiene que escribir la marca.");
        document.update_car.marca.focus();
        check = false;
        return check;

    } else {
        var v_marca = validate_car(document.getElementById("marca").value);

        if (v_marca) {
            document.getElementById("error_marca_update").innerHTML = (" ");
        } else {
            document.getElementById("error_marca_update").innerHTML = ("La marca introducida no es valida.");
            document.update_car.marca.focus();
            check = false;
            return check;
        }

    }

    if (document.update_car.modelo.value.length == 0) {

        document.getElementById("error_modelo_update").innerHTML = ("Tienes que escribir el modelo.");
        document.update_car.modelo.focus();
        check = false;
        return check;

    } else {
        var v_modelo = validate_modelo(document.getElementById("modelo").value);

        if (v_modelo) {
            document.getElementById("error_modelo_update").innerHTML = (" ");
        } else {
            document.getElementById("error_modelo_update").innerHTML = ("El modelo introducido no es valido.");
            document.update_car.modelo.focus();
            check = false;
            return check;
        }

    }

    if (document.update_car.estado.value.length == 0) {

        document.getElementById("error_estado_update").innerHTML = ("Tienes que escribir el estado.");
        document.update_car.estado.focus();
        check = false;
        return check;

    } else {
        var v_estado = validate_estado(document.getElementById("estado").value);

        if (v_estado) {
            document.getElementById("error_estado_update").innerHTML = (" ");
        } else {
            document.getElementById("error_estado_update").innerHTML = ("El estado introducido no es valido.");
            document.update_car.estado.focus();
            check = false;
            return check;
        }

    }

    if (document.update_car.matricula.value.length == 0) {

        document.getElementById("error_matricula_update").innerHTML = ("Tienes que escribir la matricula.");
        document.update_car.matricula.focus();
        check = false;
        return check;

    } else {
        var v_matricula = validate_matricula(document.getElementById("matricula").value);

        if (v_matricula) {
            document.getElementById("error_matricula_update").innerHTML = (" ");
        } else {
            document.getElementById("error_matricula_update").innerHTML = ("La matricula introducida no es valida.");
            document.update_car.matricula.focus();
            check = false;
            return check;
        }

    }

    if (document.update_car.color.value.length == 0) {

        document.getElementById("error_color_update").innerHTML = ("Tienes que escribir el color.");
        document.update_car.color.focus();
        check = false;
        return check;

    } else {
        var v_color = validate_car(document.getElementById("color").value);

        if (v_color) {
            document.getElementById("error_color_update").innerHTML = (" ");
        } else {
            document.getElementById("error_color_update").innerHTML = ("El color introducido no es valido.");
            document.update_car.color.focus();
            check = false;
            return check;
        }

    }

    document.update_car.submit();
    document.update_car.action = "index.php?modules=car&op=update"

    check = true;
    return check;
}


function loadContentModal() {
    $('.car').on("click", function() {
        var id = this.getAttribute('id');

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: "modules/car/crtl/crtl_car.php?op=read_modal&id=" + id,
            //////
        }).done(function(jsonCar) {
            $('<div></div>').attr('id', 'detailsCars', 'type', 'hidden').appendTo('#modalcontent');
            $('<div></div>').attr('id', 'containerCars').appendTo('#detailsCars');
            $('#containerCars').empty();
            $('<div></div>').attr('id', 'Div1').appendTo('#containerCars');
            $('#Div1').html(function() {
                var content = "";
                for (row in jsonCar) {
                    content += '<br><span data-tr ="' + row + '">' + row + '</span>: <span id =' + row + '>' + jsonCar[row] + '</span>'
                } // end_for
                return content;
            });
            changeLang();
            showModal(jsonCar.marca, jsonCar.id, jsonCar.matricula);
        }).fail(function() {
            window.location.href = 'index.php?modules=exception&op=503&error=fail_modal&type=503';
        });
    });
} // end_loadContentModal


function showModal(marca, id, matricula) {
    $("#containerCars").show();
    $("#containerCars").dialog({
        title: marca,
        width: 850,
        height: 500,
        resizable: "false",
        modal: "true",
        hide: "fold",
        show: "fold",
        buttons: {
            Update: function() {
                window.location.href = 'index.php?modules=car&op=update&id=' + id;
            },
            Delete: function() {
                window.location.href = 'index.php?modules=car&op=delete&matricula=' + matricula;
            }
        } // end_Buttons
    }); // end_Dialog
} // end_showModal




function loadCarDivs() {
    $('<table></table>').attr('id', 'car').appendTo('#list-cars');
} // end_loadCarDivs

function shop() {
    $(document).on('click', '.shop', function() {
        window.location.href = "index.php?modules=shop&op=list";
        localStorage.removeItem('details')
        localStorage.removeItem('move');
    });
}





$(document).ready(function() {
    shop();
    loadContentModal();

});