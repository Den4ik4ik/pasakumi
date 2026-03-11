{{-- resources/views/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Pievienot jaunu ierakstu</h1>

    @if ($errors->any())
        <div class="flash flash-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pasakumi.store') }}" method="POST" style="max-width:800px;">
        @csrf
        
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:16px;">
            <div class="form-control">
                <label style="font-weight:700; display:block; margin-bottom:8px;">Nosaukums:</label>
                <input type="text" name="nosaukums" value="{{ old('nosaukums') }}" style="width:90%; padding:10px; border-radius:6px;">
            </div>
            <div class="form-control">
                <label style="font-weight:700; display:block; margin-bottom:8px;">Kategorija:</label>
                <input type="text" name="kategorija" value="{{ old('kategorija') }}" style="width:90%; padding:10px; border-radius:6px;">
            </div>
        </div>
        
        <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:16px; margin-bottom:16px;">
            <div class="form-control">
                <label style="font-weight:700; display:block; margin-bottom:8px;">Datums:</label>
                <input type="date" name="datums" value="{{ old('datums') }}" style="width:90%; padding:10px; border-radius:6px;">
            </div>
            <div class="form-control">
                <label style="font-weight:700; display:block; margin-bottom:8px;">Sākuma laiks:</label>
                <input type="time" name="sakuma_laiks" value="{{ old('sakuma_laiks') }}" style="width:90%; padding:10px; border-radius:6px;">
            </div>
            <div class="form-control">
                <label style="font-weight:700; display:block; margin-bottom:8px;">Beigu laiks:</label>
                <input type="time" name="beigu_laiks" value="{{ old('beigu_laiks') }}" style="width:90%; padding:10px; border-radius:6px;">
            </div>
        </div>
        
        <div class="form-control" style="margin-bottom:16px;">
            <label style="font-weight:700; display:block; margin-bottom:8px;">Apraksts:</label>
            <textarea name="apraksts" style="width:100%; padding:10px; border-radius:6px; min-height:80px;">{{ old('apraksts') }}</textarea>
        </div>
        
        <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:16px; margin-bottom:24px;">
            <div class="form-control">
                <label style="font-weight:700; display:block; margin-bottom:8px;">Max dalībnieku:</label>
                <input type="number" name="max_dalibnieku" value="{{ old('max_dalibnieku') }}" style="width:90%; padding:10px; border-radius:6px;">
            </div>
            <div class="form-control">
                <label style="font-weight:700; display:block; margin-bottom:8px;">Darbinieks ID:</label>
                <input type="number" name="darbinieks_id" value="{{ old('darbinieks_id') }}" style="width:90%; padding:10px; border-radius:6px;">
            </div>
            <div class="form-control">
                <label style="font-weight:700; display:block; margin-bottom:8px;">Telpa ID:</label>
                <input type="number" name="telpa_id" value="{{ old('telpa_id') }}" style="width:90%; padding:10px; border-radius:6px;">
            </div>
        </div>
        
        <div style="display:flex; gap:12px;">
            <button type="submit" class="btn">Saglabāt</button>
            <a href="{{ url()->previous() }}" class="btn secondary">Atcelt</a>
        </div>
    </form>
@endsection
