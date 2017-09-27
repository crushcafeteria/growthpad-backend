@extends('layout.master')

@section('header')
    <div class="blog-header">
        <div class="container">

            <div class="col-4 float-right">
                <a href="{{ url('admin/contact/add') }}" class="btn btn-success float-right">
                    @if(Auth::check())
                        <i class="fa fa-plus-circle fa-fw"></i> Add a market contact
                    @else
                        <i class="fa fa-lock fa-fw"></i> Login to add contact
                    @endif
                </a>
            </div>

            <h3 class="blog-title"><i class="fa fa-exchange fa-fw"></i> Marketplace</h3>
            <p class="lead blog-description">Find and connect with new opportunities</p>
        </div>
        <hr>
    </div>
@endsection

@section('page')

    <div class="col-md-12">
        <div class="frmList">
            @include('common.boxes')
            @include('market.template.card-layout')
            {{ $contacts->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>

@endsection


@section('searchbox')
    @include('market.template.searchbox')
@endsection