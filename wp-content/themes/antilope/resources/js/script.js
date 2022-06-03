class ATL_Controller
{
	// before DOM
	constructor()
	{

	}
	
	// after DOM
	run()
	{
		// TODO: "for each add event...?"
		// TODO: add on load event
		document.querySelectorAll('[class*="fadeable--"]').forEach((el) => {
			window.addEventListener("scroll", () => {
				if (window.innerHeight + window.scrollY >= this.getElementPos(el).y || window.innerHeight + window.scrollY >= this.getElementPos(el).y) {

					// is visible/above
					el.classList.add('fadeIn');
				}
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
}

window.atl = new ATL_Controller();
window.addEventListener('load', () => window.atl.run());