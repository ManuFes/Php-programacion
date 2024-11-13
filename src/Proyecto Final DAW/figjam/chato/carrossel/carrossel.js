document.addEventListener("DOMContentLoaded", function () {
  const container = document.querySelector(".conteudo__geral .container");
  const containerCarrossel = container.querySelector(".container-carrossel");
  const carrossel = container.querySelector(".carrossel");
  const carrosselItems = carrossel.querySelectorAll(".carrossel-item");

  let isMouseDown = false;
  let currentMousePos = 0;
  let lastMousePos = 0;
  let lastMoveTo = 0;
  let moveTo = 0;

  const createCarrossel = () => {
    const carrosselProps = containerCarrossel.getBoundingClientRect();
    const length = carrosselItems.length;
    const degrees = 360 / length;
    const gap = 20;
    const tz = carrosselProps.width / 2 / Math.tan(Math.PI / length) + gap;

    carrosselItems.forEach((item, i) => {
      const degreesByItem = degrees * i + "deg";
      item.style.setProperty("--rotatey", degreesByItem);
      item.style.setProperty("--tz", tz + "px");
    });
  };

  const lerp = (a, b, n) => n * (a - b) + b;

  const getPosX = (x) => {
    currentMousePos = x;
    moveTo = currentMousePos < lastMousePos ? moveTo - 2 : moveTo + 2;
    lastMousePos = currentMousePos;
  };

  const update = () => {
    lastMoveTo = lerp(moveTo, lastMoveTo, 0.05);
    carrossel.style.setProperty("--rotatey", lastMoveTo + "deg");
    requestAnimationFrame(update);
  };

  const initEvents = () => {
    carrossel.addEventListener("mousedown", () => {
      isMouseDown = true;
      carrossel.style.cursor = "grabbing";
    });
    carrossel.addEventListener("mouseup", () => {
      isMouseDown = false;
      carrossel.style.cursor = "grab";
    });
    container.addEventListener("mouseleave", () => (isMouseDown = false));

    carrossel.addEventListener("mousemove", (e) => isMouseDown && getPosX(e.clientX));

    window.addEventListener("resize", createCarrossel);

    update();
    createCarrossel();
  };

  initEvents();
});
