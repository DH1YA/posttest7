// alert("Selamat Datang");
const chk = document.getElementById('chk');

chk.addEventListener('click', () => {
	document.body.classList.toggle('dark');
});

// INFO JS
const floating_btn = document.querySelector('.tbl_info');
const close_btn = document.querySelector('.close-btn');
const social_panel_container = document.querySelector('.info_container');

floating_btn.addEventListener('click', () => {
	social_panel_container.classList.toggle('visible')
});

close_btn.addEventListener('click', () => {
	social_panel_container.classList.remove('visible')
});

// login-regis
const registrasiButton = document.getElementById('registrasi');
const loginButton = document.getElementById('login');
const container = document.getElementById('container-login');

registrasiButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

loginButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
// login-regis