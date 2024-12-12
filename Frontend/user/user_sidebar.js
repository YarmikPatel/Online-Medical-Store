const toggleBtn = document.getElementById('toggle-btn');
const sidebar = document.getElementById('sidebar');
const content = document.getElementById('content');

toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('hidden');
    content.classList.toggle('shifted');
});
