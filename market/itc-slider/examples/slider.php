<!doctype html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <title>ItcSlider - Example 03</title>
  <link href="../itc-slider.css" rel="stylesheet">
  <script src="../itc-slider.js" defer></script>
  <style>
    *,
    *::before,
    *::after {
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto,
      'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji',
      'Segoe UI Symbol';
    }

    .container {
      max-width: 700px;
      margin: 0 auto;
    }

    .itc-slider__item {
      flex: 0 0 50%;
      max-width: 50%;
      height: 250px;
      display: flex;
      justify-content: center;
      align-items: center;
      color: rgba(255, 255, 255, 0.8);
      font-size: 7rem;
    }

    .itc-slider__item:nth-child(1) {
      background-color: #f44336;
    }

    .itc-slider__item:nth-child(2) {
      background-color: #9c27b0;
    }

    .itc-slider__item:nth-child(3) {
      background-color: #3f51b5;
    }

    .itc-slider__item:nth-child(4) {
      background-color: #03a9f4;
    }

    .itc-slider__item:nth-child(5) {
      background-color: #4caf50;
    }
  </style>
</head>
<body>
<div class="container">
  <div class="itc-slider" data-slider="itc-slider" data-loop="true" data-autoplay="false">
    <div class="itc-slider__wrapper">
      <div class="itc-slider__items">
        <div class="itc-slider__item">
          <!-- Контент 1 слайда -->
          1
        </div>
        <div class="itc-slider__item">
          <!-- Контент 2 слайда -->
          2
        </div>
        <div class="itc-slider__item">
          <!-- Контент 3 слайда -->
          3
        </div>
        <div class="itc-slider__item">
          <!-- Контент 4 слайда -->
          4
        </div>
        <div class="itc-slider__item">
          <!-- Контент 5 слайда -->
          5
        </div>
      </div>
    </div>
    <button class="itc-slider__btn itc-slider__btn_prev"></button>
    <button class="itc-slider__btn itc-slider__btn_next"></button>
  </div>
</div>
</body>
</html>
