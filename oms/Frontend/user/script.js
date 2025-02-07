document.addEventListener('DOMContentLoaded', () => {
    const cardDetails = document.querySelector('.card-details');
    const paymentOptions = document.querySelectorAll('input[name="payment_method"]');

    paymentOptions.forEach(option => {
        option.addEventListener('change', (e) => {
            cardDetails.style.display = e.target.value === 'card' ? 'block' : 'none';
        });
    });
});
