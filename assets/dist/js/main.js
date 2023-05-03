/* Animate Scroll */
var linkMenu = false
var scrollTo = function(element) {
    linkMenu = true
    $('html, body').animate({
        scrollTop: $(element).offset().top - 80
    }, 1000, function(){
        //window.location.hash = element
        linkMenu = false
    });
}

/* Init */
var base = function () {
    "use strict";
    return {
        //main function
        init: function () {
            
            $('.projectForm').submit(function(e){
                e.preventDefault();
                var form = $(this)[0];
                var formData = new FormData(form);
                $.ajax({
                    url: ajaxurl,
                    type: 'post',
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    data:formData,
                    success: function(response) {
                        $(".projectForm input").val('');
                        $(".projectForm select").val('');
                        $(".projectForm textarea").val('');
                        $('.projectForm .alert-success').removeClass('d-none');
                    },
                    error: function(xhr, status) {
                        $('.projectForm .alert-danger').removeClass('d-none');
                    }
                });
            });

            $('#projetos .filter select').on('change',function(e){
                e.preventDefault();
                var val = $(this).val();
                window.location.href = val;
            });

            $('header button').click(function(e){
                $('nav').addClass('active');
            });
            $('nav button').click(function(e){
                $('nav').removeClass('active');
            }); 
           
            var url = window.location.origin + window.location.pathname;
            $('.cat a').removeClass('active');
            $(".cat a[href='"+url+"']").addClass('active');            

            $("#home .cursos .owl-carousel").owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items:1
                    }
                }
            });  

            // $("#home .submitForm").submit(function (e){
            //     alert('Apenas um teste...')
            // })

            $(".single-professores .owl-carousel").owlCarousel({
                loop: true,
                center: true,
                items:1,
                nav: true,
                dots: false,
                autoplay: false,
                autoplayTimeout: 7500,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items:1
                    },
                    768: {
                        items:2
                    },
                    1024: {
                        items: 3
                    }
                }
            }); 

            $(".single-depoimentos .owl-carousel").owlCarousel({
                loop: true,
                center: true,
                items:1,
                nav: true,
                dots: false,
                margin: 30,
                autoplay: true,
                autoplayTimeout: 7500,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items:1
                    },
                    768: {
                        items:2
                    },
                    1024: {
                        items: 3
                    }
                }
            }); 

            $(".professores .owl-carousel").owlCarousel({
                loop: true,
                center: true,
                items:1,
                nav: true,
                dots: true,
                margin: 0,
                responsive: {
                    0: {
                        items:1
                    },
                    768: {
                        items:2
                    },
                }
            }); 

            $(".depoimentos .owl-carousel").owlCarousel({
                loop: true,
                center: true,
                items:1,
                nav: true,
                dots: true,
                margin:30,
                responsive: {
                    0: {
                        items:1
                    },
                    768: {
                        items:2
                    },
                }
            }); 

            if($('.woocommerce-notices-wrapper').text().length < 1 ){
                $('.woocommerce-notices-wrapper').hide();
            }

            $('body.single .woocommerce-notices-wrapper').click(function(){
                $(this).fadeOut();
            });

            $(".projetos .owl-carousel").owlCarousel({
                loop: true,
                center: true,
                items:1,
                nav: true,
                dots: true,
                margin:0,
                responsive: {
                    0: {
                        items:1
                    },
                    768: {
                        items:2
                    },
                }
            }); 

            $('.btn-exp').click(function(e){
                e.preventDefault();
                var item = $(this).attr('href').replace('#','');
                $('.box-expansivel').removeClass('active');
                $(".box-expansivel[data-name='"+item+"']").addClass('active');
            });
         
            $('.box-expansivel .header button').click(function(){
                $(this).closest('.box-expansivel').removeClass('active');
            });

            $('#checkout .form-login-box .btn-neutral').click(function(e){
                e.preventDefault();
                $('#checkout .form-login-box').hide();
                $('#checkout .form-register-box').fadeIn();
            });
            $('#checkout .form-register-box .btn-neutral').click(function(e){
                e.preventDefault();
                $('#checkout .form-register-box').hide();
                $('#checkout .form-login-box').fadeIn();
            });
            
            $('#checkout .convidado .btn-neutral').click(function(e){
                e.preventDefault();
                $('#checkout .step1').hide();
                $('#checkout .step2').fadeIn();
                $('#checkout .steps div').removeClass('active');
                $("#checkout .steps div[data-step='2']").addClass('active');
            });

            $('#checkout select').addClass('form-control');
            $('#checkout .form-row').removeClass('form-row');
            
            $('#checkout .step2 .btn-prev').click(function(e){
                e.preventDefault();
                $('#checkout .step2').hide();
                $('#checkout .step1').fadeIn();
                $('#checkout .steps div').removeClass('active');
                $("#checkout .steps div[data-step='1']").addClass('active');
            });
            $('#checkout').on('click','.step3 .btn-prev',function(e){
                e.preventDefault();
                $('#checkout .step3').hide();
                $('#checkout .step2').fadeIn();
                $('#checkout .steps div').removeClass('active');
                $("#checkout .steps div[data-step='2']").addClass('active');
            }); 
            $('#checkout .step2 .btn-next').click(function(e){
                e.preventDefault();
                var error = 0;
                $("#checkout .step2 .validate-required input:visible").each(function(){
                    var val = $(this).val();
                    $(this).removeClass('error');
                    if(val == ''){
                        $(this).addClass('error');
                        error = error + 1;
                    }
                });
                $("#checkout .step2 .validate-required select:visible").each(function(){
                    var val = $(this).val();
                    $(this).removeClass('error');
                    if(val == ''){
                        $(this).addClass('error');
                        error = error + 1;
                    }
                });
                if( error < 1){
                    $('#checkout .step2').hide();
                    $('#checkout .step3').fadeIn();
                    $('#checkout .steps div').removeClass('active');
                    $("#checkout .steps div[data-step='3']").addClass('active');
                }
            });
            // var lastScrollPosition = 0
            // $(window).scroll(function (event) {
            //     var scroll = $(window).scrollTop();
            //     console.log(scroll);
            //     if (scroll > 400 && scroll > lastScrollPosition) {
            //         console.log('Exibe o botão')
            //     } else {
            //         console.log('Esconde o botão')
            //     }
            //     lastScrollPosition = scroll
            // });


            $('#billing_postcode').val('05436020');
            $('#billing_address_1').val('Saibalá LTDA');
            $('#billing_neighborhood').val('Rua Simpatia');
            $('#billing_number').val('288');
            $('#billing_city').val('São Paulo');
            $('#billing_phone').val('11983599947');
        }
    };
}();


