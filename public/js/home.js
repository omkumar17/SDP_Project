const productContainers = document.querySelectorAll('.product-container');
const nxtBtn = document.querySelectorAll('.nxt-btn');
const preBtn = document.querySelectorAll('.pre-btn');
// console.log(productContainers.length);
productContainers.forEach((item, i) => {
let containerDimenstions = item.getBoundingClientRect();
let containerWidth = containerDimenstions.width;

    nxtBtn[i].addEventListener('click', () => {
        console.log(containerWidth);
        item.scrollLeft += containerWidth;
        
    })

    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
        console.log(containerWidth);
    })
})