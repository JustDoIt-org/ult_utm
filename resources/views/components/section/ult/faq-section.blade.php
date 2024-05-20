<section class="h-fit w-screen py-6 px-6 lg:px-20 lg:py-20 bg-slate-100 flex flex-col justify-center items-center gap-5"
  id="FAQs">
    <h2 class="text-2xl text-center font-bold">Pertanyaan yang sering diajukan (FAQs)</h2>
    <div class="accordion-content w-full md:w-3/4" x-data="{ selectedAccordion: 1 }">

        <template x-for="(value, i) in @js($faq)">
            <div class="accordion mb-2 shadow-lg">
                <div class="accordion-header bg-slate-400 px-5 py-4 flex justify-between items-center rounded-t-lg" @click="selectedAccordion !== i+1 ? selectedAccordion = i+1 : selectedAccordion = null"
                    x-bind:class="{ 'rounded-b-lg': selectedAccordion !== i+1 }">
                    <h3 class="accordion-title text-lg font-semibold" x-text="value.question"></h3>
                    <i class="fa-solid transition-all duration-500" x-bind:class="{ 'fa-plus': selectedAccordion !== i+1, 'fa-minus': selectedAccordion === i+1 }"></i>
                </div>

                <div class="accordion-item bg-slate-300 relative overflow-hidden max-h-0 rounded-b-lg transition-all duration-500"
                    x-ref="accordionItem" x-bind:class="selectedAccordion === i+1 && `max-h-[${$refs.accordionItem.scrollHeight}px]`">
                    <p class="accordion-answer px-5 py-4 text-justify" x-text="value.answer">
                        Lorem ipsum dolor sit amet
                        consectetur adipisicing elit. At cum vero alias nesciunt quo. Voluptas, non deserunt. Recusandae
                        dolore cumque quidem qui, provident, corporis itaque maxime eligendi nihil quisquam odio eveniet
                        eaque alias aliquid fuga, reprehenderit accusamus eos perferendis est porro? Accusantium
                        praesentium officia quisquam hic minima voluptates, nihil necessitatibus mollitia, facilis
                        laudantium cumque ab in quis repellendus delectus odit. Beatae velit sequi vitae, minima
                        reprehenderit illum autem facere dicta, mollitia ad deserunt porro ipsum in inventore optio
                        cumque sint molestias enim quis? Tempora quia, ex facilis nesciunt quidem doloremque
                        reprehenderit nemo culpa, excepturi, nam totam exercitationem voluptatum amet cupiditate?
                    </p>
                </div>
            </div>
        </template>

    </div>
</section>
