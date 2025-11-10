// Initialize variables
var navbar = document.getElementById("navbar-section");
var sticky = navbar.offsetTop;
var isSticky = false;

// Function to handle scrolling and sticky behavior
function handleScroll() {
  if (window.pageYOffset >= sticky && !isSticky) {
    navbar.classList.add("sticky");
    isSticky = true;
  } else if (window.pageYOffset < sticky && isSticky) {
    navbar.classList.remove("sticky");
    isSticky = false;
  }
}

// Add event listeners
window.addEventListener("scroll", handleScroll);
window.addEventListener("resize", function () {
  // Recalculate the sticky position when the window is resized
  sticky = navbar.offsetTop;
  handleScroll();
});

// Initial call to handleScroll to set the initial state
handleScroll();
