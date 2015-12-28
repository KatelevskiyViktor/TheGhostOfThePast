//создаем переменные
var modalbox; //само модальное окно
var main2; //темный фон

//сразу даем переменным значения id одноименных блоков
window.onload = function()
{
    modalbox = document.getElementById("modalbox");
    main2 = document.getElementById("main2");
} 

//функция показа онка
function showModalbox()
{
    //задаем элементам прозрачность и другие атрибуты
    main2.style.filter = "alpha(opacity=50)";
    main2.style.opacity = 0.5;
    main2.style.display = "block";

    modalbox.style.display = "block";
    modalbox.style.left = "200px";
    modalbox.style.top = "200px";
}

//функция скрытия окна
function hideModalbox()
{
    main2.style.display = "none";
    modalbox.style.display = "none";
}       
