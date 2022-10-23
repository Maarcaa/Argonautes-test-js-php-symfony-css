let mouseOver = document.querySelector(".mouseOver");

mouseOver.addEventListener("mouseover",function(){
    mouseOver.style.background= "#318CE7";
    mouseOver.style.fontWeight= "800";
    mouseOver.style.color= "white";
});

mouseOver.addEventListener("mouseleave", function(){
    mouseOver.style.background= "white";
    mouseOver.style.fontWeight= "500";
    mouseOver.style.color= "black";

})
let hoverGrey = document.querySelectorAll(".hoverGrey");

for (let index = 0; index < hoverGrey.length; index++) {
    hoverGrey[index].addEventListener("mouseover",function(){
        hoverGrey[index].style.background= "#318CE7";
        hoverGrey[index].style.fontWeight= "700";
        hoverGrey[index].style.color= "black";
    });
    
}

for (let index = 0; index < hoverGrey.length; index++) {
hoverGrey[index].addEventListener("mouseleave", function(){
    hoverGrey[index].style.background= "white";
    hoverGrey[index].style.fontWeight= "500";
    hoverGrey[index].style.color= "black";
})
}

// Titre membre de l'équipage

const typedText = document.querySelector(".typed-text");

const cursor = document.querySelector(".cursor");

const textArray = ["Membre", "Membre de", "Membre de l'équipage", "Tous les membres de l'équipage "];

let textArrayIndex = 0;
let charIndex = 0;

const erase = () => {
  if (charIndex > 0) {
    cursor.classList.remove('blink');
    typedText.textContent = textArray[textArrayIndex].slice(0, charIndex - 1);
    charIndex--;
    setTimeout(erase, 80);
  } else {
    cursor.classList.add('blink');
    textArrayIndex++;
    if (textArrayIndex > textArray.length - 1) {
      textArrayIndex = 0;
    }
    setTimeout(type, 1000);
  }
}

const type = () => {
  if (charIndex <= textArray[textArrayIndex].length - 1) {
    cursor.classList.remove('blink');
    typedText.textContent += textArray[textArrayIndex].charAt(charIndex);
    charIndex++;
    setTimeout(type, 120);
  } else {
    cursor.classList.add('blink');
    setTimeout(erase, 1000);
  }
}

document.addEventListener("DOMContentLoaded", () => {
  type();
})
