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


function name_val(){
    clearErrors("ffullname")
    var name = document.forms['profile']["fullname"].value;
    pat[0]=/^[\w'.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*()\^{}|~<>;:[\]]{1,}$/
    if(name.length==0)
    {
        seterror("ffullname","*Name cannot be empty");
        check = false;
    }
    else if(pat[0].test(name)==false)
    {
        seterror("ffullname","*Name must contain only characters");
        check = false;
    }
    }
function phno_val(){
    clearErrors("fphno")
    var phno = document.forms['profile']["phno"].value;
    pat[1]=/^(\+91[\-\s]?)?(91[\-\s]?)?[0]?(91)?(6|7|8|9)\d{9}/
    if(phno.length==0)
    {
        seterror("fphno","*Phone number cannot be empty");
        check = false;
    }
    else if(pat[1].test(phno)==false)
    {
        seterror("fphno","*Invalid Phone number");
        check = false;
    }
}
function city_val(){
    clearErrors("fcity")
    var city = document.forms['profile']["city"].value;
    pat[5]=/[A-Za-z\-\s]+/
    if(city.length==0)
    {
        seterror("fcity","*Enter your city");
        check = false;
    }
    else if(pat[5].test(city)==false)
    {
        seterror("fcity","*City name must contain only characters");
        check = false;
    }
}
function about_val(){
    clearErrors("fabout")
    var about = document.forms['profile']["about"].value;
    pat[6]=/^(.{1,100})$/
    if(about.length==0)
    {
        seterror("fabout","*Add bio");
        check = false;
    }
    else if(pat[6].test(about)==false)
    {
        seterror("fabout","*Bio must not exceed 100 characters");
        check = false;
    }
}
function hobbies_val(){
    clearErrors("fhobbies")
    var hobbies = document.forms['profile']["hobbies"].value;
    pat[7]=/^(.{0,100})$/
   if(pat[7].test(hobbies)==false)
    {
        seterror("fhobbies","*Must not exceed 100 characters");
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
function validate_s()
{
    var check = true; 
    var pass = document.forms['signup']["password"].value;
    var username = document.forms['signup']["username"].value;
    var pat=[]
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
    return check;
}
function validate_p(){
    var check = true; 
    var name = document.forms['profile']["fullname"].value;
    var about = document.forms['profile']["about"].value;
    var phno = document.forms['profile']["phno"].value;
    var city = document.forms['profile']['city'].value;
    var pat=[]
    if(name.length==0)
    {
        seterror("ffullname","*Name can't be empty");
        check = false;
    }
    if(about.length==0)
    {
        seterror("fabout","*Bio can't be empty");
        check = false;
    }
    if(phno.length==0)
    {
        seterror("fphno","*Contact Number can't be empty");
        check = false;
    }
    if(city.length==0)
    {
        seterror("fcity","*City can't be empty");
        check = false;
    }
    return check;
}