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

		let discoveryArrow = document.querySelector('.intro__scroll-down');
		let discoveryArrowSize = discoveryArrow.offsetHeight;
		let discoveryArrowPosition = discoveryArrow.offsetTop;

		document.querySelectorAll('[class*="fadeable--"]').forEach((el) => { // not using an arrow func makes this work on initial load
			window.addEventListener("scroll", () => {
				let scrolled = document.scrollingElement.scrollTop;
				this.FadeInOnVisible(el);
				this.FadeDiscoveryArrow(discoveryArrow, discoveryArrowSize, discoveryArrowPosition, scrolled);
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