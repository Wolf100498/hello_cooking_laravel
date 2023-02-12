

const productCards = document.querySelector('.left-cards')
const interval = 1000

let cards = document.querySelectorAll('.card-')
let index = 1

let cardWidth = cards[index].clientWidth

const startSlide = () => {
  setInterval(() => {
    index++
    cards.style.transform = `translateX((${-cardWidth * index})px )`
  }, interval)
}

startSlide()