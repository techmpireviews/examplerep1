function navOpen() {
	const navSlideOut = document.getElementById('nav1');
	const navOpenBtn = document.getElementById('opennavbarbtn');
	const navCloseBtn = document.getElementById('navbtn');
	navSlideOut.style.webkitClipPath = 'inset(0 0 0 0)';
	navSlideOut.style.visibility = 'visible';
	navOpenBtn.style.visibility = 'hidden';
}

function navClose() {
	const navSlideOut = document.getElementById('nav1');
	const navOpenBtn = document.getElementById('opennavbarbtn');
	const navCloseBtn = document.getElementById('navbtn');
	navSlideOut.style.webkitClipPath = 'inset(0 100% 0 0)';
	navSlideOut.style.visibility = 'hidden';
	navOpenBtn.style.visibility = 'visible';
}