<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AdVibe.it</title>
</head>
<body>
    <div>
        <h1>{{ __('ui.user_request') }}</h1>
        <h2>{{ __('ui.user_details') }}:</h2>
        <p>{{ __('ui.name') }}: {{ $user->name }}</p>
        <p>{{ __('ui.email') }}: {{ $user->email }}</p>
        <p>{{ __('ui.make_revisor_prompt') }}</p>
        <a href="{{ route('make.revisor', compact('user')) }}">{{ __('ui.make_revisor') }}</a>
    </div>
</body>
</html>
