<?php
/* Template Name: Заявка */
get_header(); ?>
    <section class="main">
        <div class="container">
            <div class="row justify-content-center justify-content-xl-between">
                <div class="col-xl-7 col-lg-9">
                    <h2 class="section-title "><? the_title() ?></h2>
                    <div class="order">
                        <div class="head d-flex flex-wrap justify-content-around">
                            <div class="block">
                                <div class="icon"><img src="<?= path() ?>img/order-1.png" alt=""></div>
                                <p>Рассмотрение заявки<br>за 15 мин</p>
                            </div>
                            <div class="block">
                                <div class="icon"><img src="<?= path() ?>img/order-2.png" alt=""></div>
                                <p>69 572<br>одобренных заявки</p>
                            </div>
                            <div class="block">
                                <div class="icon"><img src="<?= path() ?>img/order-3.png" alt=""></div>
                                <p>Только<br>проверенные банки</p>
                            </div>
                        </div>
                        <hr class="hr-more">
                        <? the_field('форма') ?>
                    </div>
	                <? getAdsense() ?>
                </div>
                <div class="right-block col-xl-5 col-lg-7 col-md-8">
                    <a href="<? the_field( 'история-ссылка' ) ?>" target="_blank" class="banner-story">
                        <img src="<?= path() ?>img/credit-story.png" alt="" class="women">
                        <div class="text"><? the_field( 'история' ) ?></div>
                        <div class="button">Улучшить историю</div>
                    </a>
	                <? getAdsense() ?>
                </div>
            </div>
        </div>
    </section>
<?
getReviews();
getBanks();
get_footer() ?>