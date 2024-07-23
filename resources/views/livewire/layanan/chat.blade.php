  @props(['type' => 'layanan'])

  <div class="card p-4 mx-3 ">
    <link href="{{ asset('assets/css/chat.css') }}" rel="stylesheet" />

    <h2 class="text-center">{{ $title }}</h2>


    <section style="margin-top: 600px; width:100%;">
      <div class="chat_window" style="width: 100%">
        <div class="top">
          <div class="buttons">
            <div class="button close"></div>
            <div class="button minimize"></div>
            <div class="button maximize"></div>
          </div>
          {{-- <div class="text-center text-black">Chat Admin</div> --}}
        </div>

        <ul class="messages">
          @isset($chat)
            @foreach ($chat as $item)
              <li class="message appeared test_message {{ $item->sender == Auth::id() ? 'right' : 'left' }} ">
                <div class="text_wrapper">
                  <div class="text"
                    style="font-size: 20px; color: black;  {{ $item->sender == Auth::id() ? 'text-align: right;' : '' }}  ">
                    {{ $item->chat }}
                  </div>
                </div>
              </li>
            @endforeach
          @endisset


        </ul>
        <div class="flex mx-4">
          <form action="" wire:submit="save('{{ $type }}')">
            <x-element.input.input-bootstrap title="" model="chatInput" />
            <x-element.button.submit-bootstrap target="save" buttonName="Kirim" />
          </form>
        </div>
      </div>
      <div class="message_template">
        <li class="message">
          <!-- <div class="avatar"></div> -->
          <div class="text_wrapper">
            <div class="text left"></div>
          </div>
        </li>
      </div>

      <script src="{{ asset('assets/js/chat.js') }}"></script>

    </section>


  </div>
