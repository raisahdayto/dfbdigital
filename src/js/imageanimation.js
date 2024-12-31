document.addEventListener("DOMContentLoaded", function () {
    const aboutImages = document.querySelectorAll(".aboutus-image-container");

    // Assign alternating classes
    aboutImages.forEach((image, index) => {
        if (index % 2 === 0) {
            image.classList.add("slide-left"); // Even-indexed: slide-left
        } else {
            image.classList.add("slide-right"); // Odd-indexed: slide-right
        }
    });

    // Intersection Observer for triggering animations
    const observer = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show"); // Add 'show' class
                    observer.unobserve(entry.target); // Stop observing after animation
                }
            });
        },
        { threshold: 0.2 } // Trigger when 20% of the image is visible
    );

    aboutImages.forEach((image) => {
        observer.observe(image);
    });
});