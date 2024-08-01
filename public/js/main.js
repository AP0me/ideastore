
let xOverflow = document.querySelector(".x-overflow");
let recommended = document.querySelector('.recommended');
let options = {
  root: xOverflow,
  rootMargin: "0px",
  threshold: 1.0,
};


let breakpoints = [300, 700, 1100, 1500];
let compStyle = window.getComputedStyle(xOverflow);
let currentBreakpoint = null;
let elementWidth = parseFloat(compStyle.width);
for (let index = 0; index < breakpoints.length; index++) {
  if (elementWidth <= breakpoints[index]) {
    currentBreakpoint = index;
    break;
  }
}
if(currentBreakpoint===null){
  currentBreakpoint = breakpoints.length-1;
}

function isIntersecting(){
  console.log("Element is out of view");
  currentBreakpoint--;
  target1.style.width = breakpoints[currentBreakpoint]+"px";
  target2.style.width = breakpoints[currentBreakpoint+1]+"px";
  recommended.style.gridTemplateColumns = `repeat(${currentBreakpoint + 1}, auto)`;
  console.log(recommended.style.gridTemplateColumns);
  xOverflow.style.gridColumn = `1 / span ${currentBreakpoint + 1}`;
  console.log(xOverflow.style.gridColumn);
}

let observer = new IntersectionObserver((entries)=>{
  entries.forEach(entry => {
    if (!entry.isIntersecting) {
      isIntersecting();
    }
  });
}, options);

let observer2 = new IntersectionObserver((entries)=>{
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      console.log("Element is view");
      currentBreakpoint++;
      target1.style.width = breakpoints[currentBreakpoint]+"px";
      target2.style.width = breakpoints[currentBreakpoint+1]+"px";
      recommended.style.gridTemplateColumns = `repeat(${currentBreakpoint}, auto)`;
      console.log(recommended.style.gridTemplateColumns);
      xOverflow.style.gridColumn = `1 / span ${currentBreakpoint + 1}`;
      console.log(xOverflow.style.gridColumn);
    }
  });
}, options);

let target1 = document.querySelector(".x-overflow>.xflow-1");
let target2 = document.querySelector(".x-overflow>.xflow-2");
observer.observe(target1);
observer2.observe(target2);
isIntersecting();