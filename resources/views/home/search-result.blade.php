@extends('home.app')

@section('title', 'IENEWS - Search News')

@section('content')
<div class="search-results">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h2><i class="fas fa-search"></i> Hasil Pencarian untuk <span>{{ $query }}</span></h2>
                        <div class="row">
                            @if($posts->isEmpty())
                            <div class="col-md-12">
                                <p>Tidak ada yang ditemukan.</p>
                            </div>
                            @else
                            @foreach($posts as $post)
                            <div class="col-lg-4 mb-4">
                                <div class="sr-img">
                                    <img src="{{ asset('storage/img/' . $post->image) }}" class="img-fluid"
                                        alt="{{ $post->title }}">
                                </div>
                                <div class="sr-content">
                                    <a class="sr-title"
                                        href="{{ route('detail.post', $post->id) }}">{{ Str::limit($post->title, 35) }}</a>
                                    <a class="sr-date" href=""><i class="far fa-clock"></i>
                                        {{ $post->created_at->format('d-M-Y') }}</a>
                                    <p class="sr-detail">{{ Str::limit($post->content, 100) }} <a class="read-more"
                                            href="{{ route('detail.post', $post->id) }}">Baca Selengkapnya</a></p>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>

                        @if ($posts->total() > 9)
                        <div class="pagination">
                            <ul class="pagination-list">
                                {{-- Previous Page Link --}}
                                @if ($posts->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                                @else
                                <li class="page-item"><a href="{{ $posts->previousPageUrl() }}" class="page-link"
                                        rel="prev">&laquo;</a></li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($posts->links()->elements[0] as $page => $url)
                                @if ($page == $posts->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                @else
                                <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                                @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($posts->hasMorePages())
                                <li class="page-item"><a href="{{ $posts->nextPageUrl() }}" class="page-link"
                                        rel="next">&raquo;</a></li>
                                @else
                                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                                @endif
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection