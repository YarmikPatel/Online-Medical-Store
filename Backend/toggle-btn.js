function toggleForm() {
    const formContainer = document.getElementById('form-container');
    const toggleButton = document.getElementById('toggle-button');

    if (formContainer.style.display === 'none' || formContainer.style.display === '') {
        formContainer.style.display = 'block';
        toggleButton.textContent = 'Hide Form';
    } else {
        formContainer.style.display = 'none';
        toggleButton.textContent = 'Show Form';
    }
}