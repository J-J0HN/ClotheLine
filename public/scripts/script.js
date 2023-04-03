function setSliderDimensions() {
  const sliderContainer = document.querySelector(".slider-container");
  const slider = document.querySelector(".slider");
  const sliderHeight = sliderContainer.clientHeight;
  slider.style.height = `${sliderHeight}px`;
}

function slideToSlide(slideIndex, gallery) {
  console.log("slidetoslide");
  const sliderContainer = document.querySelector(".slider-container");
  const slideWidth = sliderContainer.clientWidth;
  console.log("slideWidth: " + slideWidth);
  gallery.style.transform = `translateX(-${slideIndex * slideWidth}px)`;
  console.log("transform: " + slideIndex * slideWidth);
  currentSlide = slideIndex;
  console.log("Current slide: " + currentSlide);
}

function handleWindowResize() {
  const gallery = document.querySelector(".gallery");
  setSliderDimensions();
  slideToSlide(currentSlide, gallery);
}

function previousSlide() {
  console.log("previous");
  const gallery = document.querySelector(".gallery");
  const slides = document.querySelectorAll(".banner-img");
  if (currentSlide > 0) {
    slideToSlide(currentSlide - 1, gallery);
  }
}

function nextSlide() {
  console.log("next");
  const gallery = document.querySelector(".gallery");
  const slides = document.querySelectorAll(".banner-img");
  console.log("Current slide: " + currentSlide);
  console.log("Slide count: " + slides.length);
  if (currentSlide < slides.length - 1) {
    slideToSlide(currentSlide + 1, gallery);
  }
}

function startGallery() {
  const sliderContainer = document.querySelector(".slider-container");
  const slider = document.querySelector(".slider");
  const gallery = document.querySelector(".gallery");
  const slides = document.querySelectorAll(".banner-img");
  const prevButton = document.querySelector(".prev");
  const nextButton = document.querySelector(".next");

  prevButton.addEventListener("click", previousSlide);

  nextButton.addEventListener("click", nextSlide);
}

function myLoadFunction() {
  console.log("Script connected!");
  setSliderDimensions();

  window.addEventListener("resize", handleWindowResize);

  startGallery();
}

let currentSlide = 0;
let startX = 0;

document.addEventListener("DOMContentLoaded", myLoadFunction);
