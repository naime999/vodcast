@extends('admin.layouts.app')

@section('title', 'Add Permission')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Permission</h1>
        <a href="{{route('super-admin.permissions.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('admin.common.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Permission</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('super-admin.permissions.store')}}">
                @csrf
                <div class="form-group row">

                    {{-- Name --}}
                    <div class="col-md-4 mb-3 mb-sm-0">
                        <label><span style="color:red;">*</span>Name</label>
                        <input
                            type="text"
                            class="form-control form-control-user @error('name') is-invalid @enderror"
                            id="exampleName"
                            placeholder="Name"
                            name="name"
                            value="{{ old('name') }}">

                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    {{-- Email --}}
                    <div class="col-md-4 mb-3 mb-sm-0">
                        <label><span style="color:red;">*</span>Guard Name</label>
                        <select class="form-control form-control-user @error('guard_name') is-invalid @enderror" name="guard_name">
                            <option selected disabled>Select Guard Name</option>
                            <option value="web" selected>Web</option>
                            <option value="api">Api</option>
                        </select>
                        @error('guard_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="col-md-4 mb-3 mb-sm-0">
                        <label>Definition</label>
                        <select class="form-control form-control-user @error('define') is-invalid @enderror" name="define">
                            <option selected disabled>Select Definition</option>
                            <option value="3" selected>User</option>
                            <option value="2">Vodcaster</option>
                            <option value="1">Admin</option>
                        </select>
                        @error('define')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                </div>

                {{-- Save Button --}}
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success btn-user btn-block">
                        Save
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>


@endsection
