import * as utilities from './utilities.js';

class ATL_Controller
{
	// before DOM
	constructor()
	{

	}
	
	// after DOM
	run()
	{
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

		utilities.submitSelectOnChange('.nav__languages')
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
		let discoveryArrow = document.querySelector('.intro__scroll-down');

		if (!discoveryArrow) {
			return	
		}

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
		let readMore = document.querySelector('.singleProduct__content');

		if (!readMore) {
			return
		}

		readMore.addEventListener('click', () => {
			readMore.classList.toggle('unrolled');
		});
	}

	handleFadeables()
	{
		// TODO: again, fix the inistial scroll with nothing visible

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