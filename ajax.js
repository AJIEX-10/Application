document.addEventListener("DOMContentLoaded", () => {

    const ajaxSend = async (formData) => {
        const response = await fetch("signup.php", {
            method: "POST",
            body: formData
        });
        if (!response.ok) {
            throw new Error(`Ошибка по адресу ${url}, статус ошибки ${response.status}`);
        }
        return await response.text();
    };

    if (document.getElementsByTagName("form")) {
        const forms = document.getElementsByTagName("form");

        [].forEach.call(forms, form => {
            form.addEventListener("submit", function (e) {
                e.preventDefault();
                const formData = new FormData(this);
                
                ajaxSend(formData)
                    .then((response) => {
                        console.log(response);
                        form.reset();
                    })
                    .catch((err) => console.error(err))
            });
        });
    }

});