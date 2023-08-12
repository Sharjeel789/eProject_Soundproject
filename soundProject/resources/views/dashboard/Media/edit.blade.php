@extends('layout.dashboard')
@section('dashboard')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center">Edit Media</h3>
                                    </div>
                                    <hr>
                                    <form action="{{ route('dashboard.editePostMedia', ['id' => $media->id]) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <input type="hidden" value="{{$actionId}}" name="actionId"/>
                                        <div class="form-group">
                                            <label for="Name" class="control-label mb-1">Media Name</label>
                                            <input id="Name" name="name" type="text" class="form-control"
                                                value="{{ old('name', $media->mediaName) }}">
                                        </div>

                                        <div class="form-group has-success">
                                            <label for="image" class="control-label mb-1">Upload Image</label>
                                            <input type="file" id="image" name="image" class="form-control"
                                                accept="image/*">
                                            <img src="{{ url($media->mediaPhoto) }}" width="100" alt="Media Image">
                                        </div>

                                        @if ($media->mediaTypeId == 1)
                                            <div class="form-group has-success">
                                                <label for="image"
                                                    class="control-label mb-1">Upload Audio</label>
                                                <input type="file" id="file" name="media" class="form-control"
                                                    accept="audio/*">
                                                <audio controls>
                                                    <source src="{{ url($media->mediaURL) }}" type="audio/mpeg">
                                                    Your browser does not support the audio element.
                                                </audio>
                                            </div>
                                        @else
                                            <div class="form-group has-success">
                                                <label for="image"
                                                    class="control-label mb-1">Upload Video</label>
                                                <input type="file" id="file" name="media" class="form-control"
                                                    accept="video/*">
                                                <video controls>
                                                    <source src="{{ url($media->mediaURL) }}" type="video/mp4">
                                                    Your browser does not support the video element.
                                                </video>
                                            </div>
                                        @endif


                                        <div class="form-group has-success">
                                            <label for="image" class="control-label mb-1">Select artists</label><br>
                                            <select class="form-control form-select" name="artist_id">
                                                <option value=""></option>
                                                @foreach ($artists as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('artist_id', $media->artist_id) == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group has-success">
                                            <label for="image" class="control-label mb-1">Select Lyricist</label><br>
                                            <select class="form-control form-select" name="lyricist_id">
                                                <option value=""></option>
                                                @foreach ($lyricists as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('lyricist_id', $media->lyricist_id) == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <button type="submit"
                                                class="btn btn-lg btn-info btn-block">
                                                <span id="payment-button-amount">Update</span>
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div> <!-- .card -->

                </div>
                <!--/.col-->
            </div>
        </div>
    </div>
@endsection
