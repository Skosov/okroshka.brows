let closeButton = document.querySelectorAll(".close");
let popup = document.querySelector(".popup");
let form = document.querySelector('form');
let check_in_btn = document.querySelector('#check-in-btn');
let login_btn = document.querySelector("#login-btn");

check_in_btn.onclick = function()
{
	ShowPopup();
}

closeButton.onclick = function()
{
	RemovePopup();
}

function ShowPopup()
{
	popup.style.display = "block";
}

function RemovePopup()
{
	popup.style.display = "none";

}