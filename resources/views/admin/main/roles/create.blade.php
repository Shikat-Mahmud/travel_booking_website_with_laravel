@extends('admin.layouts.master')
@section('title', 'Add Role')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>Add Role</h4>

                        </div>
                        <div>
                            <a href="{{ route('admin.roles.index') }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-arrow-left mr-2 "></i> Role List</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.roles.store') }}" method="post">
                            @csrf
                            <div class="row mt-3">
                                <label for="" class="col-md-4" required>Role Name <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="name" class="form-control" placeholder="Role Name"/>
                                </div>
                            </div>

                            <div class="card-body table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Permission Type</th>
                                            <th scope="col">View </th>
                                            <th scope="col">Create </th>
                                            <th scope="col">Edit </th>
                                            <th scope="col">Delete </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>Category</td>
                                            <td>
                                                <input type="checkbox" name="permissions[]" value="show-category"
                                                    class="form-check-input">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="permissions[]" value="create-category"
                                                    class="form-check-input">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="permissions[]" value="edit-category"
                                                    class="form-check-input">
                                            </td>

                                            <td>
                                                <input type="checkbox" name="permissions[]" value="delete-category"
                                                    class="form-check-input">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Product </td>
                                            <td>
                                                <input type="checkbox" name="permissions[]" value="show-product"
                                                    class="form-check-input">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="permissions[]" value="create-product"
                                                    class="form-check-input">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="permissions[]" value="edit-product"
                                                    class="form-check-input">
                                            </td>

                                            <td>
                                                <input type="checkbox" name="permissions[]" value="delete-product"
                                                    class="form-check-input">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>User </td>
                                            <td>
                                                <input type="checkbox" name="permissions[]" value="show-user"
                                                    class="form-check-input">
                                            </td>
                                            <td>
                                            <input type="checkbox" name="permissions[]" value="create-user"
                                                    class="form-check-input">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="permissions[]" value="set-userRole"
                                                    class="form-check-input">
                                            </td>

                                            <td>
                                                <input type="checkbox" name="permissions[]" value="delete-user"
                                                    class="form-check-input">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Role </td>
                                            <td>

                                            </td>
                                            <td>
                                                <input type="checkbox" name="permissions[]" value="create-role"
                                                    class="form-check-input">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="permissions[]" value="edit-role"
                                                    class="form-check-input">
                                            </td>

                                            <td>
                                                <input type="checkbox" name="permissions[]" value="delete-role"
                                                    class="form-check-input">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>General Settings </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                                <input type="checkbox" name="permissions[]"
                                                    value="update-general-setting" class="form-check-input">
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email Settings </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                                <input type="checkbox" name="permissions[]" value="update-email-setting"
                                                    class="form-check-input">
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Admin Panel <span class="text-danger">*</span></td>
                                            <td>
                                                <input type="checkbox" name="permissions[]" value="admin-panel"
                                                    class="form-check-input" checked required >
                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Cache Clear </td>
                                            <td>
                                                <input type="checkbox" name="permissions[]" value="cache-clear"
                                                    class="form-check-input">
                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                            <div class="row mt-3">
                                <div class="col-md-4 ">
                                    <input type="submit" value="Create" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

</section>
@endsection