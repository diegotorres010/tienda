$(document).ready(function () {
    $('#tabTienda').click(function () {
        $(this).removeAttr('href')
        $(this).removeAttr('data-toggle')
        if ($('[name="nuevoHost"]').val().length < 1) {
            $('#alertError').html('Nombre de host o ip vacío').show()
        } else if ($('[name="nuevoBD"]').val().length < 1) {
            $('#alertError').html('Nombre de la base de datos vacío').show()
        } else if ($('[name="nuevoUsuarioBD"]').val().length < 1) {
            $('#alertError').html('Nombre del usuario de la base de datos vacío').show()
        } else {
            $('#alertError').hide()
            $(this).attr({ 'href': '#tiendatab', 'data-toggle': 'tab' })
            setTimeout(function () {
                $(this).click()
            }, 100)
        }
    });

    $('#tabUsuario').click(function () {
        $(this).removeAttr('href')
        $(this).removeAttr('data-toggle')

        if ($('[name="nuevaTiendaNombre"]').val().length < 1) {
            $('[name="nuevaTiendaNombre"]').focus();
            $('#alertError').html('Nombre de la tienda vacío').show()
        } else if ($('[name="nuevaTiendaDireccion"]').val().length < 1) {
            $('[name="nuevaTiendaDireccion"]').focus();
            $('#alertError').html('Dirección vacío').show()
        } else if ($('[name="nuevaTiendaTelefono"]').val().length < 1) {
            $('[name="nuevaTiendaTelefono"]').focus();
            $('#alertError').html('Teléfono vacío').show()
        } else if ($('[name="nuevaTiendaPropietario"]').val().length < 1) {
            $('[name="nuevaTiendaPropietario"]').focus();
            $('#alertError').html('Propietario vacío').show()
        } else if ($('[name="nuevaTiendaEmail"]').val().length < 1) {
            $('[name="nuevaTiendaEmail"]').focus();
            $('#alertError').html('Email vacío').show()
        } else if (!validateEmail($('[name="nuevaTiendaEmail"]').val())) {
            $('[name="nuevaTiendaEmail"]').focus();
            $('#alertError').html('Email inválido').show()
        } else {
            $('#alertError').hide()
            $(this).attr({ 'href': '#usuariotab', 'data-toggle': 'tab' })
            setTimeout(function () {
                $(this).click()
            }, 100)
        }
    });


    $('#tabSistema').click(function () {
        $(this).removeAttr('href')
        $(this).removeAttr('data-toggle')
        if ($('[name="nuevoTipoDoc"]').val().length < 1) {
            $('#alertError').html('Nombre de la tienda vacío').show()
        } else if ($('[name="nuevoDocumentoId"]').val().length < 1) {
            $('#alertError').html('Dirección vacío').show()
        } else if ($('[name="nuevoTercero"]').val().length < 1) {
            $('#alertError').html('Teléfono vacío').show()
        } else if ($('[name="nuevoTelefono"]').val().length < 1) {
            $('#alertError').html('Propietario vacío').show()
        } else if ($('[name="nuevoEmail"]').val().length < 1) {
            $('#alertError').html('Email vacío').show()
        } else if ($('[name="nuevaDireccion"]').val().length < 1) {
            $('#alertError').html('Email vacío').show()
        } else if ($('[name="nuevaFechaNacimiento"]').val().length < 1) {
            $('#alertError').html('Email vacío').show()
        } else if ($('[name="nuevoGeneroTercero"]').val().length < 1) {
            $('#alertError').html('Email vacío').show()
        } else if ($('[name="nuevoTipoTercero"]').val().length < 1) {
            $('#alertError').html('Email vacío').show()
        } else {
            $('#alertError').hide()
            $(this).attr({ 'href': '#sistematab', 'data-toggle': 'tab' })
            setTimeout(function () {
                $(this).click()
            }, 100)
        }
    });
});

/*var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");  

  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Siguiente";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}*/

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
