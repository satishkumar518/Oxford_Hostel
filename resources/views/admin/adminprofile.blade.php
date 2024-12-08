@extends('layout.admin.dashlayout')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mt-4">
        <div class="col-6">
            <div class="card">
                <div class="card-title text-center page-title-box font-weight-bold">   
                    <h4>Profile</h4>
                </div>
                <div class="card-body text-center">
                    @foreach ($data as $item)
                        <h5>Name: {{$item->name}}</h5>
                        <h5>Email: {{$item->email}}</h5>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection