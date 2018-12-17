
$(document).ready(function () {    

    // An menu
    $("#nav_vertical .ul_menu").hide();

    $("#nav_vertical .title_nav_verticle,#nav_vertical .ul_menu").hover(
  function () {
      $("#nav_vertical .ul_menu").show();
  }, function () {
      $("#nav_vertical .ul_menu").hide();
  }
);
    //$("#support_top").hover(function () {        
    //        $("#h_menu_sub_on1").load("./banhangtructuyen.html", function (response, status) {
    //            $("#h_menu_sub_on1").html(response);
    //            $("#h_menu_sub_on1").show();
    //        });
    //}, function () {
    //    $("#h_menu_sub_on1").hide();
    //});

    $("#nav_vertical li").hover(function () {
        $(this).children(".sub_nav").show();
    }, function () {
        $(this).children(".sub_nav").hide();
    });

    $(window).scroll(function () {
        t = $(window).scrollTop();
        if (t > 490) {
            $("#wrap-head,#nav-main").addClass("fixed");
            $(".support-online-header").show();
        }
        else {
            $("#wrap-head,#nav-main").removeClass("fixed");
            $(".support-online-header").hide();
        }
    });

    $("input.p_check").click(function () {
        if ($("input.p_check").is(":checked")) {
            $("#compare_area_home").fadeIn();
        } else {
            $("#compare_area_home").fadeOut();
        }
    });

    $(".title_tab a").click(function () {
        $(".title_tab a").removeClass("current");
        $(this).addClass("current");

        $(".cf").hide();
        $($(this).attr("href")).show();
        return false;
    });
});

//slider home
$(document).ready(function () {
    if ($("#sync2").length > 0) {
        var sync1 = $("#sync1");
        var sync2 = $("#sync2");

        sync1.owlCarousel({
            singleItem: true,
            autoPlay: 4000,
            slideSpeed: 1000,
            stopOnHover: true,
            lazyLoad: true,
            navigation: true,
            pagination: false,
            afterAction: syncPosition,
            responsiveRefreshRate: 200,
        });

        sync2.owlCarousel({
            items: 4,
            pagination: false,
            responsiveRefreshRate: 100,
            afterInit: function (el) {
                el.find(".owl-item").eq(0).addClass("synced");
            }
        });

        function syncPosition(el) {
            var current = this.currentItem;
            $("#sync2")
            .find(".owl-item")
            .removeClass("synced")
            .eq(current)
            .addClass("synced")
            if ($("#sync2").data("owlCarousel") !== undefined) {
                center(current)
            }
        }

        $("#sync2").on("click", ".owl-item", function (e) {
            e.preventDefault();
            var number = $(this).data("owlItem");
            sync1.trigger("owl.goTo", number);
        });

        function center(number) {
            var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
            var num = number;
            var found = false;
            for (var i in sync2visible) {
                if (num === sync2visible[i]) {
                    var found = true;
                }
            }

            if (found === false) {
                if (num > sync2visible[sync2visible.length - 1]) {
                    sync2.trigger("owl.goTo", num - sync2visible.length + 2)
                } else {
                    if (num - 1 === -1) {
                        num = 0;
                    }
                    sync2.trigger("owl.goTo", num);
                }
            } else if (num === sync2visible[sync2visible.length - 1]) {
                sync2.trigger("owl.goTo", sync2visible[1])
            } else if (num === sync2visible[0]) {
                sync2.trigger("owl.goTo", num - 1)
            }

        }
    }

    //slide footer
    $('#customers-list').owlCarousel({
       items:5,
        margin: 20,
        loop: true,
        nav: true,
        autoPlay: 2000,
        slideSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })

});

