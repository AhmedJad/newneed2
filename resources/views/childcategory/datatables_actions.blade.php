<div class='btn-group btn-group-sm'>
  @can('categories.show')
  <a data-toggle="tooltip" data-placement="bottom" title="{{trans('lang.category_show')}}" href="{{ route('categories.show', $id) }}" class='btn btn-link'>
    <i class="fas fa-info-circle"></i>
  </a>
  @endcan
	{{-- @can('categories.edit')
  <a data-toggle="tooltip" data-placement="bottom" title="Edit" href="{{ route('show-sub', $id) }}" class='btn btn-link'>
    <i class="fa fa-info-circle"></i>
  </a>
	@endcan --}} 

  @can('categories.edit')
  <a data-toggle="tooltip" data-placement="bottom" title="Edit" href="{{ route('Childcategory.edit', $id) }}" class='btn btn-link'>
    <i class="fa fa-edit"></i>
  </a>
  @endcan
	

  @can('categories.destroy')
{!! Form::open(['route' => ['Childcategory.destroy', $id], 'method' => 'delete']) !!}
  {!! Form::button('<i class="fa fa-trash"></i>', [
  'type' => 'submit',
  'class' => 'btn btn-link text-danger',
  'onclick' => "return confirm('Are you sure?')"
  ]) !!}
{!! Form::close() !!}
  @endcan
</div>
