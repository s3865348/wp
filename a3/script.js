
function onload (){
var rememberCheck = document.getElementById("rememberMe");
    var phonenumInput =document.getElementById("mobile_num");
var emailInput = document.getElementById("email");
    var nameInput =document.getElementById("name");
if (localStorage.checkbox && localStorage.checkbox !== "") {
  rememberCheck.setAttribute("checked", "checked");
  emailInput.value = localStorage.email;
    nameInput.value = localStorage.name;
    phonenumInput.value =localStorage.phone;
} else {
  rememberCheck.removeAttribute("checked");
  emailInput.value = "";
    nameInput.value ="";
    phonenumInput.value="";
}
}
function validateFields() {
    
    var str = document.getElementById("mobile_num").value;
    
    var patt = /^(\+61){1}[0-9]{1}[0-9]{4}[0-9]{4}$/;
    var res = patt.test(str);
    var temp = "Correct phone number.";
    if(res!=true){
      temp = "Please enter the correct phone number staring with +614.";
    }else{
      //here you can post the data from script
    }
    document.getElementById("checknum").innerHTML = temp;
}

function forgetme(rememberCheck) {
if (!rememberCheck.checked)
{
    localStorage.email = "";
    localStorage.name ="";
    localStorage.checkbox = "";
    localStorage.phone ="";
    } 
    
}

function lsRememberMe() {
  var name= document.getElementById("name");
    var emailInput= document.getElementById("email");
    var rememberCheck =document.getElementById("rememberMe");
    var phonenumInput =document.getElementById("mobile_num");
    if (rememberCheck.checked && emailInput.value !== "") {
    localStorage.email = emailInput.value;
    localStorage.checkbox = rememberCheck.value;
      localStorage.name = name.value;
        localStorage.phone = phonenumInput.value;
  } else {
    localStorage.email = "";
      localStorage.name ="";
    localStorage.checkbox = "";
      localStorage.phone ="";
  }
}
function revealdiv(elementId) {
  var selectedletter = document.getElementById(elementId);
  var letterelements = document.getElementsByClassName("letters");
    var i;
    for (i = 0; i < letterelements.length; i++) {
    var letterelement =letterelements[i];
    letterelement.style.display = "none";    
    }
    selectedletter.style.display = "block";
}