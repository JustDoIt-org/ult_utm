<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Faq::create([
            'question' => 'Question 1',
            'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At cum vero alias nesciunt quo. Voluptas, non deserunt. Recusandae dolore cumque quidem qui, provident, corporis itaque maxime eligendi nihil quisquam odio eveniet eaque alias aliquid fuga, reprehenderit accusamus eos perferendis est porro? Accusantium praesentium officia quisquam hic minima voluptates, nihil necessitatibus mollitia, facilis laudantium cumque ab in quis repellendus delectus odit. Beatae velit sequi vitae, minima reprehenderit illum autem facere dicta, mollitia ad deserunt porro ipsum in inventore optio cumque sint molestias enim quis? Tempora quia, ex facilis nesciunt quidem doloremque reprehenderit nemo culpa, excepturi, nam totam exercitationem voluptatum amet cupiditate?'
        ]);

        \App\Models\Faq::create([
            'question' => 'Question 2',
            'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At cum vero alias nesciunt quo. Voluptas, non deserunt. Recusandae dolore cumque quidem qui, provident, corporis itaque maxime eligendi nihil quisquam odio eveniet eaque alias aliquid fuga, reprehenderit accusamus eos perferendis est porro? Accusantium praesentium officia quisquam hic minima voluptates, nihil necessitatibus mollitia, facilis laudantium cumque ab in quis repellendus delectus odit. Beatae velit sequi vitae, minima reprehenderit illum autem facere dicta, mollitia ad deserunt porro ipsum in inventore optio cumque sint molestias enim quis? Tempora quia, ex facilis nesciunt quidem doloremque reprehenderit nemo culpa, excepturi, nam totam exercitationem voluptatum amet cupiditate?'
        ]);

        \App\Models\Faq::create([
            'question' => 'Question 3',
            'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At cum vero alias nesciunt quo. Voluptas, non deserunt. Recusandae dolore cumque quidem qui, provident, corporis itaque maxime eligendi nihil quisquam odio eveniet eaque alias aliquid fuga, reprehenderit accusamus eos perferendis est porro? Accusantium praesentium officia quisquam hic minima voluptates, nihil necessitatibus mollitia, facilis laudantium cumque ab in quis repellendus delectus odit. Beatae velit sequi vitae, minima reprehenderit illum autem facere dicta, mollitia ad deserunt porro ipsum in inventore optio cumque sint molestias enim quis? Tempora quia, ex facilis nesciunt quidem doloremque reprehenderit nemo culpa, excepturi, nam totam exercitationem voluptatum amet cupiditate?'
        ]);

        \App\Models\Faq::create([
            'question' => 'Question 4',
            'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At cum vero alias nesciunt quo. Voluptas, non deserunt. Recusandae dolore cumque quidem qui, provident, corporis itaque maxime eligendi nihil quisquam odio eveniet eaque alias aliquid fuga, reprehenderit accusamus eos perferendis est porro? Accusantium praesentium officia quisquam hic minima voluptates, nihil necessitatibus mollitia, facilis laudantium cumque ab in quis repellendus delectus odit. Beatae velit sequi vitae, minima reprehenderit illum autem facere dicta, mollitia ad deserunt porro ipsum in inventore optio cumque sint molestias enim quis? Tempora quia, ex facilis nesciunt quidem doloremque reprehenderit nemo culpa, excepturi, nam totam exercitationem voluptatum amet cupiditate?'
        ]);
    }
}
