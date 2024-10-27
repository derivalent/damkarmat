@extends('public.layout.main')

@section('content')
    <main>
        <div class="container mt-4">
            <h3 class="mb-4 text-center"><b>BERITA</b></h3>
            <div id="card-container-berita" class="row row-cols-1 row-cols-md-3 g-4"></div>
            <div class="d-flex justify-content-center mt-4">
                <ul id="pagination" class="pagination"></ul>
            </div>
        </div>
    </main>

{{-- @endsection


@section('scripts') --}}
    <script>
        // Data berita dari database
        var berita = @json($berita);

        // Mengubah data berita menjadi format yang sesuai
        var cards = berita.map(item => ({
            imageUrl: `{{ asset('storage/images_berita') }}/${item.gambar}`,
            title: item.judul,
            date: new Date(item.created_at).toLocaleDateString(), // Mengubah timestamp ke format tanggal
            link: `{{ url('/berita_isi_public') }}/${item.id}`,

            id: item.id // Menambahkan ID untuk sorting
        }));

        // Fungsi untuk mengurutkan berita berdasarkan ID terbesar di atas
        function sortPostsById(posts) {
            return posts.sort((a, b) => b.id - a.id);
        }

        // Fungsi untuk menampilkan card pada halaman tertentu
        function displayCards_berita(page) {
            var cardsPerPage = 9; // Jumlah kartu per halaman
            var startIndex = (page - 1) * cardsPerPage;
            var endIndex = Math.min(startIndex + cardsPerPage, cards.length);

            var cardContainer = document.getElementById('card-container-berita');
            cardContainer.innerHTML = '';

            // Mengurutkan postingan berdasarkan ID
            var sortedCards = sortPostsById(cards);

            for (var i = startIndex; i < endIndex; i++) {
                var cardData = sortedCards[i];
                var cardHtml = `
                <div class="col mb-2">
                    <div class="card h-100 text-center">
                        <div class="card-header bg-danger"></div>
                        <a href="${cardData.link}"><img src="${cardData.imageUrl}" class="card-img-top" alt="${cardData.title}" /></a>
                        <div class="card-body">
                            <a href="${cardData.link}"><h5 class="card-title">${cardData.title}</h5></a>
                            <p class="card-text">${cardData.date}</p>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" onclick="window.location.href = '${cardData.link}';">Detail</button>
                        </div>
                    </div>
                </div>
            `;
                cardContainer.innerHTML += cardHtml;
            }

            // Jika jumlah kartu lebih dari 9, tampilkan pagination
            if (cards.length > cardsPerPage) {
                displayPagination_berita(page);
            } else {
                document.getElementById('pagination').innerHTML = '';
            }
        }

        // Fungsi untuk menampilkan pagination pada card tampilan berita
        function displayPagination_berita(currentPage) {
            var pagination = document.getElementById('pagination');
            pagination.innerHTML = '';

            var cardsPerPage = 9; // Jumlah kartu per halaman
            var numPages = Math.ceil(cards.length / cardsPerPage);

            for (var i = 1; i <= numPages; i++) {
                var listItem = document.createElement('li');
                listItem.classList.add('page-item');
                if (i === currentPage) {
                    listItem.classList.add('active');
                }

                var link = document.createElement('a');
                link.classList.add('page-link');
                link.href = '#';
                link.textContent = i;
                link.onclick = function(event) {
                    event.preventDefault();
                    displayCards_berita(parseInt(this.textContent));
                };

                listItem.appendChild(link);
                pagination.appendChild(listItem);
            }
        }

        // Menampilkan halaman pertama saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            displayCards_berita(1);
        });
    </script>
@endsection
