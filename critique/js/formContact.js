$(document).ready(function(){
    var verify = Object.create(formVerify);
    verify.email("courriel", "aideCourriel");
    verify.submit("form", null, "noSubmit");
});
