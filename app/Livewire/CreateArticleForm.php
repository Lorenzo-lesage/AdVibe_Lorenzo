<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path' => $image->store('$newFileName', 'public')]);
                dispatch(new ResizeImage($newImage->path, 350, 350));
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
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

        // Validazione immagini singole
        $this->validate([
            'temporary_images.*' => 'image|max:1024', // Ogni immagine max 1MB
        ]);

        // Controllo limite massimo di 10 immagini
        if ((count($this->images) + count($this->temporary_images)) > 10) {
            session()->flash('error', 'Puoi caricare un massimo di 10 immagini.');
            return;
        }

        // Aggiunta immagini all'array
        foreach ($this->temporary_images as $image) {
            $this->images[] = $image;
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
