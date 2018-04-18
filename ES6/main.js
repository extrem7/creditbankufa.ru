const header = {
        controller() {
            $('.scroll-up').click(function (e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: 0
                }, {
                    duration: 2500
                });
            });
            $('.header .dropdown-toggle').click((e) => {
                e.preventDefault();
                $(e.currentTarget).toggleClass('active');
                $('.header .compare').slideToggle();
            });
        }
    },
    bankItem = {
        controller() {
            $('.bank-item .show-more').click(function (e) {
                e.preventDefault();
                if (!$(this).hasClass('active')) {
                    $(this).text('Свернуть')
                } else {
                    $(this).text('Подробнее')
                }
                $(this).toggleClass('active');
                $(this).parent().find('.more').slideToggle();
            });
        }
    };

function compare() {
    $('#time').change(function () {
        $('table th:nth-child(2),table td:nth-child(2)').toggle();
    });
    $('#percent').change(function () {
        $('table th:nth-child(3),table td:nth-child(3)').toggle();
    });
    $('#sum').change(function () {
        $('table th:nth-child(4),table td:nth-child(4)').toggle();
    });
}

function stars() {
    $('.write-comment .star').click(function () {
        $('.write-comment .star').removeClass('active').each((index, item) => {
            if (item == this) {
                $(item).addClass('active');
                return false;
            }
            $(item).addClass('active');
        });
    });
}

function addCompare() {
    $('.control-block a').click(function (e) {
        e.preventDefault();
        $(this).parent().submit();
    });
}

function GET() {
    var query = location.search.substr(1);
    var result = {};
    query.split("&").forEach(function (part) {
        var item = part.split("=");
        result[item[0]] = decodeURIComponent(item[1]);
    });
    return result;
}

$(function () {
    header.controller();
    stars();
    addCompare();
    bankItem.controller();
    if ($('body').hasClass('page-template-page-compare')) {
        compare();
    }
    else if ($('body').hasClass('page-template-page-order')) {
      //  $("input[type=tel]").mask("+7 (999) 999-99-99");
    }
    else if ($('body').hasClass('single-bank')) {
        setTimeout(function () {
            $('.tab-pane.active').removeClass('active');
            $('.active-real').addClass('active');
            if (GET().cat !== undefined) {
                let top = $('.tabs-list').offset().top - 50;
                $('body,html').animate({scrollTop: top}, Math.abs(top - $(document).scrollTop()) / 2);
            }
        }, 2000);
        $('.reviews-count').click(function (e) {
            e.preventDefault();
            let top = $('.commentlist').offset().top - 50;
            $('body,html').animate({scrollTop: top}, Math.abs(top - $(document).scrollTop()) / 2);
        });
    }
    jQuery(".slide").swipe({

        swipe: function swipe(event, direction, distance, duration, fingerCount, fingerData) {

            if (direction == 'left') jQuery(this).carousel('next');
            if (direction == 'right') jQuery(this).carousel('prev');
        },
        allowPageScroll: "vertical"

    });
    $('.search-form button').click(function (e) {
        if ($('.search-form input').val().length < 4) {
            e.preventDefault();
        }
    });
    if (GET().c !== undefined || GET().remove_id !== undefined) {
        window.history.replaceState(null, null, window.location.pathname);
    }
    if(GET().comment !== undefined){
        let top = $('.commentlist').offset().top - 50;
        $('body,html').animate({scrollTop: top}, Math.abs(top - $(document).scrollTop()) / 2);
    }
    if ($(window).width() < 576) {
        $('#reviews .carousel-item').each(function () {
            $(this).clone().removeClass('active').insertAfter($(this));
            $(this).clone().removeClass('active').insertAfter($(this));
            $(this).find('.col-xl-4:nth-child(2)').hide();
            $(this).find('.col-xl-4:nth-child(3)').hide();

            $(this).next().find('.col-xl-4:nth-child(1)').hide();
            $(this).next().find('.col-xl-4:nth-child(3)').hide();
            $(this).next().next().find('.col-xl-4:nth-child(1)').hide();
            $(this).next().next().find('.col-xl-4:nth-child(2)').hide();
        });
    }
});