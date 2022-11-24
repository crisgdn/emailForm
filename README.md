# Mail Form with Vue and POST
Mail Form is homework for the Interactive Media Design course.
You can test this form by sending me an email at: <br>
https://emailform.crisdenoronha.com/

## Assignment Description
Create a mail API with Vue and AJAX using the POST request. You’ll be sending your mail form data to a PHP script via Fetch and the POST request. 
You’ll need to handle both success and failure via the response object and changes to the UI (handle errors, update with visual cues,
etc).

## Solving the Requirements

### A) Giving the user feedback by signalling an error only in the field that was not completed:

###### 1- Use the ref to change the line color of the field box and flagging an error:
*HTML Example:* 
```
ref="fname"
```
*JS Example:* 
```
this.$refs.fname.classList.add("error");
```

###### 2- Create error notifications in each required field in the HTML, using v-if (vue js) and return true or false to hide or show the messages:

*HTML Example:* 
```
<div class="errorMessage" v-if="erroFirstname">
  <p>I think you forgot to write your name.</p>
   <i class="fa-solid fa-circle-exclamation"></i>
</div>

```
*JS Example* 
```
this.erroFirstname = false;
```

###### 3- Create inside the processMailFailure function a condition for each input using v-model:
*HTML Example:* 
```
v-model="form.firstname"
```
*JS Example:*
```
if(this.form.firstname.length > 0){
    this.$refs.fname.classList.remove("error");
    this.erroFirstname = false;
    } else {
    this.$refs.fname.classList.add("error");
    this.erroFirstname = true;
     }
```

### B- Signal that the message was sent successfully:

###### 1- Create a success notification in the HTML, using v-if (vue js) and return true or false to hide or show the message.
```
<div class="sucess" v-if="sucessMassage">
  <p>Your message has been sent successfully!</p>
   <i class="fa-solid fa-rocket"></i>
   </div>
```

###### 2- Create inside the processMailSuccess function the action to show the notification using true:
```
this.sucessMassage = true;
```
