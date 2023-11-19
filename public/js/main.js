document.addEventListener("DOMContentLoaded", function() {
    const showMoreBtns = document.querySelectorAll('.show-more-btn');

    showMoreBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const additionalInfo = this.parentElement.querySelector('.additional-info');
            
            if (additionalInfo) {
                additionalInfo.classList.toggle('hidden');
            }
        });
    });
});
