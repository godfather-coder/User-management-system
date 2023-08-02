@extends('layout')
@section('main')

<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    @include('components.form.input',[
        'title' => 'Title',
        'name' => 'title'
    ])
    @include('components.form.textare', [
        'title' => 'Description',
        'name' => 'description',
    ])
     @include('components.form.textare', [
        'title' => 'Text',
        'name' => 'text',
    ])
    @include('components.form.input',[
        'title' => 'Image',
        'id' => 'imageInput',
        'name' => 'imgs',
        'type' => 'file'
    ])
    <div id="imagePreview"></div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>

@endsection

@section('script')
<script>
     document.getElementById('imageInput').addEventListener('change', function() {
      const file = this.files[0];

      if (file) {
        const reader = new FileReader();

        reader.addEventListener('load', function() {
          const imagePreview = document.getElementById('imagePreview');
          imagePreview.innerHTML = `<img src="${reader.result}" alt="Uploaded Image" style="max-width: 300px; max-height: 300px;">`;
        });

        reader.readAsDataURL(file);
      }
    });
    //  document.getElementById('imageInput').addEventListener('change', function() {
    //   const files = this.files;
    //   const imagePreview = document.getElementById('imagePreview');
    //   imagePreview.innerHTML = '';

    //   if (files.length > 5) {
    //     imagePreview.innerHTML = "You can only upload up to 5 images.";
    //     imagePreview.style.color = 'red';
    //     this.value = null;
    //     return;
    //   }

    //   for (let i = 0; i < files.length; i++) {
    //     const reader = new FileReader();

    //     reader.addEventListener('load', function() {
    //       const img = document.createElement('img');
    //       img.src = reader.result;
    //       img.alt = "Uploaded Image";
    //       img.style.maxWidth = '300px';
    //       img.style.maxHeight = '300px';
    //       imagePreview.appendChild(img);
    //     });

    //     reader.readAsDataURL(files[i]);
    //   }
    // });
  </script>
@endsection
