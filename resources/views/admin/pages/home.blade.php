@extends('layouts.mainadmin')

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            Home Page</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Admin</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">Home</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <div class="card">
                        <div class="card-header border-0 pt-6">
                            <div class="card-title"></div>
                        </div>
                        <div class="card-body pt-0">
                            <form class="form" method="POST" action="{{ route('admin.home.store') }}"
                                  id="kt_modal_add_customer_form" enctype="multipart/form-data">
                                @csrf


                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Twitter URL</label>
                                        <input type="text" name="twitter_url" class="form-control" value="{{ $home_data->twitter_url }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>LinkedIn URL</label>
                                        <input type="text" name="linkedin_url" class="form-control" value="{{ $home_data->linkedin_url }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Instagram URL</label>
                                        <input type="text" name="instagram_url" class="form-control" value="{{ $home_data->instagram_url }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Research Icon Path</label>
                                        <input type="file" name="research_icon" class="form-control">

                                        @if (!empty($home_data->research_icon))
                                            <div class="mt-2">
                                                <img src="{{ asset($home_data->research_icon) }}" alt="Research Icon" style="max-height: 100px;">
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Restart Function</label>
                                        <input type="text" name="restart" class="form-control" value="{{ $home_data->restart }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Boot Load Text</label>
                                        <input type="text" name="boot_load" class="form-control" value="{{ $home_data->boot_load }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Twitter Direct Link</label>
                                        <input type="text" name="twitter_direct_link" class="form-control" value="{{ $home_data->twitter_direct_link }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>About Heading 1</label>
                                        <input type="text" name="about_heading1" class="form-control" value="{{ $home_data->about_heading1 }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>About Heading 2</label>
                                        <input type="text" name="about_heading2" class="form-control" value="{{ $home_data->about_heading2 }}">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>About Description</label>
                                        <textarea name="about_desc" class="form-control Classic" rows="6">{{ $home_data->about_desc }}</textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Subscribe Title</label>
                                        <input type="text" name="subscribe_title" class="form-control" value="{{ $home_data->subscribe_title }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Subscribe Heading</label>
                                        <input type="text" name="subscribe_heading" class="form-control" value="{{ $home_data->subscribe_heading }}">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Subscribe Description</label>
                                        <textarea name="subscribe_desc" class="form-control Classic" rows="5">{{ $home_data->subscribe_desc }}</textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Copyright Text</label>
                                        <input type="text" name="copy_right_text" class="form-control" value="{{ $home_data->copy_right_text }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Copyright Year</label>
                                        <input type="text" name="copy_right_year" class="form-control" value="{{ $home_data->copy_right_year }}">
                                    </div>

                                    @php
                                        $nav_links_raw = $home_data->nav_link ?? [];
                                        $nav_links = old('nav_link', is_array($nav_links_raw) ? $nav_links_raw : json_decode($nav_links_raw, true));
                                    @endphp


                                    <div class="form-group">
                                        <label class="form-label">Navigation Links</label>

                                        <div id="kt_repeater_navlink">
                                            <div data-repeater-list="nav_link" class="row">
                                                @forelse ($nav_links as $nav)
                                                    <div data-repeater-item class="col-md-6 mb-3">
                                                        <div class="d-flex flex-column gap-2 border rounded p-3">
                                                            <input type="text" name="url" class="form-control" placeholder="URL" value="{{ $nav['url'] ?? '' }}">
                                                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $nav['name'] ?? '' }}">
                                                            <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-danger mt-2">
                                                                <i class="la la-trash"></i> Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div data-repeater-item class="col-md-6 mb-3">
                                                        <div class="d-flex flex-column gap-2 border rounded p-3">
                                                            <input type="text" name="url" class="form-control" placeholder="URL">
                                                            <input type="text" name="name" class="form-control" placeholder="Name">
                                                            <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-danger mt-2">
                                                                <i class="la la-trash"></i> Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endforelse
                                            </div>

                                            <div class="form-group mt-4">
                                                <a href="javascript:;" data-repeater-create class=" mb-4 btn btn-sm btn-primary">
                                                    <i class="la la-plus"></i> Add Link
                                                </a>
                                            </div>
                                        </div>
                                    </div>


                                </div>




                                <div class="fv-row mb-7 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>




                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('admin_assets/plugins/global/plugins.bundle.js') }}"></script>
    
    <script src="{{ asset('admin_assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    
    <script src="{{ asset('admin_assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#kt_repeater_navlink').repeater({
                initEmpty: {{ empty( $home_data) ? 'true' : 'false' }},
                defaultValues: {
                    'url': '',
                    'name': ''
                },
                show: function () {
                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this link?')) {
                        $(this).slideUp(deleteElement);
                    }
                }
            });
        });
    </script>


@endsection
