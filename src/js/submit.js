document.addEventListener("DOMContentLoaded", function () {
    const auditForm = document.getElementById("detailsForm");
    const contactForm = document.getElementById("contactForm");

    const submitAuditButton = document.getElementById("submitAudit");
    const submitContactButton = document.getElementById("submitContact");

    // Response Modal Elements
    const responseModal = new bootstrap.Modal(document.getElementById("responseModal"), { backdrop: "static" });
    const responseModalLabel = document.getElementById("responseModalLabel");
    const responseIconContainer = document.querySelector(".response-icon");
    const responseMessage = document.getElementById("responseMessage");

    // Custom SVGs for success and error
    const successSVG = `
        <svg width="120px" height="120px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="24" height="24" fill="white"></rect> <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM15.7071 9.29289C16.0976 9.68342 16.0976 10.3166 15.7071 10.7071L12.0243 14.3899C11.4586 14.9556 10.5414 14.9556 9.97568 14.3899L8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929C8.68342 10.9024 9.31658 10.9024 9.70711 11.2929L11 12.5858L14.2929 9.29289C14.6834 8.90237 15.3166 8.90237 15.7071 9.29289Z" fill="#001DFF"></path> </g></svg>
    `;

    const errorSVG = `
        <svg width="120px" height="120px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke=""><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10zm-1.5-5.009c0-.867.659-1.491 1.491-1.491.85 0 1.509.624 1.509 1.491 0 .867-.659 1.509-1.509 1.509-.832 0-1.491-.642-1.491-1.509zM11.172 6a.5.5 0 0 0-.499.522l.306 7a.5.5 0 0 0 .5.478h1.043a.5.5 0 0 0 .5-.478l.305-7a.5.5 0 0 0-.5-.522h-1.655z" fill="#001DFF"></path></g></svg>
    `;

    // Function to show the response modal
    function showResponseModal(title, message, iconSVG) {
        responseModalLabel.textContent = title;
        responseMessage.textContent = message;
        responseIconContainer.innerHTML = iconSVG;
        responseModal.show();

        // Automatically close the modal after 3 seconds
        setTimeout(() => {
            responseModal.hide();
            removeBackdrop();
        }, 3000);
    }

    // Function to remove lingering backdrops
    function removeBackdrop() {
        const backdrop = document.querySelector(".modal-backdrop");
        if (backdrop) {
            backdrop.remove();
        }
    }

    // Validation functions
    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function validateContactNumber(number) {
        const contactRegex = /^\+63\d{10}$/; // Starts with +63 and contains 10 digits
        return contactRegex.test(number);
    }

    // Function to clear error messages
    function clearErrors(...ids) {
        ids.forEach((id) => {
            const element = document.getElementById(id);
            if (element) {
                element.textContent = "";
                element.style.display = "none";
            }
        });
    }

    // Function to show an error
    function showError(id, message) {
        const element = document.getElementById(id);
        if (element) {
            element.textContent = message;
            element.style.display = "block";
        }
    }

    // Prevent invalid characters and limit to 13 characters in the mobile number field
    function preventInvalidCharacters(field) {
        field.addEventListener("keypress", function (e) {
            const validChars = /^[0-9+]*$/;
            if (!validChars.test(e.key)) {
                e.preventDefault();
            }
        });

        field.addEventListener("input", function () {
            if (field.value.length > 13) {
                field.value = field.value.slice(0, 13);
            }
        });
    }

    // Function to validate the form
    function validateForm(form, formType) {
        let isValid = true;

        const formErrorId = formType === "audit" ? "formError" : "contactFormError";
        const emailErrorId = formType === "audit" ? "emailError" : "contactEmailError";
        const mobileErrorId = "mobileError"; // Same ID for both forms

        clearErrors(formErrorId, emailErrorId, mobileErrorId);

        const emailField = form.querySelector(`#${formType === "audit" ? "emailAddress" : "c-emailAddress"}`);
        const mobileField = formType === "audit" ? form.querySelector("#mobileNumber") : null;

        // Check required fields
        const requiredFields = form.querySelectorAll("[required]");
        requiredFields.forEach((field) => {
            if (field.value.trim() === "") {
                isValid = false;
            }
        });

        if (!isValid) {
            showError(formErrorId, "Fill out all required fields.");
        }

        // Validate email
        if (emailField && emailField.value.trim() !== "" && !validateEmail(emailField.value.trim())) {
            showError(emailErrorId, "Invalid email address.");
            isValid = false;
        }

        // Validate contact number
        if (mobileField && mobileField.value.trim() !== "" && !validateContactNumber(mobileField.value.trim())) {
            showError(mobileErrorId, "Invalid mobile number. Must start with +63.");
            isValid = false;
        }

        return isValid;
    }

    // Function to handle form submission
    function handleFormSubmit(form, formType) {
        if (!validateForm(form, formType)) {
            return;
        }

        const formData = new FormData(form);

        fetch("./data/submit.php", {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === "success") {
                    const modal = bootstrap.Modal.getInstance(form.closest(".modal"));
                    modal.hide();
                    removeBackdrop();

                    showResponseModal(
                        formType === "audit" ? "Request Sent" : "Inquiry Sent",
                        data.message,
                        successSVG
                    );

                    form.reset();
                } else {
                    const formErrorId = formType === "audit" ? "formError" : "contactFormError";
                    showError(formErrorId, data.message || "An error occurred.");
                }
            })
            .catch((error) => {
                console.error("Error:", error);
                showResponseModal(
                    "Error",
                    "An unexpected error occurred. Please try again later.",
                    errorSVG
                );
            });
    }

    // Real-time validation for email and mobile number fields
    const emailFields = document.querySelectorAll("#emailAddress, #c-emailAddress");
    emailFields.forEach((emailField) =>
        emailField.addEventListener("blur", function () {
            const errorId = emailField.id === "emailAddress" ? "emailError" : "contactEmailError";
            if (emailField.value.trim() !== "" && !validateEmail(emailField.value.trim())) {
                showError(errorId, "Invalid email address.");
            } else {
                clearErrors(errorId);
            }
        })
    );

    const mobileFields = document.querySelectorAll("#mobileNumber");
    mobileFields.forEach((mobileField) => {
        mobileField.addEventListener("blur", function () {
            if (mobileField.value.trim() !== "" && !validateContactNumber(mobileField.value.trim())) {
                showError("mobileError", "Invalid mobile number. Must start with +63.");
            } else {
                clearErrors("mobileError");
            }
        });

        preventInvalidCharacters(mobileField);
    });

    // Add click event listener for the Audit form
    if (submitAuditButton) {
        submitAuditButton.addEventListener("click", function () {
            handleFormSubmit(auditForm, "audit");
        });
    }

    // Add click event listener for the Contact form
    if (submitContactButton) {
        submitContactButton.addEventListener("click", function () {
            handleFormSubmit(contactForm, "contact");
        });
    }

    // Ensure backdrops are cleared when the response modal is closed
    document.getElementById("responseModal").addEventListener("hidden.bs.modal", function () {
        removeBackdrop();
    });
});
