/* Validation form */
validateForm("validation-newsletter");
validateForm("validation-cart");
validateForm("validation-user");
validateForm("validation-contact");

/* Lazys */
NN_FRAMEWORK.Lazys = function () {
    if (isExist($(".lazy"))) {
        var lazyLoadInstance = new LazyLoad({
            elements_selector: ".lazy",
        });
    }
};

/* Load name input file */
NN_FRAMEWORK.loadNameInputFile = function () {
    if (isExist($(".custom-file input[type=file]"))) {
        $("body").on("change", ".custom-file input[type=file]", function () {
            var fileName = $(this).val();
            fileName = fileName.substr(
                fileName.lastIndexOf("\\") + 1,
                fileName.length
            );
            $(this).siblings("label").html(fileName);
        });
    }
};

/* Back to top */
NN_FRAMEWORK.GoTop = function () {
    $(window).scroll(function () {
        if (!$(".scrollToTop").length)
            $("body").append(
                '<div class="scrollToTop"><img src="' +
                    GOTOP +
                    '" alt="Go Top"/></div>'
            );
        if ($(this).scrollTop() > 100) $(".scrollToTop").fadeIn();
        else $(".scrollToTop").fadeOut();
    });

    $("body").on("click", ".scrollToTop", function () {
        $("html, body").animate({ scrollTop: 0 }, 800);
        return false;
    });
};

/* Alt images */
NN_FRAMEWORK.AltImg = function () {
    $("img").each(function (index, element) {
        if (!$(this).attr("alt") || $(this).attr("alt") == "") {
            $(this).attr("alt", WEBSITE_NAME);
        }
    });
};

/* Menu */
NN_FRAMEWORK.Menu = function () {
    /* Menu remove empty ul */
    if (isExist($(".menu"))) {
        $(".menu ul li a").each(function () {
            $this = $(this);

            if (!isExist($this.next("ul").find("li"))) {
                $this.next("ul").remove();
                $this.removeClass("has-child");
            }
        });
    }

    /* Menu fixed */
    $(window).scroll(function () {
        var cach_top = $(window).scrollTop();
        var heaigt_header = $(".header").height() + $(".w-menu").height();

        if (cach_top >= heaigt_header) {
            if (
                !$(".w-menu").hasClass(
                    "fix_head animate__animated animate__fadeIn"
                )
            ) {
                $(".w-menu").addClass(
                    "fix_head animate__animated animate__fadeIn"
                );
            }
        } else {
            $(".w-menu").removeClass(
                "fix_head animate__animated animate__fadeIn"
            );
        }
    });

    /* Mmenu */
    if (isExist($("nav#menu"))) {
        $("nav#menu").mmenu({
            extensions: ["border-full", "position-left", "position-front"],
        });
    }
};

/* Tools */
NN_FRAMEWORK.Tools = function () {
    if (isExist($(".toolbar"))) {
        $(".footer").css({ marginBottom: $(".toolbar").innerHeight() });
    }
};

/* Popup */
NN_FRAMEWORK.Popup = function () {
    if (isExist($("#popup"))) {
        $("#popup").modal("show");
    }
};

/* Wow */
NN_FRAMEWORK.Wows = function () {
    new WOW().init();
};

