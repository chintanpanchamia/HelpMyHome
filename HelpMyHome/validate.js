<script type="text/javascript">
function validateForm()
{
var a=document.forms["reg"]["name"].value;
var b=document.forms["reg"]["email"].value;
var c=document.forms["reg"]["address"].value;
var d=document.forms["reg"]["phone"].value;
//var e=document.forms["reg"]["contact"].value;
var e=document.forms["reg"]["pwd"].value;
var f=document.forms["reg"]["conf_pwd"].value;
if ((a==null || a=="") && (b==null || b=="") && (c==null || c=="") && (d==null || d=="") && (e==null || e=="") && (f==null || f==""))
  {
  alert("All Field must be filled out");
  return false;
  }
if (a==null || a=="")
  {
  alert("Name must be filled out");
  return false;
  }
if (b==null || b=="")
  {
  alert("Email must be filled out");
  return false;
  }
if (c==null || c=="")
  {
  alert("Address must be filled out");
  return false;
  }
if (d==null || d=="")
  {
  alert("Phone number must be filled out");
  return false;
  }
if (e==null || e=="")
  {
  alert("Password must be filled out");
  return false;
  }
if (f==null || f=="")
  {
  alert("Password must be confirmed");
  return false;
  }
/*if (g==null || g=="")
  {
  alert("username must be filled out");
  return false;
  }
if (h==null || h=="")
  {
  alert("password must be filled out");
  return false;
  }
}*/
</script>