@extends('layouts.app')
@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Job</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.account.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="card border-0 shadow mb-4">
                        <form action="{{ route('updateJob',[ $job->id ]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body card-form p-4">
                                @if (Session('success'))
                                    <div class="alert alert-success">
                                        {{ Session('success') }}
                                    </div>
                                @endif
                                <h3 class="fs-4 mb-1">Job Details</h3>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="title" class="mb-2">Title<span class="req">*</span></label>
                                        <input type="text" value="{{ old('title', $job->title) }}"
                                            placeholder="Job Title" id="title" name="title" class="form-control">
                                        @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6  mb-4">
                                        <label for="category" class="mb-2">Category<span class="req">*</span></label>
                                        <select name="category" id="category" class="form-control">
                                            <option value="">Select a Category</option>
                                            @if ($categories->isNotEmpty())
                                                @foreach ($categories as $category)
                                                    <option {{ $job->category_id == $category->id ? 'selected' : '' }}
                                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="job_type" class="mb-2">Job Nature<span class="req">*</span></label>
                                        <select name="job_type" id="job_type" class="form-select">
                                            <option value="">Select Job Nature</option>
                                            @if ($job_types->isNotEmpty())
                                                @foreach ($job_types as $job_type)
                                                    <option {{ $job->job_type_id == $job_type->id ? 'selected' : '' }}
                                                        value="{{ $job_type->id }}">{{ $job_type->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-6  mb-4">
                                        <label for="vacancy" class="mb-2">Vacancy<span class="req">*</span></label>
                                        <input type="number" value="{{ old('vacancy', $job->vacancy) }}" min="1"
                                            placeholder="Vacancy" id="vacancy" name="vacancy" class="form-control">
                                        @error('vacancy')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-4 col-md-6">
                                        <label for="salary" class="mb-2">Salary</label>
                                        <input type="text" value="{{ old('salary', $job->salary) }}"
                                            placeholder="Salary" id="salary" name="salary" class="form-control">
                                    </div>
                                    <div class="mb-4 col-md-6">
                                        <label for="location" class="mb-2">Location<span class="req">*</span></label>
                                        <input type="text" placeholder="location"
                                            value="{{ old('location', $job->location) }}" id="location" name="location"
                                            class="form-control">
                                        @error('location')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="description" class="mb-2">Description<span class="req">*</span></label>
                                    <textarea class="form-control" name="description" id="description" cols="5" rows="5"
                                        placeholder="Description">{{ old('description', $job->description) }}</textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="benefits" class="mb-2">Benefits</label>
                                    <textarea class="form-control" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits">{{ old('benefits', $job->benefits) }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="responsibility" class="mb-2">Responsibility</label>
                                    <textarea class="form-control" name="responsibility" id="responsibility" cols="5" rows="5"
                                        placeholder="Responsibility">{{ old('responsibility', $job->responsibility) }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="qualifications" class="mb-2">Qualifications</label>
                                    <textarea class="form-control" name="qualifications" id="qualifications" cols="5" rows="5"
                                        placeholder="Qualifications">{{ old('qualifications', $job->qualifications) }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="exprience" class="mb-2">Exprience<span class="req">*</span></label>
                                    <select name="exprience" id="exprience" class="form-select">
                                        <option value="1" {{ $job->exprience == 1 ? 'selected' : '' }}>1 Year
                                        </option>
                                        <option value="2" {{ $job->exprience == 2 ? 'selected' : '' }}>2 Year
                                        </option>
                                        <option value="3" {{ $job->exprience == 3 ? 'selected' : '' }}>3 Year
                                        </option>
                                        <option value="4" {{ $job->exprience == 4 ? 'selected' : '' }}>4 Year
                                        </option>
                                        <option value="5" {{ $job->exprience == 5 ? 'selected' : '' }}>5 Year
                                        </option>
                                        <option value="5_pluse" {{ $job->exprience == '5_pluse' ? 'selected' : '' }}>5+
                                            Year</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="keywords" class="mb-2">Keywords</label>
                                    <input type="text" value="{{ old('keywords', $job->keywords) }}"
                                        placeholder="keywords" id="keywords" name="keywords" class="form-control">
                                </div>
                                <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>
                                <div class="row">
                                    <div class="mb-4 col-md-6">
                                        <label for="company_name" class="mb-2">Name<span
                                                class="req">*</span></label>
                                        <input type="text" value="{{ $job->company_name }}"
                                            placeholder="Company Name" id="company_name" name="company_name"
                                            class="form-control">
                                        @error('company_name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4 col-md-6">
                                        <label for="company_location" class="mb-2">Location</label>
                                        <input type="text" value="{{ $job->company_location }}"
                                            placeholder="Location" id="company_location" name="company_location"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="company_website" class="mb-2">Website</label>
                                    <input type="text" value="{{ $job->company_website }}" placeholder="Website"
                                        id="company_website" name="company_website" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer  p-4">
                                <button type="submit" class="btn btn-primary">Update Job</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.account.modal')
@endsection