/* Pagings */
NN_FRAMEWORK.Pagings = function () {
    /* Products */
    if (isExist($(".paging-product"))) {
        loadPaging("api/product_linew.php?perpage=10", ".paging-product");
    }

    if (isExist($(".paging-product-hotsale"))) {
        loadPaging(
            "api/product_hotsale.php?perpage=5",
            ".paging-product-hotsale"
        );
    }

    if (isExist($(".paging-product-hotsalemb"))) {
        loadPaging(
            "api/product_hotsalemb.php?perpage=6",
            ".paging-product-hotsalemb"
        );
    }

    /* Categories */
    if (isExist($(".paging-product-category"))) {
        $(".paging-product-category").each(function () {
            var list = $(this).data("list");
            loadPaging(
                "api/product.php?perpage=8&idList=" + list,
                ".paging-product-category-" + list
            );
        });
    }

    // if (isExist($('.show_padding'))) {
    //     $(".show_padding").each(function() {
    //         var list = $(this).data("list");
    //         var cat = $(this).data("cat");
    //         loadPaging("api/product.php?perpage=" + "10" + "&idList=" + list + "&idCat=" + cat, '.show_padding' + list);
    //     });
    // }

    if (isExist($(".choose_list"))) {
        $(".choose_list span").click(function () {
            $(this).parents(".choose_list").find("span").hasClass("choosed")
                ? $(this)
                      .parents(".choose_list")
                      .find("span")
                      .removeClass("choosed")
                : "";
            $(this).addClass("choosed");
            var list = $(this).attr("data-list");
            var cat = $(this).attr("data-cat");
            $(".show_padding" + list).attr("data-list", list);
            $(".show_padding" + list).attr("data-cat", cat);
            loadPaging(
                "api/product.php?perpage=" +
                    "10" +
                    "&idList=" +
                    list +
                    "&idCat=" +
                    cat,
                ".show_padding" + list
            );
            return false;
        });
    }

    $(".choose_list").each(function () {
        $(this).find(".choosed2").eq(0).trigger("click");
    });
};

/* Ticker scroll
NN_FRAMEWORK.TickerScroll = function () {
	if (isExist($('.news-scroll'))) {
		$('.news-scroll')
			.easyTicker({
				direction: 'up',
				easing: 'swing',
				speed: 'slow',
				interval: 3500,
				height: 'auto',
				visible: 3,
				mousePause: true,
				controls: {
					up: '.news-control#up',
					down: '.news-control#down'
					// toggle: '.toggle',
					// stopText: 'Stop'
				},
				callbacks: {
					before: function (ul, li) {
						// $(li).css('color', 'red');
					},
					after: function (ul, li) {}
				}
			})
			.data('easyTicker');
	}
};
*/

/* Photobox */
NN_FRAMEWORK.Photobox = function () {
    if (isExist($(".album-gallery"))) {
        $(".album-gallery").photobox("a", { thumbs: true, loop: false });
    }
};

/* Comment */
NN_FRAMEWORK.Comment = function () {
    if (isExist($(".comment-page"))) {
        $(".comment-page").comments({
            url: "api/comment.php",
        });
    }
};

/* DatePicker */
NN_FRAMEWORK.DatePicker = function () {
    if (isExist($("#birthday"))) {
        $("#birthday").datetimepicker({
            timepicker: false,
            format: "d/m/Y",
            formatDate: "d/m/Y",
            minDate: "01/01/1950",
            maxDate: TIMENOW,
        });
    }
};

/* Search */
NN_FRAMEWORK.Search = function () {
    if (isExist($(".icon-search"))) {
        $(".icon-search").click(function () {
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
                $(".search-grid")
                    .stop(true, true)
                    .animate({ opacity: "0", width: "0px" }, 200);
            } else {
                $(this).addClass("active");
                $(".search-grid")
                    .stop(true, true)
                    .animate({ opacity: "1", width: "230px" }, 200);
            }
            document
                .getElementById($(this).next().find("input").attr("id"))
                .focus();
            $(".icon-search i").toggleClass("bi bi-x-lg");
        });
    }
};

/* Videos */
NN_FRAMEWORK.Videos = function () {
    /* Fancybox */
    // $('[data-fancybox="something"]').fancybox({
    //     // transitionEffect: "fade",
    //     // transitionEffect: "slide",
    //     // transitionEffect: "circular",
    //     // transitionEffect: "tube",
    //     // transitionEffect: "zoom-in-out",
    //     // transitionEffect: "rotate",
    //     transitionEffect: "fade",
    //     transitionDuration: 800,
    //     animationEffect: "fade",
    //     animationDuration: 800,
    //     slideShow: {
    //         autoStart: true,
    //         speed: 3000
    //     },
    //     arrows: true,
    //     infobar: false,
    //     toolbar: false,
    //     hash: false
    // });
    /*
	if (isExist($('[data-fancybox="video"]'))) {
		$('[data-fancybox="video"]').fancybox({
			transitionEffect: 'fade',
			transitionDuration: 800,
			animationEffect: 'fade',
			animationDuration: 800,
			arrows: true,
			infobar: false,
			toolbar: true,
			hash: false
		});
	}
	*/
};

