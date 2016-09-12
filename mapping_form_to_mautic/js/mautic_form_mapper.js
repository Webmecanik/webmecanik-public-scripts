function in_array_value(string, array) {
	var result = false;
    for(var i=0; i<array.length; i++){
        if(array[i] == string){
            result = true;
        }
    }
    return result;
}

function in_array_key(string, array) {
	var result = false;
    for (var i in array) {
        if(i == string){
            result = true;
        }
    }
    return result;
}

function retrieveForm(form, mappingFields) {

	var valueSeparator = ";";
	var valuePositive = "yes";
	var valueNegative = "no";

	var possiblesInputs = new Array("text", "email", "radio", "textarea", "number", "url", "tel", "date", "datetime", "time", "range", "color", "checkbox", "select-one", "select-multiple");

	var arrayForAtmt = {};

	for (var idInput = 0; idInput < form.length; idInput++) {

		var input = form.elements[idInput];

		if ( in_array_value(input.type, possiblesInputs) ) {

			if ( in_array_key(input.id, mappingFields) ) {

				var atmtField = mappingFields[input.id];

				var value = "";

				if (input.type === "radio") {
					if (input.checked) {
						value = input.value;
					} else {
						continue;
					}
				} else if (input.type === "checkbox") {
					if (input.checked) {
						value = valuePositive;
					} else {
						value = valueNegative;
					}
				} else if (input.type === "select-multiple") {

					var v = "";

					for(var i=0; i<input.length ;i++) {
						if (input[i].selected) {
							v = v + input[i].value + valueSeparator;
						}
					}

					value = v;
				} else {
					value = input.value;
				}

				arrayForAtmt[atmtField] = value;

			} else { 
				console.log(input.id + " : unmapped input");
			} 	
		} else {
			console.log(input.type + " : type unauthorized input");
		}
	}
	return arrayForAtmt;
}

function form_mapper(form, mappingFields_form, atmtUrl) {

	var arrayForAtmt = retrieveForm(form, mappingFields_form);

	(function(w,d,t,u,n,a,m){w['MauticTrackingObject']=n;
        w[n]=w[n]||function(){(w[n].q=w[n].q||[]).push(arguments)},a=d.createElement(t),
        m=d.getElementsByTagName(t)[0];a.async=1;a.src=u;m.parentNode.insertBefore(a,m)
	})(window, document, 'script', atmtUrl+'/mtc.js', 'mtformmapper');

	mtformmapper('send', 'pageview', arrayForAtmt);

	return true;
}
