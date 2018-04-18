<?php
/* Template Name: Сравнение */
get_header(); ?>
    <style>
        <? if(!get_field('срок_кредита')): ?>
        .compare-wrapper table th:nth-child(2), .compare-wrapper table td:nth-child(2) {
            display: none;
        }

        <?endif;?>
        <? if(!get_field('процент')): ?>
        .compare-wrapper table th:nth-child(3), .compare-wrapper table td:nth-child(3) {
            display: none;
        }

        <?endif;?>
        <? if(!get_field('сумма_руб')): ?>
        .compare-wrapper table th:nth-child(4), .compare-wrapper table td:nth-child(4) {
            display: none;
        }

        <?endif;?>
    </style>
    <section class="main">
        <div class="container">
            <div class="row justify-content-center justify-content-xl-between">
                <div class="col-xl-7">
                    <h2 class="section-title"><? the_title() ?></h2>
                    <div class="compare-wrapper">
                        <div class="head d-flex flex-wrap justify-content-around align-items-center justify-content-md-between">
                            <p class="time"><span class="icon-years"></span>Срок кредита
                                <input type="checkbox" class="checkbox" id="time" <? the_checkbox( 'срок_кредита', 'checked' ) ?>>
                                <label for="time"></label></p>
                            <p class="percent"><span class="icon-percent"></span>Процент
                                <input type="checkbox" class="checkbox" id="percent" <? the_checkbox( 'процент', 'checked' ) ?>>
                                <label for="percent"></label></p>
                            <p class="money">Сумма руб.
                                <input type="checkbox" class="checkbox" id="sum" <? the_checkbox( 'сумма_руб', 'checked' ) ?>>
                                <label
                                        for="sum"></label>
                            </p>
                            <p class="count"><span class="circle"><?= count( $_SESSION['compare'] ) ?></span>Банков в
                                сравнении</p>
                        </div>
                        <div class="table-scroll">
                            <table>
                                <thead>
                                <tr>
                                    <th>Банк</th>
                                    <th>Срок</th>
                                    <th>Процент</th>
                                    <th>Сумма</th>
                                    <th>Основные параметры</th>
                                </tr>
                                </thead>
								<?
								$banks = $_SESSION['compare'];
								if ( ! empty( $banks ) ):
									foreach ( $banks as $bank ):
										$post = get_post( $bank );
										?>
                                        <tr>
                                            <td>
                                                <a href="<? the_permalink() ?>"><? the_post_thumbnail() ?></a>
                                                <a href="<?= get_field( 'стандартная_форма' ) ? get_permalink( 123 ) : get_field( 'внешняя_ссылка' ) ?>"
                                                   class="button">Оформить заявку</a>
                                                <a href="<?= get_permalink( 150 ) ?>?remove_id=<? the_ID() ?>"
                                                   class="reviews-count">Удалить из
                                                    списка</a>
                                            </td>
                                            <td><? the_field( 'срок' ) ?></td>
                                            <td><? the_field( 'ставка' ) ?></td>
                                            <td class="sum"><? the_field( 'максимальная_сумма' ) ?></td>
                                            <td class="about"><? the_excerpt() ?></td>
                                        </tr>
									<? endforeach;
								else:
									$post = get_field('банк_по_умолчанию');
									?>
                                    <tr>
                                        <td>
                                            <a href="<? the_permalink() ?>"><? the_post_thumbnail() ?></a>
                                            <a href="<?= get_field( 'стандартная_форма' ) ? get_permalink( 123 ) : get_field( 'внешняя_ссылка' ) ?>"
                                               class="button">Оформить заявку</a>
                                        </td>
                                        <td><? the_field( 'срок' ) ?></td>
                                        <td><? the_field( 'ставка' ) ?></td>
                                        <td class="sum"><? the_field( 'максимальная_сумма' ) ?></td>
                                        <td class="about"><? the_excerpt() ?></td>
                                    </tr>
								<? endif; ?>
                            </table>
                        </div>
                    </div>
	                <? getAdsense() ?>
                </div>
				<? getCredits() ?>
            </div>
        </div>
    </section>
<?
getBanks();
get_footer() ?>