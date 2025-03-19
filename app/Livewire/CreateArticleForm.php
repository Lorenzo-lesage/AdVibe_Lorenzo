<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CreateArticleForm extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $title;
    #[Validate('required|min:10')]
    public $description;
    #[Validate('required|numeric')]
    public $price;
    #[Validate('required')]
    public $category;
    public $article;
    public $images = [];
    public $temporary_images;

    // FUNZIONE PER PUBBLICARE ARTICOLO
    public function store()
    {

        $this->validate();

        $this->article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category,
            'user_id' => Auth::id()
        ]);

        if(count($this->images) > 0) {
            foreach ($this->images as $image) {
                $this->article->images()->create([
                    'path' => $image->store('images', 'public')
                ]);
            }
        }

        return redirect()->route('create.article')->with('success', 'Operazione avvenuta con successo!');
        $this->cleanForm();
    }

    // FUNZIONE PER RESETTARE IL FORM
    protected function cleanForm()
    {
        $this->title = '';
        $this->description = '';
        $this->price = '';
        $this->category = '';
        $this->images = [];
    }

    // FUNZIONE PER VISUALIZZARE IMMAGINE IN PREVIEW
    public function updatedTemporaryImages()
    {

        if ($this->validate([
            'temporary_images.*' => 'image|max:1024',
            'temporary_images' => 'max:10'
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }

    }



    // FUNZIONE PER RIMUOVERE IMMAGINI DALLA PREVIEW
    public function removeImage($key)
    {

        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }

    }

    public function render()
    {
        return view('livewire.create-article-form');
    }
}
