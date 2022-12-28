<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../payment/payment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php 
    require('../../connection.php');
    session_start();
    $errMsg = "";

    if(isset($_POST['submitBtn'])){
      if(!empty($_POST['card-holder']) && !empty($_POST['card-number']) && !empty($_POST['card-number-1']) && 
        !empty($_POST['card-number-2']) && !empty($_POST['card-number-3']) && !empty($_POST['card-exp-month']) && 
        !empty($_POST['card-exp-year']) && !empty($_POST['ccv']))
        {
          $user_id = $_SESSION['user_id'];
          $price = $_SESSION['prod_total_price'];

          $number = strval($_POST['card-number']). strval($_POST['card-number-1']). strval($_POST['card-number-2']). strval($_POST['card-number-3']);
          $user_card_num = $number;
          $total = 0;
          $i =1;
          $last4 = substr($number, -4, 4);
          $number = str_split($number);
          $number = array_reverse($number);
          foreach($number as $digit){
            if($i % 2 == 0){
              $digit *= 2;
              if($digit > 9){
                $digit -= 9;
              }
            }
            $total += $digit;
            $i++;
          }
          if($total % 10 == 0){
            $query = "INSERT INTO `payments`(`payment_date`, `price`, `payment_type`, `user_id`) VALUES
            (NOW(), $price, 'market', $user_id)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if($result){
                header("Location: http://localhost/yandex/market/cart/payment.php");
            }
          }
          else{
            $errMsg = "Данные карты недействительны";
          }
        }else{
          $errMsg="Заполните все поля";
        }
    
    }
    ?>
