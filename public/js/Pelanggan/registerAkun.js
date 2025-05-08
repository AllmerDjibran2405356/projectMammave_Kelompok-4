function togglePassword(icon) {
    const passwordInput = icon.previousElementSibling; // Ambil input sebelum gambar

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.src = "/images/eye/eye-off.png"; 
    } else {
        passwordInput.type = "password";
        icon.src = "/images/eye/eye-on.png"; 
    }
}