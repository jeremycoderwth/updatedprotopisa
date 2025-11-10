const observer = new IntersectionObserver(entries=>{
    entries.forEach(entry=>{
        if(entry.isIntersecting){
            entry.target.classList.add('scroll-show')
            entry.target.classList.add('scroll-slide-show')
        }
    })
})

const scrollHidden = document.querySelectorAll('.scroll-hidden')
const scrollSlideHidden = document.querySelectorAll('.scroll-slide-hidden')

scrollHidden.forEach(el=> observer.observe(el))
scrollSlideHidden.forEach(el=> observer.observe(el))


const loader = document.getElementById('preloader')
function removeLoader() {
    if (someCondition) {
        const loader = document.getElementById('loader');
        if (loader) {
            loader.style.display = 'none';
        }
    }
}

function stopLoader(){
    setTimeout( removeLoader,500)

}



window.addEventListener('load', stopLoader)
