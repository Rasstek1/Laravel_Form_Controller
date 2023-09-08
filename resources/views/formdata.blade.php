@extends('layout')

@section('content')

    @if(count($data) > 0)
        @foreach($data as $item)
            <div class="card p-3 shadow">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/../fichiers/photos/<?php echo $Profile->getPhoto(); ?>" class="card-img" alt="Photo du produit">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $Profile->getNom(); ?></h4>

                            <p><strong>Prix :</strong> <?php echo $Profile->getEmail(); ?>$Can</p>
                            <p><strong>Quantite :</strong> <?php echo $Profile->gettelephone(); ?></p>
                            <p><strong>Prix Total :</strong> <?php echo $Profile->getMessage(); ?></p>
                            <p><strong>Commentaire :</strong> <?php echo $Profile->getCommentaire(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>Aucun profil n'est créé</p>
    @endif


@endsection
