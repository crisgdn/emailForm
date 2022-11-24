# Mail Form with Vue and POST
Mail is a homework for Interactive Media Design course.
## Assignment Description
Create a mail API with Vue and AJAX using the POST request. You’ll be sending your mail form
data to a PHP script via Fetch and the POST request. You’ll need to handle both success and
failure via the response object and changes to the UI (handle errors, update with visual cues,
etc).

## Solving the Requirements

### A) Giving the user feedback by signalling an error only in the field that was not completed:
<br>
1- Use the ref to change the line color of the field box and flagging an error:
<p>HTML Example: ref="fname"</p><br>

<p>JS Example: this.$refs.fname.classList.add("error");</p><br>

<p>2- Create error notifications in each required field in the HTML, using v-if (vue js) and return true or false to hide or show the messages:</p>
<p>HTML Example: I think you forgot to write your name.</p><br>
<p>JS Example: this.erroFirstname = false;</p><br>

<p>3- Create inside the processMailFailure function a condition for each input using v-model:</p><br>
<p>HTML Example: v-model="form.firstname"</p><br>

<p>JS Example</p>
<p>if(this.form.firstname.length > 0){</p>
    <p>this.$refs.fname.classList.remove("error");</p>
    <p>this.erroFirstname = false;</p>
    <p>} else {</p>
    <p>this.$refs.fname.classList.add("error");</p>
    <p>this.erroFirstname = true;</p>
     <p> }</p><br>

### B- Signal that the message was sent successfully:
<br>

<p>1- Create sucess notification in the HTML, using v-if (vue js) and return true or false to hide or show the message.</p>
<p>v-if="sucessMassage"</p>
<p>Your message has been sent successfully!</p><br>

<p>2- Create inside the processMailSuccess function the action to show the notification using true:</p>
<p>this.sucessMassage = true; </p>
