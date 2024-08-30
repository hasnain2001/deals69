function copyCoupon(code) {
    navigator.clipboard.writeText(code)
        .then(() => {
            alert("Coupon code copied!");
        })
        .catch((error) => {
            console.error("Failed to copy: ", error);
        });
}

function openCouponInNewTab(url, couponId) {
    window.open(url, '_blank');
    var modal = new bootstrap.Modal(document.getElementById('codeModal' + couponId));
    modal.show();

    // Automatically close the modal after 5 seconds when hovered over
    setTimeout(function() {
        modal.hide();
    }, 5000); // 5000 milliseconds = 5 seconds
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const storeCarousel = document.getElementById('storeCarousel');
    const carousel = new bootstrap.Carousel(storeCarousel, {
        interval: 2000, // Set the interval between slides
        wrap: true       // Enable wrapping for infinite sliding
    });
});
</script>
<script>
const initSlider = () => {
const imageList = document.querySelector(".slider-wrapper .image-list");
const slideButtons = document.querySelectorAll(".slider-wrapper .slide-button");
const sliderScrollbar = document.querySelector(".container .slider-scrollbar");
const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar-thumb");
const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;

// Handle scrollbar thumb drag
scrollbarThumb.addEventListener("mousedown", (e) => {
    const startX = e.clientX;
    const thumbPosition = scrollbarThumb.offsetLeft;
    const maxThumbPosition = sliderScrollbar.getBoundingClientRect().width - scrollbarThumb.offsetWidth;

    // Update thumb position on mouse move
    const handleMouseMove = (e) => {
        const deltaX = e.clientX - startX;
        const newThumbPosition = thumbPosition + deltaX;

        // Ensure the scrollbar thumb stays within bounds
        const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
        const scrollPosition = (boundedPosition / maxThumbPosition) * maxScrollLeft;

        scrollbarThumb.style.left = `${boundedPosition}px`;
        imageList.scrollLeft = scrollPosition;
    }

    // Remove event listeners on mouse up
    const handleMouseUp = () => {
        document.removeEventListener("mousemove", handleMouseMove);
        document.removeEventListener("mouseup", handleMouseUp);
    }

    // Add event listeners for drag interaction
    document.addEventListener("mousemove", handleMouseMove);
    document.addEventListener("mouseup", handleMouseUp);
});

// Slide images according to the slide button clicks
slideButtons.forEach(button => {
    button.addEventListener("click", () => {
        const direction = button.id === "prev-slide" ? -1 : 1;
        const scrollAmount = imageList.clientWidth * direction;
        imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
    });
});

 // Show or hide slide buttons based on scroll position
const handleSlideButtons = () => {
    slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "flex";
    slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "flex";
}

// Update scrollbar thumb position based on image scroll
const updateScrollThumbPosition = () => {
    const scrollPosition = imageList.scrollLeft;
    const thumbPosition = (scrollPosition / maxScrollLeft) * (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);
    scrollbarThumb.style.left = `${thumbPosition}px`;
}

// Call these two functions when image list scrolls
imageList.addEventListener("scroll", () => {
    updateScrollThumbPosition();
    handleSlideButtons();
});
}

window.addEventListener("resize", initSlider);
window.addEventListener("load", initSlider);
</script>

<script>
function copyCoupon(code) {
    navigator.clipboard.writeText(code)
        .then(() => {
            alert("Coupon code copied!");
        })
        .catch((error) => {
            console.error("Failed to copy: ", error);
        });
}
</script>
<script>
// Get the button
let scrollUpBtn = document.getElementById("scrollUpBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    scrollUpBtn.style.display = "block";
} else {
    scrollUpBtn.style.display = "none";
}
}

// When the user clicks on the button, scroll to the top of the document
scrollUpBtn.onclick = function() {
document.body.scrollTop = 0;
document.documentElement.scrollTop = 0;
}

    function openCouponInNewTab(url, couponId) {
        window.open(url, '_blank');
        var modal = new bootstrap.Modal(document.getElementById('codeModal' + couponId));
        modal.show();
    }
