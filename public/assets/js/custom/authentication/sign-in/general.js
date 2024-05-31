"use strict";
var KTSigninGeneral = (function () {
    var t, e, i;
    return {
        init: function () {
            (t = document.querySelector("#kt_sign_in_form")),
                (e = document.querySelector("#kt_sign_in_submit")),
                (i = FormValidation.formValidation(t, {
                    fields: {
                        username: {
                            validators: {
                                notEmpty: {
                                    message: "Username is required",
                                },
                            },
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: "The password is required",
                                },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                        }),
                    },
                })),
                e.addEventListener("click", function (event) {
                    event.preventDefault();
                    i.validate().then(function (isValid) {
                        if (isValid === "Valid") {
                            e.setAttribute("data-kt-indicator", "on");
                            e.disabled = true;

                            // Prepare form data
                            var formData = new FormData(t);

                            // Get backend URL from form action attribute
                            var backendURL = t.getAttribute('action');

                            // Send POST request to backend
                            fetch(backendURL, {
                                method: 'POST',
                                body: formData
                            })
                                .then(function (response) {
                                    if (!response.ok) {
                                        throw new Error('Network response was not ok');
                                    }
                                    return response.json();
                                })
                                .then(function (data) {
                                    console.log(data); // Handle response data as needed
                                    e.removeAttribute("data-kt-indicator");
                                    e.disabled = false;
                                    Swal.fire({
                                        text: "You have successfully logged in!",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary",
                                        },
                                    }).then(function (result) {
                                        if (result.isConfirmed) {
                                            // Redirect to new location
                                            window.location.href = t.getAttribute('data-kt-redirect-url');
                                        }
                                    });
                                })
                                .catch(function (error) {
                                    console.error('There has been a problem with your fetch operation:', error);
                                    Swal.fire({
                                        text: "Sorry, an error occurred while processing your request.",
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary",
                                        },
                                        scrollbarPadding: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false
                                    });
                                    e.removeAttribute("data-kt-indicator");
                                    e.disabled = false;
                                });
                        } else {
                            Swal.fire({
                                text: "Sorry, looks like there are some errors detected, please try again.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                                scrollbarPadding: false,
                                allowOutsideClick: false,
                                allowEscapeKey: false
                            });
                        }
                    });
                });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});