</head>
<body>
<div>
    <h2 style="padding-left: 435px; padding-top: 50px;  font-size: 35px;">Оплата</h2>

    <div class="checkout">
        <div class="credit-card-box">
          <div class="flip">
            <div class="front">
              <div class="chip"></div>
              <div class="logo">
                <svg version="1.1" id="visa" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     width="47.834px" height="47.834px" viewBox="0 0 47.834 47.834" style="enable-background:new 0 0 47.834 47.834;">
                  <g>
                    <g>
                      <path d="M44.688,16.814h-3.004c-0.933,0-1.627,0.254-2.037,1.184l-5.773,13.074h4.083c0,0,0.666-1.758,0.817-2.143
                               c0.447,0,4.414,0.006,4.979,0.006c0.116,0.498,0.474,2.137,0.474,2.137h3.607L44.688,16.814z M39.893,26.01
                               c0.32-0.819,1.549-3.987,1.549-3.987c-0.021,0.039,0.317-0.825,0.518-1.362l0.262,1.23c0,0,0.745,3.406,0.901,4.119H39.893z
                               M34.146,26.404c-0.028,2.963-2.684,4.875-6.771,4.875c-1.743-0.018-3.422-0.361-4.332-0.76l0.547-3.193l0.501,0.228
                               c1.277,0.532,2.104,0.747,3.661,0.747c1.117,0,2.313-0.438,2.325-1.393c0.007-0.625-0.501-1.07-2.016-1.77
                               c-1.476-0.683-3.43-1.827-3.405-3.876c0.021-2.773,2.729-4.708,6.571-4.708c1.506,0,2.713,0.31,3.483,0.599l-0.526,3.092
                               l-0.351-0.165c-0.716-0.288-1.638-0.566-2.91-0.546c-1.522,0-2.228,0.634-2.228,1.227c-0.008,0.668,0.824,1.108,2.184,1.77
                               C33.126,23.546,34.163,24.783,34.146,26.404z M0,16.962l0.05-0.286h6.028c0.813,0.031,1.468,0.29,1.694,1.159l1.311,6.304
                               C7.795,20.842,4.691,18.099,0,16.962z M17.581,16.812l-6.123,14.239l-4.114,0.007L3.862,19.161
                               c2.503,1.602,4.635,4.144,5.386,5.914l0.406,1.469l3.808-9.729L17.581,16.812L17.581,16.812z M19.153,16.8h3.89L20.61,31.066
                               h-3.888L19.153,16.8z"/>
                    </g>
                  </g>
                </svg>
              </div>
              <div class="number"></div>
              <div class="card-holder">
                <label>Card holder</label>
                <div></div>
              </div>
              <div class="card-expiration-date">
                <label>Expires</label>
                <div></div>
              </div>
            </div>
            <div class="back">
              <div class="strip"></div>
              <div class="logo">
                <svg version="1.1" id="visa" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     width="47.834px" height="47.834px" viewBox="0 0 47.834 47.834" style="enable-background:new 0 0 47.834 47.834;">
                  <g>
                    <g>
                      <path d="M44.688,16.814h-3.004c-0.933,0-1.627,0.254-2.037,1.184l-5.773,13.074h4.083c0,0,0.666-1.758,0.817-2.143
                               c0.447,0,4.414,0.006,4.979,0.006c0.116,0.498,0.474,2.137,0.474,2.137h3.607L44.688,16.814z M39.893,26.01
                               c0.32-0.819,1.549-3.987,1.549-3.987c-0.021,0.039,0.317-0.825,0.518-1.362l0.262,1.23c0,0,0.745,3.406,0.901,4.119H39.893z
                               M34.146,26.404c-0.028,2.963-2.684,4.875-6.771,4.875c-1.743-0.018-3.422-0.361-4.332-0.76l0.547-3.193l0.501,0.228
                               c1.277,0.532,2.104,0.747,3.661,0.747c1.117,0,2.313-0.438,2.325-1.393c0.007-0.625-0.501-1.07-2.016-1.77
                               c-1.476-0.683-3.43-1.827-3.405-3.876c0.021-2.773,2.729-4.708,6.571-4.708c1.506,0,2.713,0.31,3.483,0.599l-0.526,3.092
                               l-0.351-0.165c-0.716-0.288-1.638-0.566-2.91-0.546c-1.522,0-2.228,0.634-2.228,1.227c-0.008,0.668,0.824,1.108,2.184,1.77
                               C33.126,23.546,34.163,24.783,34.146,26.404z M0,16.962l0.05-0.286h6.028c0.813,0.031,1.468,0.29,1.694,1.159l1.311,6.304
                               C7.795,20.842,4.691,18.099,0,16.962z M17.581,16.812l-6.123,14.239l-4.114,0.007L3.862,19.161
                               c2.503,1.602,4.635,4.144,5.386,5.914l0.406,1.469l3.808-9.729L17.581,16.812L17.581,16.812z M19.153,16.8h3.89L20.61,31.066
                               h-3.888L19.153,16.8z"/>
                    </g>
                  </g>
                </svg>
      
              </div>
              <div class="ccv">
                <label>CCV</label>
                <div></div>
              </div>
            </div>
          </div>
        </div>
        <form class="form" autocomplete="off" novalidate method="POST" action="">
          <fieldset name = "cardnumber">
            <label for="card-number">Card Number</label>
            <input type="num" id="card-number" name = "card-number" class="input-cart-number" maxlength="4" required/>
            <input type="num" id="card-number-1" name = "card-number-1" class="input-cart-number" maxlength="4" required/>
            <input type="num" id="card-number-2" name = "card-number-2" class="input-cart-number" maxlength="4" required/>
            <input type="num" id="card-number-3" name = "card-number-3" class="input-cart-number" maxlength="4" required/>
          </fieldset>
          <fieldset>
            <label for="card-holder">Card holder</label>
            <input type="text" id="card-holder" required name="card-holder"/>
          </fieldset>
          <fieldset class="fieldset-expiration">
            <label for="card-expiration-month">Expiration date</label>
            <div class="select">
              <select id="card-expiration-month" required name="card-exp-month">
                <option></option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
                <option>05</option>
                <option>06</option>
                <option>07</option>
                <option>08</option>
                <option>09</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
              </select>
            </div>
            <div class="select">
              <select id="card-expiration-year" required name="card-exp-year">
                <option></option>
                <option>2016</option>
                <option>2017</option>
                <option>2018</option>
                <option>2019</option>
                <option>2020</option>
                <option>2021</option>
                <option>2022</option>
                <option>2023</option>
                <option>2024</option>
                <option>2025</option>
              </select>
            </div>
          </fieldset>
          <fieldset class="fieldset-ccv">
            <label for="card-ccv">CCV</label>
            <input type="text" id="card-ccv" maxlength="3" required name="ccv"/>
          </fieldset>
          <button class="btn" name="submitBtn"><i class="fa fa-lock"></i> submit</button>
          
          <p style='text-align: center; color: red'> <?php echo $errMsg ?></p>

          <strong >Time left: <span id="time">Loading...</span></strong>
          <script  src="../../payment/timer.js"></script>
        </form>
      </div>
</div>

</body>
</html>