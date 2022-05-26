class ATL_Controller
{
	constructor()
	{
		// before DOM
	}
	
	run()
	{
		// after DOM
	}
}

window.atl = new ATL_Controller();
window.addEventListener('load', () => window.atl.run());
