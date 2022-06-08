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

	// TODO: fix initial visibility
	FadeInOnVisible(el)
	{
		if (window.innerHeight/1.3 + window.scrollY >= this.getElementPos(el).y || window.innerHeight/1.3 + window.scrollY >= this.getElementPos(el).y) {
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