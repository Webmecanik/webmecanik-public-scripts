# Examples
1. [Autofill a form field with URL parameter](#autofill-a-form-field-with-url-parameter)
2. [Parse UTM to save value in hidden formfield](#parse-utm-to-save-value-in-hidden-formfield)
3. [Parse cookie to save its value in hidden formfield](#parse-cookie-to-save-its-value-in-hidden-formfield)

## Autofill a form field with URL parameter
Sometimes you want to autofill a form field with a value. If you're able to add this value in the URL as parameter like `https://mydomain.com?myfield=myvalue` then you can quite easily grab this value and add it into the form field you want.

### Add value in URL
With Webmecanik Automation this is quite easy, you can use contact token for this.
1. Create an email
2. Add landing page URL with form on the button in your email
3. At the end of the URL, add your contact token as paramter (eg: `https://mydomain.com?firstname={contactfield=firstname}&email={contactfield=email}`

That's simply all. On each email sent, the token will be replaced by contact value.

### Grab the parameters and autofill the form
Add the following script on your landing page.

```javascript
<script>
function autoFillForm(searchParamsString) {
  var searchParams = new URLSearchParams(searchParamsString);
  for (var [key, value] of searchParams.entries()) {
    var inputs = document.getElementsByName('mauticform['+key+']');
    if (inputs.length > 0) {
      var input = inputs[0];
      input.value = value;
    }
  }
}

document.addEventListener("DOMContentLoaded", function() {
  autoFillForm(document.location.search);
});

</script>
```

In your form, use as field name, the name of your parameter. In my example you have `firstname` and `email`.

## Parse UTM to save value in hidden formfield
Sometimes you want to autofill a hidden form field with a value coming from URL UTMs. For instance, this is very useful to track your lead origin while you share your pages and blog articles on your communication channels like following: `https://mydomain.com?utm_source=facebook`.

### Create the hidden field in your form
With Webmecanik Automation:

1. Add a hidden type field in your form. Name it "utm_source", this will be invisible for end user:
<img width="300" alt="Add hidden form field" src="https://user-images.githubusercontent.com/14075239/130429400-f25a845d-d8f1-4daf-ada1-33d540fa102e.png">
2. Map to your contact or company custom field where you want to store the Lead source value:
<img width="280" alt="Form field mapping" src="https://user-images.githubusercontent.com/14075239/130427299-bf5451f4-27f7-4b66-81b6-d6a0912a1580.png">
3. And enable the feature "If exist, not overwrite" to avoid erasing the existing data if you want (in case you only want to save the First touch attribution).

### Grab the parameters and autofill the form
Add the following script on your webpage. It can be done by your Webmaster, or by adding a HTML field in the same form with the following script. This will insert the script on the page where the form is insterted.

```javascript
<script>
function autoFillForm(searchParamsString) {
  var searchParams = new URLSearchParams(searchParamsString);
  for (var [key, value] of searchParams.entries()) {
    var inputs = document.getElementsByName('mauticform['+key+']');
    if (inputs.length > 0) {
      var input = inputs[0];
      input.value = value;
    }
  }
}

document.addEventListener("DOMContentLoaded", function() {
  autoFillForm(document.location.search);
});

</script>
```

## Parse cookie to save its value in hidden formfield
Sometimes you want to autofill a hidden form field with a value coming from UTM cookies. For instance, this is very useful to track your lead origin while you share your pages and blog articles on your communication channels like following: `https://mydomain.com?utm_source=facebook`.

### Create the hidden field in your form
With Webmecanik Automation:

1. Add a hidden type field in your form. Name it "utm_source", this will be invisible for end user:
<img width="300" alt="Add hidden form field" src="https://user-images.githubusercontent.com/14075239/130429400-f25a845d-d8f1-4daf-ada1-33d540fa102e.png">
2. Map to your contact or company custom field where you want to store the Lead source value:
<img width="280" alt="Form field mapping" src="https://user-images.githubusercontent.com/14075239/130427299-bf5451f4-27f7-4b66-81b6-d6a0912a1580.png">
3. And enable the feature "If exist, not overwrite" to avoid erasing the existing data if you want (in case you only want to save the First touch attribution).

### Grab the cookie value and autofill the form
Add the following script on your webpage. It can be done by your Webmaster, or by adding a HTML field in the same form with the following script. This will insert the script on the page where the form is insterted.

```javascript
<script>


function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

document.addEventListener("DOMContentLoaded", function() {
   var utmSourceValue = getCookie("utm_source");
   console.log(utmSourceValue)
   var inputs = document.getElementsByName('mauticform[utm_source]');
    if (inputs.length > 0) {
      var input = inputs[0];
      input.value = utmSourceValue;
    }
});

</script>
```
