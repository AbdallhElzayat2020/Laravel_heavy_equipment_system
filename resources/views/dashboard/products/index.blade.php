@extends('layouts.dashboard.app')
@section('title')
    {{ __('dashboard.products') }}
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.products') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.index') }}">{{ __('dashboard.home') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.products.index') }}">
                                        {{ __('dashboard.products') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="display: flex; justify-content: center;">
                <div class="col-md-11">
                    <div class="content-body">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-colored-form-control">
                                    {{ __('dashboard.products') }}
                                </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-content">
                                <div class="card-body">
                                    {{-- create brand modal --}}
                                    <button type="button" class="btn btn-outline-success " data-toggle="modal"
                                        data-target="#exampleModal">
                                        {{ __('dashboard.create_product') }}
                                    </button>

                                    {{-- modal --}}
                                    @include('dashboard.products._create')

                                    <table id="yajra_table" class="table table-striped table-bordered language-file">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('dashboard.name') }}</th>
                                                <th>{{ __('dashboard.category_name') }}</th>
                                                <th>{{ __('dashboard.description') }}</th>
                                                <th>{{ __('dashboard.images') }}</th>
                                                <th>{{ __('dashboard.created_at') }}</th>
                                                <th>{{ __('dashboard.actions') }}</th>
                                            </tr>
                                        </thead>

                                        <body>
                                            {{-- empty --}}
                                        </body>

                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{-- display errors during create brand --}}
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#exampleModal').modal('show');
            });
        </script>
    @endif

    {{--  Data tables  --}}
    <script>
        var lang = "{{ app()->getLocale() }}";
        // display data
        var table = $('#yajra_table').DataTable({
            processing: true,
            serverSide: true,
            fixedHeader: true,
            colReorder: true,
            select: false,
            responsive: {
                details: {
                    display: DataTable.Responsive.display.modal({
                        header: function(row) {
                            var data = row.data();
                            return 'Details of ' + data['name_translated'];
                        }
                    }),
                    renderer: DataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            },
            ajax: "{{ route('dashboard.products.all') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    orderable: false,
                },
                {
                    data: 'name_translated',
                    name: 'name_translated',
                },
                {
                    data: 'category_name',
                    name: 'category_name',
                },
                {
                    data: 'description_translated',
                    name: 'description_translated',
                },
                {
                    data: 'product_images',
                    name: 'product_images',
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                },

                {
                    data: 'action',
                    searchable: false,
                    orderable: false,
                },

            ],

            layout: {
                topStart: {
                    buttons: ['colvis', 'copy']
                }
            },


            language: lang === 'ar' ? {
                url: '//cdn.datatables.net/plug-ins/2.1.8/i18n/ar.json',
            } : {},


        });

        // file inputs
        $(function() {
            $('#product_images').fileinput({
                theme: 'fa5',
                language: lang,
                allowedFileTypes: ['image'],
                maxFileCount: 10,
                enableResumableUpload: false,
                showUpload: false,

            });
        });

        // delete Product
        $(document).on('click', '.delete_confirm_btn', function(e) {
            e.preventDefault();
            var product_id = $(this).attr('product-id');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('dashboard.products.destroy', 'id') }}".replace('id',
                            product_id),
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                Swal.fire({
                                    title: response.status,
                                    text: response.message,
                                    icon: "success"
                                });
                                $('#yajra_table').DataTable().ajax.reload();
                            } else {
                                Swal.fire({
                                    title: response.status,
                                    text: response.message,
                                    icon: "error"
                                });
                            }
                        }
                    });

                }
            });

        });

    </script>
@endpush
