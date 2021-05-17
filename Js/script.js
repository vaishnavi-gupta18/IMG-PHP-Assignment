function clearErrors(a){
    element=document.getElementById(a)
    errors = element.getElementsByClassName('ferror');
    for(let item of errors)
    {
        item.innerHTML = "";
    }
}
function seterror(id, error){
    element = document.getElementById(id);
    element.getElementsByClassName('ferror')[0].innerHTML = error;
}
var pat=[];
var check=true;
function email_val(){
    clearErrors("femail")
    var email = document.forms['signup']["email"].value;
    pat[2]=/^[\w]+([\w_\-\.]+)@([\w_\-\.]+)\.([a-zA-Z]{2,4})$/
    if(email.length==0)
    {
        seterror("femail","*Email address cannot be empty");
        check = false;
    }
    else if(pat[2].test(email)==false)
    {
        seterror("femail","*Invalid Email address");
        check = false;
    }
}
function user_val(){
    clearErrors("fusername")
    var username = document.forms['signup']["username"].value;
    if(username.length==0)
    {
        seterror("fusername","*Username cannot be empty");
        check = false;
    }
}
function pass_val(){
    clearErrors("fpassword")
    var pass = document.forms['signup']["password"].value;
    pat[3]=/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/
    if(pat[3].test(pass)==false)
    {
        seterror("fpassword","*Password must contain at least one lowercase character, one uppercase character, one digit, one special character, and a length between 8 to 20");
        check = false;
    }
}
function pass_wrong(){
    seterror("fpassword","Incorrect password");
}
function cpass_val(pass){
    clearErrors("fcpassword")
    var cpass = document.forms['signup']["cpassword"].value;
    var pass = document.forms['signup']["password"].value;
    if(cpass.length==0)
    {
        seterror("fcpassword","*Enter password again to confirm");
        check = false;
    }
    else if(pass!=cpass)
    {
        seterror("fcpassword","*Does not match with the entered password");
        check = false;
    }
}
function validate()
{
    var check = true; 
    var email = document.forms['signup']["email"].value;
    var pass = document.forms['signup']["password"].value;
    var cpass = document.forms['signup']["cpassword"].value;
    var username = document.forms['signup']["username"].value;
    
    var pat=[]
    if(email.length==0)
    {
        seterror("femail","*Email address cannot be empty");
        check = false;
    }
    if(username.length==0)
    {
        seterror("fusername","*Username can't be empty");
        check = false;
    }
    
    pat[3]=/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/
    if(pat[3].test(pass)==false)
    {
        seterror("fpassword","*Password must contain at least one lowercase character, one uppercase character, one digit, one special character, and a length between 8 to 20");
        check = false;
    }
    if(cpass.length==0)
    {
        seterror("fcpassword","*Enter password again to confirm");
        check = false;
    }
    return check;
}


