// Function to toggle coupon code visibility and copy button
function toggleCouponCode(couponId) {
    const codeElement = document.getElementById(`codeIndex${couponId}`);
    const copyButton = document.getElementById(`copyBtn${couponId}`);

    if (codeElement.style.display === 'none') {
        codeElement.style.display = 'inline';
        copyButton.classList.remove('d-none');

        // Update the click count via AJAX when showing the code
        updateClickCount(couponId);
    } else {
        codeElement.style.display = 'none';
        copyButton.classList.add('d-none');
    }
}

// Function to update click count via AJAX
function updateClickCount(couponId) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '{{ route("update.clicks") }}', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                console.log('Click count updated successfully.');
            } else {
                console.error('Failed to update click count. Status: ' + xhr.status);
            }
        }
    };

    xhr.send(JSON.stringify({ coupon_id: couponId }));
}

// Function to copy coupon code to clipboard
function copyCouponCode(couponId) {
    const codeElement = document.getElementById(`codeIndex${couponId}`);
    const code = codeElement.innerText.trim();

    navigator.clipboard.writeText(code)
        .then(() => {
            // Show success message
            const copyMessage = document.getElementById(`copyConfirmation${couponId}`);
            copyMessage.classList.remove('d-none');
            setTimeout(() => {
                copyMessage.classList.add('d-none');
            }, 1500);
        })
        .catch(err => {
            console.error('Failed to copy: ', err);
        });
}

// Ensure the code is hidden again on page reload
document.addEventListener('DOMContentLoaded', function() {
    const couponId = '{{ $coupon->id }}';  // Pass the coupon ID dynamically
    const codeElement = document.getElementById(`codeIndex${couponId}`);
    const copyButton = document.getElementById(`copyBtn${couponId}`);

    codeElement.style.display = 'none';
    copyButton.classList.add('d-none');
});