/* Owl Data */
NN_FRAMEWORK.OwlData = function (obj) {
    if (!isExist(obj)) return false;
    var items = obj.attr("data-items");
    var rewind = Number(obj.attr("data-rewind")) ? true : false;
    var autoplay = Number(obj.attr("data-autoplay")) ? true : false;
    var loop = Number(obj.attr("data-loop")) ? true : false;
    var lazyLoad = Number(obj.attr("data-lazyload")) ? true : false;
    var mouseDrag = Number(obj.attr("data-mousedrag")) ? true : false;
    var touchDrag = Number(obj.attr("data-touchdrag")) ? true : false;
    var animations = obj.attr("data-animations") || false;
    var smartSpeed = Number(obj.attr("data-smartspeed")) || 800;
    var autoplaySpeed = Number(obj.attr("data-autoplayspeed")) || 800;
    var autoplayTimeout = Number(obj.attr("data-autoplaytimeout")) || 5000;
    var dots = Number(obj.attr("data-dots")) ? true : false;
    var responsive = {};
    var responsiveClass = true;
    var responsiveRefreshRate = 200;
    var nav = Number(obj.attr("data-nav")) ? true : false;
    var navContainer = obj.attr("data-navcontainer") || false;
    var navTextTemp =
        "<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-chevron-left' width='44' height='45' viewBox='0 0 24 24' stroke-width='1.5' stroke='#2c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><polyline points='15 6 9 12 15 18' /></svg>|<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-chevron-right' width='44' height='45' viewBox='0 0 24 24' stroke-width='1.5' stroke='#2c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><polyline points='9 6 15 12 9 18' /></svg>";
    var navText = obj.attr("data-navtext");
    navText =
        nav &&
        navContainer &&
        (((navText === undefined || Number(navText)) && navTextTemp) ||
            (isNaN(Number(navText)) && navText) ||
            (Number(navText) === 0 && false));

    if (items) {
        items = items.split(",");

        if (items.length) {
            var itemsCount = items.length;

            for (var i = 0; i < itemsCount; i++) {
                var options = items[i].split("|"),
                    optionsCount = options.length,
                    responsiveKey;

                for (var j = 0; j < optionsCount; j++) {
                    const attr = options[j].indexOf(":")
                        ? options[j].split(":")
                        : options[j];

                    if (attr[0] === "screen") {
                        responsiveKey = Number(attr[1]);
                    } else if (Number(responsiveKey) >= 0) {
                        responsive[responsiveKey] = {
                            ...responsive[responsiveKey],
                            [attr[0]]:
                                (isNumeric(attr[1]) && Number(attr[1])) ??
                                attr[1],
                        };
                    }
                }
            }
        }
    }

    if (nav && navText) {
        navText =
            navText.indexOf("|") > 0 ? navText.split("|") : navText.split(":");
        navText = [navText[0], navText[1]];
    }

    obj.owlCarousel({
        rewind,
        autoplay,
        loop,
        lazyLoad,
        mouseDrag,
        touchDrag,
        smartSpeed,
        autoplaySpeed,
        autoplayTimeout,
        dots,
        nav,
        navText,
        navContainer: nav && navText && navContainer,
        responsiveClass,
        responsiveRefreshRate,
        responsive,
    });

    if (autoplay) {
        obj.on("translate.owl.carousel", function (event) {
            obj.trigger("stop.owl.autoplay");
        });

        obj.on("translated.owl.carousel", function (event) {
            obj.trigger("play.owl.autoplay", [autoplayTimeout]);
        });
    }

    if (animations && isExist(obj.find("[owl-item-animation]"))) {
        var animation_now = "";
        var animation_count = 0;
        var animations_excuted = [];
        var animations_list = animations.indexOf(",")
            ? animations.split(",")
            : animations;

        obj.on("changed.owl.carousel", function (event) {
            $(this)
                .find(".owl-item.active")
                .find("[owl-item-animation]")
                .removeClass(animation_now);
        });

        obj.on("translate.owl.carousel", function (event) {
            var item = event.item.index;

            if (Array.isArray(animations_list)) {
                var animation_trim = animations_list[animation_count].trim();

                if (!animations_excuted.includes(animation_trim)) {
                    animation_now = "animate__animated " + animation_trim;
                    animations_excuted.push(animation_trim);
                    animation_count++;
                }

                if (animations_excuted.length == animations_list.length) {
                    animation_count = 0;
                    animations_excuted = [];
                }
            } else {
                animation_now = "animate__animated " + animations_list.trim();
            }
            $(this)
                .find(".owl-item")
                .eq(item)
                .find("[owl-item-animation]")
                .addClass(animation_now);
        });
    }
};

