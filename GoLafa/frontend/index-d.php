<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GoLafa</title>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
                    <?php include_once("tabs.php"); ?>  
                    <div class="tabbed-menu">
                        <div class="tabbed-menu__title">
                            <div class="title-block">
                                Выберите один или несколько фильтров
                            </div>
                            <a href="javascript:void(0);" class="service-link js-reset-all">Сбросить фильтры</a>
                            <p class="selected-filters">
                                <?php for ($v=1; $v<=count($inp)-1; $v++){  ?>
                                    <span
                                        class="selected-filters__item"
                                        id="<?php echo $inp[$v]; ?>"
                                    >
                                    </span>
                                <?php } ?>
                            </p>
                        </div>
                        <div class="tab__wrapper">
                            <!-- Main tabs -->
                            <?php for ($m=1; $m<=6; $m++){ ?>
                                <i id="m<?php echo $m; ?>"
                                    class="tab js-tab"
                                    onclick="me('<?php echo $m; ?>')"
                                > 
                                    <?php echo $menu[$m]; ?>
                                </i>
                            <?php } ?>
                            <!-- FIND BUTTON -->
                            <button href="http://test1.golafa.com.ua/promotions_castle_online_Kiyv/" id="nay" class="btn btn--main btn--filter" onclick="me('<?php echo $m; ?>')">
                                Найти
                            </button>

                            <!-- Filter collection -->
                            <div class="tab__content">
                                <?php for ($m=1; $m<7; $m++) { ?>
                                    <div 
                                        class="filter__collection js-filter-collection" 
                                        id="v<?php echo $m; ?>r"
                                    >
                                        <div class="filter__heading">
                                            <div class="filter-category js-title"> <?php echo $zagm[$m]; ?> </div>
                                            <div class="sorting">
                                                <a href="javascript:void(0);" class="service-link js-sort">Сортировать по алфавиту</a>
                                                <a href="javascript:void(0);" class="service-link js-popular">Сортировать по популярности</a>
                                                <a href="javascript:void(0);" class="service-link js-reset">Сбросить фильтры</a>
                                            </div>
                                            <div class="sorting"></div>
                                        </div>
                                        <?php for ($n=0; $n <= count(${'v'.$m})-1; $n++) { ?>
                                            <i class="filter-item js-filter-item"
                                                href="#" id="v<?php echo $m; ?><?php echo $n; ?>"
                                                onclick="u1('v','<?php echo $n; ?>','mm1','v<?php echo $m; ?>r',<?php echo $m; ?>)"
                                            >
                                                <?php echo strtolower(${'v'.$m}[$n]); ?>
                                            </i>
                                        <?php } ?>
                                        <span class="filter-item--service">
                                            <a href="javascript:void(0);" class="service-link service-link--more js-link">
                                                Показать все
                                            </a>
                                        </span>
                                    </div>
                                <?php } ?>
                                <div class="input-price">
                                    <span class="input-label">от</span>
                                    <input class="input" type="number" min="0" max="9998" placeholder="0" id="priceMin">
                                    <span class="input-label">до</span>
                                    <input class="input" type="number" min="9999" max="99999" id="priceMax">
                                </div>

                                <?php for ($m=1; $m<10; $m++) { $m1=$m-1; ?>
                                    <div
                                        id="n2<?php echo $m1; ?>r"
                                        class="filter__collection js-subfilter-collection"
                                    >
                                        <div class="subfilter-title">
                                            <?php echo $subTitle[2]; ?>
                                        </div>
                                        <?php for ($n=0; $n <= count(${'n2'.$m})-1; $n++) { ?>
                                            <i
                                                id="n2<?php echo $m; ?><?php echo $n; ?>"
                                                class="filter-item js-filter-item"
                                                onclick="u2('n2','<?php echo $n; ?>','2','n2<?php echo $m; ?>r',<?php echo $m; ?>)"
                                            >
                                                <?php echo ${'n2'.$m}[$n]; ?>
                                            </i>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <div
                                    id="n10r"
                                    class="filter__collection js-subfilter-collection"
                                >
                                    <div class="subfilter-title">
                                        <?php echo $subTitle[1]; ?>
                                    </div>
                                    <?php for ($b=0; $b <= count($n11)-1; $b++) { ?>
                                        <i
                                            id="n11<?php echo $b; ?>"
                                            class="filter-item js-filter-item"
                                            onclick="u2('n1','<?php echo $b; ?>','1','','1')"
                                        >
                                            <?php echo $n11[$b]; ?>
                                        </i>
                                    <?php } ?>
                                    <span class="filter-item--service">
                                        <a href="javascript:void(0);" class="service-link service-link--more js-link">
                                            Показать все
                                        </a>
                                    </span>
                                </div>

                                <div id="datepicker">
                                    <span class="date filter-category">Выберите дату</span>
                                </div>

                                <div
                                    id="n40r"
                                    class="filter__collection js-subfilter-collection"
                                >
                                    <div class="subfilter-title">
                                        <?php echo $subTitle[4]; ?>
                                    </div>
                                    <?php for ($b=0; $b <= count($n41)-1; $b++) { ?>
                                        <i
                                            id="n41<?php echo $b; ?>"
                                            class="filter-item js-filter-item"
                                            onclick="u2('n4','<?php echo $b; ?>','4','','1')"
                                        >
                                            <?php echo $n41[$b]; ?>
                                        </i>
                                    <?php } ?>
                                </div>

                                <div class="js-close js-link"></div>
                                <div class="is-out-of-view"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </section>

        <section class="content">
            <div class="js-hide-trigger"></div>
            <div class="content-wrapper">

                <div class="content__title">Всё необходимое для ваших планов</div>
                <div class="grid grid--promo desktop-only">
                    <div class="grid__row">
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--transport">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 308 235">
                                    <defs>
                                        <style>.cls-1{fill:#00A9E1;}.cls-2{clip-path:url(#clip-path);}</style>
                                        <clipPath id="clip-path">
                                            <path class="cls-1" d="M0,235H234.9V144.7c1-12,12.4-18.6,22.2-9.1a28.7,28.7,0,1,0,4.17-40.37,28.34,28.34,0,0,0-4.17,4.17c-9.8,9.5-21.2,2.9-22.2-9.1V0H0"/>
                                        </clipPath>
                                    </defs>
                                    <title>Transport puzzle</title>
                                    <g id="Layer_2" data-name="Layer 2">
                                        <g id="Layer_1-2" data-name="Layer 1">
                                            <g class="cls-2"><image width="308" height="235" xlink:href="./img/puzzle/svg puzzles/transport--puzzle.jpg"/></g>
                                        </g>
                                    </g>
                                    <path class="puzzle-overflow" d="M0,235H234.9V144.7c1-12,12.4-18.6,22.2-9.1a28.7,28.7,0,1,0,4.17-40.37,28.34,28.34,0,0,0-4.17,4.17c-9.8,9.5-21.2,2.9-22.2-9.1V0H0"/>
                                </svg>
                                <div class="promo__action">
                                    <div class="promo-title">Транспорт</div>
                                    <a href="javascript:void(0);" class="btn btn--promo">Смотреть</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--apartments">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 308 235">
                                    <defs>
                                        <style>.cls-1{fill:#CC0033;}.cls-2{clip-path:url(#clip-path);}</style>
                                        <clipPath id="clip-path">
                                            <path class="cls-1" d="M0,235H234.9V144.7c1-12,12.4-18.6,22.2-9.1a28.7,28.7,0,1,0,4.17-40.37,28.34,28.34,0,0,0-4.17,4.17c-9.8,9.5-21.2,2.9-22.2-9.1V0H0"/>
                                        </clipPath>
                                    </defs>
                                    <title>Transport puzzle</title>
                                    <g id="Layer_2" data-name="Layer 2">
                                        <g id="Layer_1-2" data-name="Layer 1">
                                            <g class="cls-2"><image width="308" height="235" xlink:href="./img/puzzle/svg puzzles/apartments--puzzle.jpg"/></g>
                                        </g>
                                    </g>
                                    <path class="puzzle-overflow" d="M0,235H234.9V144.7c1-12,12.4-18.6,22.2-9.1a28.7,28.7,0,1,0,4.17-40.37,28.34,28.34,0,0,0-4.17,4.17c-9.8,9.5-21.2,2.9-22.2-9.1V0H0"/>
                                </svg>
                                <div class="promo__action">
                                    <div class="promo-title">Жилье</div>
                                    <a href="javascript:void(0);" class="btn btn--promo">Смотреть</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--places">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 308 235">
                                    <defs>
                                        <style>.cls-1{fill:#CC0033;}.cls-2{clip-path:url(#clip-path);}</style>
                                        <clipPath id="clip-path">
                                            <path class="cls-1" d="M0,235H234.9V144.7c1-12,12.4-18.6,22.2-9.1a28.7,28.7,0,1,0,4.17-40.37,28.34,28.34,0,0,0-4.17,4.17c-9.8,9.5-21.2,2.9-22.2-9.1V0H0"/>
                                        </clipPath>
                                    </defs>
                                    <title>Transport puzzle</title>
                                    <g id="Layer_2" data-name="Layer 2">
                                        <g id="Layer_1-2" data-name="Layer 1">
                                            <g class="cls-2"><image width="308" height="235" xlink:href="./img/puzzle/svg puzzles/places--puzzle.jpg"/></g>
                                        </g>
                                    </g>
                                    <path class="puzzle-overflow" d="M0,235H234.9V144.7c1-12,12.4-18.6,22.2-9.1a28.7,28.7,0,1,0,4.17-40.37,28.34,28.34,0,0,0-4.17,4.17c-9.8,9.5-21.2,2.9-22.2-9.1V0H0"/>
                                </svg>
                                <div class="promo__action">
                                    <div class="promo-title">Интересные <br/>места</div>
                                    <a href="javascript:void(0);" class="btn btn--promo">Смотреть</a>
                                </div>                                              
                            </div>
                        </div>
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--entertainment">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 235 308.07">
                                    <defs>
                                        <style>.\39 c5a9ead-e32f-4690-b258-12ccaf4f23ae{fill:none;}.addac9e9-6140-4885-add3-56738ad0c368{clip-path:url(#4dabf902-c4d4-45aa-b30e-2c734c1ebbc6);}
                                        </style>
                                        <clipPath id="4dabf902-c4d4-45aa-b30e-2c734c1ebbc6" transform="translate(0 0)">
                                            <path class="9c5a9ead-e32f-4690-b258-12ccaf4f23ae" d="M235,0V234.9H144.7c-12,1-18.6,12.4-9.1,22.2a28.7,28.7,0,1,1-36.2,0c9.5-9.8,2.9-21.2-9.1-22.2H0V0"/>
                                        </clipPath>
                                    </defs>
                                    <g id="61fb2d9f-9d38-4635-bc4b-26d0e210169c" data-name="Layer 2">
                                        <g id="29fb40e2-cb77-4d63-ae62-042dd1dfface" data-name="Слой 2">
                                            <g class="addac9e9-6140-4885-add3-56738ad0c368">
                                                <image width="235" height="308" xlink:href="./img/puzzle/svg puzzles/entertainment--puzzle.jpg"/>
                                            </g>
                                        </g>
                                    </g>
                                    <path class="puzzle-overflow" d="M235,0V234.9H144.7c-12,1-18.6,12.4-9.1,22.2a28.7,28.7,0,1,1-40.37,4.17,28.34,28.34,0,0,1,4.17-4.17c9.5-9.8,2.9-21.2-9.1-22.2H0V0" transform="translate(0 0)"/>
                                </svg>
                                <div class="promo__action">
                                    <div class="promo-title">Развлечения, <br/>досуг</div>
                                    <a href="javascript:void(0);" class="btn btn--promo">Смотреть</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--events">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 235 235">
                                    <defs>
                                        <style>.\31 9478705-a1b3-47f8-83c5-dc824e2b7f63{fill:none;}.ad343788-c66b-4610-a960-80ab1d22c5cd{clip-path:url(#a4c6572c-cb76-4d7c-9dfb-90c5f144c204);}</style>
                                        <clipPath id="a4c6572c-cb76-4d7c-9dfb-90c5f144c204" transform="translate(-73 0)">
                                            <path class="19478705-a1b3-47f8-83c5-dc824e2b7f63" d="M308,235H73.1V144.7c-1-12-12.4-18.6-22.2-9.1a28.7,28.7,0,1,1,0-36.2c9.8,9.5,21.2,2.9,22.2-9.1V0H308"/>
                                        </clipPath>
                                    </defs>
                                    <g id="0b8138bc-5763-4db7-89d3-865d3d27952e" data-name="Layer 2">
                                        <g id="f971cf8b-4516-4bd9-b88b-d4c31cdf487c" data-name="Слой 2">
                                            <g class="ad343788-c66b-4610-a960-80ab1d22c5cd">
                                                <image width="235" height="235" transform="translate(0 0)" xlink:href="./img/puzzle/svg puzzles/events--puzzle.jpg"/>
                                            </g>
                                        </g>
                                    </g>
                                    <path class="puzzle-overflow" d="M308.07,235H73.17V144.7c-1-12-12.4-18.6-22.2-9.1A28.7,28.7,0,1,1,46.8,95.23,28.34,28.34,0,0,1,51,99.4c9.8,9.5,21.2,2.9,22.2-9.1V0h234.9" transform="translate(-73 0)"/>
                                </svg>
                                <div class="promo__action">
                                    <div class="promo-title">События,<br/>фестивали</div>
                                    <a href="javascript:void(0);" class="btn btn--promo">Смотреть</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--shopping">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 308 235">
                                    <defs>
                                        <style>.e413d7a9-0547-49fb-9d61-f4b01a0b5ab2{fill:none;}.\38 8acb354-6830-43b4-bd59-9363e00c874c{clip-path:url(#523fa800-9be2-48b1-abe0-86c4c15f49c1);}</style>
                                        <clipPath id="523fa800-9be2-48b1-abe0-86c4c15f49c1" transform="translate(0 0)">
                                            <path class="e413d7a9-0547-49fb-9d61-f4b01a0b5ab2" d="M308,235H73.1V144.7c-1-12-12.4-18.6-22.2-9.1a28.7,28.7,0,1,1,0-36.2c9.8,9.5,21.2,2.9,22.2-9.1V0H308"/>
                                        </clipPath>
                                    </defs>
                                    <g id="1691b463-4710-48f1-a113-00196f02bbc9" data-name="Layer 2">
                                        <g id="b85334c1-ff1e-4c10-ba0d-b33c7150cc9b" data-name="Слой 2">
                                            <g class="88acb354-6830-43b4-bd59-9363e00c874c">
                                                <image width="308" height="235" transform="translate(0 0)" xlink:href="./img/puzzle/svg puzzles/shopping--puzzle.jpg"/>
                                            </g>
                                        </g>
                                    </g>
                                    <path class="puzzle-overflow" d="M308,235H73.1V144.7c-1-12-12.4-18.6-22.2-9.1a28.7,28.7,0,1,1,0-36.2c9.8,9.5,21.2,2.9,22.2-9.1V0H308"/>
                                </svg>
                                <div class="promo__action">
                                    <div class="promo-title">Шопинг</div>
                                    <a href="javascript:void(0);" class="btn btn--promo">Смотреть</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--food">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 308 235">
                                    <defs>
                                        <style>.\34 f70dcbd-347a-4461-9bf7-1f4ec881ffba{fill:none;}.\31 e0d3b6c-216d-48d1-bebe-9549ad037cde{clip-path:url(#6caf699f-c378-446e-8f84-85b64805b8ac);}</style>
                                        <clipPath id="6caf699f-c378-446e-8f84-85b64805b8ac" transform="translate(0 0)">
                                            <path class="4f70dcbd-347a-4461-9bf7-1f4ec881ffba" d="M308,235H73.1V144.7c-1-12-12.4-18.6-22.2-9.1a28.7,28.7,0,1,1,0-36.2c9.8,9.5,21.2,2.9,22.2-9.1V0H308"/>
                                        </clipPath>
                                    </defs>
                                    <g id="8eca893a-abc1-4d88-8c3c-90f91c6aa7e8" data-name="Layer 2">
                                        <g id="9c792d30-7093-4c21-abf3-72ed8411cf9d" data-name="Слой 2">
                                            <g class="1e0d3b6c-216d-48d1-bebe-9549ad037cde">
                                                <image width="308" height="235" transform="translate(0 0)" xlink:href="./img/puzzle/svg puzzles/food--puzzle.jpg"/>
                                            </g>
                                        </g>
                                    </g>
                                    <path class="puzzle-overflow" d="M308,235H73.1V144.7c-1-12-12.4-18.6-22.2-9.1a28.7,28.7,0,1,1,0-36.2c9.8,9.5,21.2,2.9,22.2-9.1V0H308"/>
                                </svg>
                                <div class="promo__action">
                                    <div class="promo-title">Еда</div>
                                    <a href="javascript:void(0);" class="btn btn--promo">Смотреть</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column fr-4 fr-ml-2">
                            <div class="promo-block promo-block--institutions">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 308 235">
                                    <defs>
                                        <style>.bfb962c5-a142-4ec6-934a-36fafc865e23{fill:none;}.\36 182ce53-caad-417f-bb2f-35a2c0dc7e47{clip-path:url(#c0d6a077-a738-4971-97f4-e5d5535983bc);}
                                        </style>
                                        <clipPath id="c0d6a077-a738-4971-97f4-e5d5535983bc" transform="translate(0 0)">
                                            <path class="bfb962c5-a142-4ec6-934a-36fafc865e23" d="M308,235H73.1V144.7c-1-12-12.4-18.6-22.2-9.1a28.7,28.7,0,1,1,0-36.2c9.8,9.5,21.2,2.9,22.2-9.1V0H308"/>
                                        </clipPath>
                                    </defs>
                                    <g id="9be7ccdf-1442-4030-a7f7-048e3ff7252e" data-name="Layer 2">
                                        <g id="357945e0-50ab-4231-9548-5ac8f251c44b" data-name="Слой 2">
                                            <g class="6182ce53-caad-417f-bb2f-35a2c0dc7e47">
                                                <image width="308" height="235" transform="translate(0 0)" xlink:href="./img/puzzle/svg puzzles/institutions--puzzle.jpg"/>
                                            </g>
                                        </g>
                                    </g>
                                    <path class="puzzle-overflow" d="M308,235H73.1V144.7c-1-12-12.4-18.6-22.2-9.1a28.7,28.7,0,1,1,0-36.2c9.8,9.5,21.2,2.9,22.2-9.1V0H308"/>
                                </svg>
                                <div class="promo__action">
                                    <div class="promo-title">Учреждения,</br>прочее</div>
                                    <a href="javascript:void(0);" class="btn btn--promo">Смотреть</a>
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
                            <a href="javascript:void(0);">
                                <?php echo file_get_contents("img/social/icon-twitter.svg"); ?>
                            </a>
                        </div>
                        <div class="social-icon icon--facebook">
                            <a href="javascript:void(0);">
                                <?php echo file_get_contents("img/social/icon-facebook.svg"); ?>
                            </a>                            
                        </div>
                        <div class="social-icon icon--vk">
                            <a href="javascript:void(0);">
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
    <script defer src="js/filters.js"></script>
    <script defer src="js/dropdown.js"></script>
</body>
</html>