class ATL_Controller
{
	constructor()
	{
		console.log('yep, I\'m building');
	}
	
	run()
	{
		console.log('yep, I\'m running');
	}
}

window.atl = new ATL_Controller();
window.addEventListener('load', () => window.atl.run());
