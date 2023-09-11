use App\Models\Profile;


@extends('layout')

@section('content')

    @if(count($data) > 0)
        @foreach($data as $item)
            <div class="card p-3 shadow">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/../public/uploads/{{ $item->getPhoto() }}" class="card-img" alt="Photo du produit">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title">{{ $item->getNom() }}</h4>
                            <p><strong>Email :</strong> {{ $item->getEmail() }}</p>
                            <p><strong>Telephone :</strong> {{ $item->getTelephone() }}</p>
                            <p><strong>Message :</strong> {{ $item->getMessage() }}</p>
                            <p><strong>Commentaire :</strong> {{ $item->getCommentaire() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>Aucun profil n'est créé</p>
    @endif

@endsection

