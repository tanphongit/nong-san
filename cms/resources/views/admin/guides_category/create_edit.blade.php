@extends("admin.layouts.master")

@section("meta")
    <meta name="linkDatatable" content="{{ route('admin.guides.datatable') }}"/>
@endsection

@section("style")
    <!--dataTables plugin-->
    <link rel="stylesheet" href="/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"/>
    <link href="/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet"/>
@endsection


@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">

                @include('admin.layouts.partials.message')

                @component('admin.layouts.components.form', [
                    'form_method' =>  empty($guidesCategory) ? 'POST' : 'PUT',
                    'form_url' => empty($guidesCategory) ? route("admin.guides.category.store") : route("admin.guides.category.update", $guidesCategory->id)
                ])
                    <!-- Nav tabs -->
                        @include('admin.translation.nav_tab', [
                            'default_tabs' => [
                                [
                                    'id' => 'general',
                                    'name' => trans('admin_tab.general'),
                                    'path' => 'admin.guides_category.partials.general'
                                ]
                            ],
                            'object_trans' => $guidesCategory ?? null,
                            'default_tab' => 'general',
                            'form_fields' => [
                                ['type' => 'text', 'name' => 'name'],
                                // !empty($guides) ? ['type' => 'text', 'name' => 'slug'] : null,
                            ],
                            'form_plugins' => ['ckeditor'],
                            'tab_seo' => true,
                            'metadata' => $metadata ?? null,
                            'translation_file' => 'admin_guides_category'
                        ])

                        {{--Buttons--}}
                        @include("admin.layouts.partials.form_buttons", [
                            "cancel" => route("admin.guides.category.index")
                        ])
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    @include("admin.layouts.partials.modal-delete")

    <!--dataTables plugin-->
    <script src="/assets/plugins/jquery-datatable/jquery.dataTables.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-validation/jquery.validate.js"></script>
    <script type="text/javascript" src="/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="/assets/admin/js/pages/guides_category.create.js?v=1"></script>
@endsection