/* Owl Page */
NN_FRAMEWORK.OwlPage = function () {
    if (isExist($(".owl-page"))) {
        $(".owl-page").each(function () {
            NN_FRAMEWORK.OwlData($(this));
        });
    }
};

/* Dom Change */
NN_FRAMEWORK.DomChange = function () {
    /* Video Fotorama */
    $("#video-fotorama").one("DOMSubtreeModified", function () {
        $("#fotorama-videos").fotorama();
    });

    /* Video Select */
    $("#video-select").one("DOMSubtreeModified", function () {
        $(".listvideos").change(function () {
            var id = $(this).val();
            $.ajax({
                url: "api/video.php",
                type: "POST",
                dataType: "html",
                data: {
                    id: id,
                },
                beforeSend: function () {
                    holdonOpen();
                },
                success: function (result) {
                    $(".video-main").html(result);
                    holdonClose();
                },
            });
        });
    });

    /* Chat Facebook */
    $("#messages-facebook").one("DOMSubtreeModified", function () {
        $(".js-facebook-messenger-box").on("click", function () {
            $(
                ".js-facebook-messenger-box, .js-facebook-messenger-container"
            ).toggleClass("open"),
                $(".js-facebook-messenger-tooltip").length &&
                    $(".js-facebook-messenger-tooltip").toggle();
        }),
            $(".js-facebook-messenger-box").hasClass("cfm") &&
                setTimeout(function () {
                    $(".js-facebook-messenger-box").addClass(
                        "rubberBand animated"
                    );
                }, 3500),
            $(".js-facebook-messenger-tooltip").length &&
                ($(".js-facebook-messenger-tooltip").hasClass("fixed")
                    ? $(".js-facebook-messenger-tooltip").show()
                    : $(".js-facebook-messenger-box").on("hover", function () {
                          $(".js-facebook-messenger-tooltip").show();
                      }),
                $(".js-facebook-messenger-close-tooltip").on(
                    "click",
                    function () {
                        $(".js-facebook-messenger-tooltip").addClass("closed");
                    }
                ));
        $(".search_open").click(function () {
            $(".search_box_hide").toggleClass("opening");
        });
    });
};

/* Quick View */
NN_FRAMEWORK.QuickView = function (obj) {
    /*
      $('#popup-quickview').on('hidden.bs.modal', function(e){
          PRICE_ATTRS = PRICE_ATTRS_DETAIL;
          $('#popup-quickview').find('.modal-body').html("");
      });
      */

    $("body").on("click", ".product-quick-view", function () {
        var slug = $(this).attr("data-slug");

        if (slug) {
            $.ajax({
                type: "POST",
                url: slug + "?quickview=1",
                dataType: "html",
                beforeSend: function () {
                    holdonOpen();
                },
                success: function (result) {
                    holdonClose();
                    $("#popup-quickview").find(".modal-body").html(result);
                    $("#popup-quickview").modal("show");
                    // MagicZoom.refresh("Zoom-quickview");
                    // NN_FRAMEWORK.OwlData($('.owl-pro-detail'));

                    MagicZoom.refresh("Zoom-1");
                    NN_FRAMEWORK.OwlData($(".owl-pro-detail"));
                    NN_FRAMEWORK.Lazys();
                },
            });
        }
    });
};

