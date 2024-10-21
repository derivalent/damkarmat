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
@endsection
