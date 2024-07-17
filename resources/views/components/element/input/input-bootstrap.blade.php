@props(['title' => '', 'model' => '', 'type' => '', 'select_item' => []])

@switch($type)
  @case('select')
    <div class="form-group">
      <label for="exampleFormControlSelect1">{{ $title }}</label>
      <select class="form-control" id="exampleFormControlSelect1" wire:model.lazy={{ $model }}>
        @foreach ($select_item as $item)
          <option>{{ $item }}</option>
        @endforeach
      </select>
      @error($model)
        <div class="text-danger">
          <small>{{ $message }}</small>
        </div>
      @enderror
    </div>
  @break

  @case('textarea')
    <div class="form-group">
      <label for="exampleFormControlTextarea1">{{ $title }}</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wire:model={{ $model }}></textarea>
      @error($model)
        <div class="text-danger">
          <small>{{ $message }}</small>
        </div>
      @enderror
    </div>
  @break

  @default
    <div class="form-group">
      <label for="example-text-input" class="form-control-label">{{ __($title) }}</label>
      <input class="form-control" type={{ $type }} wire:model={{ $model }} id="example-text-input">
      @error($model)
        <div class="text-danger">
          <small>{{ $message }}</small>
        </div>
      @enderror
    </div>
@endswitch
