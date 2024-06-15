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
                                        href="{{ route('detail.post', $post->id) }}">{{ $post->title }}</a>
                                    <a class="sr-date" href=""><i class="far fa-clock"></i>
                                        {{ $post->created_at->format('d-M-Y') }}</a>
                                    <p class="sr-detail">{{ Str::limit($post->content, 100) }} <a class="read-more"
                                            href="{{ route('detail.post', $post->id) }}">Baca Selengkapnya</a></p>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-12 text-center mt-3">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection