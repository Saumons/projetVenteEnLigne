//#region Header
if (document.getElementById("menu-tel") != null) {
    let menu = document.getElementById("menu-tel")
    menu.addEventListener("click", () => {
        menu.classList.toggle("close")
    });
}

function toggleMenu() {
    var menu = document.getElementById("menu");
    menu.style.display = menu.style.display === "block" ? "none" : "block";
}

if (document.getElementById("profile-menu") != null) {
    document.addEventListener("click", function(event) {
        var profileMenu = document.querySelector(".profile-menu");
        if (!profileMenu.contains(event.target)) {
            document.getElementById("menu").style.display = "none";
        }
    });
}
//#endregion
if (document.getElementById("BouttonMDP")!= null) {
    let bouttons = document.getElementById( 'BouttonMDP' )
    bouttons.addEventListener( "click", function() {
        attribut = document.getElementById( 'mdp' ).getAttribute( 'type');
        if(attribut == 'password'){

            document.getElementById( 'mdp' ).setAttribute( 'type', 'text');
            document.getElementById( 'BouttonMDP' ).value = "Cacher le mot de passe";
            if(document.getElementById("mdpConf")!= null)
            {
                document.getElementById( 'mdpConf' ).setAttribute( 'type', 'text');
            }
        } else {
            document.getElementById( 'mdp' ).setAttribute( 'type', 'password');
            document.getElementById( 'BouttonMDP' ).value = "Afficher le mot de passe";
            if(document.getElementById("mdpConf")!= null)
            {
                document.getElementById( 'mdpConf' ).setAttribute( 'type', 'password');
            }
        }
    });
}

if (document.getElementById("bouttonLogout")!= null) {
    let bouttonNVCompte = document.getElementById("bouttonLogout")
    bouttonNVCompte.addEventListener("click", () => {
        location.href = "../php/logout.php"
    });
}

if (document.getElementById("bouttonNVCompte")!= null) {
    let bouttonNVCompte = document.getElementById("bouttonNVCompte")
    bouttonNVCompte.addEventListener("click", () => {
        location.href = "inscription.php"
    });
}

else if (document.getElementById("bouttonDejaCompte")!= null)
{let bouttonDejaCompte = document.getElementById("bouttonDejaCompte")
    bouttonDejaCompte.addEventListener("click", () => {
        location.href = "connexion.php"
    });
}
