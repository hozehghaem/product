@extends('master')

@section('style')
    <style>
        .media-container {
            margin: 30px auto;
            max-width: 640px;
            position: relative;
        }
        .media-container h4 {
            text-align: center;
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #333;
        }
        .media-container img, video, audio, iframe {
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        }
        .video-cover {
            position: relative;
            cursor: pointer;
            overflow: hidden;
            border-radius: 12px;
        }
        .video-cover img {
            display: block;
            transition: transform 0.3s ease;
        }
        .video-cover:hover img {
            transform: scale(1.05);
        }

        .video-cover .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 80px;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .video-cover .play-button::before {
            content: '';
            border-style: solid;
            border-width: 15px 0 15px 25px;
            border-color: transparent transparent transparent white;
            display: inline-block;
            position: relative;
            left: 0px; /* این برای center کردن مثلث */
        }

        .video-cover:hover .play-button {
            transform: translate(-50%, -50%) scale(1.1);
            background: rgba(0,0,0,0.8);
        }
        .video-player {
            display: none;
            opacity: 0;
            transition: opacity 0.5s ease;
        }
        .video-player.show {
            display: block;
            opacity: 1;
        }
        .pdf-viewer {
            border: 1px solid #ccc;
        }
        .download-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #215c54;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            transition: background 0.3s ease;
        }
        .download-btn:hover {
            background: #1c4540;
            text-decoration: none;
            color: white;

        }
    </style>
@endsection

@section('main')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>{{ $posts->title }}</h2>
            </div>
        </div>
    </div>

    <div class="service-details">
        <div class="container my-5" style="border: 1px solid rgba(69,69,69,0.2); border-radius: 16px; box-shadow: 0 4px 32px 0 rgba(0,0,0,0.1);">
            <div class="container mt-5">
                <div class="card-image m-3 text-center">

                    {{-- تصویر اصلی همیشه نمایش داده می‌شود --}}
                    <img src="{{ asset($posts->image) }}" alt="{{ $posts->title }}" class="single-image" style="width:100%; border-radius:12px; box-shadow: 0 4px 16px rgba(0,0,0,0.1);">

                    {{-- ویدئو --}}
                    @if($posts->file)
                        <div class="media-container">
                            <h4>ویدئو</h4>
                            <div class="video-cover" id="videoCover">
                                <img src="{{ asset($posts->image) }}" alt="{{ $posts->title }}">
                                <div class="play-button">▶</div>
                            </div>
                            <video id="videoPlayer" class="video-player" controls poster="{{ asset($posts->image) }}">
                                <source src="{{ asset($posts->file) }}" type="video/mp4">
                                مرورگر شما از ویدئو پشتیبانی نمی‌کند.
                            </video>
                        </div>
                    @endif

                    {{-- فایل صوتی --}}
                    @if($posts->voice)
                        <div class="media-container">
                            <h4>فایل صوتی</h4>
                            <audio controls>
                                <source src="{{ asset($posts->voice) }}" type="audio/mpeg">
                                مرورگر شما از فایل صوتی پشتیبانی نمی‌کند.
                            </audio>
                        </div>
                    @endif

                    {{-- فایل PDF --}}
                    @if($posts->pdf)
                        <div class="media-container">
                            <h4>فایل PDF</h4>
                            <iframe src="{{ asset($posts->pdf) }}" class="pdf-viewer" height="500"></iframe>
                            <p>
                                <a href="{{ asset($posts->pdf) }}" target="_blank" class="download-btn">
                                    <i class="fas fa-file-pdf"></i> دانلود PDF
                                </a>
                            </p>
                        </div>
                    @endif

                    {{-- آپارات --}}
                    @if($posts->aparat)
                        <div class="media-container">
                            <h4>ویدئوی آپارات</h4>
                            {!! $posts->aparat !!}
                        </div>
                    @endif

                </div>

                <div class="service-details-content">
                    <p>{!! $posts->description !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @if($posts->file)
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const cover = document.getElementById('videoCover');
                const video = document.getElementById('videoPlayer');

                if (cover && video) {
                    cover.addEventListener('click', function() {
                        cover.style.display = 'none';
                        video.classList.add('show');
                        video.play();
                    });
                }
            });
        </script>
    @endif
@endsection
