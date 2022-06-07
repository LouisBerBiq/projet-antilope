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

		document.querySelectorAll('[class*="fadeable--"]').forEach((el) => { // not using an arrow func makes this work on initial load
			window.addEventListener("scroll", () => {
				this.FadeInOnVisible(el);
				this.FadeDiscoveryArrow(discoveryArrow);
			}, { once: true });});
	}

	// snatched from https://stackoverflow.com/a/35417781/17701651
	getElementPos(el, rel)
	{
		var x=0, y=0;
		do {
			x += el.offsetLeft;
			y += el.offsetTop;
			el = el.offsetParent;
		}
		while (el != rel)
		return {x:x, y:y};
	}

	FadeInOnVisible(el)
	{
		if (window.innerHeight + window.scrollY >= this.getElementPos(el).y || window.innerHeight + window.scrollY >= this.getElementPos(el).y) {
			// is visible/above
			el.classList.add('fadeIn');
		}
	}
	FadeDiscoveryArrow(discoveryArrow)
	{
		let position = discoveryArrow.offsetTop;
		let scrolled = document.scrollingElement.scrollTop;

		if(scrolled > position + 100){
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