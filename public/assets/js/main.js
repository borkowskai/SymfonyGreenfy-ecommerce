/*  ---------------------------------------------------
    Template Name: Fashi
    Description: Fashi eCommerce HTML Template
    Author: Colorlib
    Author URI: https://colorlib.com/
    Version: 1.0
    Created: Colorlib
---------------------------------------------------------  */

'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------
        Hero Slider
    --------------------*/
    $(".hero-items").owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        items: 1,
        dots: false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });

    /*------------------
        Product Slider
    --------------------*/
   $(".product-slider").owlCarousel({
        loop: true,
        margin: 25,
        nav: true,
        items: 4,
        dots: true,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            992: {
                items: 2,
            },
            1200: {
                items: 3,
            }
        }
    });

    /*------------------
       logo Carousel
    --------------------*/
    $(".logo-carousel").owlCarousel({
        loop: false,
        margin: 30,
        nav: false,
        items: 5,
        dots: false,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        mouseDrag: false,
        autoplay: true,
        responsive: {
            0: {
                items: 3,
            },
            768: {
                items: 5,
            }
        }
    });

    /*-----------------------
       Product Single Slider
    -------------------------*/
    $(".ps-slider").owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        items: 3,
        dots: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });
    
    /*------------------
        CountDown
    --------------------*/
    // For demo preview
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    if(mm == 12) {
        mm = '01';
        yyyy = yyyy + 1;
    } else {
        mm = parseInt(mm) + 1;
        mm = String(mm).padStart(2, '0');
    }
    var timerdate = mm + '/' + dd + '/' + yyyy;
    // For demo preview end

    console.log(timerdate);
    

    // Use this for real timer date
    /* var timerdate = "2020/01/01"; */

	$("#countdown").countdown(timerdate, function(event) {
        $(this).html(event.strftime("<div class='cd-item'><span>%D</span> <p>Days</p> </div>" + "<div class='cd-item'><span>%H</span> <p>Hrs</p> </div>" + "<div class='cd-item'><span>%M</span> <p>Mins</p> </div>" + "<div class='cd-item'><span>%S</span> <p>Secs</p> </div>"));
    });

        
    /*----------------------------------------------------
     Language Flag js 
    ----------------------------------------------------*/
    $(document).ready(function(e) {
    //no use
    try {
        var pages = $("#pages").msDropdown({on:{change:function(data, ui) {
            var val = data.value;
            if(val!="")
                window.location = val;
        }}}).data("dd");

        var pagename = document.location.pathname.toString();
        pagename = pagename.split("/");
        pages.setIndexByValue(pagename[pagename.length-1]);
        $("#ver").html(msBeautify.version.msDropdown);
    } catch(e) {
        // console.log(e);
    }
    $("#ver").html(msBeautify.version.msDropdown);

    //convert
    $(".language_drop").msDropdown({roundedBorder:false});
        $("#tech").data("dd");
    });
    /*-------------------
		Range Slider
	--------------------- */
	var rangeSlider = $(".price-range"),
		minamount = $("#minamount"),
		maxamount = $("#maxamount"),
		minPrice = rangeSlider.data('min'),
		maxPrice = rangeSlider.data('max');
	    rangeSlider.slider({
		range: true,
		min: minPrice,
        max: maxPrice,
		values: [minPrice, maxPrice],
		slide: function (event, ui) {
			minamount.val('$' + ui.values[0]);
			maxamount.val('$' + ui.values[1]);
		}
	});
	minamount.val('$' + rangeSlider.slider("values", 0));
    maxamount.val('$' + rangeSlider.slider("values", 1));

    /*-------------------
		Radio Btn
	--------------------- */
    $(".fw-size-choose .sc-item label, .pd-size-choose .sc-item label").on('click', function () {
        $(".fw-size-choose .sc-item label, .pd-size-choose .sc-item label").removeClass('active');
        $(this).addClass('active');
    });
    
    /*-------------------
		Nice Select
    --------------------- */
    $('.sorting, .p-show').niceSelect();

    /*------------------
		Single Product
	--------------------*/
	$('.product-thumbs-track .pt').on('click', function(){
		$('.product-thumbs-track .pt').removeClass('active');
		$(this).addClass('active');
		var imgurl = $(this).data('imgbigurl');
		var bigImg = $('.product-big-img').attr('src');
		if(imgurl != bigImg) {
			$('.product-big-img').attr({src: imgurl});
			$('.zoomImg').attr({src: imgurl});
		}
	});

    $('.product-pic-zoom').zoom();
    
    /*-------------------
		Quantity change
	--------------------- */
    var proQty = $('.pro-qty');
	proQty.prepend('<span class="dec qtybtn">-</span>');
	proQty.append('<span class="inc qtybtn">+</span>');
	proQty.on('click', '.qtybtn', function () {
		var $button = $(this);
		var oldValue = $button.parent().find('input').val();
		if ($button.hasClass('inc')) {
			var newVal = parseFloat(oldValue) + 1;
		} else {
			// Don't allow decrementing below zero
			if (oldValue > 0) {
				var newVal = parseFloat(oldValue) - 1;
			} else {
				newVal = 0;
			}
		}
        $button.parent().find('input').val(newVal);

        window.location = "/session/qtyUpdate/" + $button.parent().find('input').attr('id') + "/" + newVal;
    });

    /*-----------------------------------------------------------
                    Azi MANIPULATION
    ------------------------------------------------------------*/
    
    /*------------------------
		      Wish
    -------------------------- */

    let countWish = 0;
    $('.addWish').html(countWish);
    $('.wish').click(function (e) {
        e.preventDefault();
        countWish += 1;
        $('.addWish').html(countWish);
    });

    /*-----------------------------
		    Basket Management
    ------------------------------ */
    let addBasket = $('.addBasket');
    addBasket.html(0);
    function createBasket(data){
        const basket_head = $('#basket_head');
        $(basket_head).html('');

        const sum_basket = $('.sum_basket');
        $(sum_basket).html('');

        let total = 0;
        let counter =0;
        for(let item of data){
            counter ++;

            let subTotal =  item.priceExclVAT * item.quantity;
            total += subTotal;
            
            const html = `<tr>
            <td class="si-pic"><img src="/dossierFichiers/${item.photo}" alt="${item.photo}"></td>
                <td class="si-text">
                    <div class="product-selected">
                        <h6>${item.product_name}</h6>
                        <p> quantity : ${item.quantity}</p>
                        <p> price : ${item.priceExclVAT}</p>
                    </div>
                </td>
            </tr>`;
            $(basket_head).append(html);
        }
        $(addBasket).html(counter);
        $(sum_basket).html(total.toFixed(2) + " €");
    }


    

    //important to do ifnot after refresh nothing in json 
    $(document).ready(function(){
        fetch('/all-basket')
            .then(response => response.json())
            .then(response => {
                createBasket(response);
            })
    });

    var addProductFunction = function (e) {
        e.preventDefault();

        const id = $(this).data('basket-id');
        const url = `/session/add/${id}`;

        fetch(url)
            .then(response => response.json())
            .then(response => {
                createBasket(response);
                //sumBasket(response);
            });
        
    };

    $('[data-basket-id]').click(addProductFunction);

    /*-----------------------------
		D filters in shop
    ------------------------------ */
    $("#filter-btn").click(
        function() {
            
            var sizes = [];
            $.each($("input[name='bc-size']:checked"), function() {
                sizes.push($(this).val());
            });

            //.substr(1) to remove currency sign $123 -> 123
            var minamount = $("#minamount").val().substr(1);
            var maxamount = $("#maxamount").val().substr(1);

            var colors = [];
            $.each($("input[name='cs-color']:checked"), function() {
                colors.push($(this).val());
            });

            //ajax post call with jquery
            $.post("/ajax/fetchFilteredProducts", 
            {
                sizes: sizes,
                minamount: minamount,
                maxamount: maxamount,
                colors: colors
            },
            // callback method that updates the filtered product list
            function(data, status) {
                $("#product-list-row").html(data);

                //recreate the click event for the refreshed products
                $('[data-basket-id]').click(addProductFunction);
            });
        }
    );

    
    /*-----------------------------
		Paypal
    ------------------------------ */
    //probleme pour prendre directement variable de PHP
    //eviter d'appeler de JS pour eviter la manipulation
    //tout se fait dans le twig - payment.html.twig

})(jQuery);

