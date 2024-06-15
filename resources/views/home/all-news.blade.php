@extends('home.app')

@section('title', 'IENEWS - All News')

@section('content')
<!-- All News Start -->
<div class="all-news">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h2><i class="fas fa-align-justify"></i> Semua Berita</h2>
                        <div class="row">
                            @foreach($allPosts as $post)
                            <div class="col-lg-4 mb-4">
                                <div class="mn-img">
                                    <img src="{{ asset('storage/img/' . $post->image) }}" class="img-fluid"
                                        alt="{{ $post->title }}" />
                                </div>
                                <div class="mn-content">
                                    <a class="mn-title"
                                        href="{{ route('detail.post', $post->id) }}">{{ Str::limit($post->title, 35) }}</a>
                                    <a class="mn-date" href=""><i class="far fa-clock"></i>
                                        {{ $post->created_at->format('d-M-Y') }}</a>
                                    <p class="mn-detail">{{ Str::limit($post->content, 100) }} <a
                                            href="{{ route('detail.post', $post->id) }}">Baca Selengkapnya</a></p>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        @if ($allPosts->total() > 9)
                        <div class="pagination">
                            <ul class="pagination-list">
                                {{-- Previous Page Link --}}
                                @if ($allPosts->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                                @else
                                <li class="page-item"><a href="{{ $allPosts->previousPageUrl() }}" class="page-link"
                                        rel="prev">&laquo;</a></li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($allPosts->links()->elements[0] as $page => $url)
                                @if ($page == $allPosts->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                @else
                                <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                                @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($allPosts->hasMorePages())
                                <li class="page-item"><a href="{{ $allPosts->nextPageUrl() }}" class="page-link"
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
<!-- All News End -->
@endsection