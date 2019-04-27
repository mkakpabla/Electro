@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Produits
            <small>Ajouter un nouveau produit</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <a class="btn btn-primary" href="{{ route('admin.products.index') }}">
                                <i class="fa fa-arrow-left"></i>
                                Retour
                            </a>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                                        <label class="control-label" for="name">
                                            @if ($errors->has('name'))
                                                <i class="fa fa-times-circle-o"></i>
                                            @endif
                                            Nom du produit
                                        </label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <span class="help-block">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group {!! $errors->has('price') ? 'has-error' : '' !!}">
                                        <label for="price">
                                            @if ($errors->has('price'))
                                                <i class="fa fa-times-circle-o"></i>
                                            @endif
                                            Prix du produit
                                        </label>
                                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                                        @if ($errors->has('price'))
                                            <span class="help-block">{{ $errors->first('price') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group {!! $errors->has('category_id') ? 'has-error' : '' !!}">
                                        <label for="category_id">
                                            @if ($errors->has('category_id'))
                                                <i class="fa fa-times-circle-o"></i>
                                            @endif
                                            Categories
                                        </label>
                                        <select class="form-control" name="category_id" id="category_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('category_id'))
                                            <span class="help-block">{{ $errors->first('category_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group {!! $errors->has('quantity') ? 'has-error' : '' !!}">
                                        <label for="quantity">
                                            @if ($errors->has('quantity'))
                                                <i class="fa fa-times-circle-o"></i>
                                            @endif
                                            Quantiter en stocke
                                        </label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('price') }}">
                                        @if ($errors->has('quantity'))
                                            <span class="help-block">{{ $errors->first('quantity') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group {!! $errors->has('details') ? 'has-error' : '' !!}">
                                <label for="details">
                                    @if ($errors->has('details'))
                                        <i class="fa fa-times-circle-o"></i>
                                    @endif
                                    Details
                                </label>
                                <textarea name="details" id="details" cols="30" rows="2" class="form-control">{{ old('details') }}</textarea>
                                @if ($errors->has('details'))
                                    <span class="help-block">{{ $errors->first('details') }}</span>
                                @endif
                            </div>
                            <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                                <label for="description">
                                    @if ($errors->has('description'))
                                        <i class="fa fa-times-circle-o"></i>
                                    @endif
                                    Description
                                </label>
                                <textarea name="description" id="description" cols="30" rows="2" class="form-control">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group {!! $errors->has('cover') ? 'has-error' : '' !!}">
                                <label for="cover">
                                    @if ($errors->has('cover'))
                                        <i class="fa fa-times-circle-o"></i>
                                    @endif
                                    Cover du produit
                                </label>
                                <input class="form-control" type="file" id="cover" name="cover">
                                @if ($errors->has('cover'))
                                    <span class="help-block">{{ $errors->first('cover') }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Sauvegarder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

@stop
