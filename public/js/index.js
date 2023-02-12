// Onload adjustments
window.addEventListener('load', () => {
  // Set padding of body for the footer
  let footerHeight = document.querySelector('#footer').clientHeight;
  document.querySelector('#body').style.paddingBottom = `calc(${footerHeight}px + 20px)`;
});


// Navbar Menu Toggle
document.querySelector('.open-menu-btn').addEventListener('click', (e) => {
  e.currentTarget.classList.toggle('active')
});

// hero carousel
const carouselBtns = document.querySelectorAll("[data-carousel-btn]")
carouselBtns.forEach(cBtn => {
  cBtn.addEventListener('click', () => {
    let offset = cBtn.dataset.carouselBtn === 'next' ? 1 : -1 //using ternary operator
    // alert(cBtn.dataset.carouselBtn)
    const heroCarouselSlides = document.querySelector("[data-carousel-slides]")
    const activeHeroSlide = heroCarouselSlides.querySelector("[data-active]")
    let slideNewIndex = [...heroCarouselSlides.children].indexOf(activeHeroSlide) + offset


    if (slideNewIndex < 0) slideNewIndex = heroCarouselSlides.children.length - 1
    if (slideNewIndex > heroCarouselSlides.children.length - 1) slideNewIndex = 0

    heroCarouselSlides.children[slideNewIndex].dataset.active = true
    delete activeHeroSlide.dataset.active
  })

});




// from recipes  to specific product 
function viewproduct(id) {
  localStorage.setItem('id', id)
  window.location.href = 'afritada.html'
}

window.onload = () => {
  const productSectionContainer = document.querySelectorAll('.product-section-container')
  for (let productContainer of productSectionContainer) {
    productContainer.classList.add('show')
  }
}
