@props([
    'label' => '',
    'data' => [],
    'model' => '',
    'textfield' => '',
    'input_text_field' => '',
    'placeholder' => '',
    'target' => '',
    'model_input_file' => '',
])

<div class="ml-3 mt-3">
  <label for="first_name" class="block mb-2 text-sm font-medium text-black">{{ $label }}</label>
  <div>
    @foreach ($data as $kategori)
      <x-element.input.input-radio :kategori="$kategori[0]" :$model :$textfield :type="$kategori[1]" :$input_text_field
        :$placeholder :$target :$model_input_file />
    @endforeach
  </div>
  @error($model)
    <div class="text-red-600">
      <strong>{{ $message }}</strong>
    </div>
  @enderror
</div>
