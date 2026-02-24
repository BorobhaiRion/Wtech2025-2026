document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("studentForm");

    form.addEventListener("submit", function (event) {

        event.preventDefault(); // stop page reload

        const formData = new FormData(form);

        // Convert all form data into object
        const data = Object.fromEntries(formData.entries());

        // Checkbox handling (important)
        data.terms = form.querySelector('input[name="terms"]').checked;

        // File handling
        const fileInput = form.querySelector('input[name="file"]');
        data.file = fileInput.files.length > 0 ? fileInput.files[0].name : null;

        console.log(data);

        alert("Form Submitted Successfully!");
    });

});