
const btn = document.getElementById('toggleForm');
const form = document.getElementById('filterForm');
btn.addEventListener('click', () => {
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
});
