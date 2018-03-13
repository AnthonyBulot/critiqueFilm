var message = {

	init : function(){
		this.read();
		this.verify();
		this.noRead();
	},

	verify : function(){
		var messages = $(".messages");
		var read = $(".read");
		for (var i = 0; i < messages.length; i++) {
			if (read[i].textContent == "Non lu"){
				messages[i].style.backgroundColor = "rgba(255, 255, 0, 0.8)";
			}
		}
	},

	noRead : function(){
		var checkbox = document.getElementById("checkbox");
		checkbox.addEventListener("click", function(){
			var messages = $(".messages");
			if (checkbox.checked == true){
				for (var i = 0; i < messages.length; i++) {
					if (messages[i].style.backgroundColor != "rgba(255, 255, 0, 0.8)"){
						messages[i].style.display = "none";
					}
				}
			}
			else {
				for (var i = 0; i < messages.length; i++) {
					messages[i].style.display = "";
				}
			}
		});
	},

	read : function(){
		var messages = $(".messages");
		var read = $(".read");
		for (var i = 0; i < messages.length; i++) {
			if (read[i].textContent == 0){
				read[i].textContent = "Non lu";
			}
			else {
				read[i].textContent = "Lu";
			}
		}

	}
}


$(document).ready(function(){
	var app = Object.create(message);
	app.init();
});