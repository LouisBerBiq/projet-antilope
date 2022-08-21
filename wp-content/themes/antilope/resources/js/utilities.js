
// snatched from https://stackoverflow.com/a/35417781/17701651
// gets the x & y positions of an element
export function getElementPos(el, rel)
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

export function submitSelectOnChange(querySelector)
{
	document.querySelector(querySelector)
	.addEventListener('change', (e) => {
		location.href = e.currentTarget.value;
	});
}
