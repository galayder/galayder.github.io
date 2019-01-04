<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GoLafa</title>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-visible/1.2.0/jquery.visible.min.js"></script>
    <link rel="stylesheet" href="./styles-mobile.css">
    <script>
        $( function() {
            $( ".accordion" ).accordion({
                collapsible: true,
                heightStyle: "content",
                active: false
            });
        } );
    </script>
</head>
<body>
    <div id="root" class="global-wrapper">

        <header class="header">
            <div class="logo">
                <a href="./index-m.php"><img src="img/logo.png" alt="GoLafa"></a>
            </div>
            <div class="menu">
                <div class="menu__button">
                    <?php echo file_get_contents("img/icon--hamburger.svg"); ?>
                </div>
                <div class="menu__content">
                    <div class="menu__item">
                        <input class="input input--search" type="text" placeholder="Поиск">
                        <button type="button" class="btn btn--search btn--right">
                            <div class="icon icon--find"></div>
                        </button>
                    </div>
                    <div class="menu__item">
                        <div class="select-group">
                            <div class="select__icon">
                                <i class="icon icon--arrow"></i>
                            </div>
                            <div class="select">
                                <div class="select__item is-current">
                                    Рус
                                </div>
                                <div class="select__item">Укр</div>
                                <div class="select__item">En</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        
        <div class="filter-block">
            <div class="filter-block__title">
                Легко спланируйте свой вечер, выходные </br>или путешествие всей жизни
            </div>

            <?php include_once("tabs-m.php"); ?>

            <div class="filter-block__inner">

                <?php for ($i=0; $i <= count($tabContent)-1; $i++){ ?>
                    <div class="filter-block__item accordion" id="filter-<?php echo $i; ?>">
                        <div class="filter js-filter">
                            <i class="icon">
                                <?php echo file_get_contents($iconArray[$i]); ?>
                            </i>
                            <span><?php echo $tabContent[$i+1]['title']; ?></span>
                            <i class="icon icon--arrow-down">
                                <?php echo file_get_contents("img/icon--arrow-down.svg"); ?>
                            </i>
                        </div>

                        <div class="sub-filter-block">
                                <?php for ($j=1; $j <= count($tabContent[$i+1])-1; $j++){ ?>
                                    <div class="accordion sub-accordion">
                                        <div class="sub-filter__title">
                                            <div>
                                                <span><?php echo $tabContent[$i+1]['sub-filter']['sub-title']; ?></span>
                                                <i class="icon icon--arrow-down">
                                                    <?php echo file_get_contents("img/icon--arrow-down.svg"); ?>
                                                </i>
                                            </div>
                                        </div>
                                        <div class="sub-filter js-sub-filter">
                                            <div class="filter js-filter">
                                                <?php for ($k=1; $k <= count($tabContent[$i+1])-1; $k++){ ?>
                                                    <span><?php echo $tabContent[$i+1][$k]; ?></span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                        </div>
                    </div>
                <?php } ?>

                <div class="filter-block__item">
                </div>

                <div class="filter-block__item">
                    <div class="find-button">Найти</div>
                </div>
            </div>
        </div>

        <section class="content"> 
            <div class="content-wrapper">

                <div class="content__title">Все категории</div>
                <div class="grid grid--promo">
                    <div class="grid__row">
                        <div class="grid__column fr-ml-2">
                            <div class="promo-block promo-block--transport">
                                <a href="#" class="btn btn--promo"></a>
                                <img src="./img/puzzle/mobile/1-transport-puzzle.png" alt="Транспорт">
                                <div class="promo-title">Транспорт</div>
                            </div>
                        </div>
                        <div class="grid__column fr-ml-2">
                            <div class="promo-block promo-block--apartments">
                                <a href="#" class="btn btn--promo"></a>
                                <img src="./img/puzzle/mobile/2-apartments-puzzle.png" alt="Жилье">
                                <div class="promo-title">Жилье</div>
                            </div>
                        </div>
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--places">
                                <a href="#" class="btn btn--promo"></a>
                                <img src="./img/puzzle/mobile/3-places-puzzle.png" alt="Интересные места">
                                <div class="promo-title">Интересные <br/>места</div>                                             
                            </div>
                        </div>
                        <div class="grid__column fr-ml-2">
                            <div class="promo-block promo-block--entertainment">
                                <a href="#" class="btn btn--promo"></a>
                                <img src="./img/puzzle/mobile/4-entertainment-puzzle.png" alt="Развлечения, досуг">
                                <div class="promo-title">Развлечения, <br/>досуг</div>
                            </div>
                        </div>
                        <div class="grid__column fr-ml-2">
                            <div class="promo-block promo-block--food">
                                <a href="#" class="btn btn--promo"></a>
                                <img src="./img/puzzle/mobile/5-food-puzzle.png" alt="Еда">
                                <div class="promo-title">Еда</div>
                            </div>
                        </div>
                        <div class="grid__column fr-ml-2">
                            <div class="promo-block promo-block--events">
                                <a href="#" class="btn btn--promo"></a>
                                <img src="./img/puzzle/mobile/6-events-puzzle.png" alt="События, фестивали">
                                <div class="promo-title">События,<br/>фестивали</div>
                            </div>
                        </div>
                        <div class="grid__column fr-ml-2">
                            <div class="promo-block promo-block--inctitutions">
                                <a href="#" class="btn btn--promo"></a>
                                <img src="./img/puzzle/mobile/7-institutions-puzzle.png" alt="Учреждения, прочее">
                                <div class="promo-title">Учреждения,</br>прочее</div>
                            </div>
                        </div>
                        <div class="grid__column fr-ml-2">
                            <div class="promo-block promo-block--shopping">
                                <a href="#" class="btn btn--promo"></a>
                                <img src="./img/puzzle/mobile/8-shopping-puzzle.png" alt="Шопинг">
                                <div class="promo-title">Шопинг</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content content--cards">
            <div class="content-wrapper">
                <div class="content__title">Предложения для вас</div>
                <div class="grid">
                    <div class="grid__row">
                        <div class="grid__column fr-3 fr-pda-2 fr-ml-1">
                            <div class="card">
                                <div class="card__img">
                                    <img src="./img/photos/ph-1@2x.jpg" alt="">
                                    <div class="price-label">
                                        от <b class="js-charsplit">99</b> грн
                                    </div>
                                </div>
                                <div class="card__content">
                                    <div class="card-category card-category--food">Категория объекта</div>
                                    <div class="card-name">Длинное название объекта, которое не помещается в одну строку</div>
                                    <div class="card-adress">Длииииинный адрес объекта Город, улица, дом</div>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column fr-3 fr-pda-2 fr-ml-1">
                            <div class="card">
                                <div class="card__img">
                                    <img src="./img/photos/ph-2@2x.jpg" alt="">
                                    <div class="price-label">
                                        от <b class="js-charsplit">99</b> грн
                                    </div>
                                </div>
                                <div class="card__content">
                                    <div class="card-category card-category--places">Категория объекта</div>
                                    <div class="card-name">Длинное название объекта, которое не помещается в одну строку</div>
                                    <div class="card-adress">Длииииинный адрес объекта Город, улица, дом</div>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column fr-3 fr-pda-2 fr-ml-1">
                            <div class="card">
                                <div class="card__img">
                                    <img src="./img/photos/ph-3@2x.jpg" alt="">
                                    <div class="price-label">
                                        от <b class="js-charsplit">9966</b> грн
                                    </div>
                                </div>
                                <div class="card__content">
                                    <div class="card-category card-category--events">Категория объекта</div>
                                    <div class="card-name">Название объекта, которое помещается в одну строку</div>
                                    <div class="card-adress">Длинный адрес объекта Город, улица, дом</div>
                                </div>
                            </div>
                        </div>
    
                        <div class="grid__column fr-3 fr-pda-2 fr-ml-1">
                            <div class="card">
                                <div class="card__img">
                                    <img src="./img/photos/ph-4@2x.jpg" alt="">
                                    <div class="price-label">
                                        от <b class="js-charsplit">919</b> грн
                                    </div>
                                </div>
                                <div class="card__content">
                                    <div class="card-category card-category--shoping">Категория объекта</div>
                                    <div class="card-name">Длинное название объекта, которое не помещается в одну строку</div>
                                    <div class="card-adress">Длииииинный адрес объекта Город, улица, дом</div>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column fr-3 fr-pda-2 fr-ml-1">
                            <div class="card">
                                <div class="card__img">
                                    <img src="./img/photos/ph-5@2x.jpg" alt="">
                                    <div class="price-label">
                                        от <b class="js-charsplit">12399</b> грн
                                    </div>
                                </div>
                                <div class="card__content">
                                    <div class="card-category card-category--events">Категория объекта</div>
                                    <div class="card-name">Длинное название объекта, которое не помещается в одну строку</div>
                                    <div class="card-adress">Длииииинный адрес объекта Город, улица, дом</div>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column fr-3 fr-pda-2 fr-ml-1">
                            <div class="card">
                                <div class="card__img">
                                    <img src="./img/photos/ph-6@2x.jpg" alt="">
                                    <div class="price-label">
                                        от <b class="js-charsplit">9459</b> грн
                                    </div>
                                </div>
                                <div class="card__content">
                                    <div class="card-category card-category--apartments">Категория объекта</div>
                                    <div class="card-name">Длинное название объекта, которое не помещается в одну строку</div>
                                    <div class="card-adress">Длииииинный адрес объекта Город, улица, дом</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer">
            <div class="footer__head">
                <div class="social-block">
                    <div class="icon icon--twitter">
                        <a href="#">
                            <?php echo file_get_contents("img/social/icon-twitter.svg"); ?>
                        </a>
                    </div>
                    <div class="icon icon--facebook">
                        <a href="#">
                            <?php echo file_get_contents("img/social/icon-facebook.svg"); ?>
                        </a>                            
                    </div>
                    <div class="icon icon--vk">
                        <a href="#">
                            <?php echo file_get_contents("img/social/icon-vk.svg"); ?>
                        </a>                            
                    </div>
                </div>
            </div>
            <div class="footer__text">Golafa – сервис, который помогает легко найти, распланировать и приобрести все необходимое для интересного вечера, приятных выходных или незабываемого путешествия. Строить планы еще никогда не было так просто!</div>
            <div class="footer__copyright">
                © 2018, Golafa</br>
                Все права защищены
            </div>
        </footer>

        <div class="filter-block__dimmer js-dimm"></div>
    </div>

    <script defer src="js/js-mobile.js"></script>
    <script defer src="js/dropdown.js"></script>
</body>
</html>