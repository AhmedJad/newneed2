<div class='btn-group btn-group-sm'>
  @can('categories.show')
  <a data-toggle="tooltip" data-placement="bottom" title="{{trans('lang.view_details')}}"href="#" class='btn btn-link'>
    <i class="fa fa-eye"></i>
  </a>
  @endcan

  @can('categories.edit')
  <a data-toggle="tooltip" data-placement="bottom" title="Details" href="{{ route('show-child', $id) }}" class='btn btn-link'>
    <i class="fa fa-info-circle"></i>
  </a>
  @endcan
	@can('categories.edit')
  <a data-toggle="tooltip" data-placement="bottom" title="Edit Sub" href="{{ route('subcategories.edit', $id) }}" class='btn btn-link'>
    <i class="fa fa-edit"></i>
  </a>
  @endcan

  @can('categories.destroy')
{!! Form::open(['route' => ['subcategories.destroy', $id], 'method' => 'delete']) !!}
  {!! Form::button('<i class="fa fa-trash"></i>', [
  'type' => 'submit',
  'class' => 'btn btn-link text-danger',
  'onclick' => "return confirm('Are you sure?')"
  ]) !!}
{!! Form::close() !!}
  @endcan
</div>
