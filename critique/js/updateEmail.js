$(document).ready(function(){
    var verify = Object.create(formVerify);
    verify.email("emailPast", "aideEmailPast");
    verify.email("emailNew", "aideEmailNew");
    verify.submit("formEmail", null, "noSubmit");
});