let modal = null

const openModal = function (e) {
    e.preventDefault()
    const target = document.querySelector(e.target.getAttribute('href'))
    console.log(target)
    target.style.display = null
    target.removeAttribute('aria-hidden')
    target.setAttribute('aria-modal', 'true')
    modal = target
    modal.addEventListener('click', closeModal)
    modal.querySelector('.js-modal-close').addEventListener('click', closeModal)
    modal.querySelector('.js-modal-stop').addEventListener('click', stopPropagation)
}

const closeModal = function (e) {
    if (modal === null) return
    e.preventDefault()
    modal.style.display = 'none'
    modal.setAttribute('aria-hidden', 'true')
    modal.removeAttribute('aria-modal')
    modal.removeEventListener('click', closeModal)
    modal.querySelector('.js-modal-close').removeEventListener('click', closeModal)
    modal.querySelector('.js-modal-stop').removeEventListener('click', stopPropagation)
    modal = null
}

const stopPropagation = function (e) {
    e.stopPropagation()
}


document.querySelectorAll('.js-modal').forEach(a => {
    a.addEventListener('click', openModal)
})

window.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' || e.key === 'Esc') {
        closeModal(e)
    }
})

var requete = new XMLHttpRequest()

requete.onload = function () {
    //La variable à passer est alors contenue dans l'objet response et l'attribut responseText.
    var userlist = this.responseText
}
requete.open(get, script.php, true) //True pour que l'exécution du script continue pendant le chargement, false pour attendre.
requete.send()


// Autocomplete

/*$( function() {
    var names = [ "Jörn Zaefferer", "Frédérico González", "John Resig" ];
 
    var accentMap = {
      "é": "e",
      "è": "e"
    };
    var normalize = function( term ) {
      var ret = "";
      for ( var i = 0; i < term.length; i++ ) {
        ret += accentMap[ term.charAt(i) ] || term.charAt(i);
      }
      return ret;
    };
 
    $( "#input_recherche" ).autocomplete({
      source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex( request.term ), "i" );
        response( $.grep( names, function( value ) {
          value = value.label || value.value || value;
          return matcher.test( value ) || matcher.test( normalize( value ) );
        }) );
      }
    });
  } );*/


// Test formulaire inscription 

$(function () {
    $('#submit_inscription').click(function () {
        valid = true
        if ($('#first_name_inscription').val() == '') {
            $('#first_name_inscription').css('border-color', '#FF0000')
            $('#first_name_inscription').next('.error_message').fadeIn().text('Veuillez entrer votre nom')
            valid = false
        } else {
            $('#first_name_inscription').fadeOut()
        }
        return valid
    })
})


$(function () {

    $('#first_name_inscription').keyup(function () {
        if (!$('#first_name_inscription').val().match(/^[a-zA-Z-é$êâöëäâ]+$/i)) {
            $('#first_name_inscription').css('box-shadow', '0em 0.1em 0em 0em rgb(255,0,0)')
            $('#first_name_inscription').css('border-bottom', '0.1em solid rgb(255,0,0, 0.7)')
        } else {
            $('#first_name_inscription').next('.error_message').hide().text('')
            $('#first_name_inscription').css('border-bottom', '0.1em solid rgb(0,128,0)')
            $('#first_name_inscription').css('box-shadow', '0em 0.1em 0em 0em rgb(0,128,0)')
        }
    })
})

$(function () {
    $('#last_name_inscription').keyup(function () {
        if (!$('#last_name_inscription').val().match(/^[a-zA-Z-é$êâöëäâ]+$/i)) {
            $('#last_name_inscription').css('box-shadow', '0em 0.1em 0em 0em rgb(255,0,0)')
            $('#last_name_inscription').css('border-bottom', '0.1em solid rgb(255,0,0, 0.7)')
        } else {
            $('#last_name_inscription').next('.error_message').hide().text('')
            $('#last_name_inscription').css('border-bottom', '0.1em solid rgb(0,128,0)')
            $('#last_name_inscription').css('box-shadow', '0em 0.1em 0em 0em rgb(0,128,0)')
        }
    })
})

$(function () {
    $('#pseudo_inscription').keyup(function () {
        if (!$('#pseudo_inscription').val().match(/^[a-zA-Z-é$êâöëäâ]+$/i)) {
            $('#pseudo_inscription').css('box-shadow', '0em 0.1em 0em 0em rgb(255,0,0)')
            $('#pseudo_inscription').css('border-bottom', '0.1em solid rgb(255,0,0, 0.7)')
        } else {
            $('#pseudo_inscription').next('.error_message').hide().text('')
            $('#pseudo_inscription').css('border-bottom', '0.1em solid rgb(0,128,0)')
            $('#pseudo_inscription').css('box-shadow', '0em 0.1em 0em 0em rgb(0,128,0)')
        }
    })
})
var password = document.getElementById('password_inscription')
console.log(password)
$('#password_inscription').keyup(function () {
    if (!$('#password_inscription').val().match(/^[a-z0-9]{8,}$/i)) {
        $('#password_inscription').css('box-shadow', '0em 0.1em 0em 0em rgb(255,0,0)')
        $('#password_inscription').css('border-bottom', '0.1em solid rgb(255,0,0, 0.7)')
        password.setCustomValidity('Votre mot de passe doit comporter 8 caractères au moins')
        //$("#password_inscription").next(".error_message").show().text("Vote mot de passe doit comporter au moins 8 caractères");
    } else {
        $('#password_inscription').next('.error_message').hide().text('')
        $('#password_inscription').css('border-bottom', '0.1em solid rgb(0,128,0, 0.7)')
        $('#password_inscription').css('box-shadow', '0em 0.1em 0em 0em rgb(0,128,0)')
    }
})

