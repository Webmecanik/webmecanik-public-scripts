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
function getParam(name) { name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]"); var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"), results = regex.exec(location.search); return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " ")); }
Webflow.push(function() {

  // Auto-populate form fields (text fields only) based on query string
  $('input:text, input[type=email]').each(function() {
    var paramValue = getParam(this.id);
    if(this.value == "" && paramValue != "") this.value = paramValue;
  });

});
</script>
```

In your form, use as field ID the name of your parameter. In my example you have `firstname` and `email`.
