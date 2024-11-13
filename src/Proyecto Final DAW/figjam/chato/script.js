document.addEventListener("DOMContentLoaded", function () {
  const container = document.querySelector(".container");

  if (!container) {
    console.error("Container element not found");
    return;
  }

  const containercarrossel = container.querySelector(".container-carrossel");
  const carrossel = container.querySelector(".carrossel");

  if (!containercarrossel || !carrossel) {
    console.error("Carousel elements not found");
    return;
  }

  const carrosselItems = carrossel.querySelectorAll(".carrossel-item");

  let isMouseDown = false;
  let currentMousePos = 0;
  let lastMousePos = 0;
  let lastMoveTo = 0;
  let moveTo = 0;

  const createcarrossel = () => {
    const carrosselProps = onResize();
    const length = carrosselItems.length;
    const degrees = 360 / length;
    const gap = 20;
    const tz = distanceZ(carrosselProps.w, length, gap);

    container.style.width = tz * 2 + gap * length + "px";
    carrosselItems.forEach((item, i) => {
      const degreesByItem = degrees * i + "deg";
      item.style.setProperty("--rotatey", degreesByItem);
      item.style.setProperty("--tz", tz + "px");
    });
  };

  const lerp = (a, b, n) => n * (a - b) + b;
  const distanceZ = (widthElement, length, gap) =>
    widthElement / 2 / Math.tan(Math.PI / length) + gap;
  const onResize = () => containercarrossel.getBoundingClientRect();

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
    carrossel.addEventListener(
      "mousemove",
      (e) => isMouseDown && getPosX(e.clientX)
    );
    window.addEventListener("resize", createcarrossel);
    update();
    createcarrossel();
  };

  initEvents();
});
