// mybag
document.querySelector('#bag-btn').onclick = () =>{
    mybag.classList.toggle('active');
}
document.querySelector('.bag-box .close').onclick = () => {
    mybag.classList.remove('active');
}
// favourit product
document.querySelectorAll('.shop .box .fav').forEach(e => {
  e.onclick= function(){
    e.classList.toggle("active");
  }
})
// view product
document.querySelectorAll(".shop .box .view").forEach(e => {
  e.addEventListener("click", () => {
    document.querySelector(".overlay").classList.add("active");
    document.querySelector(".overlay .image img").src = e.parentElement.parentElement.querySelector(".image img").src;
  })
})
document.querySelector(".shop .overlay .close").onclick = function(){
  document.querySelector(".overlay").classList.remove("active");
}
