@extends('layout.admin.master')

@section('title')
    Edit order #{{ $order->id }}
@endsection

@section('page')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">

            <div class="content">

                <div class="row mb-4">
                    <div class="col pull-right">
                        <div class="btn-group pull-right" role="group">
                            <a href="{{ route('orders.index') }}" class="btn btn-warning pull-right">
                                <i class="fa fa-arrow-left fa-fw"></i> Back
                            </a>
                            <a href="{{ route('orders.index') }}"
                               class="btn btn-primary pull-right">
                                <i class="fa fa-list-ul fa-fw"></i> All orders
                            </a>
                        </div>
                        <h3>@yield('title')</h3>
                    </div>
                </div>

                <div class="col-12">
                    @include('common.boxes')
                </div>

                <div class="row">
                    <div class="col-6 offset-3">
                        <div class="card">
                            <div class="card-body">
                                {!! Form::model($order, ['url'=>route('orders.update', ['order'=>$order->id])]) !!}
                                @method('PUT')
                                <div class="form-group">
                                    <label>Order Status</label>
                                    {!! Form::select('status', config('settings.order_statuses'), old('status'), ['class'=>'form-control']) !!}
                                    @if($errors->has('status'))
                                        <small class="text-danger">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('status') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Customer Instructions</label>
                                    {!! Form::textarea('instructions', old('instructions'), ['class'=>'form-control']) !!}
                                    @if($errors->has('instructions'))
                                        <small class="text-danger">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('instructions') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-check-circle fa-fw"></i> Save Changes
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

@endsection