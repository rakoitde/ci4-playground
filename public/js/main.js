'use strict';

/**
 * Initialize elements as popover
 */
const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

/**
 * Initialize elements as alerts
 */
const alertList = document.querySelectorAll('.alert')
const alerts = [...alertList].map(element => new bootstrap.Alert(element))

/**
 * Toogle sidebar
 */
const sidebarToggler = document.getElementById('sidebar-toggler'); 
const sidebar = document.getElementById('sidebar');  
const sidebarDrop = document.getElementById('sidebar-drop'); 
const sidebarClose = document.getElementById('sidebar-close'); 

/**
 * Toggle sidebar on load or resize
 */
window.addEventListener('load', function(){ responsiveSidebar(); });
window.addEventListener('resize', function(){ responsiveSidebar(); });


function responsiveSidebar() {
	let w = window.innerWidth;
	if(w >= 1200) {
	    sidebar.classList.remove('sidebar-hidden');
	    sidebar.classList.add('sidebar-visible');    
	} else {
	    sidebar.classList.remove('sidebar-visible');
	    sidebar.classList.add('sidebar-hidden');
	}
};

sidebarToggler.addEventListener('click', () => {
	if (sidebar.classList.contains('sidebar-visible')) {
		sidebar.classList.remove('sidebar-visible');
		sidebar.classList.add('sidebar-hidden');
		
	} else {
		sidebar.classList.remove('sidebar-hidden');
		sidebar.classList.add('sidebar-visible');
	}
});


sidebarClose.addEventListener('click', (e) => {
	e.preventDefault();
	sidebarToggler.click();
});

sidebarDrop.addEventListener('click', (e) => {
	sidebarToggler.click();
});


/**
 * Toggle search frame on small devices
 */
const searchFrameToggler = document.querySelector('.search-frame-toggler');
const searchFrame = document.querySelector('.search-frame');

searchFrameToggler.addEventListener('click', () => {

	searchFrame.classList.toggle('is-visible');
	
	let searchMobileTriggerIcon = document.querySelector('.search-frame-toggler-icon');
	
	if(searchMobileTriggerIcon.classList.contains('bi-search')) {
		searchMobileTriggerIcon.classList.remove('bi-search');
		searchMobileTriggerIcon.classList.add('bi-x-lg');
	} else {
		searchMobileTriggerIcon.classList.remove('bi-x-lg');
		searchMobileTriggerIcon.classList.add('bi-search');
	}
	
});


