const productImages = document.querySelectorAll(".product-images img"); // selecting all image thumbs
const productImageSlide = document.querySelector(".image-slider"); // seclecting image slider element

let activeImageSlide = 0; // default slider image

productImages.forEach((item, i) => { // loopinh through each image thumb
    item.addEventListener('click', () => { // adding click event to each image thumbnail
        productImages[activeImageSlide].classList.remove('active'); // removing active class from current image thumb
        item.classList.add('active'); // adding active class to the current or clicked image thumb
        productImageSlide.style.backgroundImage = `url('${item.src}')`; // setting up image slider's background image
        activeImageSlide = i; // updating the image slider variable to track current thumb
    })
})
// toggle size buttons

const sizeBtns = document.querySelectorAll('.size-radio-btn'); // selecting size buttons
let checkedBtn = 0; // current selected button

sizeBtns.forEach((item, i) => { // looping through each button
    item.addEventListener('click', () => { // adding click event to each 
        sizeBtns[checkedBtn].classList.remove('check'); // removing check class from the current button
        item.classList.add('check'); // adding check class to clicked button
        checkedBtn = i; // upading the variable
    })
})

rec=document.querySelector(".recommendation");
rec.addEventListener("click",()=>{
    document.querySelector(".form-container").style.visibility="visible";
})


var height=document.querySelector(".size-height");
var fheight=document.querySelector(".feet-height");
const submit=document.querySelector(".submit");
const cancel=document.querySelector(".cancel");
var hval=0,fval=0,res=0;
submit.addEventListener("click", (event)=>{
    event.preventDefault();
    hval=parseInt(height.value, 10);
    fval=parseInt(fheight.value, 10);
    console.log(hval,fval);
    // var res=calculateSize(hval,fval);
    res=hval+fval;

    document.querySelector(".result").style.display="block";
    if(isNaN(res)){
        document.querySelector(".result").innerHTML=`please enter size`;
    }
    else{
        document.querySelector(".result").innerHTML=`your size is: `+res;
    }
    
})
// console.log(hval,fval);

cancel.addEventListener("click", (event)=>{
    event.preventDefault();
    document.querySelector(".form-container").style.visibility="hidden";

   })