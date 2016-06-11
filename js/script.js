var params = new function () {
    this.windowWidth = $(window).width();
    this.windowHeight = $(window).height();
    this.headerMinHeight = 520;
};

var block = new function () {
    this.header = $('header');
    this.certificates = $('#certificates');
    this.comments = $('#comments');
};

var timer = new function () {
    this.hour = $('.timer .hour');
    this.minute = $('.timer .minute');
    this.second = $('.timer .second');

    this.getHour = function () {
        return parseInt(this.hour.html());
    };
    this.setHour = function (val) {
        this.hour.html(val);
    };
    this.getMinute = function () {
        return parseInt(this.minute.html());
    };
    this.setMinute = function (val) {
        this.minute.html(val);
    };
    this.getSecond = function () {
        return parseInt(this.second.html());
    };
    this.setSecond = function (val) {
        this.second.html(val);
    };

    this.start = function () {
        var th = this;
        setInterval(function () {
            if (th.getSecond() > 0) {
                th.setSecond(th.getSecond() - 1);
            }
            else {
                th.setSecond(59);
                if (th.getMinute() > 0) {
                    th.setMinute(th.getMinute() - 1);
                }
                else {
                    th.setMinute(59);
                    if (th.getHour() > 0) {
                        th.setHour(th.getHour() - 1);
                    }
                    else {
                        alert('Время истекло!');
                    }
                }
            }
        }, 1000);
    }
};

$(function () {
    // setting header size
    if (params.windowWidth > 767) {
        block.header.height(params.windowHeight);
    }

    else {
        block.header.height(params.headerMinHeight);
    }

    // Certificates carousel
    var certificatesCarousel = $('#certificates-carousel').owlCarousel({
        loop: true,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            400: {
                items: 2,
                margin: 10
            },
            550: {
                items: 2,
                margin: 50
            },
            650: {
                items: 2,
                margin: 90
            },
            768: {
                items: 3,
                margin: 30
            },
            992: {
                items: 3,
                margin: 80
            },
            1200: {
                items: 3,
                margin: 92
            }
        }
    });

    block.certificates.find('.icon-arrow-left').bind('click', function () {
        certificatesCarousel.trigger('prev.owl.carousel');
    });
    block.certificates.find('.icon-arrow-right').bind('click', function () {
        certificatesCarousel.trigger('next.owl.carousel');
    });

    // Comments carousel
    var commentsCarousel = $('#comments-carousel').owlCarousel({
        loop: true,
        dots: true,
        items: 1
    });

    block.comments.find('.icon-arrow-left').bind('click', function () {
        commentsCarousel.trigger('prev.owl.carousel');
    });
    block.comments.find('.icon-arrow-right').bind('click', function () {
        commentsCarousel.trigger('next.owl.carousel');
    });

    // Timer launching
    if ($('.timer').length > 0) {
        timer.start();
    }

    // Swipebox
    $( '.swipebox' ).swipebox();

    // Resize call after modal
    $('#call').on('hidden.bs.modal', function () {
        setTimeout(function () {
            $(window).resize();
        }, 400);
    })
});

$(window).resize(function () {
    // dynamic varaibles changing
    params.windowWidth = $(window).width();
    params.windowHeight = $(window).height();

    // setting header size
    if (params.windowWidth > 767) {
        block.header.height(params.windowHeight);
    }
    else {
        block.header.height(params.headerMinHeight);
    }
});