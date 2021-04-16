# Autofill a form field with today date
Sometimes you want to autofill a form field with a date value to be able to analyse when your contact has been caught, etc. For this is we can easily add today's value in a form field when contact submits the form.

## Create a form
With Webmecanik Automation create a form that can grab this date
1. Create a date type custom field (if not created yet)
2. Create a form with a date type field
3. Map this form field to your previously created custom field

## Add the custom scrip
1. Insert your form on your webpage (you can use Webmecanik Automation landing pages)
2. Inspect form and copy the date type field `name` attribute
3. Grab the script hereunder and modify "name" by the value you just copied
4. Add in your form, an HTML field and paste the modified script

That's simply all.

### Script to copy

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

**Don't forget to replace "name" by the name of the date type form field.**