/* Cart */
NN_FRAMEWORK.Cart = function () {
    /* Add */
    $("body").on("click", ".addcart", function () {
        $this = $(this);
        $parents = $this.parents(".mid-pro-detail");
        var id = $this.data("id");
        var action = $this.data("action");
        var type_opt = $this.data("type_opt");
        var quantity = $parents
            .find(".quantity-pro-detail")
            .find(".qty-pro")
            .val();
        quantity = quantity ? quantity : 1;

        if (type_opt == "product_detail") {
            var color = $parents
                .find(".color-block-pro-detail")
                .find(".color-pro-detail input:checked")
                .val();

            var size = $parents
                .find(".size-block-pro-detail")
                .find(".size-pro-detail input:checked")
                .val();
        } else if (type_opt == "product") {
            var color = $this
                .parents(".box-product")
                .find(".items-color-pro input:checked")
                .val();
            var size = $this
                .parents(".box-product")
                .find(".items-size-pro input:checked")
                .val();
        }
        color = color ? color : 0;
        size = size ? size : 0;

        if (size == 0) {
            alert("Sản phẩm chưa có màu");
        } else {
            if (id) {
                $.ajax({
                    url: "api/cart.php",
                    type: "POST",
                    dataType: "json",
                    async: false,
                    data: {
                        cmd: "add-cart",
                        id: id,
                        color: color,
                        size: size,
                        quantity: quantity,
                    },
                    beforeSend: function () {
                        holdonOpen();
                    },
                    success: function (result) {
                        if (action == "addnow") {
                            $(".count-cart").html(result.max);
                            $.ajax({
                                url: "api/cart.php",
                                type: "POST",
                                dataType: "html",
                                async: false,
                                data: {
                                    cmd: "popup-cart",
                                },
                                success: function (result) {
                                    $("#popup-cart .modal-body").html(result);
                                    $("#popup-cart").modal("show");
                                    NN_FRAMEWORK.Lazys();
                                    holdonClose();
                                },
                            });
                        } else if (action == "buynow") {
                            window.location = CONFIG_BASE + "gio-hang";
                        }
                    },
                });
            }
        }
        //alert('sl='+quantity+'color='+color+'size='+size+'active='+action);
    });

    /* Delete */
    $("body").on("click", ".del-procart", function () {
        confirmDialog(
            "delete-procart",
            LANG["delete_product_from_cart"],
            $(this)
        );
    });

    /* Counter */
    $("body").on("click", ".counter-procart", function () {
        var $button = $(this);
        var quantity = 1;
        var input = $button.parent().find("input");
        var id = input.data("pid");
        var code = input.data("code");
        var oldValue = $button.parent().find("input").val();
        if ($button.text() == "+") quantity = parseFloat(oldValue) + 1;
        else if (oldValue > 1) quantity = parseFloat(oldValue) - 1;
        $button.parent().find("input").val(quantity);
        updateCart(id, code, quantity);
    });

    /* Quantity */
    $("body").on("change", "input.quantity-procart", function () {
        var quantity = $(this).val() < 1 ? 1 : $(this).val();
        $(this).val(quantity);
        var id = $(this).data("pid");
        var code = $(this).data("code");
        updateCart(id, code, quantity);
    });

    /* City */
    if (isExist($(".select-city-cart"))) {
        $(".select-city-cart").change(function () {
            var id = $(this).val();
            loadDistrict(id);
            loadShip();
        });
    }

    /* District */
    if (isExist($(".select-district-cart"))) {
        $(".select-district-cart").change(function () {
            var id = $(this).val();
            loadWard(id);
            loadShip();
        });
    }

    /* Ward */
    if (isExist($(".select-ward-cart"))) {
        $(".select-ward-cart").change(function () {
            var id = $(this).val();
            loadShip(id);
        });
    }

    /* Payments */
    if (isExist($(".payments-label"))) {
        $(".payments-label").click(function () {
            var payments = $(this).data("payments");
            $(".payments-cart .payments-label, .payments-info").removeClass(
                "active"
            );
            $(this).addClass("active");
            $(".payments-info-" + payments).addClass("active");
        });
    }

    /* Colors */
    if (isExist($(".color-pro-detail"))) {
        $(".color-pro-detail input").click(function () {
            $this = $(this).parents("label.color-pro-detail");
            $parents = $this.parents(".attr-pro-detail");
            $parents_detail = $this.parents(".grid-pro-detail");
            $parents
                .find(".color-block-pro-detail")
                .find(".color-pro-detail")
                .removeClass("active");
            $parents
                .find(".color-block-pro-detail")
                .find(".color-pro-detail input")
                .prop("checked", false);
            $this.addClass("active");
            $this.find("input").prop("checked", true);
            /*
            var id_color = $parents
              .find(".color-block-pro-detail")
              .find(".color-pro-detail input:checked")
              .val();
            var id_pro = $this.data("idproduct");

            $.ajax({
              url: "api/color.php",
              type: "POST",
              dataType: "html",
              data: {
                id_color: id_color,
                id_pro: id_pro,
              },
              beforeSend: function () {
                holdonOpen();
              },
              success: function (result) {
                if (result) {
                  $parents_detail.find(".left-pro-detail").html(result);
                  MagicZoom.refresh("Zoom-1");
                  NN_FRAMEWORK.OwlData($(".owl-pro-detail"));
                  NN_FRAMEWORK.Lazys();
                }
                holdonClose();
              },
            });
            */
        });
    }

    /* Sizes */
    if (isExist($(".size-pro-detail"))) {
        $(".size-pro-detail input").click(function () {
            $this = $(this).parents("label.size-pro-detail");
            $parents = $this.parents(".attr-pro-detail");
            $parents
                .find(".size-block-pro-detail")
                .find(".size-pro-detail")
                .removeClass("active");
            $parents
                .find(".size-block-pro-detail")
                .find(".size-pro-detail input")
                .prop("checked", false);
            $this.addClass("active");
            $this.find("input").prop("checked", true);

            var photo_price = $this.find("input:checked").data("photo_price");
            var regular_price = $this
                .find("input:checked")
                .data("regular_price");
            var sale_price = $this.find("input:checked").data("sale_price");
            var discount = $this.find("input:checked").data("discount");
            // $(".price-photo-pro-detail").text(regular_price);
            $(".price-photo-pro-detail").attr("href", photo_price);
            $(".price-photo-pro-detail img").attr("src", photo_price);
            $(".price-photo-pro-detail .mz-lens img").attr("src", photo_price);
            $(".mz-zoom-window img").attr("src", photo_price);
            // MagicZoom.refresh("Zoom-1");
            if (discount > 0) {
                $(".price-new-pro-detail").text(sale_price);
                $(".price-old-pro-detail").text(regular_price);
            } else {
                $(".price-new-pro-detail").text(regular_price);
                $(".price-old-pro-detail").text("");
            }
        });
    }

    /* Quantity detail page */
    if (isExist($(".quantity-pro-detail span"))) {
        $(".quantity-pro-detail span").click(function () {
            var $button = $(this);
            var oldValue = $button.parent().find("input").val();
            if ($button.text() == "+") {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                if (oldValue > 1) var newVal = parseFloat(oldValue) - 1;
                else var newVal = 1;
            }
            $button.parent().find("input").val(newVal);
        });
    }
};

