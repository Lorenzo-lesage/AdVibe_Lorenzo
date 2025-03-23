<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ProfileController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */

     public static function middleware(): array
     {
         return [
             new Middleware('auth', except: ['profilesIndex', 'profileShow'])
         ];
     }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Devi essere autenticato per creare un profilo.');
        }

        $user = Auth::user();

        if ($user->profile) {
            return redirect()->back()->with('error', 'Hai già creato un profilo!');
        }

    // ✅ Validazione con messaggi personalizzati
    $request->validate([
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'birth_date' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')], // Deve essere maggiorenne
        'phone' => 'required|regex:/^[0-9]{10,15}$/', // Solo numeri, min 10 max 15 cifre
        'city' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB, solo immagini
    ], [
        'name.required' => 'Il nome è obbligatorio.',
        'surname.required' => 'Il cognome è obbligatorio.',
        'birth_date.required' => 'La data di nascita è obbligatoria.',
        'birth_date.before_or_equal' => 'Devi essere maggiorenne per registrarti.',
        'phone.required' => 'Il numero di telefono è obbligatorio.',
        'phone.regex' => 'Inserisci un numero di telefono valido.',
        'city.required' => 'La città è obbligatoria.',
        'address.required' => 'L\'indirizzo è obbligatorio.',
        'country.required' => 'Il paese è obbligatorio.',
        'profile_image.image' => 'Il file deve essere un\'immagine.',
        'profile_image.mimes' => 'Le immagini devono essere in formato JPG o PNG.',
        'profile_image.max' => 'L\'immagine non deve superare i 2MB.',
    ]);


        $user->profile()->create(
            [
                'name' => $request->name,
                'surname' => $request->surname,
                'birth_date' => $request->birth_date,
                'phone' => $request->phone,
                'city' => $request->city,
                'address' => $request->address,
                'country' => $request->country,
                'profile_image' =>  $request->has('profile_image') ? $request->file('profile_image')->store('profile_image', 'public') : 'profile_image/default.png'
            ]
        );

        return redirect()->route('my.articles')->with('success', 'Profilo creato con successo');
    }

    // FUNZIONE PER I PROFILI
    public function profilesIndex() {
        $profiles = Profile::with('user')->get(); // Recupera tutti gli utenti
        return view('profile.index', compact('profiles'));
    }

    // FUNZIONE PER I PROFILI DETTAGLIO
    public function profileShow (User $user, Profile $profile) {
        // Recupera gli articoli creati dall'utente
        $profileArticles = Article::where('user_id', $user->id)->where('is_accepted', true)->orderBy('updated_at', 'desc')->get();

        // Recupera gli articoli preferiti dell'utente
        $favoriteArticles = $user->savedArticles; // Assicurati di avere una relazione definita

        return view('profile.show', compact('user', 'profileArticles', 'favoriteArticles', 'profile'));
    }


    // FUNZIONE IL MIO PROFILO
    public function myArticles ()
    {
        $myArticles = Auth::user()->articles()->where('is_accepted', true)->orderBy('updated_at', 'desc')->get();
        $favoriteArticles = Auth::user()->savedArticles()->orderBy('created_at', 'desc')->get();
        $profile = Auth::user()->profile; // Recupera il profilo dell'utente

        return view('article.myArticles', compact('myArticles', 'favoriteArticles', 'profile'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $profile = auth()->user()->profile;
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function put(Request $request, Profile $profile)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'birth_date' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')], // Deve essere maggiorenne
            'phone' => 'required|regex:/^[0-9]{10,15}$/', // Solo numeri, min 10 max 15 cifre
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB, solo immagini
        ], [
            'name.required' => 'Il nome è obbligatorio.',
            'surname.required' => 'Il cognome è obbligatorio.',
            'birth_date.required' => 'La data di nascita è obbligatoria.',
            'birth_date.before_or_equal' => 'Devi essere maggiorenne per registrarti.',
            'phone.required' => 'Il numero di telefono è obbligatorio.',
            'phone.regex' => 'Inserisci un numero di telefono valido.',
            'city.required' => 'La città è obbligatoria.',
            'address.required' => 'L\'indirizzo è obbligatorio.',
            'country.required' => 'Il paese è obbligatorio.',
            'profile_image.image' => 'Il file deve essere un\'immagine.',
            'profile_image.mimes' => 'Le immagini devono essere in formato JPG o PNG.',
            'profile_image.max' => 'L\'immagine non deve superare i 2MB.',
        ]);

        $data = [
            'name' => $request->name,
            'surname' => $request->surname,
            'birth_date' => $request->birth_date,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
            'country' => $request->country,
        ];

        // Aggiorna l'immagine solo se ne è stata caricata una nuova
        if ($request->hasFile('profile_image')) {
            $data['profile_image'] = $request->file('profile_image')->store('profile_image', 'public');
        }

        $profile->update($data);
        return redirect(route('my.articles'))->with('success', 'La modifica è andata a buon fine');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->back()->with('message', 'Il profilo è stato eliminato con successo');
    }

}
