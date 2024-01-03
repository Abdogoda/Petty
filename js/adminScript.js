// sidebar navigation
sidebar = document.querySelector(".nav");
menu0toggle = document.querySelector(".menu0toggle");
sidebarList = document.querySelectorAll(".nav li");
menu0toggle.onclick = function(){
  sidebar.classList.toggle("active");
}