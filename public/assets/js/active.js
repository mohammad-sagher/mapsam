function toggleForm(formId) {
    const form = document.getElementById(formId);
    if (form.classList.contains('hidden')) {
        form.classList.remove('hidden');
        form.classList.add('visible');
    } else {
        form.classList.remove('visible');
        form.classList.add('hidden');
    }
}
