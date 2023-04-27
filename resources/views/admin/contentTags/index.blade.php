@extends('layouts.admin')
@section('content')
@can('content_tag_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.content-tags.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.contentTag.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.contentTag.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ContentTag">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.contentTag.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.contentTag.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.contentTag.fields.slug') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contentTags as $key => $contentTag)
                        <tr data-entry-id="{{ $contentTag->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $contentTag->id ?? '' }}
                            </td>
                            <td>
                                {{ $contentTag->name ?? '' }}
                            </td>
                            <td>
                                {{ $contentTag->slug ?? '' }}
                            </td>
                            <td>
                                @can('content_tag_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.content-tags.show', $contentTag->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('content_tag_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.content-tags.edit', $contentTag->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('content_tag_delete')
                                    <form action="{{ route('admin.content-tags.destroy', $contentTag->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
