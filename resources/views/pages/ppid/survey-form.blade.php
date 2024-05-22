<div>
  <form wire:submit='store'>
    @foreach ($hasil as $name)
      <x-section.ppid.survey-kepuasan :name="$name->name" :model="$arr[$loop->index]" />
    @endforeach
    <x-element.button.submit-ppid target="store" buttonName="Kirim" position="left" />
  </form>
</div>
