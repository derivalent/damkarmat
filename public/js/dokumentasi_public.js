
// // Sample data array pada tampilan dokumentasi//
// const dataDokumentasi = [{
//     id: 9,
//     img: 'images/damkarbwi.jpg',
//     text: 'Gambar Markas Komando Damkar Banyuwangi'
// },
// {
//     id: 8,
//     img: 'images/damkarbwi.jpg',
//     text: 'Innovative solutions for modern problems'
// },
// {
//     id: 7,
//     img: 'images/damkarbwi.jpg',
//     text: 'Empowering communities through technology'
// },
// {
//     id: 6,
//     img: 'images/damkarbwi.jpg',
//     text: 'Leading the charge in renewable energy'
// },
// {
//     id: 5,
//     img: 'images/damkarbwi.jpg',
//     text: 'Innovative solutions for modern problems'
// },
// {
//     id: 4,
//     img: 'images/damkarbwi.jpg',
//     text: 'Empowering communities through technology'
// },
// {
//     id: 3,
//     img: 'images/damkarbwi.jpg',
//     text: 'Building nex-gen energy tech product at Company'
// },
// {
//     id: 2,
//     img: 'images/damkarbwi.jpg',
//     text: 'Innovative solutions for modern problems'
// },
// {
//     id: 1,
//     img: 'images/damkarbwi.jpg',
//     text: 'Empowering communities through technology'
// },
// ];

// const cardsPerPageDokumentasi = 6;
// let currentPageDokumentasi = 1;

// // Function to render cards based on current page
// function renderCardsDokumentasi(page) {
// const cardContainer = document.getElementById('card-container-dokumentasi');
// cardContainer.innerHTML = '';
// const start = (page - 1) * cardsPerPageDokumentasi;
// const end = start + cardsPerPageDokumentasi;
// const pageData = dataDokumentasi.slice(start, end);
// pageData.forEach(item => {
//     const card = `
//     <div class="col">
//         <div class="card profile-card box-shadow">
//             <img src="${item.img}" class="card-img-top" alt="Profile Image">
//             <div class="card-body">
//                 <p class="card-text">${item.text}</p>
//             </div>
//         </div>
//     </div>
// `;
//     cardContainer.innerHTML += card;
// });
// }

// // Function to render pagination
// function renderPaginationDokumentasi() {
// const pagination = document.getElementById('pagination-dokumentasi');
// pagination.innerHTML = '';
// const totalPages = Math.ceil(dataDokumentasi.length / cardsPerPageDokumentasi);

// const prevButton = `<li class="page-item ${currentPageDokumentasi === 1 ? 'disabled' : ''}">
//                     <a class="page-link" href="#" aria-label="Previous" onclick="goToPageDokumentasi(${currentPageDokumentasi - 1})">
//                         <span aria-hidden="true">&laquo;</span>
//                     </a>
//                 </li>`;
// pagination.innerHTML += prevButton;

// for (let i = 1; i <= totalPages; i++) {
//     const pageButton = `<li class="page-item ${i === currentPageDokumentasi ? 'active' : ''}">
//                         <a class="page-link" href="#" onclick="goToPageDokumentasi(${i})">${i}</a>
//                     </li>`;
//     pagination.innerHTML += pageButton;
// }

// const nextButton = `<li class="page-item ${currentPageDokumentasi === totalPages ? 'disabled' : ''}">
//                     <a class="page-link" href="#" aria-label="Next" onclick="goToPageDokumentasi(${currentPageDokumentasi + 1})">
//                         <span aria-hidden="true">&raquo;</span>
//                     </a>
//                 </li>`;
// pagination.innerHTML += nextButton;
// }

// // Function to handle page change
// function goToPageDokumentasi(page) {
// currentPageDokumentasi = page;
// renderCardsDokumentasi(page);
// renderPaginationDokumentasi();
// }

// // Initial render
// document.addEventListener('DOMContentLoaded', () => {
// dataDokumentasi.sort((a, b) => b.id - a.id); // Sort by ID, assuming higher ID is more recent
// renderCardsDokumentasi(currentPageDokumentasi);
// renderPaginationDokumentasi();
// });
// // batas akhir tampilan dokumentasi//
