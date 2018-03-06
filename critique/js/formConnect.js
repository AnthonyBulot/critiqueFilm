$(document).ready(function(){
	var verify = Object.create(formVerify);
	verify.passwordLength("mdp", "aideMdp");
	verify.passwordCorrect("mdp", "aide");
	verify.passwordEqual("mdp", "mdp2", "MdpIdentique");
	verify.email("email", "aideEmail");
	verify.submit("form", "aideMdp", "noSubmit");
});