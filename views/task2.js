
function validate() {

  var email = document.getElementById('email').value;
  var EmailValidationMsg = document.getElementById('emailValMsg');
  var checkboxValidationMsg = document.getElementById('checkboxValMsg');
  var button = document.getElementById('button');

  var Emailregex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/g;
  var colombiaRegex = new RegExp(".co$", "g");

  if(!button.disabled) button.disabled = true;

  if(email){
    if(!email.match(Emailregex)){
      EmailValidationMsg.innerText = '* Please provide a valid e-mail address';
    }
    else if(email.match(colombiaRegex)){
      EmailValidationMsg.innerText = '* We are not accepting subscriptions from Colombia emails';
    }
    else{
       EmailValidationMsg.innerText = '';
       if(checkboxValidationMsg.innerText=='')
       {
         if(button.disabled) button.disabled = false;
       }
     }
  }
  else{
    EmailValidationMsg.innerText = '* Email address is required';
  }

  if(!document.getElementById('agree').checked && checkboxValidationMsg.innerText==''){
    checkboxValidationMsg.innerText = '* please accept the terms and conditions';
  }
}


function checkAgree ()
{
  var EmailValidationMsg = document.getElementById('emailValMsg');
  var checkboxValidationMsg = document.getElementById('checkboxValMsg');
  if(!document.getElementById('agree').checked){
    checkboxValidationMsg.innerText = '* please accept the terms and conditions';
    console.log("please accept the terms and conditions");
  }
  else {
    checkboxValidationMsg.innerText = '';
    if(EmailValidationMsg.innerText=='')
    {
      if(button.disabled) button.disabled = false;
    }
  }
}


function successMsg(){
  document.getElementById('formHeader').innerHTML = "Thanks for Subscribing!";
  document.getElementById('formPara').innerHTML = "You have successfully subscribed to our email listing.<br> Check your email for the discount code.";
  document.getElementById('myform').style.display = "none";
}
