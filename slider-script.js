var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  //получаем элементы
  var slides = document.getElementsByClassName("Slides"); 
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none"; //выключаем каждый слайд  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}   //если дошли до конца, то переходим на первый 
  for (i = 0; i < dots.length; i++) { //листаем
    dots[i].className = dots[i].className.replace(" active", ""); //синхронизируем точку и слайд
  }
  slides[slideIndex-1].style.display = "block";  //отображаем слайд
  dots[slideIndex-1].className += " active"; //активная точка
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}