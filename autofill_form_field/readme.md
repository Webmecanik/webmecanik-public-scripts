# Examples
1. [Autofill a form field with URL parameter](#autofill-a-form-field-with-url-parameter)
2. Parse UTM to save in hidden formfield

# Autofill a form field with URL parameter
Sometimes you want to autofill a form field with a value. If you're able to add this value in the URL as parameter like `https://mydomain.com?myfield=myvalue` then you can quite easily grab this value and add it into the form field you want.

## Add value in URL
With Webmecanik Automation this is quite easy, you can use contact token for this.
1. Create an email
2. Add landing page URL with form on the button in your email
3. At the end of the URL, add your contact token as paramter (eg: `https://mydomain.com?firstname={contactfield=firstname}&email={contactfield=email}`

That's simply all. On each email sent, the token will be replaced by contact value.

## Grab the parameters and autofill the form
Add the following script on your landing page.

```javascript
<script>
function autoFillForm(searchParamsString) {
  var searchParams = new URLSearchParams(searchParamsString);
  for (var [key, value] of searchParams.entries()) {
    var inputs = document.getElementsByName(key);
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