NN_FRAMEWORK.Sizeproduct = function () {
    if (isExist($(".input-size"))) {
        $(".input-size").click(function () {
            $this = $(this);
            $parents = $this.parents(".box-product");
            $parent = $this.parents(".items-size-pro");

            var regular_price = $parents
                .find(".size-pro")
                .find("input:checked")
                .data("regular_price");
            var sale_price = $parents
                .find(".size-pro")
                .find("input:checked")
                .data("sale_price");
            var discount = $parents
                .find(".size-pro")
                .find("input:checked")
                .data("discount");
            //alert('regular_price='+regular_price+'sale_price='+sale_price+'discount='+discount);

            $.ajax({
                type: "POST",
                url: "api/load_size_product.php",
                data: {
                    regular_price: regular_price,
                    sale_price: sale_price,
                    discount: discount,
                },
                success: function (data) {
                    $parents.find(".price-product").html(data);
                },
            });
        });
    }
};

/* Slick */
NN_FRAMEWORK.SlickPage = function () {
    if (isExist($(".slide-text"))) {
        $(".slide-text").slick({
            dots: true,
            infinite: true,
            autoplaySpeed: 3000,
            slidesToShow: 1,
            slidesToScroll: 1,
            adaptiveHeight: true,
            autoplay: true,
            arrows: true,
            fade: true,
        });
    }

    if (isExist($(".slick-v-3"))) {
        $(".slick-v-3").slick({
            dots: false,
            infinite: true,
            autoplaySpeed: 3000,
            slidesToShow: 3,
            slidesToScroll: 1,
            adaptiveHeight: true,
            vertical: true,
            autoplay: true,
            infinite: true,
            arrows: false,
        });
    }

    if (isExist($(".slick-album"))) {
        $(".slick-album").slick({
            dots: false,
            infinite: true,
            autoplaySpeed: 3000,
            slidesToShow: 2,
            slidesToScroll: 1,
            adaptiveHeight: true,
            vertical: false,
            autoplay: true,
            infinite: true,
            arrows: false,
        });
    }
};

