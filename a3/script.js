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
    document.getElementById("demo").innerHTML = temp;
}
const rmCheck = document.getElementById("rememberMe"),
    emailInput = document.getElementById("email");

if (localStorage.checkbox && localStorage.checkbox !== "") {
  rmCheck.setAttribute("checked", "checked");
  emailInput.value = localStorage.username;
} else {
  rmCheck.removeAttribute("checked");
  emailInput.value = "";
}

function lsRememberMe() {
  if (rmCheck.checked && emailInput.value !== "") {
    localStorage.username = emailInput.value;
    localStorage.checkbox = rmCheck.value;
  } else {
    localStorage.username = "";
    localStorage.checkbox = "";
  }
}