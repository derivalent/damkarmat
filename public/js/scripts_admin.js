/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    //
// Scripts
//

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

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

