$( document ).ready(function() {
    Fancybox.bind("[data-fancybox]", {});
	
	if (document.querySelector('.pagination') !== null) {
		let links = document.querySelectorAll('.pagination > a');
			
		let paginationId = parseInt(document.querySelector('.pagination').id) - 1;
			
		links[paginationId].classList.add('active');
	};
});

