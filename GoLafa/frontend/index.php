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
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <div id="root" class="global-wrapper">

        <header class="header">
            <div class="header__content">
                <div class="logo">
                    <a href="./index.php"><img src="img/logo.png" alt="GoLafa"></a>
                </div>
                <div class="header__actions">
                    <div class="search-bar">
                        <div class="input-group">
                            <input class="input input--search" type="text" placeholder="Поиск">
                            <button type="button" class="btn btn--search btn--right">
                                <div class="icon icon--find"></div>
                            </button>
                        </div>
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

        <section class="banner">
            <div class="banner__title">Жить каждый день</div>
            <div class="banner__subtitle">Легко спланируйте свой вечер, выходные </br>или путешествие всей жизни</div>
            <nav class="filter-block">
                <div class="filter-block__inner">
                    <div class="tabbed-menu">
                        <div class="tabbed-menu__title">
                            Выберите один или несколько фильтров
                        </div>
                        
                        <div class="tab__wrapper">
                            <?php include_once("tabs.php"); ?>

                            <?php for ($i=0; $i <= count($tabArray)-1; $i++){ ?>
                                <div class="tab js-tab" id="<?php echo $i; ?>">
                                    <span><?php echo $tabArray[$i]; ?></span>
                                    <i class="icon icon--arrow"></i>
                                </div>
                            <?php } ?>
                            
                            <button class="btn btn--main btn--filter">Найти</button>
                                
                            <div class="tab__content">
                                <div class="filter-panel">
                                    <div class="filter-panel__wrapper">
                                        <div class="filter__heading">
                                            <div class="filter-category">
                                                Где будем искать?
                                            </div>
                                            <div class="sorting">
                                                <a href="#" class="service-link js-sort">Сортировать по алфавиту</a>
                                                <a href="#" class="service-link js-reset">Сбросить фильтры</a>
                                            </div>
                                        </div>
                                        <div class="filter__collection">
                                            <?php
                                                for ($i=0; $i <= count($tabContent['where'])-1; $i++){ ?>
                                                <a href="#" class="filter-item js-filter js-link">
                                                    <span><?php echo $tabContent['where'][$i]; ?></span>
                                                </a>
                                            <?php } ?>
                                            <a href="#" class="service-link service-link--more js-link">Показать все</a>
                                        </div>
                                    </div>

                                    <div class="filter-panel__wrapper js-subcollection">
                                        <div class="filter__heading">
                                            <div class="filter-category">
                                                Как далеко?
                                            </div>
                                        </div>
                                        <div class="filter__collection">
                                            <?php
                                                for ($i=0; $i <= count($tabContent['how-far'])-1; $i++){ ?>
                                                <a href="#" class="filter-item js-filter-sub js-link">
                                                    <span><?php echo $tabContent['how-far'][$i]; ?></span>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="js-close js-link"></div>
                                </div>
                                <div class="is-out-of-view"></div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </nav>
        </section>

        <section class="content"> 
            <div class="content-wrapper">

                <div class="content__title">Всё необходимое для ваших планов</div>
                <div class="grid grid--promo desktop-only">
                    <div class="grid__row">
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--transport">
                                <img src="./img/puzzle/1-pcs.png" alt="Транспорт">
                                <img class="img-dimm" src="./img/puzzle/black.png" alt="">
                                <div class="promo__action">
                                    <div class="promo-title">Транспорт</div>
                                    <a href="#" class="btn btn--promo">Смотреть</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--apartments">
                                <img src="./img/puzzle/2-pcs.png" alt="Жилье">
                                <img class="img-dimm" src="./img/puzzle/black.png" alt="">
                                <div class="promo__action">
                                    <div class="promo-title">Жилье</div>
                                    <a href="#" class="btn btn--promo">Смотреть</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--places">
                                <img src="./img/puzzle/3-pcs.png" alt="Интересные места">
                                <img class="img-dimm" src="./img/puzzle/black.png" alt="">
                                <div class="promo__action">
                                    <div class="promo-title">Интересные <br/>места</div>
                                    <a href="#" class="btn btn--promo">Смотреть</a>
                                </div>                                              
                            </div>
                        </div>
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--entertainment">
                                <img src="./img/puzzle/4-pcs.png" alt="Развлечения, досуг">
                                <img class="img-dimm" src="./img/puzzle/black.png" alt="">
                                <div class="promo__action">
                                    <div class="promo-title">Развлечения, <br/>досуг</div>
                                    <a href="#" class="btn btn--promo">Смотреть</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--events">
                                <img src="./img/puzzle/5-pcs.png" alt="События, фестивали">
                                <img class="img-dimm" src="./img/puzzle/black.png" alt="">
                                <div class="promo__action">
                                    <div class="promo-title">События,<br/>фестивали</div>
                                    <a href="#" class="btn btn--promo">Смотреть</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--shopping">
                                <img src="./img/puzzle/6-pcs.png" alt="Шопинг">
                                <img class="img-dimm" src="./img/puzzle/black.png" alt="">
                                <div class="promo__action">
                                    <div class="promo-title">Шопинг</div>
                                    <a href="#" class="btn btn--promo">Смотреть</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--food">
                                <img src="./img/puzzle/7-pcs.png" alt="Еда">
                                <img class="img-dimm" src="./img/puzzle/black.png" alt="">
                                <div class="promo__action">
                                    <div class="promo-title">Еда</div>
                                    <a href="#" class="btn btn--promo">Смотреть</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--inctitutions">
                                <img src="./img/puzzle/8-pcs.png" alt="Учреждения, прочее">
                                <img class="img-dimm" src="./img/puzzle/black.png" alt="">
                                <div class="promo__action">
                                    <div class="promo-title">Учреждения,</br>прочее</div>
                                    <a href="#" class="btn btn--promo">Смотреть</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid--promo mobile-only">
                    <div class="grid__row">
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--transport">
                                <a href="#" class="btn btn--promo"></a>
                                <img src="./img/puzzle/mobile/1-transport-puzzle.png" alt="Транспорт">
                                <div class="promo__action">
                                    <div class="promo-title">Транспорт</div>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--apartments">
                                <a href="#" class="btn btn--promo"></a>
                                <img src="./img/puzzle/mobile/2-apartments-puzzle.png" alt="Жилье">
                                <div class="promo__action">
                                    <div class="promo-title">Жилье</div>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--places">
                                <a href="#" class="btn btn--promo"></a>
                                <img src="./img/puzzle/mobile/3-places-puzzle.png" alt="Интересные места">
                                <div class="promo__action">
                                    <div class="promo-title">Интересные <br/>места</div>
                                </div>                                              
                            </div>
                        </div>
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--entertainment">
                                <a href="#" class="btn btn--promo"></a>
                                <img src="./img/puzzle/mobile/4-entertainment-puzzle.png" alt="Развлечения, досуг">
                                <div class="promo__action">
                                    <div class="promo-title">Развлечения, <br/>досуг</div>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--food">
                                <a href="#" class="btn btn--promo"></a>
                                <img src="./img/puzzle/mobile/5-food-puzzle.png" alt="Еда">
                                <div class="promo__action">
                                    <div class="promo-title">Еда</div>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--events">
                                <a href="#" class="btn btn--promo"></a>
                                <img src="./img/puzzle/mobile/6-events-puzzle.png" alt="События, фестивали">
                                <div class="promo__action">
                                    <div class="promo-title">События,<br/>фестивали</div>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--inctitutions">
                                <a href="#" class="btn btn--promo"></a>
                                <img src="./img/puzzle/mobile/7-institutions-puzzle.png" alt="Учреждения, прочее">
                                <div class="promo__action">
                                    <div class="promo-title">Учреждения,</br>прочее</div>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--shopping">
                                <a href="#" class="btn btn--promo"></a>
                                <img src="./img/puzzle/mobile/8-shopping-puzzle.png" alt="Шопинг">
                                <div class="promo__action">
                                    <div class="promo-title">Шопинг</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content content--cards">
            <div class="content-wrapper">
                <div class="content__title">Предложения для вас</div>
                <div class="content__subtitle">Чем дольше мы будем дружить, тем более интересные предложения вы здесь увидите.</div>
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
            <div class="footer__content">
                <div class="footer__head">
                    <div class="logo">
                        <img src="img/logo_footer.png" alt="GoLafa">
                    </div>
                    <div class="social-block">
                        <div class="social-icon icon--twitter">
                            <a href="#">
                                <?php echo file_get_contents("img/social/icon-twitter.svg"); ?>
                            </a>
                        </div>
                        <div class="social-icon icon--facebook">
                            <a href="#">
                                <?php echo file_get_contents("img/social/icon-facebook.svg"); ?>
                            </a>                            
                        </div>
                        <div class="social-icon icon--vk">
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
            </div>
        </footer>

        <div class="filter-block__dimmer js-dimm"></div>
    </div>

    <script defer src="js/tabedInterface.js"></script>
    <script defer src="js/dropdown.js"></script>
</body>
</html>