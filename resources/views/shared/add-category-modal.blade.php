<!-- Add subject modal -->
<div class="modal" id="subject-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Categorie toevoegen</h4>
            </div>
            <div class="modal-body">
                <form id="category-form" action="/rest/categories" method="post">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Onderwerp">
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                <button type="submit" class="btn btn-primary" form="category-form">Opslaan</button>
            </div>
        </div>
    </div>
</div>