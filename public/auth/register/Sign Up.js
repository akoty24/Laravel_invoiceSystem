var d=[];
function h()
{
	d[0]=form.FName.value;
	d[1]=form.SName.value;
	d[2]=form.E_Mail.value;
	d[3]=form.NationalId.value;
	d[4]=form.psw.value;
	d[5]=form.password.value;
	d[6]=form.gender.value;
    d[7]=form.gender.value;
var indx=0;
var arry=[d.length];
for (var i=0;i<d.length; i++)
{
	if(d[i]=="")
	{arry[i]=0}
	else
	{arry[i]=1;indx++;}
}
for (var i=0;i<d.length; i++)
{
	if(arry[i]===0)
	{document.getElementById("in"+i).style="border:2px solid red;";}
    else
		{document.getElementById("in"+i).style="border:normal;";}
	if(indx>=d.length)
	{window.open('home.html', '_self');
		//document.getElementById("submit").innerHTML="<a location.href='home.html'></a>"
		}

}
}

/* password requierds */
var myInput = document.getElementById("in4");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}