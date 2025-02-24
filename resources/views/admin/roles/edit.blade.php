@extends('admin.layouts.app')

@section('title', 'Edit Role')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Role</h1>
        <a href="{{route('super-admin.roles.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('admin.common.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Role</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('super-admin.roles.update', ['role' => $role->id])}}">
                @csrf
                @method('PUT')
                <div class="form-group row">

                    {{-- Name --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span style="color:red;">*</span>Name</label>
                        <input
                            type="text"
                            class="form-control form-control-user @error('name') is-invalid @enderror"
                            id="exampleName"
                            placeholder="Name"
                            name="name"
                            value="{{ old('name') ? old('name') : $role->name }}">

                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    {{-- Guard Name --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span style="color:red;">*</span>Guard Name</label>
                        <select class="form-control form-control-user @error('guard_name') is-invalid @enderror" name="guard_name">
                            <option selected disabled>Select Guard Name</option>
                            <option value="web" {{old('guard_name') ? ((old('guard_name') == 'web') ? 'selected' : '') : (($role->guard_name == 'web') ? 'selected' : '')}}>Web</option>
                            <option value="api" {{old('guard_name') ? ((old('guard_name') == 'api') ? 'selected' : '') : (($role->guard_name == 'api') ? 'selected' : '')}}>Api</option>
                        </select>
                        @error('guard_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <label> <span style="color:red;">*</span>All Permissions</label>
                        <input type="checkbox" name="check-all" class="form-contol" id="checkAllPermissions" {{ (count($permissions) == count($role->permissions->pluck('id')->toArray())) ? 'checked' : '' }}/>
                        <div class="row m-0">
                            <div class="col-md-12">
                                <label>Only Admin Permissions</label>
                                <input type="checkbox" name="check-admin" class="form-contol" id="checkAdminPermissions" {{ (count($permissions) == count($role->permissions->where('define', 1)->pluck('id')->toArray())) ? 'checked' : '' }}/>
                            </div>
                            <div class="col-lg-12 border p-3 rounded mb-3">
                                @foreach ($permissions->where('define', 1) as $permissionIndex => $permission)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input permission-input" {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }} type="checkbox" name="permissions[]" id="inlineCheckbox_{{$permissionIndex}}" data-type="{{ $permission->define }}"  value="{{$permission->id}}">
                                        <label class="form-check-label" for="inlineCheckbox{{$permissionIndex}}">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-12">
                                <label>Only Vodcaster Permissions</label>
                                <input type="checkbox" name="check-vodcaster" class="form-contol" id="checkVodcasterPermissions" {{ (count($permissions) == count($role->permissions->where('define', 2)->pluck('id')->toArray())) ? 'checked' : '' }}/>
                            </div>
                            <div class="col-lg-12 border p-3 rounded mb-3">
                                @foreach ($permissions->where('define', 2) as $permissionIndex => $permission)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input permission-input" {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }} type="checkbox" name="permissions[]" id="inlineCheckbox_{{$permissionIndex}}" data-type="{{ $permission->define }}"  value="{{$permission->id}}">
                                        <label class="form-check-label" for="inlineCheckbox{{$permissionIndex}}">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-12">
                                <label>Only User Permissions</label>
                                <input type="checkbox" name="check-user" class="form-contol" id="checkUserPermissions" {{ (count($permissions) == count($role->permissions->where('define', 3)->pluck('id')->toArray())) ? 'checked' : '' }}/>
                            </div>
                            <div class="col-lg-12 border p-3 rounded mb-3">
                                @foreach ($permissions->where('define', 3) as $permissionIndex => $permission)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input permission-input" {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }} type="checkbox" name="permissions[]" id="inlineCheckbox_{{$permissionIndex}}" data-type="{{ $permission->define }}"  value="{{$permission->id}}">
                                        <label class="form-check-label" for="inlineCheckbox{{$permissionIndex}}">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Save Button --}}
                <button type="submit" class="btn btn-success btn-user btn-block">
                    Update
                </button>

            </form>
        </div>
    </div>

</div>


@endsection


@section('scripts')
<script>
    $("#checkAllPermissions").click(function(){
        $('.permission-input').not(this).prop('checked', this.checked);
    });
    $("#checkAdminPermissions").click(function(){
        $('form').find('input[data-type="1"]').not(this).prop('checked', this.checked);
    });
    $("#checkVodcasterPermissions").click(function(){
        $('form').find('input[data-type="2"]').not(this).prop('checked', this.checked);
    });
    $("#checkUserPermissions").click(function(){
        $('form').find('input[data-type="3"]').not(this).prop('checked', this.checked);
    });
</script>
@endsection
