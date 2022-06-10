import './ads.js';
import * as utilities from './utilities.js';

class ATL_Controller
{
	// before DOM
	constructor()
	{
		this.indexPages = ['/']

		// if(! window.adsWereAMistake){
		// 	console.log('blocked');
		// } else {
		// 	console.log('not blocked');
		// }
	}
	
	// after DOM
	run()
	{
		this.handleLanguages();
		this.handleDiscoveryArrow();
		this.handleFadeables();

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

	handleFadeables()
	{
		document.querySelectorAll('[class*="fadeable--"]').forEach((el) => { // not using an arrow func makes this work on initial load
			window.addEventListener("scroll", () => {
				this.FadeInOnVisible(el);
			});
		});
	}


	// TODO: fix initial visibility
	FadeInOnVisible(el)
	{
		if (window.innerHeight/1.3 + window.scrollY >= utilities.getElementPos(el).y || window.innerHeight/1.3 + window.scrollY >= utilities.getElementPos(el).y) {
			// is visible/above
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