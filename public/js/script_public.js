//js berita//
// Data card berita yang akan ditampilkan
var cards = [{
        imageUrl: 'images/logo_damkar_resize.png',
        title: 'Penginapan',
        description: 'Penginapan yang disediakan pada hotel aston terbagi sesuai tipe kamar dan terdapat tipe tempat tidur yang bisa dipilih oleh pemesan.',
        link: 'penginapan.php'
    },
    {
        imageUrl: 'images/logo_kab_banyuwangi.png',
        title: 'Sewa Ruangan',
        description: 'Ruangan dapat disewa pada hotel aston seperti Balriim untuk kegiatan, terdadpat area kolah ataupun beberapa tempat lainnya yang ocok digunakan untuk kegiatan acara.',
        link: 'sewaruangan.php'
    },
    {
        imageUrl: 'images/logo_damkar.png',
        title: 'Restoran',
        description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
        link: 'restoran.php'
    },
    {
        imageUrl: 'images/logo_damkar.png',
        title: 'Restoran',
        description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
        link: 'restoran.php'
    },
    {
        imageUrl: 'images/logo_damkar.png',
        title: 'Restoran',
        description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
        link: 'restoran.php'
    },
    {
        imageUrl: 'images/logo_damkar.png',
        title: 'Restoran',
        description: 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.',
        link: 'restoran.php'
    }

];

// Fungsi untuk menampilkan card pada halaman tertentu
function displayCards(page) {
    var startIndex = (page - 1) * 3;
    var endIndex = Math.min(startIndex + 3, cards.length);

    var cardContainer = document.getElementById('card-container');
    cardContainer.innerHTML = '';

    for (var i = startIndex; i < endIndex; i++) {
        var cardData = cards[i];
        var cardHtml = `
    <div class="col mb-2">
        <div class="card h-100 text-center ">
            <div class="card-header bg-danger"></div>
           <a href="${cardData.link}"><img src="${cardData.imageUrl}" class="card-img-top" alt="${cardData.title}" /></a>
            <div class="card-body">
               <a href="${cardData.link}"><h5 class="card-title">${cardData.title}</h5></a>
                <p class="card-text">${cardData.description}</p>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" onclick="window.location.href = '${cardData.link}';">Detail</button>
            </div>
        </div>
    </div>
`;
        cardContainer.innerHTML += cardHtml;
    }
}

// Fungsi untuk menampilkan pagination//
function displayPagination() {
    var pagination = document.getElementById('pagination').querySelector('ul');
    pagination.innerHTML = '';

    var numPages = Math.ceil(cards.length / 3);
    for (var i = 1; i <= numPages; i++) {
        var listItem = document.createElement('li');
        listItem.classList.add('page-item');

        var link = document.createElement('a');
        link.classList.add('page-link');
        link.href = '#';
        link.textContent = i;
        link.onclick = function() {
            displayCards(parseInt(this.textContent));
            return false; // Mencegah perilaku default
        };

        listItem.appendChild(link);
        pagination.appendChild(listItem);
    }
}

// Menampilkan halaman pertama saat halaman dimuat
displayCards(1);
displayPagination();
//js berita akhir//


//js chart bulanan//
document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('myAreaChart').getContext('2d');
    const myAreaChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
                'September', 'Oktober', 'November', 'Desember'
            ],
            datasets: [{
                    label: 'Kejadian Kebakaran',
                    data: [12, 19, 3, 5, 2, 3, 10, 15, 20, 25, 30,
                        35
                    ], // Ganti dengan data nyata
                    borderColor: 'rgba(255, 0, 0, 1)',
                    backgroundColor: 'rgba(255, 0, 0, 0.2)',
                    fill: true
                },
                {
                    label: 'Kejadian Non Kebakaran',
                    data: [7, 11, 5, 8, 13, 17, 14, 18, 22, 28, 32,
                        40
                    ], // Ganti dengan data nyata
                    borderColor: 'rgba(0, 0, 255, 1)',
                    backgroundColor: 'rgba(0, 0, 255, 0.2)',
                    fill: true
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Grafik Kejadian Kebakaran dan Non Kebakaran Tahun ini'
                }
            },
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
//js chart bulanan akhir//


// Data untuk chart bar atau batangan//
const labels = ['2023', '2024', '2025', '2026', '2027'];
const data = {
    labels: labels,
    datasets: [{
            label: 'Kejadian Kebakaran',
            backgroundColor: 'rgba(255, 0, 0, 0.2)',
            borderColor: 'rgba(255, 0, 0, 1)',
            borderWidth: 1,
            data: [30, 45, 60, 40, 50], // Gantilah dengan data yang sesuai
        },
        {
            label: 'Kejadian Penyelamatan',
            backgroundColor: 'rgba(0, 0, 255, 0.2)',
            borderColor: 'rgba(0, 0, 255, 1)',
            borderWidth: 1,
            data: [20, 35, 55, 30, 40], // Gantilah dengan data yang sesuai
        }
    ]
};

// Konfigurasi chart
const config = {
    type: 'bar',
    data: data,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Statistik Kejadian Kebakaran dan Penyelamatan per Tahun'
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    },
};

// Render chart
window.onload = function() {
    const ctx = document.getElementById('myBarChart').getContext('2d');
    new Chart(ctx, config);
};
// Data untuk chart bar atau batangan akhir//
