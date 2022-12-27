<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All Products - Red store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="product-details.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
		<script src="https://www.google.com/recaptcha/api.js?render=6Ld-WwAiAAAAAKfIZkOlY0Y-RF5obrjrEiWI1TwC"></script>
    <script defer src="product-details.js"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>

  <body>
    <div class="small-container single-product">
      <div class="row">
        <div class="col-2">
          <img src="images/gallery-1.jpg" width="100%" id="ProductImg" />

          <div class="small-img-row">
            <div class="small-img-col">
              <img src="images/gallery-1.jpg" class="small-img" />
            </div>
            <div class="small-img-col">
              <img src="images/gallery-2.jpg" class="small-img" />
            </div>
            <div class="small-img-col">
              <img src="images/gallery-3.jpg" class="small-img" />
            </div>
            <div class="small-img-col">
              <img src="images/gallery-4.jpg" class="small-img" />
            </div>
          </div>
        </div>
        <div class="col-2">
          <p>Смартфоны и гаджеты</p>
          <h2>Смартфон Apple iPhone 14 Pro</h2>
          <h4>699 990 тг</h4>
          <select name="" id="">
            <option value="">Цвет</option>
            <option value="">Черный</option>
            <option value="">Серебристый</option>
            <option value="">Золотой</option>
            <option value="">Фиолетовый</option>
            
          </select>
          <input type="number" value="1" />
          <a href="" class="btn">Добавить в корзину</a>
          <h3>Коротко о товаре:<i class="fa fa-indent"></i></h3>
          <br />
          <p>
            Экран:	6.1" (2556x1179) OLED 120 Гц <br>
            Память: встроенная 256 ГБ, 128 ГБ, 512 ГБ, 1 ТБ <br>
            Фото:	3 камеры, основная 48 МП <br>
            Операционная система:	iOS 16 <br>
            Стандарт связи:	4G LTE, 5G <br>
            Степень защиты:	IP68 <br>
            Вес:	206 г <br>
          </p>
        </div>
      </div>
    </div>

    <div class="small-container">
      <div class="row row-2">
        <h2>Другие товары</h2>
      
      </div>
    </div>


    <div class="small-container">
      <div class="row">
        <div class="col-4">
          <img src="images/product-9.png" alt="" />
          <h4>Samsung Galaxy Z Flip4</h4>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <p>749 990 тг</p>
        </div>

        <div class="col-4">
          <img src="images/product-10.png" alt="" />
          <h4>Смартфон HUAWEI P50</h4>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <p>599 990 тг</p>
        </div>

        <div class="col-4">
          <img src="images/product-11.jpg" alt="" />
          <h4>Apple MacBook Air 13 2022</h4>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
          </div>
          <p>990 990 тг</p>
        </div>
        <div class="col-4">
          <img src="images/product-12.jpg" alt="" />
          <h4>Lenovo IdeaPad 3 15</h4>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <p>329 990 тг</p>
        </div>
      </div>
    </div>
    <div id="nav-container"></div>
		<section class="hero is-fullheight">
			<div class="hero-body">
				<div class="container">
					<div class="columns is-vcentered">
						<div id="main" class="column is-half is-centered has-nice-link">
							<img id="app-icon" width="128" height="128">
							<h1 class="title is-2">Оставить отзыв</h1>
							<h2 class="title is-6">Мы ответим на ваши вопросы</h2>
							<div id="additional-info"></div>
							<form id="feedback-form" action="https://formcarry.com/s/UBfgr97yfY" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="_gotcha">
								<div class="field">
									<label class="label" for="message">Сообщение*</label>
									<div class="control">
										<textarea class="textarea is-medium" placeholder="I'm a human. Please be nice." name="message" minlength="20" rows="7" required autofocus></textarea>
									</div>
								</div>
								<div class="field">
									<label class="label" for="email">Email*</label>
									<div class="control">
										<input class="input is-medium" type="email" name="email" autocomplete="email" required>
									</div>
								</div>
								<div class="field">
									<label class="label" for="email">Вложения</label>
									<div class="control">
										<input type="file" name="attachments" multiple>
									</div>
								</div>
								<br>
								<div class="field">
									<div class="control">
										<input type="hidden" id="captchaResponse" name="g-recaptcha-response">
										<button class="button is-medium is-primary is-info" type="submit">Отправить</button>
									</div>
								</div>
							</form>
							<script>
								grecaptcha.ready(async () => {
									const token = await grecaptcha.execute('6Ld-WwAiAAAAAKfIZkOlY0Y-RF5obrjrEiWI1TwC', {action: 'homepage'});
									document.querySelector('#captchaResponse').value = token;
								});
							</script>
						</div>
					</div>
				</div>
			</div>
		</section>
    
   
     <script>
      var MenuItems = document.getElementById("MenuItems");

      MenuItems.style.maxHeight = "0px";

      function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
          MenuItems.style.maxHeight = "200px";
        } else {
          MenuItems.style.maxHeight = "0px";
        }
      }
    </script> 


    <script>
      var ProductImg = document.getElementById("ProductImg");
      var smallImg = document.getElementsByClassName("small-img");
      smallImg[0].onclick = function () {
        ProductImg.src = smallImg[0].src;
      };
      smallImg[1].onclick = function () {
        ProductImg.src = smallImg[1].src;
      };
      smallImg[2].onclick = function () {
        ProductImg.src = smallImg[2].src;
      };
      smallImg[3].onclick = function () {
        ProductImg.src = smallImg[3].src;
      };
    </script>
  </body>
</html>
