var d=[];
function h()
{
	d[0]=form.username.value;
	d[1]=form.email.value;
	d[2]=form.password.value;
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
	if(indx===d.length)
	{window.open('../../home/home.html', '_self')}

}
}
/* show pass */
function myFunction() {
  var x = document.getElementById("in2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}