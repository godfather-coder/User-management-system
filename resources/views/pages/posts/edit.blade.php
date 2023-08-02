@extends('layout')
@section('main')
    <div class="row">
        <!-- left column -->
        <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
            </div>
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">User Password Edit</h3>
                </div>

                <form action="{{ route('posts.update',['post'=>$post->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('components.form.input', [
                        'title' => 'Title',
                        'name' => 'title',
                        'value' => $post->title
                    ])
                    @include('components.form.textare', [
                        'title' => 'Description',
                        'name' => 'description',
                        'value' => $post->description
                    ])
                    @include('components.form.textare', [
                        'title' => 'Text',
                        'name' => 'text',
                        'value' => $post->text
                    ])
                    @include('components.form.input', [
                        'title' => 'Image',
                        'id' => 'imageInput',
                        'name' => 'imgs',
                        'type' => 'file',
                    ])
                     @if (isset($post->postfile[0]))
                     <img class="img" src="{{ asset('storage' . $post->postfile[0]['path']) }}" alt="photo" id="1st">
                   @endif
                    <script>
                        var loadFile = function(event) {
                            var image = document.getElementById('output');
                            document.getElementById('1st').style.display = 'none';
                            image.src = URL.createObjectURL(event.target.files[0]);
                        };
                        </script>
                    <img src="" id='output' alt="">
                    <div id="imagePreview"></div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
@endsection

@section('script')
    <script>
        document.getElementById('imageInput').addEventListener('change', function() {
            const file = this.files[0];
            document.getElementById('imgs').style.display = 'none';
            document.getElementById('1st').style.display = 'none';
            if (file) {
                const reader = new FileReader();

                reader.addEventListener('load', function() {
                    const imagePreview = document.getElementById('imagePreview');
                    imagePreview.innerHTML =
                        `<img id='new' src="${reader.result}" alt="Uploaded Image" style="max-width: 300px; max-height: 300px;">`;
                });

                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
