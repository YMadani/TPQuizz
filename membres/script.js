function asideactive()
{
    var cool = document.getElementById("cool");
    var menu = document.querySelector(".lemenu");
cool.addEventListener('click',()=>{
    menu.classList.toggle("active");
    
})}
asideactive();