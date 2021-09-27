<?php
include ("include/entete.inc.php");
?>
  
<div class="container">
  <div style="background:#CFD8DC !important" class="jumbotron">
    <h1 class="display-4">Inscription Utilisateur</h1>
    <p class="lead">Merci de remplir ce formulaire d'inscription.</p>
    <hr class="my-4">
    <p>Vous ferez bientôt parti de nos membres. Vous avez fait le bon choix ;-)</p>
  </div>

  <!-- Formulaire d'inscription -->
  <form  method="post" action="ajoutUser.php"  id="form"  novalidate>
    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label for="prenom">Prénom</label>
        <input type="text" class="form-control"  pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ-]+" minlength="3" maxlength="30" autocomplete="off"  spellcheck="false" name="prenom" id="prenom" placeholder="Votre prénom" required>
        <div class="valid-feedback">
          Prénom Ok !
        </div>
        <div class="invalid-feedback">
          Le champ prénom est obligatoire et doit faire entre 3 et 30 caractères
        </div>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ-]+" autocomplete="off"  spellcheck="false" name="nom"  minlength="3" maxlength="30" id="nom" placeholder="Votre nom" required>
        <div class="valid-feedback">
          Nom Ok !
        </div>
        <div class="invalid-feedback">
          Le champ nom est obligatoire et doit faire entre 3 et 30 caractères
        </div>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label for="email">Adresse électronique</label>
        <input type="email" class="form-control" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="email" placeholder="E-mail" required>
        <small id="emailHelp" class="form-text text-muted">Nous ne partagerons pas votre email.</small>
        <div class="invalid-feedback">
          Vous devez fournir un email valide.
        </div>
      </div>
    </div>
   <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label for="motDePasse1">Confirmation du mot de passe</label>
        <input type="password" oninput='motdepasse1.setCustomValidity(motdepasse1.value != motdepasse1.value ?  "Mot de passe non identique" : "")' class="form-control" id="motdepasse1" name="motdepasse1" minlength="5" maxlength="30" required>
        <div id="message" name="message" class="invalid-feedback">
          Mot de passe invalide il doit contenir au moins 5 caractères et 30 maximum
        </div>
        <div  class="invalid-feedback">
          <p id="erreurMotDePasse"></p>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label for="motDePasse2">Confirmation du mot de passe</label>
        <input type="password" oninput='motdepasse2.setCustomValidity(motdepasse2.value != motdepasse1.value ?  "Mot de passe non identique" : "")' class="form-control" id="motdepasse2" name="motdepasse2" minlength="5" maxlength="30" required>
        <div name="message" class="invalid-feedback">
          Mot de passe invalide il doit contenir au moins 5 caractères et 30 maximum
        </div>
      </div>
    </div>

    <!-- Choix entre Client ou Photographe -->
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
      <label class="btn btn-info">
        <input type="radio" name="choixType" id="client" value="client" checked>
        Client
      </label>
      <label class="btn btn-info">
        <input type="radio" name="choixType" id="Photographe" value="photographe">
        Photographe
      </label>
    </div>
    <br/>
    <input type="submit" value="Valider"  class="btn btn-primary" name="valider" />
  </form>
</div>

<script>

function validationMotDePasse() {
    $motDePasse1=document.getElementById("motdepasse1").value;
    console.log($motDePasse1);
    $motDePasse2=document.getElementById("motdepasse2").value;
    if ($motDePasse1 != $motDePasse2)
    {
      document.getElementById("erreurMotDePasse").value="Erreur";
    }
}

var mail=document.getElementById("email");
mail.addEventListener("blur", function (evt) {
  console.log("Perte de focus pour le mail");
});

var motDePasse=document.getElementById("motdepasse2");
motDePasse.addEventListener("blur", function (evt) {
  validationMotDePasse();
});

(function() {
  "use strict"
  window.addEventListener("load", function() {
    var form = document.getElementById("form")
    form.addEventListener("submit", function(event) {
      if (form.checkValidity() == false) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add("was-validated")
    }, false)
  }, false)

}())
</script>

<?php
  include ("include/piedDePage.inc.php");
?>