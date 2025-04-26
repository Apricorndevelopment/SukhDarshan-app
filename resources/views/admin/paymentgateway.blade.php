@extends('admin/layout')
@section('page_title', 'Manage_blog')
@section('container')



    <div class="card h-100 p-0 radius-12">
        <div class="card-body p-24">
            <div class="row gy-4">

                @foreach ($data as $list)
                    <div class="col-xxl-6">
                        <div class="card radius-12 shadow-none border overflow-hidden">
                            <div
                                class="card-header bg-neutral-100 border-bottom py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                                <div class="d-flex align-items-center gap-10">
                                    <span
                                        class="w-36-px h-36-px bg-base rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('adminassets/images/payment4.png') }}" alt=""
                                            class="">
                                    </span>
                                    <span class="text-lg fw-semibold text-primary-light">RazorPay</span>
                                </div>

                            </div>
                            <div class="card-body p-24">
                                <div class="row gy-3">
                                    <div class="col-sm-6">
                                        <span class="form-label fw-semibold text-primary-light text-md mb-8">Environment
                                            <span class="text-danger-600">*</span></span>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="d-flex align-items-center gap-10 fw-medium text-lg">
                                                <div class="form-check style-check d-flex align-items-center">
                                                    <input class="form-check-input radius-4 border border-neutral-500"
                                                        type="checkbox" name="checkbox" id="sandbox2" checked>
                                                </div>
                                                <label for="sandbox2"
                                                    class="form-label fw-medium text-lg text-primary-light mb-0">Sandbox</label>
                                            </div>
                                            <div class="d-flex align-items-center gap-10 fw-medium text-lg">
                                                <div class="form-check style-check d-flex align-items-center">
                                                    <input class="form-check-input radius-4 border border-neutral-500"
                                                        type="checkbox" name="checkbox" id="Production2">
                                                </div>
                                                <label for="Production2"
                                                    class="form-label fw-medium text-lg text-primary-light mb-0">environment</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="currencyTwo"
                                            class="form-label fw-semibold text-primary-light text-md mb-8">Currency <span
                                                class="text-danger-600">*</span></label>
                                        <select class="form-control radius-8 form-select" id="currencyTwo">
                                            <option>{{ $list->currency }}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="secretKeyTwo"
                                            class="form-label fw-semibold text-primary-light text-md mb-8">Secret Key <span
                                                class="text-danger-600">*</span></label>
                                        <input type="text" class="form-control radius-8" id="secretKeyTwo"
                                            placeholder="Secret Key" value="{{ $list->secret_key }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="publicKeyTwo"
                                            class="form-label fw-semibold text-primary-light text-md mb-8">Publics Key<span
                                                class="text-danger-600">*</span></label>
                                        <input type="text" class="form-control radius-8" id="publicKeyTwo"
                                            placeholder="Publics Key" value="{{ $list->publics_key }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>

@endsection