var email = document.getElementById('mail_inscription')
email.addEventListener('keyup', function (event) {
    if (email.validity.typeMismatch) {
        email.style.borderBottom = '0.1em solid rgb(255,0,0, 0.7)'
        email.style.boxShadow = '0em 0.1em 0em 0em rgb(255,0,0)'
    } else {
        email.style.borderBottom = '0.1em solid rgb(0,128,0, 0.7)'
        email.style.boxShadow = '0em 0.1em 0em 0em rgb(0,128,0)'
    }
})

var dob = document.getElementById('dob')
dob.addEventListener('click', function (event) {
    if (dob.validity.typeMismatch) {
        dob.style.borderBottom = '0.1em solid rgb(255,0,0, 0.7)'
        dob.style.boxShadow = '0em 0.1em 0em 0em rgb(255,0,0)'
    } else {
        dob.style.borderBottom = '0.1em solid rgb(0,128,0, 0.7)'
        dob.style.boxShadow = '0em 0.1em 0em 0em rgb(0,128,0)'
    }
})

/*function validatePassword() {
  var pass1 = document.getElementById("password_inscription").value;
  var pass2 = document.getElementById("password_confirm_inscription").value;
  var pass_confirm = document.getElementById("password_confirm_inscription");
    if(pass2 != pass1) {
      pass_confirm.setCustomValidity("Les mots de passe ne correspondent pas")
      pass_confirm.style.borderBottom="0.1em solid rgb(255,0,0, 0.7)";
      pass_confirm.style.boxShadow ="0em 0.1em 0em 0em rgb(255,0,0)";
    }

  /*pass1 != pass2 ? document.getElementById("password_confirm_inscription").setCustomValidity("Les mots de passe ne correspondent pas") : document.getElementById("password_confirmation").setCustomValidity('');
  pass_confirm.style.borderBottom="0.1em solid rgb(255,0,0, 0.7)";
  pass_confirm.style.boxShadow ="0em 0.1em 0em 0em rgb(0,128,0)";
  }
  
  document.getElementsByName("submit")[0].onclick = validatePassword;*/

var pass_confirm = document.getElementById('password_confirm_inscription')
pass_confirm.addEventListener('keyup', function (event) {
    var pass1 = document.getElementById('password_inscription').value
    var pass2 = document.getElementById('password_confirm_inscription').value
    if (pass2 != pass1) {
        pass_confirm.setCustomValidity('Les mots de passe ne correspondent pas')
        pass_confirm.style.borderBottom = '0.1em solid rgb(255,0,0, 0.7)'
        pass_confirm.style.boxShadow = '0em 0.1em 0em 0em rgb(255,0,0)'
    } else {
        pass_confirm.style.borderBottom = '0.1em solid rgb(0,128,0, 0.7)'
        pass_confirm.style.boxShadow = '0em 0.1em 0em 0em rgb(0,128,0)'
    }
})


//AJAX

window.onload = initAll
var xhr = null
var departements = new Array()

function initAll() {
    document.getElementById('formulaire').onkeyup = searchSuggest
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest()
    } else {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject('Microsoft.XMLHTTP')
            } catch (e) {}
        }
    }
    if (xhr) {
        xhr.onreadystatechange = setdepartements
        xhr.open('GET', 'departements.xml', true)
        xhr.send(null)
    } else {
        alert('Désolé, votre navigateur n\'est pas compatble avec AJAX')
    }
}

function setdepartements() {
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            if (xhr.responseXML) {
                var tousdepartements = xhr.responseXML.getElementsByTagName('item')
                for (var i = 0; i < tousdepartements.length; i++) {
                    departements[i] = tousdepartements[i].getElementsByTagName('dep')[0].firstChild
                }
            }
        } else {
            alert('Il y a un probl�me avec la requ�te ' + xhr.status)
        }
    }
}


function searchSuggest() {
    var str = document.getElementById('formulaire').value
    document.getElementById('formulaire').className = ''
    if (str != '') {
        document.getElementById('popups').innerHTML = ''
        for (var i = 0; i < departements.length; i++) {
            var ce_departement = departements[i].nodeValue
            if (ce_departement.toLowerCase().indexOf(str.toLowerCase()) == 0) {
                var tempDiv = document.createElement('div')
                tempDiv.innerHTML = ce_departement
                tempDiv.onclick = choix
                tempDiv.className = 'suggestions'
                document.getElementById('popups').appendChild(tempDiv)
            }
        }
        var liste = document.getElementById('popups').childNodes.length
        if (liste == 0) {
            document.getElementById('formulaire').className = 'error'
        }
        if (liste == 1) {
            document.getElementById('formulaire').value = document.getElementById('popups').firstChild.innerHTML
            document.getElementById('popups').innerHTML = ''
        }
    }
}


function choix(evt) {
    var thisDiv = (evt) ? evt.target : window.event.srcElement
    document.getElementById('formulaire').value = thisDiv.innerHTML
    document.getElementById('popups').innerHTML = ''
}
