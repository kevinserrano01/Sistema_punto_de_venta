<div class="modal fade" id="modal-delete-{{ $cli->id_persona }}">
    <div class="modal-dialog">
        <form action="{{ route('clientes.destroy', $cli->id_persona) }}" method="post">
        @csrf
        @method('DELETE')

        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Delete Client') }}</h4>
                <button type="button" class="close" data-dismiss="modal" arial-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Deseas eliminar a cliente {{ $cli->nombre }}?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">{{ __('Close') }}</button>
                <button type="submit" class="btn btn-outline-light">{{ __('Delete') }}</button>
            </div>
        </div>
        </form>
    </div>
</div>