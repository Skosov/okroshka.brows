function burgerMenu(selector)
{
	//находим классы
	let menu = document.querySelector('.burger-menu'); 
	let button = document.querySelector('.burger-menu__button');
	let links = document.querySelectorAll('.burger-menu__link');
	let overlay = document.querySelector('.burger-menu__overlay');


	button.onclick = function(evt) //Ловиим клик по кнопке
	{
		evt.preventDefault(); //Отменяем дейтсвие по умолчанию
		toggleMenu(); // Вызов функции 
	};


	overlay.onclick = function()
	{
		toggleMenu();
	}

	for (let link of links) //цикл
	{
		link.onclick = function()
		{
			toggleMenu();
		}
	}


	function toggleMenu() //описываем функцию
	{
		menu.classList.toggle('burger-menu_active'); /* переключаем классы */
		if (menu.classList.contains('burger-menu_active')) //проверяем на наличие класса		{
		{	
			document.body.style.overflow = "hidden"; //меняем у body стиль overflow на hidden (запрещаем прокрутку)
		}
		else 
		{
			document.body.style.overflow = "visible"; //меняем у body стиль overflow на overflow (разрешаем прокрутку)
		}
	};	
};

burgerMenu('.burger-menu'); //вызываем функцию