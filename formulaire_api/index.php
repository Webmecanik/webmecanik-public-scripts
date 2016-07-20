<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html>
  <head>
    <title></title>
    <meta charset="UTF-8">
    </head>
    <body>

      <form id="formulaire_test" onSubmit="return atmt(this, mappingFields_form1, urlAutomation);">
        <fieldset>
          <legend>Votre identité</legend>

          <label for="civilite">Civilité</label>
          <br>
          <input id="civilite" type="radio" name="civilite" value="Mr">Mr<br>
          <input id="civilite" type="radio" name="civilite" value="Mrs">Mrs<br>
          <input id="civilite" type="radio" name="civilite" value="Miss" checked>Miss<br>
          <br/>
          <label for="nom">Nom</label>
          <input id="nom" name="nom" type="text" placeholder="Nom" required autofocus>
          <br/>
          <label for="email">Email</label>
          <input id="email" name="email" type="email" placeholder="exemple@domain.com" required>
          <br/>
          <label for="tel">Téléphone</label>
          <input id="tel" name="tel" type="text" placeholder="+33" required>
        </fieldset>

        <fieldset>
          <legend>Informations</legend>

          <label for="date">Date de naissance</label>
          <input id="date" name="date" type="date" placeholder="2012-12-21" required>
          <br>
          <label for="nac">Animaux de compagnie : </label>
          <br>
          <input type="checkbox" id="nac1" name="nac[]" value="chat" checked><label for="nac1">Chat</label>
          <br>
          <input type="checkbox" id="nac2" name="nac[]" value="chien"><label for="nac2">Chien</label>
          <br>
          <input type="checkbox" id="nac3" name="nac[]" value="oiseau"><label for="nac3">Oiseau</label>
          <br>
          <input type="checkbox" id="nac4" name="nac[]" value="poisson" checked><label for="nac4">Poisson</label>
          <br>
          <input type="checkbox" id="nac5" name="nac[]" value="poney"><label for="nac5">Poney</label>
          <br>
          <input type="checkbox" id="nac6" name="nac[]" value="ornithorynque" checked><label for="nac6">Ornithorynque</label>
          <br>
          <br>
          <label for="carlist">Voitures : </label>
          <select id="carlist" name="carlist" select-multiple>
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="opel">Opel</option>
            <option value="audi">Audi</option>
          </select>
        </fieldset>
        <br/>
        <button type="submit">OK</button>
      </form>

      <footer>
        <script type="text/javascript">
          var urlAutomation = "https://test0719-1.automation.webmecanik.com";
          var mappingFields_form1 = {
            // "id input" : "alias atmt",
            "civilite" : "title",
            "nom" : "firstname",
            "email" : "email",
            "tel" : "phone",
            "date" : "anniversaire",
            "nac1" : "chat",
            "nac2" : "chien",
            "nac3" : "oiseau",
            "nac4" : "poisson",
            "nac5" : "poney",
            "nac6" : "ornithorynque",
            "carlist" : "liste_des_voitures",
          };   
        </script>
        <script src="js/atmt_form_mapper.js"></script>

      </footer>    
    </body>
</html>
