<!-- Edit course modal -->
<div class="modal" id="add-course-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Training bewerken</h4>
            </div>
            <div class="modal-body">
                <form id="add-course-form" action="/rest/courses" method="POST">

                    <div class="form-group">
                        <label for="sel1">Selecteer onderwerp:</label>
                        <select placeholder="Selecteer onderwerp" class="form-control" id="sel1" name="category_id">
                            <option></option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sel1">Naam training:</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="sel1">Training omschrijving:</label>
                        <textarea style="min-height: 120px;" name="description" class="form-control"></textarea>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>

            </div>
            <div class="modal-footer">
                <form id="delete-course-form" action="/rest/courses/delete" method="post">
                    <input type="hidden"  name="toDelete[]" value="{{$course->id}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
                <button type="submit" class="btn btn-danger" form="delete-course-form">Verwijderen</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                <button type="submit" class="btn btn-primary"  form="add-course-form">Opslaan</button>
            </div>
        </div>
    </div>
</div>
