$('.carousel-container').slick({
  arrows: false,
  slidesToShow: 1,
  slidesToScroll: 1,
  mobileFirst: true,
  infinite: true,
  dots: true,
  autoplay: true,
  autoplaySpeed: 6000,
  adaptiveHeight: false,
  responsive: [
    {
      breakpoint: 991,
      settings: {
        arrows: true,
        prevArrow: '<a href="" class="carousel-arrow carousel-arrow--prev"></a>',
        nextArrow: '<a href="" class="carousel-arrow carousel-arrow--next"></a>'
      }
    }
  ]
});

