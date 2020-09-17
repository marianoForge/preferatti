/*
Theme Name: The DSQ Project
Theme URI:
Author: Preferati
Author URI:
Description: The DSQ Project wordpress theme.
Version: 2020
License: Private License
License URI:
Tags: tailwindscss.
Text Domain: dsq

dsq WordPress Theme © 2020
dsq is distributed under the terms of private license.
*/

const options = {
  containers: ["#main--wrapper"],
  cache: false,
  animateHistoryBrowsing: true,
};
const swup = new Swup(options);

// this event runs for every page view after initial load
swup.on("contentReplaced", () => {
  swipeMobile();
  scrollSidebar();
 });

function swipeMobile() {
  if (document.querySelector("#hammerWrapper")) {
    var prevLink = document.getElementById("prevPiece");
    var nextLink = document.getElementById("nextPiece");
    var hammerWrapper = document.getElementById("hammerWrapper");

    var mc = new Hammer(hammerWrapper);

    mc.on("swipeleft swiperight", function (ev) {
      if (ev.type === "swipeleft") {
        prevLink.click();
      } else {
        nextLink.click();
      }
    });
  }
}

swipeMobile();

function scrollSidebar() { 
  var elemScroll = document.getElementById('menu-menu-artist');
  var topScroll = localStorage.getItem("scroll-top");
  var leftScroll = localStorage.getItem("scroll-left");
  if (elemScroll) {
    window.addEventListener("beforeunload", () => {
      localStorage.setItem("scroll-top", elemScroll.scrollTop);
      localStorage.setItem("scroll-left", elemScroll.scrollLeft);
    });
    elemScroll.addEventListener("scroll", () => {      
      localStorage.setItem("scroll-top", elemScroll.scrollTop);
      localStorage.setItem("scroll-left", elemScroll.scrollLeft);
    });
  if (topScroll !== null) {
    elemScroll.scrollTop = parseInt(topScroll, 10);    
  }
    if (leftScroll !== null) { 
      elemScroll.scrollLeft = parseInt(leftScroll, 10);
    }
  }
}

scrollSidebar();