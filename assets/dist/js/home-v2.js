jQuery(document).ready(function($) {

    var splide__profissionais = new Splide( '.splide__profissionais', {
        type     : 'loop',
        autoWidth: true,
        focus  : 'center',
        gap: '30px'
    } );    
    splide__profissionais.mount();

    var splide__depoimentos = new Splide( '.splide__depoimentos', {
        type     : 'loop',
        autoWidth: true,
        focus  : 'center',
        gap: '50px',
        pagination: false
    } );    
    splide__depoimentos.mount();


    $('section.intro .popup__intro .fechar').click(function(e) {
        e.preventDefault();
        $('section.intro .popup__intro').fadeToggle();
        document.querySelector('section.intro .popup__intro video').pause();
    })

    $('section.intro .play').click(function(e) {
        $('section.intro .popup__intro').fadeToggle();
        setTimeout(() => {
            document.querySelector('section.intro .popup__intro video').play();
        }, 100);
        
    })


    $('.select__cursos li').click(function() {
        let atual = $(this).attr('id');
        $('.select__cursos li').removeClass('ativo');
        $(this).toggleClass('ativo');
        $('.cursos__list').hide();
        $('.cursos__list#'+atual).fadeToggle();
    })
})
