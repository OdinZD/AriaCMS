@extends('layouts.admin')
@section('content')
@can('content_page_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.content-pages.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.contentPage.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.contentPage.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ContentPage">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.contentPage.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.contentPage.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.contentPage.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.contentPage.fields.tag') }}
                        </th>
                        <th>
                            {{ trans('cruds.contentPage.fields.excerpt') }}
                        </th>
                        <th>
                            {{ trans('cruds.contentPage.fields.featured_image') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contentPages as $key => $contentPage)
                        <tr data-entry-id="{{ $contentPage->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $contentPage->id ?? '' }}
                            </td>
                            <td>
                                {{ $contentPage->title ?? '' }}
                            </td>
                            <td>
                                @foreach($contentPage->categories as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($contentPage->tags as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $contentPage->excerpt ?? '' }}
                            </td>
                            <td>
                                @if($contentPage->featured_image)
                                    <a href="{{ $contentPage->featured_image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $contentPage->featured_image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('content_page_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.content-pages.show', $contentPage->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('content_page_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.content-pages.edit', $contentPage->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('content_page_delete')
                                    <form action="{{ route('admin.content-pages.destroy', $contentPage->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
