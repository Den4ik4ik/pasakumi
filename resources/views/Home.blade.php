@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="jumbotron bg-light p-5 rounded">
        <h1 class="display-4">Bibliotēkas Pasakumi</h1>
        <p class="lead">Izpēti brīnumainus pasakumus un stāstus no visas pasaules</p>
        <hr class="my-4">
    </div>

    <div class="row mt-5">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">📚 Daudzveidīga Kollekcija</h5>
                    <p class="card-text">Lasi pasakumus no dažādām kultūrām un tradīcijām.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">⭐ Populārie Pasakumi</h5>
                    <p class="card-text">Iepazīsti lasītāju iecienītākos pasakumus un klasiku.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">🔍 Meklēt Pasakumus</h5>
                    <p class="card-text">Ātri atrodi interesējošos pasakumus, izmantojot meklēšanu.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- pasakumi list for CRUD management directly on the home page -->
    <div class="mt-5">
        <h2>Visi ieraksti</h2>

        @if(session('success'))
            <div class="flash flash-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('pasakumi.create') }}" class="btn">Pievienot jaunu ierakstu</a>

        <table border="1" cellpadding="12" cellspacing="0" style="margin-top:16px; width:100%; border-collapse:collapse; table-layout:auto;">
            <colgroup>
                <col style="width:40%;">
                <col style="width:25%;">
                <col style="width:35%;">
            </colgroup>
            <thead>
                <tr>
                    <th style="text-align:center;">Nosaukums</th>
                    <th style="text-align:center;">Datums</th>
                    <th style="text-align:center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                    <tr>
                        <td style="text-align:center;">{{ $item->nosaukums }}</td>
                        <td style="text-align:center;">{{ $item->datums }}</td>
                        <td style="text-align:center;">
                            <a href="{{ route('pasakumi.show', $item->ID) }}" class="btn secondary">Detalizēti</a>
                            <a href="{{ route('pasakumi.edit', $item->ID) }}" class="btn">Labot</a>
                            <form action="{{ route('pasakumi.destroy', $item->ID) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" onclick="return confirm('Tiešām dzēst?')">Dzēst</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" style="text-align:center;">Nav ierakstu</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
