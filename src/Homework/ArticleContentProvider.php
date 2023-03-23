<?php

namespace App\Homework;


class ArticleContentProvider implements ArticleContentProviderInterface
{
    private $word_with_bold;
    private $text;

    /**
     * @param string[] $paragraphs
     */
    public function __construct($word_with_bold)
    {
        $this->word_with_bold = $word_with_bold;
    }


    private $paragraphs = ['Lorem ipsum новости dolor sit amet, consectetur adipiscing elit, sed
                            do eiusmod tempor incididunt [Сосискин](/) ut labore et dolore magna aliqua.
                            Purus viverra accumsan in nisl. Diam новости vulputate ut pharetra sit amet aliquam. Faucibus a
                            pellentesque sit amet политика eget dolor morbi non. Est ultricies integer quis auctor
                            elit sed. Tristique nulla aliquet enim tortor at.',

        'Tristique et egestas quis еда ipsum. Consequat semper viverra nam
                            libero. Lectus quam id leo in vitae turpis. In eu mi bibendum neque egestas congue
                            quisque egestas diam. Новости blandit turpis cursus in hac habitasse platea спорт dictumst quisque.',

        '*Ullamcorper* malesuada proin libero nunc consequat interdum varius sit amet. Odio pellentesque
                             diam volutpat commodo sed egestas. Eget nunc lobortis mattis aliquam. Cursus vitae congue
                             mauris rhoncus aenean vel. Pretium девушки viverra suspendisse potenti nullam ac tortor vitae.
                             A pellentesque sit amet porttitor eget dolor.',

        'Nisl nunc mi ipsum faucibus vitae. Purus спорт sit amet
                             luctus venenatis lectus magna новости fringilla urna. Sit amet tellus cras adipiscing enim. Euismod
                             nisi porta lorem mollis aliquam ut porttitor leo.',

        'Morbi blandit cursus risus at ultrices. Adipiscing политика vitae proin sagittis nisl rhoncus mattis
                             rhoncus. Sit amet новости commodo nulla facilisi. In fermentum et sollicitudin ac orci phasellus
                             egestas tellus. Sit amet risus nullam eget felis.',

        'Dapibus ultrices in iaculis nunc sed augue девушки lacus viverra. Dictum non consectetur 
                             a erat nam at. Odio ut enim blandit volutpat новости
                             maecenas. Turpis cursus in hac habitasse platea.',

        'Etiam erat velit scelerisque in. Auctor
                             neque vitae tempus политика quam pellentesque nec nam еда aliquam. Odio pellentesque diam volutpat commodo
                             sed egestas egestas. Egestas dui id ornare arcu odio ut.'];




    public function get(int $paragraph, string $word = null, int $wordsCount = 0): string
    {
        if ($word !== null) {
            while (substr_count(mb_strtolower($this->text), mb_strtolower($word)) < $wordsCount) {
                $this->text = $this->text . '<br>' . $this->paragraphs[array_rand($this->paragraphs, 1)];
            }
            if ($this->word_with_bold === 'bold') {
                $this->text = preg_replace("/($word)/ui", '**' . $word . '**', $this->text);
            } elseif
            ($this->word_with_bold === 'italic') {
                $this->text = preg_replace("/($word)/ui", '*' . $word . '*', $this->text);
            }
        } else {
            for ($i = 0; $i < $paragraph; $i++) {
                $this->text = $this->text . '<br>' . $this->paragraphs[array_rand($this->paragraphs, 1)];
            }
        }

        return $this->text;
    }


}