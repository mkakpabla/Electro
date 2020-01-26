@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Produits</h4>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-success">Ajouter un nouveau produit</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                Titre
                            </th>
                            <th>
                                Catégorie
                            </th>
                            <th>
                                Le Prix
                            </th>
                            <th>
                                Disponibilité
                            </th>
                            <th class="text-right">
                                Actions
                            </th>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        {{ $product->name }}
                                    </td>
                                    <td>
                                        {{ $product->category->name }}
                                    </td>
                                    <td>
                                        {{ $product->price }}
                                    </td>
                                    <td>
                                        @if ($product->quantity > 0)
                                            <span class="badge badge-success">En Stock</span>
                                        @else
                                            <span class="badge badge-warning">Pas En Stock</span>
                                        @endif

                                    </td>
                                    <td class="text-right">
                                        <button class="btn btn-primary">Editer</button>
                                        <button class="btn btn-danger">Supprimer</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
