import * as utilities from './utilities.js';

class ATL_Controller
{
	// before DOM
	constructor()
	{
		this.indexPages = ['/']
	}
	
	// after DOM
	run()
	{
		// get a list of all the available languages to create a list of all the url for index
		this.handleLanguages();
		// handle mobile sidebar
		this.handleSidebar();
		// fade the arrow on 50% page scroll
		this.handleDiscoveryArrow();
		// handle effects of the "fadeable--" class
		this.handleFadeables();
		// handle the read more tag in the module page
		this.handleReadMore();

		// this is the best hack ever
		window.scrollBy(0, 1)
	}

	handleLanguages()
	{
		// yes, I know, the proper way would be to use an AJAX request or simply echo into the page
		document.querySelectorAll('.nav__locale').forEach((element) => {
			this.indexPages.push(`/${element.getAttribute('lang').split('-')[0]}/`)
		});
	}
	
	handleSidebar() {

		let sidebarButton = document.querySelector('.hamburger');
		let navicon = document.querySelector('.navicon');
		let overlay = document.querySelector('.overlay');
		let header = document.querySelector('.header');
		let container = document.querySelector('.nav__container');

		sidebarButton.addEventListener('click', () => {
			this.togglesidebar(navicon, header, overlay);
		});
		overlay.addEventListener('click', () => {
			this.togglesidebar(navicon, header, overlay);
		});
	}

	togglesidebar(navicon, header, overlay)
	{
		navicon.classList.toggle('navicon--crossed');
		header.classList.toggle('header--open');
		overlay.classList.toggle('overlay--on');
	}

	handleDiscoveryArrow()
	{
		if ( this.indexPages.includes(window.location.pathname) ) {

			let discoveryArrow = document.querySelector('.intro__scroll-down');
			let discoveryArrowSize = discoveryArrow.offsetHeight;
			let discoveryArrowPosition = discoveryArrow.offsetTop;

			// TODO: throttle
			window.addEventListener("scroll", () => {
				let scrolled = document.scrollingElement.scrollTop;
				this.FadeDiscoveryArrow(discoveryArrow, discoveryArrowSize, discoveryArrowPosition, scrolled);
			});
		}
	}


	handleReadMore()
	{
		if (window.location.pathname.includes('/product/')) { // TODO: make it more foolproof maybe
			let readMore = document.querySelector('.singleProduct__content');
	
			readMore.addEventListener('click', () => {
				readMore.classList.toggle('unrolled');
			});
		}
	}

	handleFadeables()
	{
		document.querySelectorAll('[class*="fadeable--"]').forEach((el) => {
			window.addEventListener("scroll", () => {
				this.FadeInOnVisible(el);
			});
		});
	}


	FadeInOnVisible(el)
	{
		if (window.innerHeight/1.3 + window.scrollY >= utilities.getElementPos(el).y || window.innerHeight/1.3 + window.scrollY >= utilities.getElementPos(el).y) {
			el.classList.add('fadeIn');
		}
	}

	FadeDiscoveryArrow(discoveryArrow, size, position, scrolled)
	{
		if(scrolled * 3 > position - size){
			discoveryArrow.classList.add('hidden');
		}
	}

	// showPrivacyPolicy()
	// {
	// 	let privacyPolicyFrame = document.querySelector('.privacy__window').contentDocument;
	// 	privacyPolicyFrame.querySelector('.header').remove();
	// }
}

window.atl = new ATL_Controller();
window.addEventListener('load', () => window.atl.run());