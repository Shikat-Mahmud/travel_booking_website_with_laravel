@extends('admin.layouts.master')
@section('title', 'Email Setting')
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <form action="{{ route('email.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img style=" height: 50px; margin: 15px;"
                                        src="https://cdn-icons-png.freepik.com/512/72/72371.png" alt="Email Settings">
                                    <h5 class="mb-4"><b>Email Settings</b></h5>
                                    <p class="mt-1 text-sm text-gray-600">
                                        Update your email settings of your website.
                                    </p>
                                </div>

                                <div class="row mb-3 mt-3">
                                    <label for="inputText" class="col-sm-12 col-form-label">Mail Host: <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" placeholder="Mail Host" class="form-control" name="mail_host"
                                            required value="{{ $general->mail_host }}">
                                    </div>
                                </div>

                                <div class="row mb-3 mt-3">
                                    <label for="inputText" class="col-sm-12 col-form-label">Mail Port: <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" placeholder="Mail Port" class="form-control" name="mail_port"
                                            required value="{{ $general->mail_port }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-12 col-form-label">Mail Password: <span
                                            class="text-danger">*</span> </label>
                                    <div class="col-sm-12">
                                        <input type="text" placeholder="Mail Password" class="form-control"
                                            name="mail_password" required value="{{ $general->mail_password }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-12 col-form-label">Mail From Name: <span
                                            class="text-danger">*</span> </label>
                                    <div class="col-sm-12">
                                        <input type="text" placeholder="Mail From Name" class="form-control"
                                            name="mail_from_name" required value="{{ $general->mail_from_name }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-12 col-form-label">Mail From Email
                                        Address: <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" placeholder="Mail From Email Address" class="form-control"
                                            name="mail_from_address" required value="{{ $general->mail_from_address }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-12 col-form-label">Mail Encryption:
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <select class="form-select form-control" style="width: 100%; height: auto;"
                                            name="mail_encryption">
                                            <option {{ $general->mail_encryption == 'tls' ? 'selected' : '' }}
                                                value="tls">TLS
                                            </option>
                                            <option {{ $general->mail_encryption == 'ssl' ? 'selected' : '' }}
                                                value="ssl">SSL
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-12 col-form-label">Mail Status: <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <select class="form-select form-control" style="width: 100%; height: auto;"
                                            name="mail_status">
                                            <option {{ $general->mail_status == 'Active' ? 'selected' : '' }}
                                                value="Active">
                                                Active</option>
                                            <option {{ $general->mail_status == 'Inactive' ? 'selected' : '' }}
                                                value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="card">
                            <div class="card-body">

                                <div class="col-sm-12">
                                    <div class="flex items-center gap-4">
                                        <a class="btn btn-danger" href="{{ route('admin.index') }}">Cancel</a>
                                        <button class="btn btn-info" type="submit">Save</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
