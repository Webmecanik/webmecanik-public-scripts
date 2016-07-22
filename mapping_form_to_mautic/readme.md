# Envoyer des données d'un formulaire html vers Automation

A diposition, vous trouverez un exemple dans le fichier ``index.html``.

## Comment je l'intègre ? 
* Intégrer le script js **atmt_form_mapper.js** dans votre page : ``<script src="js/mautic_form_mapper.js"></script>``
* Ajouter la variable js qui va contenir l'url de votre instance Automation : ``var urlAutomation = "https://test0719-1.automation.webmecanik.com";``
* Ajouter ensuite le tableau qui va contenir la correspondance des champs de votre formulaire avec les alias des champs de votre instance Automation : ``var mappingFields_form1 = {"civilite" : "title", "prenom" : "lastname"};``
* Et enfin ajouter l'attribut **onSubmit** à la balise de votre formulaire qui appelle la fonction **atmt()**. Elle prend en parametres dans l'ordre : le formulaire, le tableau de mapping, et le nom de l'instance Automation :``<form id="formulaire_test" onSubmit="return form_mapper(this, mappingFields_form1, urlAutomation);">``


## Comment envoyer une nouvelle données dans l'instance Automation  ?
* Ajouter le champ input dans votre formualire html : ``<input id="nom" name="nom" type="text" placeholder="Nom" required>``
* Il faut mettre à jour le tableau de mapping. En clés, il faut mettre l'id de ce champ et en valeur, l'alias du champ dans Automation : ``var mappingFields_form1 = {"civilite" : "title", "prenom" : "lastname", "nom" : "firstname"};``
* Il faut que le [champ personnalisé](http://fr.support.webmecanik.com/leads/manage_fields.html#nouveau-champ) existe dans Automation et qu'il puisse être **actualisé publiquement**.

## Que faire en cas d'erreur ?

### Rien ne se passe :
Si le nouveau lead n'apparait pas dans Automation, c'est peut être que :
* Un lead existant à été mis à jour.
* Une (ou plusieurs) donnée(s) éronnée(s) bloque(nt) l'envoi à Automation.
	* Notamment une date invalide : une date doit être envoyée sous le format **AAAA-MM-JJ** et valide (2016-04-35 n'est pas valide). 
	* Pour les champs qui dépendent d'une liste, la valeur que vous envoyez **doit être** dans cette liste.	

### Il me manque des données :
* Si le champ n'existe pas dans Automation, la valeur correspondante ne sera pas ajoutée au contact (les autres champs sont pris en compte).
* Vérifiez que le tableau de correspondance est correct. 
* Vérifiez que tous vos champs personalisés soient actualisables publiquement.
