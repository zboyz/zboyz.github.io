$(document).ready(function () {
  // Creation d'une animation pour ouvrir le menu et ses composants.

    $(".close-menu").hide();
    $(".open-menu").on("click", function () {
        console.log("click");
        $("#myNav").width("100%");
        $(".close-menu").show();
        $(".open-menu").hide();
        $("body").css({ overflow: "hidden" });
        $(".mainContent").css({ opacity: "0.1" });
    });

    $(".close-menu").on("click", function () {
        console.log("click");
        $("#myNav").width("0%");
        $(".open-menu").show();
        $(".close-menu").hide();
        $("body").css({ overflow: "scroll" });
        $(".mainContent").css({ opacity: "1" });
    });
});

gsap.registerPlugin(ScrollTrigger);

gsap.to(".formationExp", {
  scrollTrigger: {
    trigger: ".formationExp",
    scrub: 1,
    pin: true,
    start: "top center",
    end: "bottom bottom",
  },
  scaleX: 1,
  scaleY: 1,
  transformOrigin: "center center",
  ease: "none", 
});


gsap.from(".formationTitle, .boxForma1", {
  scrollTrigger: {
    trigger: ".formationTitle, .boxForma1",
    scrub: 1,
    pin: true,
    start: "bottom center", 
    end: "center top",
  },
  scaleX: 0,
  transformOrigin: "right center",
  ease: "power3",
});

gsap.from(".boxForma2", {
  scrollTrigger: {
    trigger: ".boxForma2",
    scrub: 1,
    start: "bottom bottom", 
    end: "top center",
  },
  scaleX: 0,
  transformOrigin: "right center",
  ease: "power3",
});

gsap.from(".boxForma3", {
  scrollTrigger: {
    trigger: ".boxForma3",
    scrub: 1,
    start: "bottom bottom", 
    end: "top center",
  },
  scaleX: 0,
  transformOrigin: "right center",
  ease: "power3",
});

gsap.from(".experienceTitle, .boxExp1", {
  scrollTrigger: {
    trigger: ".experienceTitle, .boxExp1",
    scrub: 1,
    pin: true,
    start: "bottom center", 
    end: "center top",
  },
  scaleX: 0,
  transformOrigin: "left center",
  ease: "power3",
});

gsap.from(".boxExp2", {
  scrollTrigger: {
    trigger: ".boxExp2",
    scrub: 1,
    start: "bottom bottom", 
    end: "top center",
  },
  scaleX: 0,
  transformOrigin: "left center",
  ease: "power3",
});

gsap.from(".boxExp3", {
  scrollTrigger: {
    trigger: ".boxExp3",
    scrub: 1,
    start: "bottom bottom", 
    end: "top center",
  },
  scaleX: 0,
  transformOrigin: "left center",
  ease: "power3",
});

gsap.from(".centreTitle", {
  scrollTrigger: {
    trigger: ".centreTitle",
    scrub: 1,
    pin: true,
    start: "bottom bottom", 
    end: "top center",
  },
  scaleX: 0,
  transformOrigin: "left center",
  ease: "power3",
});

gsap.from(".footCard", {
  scrollTrigger: {
    trigger: ".footCard",
    scrub: 1,
    pin: true,
    start: "bottom bottom", 
    end: "top center",
  },
  scaleX: 0,
  transformOrigin: "left center",
  ease: "power3",
});

gsap.from(".cinemaCard", {
  scrollTrigger: {
    trigger: ".cinemaCard",
    scrub: 1,
    pin: true,
    start: "bottom bottom", 
    end: "top center",
  },
  scaleX: 0,
  transformOrigin: "right center",
  ease: "power3",
  delay: 1,
});


    let myInterval = setInterval(Flash, 500);
function Flash() {
    $(".boxForma1").on('mouseover', function() {
        $(".flashForma1").fadeOut();
        $(".flashForma1").fadeIn();
    });
    $(".boxForma1").on('mouseout', function () {
        $(".flashForma1").stop(true, true);
        $(".flashForma1").fadeIn();
    });

    $(".boxForma2").on('mouseover', function() {
        $(".flashForma2").fadeOut();
        $(".flashForma2").fadeIn();
    });
    $(".boxForma2").on('mouseout', function () {
        $(".flashForma2").stop(true, true);
        $(".flashForma2").fadeIn();
    });

    $(".boxForma3").on('mouseover', function() {
        $(".flashForma3").fadeOut();
        $(".flashForma3").fadeIn();
    });
    $(".boxForma3").on('mouseout', function () {
        $(".flashForma3").stop(true, true);
        $(".flashForma3").fadeIn();
    });

    $(".boxExp1").on('mouseover', function() {
        $(".flashExp1").fadeOut();
        $(".flashExp1").fadeIn();
    });
    $(".boxExp1").on('mouseout', function () {
        $(".flashExp1").stop(true, true);
        $(".flashExp1").fadeIn();
    });

    $(".boxExp2").on('mouseover', function() {
        $(".flashExp2").fadeOut();
        $(".flashExp2").fadeIn();
    });
    $(".boxExp2").on('mouseout', function () {
        $(".flashExp2").stop(true, true);
        $(".flashExp2").fadeIn();
    });

    $(".boxExp3").on('mouseover', function() {
        $(".flashExp3").fadeOut();
        $(".flashExp3").fadeIn();
    });
    $(".boxExp3").on('mouseout', function () {
        $(".flashExp3").stop(true, true);
        $(".flashExp3").fadeIn();
    });
};

