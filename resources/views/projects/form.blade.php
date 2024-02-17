
{{-- Project Form Fields --}}

<div class="mb-3">
  <label for="title" class="form-label">Title</label>
  <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ $project->title ?? '' }}">
  @error('title')
  <small class="text-danger">{{ $message }}</small>
  @enderror
</div>
<div class="mb-3">
  <label for="description" class="form-label">Description</label>
  <textarea class="form-control" id="description" rows="3" placeholder="Description" name="description">{{ $project->description ?? '' }}</textarea>
  @error('description')
  <small class="text-danger">{{ $message }}</small>
  @enderror
</div>

{{-- Form Mode Edit And Save --}}
<button type="submit" class="btn btn-primary">{{ $mode == 'create' ? 'Save' : 'Edit' }}</button>