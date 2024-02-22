<div class="modal fade" id="modal-delete-{{ $cat->id_categoria }}">
    <div class="modal-dialog">
        <form action="{{ route('categoria.destroy', $cat->id_categoria) }}" method="post">
        @csrf
        @method('DELETE')

        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Delete Category') }}</h4>
                <button type="button" class="close" data-dismiss="modal" arial-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Deseas eliminar la categoria {{ $cat->categoria }}?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">{{ __('Close') }}</button>
                <button type="submit" class="btn btn-outline-light">{{ __('Delete') }}</button>
            </div>
        </div>
        </form>
    </div>
</div>