{{-- @extends('public.layout.main')
@section('content')
<main class="container">
    <div class="row">
        <div class="col-md-12 py-3 mt-4">
            <h2 class="mb-5 text-center"><b>DOKUMENTASI DAMKARMAT BANYUWANGI</b></h2>
            <div class="row row-cols-1 row-cols-md-3 g-4" id="card-container-dokumentasi">
                <!-- Cards will be inserted here by JavaScript -->
            </div>
            <nav aria-label="Page navigation" class="mt-3 mb-3">
                <ul class="pagination justify-content-center" id="pagination-dokumentasi">
                    <!-- Pagination will be inserted here by JavaScript -->
                </ul>
            </nav>
        </div>
    </div>
</main>
@endsection --}}

@extends('public.layout.main')
@section('content')
<main class="container">
    <div class="row">
        <div class="col-md-12 py-3 mt-4">
            <h2 class="mb-5 text-center"><b>DOKUMENTASI DAMKARMAT BANYUWANGI</b></h2>
            <div class="row row-cols-1 row-cols-md-3 g-4" id="card-container-dokumentasi">
                <!-- Cards will be inserted here by JavaScript -->
            </div>
            <nav aria-label="Page navigation" class="mt-3 mb-3">
                <ul class="pagination justify-content-center" id="pagination-dokumentasi">
                    <!-- Pagination will be inserted here by JavaScript -->
                </ul>
            </nav>
        </div>
    </div>
</main>

<script>
// Mengambil data dari Blade ke JavaScript
const dataDokumentasi = @json($dokumentasi);

// Mengatur jumlah kartu per halaman
const cardsPerPageDokumentasi = 6;
let currentPageDokumentasi = 1;

// Function to render cards based on current page
function renderCardsDokumentasi(page) {
    const cardContainer = document.getElementById('card-container-dokumentasi');
    cardContainer.innerHTML = '';
    const start = (page - 1) * cardsPerPageDokumentasi;
    const end = start + cardsPerPageDokumentasi;
    const pageData = dataDokumentasi.slice(start, end);

    pageData.forEach(item => {
        const card = `
        <div class="col">
            <div class="card profile-card box-shadow">
                <img src="/storage/${item.gambar}" class="card-img-top" alt="${item.kegiatan}">
                <div class="card-body">
                    <p class="card-text">${item.kegiatan}</p>
                </div>
            </div>
        </div>`;
        cardContainer.innerHTML += card;
    });
}

// Function to render pagination
function renderPaginationDokumentasi() {
    const pagination = document.getElementById('pagination-dokumentasi');
    pagination.innerHTML = '';
    const totalPages = Math.ceil(dataDokumentasi.length / cardsPerPageDokumentasi);

    const prevButton = `<li class="page-item ${currentPageDokumentasi === 1 ? 'disabled' : ''}">
                        <a class="page-link" href="#" aria-label="Previous" onclick="goToPageDokumentasi(${currentPageDokumentasi - 1})">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>`;
    pagination.innerHTML += prevButton;

    for (let i = 1; i <= totalPages; i++) {
        const pageButton = `<li class="page-item ${i === currentPageDokumentasi ? 'active' : ''}">
                            <a class="page-link" href="#" onclick="goToPageDokumentasi(${i})">${i}</a>
                        </li>`;
        pagination.innerHTML += pageButton;
    }

    const nextButton = `<li class="page-item ${currentPageDokumentasi === totalPages ? 'disabled' : ''}">
                        <a class="page-link" href="#" aria-label="Next" onclick="goToPageDokumentasi(${currentPageDokumentasi + 1})">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>`;
    pagination.innerHTML += nextButton;
}

// Function to handle page change
function goToPageDokumentasi(page) {
    currentPageDokumentasi = page;
    renderCardsDokumentasi(page);
    renderPaginationDokumentasi();
}

// Initial render
document.addEventListener('DOMContentLoaded', () => {
    dataDokumentasi.sort((a, b) => b.id - a.id); // Sort by ID to display recent entries
    renderCardsDokumentasi(currentPageDokumentasi);
    renderPaginationDokumentasi();
});
</script>
@endsection
