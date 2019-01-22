# Send data from a third HTML form to Webmecanik Automation

Check the ``index.html`` file as an example.

## Integration of it
* Integrate the script **mautic_form_mapper.js** in your page: ``<script src="js/mautic_form_mapper.js"></script>``
* Add js variable that contains your Webmecanik Automation instance URL: ``var urlAutomation = "https://mydomain.automation.webmecanik.com";``
* Add the js variable that contains your form ID: ``var mappedFormId = "formulaire_test";``
* Add the array that contains the mapping of your form fields with you Webmecanik Automation contact fields alias: ``var mappingFields_form1 = {"civilite" : "title", "prenom" : "lastname"};``
* Then the **action** attribute can contains
    * ``javascript:;`` if the form doesn't need to do something else that sending the information to your instance: ``<form id="formulaire_test" action="javascript:;">``
    * ``http://mySite.com/treatmentPage.php`` if the form need to send the information to another URL after posting them to your Webmecanik Automation instance:``<form id="formulaire_test" action="http://mySite.com/treatmentPage.php">``

## How do you send a new data to Webmecanik Automation?
* Add a new input tag in your HTML form: ``<input id="nom" name="nom" type="text" placeholder="Nom" required>``
* Update your mapping array. As key, use the ID of the input, and use the Webmecanik Automation field alias as value: ``var mappingFields_form1 = {"civilite" : "title", "prenom" : "lastname", "nom" : "firstname"};``
* The Webmecanik Automation custom field must be created in the instance and must be set as **publicly updatable**.
* If you use checkbox input type, you need one custom field for each checkbox.

## In case of error

### Nothing is happening:
If the new contact does not appear in Webmecanik Automation, it may be:
* The contact was already existing and it has been simply updated (consequently not shown on top of the contact list ordered by activity).
* One or several data are wrong when sent to Webmecanik Automation:
	* Date format invalid: the date format must be set as **AAAA-MM-JJ** and valid (2016-04-35 is invalid). 
	* Fields that are mapped to a select list, the sent value **MUST BE** available in the select field values.	
* Always make your tests in private browser, otherwise you can have cookie issues.

### Data are missing:
* If the fiels does not existe in Webmecanik Automation, the related value won't be added to the contact profile (other fields will be correctly updated).
* Check if your mapping array is correct. 
* Check that you Webmecanik Automation contact fiels are set to publicly updatable.
