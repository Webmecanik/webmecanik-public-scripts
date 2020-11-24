# Hide a value in a select form field

You sometimes want to hide a select field value of your form. This script will help you to do that without asking a developer to help you.

## Use case
For example, you add a select field of the upcoming webinars (with out Citrix GoToWebiar integration) in your Webmecanik Automation form. But in this list of upcoming webinars, there is one you want to hide to your visitors.
Here is how to do:
1. Add a HTML field in your form
2. Paste the script here under inside of it.
3. Replace the 2 variables.

```html
<script>
window.setTimeout(function(){
    var select = document.getElementById('mauticform_input_gotowebinar_webinars_a_venir');
var elem = select.querySelector('option[value="702686779"]');
select.removeChild(elem);
}, 3000)
</script>
```

**To replace the 2 example variables** (`mauticform_input_gotowebinar_webinars_a_venir` and `702686779`) with your own variables, you need to:
1. Inspect your form code once inserted into you page
2. Copy the ID of the select field (in the example it was `mauticform_input_gotowebinar_webinars_a_venir`)
3. Copy the ID of the field value you want to hide (in the example is was `702686779`)
4. Change the collected variables into the example script

![](/img.png)

Here we go :rocket: !
