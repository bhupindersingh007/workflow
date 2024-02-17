
{{-- Project Form Fields --}}

<div class="mb-3">
  <label for="title" class="form-label">Title</label>
  <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ $project->title ?? old('title') }}">
  @error('title')
  <small class="text-danger">{{ $message }}</small>
  @enderror
</div>
<div class="mb-3">
  <label for="description" class="form-label">Description</label>
  <textarea class="form-control" id="description" rows="3" placeholder="Description" name="description">{{ $project->description ?? old('description') }}</textarea>
  @error('description')
  <small class="text-danger">{{ $message }}</small>
  @enderror
</div>

{{-- Form Mode Edit And Save --}}
<button type="submit" class="btn btn-primary">{{ $mode == 'create' ? 'Save' : 'Edit' }}</button>


@push('scripts')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.9.2/tinymce.min.js"></script>
  <script>
    
    tinymce.init({
          promotion: false,
          selector: '[name=description]',
          height: 240,
          branding: false,
          statusbar: false,
          menubar : false,
          plugins: 'lists link image paste table fullscreen',
          toolbar: `undo redo | bold italic underline | formatselect 
                    | alignleft aligncenter alignright alignjustify 
                    | bullist numlist outdent indent 
                    | table |link image | fullscreen`,
      });

  </script>    

@endpush