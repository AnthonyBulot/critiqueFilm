$(document).ready(function(){
    var verify = Object.create(formVerify);
    verify.passwordLength("newPassword", "aide1");
    verify.passwordCorrect("newPassword", "aide2");
    verify.passwordEqual("newPassword", "newPassword2", "newMdpIdentique");
    verify.submit("formPassword", "aide1", "noSubmit");
});