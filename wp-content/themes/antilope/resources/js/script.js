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
		// handle clicking images in module page
		this.handleProductImageClick();
		// handle the read more tag in the module page
		this.handleReadMore();
		
		this.scrollController();

		utilities.submitSelectOnChange('.nav__languages')
	}

	scrollController() 
	{
	let controller = new ScrollMagic.Controller();
	
	let elementSelector = '.fadeable';
	let elementSelector2 = '.fadeable-inverted';

	document.querySelectorAll(elementSelector).forEach(element => {
		let scene = new ScrollMagic.Scene({
			triggerElement: element,
			triggerHook: .7
		})
		.setClassToggle(element, 'fadeIn')
		.addTo(controller)
	});
	document.querySelectorAll(elementSelector2).forEach(element => {
		let scene = new ScrollMagic.Scene({
			triggerElement: element,
			triggerHook: .5
		})
		.setClassToggle(element, 'fadeOut')
		.addTo(controller)
	});
	}

	handleSidebar()
	{
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

	handleProductImageClick()
	{
		document.querySelectorAll('.images__fig').forEach((el) => {
			el.addEventListener('click', () => {
				el.classList.toggle('images__fig--maximized');
			});
		});
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

	FadeInOnVisible(el)
	{
		if (window.innerHeight/1.3 + window.scrollY >= utilities.getElementPos(el).y || window.innerHeight/1.3 + window.scrollY >= utilities.getElementPos(el).y) {
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