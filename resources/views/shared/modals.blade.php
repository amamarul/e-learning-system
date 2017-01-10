@if (isset($categories))
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

<!-- Add course modal -->
<div class="modal" id="course-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Training toevoegen</h4>
            </div>
            <div class="modal-body">
                <form id="course-form" action="/rest/courses" method="post">
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
                        <label for="sel1">Training titel:</label>
                        <input type="text" name="title" class="form-control" placeholder="Training">
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                <button type="submit" class="btn btn-primary" form="course-form">Opslaan</button>
            </div>
        </div>
    </div>
</div>


<!-- Add questions modal -->
<div class="modal" id="questions-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Vragen toevoegen</h4>
            </div>
            <div class="modal-body">

                <form id="questions-form" action="/rest/questions" method="post">

                    <input type="hidden" name="count" value="1" />
                    <input type="hidden" name="course_id" value="{{ $course->id }}" />

                    <div class="test-last"></div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>

            </div>
            <div class="modal-footer">
                <button class="btn add-single" type="button">+ Open vraag</button>
                <button class="btn add-multi" type="button">+ Multiple choice</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                <button type="submit" class="btn btn-primary"  form="questions-form">Opslaan</button>
            </div>
        </div>
    </div>
</div>
@endif