$(document).ready(function() {
    base.init();
    const mobileMenu = $(".menu-header-container");
    if (mobileMenu.length) {
      const newMenuItem = $("<li>").addClass("menu-item menu-item-type-post_type menu-item-object-page menu-item-78").html("<a class='mobile-only' href='#'>Carrinho</a>");
      const menuHeader = mobileMenu.find("#menu-header");
      menuHeader.prepend(newMenuItem);
      const extraButtons = $("<div>").addClass("extra-buttons");
      const button1 = $("<a class='mobile-only' href='#'>").text("Entrar");
      const button2 = $("<a class='mobile-only' href='#'>").text("Cadastre-se");
      extraButtons.append(button1, button2);
      mobileMenu.children().first().after(extraButtons);
      button1.click(function(event) {
        event.preventDefault(); 
        $('body').trigger('wc_fragments_refreshed'); 
        $('a[href="#myaccount"]').first().click(); 
        $('#collapseExample').collapse('hide'); 
      });
      button2.click(function(event) {
        event.preventDefault(); 
        $('body').trigger('wc_fragments_refreshed'); 
        $('a[href="#login"]').first().click(); 
        $('#collapseExample').collapse('hide');
      });
    }
});

window.onload = function() {
    
    var isMobile = $(window).width() <= 991,
        isTablet = $(window).width() >= 991,
        isDesktop = $(window).width() >= 1024,
        isDesktopMed = $(window).width() >= 1200,
        isDesktopMax = $(window).width() >= 1400;

    if (isDesktop) {

        // inicia o wow.js
        new WOW().init();

    }
};


// Dots Nav 
function dotsNav(action) {
    let $dots = $('.assessments__slider .slider__dot');
    if ($dots) {
        // Geral 
        let $count = 0;
        let $atual = 1;

        $($dots).each(function()  {
            $count++;
        })

        // Ação
        $($dots).each(function()  {
            if ($(this).hasClass('active')) {
                $atual = parseInt($(this).attr('id').replace('dot__',''));                 
            }
        })
        
        // Next 
        if (action == 'next' && $atual < $count) {
            $proximo = $atual + 1;
            $('#dot__'+$atual).removeClass('active');
            $('#dot__'+$proximo).addClass('active');
            $atual = $atual + 1;
        }

        // Prev 
        if (action == 'prev' && $atual > 1) {
            $proximo = $atual - 1;
            $('#dot__'+$atual).removeClass('active');
            $('#dot__'+$proximo).addClass('active');
            $atual = $atual - 1;
        }
    }
}

// Navegação B2B
function navSlide(action) {
    let $sliders = $('.assessments__slider .slider__item');

    if ($sliders) {
        // Geral 
        let $count = 0;
        let $atual = 1;

        $($sliders).each(function() {
            $count++;
        })

        // Ação
        $($sliders).each(function()  {
            if ($(this).hasClass('active')) {
                $atual = parseInt($(this).attr('id').replace('slider__',''));                 
            }
        })
        
        // Next 
        if (action == 'next' && $atual < $count) {
            $proximo = $atual + 1;
            $('#slider__'+$atual).removeClass('active');
            $('#slider__'+$proximo).addClass('active');
            $atual = $atual + 1;
            dotsNav('next');
        }

        // Prev 
        if (action == 'prev' && $atual > 1) {
            $proximo = $atual - 1;
            $('#slider__'+$atual).removeClass('active');
            $('#slider__'+$proximo).addClass('active');
            $atual = $atual - 1;
            dotsNav('prev');
        }

        openCards($atual);
    }
}

function openCards(id) {
    $('.competencias__list li').each(function() {
        $('.competencias__list li').removeClass('active');
        $('.competencias__list li.slide__'+id).addClass('active');
    })
}

$('.action__slider').click(function() {
    let id = $(this).attr('id');
    navSlide(id);
})




/* Modal Vídeo */
$('.video__section .video__close, .cta__video').click(function(e) {
    e.preventDefault();
    $('.video__section').fadeToggle();
})