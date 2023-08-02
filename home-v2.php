<?php
	// Template Name: Home v2
	get_header();
?>
<section class="home__v2">
	<section class="intro">
		<video autoplay="" muted="" loop="" playsinline=""> 
			<source src="<?= get_template_directory_uri(); ?>/assets/img/intro.mp4" type="video/mp4">
		</video>
		<div class="container">		
			<img src="<?= get_template_directory_uri(); ?>/assets/img/play-intro.svg" alt="Play" class="play">
			<a href="<?= site_url(); ?>/catalogo">Nossos cursos</a>
		</div>

		<div class="popup__intro" style="display:none">
			<a href="#" class="fechar">X</a>
			<video controls> 
				<source src="<?= get_template_directory_uri(); ?>/assets/img/intro.mp4" type="video/mp4">
			</video>
		</div>
	</section>

	<section class="diferenciais">
		<div class="container">
			<div class="diferenciais__title">
				<h2>Cursos online<br> como você<br> nunca viu</h2>
			</div>
			<div class="diferenciais__list">
				<ul>
					<?php 
						if( have_rows('diferenciais') ):
							while( have_rows('diferenciais') ) : the_row();

								$titulo = get_sub_field('titulo');
								echo '<li>'.$titulo.'</li>';

							endwhile;
						endif;
					?>
				</ul>
			</div>
		</div>
	</section>

	<section class="cursos">
		<div class="container">
			<h2>Escolha seu curso</h2>
			<ul class="select__cursos">
				<li id="inovacao">
					<svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29" fill="none">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M18.9452 10.0547C20.1695 11.279 22.1545 11.279 23.3789 10.0547C24.6032 8.83031 24.6032 6.84525 23.3789 5.6209C22.1545 4.39655 20.1695 4.39655 18.9452 5.6209C17.7207 6.84525 17.7207 8.83031 18.9452 10.0547ZM20.0536 8.94621C20.6658 9.55839 21.6583 9.55839 22.2705 8.94621C22.8826 8.33405 22.8826 7.34151 22.2705 6.72934C21.6583 6.11718 20.6658 6.11718 20.0536 6.72934C19.4413 7.34151 19.4413 8.33405 20.0536 8.94621Z" fill="black"/>
						<path d="M15.5683 19.0215C15.7463 19.4566 16.2254 19.6995 16.6714 19.5509C17.1174 19.4023 17.3608 18.9185 17.1863 18.482C15.9203 15.3152 13.6847 13.0798 10.5178 11.8136C10.0814 11.6391 9.59771 11.8827 9.44907 12.3285C9.30042 12.7745 9.54336 13.2536 9.97844 13.4316C12.6313 14.517 14.4829 16.3686 15.5683 19.0215Z" fill="black"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M21.215 0.508651C23.4411 0.0117965 25.5379 -0.0293948 26.8287 0.0122726C28.0168 0.0506223 28.9497 0.983548 28.9879 2.17162C29.0296 3.46226 28.9884 5.55917 28.4916 7.78525C27.9959 10.0061 27.032 12.4203 25.1794 14.2729L25.1428 14.3095C23.6454 15.8069 22.4693 16.983 21.4968 17.825L21.8872 21.3388C21.9424 21.8346 21.7691 22.3286 21.4163 22.6814L17.9305 26.167C17.0969 27.0009 15.6823 26.7105 15.2442 25.6157L13.6296 21.579L8.44757 22.4426C7.33599 22.6279 6.37227 21.6643 6.55753 20.5525L7.42121 15.3705L3.38448 13.7559C2.28973 13.318 1.99935 11.9034 2.8331 11.0696L6.31879 7.58392C6.67159 7.23112 7.16562 7.05783 7.66151 7.11292L11.1751 7.50333C12.0173 6.53086 13.1932 5.35483 14.6908 3.85731L14.7272 3.8208C16.5798 1.96819 18.9941 1.00436 21.215 0.508651ZM21.5727 2.1116C19.5232 2.56908 17.4409 3.42983 15.8885 4.98215C14.1667 6.70406 12.9498 7.92224 12.1536 8.88972L11.8709 9.23313L7.48012 8.74527L3.99445 12.2309L8.03118 13.8457C8.74778 14.1323 9.16814 14.8792 9.04125 15.6405L8.17756 20.8225L13.3596 19.959C14.121 19.832 14.868 20.2523 15.1546 20.969L16.7692 25.0057L20.2548 21.5201L19.7671 17.1293L20.1105 16.8467C21.078 16.0503 22.2962 14.8334 24.018 13.1115C25.5704 11.5593 26.4312 9.47704 26.8886 7.42745C27.3449 5.38306 27.3854 3.43539 27.3465 2.2246C27.336 1.90202 27.0982 1.66422 26.7756 1.65381C25.5649 1.61472 23.6171 1.65528 21.5727 2.1116Z" fill="black"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M8.09531 28.7794C7.75209 28.4853 7.75209 28.0083 8.09531 27.714L11.824 24.5179C12.1673 24.2238 12.7238 24.2238 13.0669 24.5179C13.4102 24.8122 13.4102 25.2892 13.0669 25.5833L9.33823 28.7794C8.995 29.0736 8.43852 29.0736 8.09531 28.7794Z" fill="black"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.22064 20.9048C-0.0735466 20.5617 -0.0735466 20.0052 0.22064 19.6619L3.4167 15.9331C3.7109 15.59 4.18788 15.59 4.48206 15.9331C4.77625 16.2764 4.77625 16.8329 4.48206 17.176L1.286 20.9048C0.991813 21.2481 0.514826 21.2481 0.22064 20.9048Z" fill="black"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M1.78802 27.1751C1.49384 26.8319 1.49384 26.2754 1.78802 25.9321L4.98409 22.2034C5.27827 21.8603 5.75524 21.8603 6.04945 22.2034C6.34363 22.5467 6.34363 23.1032 6.04945 23.4463L2.85338 27.1751C2.55918 27.5184 2.08221 27.5184 1.78802 27.1751Z" fill="black"/>
					</svg>
					Inovação
				</li>
				<li id="branding">
					<svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
						<g clip-path="url(#clip0_40_328)">
						<path d="M30.3555 19.6477L24.709 17.6828V4.36523H26.1621C26.419 4.36523 26.6654 4.26317 26.8471 4.08149C27.0288 3.89982 27.1309 3.65341 27.1309 3.39648C27.1309 3.13956 27.0288 2.89315 26.8471 2.71147C26.6654 2.5298 26.419 2.42773 26.1621 2.42773H24.709V0.974609C24.709 0.717681 24.6069 0.471276 24.4252 0.2896C24.2436 0.107924 23.9972 0.00585938 23.7402 0.00585938C23.4833 0.00585938 23.2369 0.107924 23.0552 0.2896C22.8735 0.471276 22.7715 0.717681 22.7715 0.974609V2.42773H4.36523V0.974609C4.36523 0.717681 4.26317 0.471276 4.08149 0.2896C3.89982 0.107924 3.65341 0.00585938 3.39648 0.00585938C3.13956 0.00585938 2.89315 0.107924 2.71147 0.2896C2.5298 0.471276 2.42773 0.717681 2.42773 0.974609V2.42773H0.974609C0.717681 2.42773 0.471276 2.5298 0.2896 2.71147C0.107924 2.89315 0.00585938 3.13956 0.00585938 3.39648C0.00585938 3.65341 0.107924 3.89982 0.2896 4.08149C0.471276 4.26317 0.717681 4.36523 0.974609 4.36523H2.42773V22.7715H0.974609C0.717681 22.7715 0.471276 22.8736 0.2896 23.0552C0.107924 23.2369 0.00585938 23.4833 0.00585938 23.7402C0.00585938 23.9972 0.107924 24.2436 0.2896 24.4252C0.471276 24.6069 0.717681 24.709 0.974609 24.709H2.42773V26.1621C2.42773 26.419 2.5298 26.6654 2.71147 26.8471C2.89315 27.0288 3.13956 27.1309 3.39648 27.1309C3.65341 27.1309 3.89982 27.0288 4.08149 26.8471C4.26317 26.6654 4.36523 26.419 4.36523 26.1621V24.709H17.6828L19.6476 30.3555C19.7168 30.5437 19.8424 30.7061 20.0073 30.8204C20.1721 30.9346 20.3682 30.9953 20.5688 30.9939C20.7694 30.9926 20.9647 30.9294 21.1281 30.813C21.2914 30.6966 21.4149 30.5326 21.4816 30.3434L23.6972 23.697L30.3436 21.4816C30.5328 21.4148 30.6967 21.2913 30.8131 21.128C30.9295 20.9646 30.9926 20.7693 30.9939 20.5688C30.9952 20.3682 30.9346 20.1721 30.8203 20.0073C30.7061 19.8424 30.5437 19.7168 30.3555 19.6477ZM13.5684 22.7715H4.36523V4.36523H22.7715V17.0086L20.5168 16.224L22.4877 14.2533C22.668 14.0709 22.7692 13.8248 22.7692 13.5684C22.7692 13.3119 22.668 13.0658 22.4877 12.8834L14.2533 4.64905C14.1634 4.55907 14.0566 4.4877 13.9391 4.439C13.8215 4.3903 13.6956 4.36524 13.5684 4.36524C13.4411 4.36524 13.3152 4.3903 13.1977 4.439C13.0801 4.4877 12.9734 4.55907 12.8834 4.64905L4.64905 12.8834C4.55907 12.9734 4.4877 13.0801 4.439 13.1977C4.3903 13.3152 4.36524 13.4411 4.36524 13.5684C4.36524 13.6956 4.3903 13.8215 4.439 13.9391C4.4877 14.0566 4.55907 14.1634 4.64905 14.2533L12.8834 22.4877C12.9734 22.5777 13.0801 22.649 13.1977 22.6977C13.3152 22.7464 13.4411 22.7715 13.5684 22.7715C13.6956 22.7715 13.8215 22.7464 13.9391 22.6977C14.0566 22.649 14.1634 22.5777 14.2533 22.4877L16.224 20.5171L17.0086 22.7715L13.5684 22.7715ZM15.8242 14.591C15.6525 14.5339 15.4682 14.5257 15.292 14.5673C15.1159 14.6089 14.9548 14.6988 14.8268 14.8268C14.6988 14.9548 14.6089 15.1159 14.5673 15.292C14.5257 15.4682 14.5339 15.6525 14.591 15.8242L15.5168 18.4846L13.5684 20.4326L6.70386 13.5684L13.5684 6.7041L20.4329 13.5684L18.4843 15.5167L15.8242 14.591ZM22.6248 22.0121C22.4822 22.0597 22.3526 22.1399 22.2463 22.2462C22.14 22.3526 22.0599 22.4822 22.0123 22.6249L20.5426 27.033L17.0791 17.0791L27.0329 20.5428L22.6248 22.0121Z" fill="black"/>
						<path d="M13.084 14.0527C13.619 14.0527 14.0527 13.619 14.0527 13.084C14.0527 12.549 13.619 12.1152 13.084 12.1152C12.549 12.1152 12.1152 12.549 12.1152 13.084C12.1152 13.619 12.549 14.0527 13.084 14.0527Z" fill="black"/>
						</g>
						<defs>
						<clipPath id="clip0_40_328">
						<rect width="31" height="31" fill="white"/>
						</clipPath>
						</defs>
					</svg>
					Branding
				</li>
				<li id="tecnologia">
					<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
						<g clip-path="url(#clip0_40_334)">
						<path d="M31.0858 7.75143C31.0858 6.30391 29.9083 5.12642 28.4608 5.12642C27.7176 5.12642 27.046 5.43746 26.5679 5.9355L16.324 0.0211794C16.1307 -0.0903932 15.8926 -0.0903932 15.6993 0.0211794L5.45509 5.9355C4.97706 5.43746 4.30567 5.12642 3.56251 5.12642C2.11499 5.12642 0.9375 6.30391 0.9375 7.75143C0.9375 8.98336 1.79077 10.0193 2.93751 10.3005V22.125C2.93751 22.3482 3.05665 22.5544 3.25001 22.6663L13.4908 28.5789C13.4229 28.8118 13.3858 29.0579 13.3858 29.3125C13.3858 30.7598 14.5633 31.9375 16.0108 31.9375C17.4581 31.9375 18.6356 30.7598 18.6356 29.3125C18.6356 29.0581 18.5987 28.8125 18.5308 28.5796L28.7733 22.6663C28.9666 22.5547 29.0858 22.3482 29.0858 22.125V10.3005C30.2325 10.0193 31.0858 8.98336 31.0858 7.75143ZM2.1875 7.75143C2.1875 6.99312 2.8042 6.37642 3.56251 6.37642C4.32057 6.37642 4.93727 6.99312 4.93727 7.75143C4.93727 8.50949 4.32057 9.12643 3.56251 9.12643C2.8042 9.12643 2.1875 8.50949 2.1875 7.75143ZM16.0108 30.6875C15.2525 30.6875 14.6358 30.0708 14.6358 29.3125C14.6358 28.5545 15.2525 27.9375 16.0108 27.9375C16.7688 27.9375 17.3858 28.5545 17.3858 29.3125C17.3858 30.0708 16.7688 30.6875 16.0108 30.6875ZM17.9048 27.4978C17.4266 26.999 16.7547 26.6875 16.0108 26.6875C15.2674 26.6875 14.5955 26.9988 14.1175 27.4971L4.18751 21.7642V10.3005C5.334 10.0193 6.18727 8.98336 6.18727 7.75143C6.18727 7.49654 6.15016 7.25021 6.08205 7.01681L16.0115 1.28412L25.9412 7.01681C25.8731 7.25021 25.836 7.4963 25.836 7.75143C25.836 8.98336 26.6893 10.0193 27.8358 10.3005V21.7642L17.9048 27.4978ZM28.4608 9.12643C27.7027 9.12643 27.0858 8.50949 27.0858 7.75143C27.0858 6.99312 27.7027 6.37642 28.4608 6.37642C29.2191 6.37642 29.8358 6.99312 29.8358 7.75143C29.8358 8.50949 29.2191 9.12643 28.4608 9.12643Z" fill="black"/>
						<path d="M24.574 9.63301L16.324 4.87006C16.1306 4.75848 15.8926 4.75848 15.6992 4.87006L7.44922 9.63301C7.25586 9.74483 7.13672 9.95113 7.13672 10.1743V19.7004C7.13672 19.9236 7.25586 20.1301 7.44922 20.2417L15.6992 25.0049C15.7959 25.0605 15.9036 25.0886 16.0115 25.0886C16.1197 25.0886 16.2273 25.0605 16.324 25.0049L24.574 20.2417C24.7674 20.1301 24.8865 19.9236 24.8865 19.7004V10.1743C24.8865 9.95113 24.7674 9.74483 24.574 9.63301ZM16.0115 6.133L23.0115 10.1743L16.0115 14.2158L9.01172 10.1743L16.0115 6.133ZM16.6365 23.3811V20.5625C16.6365 20.2173 16.3567 19.9375 16.0115 19.9375C15.6665 19.9375 15.3867 20.2173 15.3867 20.5625V23.3811L8.38672 19.3396V11.2568L15.6992 15.4787C15.7959 15.5344 15.9036 15.5625 16.0115 15.5625C16.1197 15.5625 16.2273 15.5344 16.324 15.4787L23.6365 11.2568V19.3396L16.6365 23.3811Z" fill="black"/>
						<path d="M16.011 17.125C15.8459 17.125 15.6853 17.1917 15.5684 17.3081C15.4521 17.4243 15.3853 17.5855 15.3853 17.75C15.3853 17.9143 15.4521 18.0754 15.5684 18.1917C15.6853 18.3081 15.8459 18.375 16.011 18.375C16.1753 18.375 16.3367 18.3081 16.4529 18.1917C16.5691 18.0754 16.636 17.9143 16.636 17.75C16.636 17.5855 16.5691 17.4243 16.4529 17.3081C16.3367 17.1917 16.1753 17.125 16.011 17.125Z" fill="black"/>
						</g>
						<defs>
						<clipPath id="clip0_40_334">
						<rect width="32" height="32" fill="white"/>
						</clipPath>
						</defs>
					</svg>
					Tecnologia
				</li>
				<li id="design">
					<svg version="1.1" id="fi_841589" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><g><path d="M497,0h-60c-8.284,0-15,6.716-15,15v15H298.42C292.228,12.542,275.555,0,256,0s-36.228,12.542-42.42,30H90V15
								c0-8.284-6.716-15-15-15H15C6.716,0,0,6.716,0,15v60c0,8.284,6.716,15,15,15h60c8.284,0,15-6.716,15-15V59.8h62.377
								c-54.116,34.274-87.012,92.175-90.969,153.642C43.738,219.518,31,236.294,31,256c0,24.813,20.187,45,45,45s45-20.187,45-45
								c0-19.38-12.315-35.938-29.53-42.26c5.326-70.647,56.198-131.494,124.226-148.758C223.07,79.794,238.361,90,256,90
								c17.639,0,32.93-10.206,40.304-25.017c68.029,17.264,118.9,78.111,124.226,148.758C403.315,220.062,391,236.62,391,256
								c0,24.813,20.187,45,45,45s45-20.187,45-45c0-19.706-12.738-36.482-30.408-42.558C446.627,151.852,413.633,94.207,359.623,60H422
								v15c0,8.284,6.716,15,15,15h60c8.284,0,15-6.716,15-15V15C512,6.716,505.284,0,497,0z M60,60H30V30h30V60z M76,271
								c-8.271,0-15-6.729-15-15s6.729-15,15-15s15,6.729,15,15S84.271,271,76,271z M256,60c-8.271,0-15-6.729-15-15s6.729-15,15-15
								s15,6.729,15,15S264.271,60,256,60z M436,241c8.271,0,15,6.729,15,15s-6.729,15-15,15s-15-6.729-15-15S427.729,241,436,241z
								M482,60h-30V30h30V60z"></path></g></g><g><g><path d="M388.48,307.679l-120-179.999c-0.004-0.006-0.009-0.012-0.013-0.019c-0.043-0.064-0.09-0.125-0.134-0.188
								c-0.206-0.299-0.423-0.587-0.649-0.868c-6.321-7.854-18.357-7.324-24.017,0.868c-0.044,0.063-0.091,0.124-0.134,0.188
								c-0.004,0.007-0.009,0.012-0.013,0.019l-120,180c-3.967,5.949-3.182,13.871,1.874,18.927
								c29.927,29.927,48.975,69.047,54.164,110.901c-2.329,1.883-4.578,3.899-6.71,6.081C158.759,458.001,151,476.97,151,497
								c0,8.284,6.716,15,15,15h180c8.284,0,15-6.716,15-15c0-20.03-7.759-38.999-21.847-53.412c-2.133-2.182-4.381-4.198-6.711-6.081
								c5.188-41.856,24.236-80.976,54.163-110.9C391.662,321.551,392.447,313.628,388.48,307.679z M256,301c8.271,0,15,6.729,15,15
								s-6.729,15-15,15s-15-6.729-15-15S247.729,301,256,301z M183.558,482c6.241-17.833,23.159-31,42.442-31h60
								c19.283,0,36.201,13.167,42.442,31H183.558z M304.245,423.283C298.345,421.777,292.229,421,286,421h-60
								c-6.229,0-12.345,0.777-18.245,2.284c-7.02-40.429-25.251-78.221-52.65-108.899L241,185.542v88.039
								c-17.459,6.192-30,22.865-30,42.42c0,24.813,20.187,45,45,45s45-20.187,45-45c0-19.555-12.541-36.228-30-42.42v-88.039
								l85.896,128.843C329.496,345.06,311.264,382.853,304.245,423.283z"></path></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
					</svg>
					Design
				</li>
				<li id="empreendedorismo">
					<svg id="fi_9410339" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m511.633 20.452c-.324-7.549-6.213-13.679-13.743-14.305l-.469-.039c-51.022-4.207-101.625 1.451-150.402 16.815-49.851 15.704-95.397 40.739-135.372 74.411-6.935 5.842-13.624 11.91-20.097 18.166-15.885-9.556-34.43-14.095-53.136-12.84-22.018 1.477-42.747 10.892-58.366 26.511l-75.654 75.655c-5.858 5.858-5.858 15.355 0 21.213l8.893 8.893c24.407 24.407 56.459 38.06 90.251 38.96l-5.66 36.976c-.723 4.719.845 9.5 4.221 12.876l81.397 81.396c2.834 2.834 6.658 4.394 10.605 4.394.754 0 1.514-.057 2.27-.173l36.987-5.662c.903 33.792 14.548 65.852 38.948 90.253l8.894 8.894c2.929 2.929 6.768 4.393 10.606 4.393s7.678-1.464 10.606-4.394l75.653-75.654c29.114-29.114 34.915-73.283 15.416-108.495 7.625-7.456 14.984-15.224 22.033-23.334 32.981-37.95 58.089-81.267 74.626-128.746 16.404-47.092 23.634-96.269 21.493-146.164zm-29.641 14.715c.215 33.366-4.134 66.311-12.957 98.361l-88.722-88.721c33.288-8.018 67.347-11.256 101.679-9.64zm-445.76 180.246 65.028-65.028c18.277-18.277 45.999-22.738 68.759-12.374-22.002 24.941-40.731 52.594-55.936 82.683l-2.368 4.686c-.714 1.413-1.2 2.931-1.439 4.496l-2.15 14.047c-26.744.239-52.309-9.801-71.894-28.51zm92.45 92.488 6.3-41.157c.501-.687.954-1.409 1.334-2.173l106.445 106.445c-.71.346-1.384.754-2.029 1.205l-41.393 6.336zm228.172 98.078-65.027 65.028c-18.704-19.579-28.748-45.153-28.51-71.894l14.047-2.15c1.565-.239 3.082-.725 4.495-1.439l14.22-7.185c26.711-13.497 51.519-29.81 74.234-48.724 9.17 22.377 4.343 48.561-13.459 66.364zm-74.305-44.416-4.528 2.288-134.58-134.58c42.936-81.751 116.666-144.94 204.004-174.908l111.175 111.174c-32.174 85.372-94.396 154.754-176.071 196.026z"></path><path d="m266.137 162.51c-23.313 23.313-23.313 61.247 0 84.561 11.656 11.656 26.969 17.484 42.28 17.484s30.624-5.828 42.28-17.485c23.313-23.313 23.313-61.247 0-84.56s-61.248-23.313-84.56 0zm63.347 63.347c-11.616 11.616-30.518 11.616-42.134 0-11.616-11.617-11.616-30.518 0-42.135 5.809-5.808 13.437-8.712 21.067-8.712s15.259 2.904 21.067 8.712c11.616 11.618 11.616 30.519 0 42.135z"></path><path d="m123.116 388.265c-5.857-5.857-15.355-5.858-21.213 0l-48.265 48.266c-5.858 5.858-5.858 15.355 0 21.213 2.929 2.929 6.768 4.393 10.606 4.393s7.678-1.464 10.606-4.394l48.265-48.266c5.86-5.856 5.86-15.354.001-21.212z"></path><path d="m80.152 345.301c-5.857-5.858-15.355-5.858-21.213 0l-48.266 48.266c-5.858 5.858-5.858 15.355 0 21.213 2.929 2.929 6.768 4.393 10.606 4.393s7.678-1.464 10.606-4.393l48.266-48.266c5.859-5.858 5.859-15.355.001-21.213z"></path><path d="m144.869 431.231-48.266 48.266c-5.858 5.858-5.858 15.355 0 21.213 2.929 2.929 6.768 4.394 10.606 4.394s7.678-1.464 10.606-4.394l48.266-48.266c5.858-5.858 5.858-15.355 0-21.213-5.857-5.859-15.354-5.859-21.212 0z"></path></g></svg>
					Empreendedorismo
				</li>
			</ul>


			<div id="inovacao" class="cursos__list">
				<ul>
					<?php 
						if( have_rows('inovacao') ):
							while( have_rows('inovacao') ) : the_row();

								$titulo = get_sub_field('titulo');
								$link = get_sub_field('link');
								$imagem = get_sub_field('imagem');
								$duracao = get_sub_field('duracao');

								echo '<li>'; 
									echo '<a href="'.$link.'"></a>';
									echo '<img src="'.$imagem.'" alt="'.$titulo.'" loading="lazy">';
									echo '<div class="content">'; 
										echo '<h3>'.$titulo.'</h3>';
										echo '<p>'.$duracao.'</p>';
									echo '</div>';
								echo '</li>';

							endwhile;
						endif;
					?>
				</ul>
			</div>

			<div id="branding" class="cursos__list" style="display:none">
				<ul>
					<?php 
						if( have_rows('branding') ):
							while( have_rows('branding') ) : the_row();

								$titulo = get_sub_field('titulo');
								$link = get_sub_field('link');
								$imagem = get_sub_field('imagem');
								$duracao = get_sub_field('duracao');

								echo '<li>'; 
									echo '<a href="'.$link.'"></a>';
									echo '<img src="'.$imagem.'" alt="'.$titulo.'" loading="lazy">';
									echo '<div class="content">'; 
										echo '<h3>'.$titulo.'</h3>';
										echo '<p>'.$duracao.'</p>';
									echo '</div>';
								echo '</li>';

							endwhile;
						endif;
					?>
				</ul>
			</div>

			<div id="tecnologia" class="cursos__list"  style="display:none">
				<ul>
					<?php 
						if( have_rows('tecnologia') ):
							while( have_rows('tecnologia') ) : the_row();

								$titulo = get_sub_field('titulo');
								$link = get_sub_field('link');
								$imagem = get_sub_field('imagem');
								$duracao = get_sub_field('duracao');

								echo '<li>'; 
									echo '<a href="'.$link.'"></a>';
									echo '<img src="'.$imagem.'" alt="'.$titulo.'" loading="lazy">';
									echo '<div class="content">'; 
										echo '<h3>'.$titulo.'</h3>';
										echo '<p>'.$duracao.'</p>';
									echo '</div>';
								echo '</li>';

							endwhile;
						endif;
					?>
				</ul>
			</div>


			<div id="design" class="cursos__list"  style="display:none">
				<ul>
					<?php 
						if( have_rows('design') ):
							while( have_rows('design') ) : the_row();

								$titulo = get_sub_field('titulo');
								$link = get_sub_field('link');
								$imagem = get_sub_field('imagem');
								$duracao = get_sub_field('duracao');

								echo '<li>'; 
									echo '<a href="'.$link.'"></a>';
									echo '<img src="'.$imagem.'" alt="'.$titulo.'" loading="lazy">';
									echo '<div class="content">'; 
										echo '<h3>'.$titulo.'</h3>';
										echo '<p>'.$duracao.'</p>';
									echo '</div>';
								echo '</li>';

							endwhile;
						endif;
					?>
				</ul>
			</div>


			<div id="empreendedorismo" class="cursos__list"  style="display:none">
				<ul>
					<?php 
						if( have_rows('empreendedorismo') ):
							while( have_rows('empreendedorismo') ) : the_row();

								$titulo = get_sub_field('titulo');
								$link = get_sub_field('link');
								$imagem = get_sub_field('imagem');
								$duracao = get_sub_field('duracao');

								echo '<li>'; 
									echo '<a href="'.$link.'"></a>';
									echo '<img src="'.$imagem.'" alt="'.$titulo.'" loading="lazy">';
									echo '<div class="content">'; 
										echo '<h3>'.$titulo.'</h3>';
										echo '<p>'.$duracao.'</p>';
									echo '</div>';
								echo '</li>';

							endwhile;
						endif;
					?>
				</ul>
			</div>
			

			<a href="<?= site_url(); ?>/catalogo" class="cta__cursos">Todos os cursos</a>

		</div>
	</section>


	<section class="profissionais">
		<div class="container">
			<h2>Você aprende através da experiência</h2>
			<h3>executivos, especialistas, pensadores,<br> profissionais e professores </h3>
		</div>
		<div class="splide__profissionais splide">
			<div class="splide__track">
				<ul class="splide__list">
					<?php 
						if( have_rows('profissionais') ):
							while( have_rows('profissionais') ) : the_row();

								$nome = get_sub_field('nome');
								$imagem = get_sub_field('imagem');
								$funcao = get_sub_field('funcao');

								echo '<li class="splide__slide">'; 
									echo '<img src="'.$imagem.'" alt="'.$nome.'" loading="lazy">';
									echo '<div class="content">'; 
										echo '<h4>'.$nome.'</h4>';
										echo '<p>'.$funcao.'</p>';
									echo '</div>';
								echo '</li>';

							endwhile;
						endif;
					?>
				</ul>
			</div>
		</div>

		<div class="empresas__profissionais">
			<div class="container">
				<h5>empresas que os especialistas já atuaram:</h5>
				<ul>
					<?php 
						if( have_rows('empresas') ):
							while( have_rows('empresas') ) : the_row();

								$logo = get_sub_field('logo');

								echo '<li>'; 
									echo '<img src="'.$logo.'" loading="lazy">';
								echo '</li>';

							endwhile;
						endif;
					?>
				</ul>
			</div>
		</div>
	</section>


	<section class="teste__gratis">
		<div class="container">
			<a href="#" class="box">
				<h2>Faça um<br> teste grátis</h2>
				<span>Clique aqui e faça o teste</span>
			</a>
		</div>
	</section>


	<section class="depoimentos">
		<div class="container">
			<h2>Quem passou pela Saibalá:</h2>
		</div>
		<div class="splide__depoimentos splide">
			<div class="splide__track">
				<ul class="splide__list">
					<?php 
						if( have_rows('depoimentos') ):
							while( have_rows('depoimentos') ) : the_row();

								$nome = get_sub_field('nome');
								$imagem = get_sub_field('imagem');
								$funcao = get_sub_field('funcao');
								$depoimento = get_sub_field('depoimento');

								echo '<li class="splide__slide">'; 
									echo '<p class="depo">'.$depoimento.'</p>';
									echo '<div class="person">';
										echo '<img src="'.$imagem.'" loading="lazy">';
										echo '<h4>'.$nome.'</h4>';
										echo '<p>'.$funcao.'</p>';
									echo '</div>';
								echo '</li>';

							endwhile;
						endif;
					?>
				</ul>
			</div>
		</div>
	</section>


	<section class="cta__rodape">
		<div class="container">
			<h2>Sua melhor versão<br> bem aqui</h2>
			<a href="<?php site_url(); ?>/catalogo">Comece já</a>
		</div>
	</section>

</section>
<?php 
	get_footer();
?>