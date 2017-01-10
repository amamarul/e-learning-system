<!-- Add questions modal -->
<div class="modal" id="news-item-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nieuws</h4>
            </div>
            <div class="modal-body">

                <form id="questions-form" action="/rest/news" method="post">


                    <input type="hidden" name="parentID" value="{{ $news[0]->id }}" class="form-control" placeholder="">

                    <div class="form-group">
                        <label for="sel1">Titel:</label>
                        <input type="text" name="child[title]"class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="sel1">Content:</label>
                        <textarea name="child[content]"class="form-control" placeholder=""></textarea>
                    </div>


                    <div class="test-last"></div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                <button type="submit" class="btn btn-primary"  form="questions-form">Opslaan</button>

            </div>
        </div>
    </div>
</div>