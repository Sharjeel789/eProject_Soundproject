@extends('layout.dashboard')

@section('dashboard')
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css" />

    <!-- SweetAlert JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            @if ($id == 1)
                                <strong class="card-title">Music</strong>
                            @else
                                <strong class="card-title">Video</strong>
                            @endif

                            <a href="{{ route('dashboard.insertMedia', ['id' => $id]) }}" class="btn btn-primary">Create</a>
                        </div>
                        <div class="card-body">
                            <table class="table" id="mediaTable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">splash</th>
                                        <th scope="col">
                                            <strong class="card-title">
                                                @if ($id == 1)
                                                    <strong class="card-title">Music</strong>
                                                @else
                                                    <strong class="card-title">Video</strong>
                                                @endif

                                            </strong>
                                        </th>
                                        <th scope="col">type</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($media as $item)
                                        <tr data-media="{{ json_encode($item) }}">
                                            <th scope="row">{{ $item->id }}</th>
                                            <th><img class="img-fluid" src="{{ url($item->mediaPhoto) }}" width="40px" height="40px"
                                                    alt=""></th>
                                            <td>{{ $item->mediaName }}</td>
                                            <td>{{ $item->mediaType->Name }}</td>
                                            <td>
                                                <a href="{{ route('dashboard.editMedia', ['id' => $item->id, 'actionId' => $id]) }}"
                                                    class="btn btn-sm btn-primary edit-btn">edit</a>
                                                <a class="btn btn-sm btn-danger delete-btn text-white">delete</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-4">
                <div class="card-header">
                    <strong class="card-title">Media Play</strong>
                </div>
                <div class="card-body">
                    @if (isset($media) && count($media) > 0)
                        @foreach ($media as $item)
                            <audio controls>
                                <source src="{{ $item->mediaURL }}" type="{{$item->mediaType->Name}}/{{ $item->extension }}">
                                Your browser does not support the audio element.
                            </audio>
                        @endforeach
                    @else
                        <p>No media found.</p>
                    @endif
                </div>
            </div> --}}
                <div class="col-lg-4">
                    <div class="card-header">
                        <strong class="card-title">Media Play</strong>
                    </div>
                    <div class="card-body" id="mediaPlayer">
                        <p>Hello Saqib Saying please Select the media form table hahaha</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const mediaUrls = @json(trim($BaseUrl, '/'));

        document.addEventListener('DOMContentLoaded', function() {
            const mediaTable = document.getElementById('mediaTable');
            const mediaPlayer = document.getElementById('mediaPlayer');

            mediaTable.addEventListener('click', function(event) {
                const row = event.target.closest('tr');
                if (!row) return; // Not a row click
                const mediaData = row.dataset.media;
                if (!mediaData) return; // Data not available

                const media = JSON.parse(mediaData);
                mediaPlayer.innerHTML = ''; // Clear previous media player

                createMediaElement(media);
            });

            function createMediaElement(media) {
                let mediaElement;

                if (media.media_type.Name === 'audio') {
                    mediaElement = document.createElement('audio');
                    mediaElement.controls = true;
                    mediaElement.loop = false; // Set the loop attribute to false initially
                    mediaElement.innerHTML = `
                        <source src="${mediaUrls}/${media.mediaURL}" type="audio/${media.extension}">
                        Your browser does not support the audio element.
                    `;

                    // Add event listener to track whether the audio is playing or paused
                    mediaElement.addEventListener('play', () => isPlaying = true);
                    mediaElement.addEventListener('pause', () => isPlaying = false);

                    // Add event listener to update progress bar when audio time is changed
                    mediaElement.addEventListener('timeupdate', () => updateProgressBar(mediaElement));
                } else if (media.media_type.Name === 'video') {
                    mediaElement = document.createElement('video');
                    mediaElement.className = 'embed-responsive-item img-fluid';
                    mediaElement.controls = true;
                    mediaElement.loop = false; // Set the loop attribute to false initially
                    mediaElement.innerHTML = `
                        <source src="${mediaUrls}/${media.mediaURL}" type="video/${media.extension}">
                        Your browser does not support the video element.
                    `;
                }

                // Add event listener to the loop button
                const loopButton = document.createElement('button');
                loopButton.className = 'btn  btn-sm btn-secondary';
                loopButton.innerText = 'Loop';
                loopButton.addEventListener('click', function() {
                    mediaElement.loop = !mediaElement
                        .loop; // Toggle the loop attribute when the button is clicked
                });

                const skipButton = document.createElement('button');
                skipButton.className = 'ml-3 btn btn-sm btn-secondary'; // Add the "btn btn-secondary" class
                skipButton.innerText = 'Repeate';
                skipButton.addEventListener('click', function() {
                    // Skip 2 seconds of media playback
                    if (mediaElement.currentTime + 2 < mediaElement.duration) {
                        mediaElement.currentTime += 2;
                    } else {
                        // If the media is near the end, skip to the end
                        mediaElement.currentTime = mediaElement.duration;
                    }
                });

                // Append the media element, loop button, and skip button to the mediaPlayer div
                mediaPlayer.innerHTML = '';
                mediaPlayer.appendChild(mediaElement);
                mediaPlayer.appendChild(loopButton);
                mediaPlayer.appendChild(skipButton);
            }
            // Function to update the progress bar based on the current time of the audio
            function updateProgressBar(audioElement) {
                const progressBar = document.getElementById('progressBar');
                const currentTime = audioElement.currentTime;
                const duration = audioElement.duration;

                // Calculate the progress percentage and update the width of the progress bar
                const progressPercentage = (currentTime / duration) * 100;
                progressBar.style.width = `${progressPercentage}%`;
            }

            // ... Your existing code ...

            // Add event listeners to prevent audio display when clicking on edit or delete buttons
            const editButtons = document.querySelectorAll('.edit-btn');
            const deleteButtons = document.querySelectorAll('.delete-btn');

            editButtons.forEach((editButton) => {
                editButton.addEventListener('click', function(event) {
                    event.stopPropagation();
                });
            });

            deleteButtons.forEach((deleteButton) => {
                deleteButton.addEventListener('click', function(event) {
                    event.stopPropagation();

                    const row = event.target.closest('tr');
                    if (!row) return;

                    const mediaData = row.dataset.media;
                    if (!mediaData) return;

                    const media = JSON.parse(mediaData);

                    // Show the SweetAlert confirmation dialog
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this media!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            // If the user confirms deletion, navigate to the delete route
                            window.location.href =
                                `{{ route('dashboard.deleteMedia', ['id' => ':id', 'actionId' => $id]) }}`
                                .replace(':id', media.id);
                        }
                    });
                });
            });
        });
    </script>
@endsection