/* Aos */
NN_FRAMEWORK.AosAnimation = function () {
    AOS.init({});
};

/* TOC */
NN_FRAMEWORK.Toc = function () {
    if (isExist($(".toc-list"))) {
        $(".toc-list").toc({
            content: "div#toc-content",
            headings: "h2,h3,h4",
        });

        if (!$(".toc-list li").length) $(".meta-toc").hide();
        if (!$(".toc-list li").length)
            $(".meta-toc .mucluc-dropdown-list_button").hide();

        $(".toc-list")
            .find("a")
            .click(function () {
                var x = $(this).attr("data-rel");
                goToByScroll(x);
            });

        $("body").on("click", ".mucluc-dropdown-list_button", function () {
            $(".box-readmore").slideToggle(200);
        });

        $(document).scroll(function () {
            var y = $(this).scrollTop();
            if (y > 300) {
                $(".meta-toc").fadeIn();
            } else {
                $(".meta-toc").fadeOut();
            }
        });
    }
};

NN_FRAMEWORK.LoaderWrapper = function () {
    if (isExist($("#loader-wrapper"))) {
        setTimeout(function () {
            $("#loader-wrapper").addClass("show1");
        }, 1500);
        setTimeout(function () {
            $("#loader-wrapper").remove();
        }, 3000);
    }
};

NN_FRAMEWORK.Homes = function () {
    if (isExist($(".list-hot"))) {
        FirstLoadAPI(
            ".list-hot a:first",
            "api/load_ajax_product.php",
            ".load_ajax_product"
        );
        LoadAPI(
            ".list-hot a",
            "api/load_ajax_product.php",
            ".load_ajax_product"
        );
    }

    if (isExist($(".cats-bar-icon"))) {
        $("body").on("click", ".cats-bar-icon", function () {
            $this = $(this);
            $this.toggleClass("active not-active");
            var isActive = $this.hasClass("active");
            $(".cats-owl").animate(
                {
                    opacity: +isActive,
                    visibility: isActive ? "visible" : "hidden",
                },
                1000,
                function () {}
            );
        });
    }

    if (isExist($(".tra-cuu__button"))) {
        $(".tra-cuu__button .btn").click(function (e) {
            e.preventDefault();
            const phone = $("#tra-cuu__input-phone").val();
            const code = $("#tra-cuu__input-code").val();

            if (!phone) {
                notifyDialog("Vui lòng nhập số điện thoại");
                return false;
            }
            if (!isPhone(phone)) {
                notifyDialog("Số điện thoại không đúng định dạng");
                return false;
            }
            if (!code) {
                notifyDialog("Vui lòng nhập mã đơn hàng");
                return false;
            }

            $.ajax({
                type: "POST",
                url: "api/tracuubaohanh.php",
                data: {
                    phone,
                    code,
                },
                beforeSend: function () {
                    holdonOpen();
                },
                success: function (result) {
                    if (result) {
                        $(".load-tra-cuu").html(result);
                        $("html,body")
                            .stop()
                            .animate(
                                {
                                    scrollTop:
                                        $(".load-tra-cuu").offset().top - 250,
                                },
                                600
                            );
                    }
                    holdonClose();
                },
            });
        });
    }

    if (isExist($(".content-text"))) {
        $(".content-text table").each(function (i, val) {
            $(this).addClass("table table-bordered");
        });
    }

    if (isExist($(".box-suachua"))) {
        $(".name-suachua").click(function () {
            // Xóa class "active" khỏi tất cả các phần tử có class "name-suachua"
            $(".name-suachua").removeClass("active");
            // Thêm class "active" vào phần tử đã được click
            $(this).addClass("active");
            var id = $(this).data("id");
            $.ajax({
                url: "api/suachua.php",
                type: "POST",
                dataType: "html",
                data: {
                    id: id,
                },
                success: function (result) {
                    $(".load_content_suachua").html(result);
                },
            });
        });
    }

    if ($(".name-suachua").length) {
        $(".name-suachua").eq(0).trigger("click");
    }

    $(window).bind("load resize", function () {
        if ($(".effect-run").length) {
            var api = $(".effect-run").peShiner({
                api: true,
                paused: true,
                reverse: true,
                repeat: 1,
                color: "black",
            });

            api.resume();
        }
    });
};

