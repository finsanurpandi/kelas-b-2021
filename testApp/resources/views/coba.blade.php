<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1>Document</h1>
    {{ $text }} - {!! $angka !!}
    <?=$text?>

    @if($angka == null) 
        Angka adalah NULL
    @else
        {!! $angka !!}
    @endif


    @foreach ($fruits as $fruit)
        @if($loop->first)
            Ini adalah iterasi pertama
        @endif
        <br/>
        {{ $fruit }}
        @if($loop->last)
        <br/>Ini adalah iterasi terakhir
    @endif
    @endforeach

    <form method="post" action="#">
        @csrf
        @method('delete')
    </form>

    @php
       $no = 1;
       echo $no; 
    @endphp
    
    <x-alert message="lorem ipsum" type="danger"/>
    <x-alert message="success" type="success"/>

    <x-badge type="danger">
        <x-slot:header>BADGE</x-slot:header>
        <em>ini adalah badge</em>
        <img src="#"/>
    </x-badge>
</body>
</html>