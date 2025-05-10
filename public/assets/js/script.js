

const pre_carremento = document.querySelector(".pre-carregamento");

function preCarregamento() {
  pre_carremento.style.opacity = "0";
  pre_carremento.style.display = "none";
  setTimeout(() => {
    pre_carremento.style.display = "none";
  }, 5000);
}

document.addEventListener("DOMContentLoaded", function () {
  if (typeof Scrollbar === "undefined") {
    console.log("A biblioteca Smooth Scrollbar não foi carregada.");
    return;
  }

  // Selecionando a classe `.content`
  const scrollArea = document.querySelector(".content");

  const options = {
    damping: 0.030, // Suavidade do scroll
    continuousScrolling: true, // Habilita scroll contínuo
    alwaysShowTracks: true, // Mantém as barras de rolagem visíveis
  };

  // Inicializando o Smooth Scrollbar na `.content`
  const scrollbar = Scrollbar.init(scrollArea, options);

  // Exemplo: Controlar o scroll ou adicionar eventos
  if (scrollbar) {
    // Rolagem inicial para o topo
    scrollbar.scrollTo(0, 0, 500); // (x, y, duração em ms)

    // Evento de scroll
    scrollbar.addListener((status) => {
      console.log(`Scroll Y atual: ${status.offset.y}`);
    });
  }
});






var swiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
  spaceBetween: 10,
  loop: true,
  autoplay: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
    1024: {
      slidesPerView: 4,
      spaceBetween: 40,
    },
  },
});






const menuToggle = document.querySelector('.menu-toggle');
const navLinks = document.querySelector('.nav-links');


menuToggle.addEventListener('click', () => {
  navLinks.classList.toggle('show');
});




let counters = [
  { element: document.getElementById('counter1'), isCounting: false, count: 0, target: 10 },
  { element: document.getElementById('counter2'), isCounting: false, count: 0, target: 4 },

];

function startCounting(counter) {
  counter.count = 0;
  counter.element.textContent = counter.count;
  counter.isCounting = true;

  let interval = setInterval(function () {
    if (counter.count < counter.target) {
      counter.count++;
      counter.element.textContent = counter.count;
    } else {
      clearInterval(interval);
      counter.isCounting = false;
    }
  }, 80);
}

window.addEventListener('scroll', function () {
  counters.forEach(function (counter) {
    let counterPosition = counter.element.getBoundingClientRect().top;
    let screenPosition = window.innerHeight;

    if (counterPosition < screenPosition && !counter.isCounting) {
      startCounting(counter);
    }
  });
});

var swiper2 = new Swiper(".mySwiper2", {
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  loop: true,
  spaceBetween: 30,
  effect: "fade",
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
