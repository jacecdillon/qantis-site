document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('qantis-contact-form');
    if (!form) return;

    const responseDiv = document.getElementById('form-response');
    const submitBtn = form.querySelector('.btn-submit');

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        submitBtn.disabled = true;
        const originalBtnText = submitBtn.innerText;
        submitBtn.innerText = 'Versturen...';
        responseDiv.style.display = 'none';

        const formData = new FormData(form);
        formData.append('action', 'submit_contact_form');

        fetch(qantis_ajax.ajax_url, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            submitBtn.disabled = false;
            submitBtn.innerText = originalBtnText;
            responseDiv.style.display = 'block';

            if (data.success) {
                responseDiv.style.color = '#28a745';
                responseDiv.innerText = data.data;
                form.reset();
            } else {
                responseDiv.style.color = '#dc3545';
                responseDiv.innerText = data.data;
            }
        })
        .catch(error => {
            submitBtn.disabled = false;
            submitBtn.innerText = originalBtnText;
            responseDiv.style.display = 'block';
            responseDiv.style.color = '#dc3545';
            responseDiv.innerText = 'Er is iets misgegaan. Probeer het later nog eens.';
        });
    });
});