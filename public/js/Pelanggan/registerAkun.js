function togglePassword(icon) {
    const input = icon.parentElement.querySelector('input.password-input');
    if (input.type === "password") {
        input.type = "text";
        icon.querySelector('img').src = "<?= base_url('/images/eye/eye-off.png') ?>";
    } else {
        input.type = "password";
        icon.querySelector('img').src = "<?= base_url('/images/eye/eye-on.png') ?>";
    }
}