/* Videos */
NN_FRAMEWORK.Videos = function () {
    Fancybox.bind("[data-fancybox]", {});
};

/* Ready */
$(document).ready(function () {
    NN_FRAMEWORK.Homes();
    NN_FRAMEWORK.Sizeproduct();
    NN_FRAMEWORK.LoaderWrapper();
    NN_FRAMEWORK.SlickPage();
    NN_FRAMEWORK.AosAnimation();
    NN_FRAMEWORK.Lazys();
    NN_FRAMEWORK.Tools();
    NN_FRAMEWORK.Popup();
    NN_FRAMEWORK.Wows();
    NN_FRAMEWORK.AltImg();
    NN_FRAMEWORK.GoTop();
    NN_FRAMEWORK.Menu();
    NN_FRAMEWORK.OwlPage();
    NN_FRAMEWORK.Pagings();
    NN_FRAMEWORK.Cart();
    NN_FRAMEWORK.Videos();
    NN_FRAMEWORK.Photobox();
    NN_FRAMEWORK.Comment();
    NN_FRAMEWORK.Search();
    NN_FRAMEWORK.DomChange();
    /*NN_FRAMEWORK.TickerScroll();*/
    NN_FRAMEWORK.DatePicker();
    NN_FRAMEWORK.loadNameInputFile();
    NN_FRAMEWORK.QuickView();
    NN_FRAMEWORK.Toc();

    $(`.btn-view-full-content`).click(function (event) {
        let _target = $($(this).attr("data-target"));
        let _hide_content = _target.find(`.hide-content`);
        if (!$(this).hasClass("is-show")) {
            _hide_content
                .addClass("removeBlur")
                .find(`a`)
                .text("Thu gọn ")
                .append(`<i class="fa fa-caret-up" aria-hidden="true"></i>`),
                _target.addClass("show-full-content"),
                $(this).addClass("is-show");
        } else {
            _hide_content
                .removeClass("removeBlur")
                .find(`a`)
                .text("Xem thêm ")
                .append(`<i class="fa fa-caret-down" aria-hidden="true"></i>`),
                _target.removeClass("show-full-content"),
                $(this).removeClass("is-show");
        }
    });

    $(`.btn-view-full-thongso`).click(function (event) {
        let _target = $($(this).attr("data-target"));
        let _hide_content = _target.find(`.hide-content`);
        if (!$(this).hasClass("is-show")) {
            _hide_content
                .addClass("removeBlur")
                .find(`a`)
                .text("Thu gọn ")
                .append(`<i class="fa fa-caret-up" aria-hidden="true"></i>`),
                _target.addClass("show-full-content"),
                $(this).addClass("is-show");
        } else {
            _hide_content
                .removeClass("removeBlur")
                .find(`a`)
                .text("Xem thêm ")
                .append(`<i class="fa fa-caret-down" aria-hidden="true"></i>`),
                _target.removeClass("show-full-content"),
                $(this).removeClass("is-show");
        }
    });
});
