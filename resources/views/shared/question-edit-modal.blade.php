@if (isset($question))

<!-- Edit course modal -->
<div class="modal" id="edit-question-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Vraag bewerken</h4>
            </div>

            <div class="modal-body">
                <form id="edit-question-form" action="/rest/questions/{{ $question->id }}/edit">
                    {!! method_field('put') !!}

                    <div class="form-group">
                        <label for="sel1">Vraag:</label>
                        <input type="text" name="question[title]" value="{{ $question->title }}" class="form-control" placeholder="{{ $question->title }}">
                    </div>

                    <div class="form-group">
                        <label for="sel1">Omschrijving:</label>
                        <textarea style="min-height: 120px;" name="question[description]" class="form-control" placeholder="{{ $question->description }}">{{ $question->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="sel1">YouTube:</label>
                        <input type="text" name="question[youtube]" value="{{ $question->youtube }}" class="form-control" placeholder="{{ $question->youtube }}">
                    </div>

                    <div class="form-group">
                        <label for="sel1">Afbeelding:</label>
                        <input type="text" name="question[images]" value="{{ $question->images }}" class="form-control" placeholder="{{ $question->images }}">
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>

            </div>
            <div class="modal-footer">
                <form id="delete-question-form" action="/rest/questions/delete" method="post">
                    <input type="hidden"  name="toDelete[]" value="{{$question->id}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
                <button type="submit" class="btn btn-danger" form="delete-question-form">Verwijderen</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                <button type="submit" class="btn btn-primary"  form="edit-question-form">Opslaan</button>
            </div>
        </div>
    </div>
</div>

@endif