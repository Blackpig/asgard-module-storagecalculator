@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('storagecalculator::storages.title.edit storage') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.storagecalculator.storage.index') }}">{{ trans('storagecalculator::storages.title.storage') }}</a></li>
        <li class="active">{{ trans('storagecalculator::storages.title.edit storage') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
    <link href="{!! Module::asset('menu:css/nestable.css') !!}" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .dd-handle:hover {
            color: 333;
            background: #fafafa;
            cursor: default;
}
    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
             {!! Form::open(['route' => ['admin.storagecalculator.storage.update', $storage->id], 'method' => 'put']) !!}
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{ trans('storagecalculator::storages.form.title') }}</h3>
                </div>
                <div class="nav-tabs-custom">
                    @include('partials.form-tab-headers')
                    <div class="tab-content">
                        <?php $i = 0; ?>
                        @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                            <?php $i++; ?>
                            <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                                @include('storagecalculator::admin.storages.partials.edit-fields', ['lang' => $locale])
                            </div>
                        @endforeach
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>
                        <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.storagecalculator.storage.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
            {!! Form::close() !!}
        </div>
        <div class="col-md-6">
            <div class="row">
        @if ($storage->discount_type)
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ URL::route('admin.storagecalculator.discounts.create', [$storage->id, strtolower($storage->discount_type)]) }}" class="btn btn-primary btn-flat">
                        <i class="fa fa-pencil"></i> {{ trans('storagecalculator::discounts.button.create discount') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary" style="overflow: hidden;">
                <div class="box-body">
                    <div class="box-header">
                        <h3 class="box-title">Discounts</h3>
                        <div class="dd">
                            <ol class="dd-list">
                             @foreach($storage->discounts as $discount)
                                <li class="dd-item" data-id="{!! $discount->id !!}">
                                    <div class="btn-group" role="group" aria-label="Action buttons" style="display: inline">
                                        <a class="btn btn-sm btn-info" style="float:left;" href="{{ URL::route('admin.storagecalculator.discounts.edit', [$storage->id, $discount->id]) }}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    <a class="btn btn-sm btn-danger jsDeleteDiscountItem" style="float:left; margin-right: 15px;" data-item-id="{!! $discount->id !!}">
                                       <i class="fa fa-times"></i>
                                    </a>
                                    </div>
                                    <div class="dd-handle">
                                        {!! $discount->present()->discount(strtolower($storage->discount_type)) !!}
                                    </div>
                                </li>
                            @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="box box-primary" style="overflow: hidden;">
                <div class="box-body">
                    <div class="box-header">
                        <h3 class="box-title">No discount available for this storage type</h3>
                    </div>
                </div>
            </div>
        @endif
        </div>
    </div>

@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.storagecalculator.storage.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>

    <script>
    $( document ).ready(function() {
        $('.jsDeleteDiscountItem').on('click', function(e) {
            var self = $(this),
                discountItemId = self.data('item-id');
            $.ajax({
                type: 'POST',
                url: '{{ route('api.discountitem.delete') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    discountItem: discountItemId
                },
                success: function(data) {
                    if (! data.errors) {
                        var elem = self.closest('li');
                        elem.fadeOut()
                        setTimeout(function(){
                            elem.remove()
                        }, 300);
                    }
                }
            });
        });
    });
</script>
@stop
