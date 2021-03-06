{{-- $category is passed as NULL to the master layout view to prevent it from showing in the breadcrumbs --}}
@extends('forum::master', ['category' => null])

@section('content')

    <div class="row">
        <div class="col-md-3">
            @can('createCategories')
                @include('forum::category.partials.form-create')
            @endcan
        </div>
        <div class="col-md-6 text-center">
            <h2>Forum</h2>
        </div>
        <div class="col-md-3">

        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-md-12">
            @forelse($categories as $category)
                @include('forum::custom.category')
            @empty
                <div class="alert alert-info">
                    Nothing here yet!<br>
                    To manage the forum, you must have the "admin" role. <a href="https://help.gameserverapp.com/article/45-assign-a-role-to-a-player" target="_blank">How to assign roles &raquo;</a>
                </div>
            @endforelse
        </div>
    </div>
@stop
