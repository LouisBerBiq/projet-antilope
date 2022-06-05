class ATL_Controller
{
	// before DOM
	constructor()
	{

	}
	
	// after DOM
	run()
	{

		document.querySelectorAll('[class*="fadeable--"]').forEach((el) => {
			window.addEventListener("scroll", this.FadeInOnVisible(el), { once: true }); // not using an arrow func makes this work on load too
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

	FadeInOnVisible(el)
	{
		if (window.innerHeight + window.scrollY >= this.getElementPos(el).y || window.innerHeight + window.scrollY >= this.getElementPos(el).y) {
			// is visible/above
			el.classList.add('fadeIn');
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