var note = document.getElementById("note").textContent;
var radio = document.getElementsByClassName("radioNote");
var x = note - 1;
var check = radio[x];
check.setAttribute('checked', 'checked');