// const scroll = document.querySelector(".scroll");

("#button").click(function() {
    $('html, body').animate({
      scrollTop: $("#anchor").offset().top
    }, 2000);
  });