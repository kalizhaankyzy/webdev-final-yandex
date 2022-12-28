<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Яндекс Плюс</title>
        <link rel="stylesheet" href="plus.css">
        <?php
        session_start();
        require('../connection.php');

        $user_id = $_SESSION['user_id'];
        $query = "SELECT `has_subscr`, `balance` FROM `user` WHERE `user_id`= $user_id;";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $rows = mysqli_num_rows($result);

        $hasPlus = false;
        $user_balance = 0;
        if($rows == 1){
            while($row = $result->fetch_assoc()){
                if($row['has_subscr'] == 1){
                    $hasPlus = true;
                }
                $user_balance = $row['balance'];
            }
        }
        ?>
    </head>
    <body style="background-color:rgb(241, 243, 245)">
        <header data-test-id="header" id="header" class="header_nav-v2">
            <div class="header__inner">
                <div class="header__logo-yndx">
                    <a class="plogo_yandex_ru" href="https://ya.ru?utm_source=travel&amp;utm_term=src_travel"></a>
                </div>
                <a  class="header__logo-icon" href="/">
                    <svg viewBox="0 0 28 28" fill="url(#plus_gradient)" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.12 22.4L17.85 14H28C28 17.713 26.525 21.274 23.8995 23.8995C21.274 26.525 17.713 28 14 28C10.287 28 6.72599 26.525 4.10048 23.8995C1.47497 21.274 0 17.713 0 14C0 10.287 1.47497 6.72601 4.10048 4.1005C6.72599 1.475 10.287 0 14 0C15.4689 -8.76327e-06 16.9287 0.230691 18.326 0.683667L15.1364 10.5H5.81932L4.68068 14H14L11.27 22.4H15.12ZM18.9864 10.5L21.658 2.28201C24.5797 4.19098 26.684 7.12145 27.559 10.5H18.9864Z" fill="url(#plus_gradient)"></path>
                        <defs>
                            <linearGradient id="plus_gradient" x1="-1.10798e-07" y1="12.1333" x2="28" y2="12.1333" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#FF5C4D"></stop><stop offset="0.4" stop-color="#EB469F"></stop><stop offset="1" stop-color="#8341EF"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                </a>
                <div class="header__logo-plus">
                    <a class="plogo_plus_ru" href="#"></a>
                </div>
                <div id="header-portal"></div>
                    <div style="right: 0; display: flex; position: absolute; align-items: center;">
                    <?php
                    if($hasPlus == true){

                    ?>
                    <div style="margin-right: 15px;">
                        <a href="" class="menu">
                            <span class="menu-text">Баланс: <?php echo $user_balance ?> KZT</span>
                        </a>
                    </div>
                    <?php
                    } 
                    ?>
                    
                    <div>
                        <a href="" class="menu">
                            <span class="menu-text">Меню</span>
                        </a>
                    </div>
                    <div>
                        <?php if(isset($_SESSION['login']) && $_SESSION['login']==1){ ?>
                            <a href="plus.php?logout=true" class="login"><span class="login-text">Выйти</span></a>
                        <?php   } 
                        if (isset($_GET['logout'])) {
                            $_SESSION['login']=0;
                        }
                        ?>
                        <?php if(empty($_SESSION['login']) || $_SESSION['login']==0){ ?>
                            <a href="http://localhost/yandex/login/login.php" class="login"><span class="login-text">Войти</span></a>
                        <?php   } ?>
                    </div>
                </div>
            </div>
        </header>
        <div class="body">
            <div class="sections-group">
                <section class="universal-section" id="universal-section" style="background-color: rgb(152, 155, 186); min-height: 500px; color: rgb(255, 255, 255);">
                    <div class="universal-section__inner">
                        <div class="universal-section__column">
                            <div class="universal-section__text_title" style="color: rgb(255, 255, 255);"><span>Мастерская <br>подарков Плюса</span></div>
                            <div class="universal-section__text_subtitle" style="color: rgb(255, 255, 255);">
                                <span>Помощники Плюса приготовили для вас подарки. <br>Много подарков. Для каждого— разные  <br><br>Оформите подписку и смотрите, какой подарок <br>попадётся вам. А ещё смотрите Кинопоиск, <br>слушайте Музыку и копите баллы Плюса <br>за поездки и заказы</span></div>
                                <div class="universal-section__buttons">
                                    <div class="universal-section__button-wrapper_one-btn">
                                        <div>
                                            <div class="pay-disclaimer-button">
                                                <div class="pay-disclaimer-button__inner"><a class="pay-disclaimer-link" 
                                                    href="<?php if(isset($_SESSION['login']) && $_SESSION['login'] == 1) {echo 'http://localhost/yandex/plus/payment.php';} else {echo 'http://localhost/yandex/login/login.php';}?>">
                                                    <div class="ui-button__text">
                                                        <span class="ui-button__text-primary">
                                                            <span>Бесплатно до весны</span></span></div></a></div>
                                                            <p class="pay-disclaimer-button__disclaimer"  style="color: rgb(255, 255, 255); opacity: 0.6;"><span>далее 1499 ₸ в месяц</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
             </div>
             <section class="universal-section" id="universal-section_304__5804" style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);">
                <div class="universal-section__inner"><div class="universal-section__column_vertical-align_center">
                    <img class="universal-section__logo" src="https://avatars.mds.yandex.net/get-media-infra/3756502/c52f956b-52a7-48eb-b5cd-8480b14cfa1b/orig" srcset="https://avatars.mds.yandex.net/get-media-infra/3756502/c52f956b-52a7-48eb-b5cd-8480b14cfa1b/orig , https://avatars.mds.yandex.net/get-media-infra/3756502/c52f956b-52a7-48eb-b5cd-8480b14cfa1b/orig , https://avatars.mds.yandex.net/get-media-infra/3756502/c52f956b-52a7-48eb-b5cd-8480b14cfa1b/orig " alt="Новогодние фильмы" loading="eager">
                    <div class="universal-section__text_mt-31" style="color: rgb(0, 0, 0);">
                        <span>Новогодние фильмы</span>
                    </div>
                    <div class="universal-section__text_mt-20_23" style="color: rgb(0, 0, 0);">
                        <span>Выбирайте на Кинопоиске фильм из новогодней подборки и устраивайте семейный просмотр с пледом и горячим чаем</span>
                    </div>
                    <div class="universal-section__buttons"></div></div>
                    <div class="universal-section__image-wrapper_position_above-logo">
                        <button class="home-action-element home-action__button">
                            <style>[data-style-id="304__5804__universal-section-image"] {background-image: -webkit-image-set(url("https://avatars.mds.yandex.net/get-media-infra/3601332/78a0793f-56b9-4331-abe8-5f15ac8f54e2/universal-image-x1") 1x, url("https://avatars.mds.yandex.net/get-media-infra/3601332/78a0793f-56b9-4331-abe8-5f15ac8f54e2/universal-image-x2") 2x, url("https://avatars.mds.yandex.net/get-media-infra/3601332/78a0793f-56b9-4331-abe8-5f15ac8f54e2/universal-image-x3") 3x)} @media (max-width: 540px) { [data-style-id="304__5804__universal-section-image"] {background-image: -webkit-image-set(url("https://avatars.mds.yandex.net/get-media-infra/3601332/78a0793f-56b9-4331-abe8-5f15ac8f54e2/universal-image-540-x1") 1x, url("https://avatars.mds.yandex.net/get-media-infra/3601332/78a0793f-56b9-4331-abe8-5f15ac8f54e2/universal-image-540-x2") 2x, url("https://avatars.mds.yandex.net/get-media-infra/3601332/78a0793f-56b9-4331-abe8-5f15ac8f54e2/universal-image-540-x3") 3x)} }</style>
                            <div role="img" aria-label="Новогодние фильмы" data-style-id="304__5804__universal-section-image" data-test-id="universal-image" class="universal-image__background universal-section__image-background">
                                <div class="universal-image__height-filler universal-section__image-height-filler">
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
                <h3 class="universal-section__text_mt-31" style="font-size: 25px">
                    Что посмотреть
                </h3>
                <ul style="display: flex; padding: 0;--outer-vertical-space: 28px; ">
                    <li class="li"><img class="img_li" src="https://avatars.mds.yandex.net/get-media-infra/3601332/96d6a9a6-05c6-4f63-a4c5-1c2f5de278c0/coupon-x1"></li>
                    <li class="li"><img class="img_li" src="https://avatars.mds.yandex.net/get-media-infra/3737142/1f673812-1e49-4ade-8a8d-19f1d2075f79/coupon-x1"></li>
                    <li class="li"><img class="img_li" src="https://avatars.mds.yandex.net/get-media-infra/3601332/42bad1f2-093a-4d68-9c42-b09da6503e8b/coupon-x1"></li>
                    <li class="li"><img class="img_li" src="https://avatars.mds.yandex.net/get-media-infra/3737142/1a32de20-2a95-49bb-be4c-06b3adf7e8db/coupon-x1"></li>
                  </ul>
            </section>
            <section class="universal-section" id="universal-section_304__5804" style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); margin-top: 30px;">
                <div class="universal-section__inner"><div class="universal-section__column_vertical-align_center">
                    <img class="universal-section__logo" src="https://avatars.mds.yandex.net/get-media-infra/3502168/2631a296-1437-4536-aba9-4ba9b0465e94/orig" srcset="https://avatars.mds.yandex.net/get-media-infra/3502168/2631a296-1437-4536-aba9-4ba9b0465e94/orig , https://avatars.mds.yandex.net/get-media-infra/3502168/2631a296-1437-4536-aba9-4ba9b0465e94/orig , https://avatars.mds.yandex.net/get-media-infra/3502168/2631a296-1437-4536-aba9-4ba9b0465e94/orig " alt="Уютные треки" loading="eager">
                    <div class="universal-section__text_mt-31" style="color: rgb(0, 0, 0);">
                        <span>Уютные треки</span>
                    </div>
                    <div class="universal-section__text_mt-20_23" style="color: rgb(0, 0, 0);">
                        <span>Наряжайте ёлку под треки из&nbsp;новогоднего плейлиста на&nbsp;Яндекс Музыке, а&nbsp;Моя волна создаст бесконечный поток музыки для праздника</span>
                    </div>
                    <div class="universal-section__buttons"></div></div>
                    <div class="universal-section__image-wrapper_position_above-logo">
                        <button class="home-action-element home-action__button ">
                            <style>[data-style-id="304__5805__universal-section-image"] {background-image: -webkit-image-set(url("https://avatars.mds.yandex.net/get-media-infra/3601332/46af0bb1-5ae3-423a-bdff-b412324b58c2/universal-image-x1") 1x, url("https://avatars.mds.yandex.net/get-media-infra/3601332/46af0bb1-5ae3-423a-bdff-b412324b58c2/universal-image-x2") 2x, url("https://avatars.mds.yandex.net/get-media-infra/3601332/46af0bb1-5ae3-423a-bdff-b412324b58c2/universal-image-x3") 3x)} @media (max-width: 540px) { [data-style-id="304__5805__universal-section-image"] {background-image: -webkit-image-set(url("https://avatars.mds.yandex.net/get-media-infra/3601332/46af0bb1-5ae3-423a-bdff-b412324b58c2/universal-image-540-x1") 1x, url("https://avatars.mds.yandex.net/get-media-infra/3601332/46af0bb1-5ae3-423a-bdff-b412324b58c2/universal-image-540-x2") 2x, url("https://avatars.mds.yandex.net/get-media-infra/3601332/46af0bb1-5ae3-423a-bdff-b412324b58c2/universal-image-540-x3") 3x)} }</style>
                            <div role="img" aria-label="Уютные треки" data-style-id="304__5805__universal-section-image" data-test-id="universal-image" class="universal-image__background universal-section__image-background">
                                <div class="universal-image__height-filler universal-section__image-height-filler"></div>
                            </div>
                        </button>
                    </div>
                </div>
                <h3 class="universal-section__text_mt-31" style="font-size: 25px">
                    Что посмотреть
                </h3>
                <ul style="display: flex; padding: 0;--outer-vertical-space: 28px; ">
                    <li class="li"><img class="img_li" src="https://avatars.mds.yandex.net/get-media-infra/3756502/b3db73f4-177e-4d3f-ba73-b9f185a26627/coupon-x1"></li>
                    <li class="li"><img class="img_li" src="https://avatars.mds.yandex.net/get-media-infra/3631343/1f706ba3-5229-4e88-98f5-85295363f4dc/coupon-x1"></li>
                    <li class="li"><img class="img_li" src="https://avatars.mds.yandex.net/get-media-infra/3601332/84691d87-bc02-49f5-8c65-a256960f9c9a/coupon-x1"></li>
                    <li class="li"><img class="img_li" src="https://avatars.mds.yandex.net/get-media-infra/3502168/c2530c75-cf93-406c-930a-49a37cd6fccd/coupon-x1"></li>
                </ul>
            </section>
            <section class="universal-section" id="universal-section_304__5804" style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); margin-top: 30px;">
                <div class="universal-section__inner"><div class="universal-section__column_vertical-align_center">
                    <!-- <img class="universal-section__logo" src="https://avatars.mds.yandex.net/get-media-infra/3502168/2631a296-1437-4536-aba9-4ba9b0465e94/orig" srcset="https://avatars.mds.yandex.net/get-media-infra/3502168/2631a296-1437-4536-aba9-4ba9b0465e94/orig , https://avatars.mds.yandex.net/get-media-infra/3502168/2631a296-1437-4536-aba9-4ba9b0465e94/orig , https://avatars.mds.yandex.net/get-media-infra/3502168/2631a296-1437-4536-aba9-4ba9b0465e94/orig " alt="Уютные треки" loading="eager"> -->
                    <div class="universal-section__text_mt-31" style="color: rgb(0, 0, 0);">
                        <span>Баллы Плюса </span>
                    </div>
                    <div class="universal-section__text_mt-20_23" style="color: rgb(0, 0, 0);">
                        <span>Получайте до&nbsp;5% кешбэка баллами за&nbsp;заказы блюд через Еду и&nbsp;10% баллами за&nbsp;поездки в&nbsp;тарифах Комфорт и&nbsp;выше через&nbsp;Go. Копите баллы и&nbsp;тратьте на&nbsp;новые заказы и&nbsp;поездки</span>
                    </div>
                    <div class="universal-section__buttons"></div></div>
                    <div class="universal-section__image-wrapper_position_above-logo">
                        <button class="home-action-element home-action__button " data-test-id="home-action__button-304__5691"><style>[data-style-id="304__5691__universal-section-image"] {background-image: -webkit-image-set(url("https://avatars.mds.yandex.net/get-media-infra/3752625/547c9d60-859c-4bd4-a198-c4b8a489c0c9/universal-image-x1") 1x, url("https://avatars.mds.yandex.net/get-media-infra/3752625/547c9d60-859c-4bd4-a198-c4b8a489c0c9/universal-image-x2") 2x, url("https://avatars.mds.yandex.net/get-media-infra/3752625/547c9d60-859c-4bd4-a198-c4b8a489c0c9/universal-image-x3") 3x)} @media (max-width: 540px) { [data-style-id="304__5691__universal-section-image"] {background-image: -webkit-image-set(url("https://avatars.mds.yandex.net/get-media-infra/3752625/547c9d60-859c-4bd4-a198-c4b8a489c0c9/universal-image-540-x1") 1x, url("https://avatars.mds.yandex.net/get-media-infra/3752625/547c9d60-859c-4bd4-a198-c4b8a489c0c9/universal-image-540-x2") 2x, url("https://avatars.mds.yandex.net/get-media-infra/3752625/547c9d60-859c-4bd4-a198-c4b8a489c0c9/universal-image-540-x3") 3x)} }</style><div role="img" aria-label="Баллы Плюса" data-style-id="304__5691__universal-section-image" data-test-id="universal-image" class="universal-image__background universal-section__image-background"><div class="universal-image__height-filler universal-section__image-height-filler"></div></div></button>
                    </div>
                </div>
            </section>
            <div class="sections-group">
                <section class="universal-section" id="universal-section2" style="background-color: rgb(152, 155, 186); min-height: 400px; color: rgb(255, 255, 255);margin-top: 30px">
                    <div class="universal-section__inner">
                        <div class="universal-section__column">
                            <div class="universal-section__text_title" style="color: rgb(255, 255, 255);"><span>Новогодний розыгрыш</span></div>
                            <div class="universal-section__text_subtitle" style="color: rgb(255, 255, 255);">
                                <span>Ящик Coca Cola,  поездки на&nbsp;год от&nbsp;Go, абонементы от&nbsp;1Fit,  бонусы в&nbsp;Magnum Club, гигабайты интернета  и&nbsp;наушники Samsung Galaxy Buds Pro от&nbsp;Kcell  <br><br>Подключайте Плюс Мульти до&nbsp;10&nbsp;января и&nbsp;получите шанс выиграть подарки. Результаты объявим на&nbsp;<a href="https://plus.yandex.kz">plus.yandex.kz</a> 17&nbsp;января</span>
                                        </div>
                                    </div>
                                </section>
             </div>
             <div style="background-color: white; border-radius: 20px; padding: 30px; text-align: center;justify-content: center; align-items: center;">

             <div style="color: rgb(0, 0, 0);font-family: YS Text,arial,sans-serif;font-size: 40px;word-break: break-word; margin-bottom: 20px;">
                <span>Остались вопросы?</br>Сейчас ответим</span>
            </div>

             <button class="accordion">Что даёт Яндекс Плюс?</button>
             <div class="panel">
               <p class="faq_text">Яндекс Плюс — это доступ к миллионам треков и подкастов на Яндекс Музыке, фильмам и сериалам на Кинопоиске, а ещё кешбэк баллами, который копится при заказах в сервисах Яндекса.
                Кешбэк можно потратить в любом сервисе, который входит в Плюс. Например, вы можете получить кешбэк баллами за поездку на Такси, а потратить накопленные баллы на заказ в Яндекс Еде.</p>
                
                <p class="faq_text">Чтобы получать баллы в каждом сервисе, войдите в них под тем же ID, на который подключен Плюс.</p>
             </div>

             
             <button class="accordion">Как отменить подписку?</button>
             <div class="panel">
                 <span class="faq_text">Отключить подписку несложно, но&nbsp;без неё вы&nbsp;потеряете все преимущества Плюса: больше не&nbsp;сможете слушать Яндекс&nbsp;Музыку, смотреть фильмы и&nbsp;сериалы на&nbsp;Кинопоиске и&nbsp;копить кешбэк баллами. <br> Подписку не&nbsp;обязательно отменять, её&nbsp;можно приостановить. Все непотраченные дни сохранятся и&nbsp;вы&nbsp;сможете её&nbsp;возобновить в&nbsp;любой удобный момент. Чтобы приостановить подписку, зайдите в&nbsp;<a href="https://plus.yandex.ru/my">личный кабинет</a>, выберите активный тариф → «Приостановить подписку».  <br> Приостанавливать подписку можно не&nbsp;чаще 1&nbsp;раза за&nbsp;полгода. Приостановить можно максимум на&nbsp;56&nbsp;дней. Подробнее в&nbsp;п.2.7 <a href="https://yandex.ru/legal/yandex_plus_conditions">Условий подписки</a>.  <br> А&nbsp;чтобы полностью остановить Плюс, выберите опцию «Отменить подписку». Подписка отключится, но&nbsp;вы&nbsp;сможете пользоваться Плюсом до&nbsp;конца оплаченного периода.  <br> Если вы&nbsp;отмените подписку во&nbsp;время пробного периода, Плюс может отключиться раньше срока. Например, если у&nbsp;вас был пробный период на&nbsp;3&nbsp;месяца, то&nbsp;при отключении он&nbsp;может сократиться до&nbsp;конца текущего месяца. <br> Если вы&nbsp;подключали Плюс через своего мобильного оператора, а&nbsp;потом решили отключить его, то&nbsp;Плюс остановится в&nbsp;тот&nbsp;же день.</span>
             </div>
             
             <button class="accordion">Смогу ли я потратить баллы, накопленные в Казахстане, на территории РФ?</button>
             <div class="panel">
                <span class="faq_text">Нет, баллы нельзя потратить в&nbsp;другой стране. Но&nbsp;они не&nbsp;сгорают при смене локации&nbsp;— их&nbsp;можно будет потратить, вернувшись в&nbsp;страну, где они были накоплены.</span>
             </div>
            <button class="accordion">Можно ли получить кешбэк, если я плачу наличными?</button>
            <div class="panel">
                <span class="faq_text">Нет. Кешбэк доступен только при безналичной оплате.</span>
            </div>
            <button class="accordion">Смогут ли все пользователи Плюс Мульти получать баллы?</button>
            <div class="panel">
                <span class="faq_text">Да, все пользователи Плюс Мульти могут получать баллы за поездки и заказы.</span>
            </div>
            <button class="accordion">Буду ли я накапливать баллы во время поездки за баллы?</button>
            <div class="panel">
                <span class="faq_text">За поездку, оплаченную баллами, новые баллы не начисляются.</span>
            </div>
            <button class="accordion">Как сейчас можно оплатить подписку? Карты Visa и Mastercard работают как обычно?</button>
            <div class="panel">
                <span class="faq_text">Оплатить подписку можно картами Visa и Mastercard, выпущенными не в РФ или выпущенными российскими банками (на которые не распространяются санкции) на территории СНГ. Оплатить картами МИР или виртуальными картами Maestro и Visa Electron не получится.</span>
            </div>
            <button class="accordion">У меня не проходит оплата подписки. Что делать?</button>
            <div class="panel">
                <span class="faq_text">Чтобы продолжать пользоваться преимуществами Плюса, привяжите новую карту к своему аккаунту. Добавьте одну или несколько карт — если оплата с одной не пройдет, мы попробуем списать её с другой карты.
                    По техническим причинам не доступна привязка банковских карт, выданных банками Российской Федерации, или карт, выданных иными банками, находящимися в санкционных списках.</span>
            </div>

        </div>
        <div class="title-section title-section_with-bg-image" id="title_304__5831" style="background-color: rgb(241, 243, 245); padding-top: 5px; padding-bottom: 5px;">
            <div class="title-section__inner title-section__inner_theme_disclaimer" style="color: rgb(145, 145, 145);">
                <div class="ui-typography ui-typography_size-12" style="max-width: 100%;">
                    <span>Общий срок проведения акции с&nbsp;05.12.2023г.&nbsp;по&nbsp;10.01.2023&nbsp;г. Акция и&nbsp;розыгрыш только для пользователей с&nbsp;активной подпиской Яндекс Плюс или иной, ее&nbsp;включающей. Подробности об&nbsp;организаторе акции, правилах ее&nbsp;проведения, количестве подарков и&nbsp;призов, сроках, месте и&nbsp;порядке их&nbsp;получения&nbsp;см. https://yandex.kz/legal/plus_newyear_kz. Условия программы лояльности «Яндекс Плюс Кешбэк»: https://yandex.ru/legal/plus_loyalty. Для использования баллов требуется активная подписка Яндекс Плюс (или иная, ее&nbsp;включающая). Баллы не&nbsp;являются денежными средствами, при использовании баллов предоставляется скидка. Близкие  —&nbsp;члены семьи пользователя, проживающие совместно с&nbsp;ним. Условия подписки: https://yandex.ru/legal/yandex_plus_conditions/. Предложение для пользователей, ранее не&nbsp;оформлявших подписку Яндекс Плюс или иную подписку, ее&nbsp;включающую: Плюс Мульти до&nbsp;марта 2023&nbsp;г. (невключительно) бесплатно, далее автопродление&nbsp;— 1499&nbsp;тенге/мес. Первое списание&nbsp;— 01.03-03.03.2023&nbsp;г., дата списания определяется случайным образом. Предложение до&nbsp;10.01.2023г. Требуется указание данных банковской карты. Предложение для пользователей, ранее оформлявших подписку Яндекс Плюс (или иную, ее&nbsp;включающую), но&nbsp;более не&nbsp;имеющих активную подписку: 60&nbsp;дней подписки Плюс Мульти за&nbsp;99&nbsp;тенге, далее автопродление&nbsp;— 1499&nbsp;тенге/месяц. Требуется указание данных банковской карты. Предложение до&nbsp;10.01.2023г.   <br><br>Проект компании <a href="https://ya.ru">Яндекс</a>
                    </span>
                </div>
            </div>
        </div>
        <footer data-test-id="footer" class="p_footer p_footer_color_black p_footer__wrapper base-layout__footer ">
            <div class="p_footer__menu" data-test-id="footer">
                <a data-test-id="footer-condition-link" class="p_footer__link p_footer__link-left" rel="noopener noreferrer" target="_blank" href="https://yandex.kz/legal/yandex_plus_conditions/?utm_source=market&amp;utm_medium=banner&amp;utm_campaign=MSCAMP-77&amp;utm_term=src_market&amp;utm_content=onboarding">
                    <span>Условия подписки</span>
                </a>
                <a data-test-id="footer-privilege-link" class="p_footer__link p_footer__link-left" rel="noopener noreferrer" target="_blank" href="https://yandex.kz/legal/yandex_plus_privilege_list?utm_source=market&amp;utm_medium=banner&amp;utm_campaign=MSCAMP-77&amp;utm_term=src_market&amp;utm_content=onboarding">
                    <span>Условия привилегий</span>
                </a>
                <a data-test-id="footer-loyalty-link" class="p_footer__link p_footer__link-left" rel="noopener noreferrer" target="_blank" href="https://yandex.ru/legal/plus_loyalty/?utm_source=market&amp;utm_medium=banner&amp;utm_campaign=MSCAMP-77&amp;utm_term=src_market&amp;utm_content=onboarding">
                    <span>Условия кешбэка</span>
                </a>
                <a data-test-id="footer-support-link" class="p_footer__link p_footer__link-left" rel="noopener noreferrer" target="_blank" href="https://yandex.kz/support/plus?utm_source=market&amp;utm_medium=banner&amp;utm_campaign=MSCAMP-77&amp;utm_term=src_market&amp;utm_content=onboarding">
                    <span>Служба поддержки</span>
                </a>
                <a data-test-id="footer-business-link" class="p_footer__link p_footer__link-left" rel="noopener noreferrer" target="_blank" href="https://plus.yandex.ru/action/business?utm_source=market&amp;utm_medium=banner&amp;utm_campaign=MSCAMP-77&amp;utm_term=src_market&amp;utm_content=onboarding">
                    <span>Плюс для бизнеса</span>
                </a>
                <a data-test-id="footer-service-news-link" class="p_footer__link p_footer__link-left" rel="noopener noreferrer" target="_blank" href="https://plus.yandex.ru/?message=legal&amp;utm_source=market&amp;utm_medium=banner&amp;utm_campaign=MSCAMP-77&amp;utm_term=src_market&amp;utm_content=onboarding">
                    <span>Новости сервиса</span>
                </a>
            <div class="language-select p_footer__language-select">
                <div class="language-select__display"><span class="ui-typography ui-typography_weight-regular">
                    <span>Русский</span>
                </span>
                <img src="https://plus.yandex.kz/svgs/langs/ru.svg" class="icon__img language-select__display-icon">
                <svg fill="#000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 10" class="language-select__display-arrow">
                    <path d="M8 7.586l6.293-6.293a1 1 0 111.414 1.414L9.061 9.354a1.5 1.5 0 01-2.122 0L.293 2.707a1 1 0 011.414-1.414L8 7.586z"></path></svg>
                </div></div></div>
                <div class="p_footer__copyright-wrapper">
                    <div class="p_footer__copyright-row" data-test-id="copyright-wrapper">
                        <span class="ui-typography ui-typography_weight-regular ya-copyright">
                            <span>©&nbsp;2018–2022&nbsp;</span><span>ООО «<a class="ya-copyright__link" href="https://yandex.kz" rel="noopener noreferrer" target="_blank">Яндекс</a>»</span>
                        </span>
                        <span class="ui-typography ui-typography_size-11 ui-typography_weight-regular">
                            <span>18+</span></span>
                        </div>
                    </div>
                </footer>
        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;
            
            for (i = 0; i < acc.length; i++) {
              acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                  panel.style.maxHeight = null;
                } else {
                  panel.style.maxHeight = panel.scrollHeight + "px";
                } 
              });
            }
            </script>
    </body>

</html>