
const navSlide = () => {
    let menu = document.querySelector('.menu');
    let nav = document.querySelector('.nav_content');
    menu.addEventListener('click',()=>{
    nav.classList.toggle('nav-active');
    menu.classList.toggle('toggle');
});

}
navSlide();

function yo() {
    let search = document.getElementById('search').value
    if (search.length > 0){
        console.log('nocscs'); 
        search.classList.toggle('search_active')
        search.classList.toggle('toggle')

    }
    else
    console.log('no'); 

}