<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{ $cat->idcategoria }}">
    <form method="POST" action="{{ route('categoria.destroy',$cat->idcategoria) }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="closed">
                        <span aria-hidden="true">X</span>
                    </button>
                    <h4 class="modal-title">Eliminar Categoria</h4>
                </div>
                <div class="modal-body">
                    <p>Confirmar si quiere eliminar la categoria!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> Cerrar </button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </div>
        </div>

    </form>
</div>
