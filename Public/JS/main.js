let navbar = document.querySelector('.navbar');

// Toggle navbar khi nhấn nút menu
document.querySelector('#menu-btn').onclick = () => {
    navbar.classList.toggle('active');
}

// Đóng navbar khi cuộn trang
window.onscroll = () => {
    navbar.classList.remove('active');
}

// Lấy tất cả các slide
let slides = document.querySelectorAll('.home .slides-container .slide');
let index = 0;

// Hiển thị slide đầu tiên khi trang tải
slides[index].classList.add('active');

// Hàm chuyển slide tiếp theo
function next() {
    slides[index].classList.remove('active'); // Ẩn slide hiện tại
    index = (index + 1) % slides.length; // Chuyển sang slide tiếp theo (vòng lặp)
    slides[index].classList.add('active'); // Hiển thị slide tiếp theo
}

// Hàm chuyển slide trước
function prev() {
    slides[index].classList.remove('active'); // Ẩn slide hiện tại
    index = (index - 1 + slides.length) % slides.length; // Chuyển sang slide trước (vòng lặp)
    slides[index].classList.add('active'); // Hiển thị slide trước
}

// Gắn sự kiện cho các nút next và prev
document.querySelector('#next-slide').onclick = next;
document.querySelector('#prev-slide').onclick = prev;
