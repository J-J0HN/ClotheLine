function setSliderDimensions() {
  const sliderContainer = document.querySelector(".slider-container");
  const slider = document.querySelector(".slider");
  const sliderHeight = sliderContainer.clientHeight;
  slider.style.height = `${sliderHeight}px`;
}

function slideToSlide(slideIndex, gallery) {
  const sliderContainer = document.querySelector(".slider-container");
  const slideWidth = sliderContainer.clientWidth;
  gallery.style.transform = `translateX(-${slideIndex * slideWidth}px)`;
  currentSlide = slideIndex;
}

function handleWindowResize() {
  const gallery = document.querySelector(".gallery");
  setSliderDimensions();
  slideToSlide(currentSlide, gallery);
}

function previousSlide() {
  const gallery = document.querySelector(".gallery");
  const slides = document.querySelectorAll(".banner-img");
  if (currentSlide > 0) {
    slideToSlide(currentSlide - 1, gallery);
  }
}

function nextSlide() {
  const gallery = document.querySelector(".gallery");
  const slides = document.querySelectorAll(".banner-img");
  if (currentSlide < slides.length - 1) {
    slideToSlide(currentSlide + 1, gallery);
  }
}

function startGallery() {
  const sliderContainer = document.querySelector(".slider-container");
  const slider = document.querySelector(".slider");
  const gallery = document.querySelector(".gallery");
  const slides = document.querySelectorAll(".banner-img");


  setInterval(() => {
    if (currentSlide < slides.length - 1) {
      slideToSlide(currentSlide + 1, gallery);
    } else {
      slideToSlide(0, gallery);
    }
  }, 3000); // Change the time interval here (in milliseconds)
}

function myLoadFunction() {
  setSliderDimensions();

  window.addEventListener("resize", handleWindowResize);

  startGallery();
}

function updatePriceValue(val) {
  document.getElementById('price-value').innerHTML = "$" + val;
}

let currentSlide = 0;
let startX = 0;

document.addEventListener("DOMContentLoaded", myLoadFunction);
