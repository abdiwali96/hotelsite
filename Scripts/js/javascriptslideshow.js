

function SlideshowFunc() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  StartingNum++;
  if (StartingNum > x.length) {StartingNum = 1}
  x[StartingNum-1].style.display = "block";
  setTimeout(SlideshowFunc, 2500); // Change image every 2 seconds
}
